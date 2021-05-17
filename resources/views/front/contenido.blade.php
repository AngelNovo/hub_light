@extends("front.layout.app")
<link rel="stylesheet" href={{asset("/css/front/contingut.css")}}>
@section("content")
<div class="content">
    <div class="header-contingut">
        <a href="{{asset('/usuaris/'.$results->url)}}">
            <div>
                {{-- <img src={{asset("images/perfil/usuarios/".$results->foto)}} class="header-perfil-img" title="Perfil"> --}}
            </div> 
        </a>             
    </div>
    @if ($results->tipus_contingut==1)
        <div class="contingut-principal">
            <img class="img-fluid" src="{{asset('/contenido/1/'.$results->url)}}">
        </div>
    @else
        
        @if ($results->tipus_contingut==4)
            <div class="contingut-principal" style="background-image:url({{asset('/contenido/1/'.$results->portada)}});">
                <video controls="controls" style="cursor: pointer;" src={{asset('/contenido/4/'.$results->url)}} alt="Arxiu" data-toggle="tooltip" data-placement="right" class="embed-responsive-item"></video>
            </div>
        @endif
        @if ($results->tipus_contingut==3)
            <div class="contingut-principal" style="background-image:url({{asset('/contenido/1/'.$results->portada)}});">
                <audio controls="controls" style="cursor: pointer;" src={{asset('/contenido/3/'.$results->url)}} alt="Arxiu" data-toggle="tooltip" data-placement="right" class="music-arxiu"></audio>
            </div>
        @endif
    @endif


</div>
<script>
    $(document).ready(function(){
    });
</script>
@endsection
