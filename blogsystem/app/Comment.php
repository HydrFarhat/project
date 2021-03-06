<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    

    public function post(){
        return $this->belongsTo(Post::class,'post_id');
    }

    public function finduser($id){

        return User::find($id);
    }


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
