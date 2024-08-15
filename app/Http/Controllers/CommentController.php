<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store($postId)
    {
        //validate data
        request()->validate([
            "user_comment" => ["required", "exists:users,id"],
            "description_comment" => ["required", "min:5"],
        ]);
        //get data
        $user_comment = request()->user_comment;
        $description_comment = request()->description_comment;
        //add to db
        $comment = Comment::create([
            "user_comment" => $user_comment,
            "description_comment" => $description_comment,
            "post_id" => $postId,
        ]);
        //redirect route
        return to_route('posts.show', $postId);
    }

    public function destroy($commentId)
    {
        $comment = Comment::find($commentId);
        $postid = $comment->post_id;
        $comment->delete();
        return to_route('posts.show', $postid);
    }
}
