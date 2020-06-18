<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

      if(session('user')){
        return Redirect::to('/post');
      }
      
      if($request->method() == 'POST'){
          $user = User::where(array('email' => $request->email  , 'password' => md5($request->password)))->first();
          if($user){
            $user = array(
              'user_id' , $user->id,
              'user_name' , $user->name,
              'user_email' , $user->email
            );
            $request->session()->put('user', $user);
            return response('OK' , 200)->header('Content-Type', 'text/plain');
          }else{
            return response('BAD' , 500)->header('Content-Type', 'text/plain');
          }
          
      }else{
        return view('user/login' , array('title' => 'INICIO DE SESIÓN'));
      }
      
    }

    public function logout(Request $request){
      $request->session()->flush();
      return back()->withInput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

      if(cache('user_id')){
        return Redirect::to('/post');
      }

      if($request->method() == 'GET'){
        return view('user/new_user' , array('title' => 'REGISTRO') );
      }else{
        User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => md5($request->password),
          'about_me' => $request->about_me,
          'avatar' => $request->avatar,
          'background_color' => $request->background_color
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
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
