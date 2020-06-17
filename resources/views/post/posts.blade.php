@extends('base')

@section('content')
  @if(!$posts->isEmpty())
    @foreach($posts as $post)
      <div class="row  shadow-lg p-3 m-5 bg-white rounded">

        <div class="col-12 text-center mt-5" >
          <h1>{{$post->title}}</h1>
          <small class="">{{$post->sub_title}}</small>
          <br>
          <strong class="">creado por <a href="/user/profile/{{$post->user_id}}">{{$post->name}}</a>  </strong>
        </div>

        <div class="col-6 mt-4">
            <p>{{substr($post->content, 0 , 800) }}...</p>
            <a href="/post/{{$post->slug }}" class="btn btn-outline-primary">LEER MÁS</a>
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
@endsection
