<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
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
