<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/posts/index" method="POST" id ="post">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="post[subject_id]" value={{ $subject->id }}>
                        <div>
                            <h2 class = "font-semibold text-3xl">{{ $subject->name }}</h2>
                            <div class = "font-semibold text-lg">{{ $subject->professor->name }}</div>
                        </div>
                        <div class="pt-6">
                            <h2>タイトル</h2>
                            <input class=" w-1/2" id = "title" type="text" name="post[title]" placeholder="50字まで"/>
                        </div>
                        <div class="body">
                            <h2>本文</h2>
                            <textarea class=" w-1/2 h-36" id = "body" name="post[body]" placeholder="200字まで" ></textarea>
                        </div>
                        <div>
                            <h2>簡単さ</h2>
                             <select name="post[ease]">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div>
                            <h2>教材の質</h2>
                            <select name="post[materialQuality]">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div>
                            <h2>授業の質</h2>
                            <select name="post[teachingQuality]">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <input class="pt-6" type="submit" value="投稿する"/>
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