<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use App\Posts;
use App\User;


class PostController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts(){
        $posts = DB::table('posts')
        ->join('users','users.id' , '=' , 'posts.user_id')
        ->select('posts.title', 'posts.sub_title' , 'posts.image' ,  'posts.content' , 'posts.slug', 'posts.user_id', 'users.name' )
        ->get();
        return view('post/posts' , array('posts' => $posts , 'title' => 'INICIO'));
    }

    public function getPost($slug){
      $post = DB::table('posts')
      ->join('users','users.id' , '=' , 'posts.user_id')
      ->select('posts.title', 'posts.sub_title' , 'posts.image' ,  'posts.content' , 'posts.slug', 'posts.user_id', 'users.name' )
      ->where('slug' , $slug)
      ->first();
      return view('post/post',array('post' => $post , 'title' => $post->title));
    }

    public function getPostsByUser($id){
      $posts = Posts::where('user_id' , $id )->get();
      $user = User::where('id' , $id)->first();
      return view('post/profile' , array('posts' => $posts ,'user' => $user , 'title' => 'PERFIL DE : '.$user->name));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

      if(!session('user')){
        return Redirect::to('/post');
      }

      if($request->method() == 'GET'){
        return view('post/new_post' , array('title' => 'NUEVO POST'));
      }else{
        Posts::create([
          'title' => $request->post_title,
          'sub_title' => $request->post_sub_title,
          'content' => $request->post_content,
          'image' => $request->post_image,
          'slug' => str_replace(' ','-', $request->post_title),
          'user_id' => session('user')[1]
        ]);
        return response('O.K' , 200)->header('Content-Type', 'text/plain');
      }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        if(!session('user')){
            return Redirect::to('/post');
        }

        if(Posts::where('id' , $id)->first()){
            Posts::where('id', $id)->delete();
            return back()->withInput();
        }else{
            return response('bad' , 500)->header('Content-Type', 'text/plain');
        }

    }
}
