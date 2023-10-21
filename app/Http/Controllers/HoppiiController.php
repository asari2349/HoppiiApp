<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\DomCrawler\Crawler;

use App\Http\Controllers\Auth\RegisteredUserController;

use App\Models\User;
use App\Models\Subject;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;



class HoppiiController extends Controller
{

    private $cookieJar;
    private $client;
    
    public function __construct($name ,$password)
    {
        // クッキージャーを作成
        $this ->cookieJar = new CookieJar();

        // クライアントを作成し、クッキージャーを設定
        $this ->client = new Client([
            'cookies' => $this ->cookieJar,
            'allow_redirects' => [
                'max' => 10,
                'track_redirects' => true
            ],
            'timeout' => 60,
            
        ]);
        
        $loginUrl = $this->client->request('GET', 'https://hoppii.hosei.ac.jp/sakai-login-tool/container', [
            'curl' => [
                CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1_1
            ],
        ]);
    
        $loginPage = $loginUrl->getBody();
        $crawler = new Crawler($loginPage);
    
        // post先
        $action = $crawler->filter('form')->attr('action');
        $actionUrl = "https://idp.hosei.ac.jp".$action;

        
        // 認証情報
        $credentials = [
            'form_params' => [
                'j_username' => $name,
                'j_password' => $password,
                '_eventId_proceed' => '',
            ],
        ];
        //dd($credentials);
        $loginResponse = $this ->client->post($actionUrl, $credentials);
        //echo $loginResponse->getBody();
        
        $loginPage = $loginResponse->getBody();
        $crawler = new Crawler($loginPage);
        $action = $crawler->filter('form')->attr('action');
        
        $relayStateElement = $crawler->filter('input[name="RelayState"]');
        if($relayStateElement->count() > 0){
            $relayState = $crawler->filter('input[name="RelayState"]')->attr('value');
            //echo $relayState;
            $samlResponse = $crawler->filter('input[name="SAMLResponse"]')->attr('value');

            
            $values = [
                'form_params' => [
                    'RelayState' => $relayState,
                    'SAMLResponse' => $samlResponse,
                    
                ],
            ];
            
            
            $response = $this ->client->post($action, $values);
            };

    }
    
    // データベースとマッチしなかったときに実行
    public function tryadd($name ,$password)
    {
        //dd($name);
        
            try {
                $response = $this->client->request('GET', 'https://hoppii.hosei.ac.jp/direct/mySignup.json');
            } catch (ClientException $e) {
                $response = null; // エラーが発生した場合、$responseをnullに設定
            }
            
            if ($response !== null) {
            // 通信成功したときに新たにユーザーを登録する
            
            $user = User::where('name', $name)->first();
            if (!$user){
                $user = new User;
                
            };
            $input = ['name' => $name,
                'password' => Hash::make($password),];
            $user->fill($input)->save();
            event(new Registered($user));
            Auth::login($user);
            
            return(true);
            
        } else{
            return(false);
        };

        

    }
    // login時にここが実行される
    public function getinfo()
    {
        // dd("getinfo");
        //$response = $this ->client->request('GET', 'https://hoppii.hosei.ac.jp/direct/announcement/user.json?n=1&d=200');
        
        // トップページにアクセス
        $topUrl = $this ->client->request('GET', 'https://hoppii.hosei.ac.jp/portal/');
        $topPage = $topUrl->getBody();
        $crawler = new Crawler($topPage);
        
        //授業一覧ページに遷移
        $subject = $crawler->filterxPath('//a[@title="授業一覧 - 参加することができる授業一覧を表示したり修正したりするためのツールです．"]')->attr('href');
        $subjectUrl = $this ->client->request('GET', $subject);
        $subjectPage = $subjectUrl->getBody();
        $crawler = new Crawler($subjectPage);
        
        
        //表示数の変更
        $action = $crawler->filterxPath('//form[@name="pagesizeForm"]')->attr('action');
        $actionUrl = $action;
        // パラメータの設定
        $params = [
            'form_params' => [
                'eventSubmit_doChange_pagesize' => "changepagesize",
                'selectPageSize' => "100",
                'sakai_csrf_token' => $crawler->filterXPath('//form[@name="pagesizeForm"]//input[@name="sakai_csrf_token"]')->attr('value'),

            ],
        ];
        //dd($params);
        //100件表示の授業一覧ページ
        $changeResponse = $this ->client->post($actionUrl, $params);
        $subjectAllPage = $changeResponse->getBody();
        $crawler = new Crawler($subjectAllPage);
        //dd($crawler);
        
        $subjectIds = [];
        
        //tableの要素を$tableに格納
        $table = $crawler->filter('table')->filter('tr')->each(function ($tr, $i) {

            return $tr->filter('td, th')->each(function ($td, $i) {
                if ($i >= 1 && $i <= 4) {
                    return trim($td->text());
                }
            });
            
            return null; // 選択しない場合はnullを返す
        });
        // dd($table);
        $subjectIds =[];
        foreach($table as $row){
            $state = $row[1];
            $subjectCode = $row[2];
            $subjectName = $row[3];
            $professorName = str_replace(" ", "", $row[4]);
            
            if ($state == "本登録"){
                //professorがいないときは登録
                $professorExist = Professor::where('name', $professorName)->first();
                if(!$professorExist){
                    $input = ['name' => $professorName]; 
                    $professor = new Professor;
                    $professor->fill($input)->save();
                };
                
                //コードと教員名が一致するレコードがないときに追加。
                //コードが同じでも教員名が変わる可能性がある
                $professorId =  Professor::where('name',$professorName)->first()->id;
                $subjectExist = Subject::where('subjectcode',$subjectCode)->where('professor_id',$professorId)->first();
                if(!$subjectExist){
                    $input = ['name' => $subjectName,
                              'subjectcode' => $subjectCode,
                              'professor_id'=> $professorId]; 
                    $subject = new Subject;
                    $subject->fill($input)->save();
                };
                
                $subjectId = Subject::where('subjectcode',$subjectCode)->first()->id;
                $subjectIds[] = $subjectId;
            }
        }
        $userId = Auth::user()->id;
        $user = User::where('id',$userId)->first();
        $user->subjects()->sync($subjectIds);
        
        return redirect('/posts/index/');
    
        
        }
        
}

