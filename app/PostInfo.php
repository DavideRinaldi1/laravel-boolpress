<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class PostInfo extends Model
{
    protected $table = "posts_information";

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
