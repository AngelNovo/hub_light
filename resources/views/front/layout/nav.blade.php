{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-light">
  {{-- Logo --}}
  <a class="navbar-brand" href={{url('')}}>Hub Light</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  {{-- NavMenu --}}
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      {{-- Home --}}
      <li class="nav-item">
        <a class="nav-link" href={{url('')}} id="Nav-Inicio"><i class="pe-7s-home" title="Inicio"></i> <span class="sr-only"></span></a>
      </li>
      {{-- Recomenats --}}
      <li class="nav-item">
        <a class="nav-link isSelected" href={{url('/recomendados')}} id="Nav-Recomendados"><i class="fa pe-7s-star" title="Recomendados"></i></a>
      </li>
      {{-- Explorar --}}
      <li class="nav-item">
        <a class="nav-link" href={{url('/explorar')}} id="Nav-Explorar"><i class="pe-7s-search" title="Explorar"></i></a>
      </li>
      {{-- Destacats --}}
      <li class="nav-item">
        <a class="nav-link" href={{url('/destacados/vista')}} id="Nav-Destacados"><i class="fa pe-7s-medal" title="Destacados"> </i></a>
      </li>
      {{-- Perfil --}}     
      @if (isset(Auth::user()->id))
        {{-- Usuari Identificat --}}
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa pe-7s-upload" title="Subir contenido"> </i></a>
        </li>
        <li class="nav-item enable-chat-modal">
          <a class="nav-link" data-toggle="modal" data-target="#ChatModal"><i class="fa pe-7s-mail" title="Mis mensages"> </i></a>
        </li>
        {{-- Notificaciones --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa pe-7s-news-paper" title="Notificaciones"> </i></a>
          <div class="dropdown-menu notificaciones-div" aria-labelledby="navbarDropdown">
          </div>
        </li>
        {{-- Desplegable Perfil --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="Nav-Perfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src={{asset("images/perfil/usuarios/".Auth::user()->foto)}} class="header-perfil-img" title="Perfil">
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if (Auth::user()->alies==null)
              <p>¡Bienvenido {{Auth::user()->name}} !</p>
            @else
              <p>¡Bienvenido {{Auth::user()->alies}} !</p>
            @endif             
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href={{url("/usuaris/".Auth::user()->id)}}><i class="fa pe-7s-id" title="Ver perfil"> </i><span>Perfil</span></a>
            <a class="dropdown-item"href={{url("/opciones/".Auth::user()->id)}}><i class="fa pe-7s-config" title="Editar perfil"> </i>Opciones</a>
            {{-- Enllaç a backend --}}
            @if (Auth::user()->es_admin===1)
              <a class="dropdown-item" href={{url('/back/admin/home')}}> <i class="fa pe-7s-server" title="Subir contenido"> </i><span>Backoffice</span></a>
            @endif
            <a class="dropdown-item" href={{url('logout')}}><i class="fa pe-7s-back-2" title="Cerrar sesión"> </i><span>Cerrar sesión</span></a>
          </div>
        </li>
      @else
        {{-- Usuari fora identificar --}}
        <li class="nav-item">
          <a class="nav-link" href={{url('login')}}><i class="fa pe-7s-user" title="Registrarse/Iniciar sesion"> </i></a>
        </li>
      @endif
    </ul>
    {{-- Cercador --}}
    <form class="form-inline my-2 my-lg-0">
        <div title="Busca el conteido que desees: @usuario, -contenido, #etiqueta">          
          <input type="text" name="buscador" id="buscador" list="cercador">
          <button class="btn btn-outline-success my-2 my-sm-0" id="submit-buscador" type="submit">Search</button>
        </div>
        <datalist id="cercador"> </datalist>
    </form>
  </div>
</nav>
<script>
  $(document).ready(function(){
    buscador();
    getNotificaciones();
    $("#submit-buscador").on("click",function(e){
      e.preventDefault();
      var inputvalue=$("#buscador").val();
      console.log();
      var type=inputvalue[0];
      var id=$('option[value="'+inputvalue+'"]').attr("data-id");
      console.log(type);
      switch(type){
        case  "@":
        if(id!=undefined){
          window.location= "/usuaris/"+$('option[value="'+inputvalue+'"]').attr("data-id");
        }
        break;
        case "-":
          window.location= "/contingut/"+$('option[value="'+inputvalue+'"]').attr("data-id");
          break;
        case "#":

          break;

      }
    });
  });
  function buscador() {
    $.ajax({
        url: "/buscador",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        dataType: 'json',
        success: function(data){                   
          $.each(data[0], function(index,element){
            var option=$("<option>");
            option.val("@"+element.name);
            option.attr("data-id",element.id);
            $("#cercador").append(option);
          });   
          $.each(data[1], function(index,element){
            var option=$("<option>");
            option.val("-"+element.titulo);
            option.attr("data-id",element.id);
            $("#cercador").append(option);
          });    
          $.each(data[2], function(index,element){
            var option=$("<option>");
            option.val("#"+element.nombre);
            option.attr("data-id",element.id);
            $("#cercador").append(option);
          });  
        }
    });
  }

  function getNotificaciones(){
    $.ajax({
      url: "/notificaciones",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        dataType: 'json',
        success: function(data){     
          $(".notificaciones-div").append($("<p>").text("Peticiones de amistad"));
          $.each(data[0], function(index,element){
            console.log(element);
            let li=$("<a>");
            li.addClass("dropdown-item");
            li.text(element.explicacio); 
            let bclose=$("<button>");
            bclose.addClass("btn");
            bclose.addClass("btn-danger");
            bclose.addClass("notification-buttons");
            let icon=$("<i>");
            icon.addClass("pe-7s-close");
            bclose.append(icon);
            li.append(bclose);
            $(".notificaciones-div").append(li);
          }); 
          $(".notificaciones-div").append($("<div>").addClass("dropdown-divider"));  
          $(".notificaciones-div").append($("<p>").text("Interacciones"));
          $.each(data[1], function(index,element){
            console.log(element);
            let canN=true;
            let descripcio="Has recibido un ";
            if(element.megusta==1&&element.comentario!=null&&element.comentario!=""){
              descripcio+="like";
            }else if(element.megusta==1){
              descripcio+="like y comentario";
            }else if(element.comentario!=null&&element.comentario!=""){
              descripcio+="comentario"; 
            }else{
              canN=false;
            }
            if(canN){
              let li=$("<a>");
              li.addClass("dropdown-item");
              li.text(descripcio); 
              let bclose=$("<button>");
              bclose.addClass("btn");
              bclose.addClass("btn-danger");
              bclose.addClass("notification-buttons");
              let icon=$("<i>");
              icon.addClass("pe-7s-close");
              bclose.append(icon);
              li.append(bclose);
              $(".notificaciones-div").append(li);
            }
          }); 
          $(".notificaciones-div").append($("<div>").addClass("dropdown-divider"));
          $(".notificaciones-div").append($("<p>").text("Avisos"));
          $.each(data[2], function(index,element){
            console.log(element); 
            let li=$("<a>");
            li.addClass("dropdown-item");
            li.text(element.explicacio); 
            let bclose=$("<button>");
            bclose.addClass("btn");
            bclose.addClass("btn-danger");
            bclose.addClass("notification-buttons");
            let icon=$("<i>");
            icon.addClass("pe-7s-close");
            bclose.append(icon);
            li.append(bclose);
            $(".notificaciones-div").append(li);
          }); 
          $(".notificaciones-div").append($("<div>").addClass("dropdown-divider"));
        }
    });
  }
</script>