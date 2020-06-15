@extends('base')
<div class="row mt-5" style="background-color: {{$user->background_color}};">

  <div class="col-3">

  </div>
  <div class="col-3  m-5" style="mix-blend-mode: difference;color: #ffff">
      <h1 class="mb-0"><strong>{{$user->name}}</strong></h1>
      <small>Miembro desde {{date_format($user->created_at , 'd M Y')}}</small>
      <br>
      <p class="mt-3">{{$user->about_me}}</p>
  </div>

  <div class="col-3 mt-5">
    <img src="{{$user->avatar}}" alt="" class="img-fluid rounded-circle">
  </div>
</div>
@section('content')

@if(!$posts->isEmpty())
@foreach($posts as $post)
  <div class="row shadow-lg p-3 m-5 bg-white rounded">
    <div class="col-12 text-center mt-5" >
      <h1>{{$post->title}}</h1>
      <small class="">{{$post->sub_title}}</small>
    </div>

    <div class="col-6 mt-4">
        <p>{{substr($post->content, 0 , 800) }}...</p>
        <a href="/post/{{$post->slug}}" class="btn btn-outline-primary">LEER MÁS</a>
    </div>

    <div class="col-6 mt-4">
      <img src="{{$post->image}}" alt="" class="img-fluid">
    </div>

  </div>
  <hr>
@endforeach
@else
<div class="row mt-5">
  <div class="alert alert-warning mt-5 w-100 text-center">
      NO HAY POSTS!!
  </div>
</div>
@endif

<style media="screen">

</style>
@endsection
