@extends("front.layout.app")

@section("content")
<link rel="stylesheet" href={{asset("/css/front/perfil.css")}}>

<div class="content">

        <div class="row">
    
                <div class="card hovercard">
                    <div class="cardheader" style="background-image: url({{asset('images/perfil/fondo/'.$user->fondo)}});">
    
                    </div>
                    <div class="avatar">
                        <img alt="" src={{asset("images/perfil/usuarios/".$user->foto)}}>
                    </div>
                    <div class="info">
                        <div class="title">
                            <h1>{{$user->name}}</h1>
                        </div>
                        <div class="desc">Alias: {{$user->alies}}</div>
                        <div class="desc">Curious developer</div>
                        <div class="desc">Tech geek</div>
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
    

    </div>
    {{-- <img src={{asset("images/perfil/usuarios/".$user->foto)}} class="img-fluid"/>
    {{$user->name}} --}}
</div>
<script>
    $(document).ready(function(){
        console.log($("#Nav-Perfil"));
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Perfil").addClass("isSelected");
    });   
</script>
@endsection
