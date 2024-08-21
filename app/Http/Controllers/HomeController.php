<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $editors = User::role('Editor')->take(4)->get();
        $categories = Category::withCount('posts')->get();
        $tags = Tag::all();
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
        ->paginate(10);
    
        return view("subscriber.home", ["posts" => $posts, "editors" => $editors, "categories" => $categories, "tags" => $tags, "query" => $searchTerm]);
    }
}
