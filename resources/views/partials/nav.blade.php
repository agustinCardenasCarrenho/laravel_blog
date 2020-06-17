<nav class="navbar navbar-light bg-light mb-5 fixed-top">
  <a class="navbar-brand" href="/post">
    <img src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg  " width="30" height="30" alt="">
  </a>

  @if(cache('user_name'))
  <ul class="nav nav-pills">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{cache('user_name')}}</a>
      <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="/user/profile/{{cache('user_id')}}">Mi perfil</a>
          <a class="dropdown-item" href="/post/new">Nuevo Post</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/user/logout">Cerrar sesion</a>
        </div>
    </li>
  </ul>
  @else
  <a href="/user/login" class="btn">Iniciar sesion</a>
  @endif
</nav>
<style media="screen">

</style>
