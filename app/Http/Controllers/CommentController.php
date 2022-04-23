<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function storeComment(Request $request)
    {
        $comment = new Comment(['comments' => $request->comment,'user_id' => $request->user_id,]);
        $post = Post::find($request->id);
        $comment = $post->comments()->save($comment);
        return redirect()->back();
    }



    public function editComment($commentID){
        $comment = Comment::findOrFail($commentID);
        return view('posts.edit', [
            'comment' => $comment,

            ]);
    }

    public function updateComment(Request $request,$commentID){
        $comment = Comment::findOrFail($commentID);
        Comment::findOrFail($commentID)->update([
            'comments' => $request->description,
        ]);
        return to_route('post.show',['id'=>$comment->commentable_id]);

    }

    public function deleteComment($commentID){

      $comment = Comment::findOrFail($commentID);
      $comment->delete();
      return to_route('post.show',['id'=>$comment->commentable_id]);
    }

    public function restoreComment($commentID){
        $comment = Comment::withTrashed($commentID)->where('id', $commentID)->first();
        $comment->restore();
        $comment->save();
        return to_route('post.show', ['id'=>$comment->commentable_id]);

    }
}
