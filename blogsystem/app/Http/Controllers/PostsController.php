<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Route;
use App\Like;

class PostsController extends Controller
{
    

    public function index(){

        $post=Post::latest()->paginate(4);


       return view('posts.index',['posts'=>$post]);
        

    }
    
    public function show($id){

        $post=Post::find($id);

        $comment=Comment::latest()->where('post_id',$post->id)->get();


        return view('posts.show',['posts'=>$post,'comments'=>$comment]);


    }

    public function storecomment(){


        $comment= new Comment();
        $comment->comment= request('comment');
        $comment->user_id = auth()->user()->id;
        $comment->post_id =  Route::current()->Parameter('post');
        $comment->save();
        $id=Route::current()->Parameter('post');
        $post=Post::find($id);

        return view('posts.show',['posts'=>$post]);
        

    }

    


    public function create(){
        return view('posts.create');
    }

    public function store(){
    //    Post::create(request()->validate([
    //     'title'=> 'required',
    //     'body' => 'required',
    //     'image' => 'required'
    //     ]));
        $post= new Post();
        $post->title=request('title');
        $post->body=request('body');
        $post->image=request('image');
        $post->user_id=auth()->user()->id;
        $post->save();
        
             return redirect(route('posts.index'));
    }


    public function edit($id){

        $post= Post::find($id);

        return view('posts.edit',['posts'=>$post]);
    }

    public function update($id){
        
        $post=Post::find($id);

        $post->title=request('title');
        $post->body=request('body');
        $post->image=request('image');
        $post->user_id=auth()->user()->id;
        $post->save();

        return view('posts.show',['posts'=>$post]);
    }


    public function destroy($id){

        $post=Post::findOrFail($id);
        $post->delete();
        return redirect(route('posts.index'));

    }

    public function destroycomment($cid){
        
        $id=Route::current()->Parameter('post');
        $cid=Route::current()->Parameter('comment');
        $post=Post::find($id);
        $comment=Comment::findOrFail($cid);
        $comment->delete();

        return view('posts.show',['posts'=>$post]);
    }

    public function storelike(Post $post){

        $posts=Post::find($post->id);
        
        $like= new Like();
        $like->user_id = auth()->user()->id;
        $like->post_id = $post->id;
        $like->save();

        return view('home');
    }
 public function destroylike($id){


 }




}
