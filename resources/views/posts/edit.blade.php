<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/posts/edit/{{$post->id}}" method="POST">
                        @csrf
                        @method('PUT')                        
                        <input type="hidden" name="post[subject_id]" value={{ $post->subject_id }}>
                        <h2 name = >{{$post->subject->name}}</h2>
                        <div class="title">
                            <h2>Title</h2>
                            <input type="text" name="post[title]" placeholder="タイトル" value="{{ $post->title }}"/>
                        </div>
                        <div class="body">
                            <h2>Body</h2>
                            <textarea name="post[body]" placeholder="">{{ $post->body }}</textarea>
                        </div>
                        @php
                        $scores = ['ease', 'materialQuality','teachingQuality']; // セレクトボックスの属性を配列で定義
                        @endphp
                        
                        @foreach ($scores as $score)
                            <div>
                                <h2>{{ $score }}</h2>
                                <select name="post[{{ $score }}]">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($post->$score == $i)
                                            <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                        @endforeach
                        <input type="submit" value="変更"/>
                    </form>
                </div>
            </div>
        </div>
    </div>  


</x-app-layout>