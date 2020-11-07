<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Post extends Model
{
    protected $guarded=[];

    public function user(){
        return $this->belogsTo(User::class,'user_id'); 
    }

    public function finduser(Post $post){

        $id=$post->user_id;
        
        return $user=User::find($id);
    }

    public function getcomments(Post $post){
        $id=$post->id;

        return $comment=Comment::latest()->where('post_id',$id)->get();
        

        // $friends = DB::table('friends')
        // ->where('user1_id', $id)
        // ->where('user2_id', auth()->user()->id)
        // ->get();
    }

    public function getlikes(Post $post){

        $id=$post->id;
        $like=Like::latest()->where('post_id',$id)->count();

        return $like;
    }

    public function checklike(User $user,Post $post){

       if($like=Like::latest()->where('user_id',$user->id)->where('post_id',$post->id)->count()>=1){
        return false;
    }

        else return true;

        



    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function like(){
        return $this->hasMany(Like::class);
    }

    
}
