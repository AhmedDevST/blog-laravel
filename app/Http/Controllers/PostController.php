<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $PostFromDb = Post::paginate(5);
        return view("posts.index", ["posts" => $PostFromDb]);
    }

    public function create()
    {
        $creators = User::all();
        return view("posts.create", ["creators" => $creators]);
    }

    public function edit(Post $post)
    {
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

    public function store()
    {
        //validate data
        request()->validate([
            "title" => ["required", "min:3"],
            "description" => ["required", "min:5"],
            "created_by" => ["required", "exists:users,id"],
        ]);
        //get data
        //$data= request()->all();
        //dd($data);
        $title = request()->title;
        $description = request()->description;
        $PostCreator = request()->created_by;
        //dd("post creator : ".$PostCreator." title : ".$title." description :".$description."");

        //store in database
        /*$post = new Post;
 
        $post->title = $title;
        $post->description = $description;
 
        $post->save();*/
        $post = Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $PostCreator
        ]);
        //redirect
        return to_route("posts.index");
    }
    public function update($PostId)
    {
        //validate data
        request()->validate([
            "title" => ["required", "min:3"],
            "description" => ["required", "min:5"],
            "created_by" => ["required", "exists:users,id"],
        ]);
        //get data
        $title = request()->title;
        $description = request()->description;
        $PostCreator = request()->created_by;
        // dd("post creator : ".$PostCreator." title : ".$title." description :".$description."");
        //update in database
        $post = Post::find($PostId);

        // $post->title = $title;
        //$post->description = $description;
        //$post->user_id = $PostCreator;

        //$post->save();
        $post->update([
            "title" => $title,
            "description" => $description,
            'user_id' => $PostCreator
        ]);
        //redirect
        return to_route('posts.show', $PostId);
    }
    public function search()
    {
        $posts = Post::whereHas('user', function (Builder $query) {
            $query->where('name', 'like', '%' . request()->paramSearch . '%');
        })->orwhere('title', 'like', '%' . request()->paramSearch . '%')
            ->orWhere('description', 'like', '%' . request()->paramSearch . '%')
            ->orWhere('created_at', 'like', '%' . request()->paramSearch . '%')
            ->get();
        return view('posts.index', ['postes' => $posts]);
    }
    public function destroy($PostId)
    {
        //delete from database
        $post = Post::find($PostId);
        $post->delete();
        return to_route('posts.index');
    }
}
