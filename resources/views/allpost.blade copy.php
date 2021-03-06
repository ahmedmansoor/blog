@extends('layouts.app')

@section('content')
<div class="container pt-36 font-normal">
    <form action="{{route('post.upload')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" name="postname" placeholder="postname">
        <input type="text" name="detail" placeholder="detail">
        <input type="file" name="image" placeholder="image">
        <input type="submit" value="SUBMIT">
    </form>

    <!-- comment testing -->
    <div class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" type="button" onclick="toggleModal('modal-id')">
        view comments
    </div>
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="relative w-auto my-6 mx-auto max-w-3xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-3xl font-semibold">
                        all comments view
                    </h3>
                    <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                        <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                            ×
                        </span>
                    </button>
                </div>
                <!--body-->
                <div class="col-md-8">
                    @if(isset($posts))
                    @if(Count($posts)>0)
                    @foreach($posts as $post)
                    <div class="card">
                        <br>
                        @foreach($post->comments as $comment)

                        {{$comment->comment}} {{$comment->users->name}}<br>

                        @endforeach


                    </div>
                    @endforeach
                    @else
                    <h1>No data found </h1>
                    @endif
                    @endif
                </div>
                <div class="relative p-6 flex-auto">
                    <p class="my-4 text-blueGray-500 text-lg leading-relaxed">

                    </p>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                    <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Close
                    </button>
                    <button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>

    <!-- cards -->
    <div class="row justify-content-center">
        <div class="card p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($posts as $post)
            <div class="max-w-sm rounded overflow-hidden">
                <img class="w-full h-56 rounded" src="{{asset('/storage/postfolder/'.$post->image)}}">
                <!-- <div class="px-4 py-2"> -->
                <div class="py-2">
                    <div class="font-semibold text-base mb-2  tracking-wide">{{$post->name}}</div>
                    <p class="text-gray-700 text-sm">{{$post->detail}}</p>
                </div>
                <div class="pt-4 pb-2">
                    <div class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                        {{$post->users->name}}
                    </div>
                    <!-- comment testing -->
                    <button class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" type="button" onclick="toggleModal('modal-id')">
                        {{count($post->comments)}} comments
                    </button>
                    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                        <div class="relative w-auto my-6 mx-auto max-w-3xl">
                            <!--content-->
                            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                <!--header-->
                                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                                    <h3 class="text-3xl font-semibold">
                                        all comments view
                                    </h3>
                                    <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                                        <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                            ×
                                        </span>
                                    </button>
                                </div>
                                <!--body-->
                                <div class="col-md-8">
                                    @if(isset($posts))
                                    @foreach($posts as $post)
                                    @if($post->id == $comment->post->id)
                                    <div class="card">
                                        <br>
                                        @foreach($post->comments as $comment)
                                        {{$comment->comment}} {{$comment->users->name}}<br>
                                        @endforeach
                                    </div>
                                    @else
                                    <h1>No data found </h1>
                                    @endif
                                    @endforeach
                                    @endif
                                    {{($post->comments)}}
                                </div>
                                <!-- or -->
                                @foreach($post->comments as $comment)
                                {{$comment->comment}} {{$comment->users->name}}<br>
                                @endforeach
                                {{$post->id}}
                                {{$comment->post->id}}
                                <div class="relative p-6 flex-auto">
                                    <p class="my-4 text-blueGray-500 text-lg leading-relaxed">

                                    </p>
                                </div>
                                <!--footer-->
                                <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                                    <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                        Close
                                    </button>
                                    <button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                    <!-- posted time ago -->
                    <p class="text-gray-700 text-sm">{{ $post->created_at->diffForHumans() }}</p>
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