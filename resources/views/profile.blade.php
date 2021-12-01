@extends('layouts.app')

@section('content')
<div class="container pt-36 font-normal">
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" name="postname" placeholder="postname">
        <input type="text" name="detail" placeholder="detail">
        <input type="file" name="image" placeholder="image">
        <input type="submit" value="SUBMIT">
    </form>

    <div class="row justify-content-center">
        <div class="card p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            <!-- cards -->
            @foreach($posts as $post)
            <div class="max-w-sm rounded overflow-hidden">
                <img class="w-full h-56 rounded" src="{{asset('/storage/postfolder/'.$post->image)}}">
                <!-- <div class="px-4 py-2"> -->
                <div class="py-2">
                    <div class="font-semibold text-base mb-2 tracking-wide">{{$post->name}}</div>
                    <p class="text-gray-700 text-sm">{{$post->detail}}</p>
                </div>
                <div class="pt-4 pb-2">
                    <div
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                        {{$post->users->name}}
                    </div>
                    <div
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{route('post.show',['id'=>$post->id])}}">View</a>
                    </div>
                    <div
                        class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                        <a href="{{route('post.edit',['id'=>$post->id, 'mansoor'=>0])}}">Edit</a>
                    </div>
                </div>
                <p class="text-gray-700 text-sm">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection