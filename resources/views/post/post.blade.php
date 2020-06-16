@extends('base')
@section('content')
<div class="row mt-5">
  <div class="col-12 text-center mt-5" >
    <h1>{{$post['title']}}</h1>
    <small class="">{{$post['sub_title']}}</small>
    <br>
    <strong class="">creado por   </strong>
  </div>
  <div class="col-12 mt-5">
      <img src="{{$post['image']}}" alt="" style="width:100%">
  </div>
  <div class="col-12 mt-5">
      <p>{{$post['content']}}</p>
  </div>
</div>
@endsection
