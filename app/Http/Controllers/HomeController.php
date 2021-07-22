<?php

namespace App\Http\Controllers;

use App\Models\Country;

use App\Models\Post;

use App\Models\Comment;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
   public function getPosts(){
     return Post::all();
   }

   public function getPost($id){
     $post = Post::with('comments')->find($id);
     $post = response()->json($post);
     return $post;
   }

   public function getComment($id){
    $comment = Comment::with('post')->find($id);
    $comment = response()->json($comment);
    return $comment;
   }

   public function enterPost(){
    request()->validate([
        'title'=>'required',
        'content'=>'required',
    ]);

    $create = Post::create([
        'title'=>request('title'),
        'content'=>request('content'),
    ]);
    return $create;
   }

   public function update($id){
      request()->validate([
        'title'=>'required',
        'content'=>'required'
    ]);
    $success = Post::where('id','$id')->update([
        'title'=>request('title'),
        'content'=>request('content'),
    ]);

    return[
        "success"=>$success
    ];
   }

   public function delete($id){
    $success = $post->where('id','$id')->delete();
    return [
        'success'=>$success
    ];
   }

}