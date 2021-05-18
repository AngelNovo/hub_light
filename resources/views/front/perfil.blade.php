@extends("front.layout.app")

@section("content")
{{-- Css --}}
<link rel="stylesheet" href={{asset("/css/front/perfil.css")}}>
<div class="content">
    <div class="row">
        {{-- Carta de perfil --}}
        <div class="card hovercard">
            {{-- Fondo --}}
            <div class="cardheader" style="background-image: url({{asset('images/perfil/usuarios/fondo/'.$user->fondo)}});"> </div>
                {{-- Foto Perfil --}}
                <div class="avatar">
                    <label>
                        <div class="upload-icon">
                            <img src={{asset('images/perfil/usuarios/'.$user->foto)}} alt="Foto de perfil" data-toggle="tooltip" data-placement="right" title="Haz clic para cambiar la foto de perfil" class="foto-perfil">
                        </div>
                    </label>
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
                    <div class="desc" id="Alias-Input">Alias: <span>{{$user->alies}}<span></div>
                    {{-- Data Naixament --}}    
                    <div class="desc" title="Fecha Nacimiento"><i class="pe-7s-gift"></i>{{date("d/m/Y",strtotime($user->data_naixement))}}</div>
                    {{-- Creacio Compta --}}
                    <div class="desc" title="Fecha Creacion Usuario"><i class="pe-7s-stopwatch"></i>{{$user->created_at->diffForHumans()}}</div>
                </div>  
            </div>                     
        </div>
    </div>
</div>
{{-- Scripts --}}
<script>
    // Document Ready
    $(document).ready(function(){
        // Marcar Navbar
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Perfil").addClass("isSelected");
    });   
</script>
@endsection
