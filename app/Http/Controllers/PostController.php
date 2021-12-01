<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = post::where('user_id', 1)->count();
        // $postCount = post::count();
        $posts = post::orderBy('created_at', 'desc')->get();
        // $posts = post::all();
        return view('allpost')->with('posts', $posts);

        // return $post;


        // $posts = post::all();
        // $posts = post::all();
        // $sample = User::where('name', "Ahmed Mansoor")->first();
        // return $sample;

        // $posts = post::where('user_id', Auth()->user()->id)->get();
        // return view('createpost')->with('posts', $posts);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        // $post = post::where('user_id', 1)->count();
        // $postCount = post::count();
        // $posts = post::all();
        // return $post;


        // return view('allpost')->with('posts', $posts);
        // $posts = post::all();
        // $sample = User::where('name', "Ahmed Mansoor")->first();
        // return $sample;

        // $posts = post::orderBy('created_at', 'desc')->get();
        $posts = post::where('user_id', Auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('profile')->with('posts', $posts);
        $posts = post::all();
        return $posts;
        // return view('createpost')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filenamewithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $path = $request->file('image')->storeAs('public/postfolder', $fileNameToStore);


        $post = new post();
        $post->name = $request->input('postname');
        $post->user_id =  Auth()->user()->id;
        $post->detail = $request->input('detail');
        $post->image = $fileNameToStore;

        $post->save();


        return redirect()->back()->with(session()->flash('alert-success', 'Post Added'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        $comment = new Comment();
        $comment->text =  $request->input('comment');
        $comment->user_id = Auth()->user()->id;
        $comment->post_id = $request->input('postid');
        $comment->save();

        $post = post::find($request->input('postid'));
        return view('postdetail')->with('post', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function modal($id)
    {
        $post = post::find($id);
        return view('modal')->with('post', $post);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('postdetails')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        return view('editpost')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = post::find($request->input('id'));
        $post->name = $request->input('postname');
        $post->user_id =  Auth()->user()->id;
        $post->detail = $request->input('detail');

        if (file_exists($request->file('image'))) {
            $filenamewithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/postfolder', $fileNameToStore);

            $post->image = $fileNameToStore;
            // File::delete($request->input('existingimg'));
            @unlink('public/postfolder/' . $request->input('existingimg'));
        } else {

            $post->image = $request->input('existingimg');
        }

        $post->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Post Updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}