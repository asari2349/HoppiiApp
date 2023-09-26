<x-app-layout>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @foreach($usersubjects as $usersubject)
            @php
            $isPosted = false
            @endphp
            <!--入力-->
            @foreach($userposteds as $posted)
                @if($posted->subject_id == $usersubject->id)
                    <a href='/posts/edit/{{$posted->id}}' class='btn'>
                        <div class="bg-stone-400 overflow-hidden shadow-sm sm:rounded-lg">
            
                            <div class="p-6 text-gray-900">
                                    <h2 class='name'>{{ $usersubject->name }}</h2>
                                    <p>編集する</p>
            
                            </div>
                        </div>
                    </a>
                    @php
                    $isPosted = true
                    @endphp
                @endif
            @endforeach
            <!--未入力-->
            @if(!$isPosted)
                <a href='/posts/create/{{$usersubject->id}}' class='btn'>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                                <h2 class='name'>{{ $usersubject->name }}</h2>
                                <p>レビューを書く</p>
                        </div>
                    </div>
                </a>
            @endif
                
            
        @endforeach

    </div>
</div>       
</x-app-layout>