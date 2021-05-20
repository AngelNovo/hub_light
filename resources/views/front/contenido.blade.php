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
            <div>
                <i class="fa pe-7s-like" id="like" data-toggle="Me gusta"> </i>
                <i class="fa pe-7s-paper-plane" title="Enviar"> </i>
            </div>            
        </div>
        <div class="border-bot">
            @foreach ($comentarios as $item)
                <div class="comentario">
                    <a href="{{asset('/usuaris/'.$item->id_usuari)}}">
                        <img class="foto-coment" src={{asset("images/perfil/usuarios/".$item->foto)}}>
                    </a>
                   <p class="text-comment">{{$item->comentario}}</p>
                </div>
            @endforeach
        </div>
        <div >
            @if (isset(Auth::user()->id))
                @if (Auth::user()->id!=$results->id_user)
                <form id="comentari">
                    <div class="form-group">
                        <img src={{asset("images/perfil/usuarios/".Auth::user()->foto)}} class="foto-coment">
                        <input type="checkbox" hidden name="megusta" id="megusta">
                        <textarea class="form-control" rows="4" name="comentario" id="mensaje"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit-comment">Envia</button>
                </form>
                @endif               
            @endif 
        </div>
    </div>        

</div>
{{-- Scripts --}}
<script>    
    // Document Ready
    $(document).ready(function(){
        // Marcar Navbar
        $(".isSelected").removeClass("isSelected");
        var megusta=$("#megusta").val();
        $(document).on("submit",function(e){
            e.preventDefault();
            enviaComent();
        });
        $("#like").on("click",function(e){

            if($("#megusta").prop("checked")){
                $("#megusta").prop("checked",false);
                $("#like").removeClass("meGusta");
            }else{
                $("#megusta").prop("checked",true);
                $("#like").addClass("meGusta");
            }
            enviaLike();
            
        });
    });

    function enviaComent(){
        var comentario=$("#mensaje").val();
        console.log(comentario);
        $.ajax({
        url: "/comment",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        dataType: 'json',
        data: {
            "id_contingut":{{$results->id}},
            "comentario":comentario
        },
        success: function(data){                   
           console.log("correcte");
        }
        });
    }

    function enviaLike(){
        var megusta;
        if($("#megusta").prop("checked")){
            megusta=1;
        }else{
            megusta=0;
        }
        $.ajax({
        url: "/comment",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        dataType: 'json',
        data: {
            "id_contingut":{{$results->id}},
            "megusta":megusta
        },
        success: function(data){                   
           console.log("correcte");
        }
        });
    }
    
    //id_contenido
    //megusta
    //comentario
</script>
@endsection