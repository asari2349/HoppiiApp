<x-app-layout>


@foreach($posts as $post)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <h3>タイトル</h3>
                        <p class='name'>{{ $post->title }}</p>  
                        <h3>内容</h3>
                        <p class="id">{{$post->body}}</p>
                        <h3>簡単さ</h3>
                        <p class='grade'>{{ $post->ease }}</p>
                        <h3>教材の質</h3>
                        <p class='q'>{{ $post->materialQuality }}</p>
                        
                        @if ($post->users != null)
                            @foreach ($post->users as $user)
                                <p>{{ $user->name }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>  
@endforeach

</x-app-layout>