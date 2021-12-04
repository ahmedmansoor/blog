@extends('layouts.app')

@section('content')
<div class="container pt-20 font-normal">
    <div class="row justify-content-center">
        <div class="card p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            <!-- cards -->
            @foreach($posts as $post)
            <div class="max-w-sm rounded overflow-hidden mt-5">
                <a href="{{route('post.edit',['id'=>$post->id])}}">
                    <img class="w-full h-56 rounded" src="{{asset('/storage/postfolder/'.$post->image)}}">
                </a>
                <!-- <div class="px-4 py-2"> -->
                <button
                    class="float-right flex flex-row bg-gray-200 hover:bg-gray-300 rounded-md px-3 py-1 my-2 text-sm font-semibold text-gray-700 mr-2 mb-2 w-min-content space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <a href="{{route('post.edit',['id'=>$post->id])}}">Edit</a>
                </button>
                <div class="py-2">
                    <div class="font-semibold text-base mb-2 tracking-wide">{{$post->name}}</div>
                    <p class="text-gray-700 text-sm">{{$post->detail}}</p>
                </div>
                <p class="text-gray-400 text-xs">{{ $post->created_at->diffForHumans() }}</p>
                <!-- <div class="pt-4 pb-2">
                    <div
                        class="flex flex-row bg-gray-200 rounded-md px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 w-min-content space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <a href="{{route('post.edit',['id'=>$post->id, 'mansoor'=>0])}}">Edit</a>
                    </div>
                </div> -->
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection