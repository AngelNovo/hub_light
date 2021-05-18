@extends("front.layout.app")
{{-- Css --}}
<link rel="stylesheet" href={{asset("/css/front/contingut.css")}}>
@section("content")
<div class="content">
    {{-- Header --}}
    <div class="header-contingut">
        {{-- Usuari --}}
        <a href="{{asset('/usuaris/'.$results->id_user)}}">
            <div>
                <img src={{asset("images/perfil/usuarios/".$results->foto_perfil)}} class="header-perfil-img" title="Perfil">
            </div> 
        </a>  
        <h2>{{$results->titulo}}</h2>
        <p>{{$amistad}}</p>
    </div>
    {{-- Contingut --}}
    @if ($results->tipus_contingut==1)
        {{-- Contingut Imatge --}}
        <div class="contingut-principal">
            <img class="img-fluid" src="{{asset('/contenido/1/'.$results->url)}}">
        </div>
    @else
        {{-- Contingut Video --}}
        @if ($results->tipus_contingut==4)
            <div class="contingut-principal" style="background-image:url({{asset('/contenido/1/'.$results->portada)}});">
                <video controls="controls" style="cursor: pointer;" src={{asset('/contenido/4/'.$results->url)}} alt="Arxiu" data-toggle="tooltip" data-placement="right" class="embed-responsive-item"></video>
            </div>
        @endif
        {{-- Contingut Musica --}}
        @if ($results->tipus_contingut==3)
            <div class="contingut-principal" style="background-image:url({{asset('/contenido/1/'.$results->portada)}});">
                <audio controls="controls" style="cursor: pointer;" src={{asset('/contenido/3/'.$results->url)}} alt="Arxiu" data-toggle="tooltip" data-placement="right" class="music-arxiu"></audio>
            </div>
        @endif
    @endif
    <div class="footer-contingut">
        <div class="header-footer-contingut">
            <i class="fa pe-7s-like" data-toggle="Me gusta"> </i>
            <i class="fa pe-7s-paper-plane" title="Enviar"> </i>
        </div>
    </div>        

</div>
{{-- Scripts --}}
<script>    
    // Document Ready
    $(document).ready(function(){
        // Marcar Navbar
        $(".isSelected").removeClass("isSelected");
    });
</script>
@endsection
