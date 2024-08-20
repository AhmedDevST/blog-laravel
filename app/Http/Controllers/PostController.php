<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $PostFromDb = Post::paginate(5);
        return view("posts.index", ["posts" => $PostFromDb ,'searchTerm' => '']);
    }

    public function create()
    {

        Gate::authorize("create", Post::class);
        $creators = User::all();
        return view("posts.create", ["creators" => $creators]);
    }

    public function edit(Post $post)
    {
        Gate::authorize("create", $post);
        $creators = User::all();
        return view("posts.edit", ["post" => $post, "creators" => $creators]);
    }
    public function show(Post $post)
    {
        // $singlePost = Post::findOrFail($post);//model object
        //$singlePost = Post::where("id", $PostId)->first();//model object
        // $singlePost = Post::where("id", $PostId)->get(); //collection object
        // if (is_null($singlePost))
        //   return to_route("posts.index");
        $users = User::all();
        return view("posts.show", ["post" => $post, "users" => $users]);
    }

    public function store(PostRequest $request)
    {
        //get data
        //$data= request()->all();
        //dd($data);
        $title = $request->title;
        $description = $request->description;
        $PostCreator = $request->user();
        // Check if the request has a file and store it
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        } else {
            $path = null; // Or handle it differently if needed
        }
        //dd("post creator : ".$PostCreator." title : ".$title." description :".$description."");

        //store in database
        /*$post = new Post;
 
        $post->title = $title;
        $post->description = $description;
 
        $post->save();*/
        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $PostCreator->id,
            'image' => $path
        ]);
        session()->flash('success', 'post add successufly');
        //redirect
        return to_route("posts.index");
    }
    public function update($PostId, PostRequest $request)
    {
        //get data
        $title = $request->title;
        $description = $request->description;

        // dd("post creator : ".$PostCreator." title : ".$title." description :".$description."");
        //update in database
        $post = Post::find($PostId);
        Gate::authorize('update', $post);

        // Check if the request has a file and store it
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
        } else {
            $path = $post->image;
        }
        // $post->title = $title;
        //$post->description = $description;


        //$post->save();
        $post->update([
            "title" => $title,
            "description" => $description,
            'image' => $path
        ]);
        //redirect
        return to_route('posts.show', $PostId);
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('paramSearch');  // Get the search term from the query string

        $posts = Post::whereHas('user', function (Builder $query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        })->orWhere('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->orWhere('created_at', 'like', '%' . $searchTerm . '%')
            ->paginate(5);

        // Pass the search term to the view so it can be preserved
        return view('posts.index', ['posts' => $posts, 'searchTerm' => $searchTerm]);
    }

    public function destroy($PostId)
    {
        //delete from database
        $post = Post::find($PostId);
        Gate::authorize('delete', $post);
        $post->delete();
        return to_route('posts.index');
    }
}
