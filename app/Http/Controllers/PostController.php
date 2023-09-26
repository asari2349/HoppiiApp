<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subject;
use App\Models\User;
use App\Models\Like;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $score=[];
        
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        if(empty($keyword)) {//$keyword　が空ではない場合、検索処理を実行します
            $posts=Post::withCount('likes')->paginate(10);
        }
        else{//$keyword　が空ではない場合、検索処理を実行します

            if($category == "professor"){
                $posts = Post::whereHas('subject', function ($query) use ($keyword) {
                    $query->whereHas('professor', function ($query) use ($keyword) {
                        $query->where('name','like', "%{$keyword}%");
                    });
                })->withCount('likes')->paginate(10);
            }
            elseif($category == "subject"){
                $posts = Post::whereHas('subject', function ($query) use ($keyword) {
                    $query->where('name','like', "%{$keyword}%");
                })->withCount('likes')->paginate(10);
            }
            $score['ease'] = $posts->avg('ease');
            $score['materialQuality'] = $posts->avg('materialQuality');
            $score['teachingQuality'] = $posts->avg('teachingQuality');
        }
        
        
        return view('posts/index')->with(['posts' => $posts,'score' => $score,'keyword'=>$keyword,'category' =>$category]);
    }
    public function show(Post $post)
    {
        return view('/posts/show')->with(['post' => $post]);
    }
    
    public function create(Subject $subject)
    {
        return view('/posts/create')->with(['subject' => $subject]);
    }
    public function edit(Post $post)
    {
        return view('/posts/edit')->with(['post' => $post]);
    }
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        //Post.phpのユーザとは別物
        $input += ['user_id' => $request->user()->id]; 
        $post->fill($input)->save();
        return redirect('/posts/show/'. $post ->id);
        
    }
    public function update(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        //Post.phpのユーザとは別物
        $input += ['user_id' => $request->user()->id]; 
        $post->fill($input)->save();
        return view('/posts/index')->with(['posts' => $post->get()]);
    }
    public function like(Request $request)
    {
        $user_id = Auth::user()->id; // ログインしているユーザーのidを取得
        $post_id = $request->post_id; // 投稿のidを取得
    
        // すでにいいねがされているか判定するためにlikesテーブルから1件取得
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first(); 
    
        if (!$already_liked) { 
            $like = new Like; // Likeクラスのインスタンスを作成
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            // 既にいいねしてたらdelete 
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
        // 投稿のいいね数を取得
        $post_likes_count = Post::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = [
            'post_likes_count' => $post_likes_count,
        ];
        return response()->json($param); // JSONデータをjQueryに返す
    }
}
