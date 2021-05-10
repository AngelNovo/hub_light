@extends("front.layout.app")

@section("content")
@if (Auth::user()->id != $user->id)
<script>window.location= "/opciones/"+{{Auth::user()->id}}</script>
@endif
<link rel="stylesheet" href={{asset("/css/front/perfil.css")}}>

<div class="content">

        <div class="row">

                <div class="card hovercard">
                    <div class="cardheader" style="background-image: url({{asset('images/perfil/fondo/'.$user->fondo)}});">
    
                    </div>
                    <div class="avatar">
                        <label for="file-input">
                            <div class="upload-icon">
                                <img style="cursor: pointer;" src={{asset('images/perfil/usuarios/'.Auth::user()->foto)}} alt="Foto de perfil" data-toggle="tooltip" data-placement="right" title="Haz clic para cambiar la foto de perfil" class="foto-perfil">
                                </div>
                            </label>
                        <input id="file-input" name="foto" hidden type="file"/>    
                    </div>
                    @if ($user->actiu==1)
                    <div class="conectado active"></div>
                    @else
                    <div class="conectado"></div>
                    @endif
                    @if ($user->deshabilitat==1 || $user->suspes==1)
                    <div class="estado" style="background-color: rgb(255, 158, 158)"><i class="pe-7s-attention"></i></div>
                    @else
                        @if (!empty($user->email_verified_at))
                            <div class="estado" style="background-color: #a0c8fd"><i class="pe-7s-like2"></i></div>
                        @else
                            <div class="estado"></div>
                        @endif
                    @endif
                    <div class="info">
                        <div class="title">
                            <h1>{{$user->name}}</h1>
                        </div>
                        <div class="desc" id="Alias-Input">Alias: <span>{{$user->alies}}<span> <input id="text-Alias" name="Alias" type="text" value={{$user->alies}} />    </div>
                        <div class="desc">Curious developer</div>
                        <div class="desc">Tech geek</div>
                        <div class="desc" title="Fecha Nacimiento"><i class="pe-7s-gift"></i>{{$user->data_naixement}}</div>
                        <div class="desc" title="Fecha Creacion Usuario"><i class="pe-7s-stopwatch"></i>{{$user->created_at}}</div>
                    </div>
                    <div class="bottom">
                        <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="https://plus.google.com/+ahmshahnuralam">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" rel="publisher"
                           href="https://plus.google.com/shahnuralam">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                            <i class="fa fa-behance"></i>
                        </a>
                    </div>
                </div>
                <form id="formPerfil" action="/usuaris/update/foto" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                </form>

    </div>
    {{-- <img src={{asset("images/perfil/usuarios/".$user->foto)}} class="img-fluid"/>
    {{$user->name}} --}}
</div>
<script>
    $(document).ready(function(){
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Perfil").addClass("isSelected");

        $("#file-input").on("change",function() {
            let inpFile = $("#file-input");
            let previewImage = document.querySelector(".foto-perfil");

            let file = this.files[0];

            // Si hay un archivo seleccionado, crea un FileReader para poder leerlo, y lo enseña
            if(file) {
                const reader = new FileReader();

                reader.addEventListener("load",function() {
                    previewImage.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);

            }
        });
        $("#Alias-Input input").hide();
        $("#Alias-Input").click(function() {
            $("#Alias-Input input").show();
        });
        $("#Alias-Input").focusout(function() {
            $("#Alias-Input input").hide();
        });
    });   
</script>
@endsection
