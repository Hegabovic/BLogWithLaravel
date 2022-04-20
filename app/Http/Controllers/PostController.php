<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {

        $posts = Post::withTrashed()->paginate(10);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $title = $request->title;
        $description = $request->description;
        $use_id = $request->user_id;

        Post::create([
            'user_id' => $use_id,
            'title' => $title,
            'description' => $description,
        ]);
        return redirect(route('posts.index'));
    }

    public function show($postID)
    {
        $post = Post::findOrFail($postID);
        return view('posts.show', [
            'post' => $post,
        ]);
    }


    public function edit($postID)
    {
        $post = Post::findOrFail($postID);
        $users = User::all();
        return view('posts.edit', [
            'post' => $post,
            'users' => $users,
        ]);
    }

    public function update(Request $request, $postID)
    {
        $username = User::where('id',$request->user_id)->first()->name;
        Post::findOrFail($postID)->update([
            'title' => $request->title,
            'description' => $request->description,
            'post_creator'=> $username,
        ]);
        return (redirect(route('posts.index')));
    }

    public function delete($postID)
    {
        Post::findOrFail($postID)->delete();
        return (redirect(route('posts.index')));
    }

    public function restore($postID)
    {
        $post = Post::withTrashed($postID)->where('id', $postID)->first();
        $post->restore();
        $post->save();

        return to_route('posts.index');
    }

}






