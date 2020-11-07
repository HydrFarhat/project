<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Route ;
use App\Post;

class CommentController extends Controller
{
 
    public function index(){

    }

    public function create(){

        return view('posts.show');

    }

    public function store(){
        
        $comment= new Comment();
        $comment->comment= request('comment');
        $comment->user_id = auth()->user()->id;
        $comment->post_id =  Route::current()->Parameter('post');
        $comment->save();
        $id=Route::current()->Parameter('post');
        $post=Post::find($id);
        
        return redirect('/home');
    }


   



}
