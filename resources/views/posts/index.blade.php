<x-app-layout>
    <div class="">  
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 py-10 text-gray-900 dark:text-white">
        <!-- 検索機能 -->
            <div>
                <form action="{{ route('index') }}" method="GET">
                    @csrf
                    <div class = "py-2 block">
                        @if(isset($keyword))
                            <input type="text" name="keyword" value="{{ $keyword }}">
                        @else
                            <input type="text" name="keyword" value="">
                        @endif
                        <input type="submit" value="検索" class = " py-1 px-3 border border-gray-900  rounded hover:bg-gray-200">
                    </div>
    
                    <div>
                        <select name="category" class = "py-2 my-2">
                            @if(isset($category))
                                @if($category == "professor")
                                    <option value="professor" selected>教員名</option>
                                    <option value="subject" >科目名</option>
                                @else($category == "subject")
                                    <option value="professor">教員名</option>
                                    <option value="subject" selected>科目名</option>
                                @endif
                            @else
                                <option value="professor">教員名</option>
                                <option value="subject" >科目名</option>
                            @endif
                        </select>
                    </div>
                </form>
            </div>
        @if(!empty($score))
        <div class = "sm:flex text-lg font-semibold text-center">
            <div class = "w-36">
                <div>簡単さ</div>
                <div>{{$score['ease'] }}/5</div>
            </div>
            <div class = "w-36">
                <div>教材の質</div>
                <div>{{$score['materialQuality'] }}/5</div>
            </div>
            <div class = "w-36">
                <div>授業の質</div>
                <div>{{$score['teachingQuality'] }}/5</div>
            </div>
        </div>
        @endif
        <div class ="block ">
            @foreach($posts as $post)
                    
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-4">
                        <div class="p-6 text-gray-900">
                            <div>
                                <h2 class = "font-semibold text-3xl">{{ $post->subject->name }}</h2>
                                <div class = "font-semibold text-lg">{{ $post->subject->professor->name }}</div>
                            </div>
                            <div class = "flex py-1">
                                <div class="">{{ Str::limit($post->user->name, 3) }}</div>
                                <div class = "mx-1"> | </div>
                                <div class="">{{ $post->created_at }}</div>
                            </div>
                            <div class = "sm:flex">
                                <div class = "w-36">
                                    <div calss = "">簡単さ</div>
                                    <div class='grade'>{{ $post->ease }}/5</div>
                                </div>
                                <div class = "w-36">
                                    <div calss = "">授業の質</div>
                                    <div class='grade'>{{ $post->teachingQuality }}/5</div>
                                </div>
                                <div class = "w-36">
                                    <div calss = "">教材の質</div>
                                    <div class='q'>{{ $post->materialQuality }}/5</div>
                                </div>
                            </div>
                            
                            <div class = " py-1">
                                <div class='font-semibold'>{{ $post->title }}</div>  
                                <div class="hover:underline">
                                    <a href='/posts/show/{{$post->id}}'>
                                        {{ Str::limit($post->body, 50) }}
                                    </a>
                                </div>
                            </div>
                            <div class = "">
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
                    </div>
                
                
            @endforeach
        </div>
    </div>
</div> 
</x-app-layout>