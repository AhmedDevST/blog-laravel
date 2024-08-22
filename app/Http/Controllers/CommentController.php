<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user_id = $request->user()->id;
        $description_comment = $request->description_comment;
        //add to db
        $comment = Comment::create([
            "user_comment" => $user_id,
            "description_comment" => $description_comment,
            "post_id" => $postId,
        ]);

        // Redirect based on user role
        $user = User::find(Auth::user()->id);
        if ($user->hasRole('Admin') || $user->hasRole('Editor')) {
            return to_route('posts.show', $postId);
        } elseif ($user->hasRole('Subscriber')) {
            return to_route('home.posts.show', $postId);
        }
        return to_route("home");
    }

    public function destroy($commentId)
    {
        $comment = Comment::find($commentId);
        Gate::authorize('delete', $comment);
        $postId = $comment->post_id;
        $comment->delete();
        // Redirect based on user role
        $user = User::find(Auth::user()->id);
        if ($user->hasRole('Admin') || $user->hasRole('Editor')) {
            return to_route('posts.show', $postId);
        } elseif ($user->hasRole('Subscriber')) {
            return to_route('home.posts.show', $postId);
        }
        return to_route("home");
    }
}
