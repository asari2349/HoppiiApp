<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/posts/index" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="post[subject_id]" value={{ $subject->id }}>
                        <h2 name = >{{$subject->name}}</h2>
                        <div class="title">
                            <h2>Title</h2>
                            <input type="text" name="post[title]" placeholder="タイトル"/>
                        </div>
                        <div class="body">
                            <h2>Body</h2>
                            <textarea name="post[body]" placeholder=""></textarea>
                        </div>
                        <div>
                            <h2>ease</h2>
                             <select name="post[ease]">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div>
                            <h2>materialQuality</h2>
                            <select name="post[materialQuality]">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div>
                            <h2>teachingQuality</h2>
                            <select name="post[teachingQuality]">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <input type="submit" value="post"/>
                    </form>
                </div>
            </div>
        </div>
    </div>  


</x-app-layout>