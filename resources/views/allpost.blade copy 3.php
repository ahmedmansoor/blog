@extends('layouts.app')

@section('content')
<!-- <div class="container pt-36 font-normal">
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" name="postname" placeholder="postname">
        <input type="text" name="detail" placeholder="detail">
        <input type="file" name="image" placeholder="image">
        <input type="submit" value="SUBMIT">
    </form> -->
<!-- comment testing -->

<!-- cards -->
<div class="row justify-content-center pt-20">
    <div class="card p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach($posts as $post)
        <div class="max-w-sm rounded">
            <img class="w-full h-56 rounded" src="{{asset('/storage/postfolder/'.$post->image)}}">
            <!-- like -->
            @php
            $user = Auth()->user()->name
            @endphp

            @foreach($post->likes as $like)
            @if($user == $like->users->name)
            <form action="{{ Route('post.like') }}" method="POST" class=" space-y-2 float-right">
                @csrf
                <input hidden name="postid" value="{{$post->id}}">
                <input hidden id="like" name="like" type="number" value="1">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7 inline-block pb-1 text-red-500 hover:text-red-300" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
            {{$like->post->id}}
            {{$post->id}}

            @elseif($like->post->id == $post->id)
            <form action="{{ Route('post.like') }}" method="POST" class=" space-y-2 float-right">
                @csrf
                <input hidden name="postid" value="{{$post->id}}">
                <input hidden id="like" name="like" type="number" value="1">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7 inline-block pb-1 text-gray-300 hover:text-red-500" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
            @endif
            @endforeach
            <form action="{{ Route('post.like') }}" method="POST" class=" space-y-2 float-right">
                @csrf
                <input hidden name="postid" value="{{$post->id}}">
                <input hidden id="like" name="like" type="number" value="1">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-7 w-7 inline-block pb-1 text-gray-300 hover:text-red-500" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
            <!-- <div class="px-4 py-2"> -->
            <div class="py-2">
                <div class="font-semibold text-base mb-2  tracking-wide">{{$post->name}}</div>
                <p class="text-gray-700 text-sm">{{$post->detail}}</p>
            </div>
            <div class="pt-4 pb-2">
                <div
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    {{$post->users->name}}
                </div>

                <div
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    {{count($post->likes)}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block pb-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <!-- comment -->
                <div
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    <a href="{{route('post.show',['id'=>$post->id])}}"> {{count($post->comments)}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block pb-1" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                clip-rule="evenodd" />
                        </svg></a>
                </div>
                <!-- posted time ago -->
                <p class="text-gray-400 text-xs">{{ $post->created_at->diffForHumans() }}
                </p>
                <!-- <div
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{route('post.show',['id'=>$post->id])}}">View</a>
                    </div>
                    <div
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{route('post.edit',['id'=>$post->id, 'mansoor'=>0])}}">Edit</a>
                    </div> -->
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

<script>
function toggleModal(modalID) {
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
}
</script>
@endsection