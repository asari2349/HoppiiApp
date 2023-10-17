<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div>
                        <h2 class = "font-semibold text-3xl">{{ $post->subject->name }}</h2>
                        <div class = "font-semibold text-lg">{{ $post->subject->professor->name }}</div>
                    </div>
                    <div class="title">
                        <p class = "font-semibold text-3xl">{{$post->title}}</p>
                    </div>
                    
                    <div class="body">
                        <p>{{$post->body}}</p>
                    </div>
                    
                    <div class = "sm:flex pt-4">
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
                    
                    <div class = "flex py-4">
                        <div class="">{{ Str::limit($post->user->name, 3) }}</div>
                        <div class = "mx-1"> | </div>
                        <div class="">{{ $post->created_at }}</div>
                    </div>
                    
                    <div  class="hover:underline mt-2">
                        <a href = '/posts/index'>一覧に戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>  


</x-app-layout>