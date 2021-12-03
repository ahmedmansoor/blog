@extends('layouts.app')

@section('content')
<div class="container pt-20">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <!-- <a href={{route('post.index')}}> Go back </a> -->
            <div class="grid lg:grid-flow-col lg:space-x-4 lg:grid-cols-3 ">
                <div class="bg-white rounded-md p-2 lg:p-7 flex-col lg:col-span-2">
                    <!-- <p class="text-xl font-bold">{{$post->name}}</p> -->
                    <!-- <p class="text-sm rounded-md mt-1 bg-gray-200 p-0.5 px-2 w-max-content">{{$post->users->name}}</p> -->
                    <!-- <p class="my-4">
                        {{$post->detail}}
                    </p> -->
                    <img class="w-full h-auto mr-4 rounded-md col-span-2"
                        src="{{asset('/storage/postfolder/'.$post->image)}}">

                </div>
                <div class="text-sm bg-white rounded-md p-2 sm:p-7">
                    <button
                        class=" text-primary text-sm mt-1 flex flex-row place-content-end bg  p-1.5 px-2 rounded-md  float-right">
                        <svg class="pt-0.5" xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                            viewBox="0 0 24 24" fill="none" stroke="#C9564E" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M10 16l-6-6 6-6" />
                            <path d="M20 21v-7a4 4 0 0 0-4-4H5" />
                        </svg>
                        <a href={{route('post.index')}} class="px-1"> Go back </a>
                    </button>
                    <div class="flex flex-row place-content-between">
                        <p class="text-xl font-bold">{{$post->name}}</p>
                        <!-- <p class="text-gray-400 text-xs mt-1">{{ $post->created_at->diffForHumans() }} </p> -->
                    </div>
                    <!-- <p class="text-sm mt-1">posted by <span class=" bg-gray-200  rounded-md p-0.5 px-2 w-max-content">
                            {{$post->users->name}}</span></p> -->
                    <p class="my-2">
                        {{$post->detail}}
                    </p>
                    <div class="bg-gray-200 sm:bg-white">
                        <p class="text-lg font-bold mb-3 mt-5 sm:mt-10">Feedback</p>
                        <form action="{{ Route('post.comment') }}" method="POST" class="mt-3 mb-6 space-y-2">
                            @csrf
                            <input hidden name="postid" value="{{$post->id}}">
                            <input id="comment" name="comment" type="text" placeholder="Comment on this post"
                                autocomplete="false" class="w-full rounded-md border p-2 bg-gray-100 font-light">
                            <button name="btnpostcomment" type="submit" value="Submit"
                                class="rounded-md p-1.5 px-2 bg-gray-900 text-gray-100 lg:mb-10 justify-self-end">Submit</button>
                        </form>

                        <div class="lg:h-72 overflow-y-auto lg:pr-3">
                            @if($post->comments != null)
                            @foreach($post->comments as $comment)
                            <div class="mt-3 mb-3 border rounded-lg px-4 py-3 text-sm">
                                <p class="font-semibold"> {{$comment->users->name}}</p>
                                <p class="">{{$comment->comment}}</p>
                                <p class="text-gray-400 text-xs">{{ $comment->created_at->diffForHumans() }}
                            </div>
                            @endforeach
                            @else
                            <div class="mt-3 mb-3 border rounded-lg px-4 py-3">
                                <p>No comments</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.container {
    scrollbar-width: thin;
}
</style>
@endsection