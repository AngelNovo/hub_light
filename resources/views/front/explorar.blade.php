@extends("front.layout.app")

@section("content")
<link rel="stylesheet" href={{asset("/css/front/explorar.css")}}>
<div class="content">
    {{-- Contingut --}}
    <div class="contingut row container-fluid  img-responsive"> </div>
</div>
<script>
    $(document).ready(function(){
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Explorar").addClass("isSelected");
        cargarContenido(0);
    });  
    
    function cargarContenido(index){
        $.ajax({
        url: "/explorar/"+index,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        dataType: 'json',
        success: function(data){    
          $.each(data, function(index,element){
            let object=$("<a>");
            object.addClass("publicacio");
            object.addClass("col-*-*");
            object.attr("href","/contingut/"+element.id);
            let img=$("<img>");
            img.addClass("image-thumbnail");
            let icon=$("<i>");
            icon.addClass("fas");
            if(element.tipus_contingut==1){
                img.attr("src",'{{asset("contenido/1")}}/'+element.url);
            }else{
                img.attr("src",'{{asset("contenido/1")}}/'+element.portada);
            }
            switch(element.tipus_contingut){
                case  1:
                icon.append($("<img>").attr("src",'{{asset("iconos/img.svg")}}'));
                break;
                case 2:
                icon.append($("<img>").attr("src",'{{asset("iconos/text.svg")}}'));
                break;
                case 3:
                icon.append($("<img>").attr("src",'{{asset("iconos/music.svg")}}'));
                break;
                case 4:
                icon.append($("<img>").attr("src",'{{asset("iconos/video.svg")}}'));
                break;
                case 5:
                icon.append($("<img>").attr("src",'{{asset("iconos/otros.svg")}}'));
                break;
            }
            object.append(icon);
            object.append(img);
            $(".contingut").append(object);
          });        

        }
        });
    }
</script>
@endsection
