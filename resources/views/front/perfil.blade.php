@extends("front.layout.app")

@section("content")
<link rel="stylesheet" href={{asset("/css/front/perfil.css")}}>

<div class="content">

        <div class="row">

                <div class="card hovercard">
                    <div class="cardheader" style="background-image: url({{asset('images/perfil/fondo/'.$user->fondo)}});">
    
                    </div>
                    <div class="avatar">
                        <label>
                            <div class="upload-icon">
                                <img src={{asset('images/perfil/usuarios/'.$user->foto)}} alt="Foto de perfil" data-toggle="tooltip" data-placement="right" title="Haz clic para cambiar la foto de perfil" class="foto-perfil">
                                </div>
                            </label>
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
                        <div class="desc" id="Alias-Input">Alias: <span>{{$user->alies}}<span></div>
                        <div class="desc">Curious developer</div>
                        <div class="desc">Tech geek</div>
                        <div class="desc" title="Fecha Nacimiento"><i class="pe-7s-gift"></i>{{$user->data_naixement}}</div>
                        <div class="desc" title="Fecha Creacion Usuario"><i class="pe-7s-stopwatch"></i>{{$user->created_at}}</div>
                    </div>

                </div>

    </div>
    {{-- <img src={{asset("images/perfil/usuarios/".$user->foto)}} class="img-fluid"/>
    {{$user->name}} --}}
</div>
<script>
    $(document).ready(function(){
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Perfil").addClass("isSelected");
    });   
</script>
@endsection
