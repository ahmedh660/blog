<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class postscontroll extends Controller
{
    public function index()
    {
        $postfromDb = Post::all();
        return(view('posts.index',['posts'=>$postfromDb]));

    }

 public function show(POST $post){


        // $showfromDb =post::find($postID);
        // $showfromDb =post::where('id',$postID)->first()
        //if (is_null($showfromDb)) {
        // return to_route('posts.index');
        //}

        return view('posts.show',['post'=>$post]);
 }

 public function create(){

        $users = User::all();
        return view('posts.create',['users'=>$users]);

 }

public function store(){

//    $title = request()->title;
//    $description = request()->description;
//    $user_id = request()->select;
//    Post::created(
//        ['title'=>$title,'description'=>$description,'user_id'=>$user_id]
//    );
//    return to_route('posts.index');

    $post =new Post();

        $post -> title = request()-> title;
        $post -> description = request()-> description;
        $post -> user_id = request()-> select;
        $post->save();
        return to_route('posts.index');

}
public function edit (Post $post){

        $users = User::all();
        return view('posts.edit',['users'=> $users],['post'=>$post]);

}
public function update($postId){

        $title = request()->title;
        $description = request()->description;
        $select_creator = request()->select;
        $updatepost = post::find($postId);
        $updatepost -> update(['title'=>$title,'description'=>$description,'user_id'=>$select_creator]);
        return to_route('posts.show',$postId);

}
public function destroy ($postId){
        $destorypost = post::find($postId);
        $destorypost->delete();
       return to_route('posts.index');
}

}

