<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

     protected $fillable = ['title', 'sub_title' , 'content' , 'image', 'user_id', 'slug'];
}
