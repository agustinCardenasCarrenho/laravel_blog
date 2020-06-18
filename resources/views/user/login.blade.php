@extends('base')

@section('content')
<div style="margin-top : 96px">
<form class="form" id="login_form" >
    <div class="form-group">
        <label>Email</label>
        <input type="email" id="user_email" class="form-control">
    </div>
    <div class="form-group">
        <label> Contraseña</label>
        <input type="password" id="user_password" class="form-control">
    </div>
    <input type="submit" value="Login" class="btn btn-primary">
</form>
<hr>
<strong>No tienes cuenta? </strong> <a href="/user/new">Crea una</a>
</div>



<script >

let login_form = document.getElementById('login_form')
let user_email = document.getElementById('user_email')
let user_password = document.getElementById('user_password')

login_form.addEventListener('submit' , function(e){
    
  e.preventDefault()
  let data = {
    'email' : user_email.value,
    'password' : user_password.value
  }

  fetch('/user/login', {
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