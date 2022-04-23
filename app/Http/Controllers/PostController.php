<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
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
        return view('posts.create', [
            'users' => $users
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $img = $request->file('fileUpload');
        $extension = $img->getClientOriginalExtension();
        $imgName = "post-" . uniqid() . ".$extension";
        $img->move(public_path("uploads/posts"), $imgName);
        $username = User::where('id', $request->user_id)->first()->name;

        Post::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'img' => $imgName,
            'post_creator' => $username,
        ]);
        return redirect(route('posts.index'));
    }

    public function show($postID)
    {

        $post = Post::findOrFail($postID);
        $users = User::all();
        $comments = Comment::withTrashed()->where('commentable_id', $postID)->get();
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments,
            'users' => $users,
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

    public function update(UpdatePostRequest $request, $postID)
    {
        $post = Post::findOrFail($postID);
        $imgName = $post->img;

        if ($request->hasFile('fileUpload')) {

            if ($imgName != null) {
                unlink(public_path('uploads/posts/'.$imgName));
            }
            $img = $request->file('fileUpload');
            $extension = $img->getClientOriginalExtension();
            $imgName = "post-" . uniqid() . ".$extension";
            $img->move(public_path("uploads/posts"), $imgName);
        }

        $username = User::where('id', $request->user_id)->first()->name;
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'post_creator' => $username,
            'img' => $imgName,
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






