@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href={{route('post.index')}}> Go back </a>
            <h1>Post Details</h1>
            <div class="card">
                <!-- table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">image</th>
                            <th scope="col">name</th>
                            <th scope="col">detail</th>
                            <th scope="col">create by</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td><img src="{{asset('/storage/postfolder/'.$post->image)}}" width="150" height="150"></td>
                            <th scope="row">{{$post->name}}</th>
                            <td>{{$post->detail}}</td>
                            <td>{{$post->users->name}}</td>
                        </tr>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection