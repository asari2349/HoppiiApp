<x-app-layout>
    <div class="py-12">  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- 検索機能 -->
        <div>
            <form action="{{ route('index') }}" method="GET">
                @csrf
            
                <input type="text" name="keyword" value = {{$keyword}}>
                <input type="submit" value="検索">
                <div>
                    <select name="category">
                        @if($category == "professor")
                            <option value="professor" selected>教員名</option>
                            <option value="subject" >科目名</option>
                        @elseif($category == "subject")
                            <option value="professor">教員名</option>
                            <option value="subject" selected>科目名</option>
                        @else
                            <option value="professor">教員名</option>
                            <option value="subject" >科目名</option>
                        @endif
                    </select>
                </div>
            </form>
        </div>
        @if(!empty($score))
        <div>
            <div>
                <div>楽さ</div>
                <div>{{$score['ease'] }}/5</div>
            </div>
            <div>
                <div>教材の質</div>
                <div>{{$score['materialQuality'] }}/5</div>
            </div>
            <div>
                <div>授業の質</div>
                <div>{{$score['teachingQuality'] }}/5</div>
            </div>
        </div>
        @endif
        @foreach($posts as $post)
            <!--<a href='/posts/show/{{$post->id}}'>-->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2>{{ $post->subject->name }}</h2>
                        <p>{{ $post->subject->professor->name }}</p>
                        <h3>投稿者</h3>
                        <p class='name'>{{ $post->user->name }}</p>
                        <h3>タイトル</h3>
                        <p class='name'>{{ $post->title }}</p>  
                        <h3>内容</h3>
                        <p class="id">{{$post->body}}</p>
                        <h3>簡単さ</h3>
                        <p class='grade'>{{ $post->ease }}</p>
                        <h3>授業の質</h3>
                        <p class='grade'>{{ $post->teachingQuality }}</p>
                        <h3>教材の質</h3>
                        <p class='q'>{{ $post->materialQuality }}</p>
                        <h3>いいね</h3>
                        @auth
                        <!-- Post.phpに作ったisLikedByメソッドをここで使用 -->
                        @if (!$post->isLikedBy(Auth::user()))
                            <span class="likes">
                                <i class="fas fa-heart like-toggle" data-post-id="{{ $post->id }}"></i>
                            <span class="like-counter">{{$post->likes_count}}</span>
                            </span><!-- /.likes -->
                        @else
                            <span class="likes">
                                <i class="fas fa-heart heart like-toggle liked" data-post-id="{{ $post->id }}"></i>
                            <span class="like-counter">{{$post->likes_count}}</span>
                            </span><!-- /.likes -->
                        @endif
                        @endauth
                    </div>
                </div>
            <!--</a>-->
            
        @endforeach
    </div>
</div> 
</x-app-layout>