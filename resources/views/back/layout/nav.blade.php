
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
        <div class="sidebar-brand">
          <a href="#">Control panel</a>
          <div id="close-sidebar">
            <i class="fas fa-times"></i>
          </div>
        </div>
        <div class="sidebar-header">
          <div class="user-pic">
            @if (Auth::user()->foto===null)
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                alt="User picture">
                @else
                <img class="img-responsive img-rounded" src={{asset("images/perfil/usuarios/".Auth::user()->foto)}}
                alt="User picture">
            @endif
          </div>
          <div class="user-info">
            <span id="nom" class="user-name">{{ Auth::user()->name }}</span>
            <span id="rol" class="user-role"></span>
            <span class="user-status">
              @if (Auth::user()->actiu===1)
                <i class="fa fa-circle con"></i>
                <span>Conectado</span>
                @else
                    <i class="fa fa-circle nocon"></i>
                    <span>No conectado</span>
              @endif
            </span>
          </div>
        </div>
        <!-- sidebar-search  -->
        <div class="sidebar-menu">
          <ul>
            <li class="header-menu">
              <span>General</span>
            </li>
            <li class="sidebar-dropdown">
              <a href="#" id="#page_nav_perfil">
                <i class="fa fa-tachometer-alt"></i>
                <span>Perfil</span>
              </a>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>Users</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#">Adminify

                    </a>
                  </li>
                  <li>
                    <a href="#">Notification</a>
                  </li>
                  <li>
                    <a href="#">Ban</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="sidebar-dropdown">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>User type</span>
              </a>
              <div class="sidebar-submenu">
                <ul>
                  <li>
                    <a href="#">Crud</a>
                  </li>
                </ul>
              </div>
            </li>

        </div>
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
      <div class="sidebar-footer">
        <a href={{ url('/logout') }}>
          <i class="fa fa-power-off"></i>
        </a>
      </div>
    </nav>

