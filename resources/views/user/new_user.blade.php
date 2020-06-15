@extends('base')

@section('content')
  <div style="margin-top : 96px">
    <form class="form" id="new_user_form" >

      <div class="form-group">
        <label>Nombre</label>
        <input type="text" id="user_name" class="form-control">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" id="user_email" class="form-control">
      </div>

      <div class="form-group">
        <label> Contraseña</label>
        <input type="password" id="user_password" class="form-control">
      </div>

      <div class="form-group">
        <label >Acerca de mi</label>
        <input type="text" id="user_about_me" class="form-control">
      </div>

      <div class="form-group">
        <label >Avatar</label>
        <input type="text" id="user_avatar" class="form-control">
      </div>

      <div class="form-group">
        <label >Color</label>
        <input type="color" id="user_background_color" class="form-control">
      </div>
      <input type="submit" value="Crear cuenta" class="btn btn-primary">

    </form>
  </div>


  <script type="text/javascript">

    let login_form = document.getElementById('new_user_form')

    let user_email = document.getElementById('user_email')
    let user_password = document.getElementById('user_password')
    let user_name = document.getElementById('user_name')
    let user_about_me = document.getElementById('user_about_me')
    let user_avatar = document.getElementById('user_avatar')
    let user_background_color = document.getElementById('user_background_color')


    login_form.addEventListener('submit' , function(e){
      e.preventDefault()

      let data = {
        'email' : user_email.value,
        'password' : user_password.value,
        'name' : user_name.value,
        'about_me' : user_about_me.value,
        'avatar' : user_avatar.value,
        'background_color' : user_background_color.value
      }

      fetch('/user/new', {
        headers :{
          "Content-Type": "application/json",
          "Accept": "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
        credentials: "same-origin",
        method: 'POST',
        body: JSON.stringify(data)
      }).
      then(function(response){
        if(response.status == 200){
          window.location.href = '/post'
        }else{
          alert('mal')
        }
      })

    })
  </script>
@endsection
