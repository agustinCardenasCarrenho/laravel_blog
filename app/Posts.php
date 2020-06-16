<?php

namespace App;


use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

class Posts extends MongoModel
{
      protected $connection = 'mongodb';
      protected $collection = 'posts';

     protected $fillable = ['title', 'sub_title' , 'content' , 'image', 'user_id'];
}
