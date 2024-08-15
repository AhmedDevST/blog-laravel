<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $PostFromDb =  Post::all();
        return view("posts.index", ["postes" => $PostFromDb]);
    }

    public function create()
    {
        $creators = User::all();
        return view("posts.create",["creators"=> $creators]);
    }

    public function edit(Post $post)
    {
        $creators = User::all();
        return view("posts.edit", ["post" => $post,"creators"=> $creators]);
    }
    public function show(Post $post)
    {
       // $singlePost = Post::findOrFail($PostId);//model object
        //$singlePost = Post::where("id", $PostId)->first();//model object
        // $singlePost = Post::where("id", $PostId)->get(); //collection object
        // if (is_null($singlePost))
        //   return to_route("posts.index");
        return view("posts.show", ["post" => $post]);
    }

    public function store()
    {
        //validate data
        request()->validate([
            "title"=> ["required","min:3"],
            "description" => ["required","min:5"],
            "created_by" => ["required","exists:users,id"],
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
            'user_id'=> $PostCreator
        ]);
        //redirect
        return to_route("posts.index");
    }
    public function update($PostId)
    {
         //validate data
         request()->validate([
            "title"=> ["required","min:3"],
            "description" => ["required","min:5"],
            "created_by" => ["required","exists:users,id"],
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
            "title"=> $title,
            "description"=> $description,
            'user_id'=> $PostCreator
        ]);
        //redirect
        return to_route('posts.show', $PostId);
    }
    public function destroy($PostId)
    {
        //delete from database
        $post = Post::find($PostId);
        $post->delete();
        return to_route('posts.index');
    }
}
