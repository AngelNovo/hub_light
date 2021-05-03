<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#">Hub Light</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href={{url('')}}><i class="pe-7s-home" title="Inicio"></i> <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa pe-7s-star" title="Recomendados"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="pe-7s-search" title="Explorar"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa pe-7s-medal" title="Destacados"> </i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa pe-7s-upload" title="Subir contenido"> </i></a>
      </li>
      @if (!empty(Auth::user()))
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src={{asset("images/perfil/usuarios/".Auth::user()->foto)}} class="header-perfil-img">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <p>¡Bienvenido {{Auth::user()->name}}!</p>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>         
          <a class="dropdown-item" href={{url('logout')}}><i class="fa pe-7s-back-2" title="Cerrar sesión"> </i>Cerrar sesión</a>
        </div>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href={{url('login')}}><i class="fa pe-7s-user" title="Registrarse/Iniciar sesion"> </i></a>
      </li>
      @endif
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
