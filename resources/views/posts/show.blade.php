<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="title">
                        <h2>Title</h2>
                        <p>{{$post->title}}</p>
                    </div>
                    <div class="body">
                        <h2>Body</h2>
                        <p>{{$post->body}}</p>
                    </div>
                    <div>
                        <h2>ease</h2>
                        <p>{{$post->ease}}</p>
                    </div>
                    <div>
                        <h2>materialQuality</h2>
                        <p>{{$post->materialQuality}}</p>
                    </div>
                    <div>
                        <h2>teachingQuality</h2>
                        <p>{{$post->teachingQuality}}</p>
                    </div>
                    <div>
                        <a href = '/posts/index'>一覧に戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>  


</x-app-layout>