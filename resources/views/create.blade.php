<x-app-layout>


@foreach($posts as $post)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/index" method="POST">
                        @csrf
                            <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
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
                           
                            
                            
                        <input type="submit" value="store"/>
                    </form>
                </div>
            </div>
        </div>
    </div>  
@endforeach

</x-app-layout>