<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    //
    public function store(Request $request, $postId)
    {
        //validate data
        $request->validate([
            "description_comment" => ["required", "min:5"],
        ]);
        //get data
        $user_id =$request->user()->id;
        $description_comment = $request->description_comment;
        //add to db
        $comment = Comment::create([
            "user_comment" => $user_id,
            "description_comment" => $description_comment,
            "post_id" => $postId,
        ]);
        //redirect route
        return to_route('posts.show', $postId);
    }

    public function destroy($commentId)
    {
        $comment = Comment::find($commentId);
        Gate::authorize('delete', $comment);
        $postid = $comment->post_id;
        $comment->delete();
        return to_route('posts.show', $postid);
    }
}
