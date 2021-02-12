<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PostInfo;
use App\Category;
use App\Tag;
Use App\User;
use App\Policies\PostPolicy;

class Post extends Model
{
    protected $table = "posts";

    public function postInfo(){
        return $this->hasOne('App\PostInfo');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

     public function user(){
        return $this->belongsTo('App\User');
    }
}
