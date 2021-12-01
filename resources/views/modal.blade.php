@extends('layouts.app')

@section('content')


<div class="flex flex-row space-x-4 pt-28">
    <div class="flex-col flex-1 bg-white rounded p-5">
        <a href={{route('profile')}} class="text-xl font-bold">{{$post->name}</a>
        <p class="item-body my-4">
            {{$post->detail}}
            </p>
            <img class="w-full h-auto mt-4 mr-4 mb-4" src="{{asset('/storage/postfolder/'.$post->image)}}">

    </div>
    <div class="text-sm flex-col bg-white rounded p-5" role="dialog">
        <p class="text-xl font-bold mb-6">Comments</p>

        <form action="{{ Route('post.comment') }}" method="POST" class="mt-3 mb-6 flex">
            @csrf
            <input hidden name="postid" value="{{$post->id}}">
            <input id="comment" name="comment" type="text" placeholder="Comment on this post" autocomplete="false"
                class="w-full rounded-l-md border p-2 bg-gray-100 font-light">
            <input name="btnpostcomment" type="submit"
                class="cursor-pointer rounded-r-md border p-4 bg-secondary hover:bg-secondary-light border-secondary-dark border-t border-b border-r">
        </form>

        @if($post->comments != null)
        @foreach($post->comments as $comment)
        <div class="mt-3 mb-3 border rounded-lg bg-gray-100 px-4 py-3 text-sm">
            <p class="font-medium"> {{$comment->users->name}}</p>
            <p class="">{{$comment->comment}}</p>
            <p class="text-gray-700 text-sm">{{ $comment->created_at->diffForHumans() }}
        </div>
        @endforeach
        @else
        <div class="mt-3 mb-3 border rounded-lg bg-gray-100 px-4 py-3">
            <p>No comments</p>
        </div>
        @endif
    </div>
</div>

@endsection