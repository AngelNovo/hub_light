@extends("front.layout.app")

@section("content")
{{-- Autenticacio Usuari --}}
@if (Auth::user()->id != $user->id)
    <script>window.location= "/opciones/"+{{Auth::user()->id}}</script>
@endif
{{-- Css --}}
<link rel="stylesheet" href={{asset("/css/front/perfil.css")}}>
<div class="content">
    <div class="row">
        {{-- Carta de perfil --}}
        <div class="card hovercard">
            {{-- Fondo --}}
            <div class="cardheader fondo-perfil" style="background-image: url({{asset('images/perfil/usuarios/fondo/'.$user->fondo)}});">
                <input id="file-input-fondo" name="fondo" type="file" form="formPerfil"/>
            </div>
            {{-- Foto Perfil --}}
            <div class="avatar">
                <label for="file-input">
                    <div class="upload-icon">
                        <img style="cursor: pointer;" src={{asset('images/perfil/usuarios/'.$user->foto)}} alt="Foto de perfil" data-toggle="tooltip" data-placement="right" title="Haz clic para cambiar la foto de perfil" class="foto-perfil">
                    </div>
                </label>
                <input id="file-input" name="foto" hidden type="file" form="formPerfil"/>
            </div>
            {{-- Activitat Usuari --}}
            @if ($user->actiu==1)
                <div class="conectado active"></div>
            @else
                <div class="conectado"></div>
            @endif
            {{-- Estat Usuari --}}
            @if ($user->deshabilitat==1 || $user->suspes==1)
                <div class="estado" style="background-color: rgb(255, 158, 158)"><i class="pe-7s-attention"></i></div>
            @else
                @if (!empty($user->email_verified_at))
                    <div class="estado" style="background-color: #a0c8fd"><i class="pe-7s-like2"></i></div>
                @else
                    <div class="estado"></div>
                @endif
            @endif
            {{-- Info Usuari --}}
            <div class="info">
                {{-- Nom --}}
                <div class="title">
                    <h1>{{$user->name}}</h1>
                </div>
                {{-- Alies --}}
                <div class="desc" id="Alias-Input">Alias:<input id="text-Alias" name="alias" type="text" value={{$user->alies}} form="formPerfil" /></div>
                {{-- Data Naixament --}}  
                <div class="desc" title="Fecha Nacimiento"><i class="pe-7s-gift"></i>{{date("d/m/Y",strtotime($user->data_naixement))}}</div>
                {{-- Creacio Compta --}}
                <div class="desc" title="Fecha Creacion Usuario"><i class="pe-7s-stopwatch"></i>{{$user->created_at->diffForHumans()}}</div>
            </div>
            {{-- Boto Formulari --}}
            <div class="bottom">
                <input type="submit" form="formPerfil" value="Actualizar Perfil"/>
            </div>
        </div>
        {{-- Formulari --}}
        <form id="formPerfil" action="/opciones/perfil" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        </form>              
    </div>
</div>
{{-- Scripts --}}
<script>
    // Document Ready
    $(document).ready(function(){
        // Marcar Navbar
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Perfil").addClass("isSelected");
        // Mostrar Imatge Foto
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
        // Mostrar Imatge Fondo
        $("#file-input-fondo").on("change",function() {
            let inpFile = $("#file-input-fondo");
            let previewImage = document.querySelector(".fondo-perfil");

            let file = this.files[0];

            // Si hay un archivo seleccionado, crea un FileReader para poder leerlo, y lo enseña
            if(file) {
                const reader = new FileReader('background-image: url("'+ this.result+'")');
                reader.addEventListener("load",function() {
                    previewImage.setAttribute("style",'background-image: url("'+ this.result+'")');
                });

                reader.readAsDataURL(file);

            }
        });

    });
</script>
@endsection
