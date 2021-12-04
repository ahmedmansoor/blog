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
                        <a href={{ url()->previous() }} class="px-1"> Go back </a>
                    </button>
                    <div class="flex flex-col place-content-between w-full">
                        <form action="{{route('post.update')}}" method="POST" enctype="multipart/form-data"
                            class="space-y-3">
                            {{csrf_field()}}

                            <div>
                                <label class="text-xs font-medium text-gray-500 tracking-wide">Title</label>
                                <input
                                    class="w-full bg-gray-200 rounded-md py-2 px-2 focus:outline-none focus:border-gray-200 focus:bg-gray-100"
                                    type="text" name="postname" value="{{$post->name}}">
                            </div>

                            <div>
                                <label class="text-xs font-medium text-gray-500 tracking-wide">Description</label>
                                <input type="text" name="detail" value="{{$post->detail}}"
                                    class="w-full bg-gray-200 rounded-md py-2 px-2 focus:outline-none focus:border-gray-200 focus:bg-gray-100">
                            </div>

                            <div>
                                <label class="text-xs font-medium text-gray-500 tracking-wide">New Image</label>
                                <input type="file" name="image"
                                    class="w-full bg-gray-200 rounded-md py-2 px-2 focus:outline-none focus:border-gray-200 focus:bg-gray-100">
                                <input type="hidden" name="existingimg" value="{{$post->image}}">
                                <input type="hidden" name="id" value="{{$post->id}}">
                            </div>
                            <button type="submit" value="Update"
                                class="rounded-md p-1.5 px-2 bg-gray-900 text-gray-100 lg:mb-10 justify-self-end">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection