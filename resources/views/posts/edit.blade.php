<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/posts/edit/{{$post->id}}" method="POST">
                        @csrf
                        @method('PUT')                        
                        <input type="hidden" name="post[subject_id]" value={{ $post->subject_id }}>
                        <div>
                            <h2 class = "font-semibold text-3xl">{{ $post->subject->name }}</h2>
                            <div class = "font-semibold text-lg">{{ $post->subject->professor->name }}</div>
                        </div>
                        <div class="pt-6">
                            <h2>タイトル</h2>
                            <input class=" w-1/2" id = "title" type="text" name="post[title]" placeholder="50字まで" value="{{ $post->title }}"/>
                        </div>
                        <div class="body">
                            <h2>本文</h2>
                            <textarea class=" w-1/2 h-36" id = "body" name="post[body]"  placeholder="200字まで">{{ $post->body }}</textarea>
                        </div>
                        @php
                            $scores = ['簡単さ', '教材の質','授業の質']; // セレクトボックスの属性を配列で定義
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
                        <input class="pt-6" type="submit" value="変更"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // フォームが送信される前にバリデーションを実行
            document.getElementById("post").addEventListener("submit", function (event) {
                var bodyInput = document.getElementById("body");
                if (bodyInput.value.length > 200) {
                    alert("本文は200文字以下である必要があります。");
                    event.preventDefault(); // フォーム送信をキャンセル
                }
                var titleInput = document.getElementById("title");
                if (titleInput.value.length > 50) {
                    alert("タイトルは50文字以下である必要があります。");
                    event.preventDefault(); // フォーム送信をキャンセル
                }
            });
        });
    </script>


</x-app-layout>