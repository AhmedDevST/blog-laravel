<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    //
    public function index()
    {
        $editors = User::role('Editor')->take(4)->get();
        $categories = Category::withCount('posts')->get();
        $recentPosts = Post::latest()->take(3)->get();
        $tags = Tag::all();
        $posts = Post::with('tags')
            ->withCount('comments')
            ->paginate(10);
        return view("subscriber.home", ["posts" => $posts, "editors" => $editors, "categories" => $categories, "tags" => $tags, "recentPosts" => $recentPosts]);
    }
    public function show(Post $post)
    {
        return view('subscriber.Postdetails', ['post' => $post]);
    }
    public function search(Request $request)
    {

        $searchTerm = $request->input('query');  // Get the search term from the query string
        $posts = Post::whereHas('user', function (Builder $query) use ($searchTerm) {

            $query->where('name', 'like', '%' . $searchTerm . '%');
        })
            ->orWhere('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->orWhere('created_at', 'like', '%' . $searchTerm . '%')
            ->orWhereHas('category', function (Builder $query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->orWhereHas('tags', function (Builder $query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->with('tags')
            ->withCount('comments')
            ->paginate(5);

        return view("subscriber.resultsSearch", ["posts" => $posts, "query" => $searchTerm]);
    }
    public function searchByTags($tag)
    {
        $posts = Post::whereHas('tags', function (Builder $query) use ($tag) {
            $query->where('name', $tag); // Use exact match for tag names
        })
            ->with('tags')
            ->withCount('comments')
            ->paginate(5); // Paginate results

        return view("subscriber.resultsSearch", [
            "posts" => $posts,
            "query" => $tag
        ]);
    }
}
