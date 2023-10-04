<?php
    protected $client;
    protected $cookieJar;

    public function __construct()
    {
        // クッキージャーを作成
        $this ->cookieJar = new CookieJar();

        // クライアントを作成し、クッキージャーを設定
        $this->client = new Client([
            'cookies' => $this ->cookieJar,
            'allow_redirects' => [
                'max' => 10,
                'track_redirects' => true
            ]
        ]);
        
        $loginUrl = $this->client->request('GET', 'https://hoppii.hosei.ac.jp/portal/login');
    
        $loginPage = $loginUrl->getBody();
        $crawler = new Crawler($loginPage);
    
        // post先
        $action = $crawler->filter('form')->attr('action');
        $actionUrl = "https://idp.hosei.ac.jp".$action;

        
        // 認証情報
        $credentials = [
            'form_params' => [
                'j_username' => config('services.hoppii.username'),
                'j_password' => config('services.hoppii.password'),
                '_eventId_proceed' => '',
            ],
        ];
        //dd($credentials);
        $loginResponse = $this->client->post($actionUrl, $credentials);
        //echo $loginResponse->getBody();
        
        $loginPage = $loginResponse->getBody();
        $crawler = new Crawler($loginPage);
        $action = $crawler->filter('form')->attr('action');
        //echo $action;
        $relayState = $crawler->filter('input[name="RelayState"]')->attr('value');
        //echo $relayState;
        $samlResponse = $crawler->filter('input[name="SAMLResponse"]')->attr('value');
        //echo $samlResponce;
        
        $values = [
            'form_params' => [
                'RelayState' => $relayState,
                'SAMLResponse' => $samlResponse,
                
            ],
        ];
        
        
        $Response = $this->client->post($action, $values);

?>