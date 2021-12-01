@extends('layouts.app')

@section('content')
<div class="container pt-20">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <a href={{route('post.index')}}> Go back </a> -->
            <div class="grid sm:grid-flow-col sm:space-x-4 sm:grid-cols-3">
                <div class="bg-white rounded p-2 sm:p-7 flex-col sm:col-span-2">
                    <!-- <p class="text-xl font-bold">{{$post->name}}</p> -->
                    <!-- <p class="text-sm rounded-md mt-1 bg-gray-200 p-0.5 px-2 w-max-content">{{$post->users->name}}</p> -->
                    <!-- <p class="my-4">
                        {{$post->detail}}
                    </p> -->
                    <img class="w-full h-auto mt-4 mr-4 mb-4 rounded-md col-span-2"
                        src="{{asset('/storage/postfolder/'.$post->image)}}">

                </div>
                <div class="text-sm bg-white rounded p-2 sm:p-7">
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

                        <form action="{{ Route('post.comment') }}" method="POST" class="mt-3 mb-6  space-y-2 ">
                            @csrf
                            <input hidden name="postid" value="{{$post->id}}">
                            <input id="comment" name="comment" type="text" placeholder="Comment on this post"
                                autocomplete="false" class="w-full rounded border p-2 bg-gray-100 font-light">
                            <input name="btnpostcomment" type="submit" class="rounded border p-2">
                        </form>

                        @if($post->comments != null)
                        @foreach($post->comments as $comment)
                        <div class="mt-3 mb-3 border rounded-lg bg-gray-100 px-4 py-3 text-sm">
                            <p class="font-semibold"> {{$comment->users->name}}</p>
                            <p class="">{{$comment->comment}}</p>
                            <p class="text-gray-400 text-xs">{{ $comment->created_at->diffForHumans() }}
                        </div>
                        @endforeach
                        @else
                        <div class="mt-3 mb-3 border rounded-lg bg-gray-100 px-4 py-3">
                            <p>No comments</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection