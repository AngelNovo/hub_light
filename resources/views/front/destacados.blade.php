@extends("front.layout.app")
{{-- Css --}}
<link rel="stylesheet" href={{asset("/css/front/contingut.css")}}>
@section("content")
<div class="content">
{{-- Header --}}
   
</div>
{{-- Scripts --}}
<script>
// Document Ready
$(document).ready(function(){
    // Marcar Navbar
    $(".isSelected").removeClass("isSelected");
    $("#Nav-Destacados").addClass("isSelected");
        cargarContenido();  
});

function cargarContenido(){
    $.ajax({
      url: "/destacados",
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "GET",
      dataType: 'json',
      success: function(data){
        // Success
        // Start Foreach     
        let contingut=$(".content");
        $.each(data, function(index,element){
          console.log(element);
          let row= $("<div>");
          row.addClass("row");
          //Header
          let header=$("<div>");
          header.addClass("header-contingut");
          //Foto Perfil
          let enlaceProp=$("<a>");
          enlaceProp.attr("href","{{asset('usuaris/')}}"+"/"+element.id);
          let divImg=$("<div>");
          let imgPropPerfil=$("<img>");
          imgPropPerfil.attr("src","{{asset('images/perfil/usuarios/')}}"+"/"+element.foto);
          imgPropPerfil.addClass("header-perfil-img");
          divImg.append(imgPropPerfil);
          let titulo=$("<h2>");
          titulo.text(element.titulo);
          enlaceProp.append(divImg);          
          header.append(enlaceProp);
          header.append(titulo);
          row.append(header);
          //Contingut
          let con_contingut=$("<div>");
          let in_contingut;
          con_contingut.addClass("contingut-principal");
            //Img
          if(element.tipus_contingut==1){
            con_contingut.addClass("bg-image");
            con_contingut.css("background-image", "url('{{asset('/contenido/1/')}}/"+element.url+"')");
            in_contingut=$("<img>");
            in_contingut.addClass("img-fluid");
            in_contingut.attr("src","{{asset('/contenido/1/')}}/"+element.url);
          } //Video
          else if(element.tipus_contingut==4){
            con_contingut.css("background-image", "url('{{asset('/contenido/1/')}}/"+element.portada+"')");
            in_contingut=$("<video>");
            in_contingut.addClass("embed-responsive-item");
            in_contingut.attr("src","{{asset('/contenido/4/')}}/"+element.url);
            in_contingut.attr("controls","controls");
            in_contingut.css("cursor","pointer");
          }else if(element.tipus_contingut==3){
            con_contingut.css("background-image", "url('{{asset('/contenido/1/')}}/"+element.portada+"')");
            in_contingut=$("<audio>");
            in_contingut.addClass("music-arxiu");
            in_contingut.attr("src","{{asset('/contenido/3/')}}/"+element.url);
            in_contingut.attr("controls","controls");
            in_contingut.css("cursor","pointer");
          }
          con_contingut.append(in_contingut);
          row.append(con_contingut);
          //Footer
          let footer=$("<div>");
          footer.addClass("footer-contingut");
          if({{Auth::user()->id}}!=null&&{{Auth::user()->id}}!=""&&{{Auth::user()->id}}!=undefined){
            //Header-Footer
            let headerFooter=$("<div>");
            headerFooter.addClass("header-footer-contingut");
            let divI=$("<div>");
            if({{Auth::user()->id}}!=element.id){
              let like=$("<i>");
              like.addClass("fa");
              like.addClass("pe-7s-like");
              like.addClass("like");
              like.attr("data-toggle","Me gusta");
              if(element.like_bool=="1"){
                like.addClass("megusta");
              }
              let enviar=$("<i>");
              enviar.addClass("fa");
              enviar.addClass("pe-7s-paper-plane");
              enviar.addClass("enviar");
              enviar.attr("data-toggle","Enviar");
              divI.append(like);
              divI.append(enviar);

            }
            headerFooter.append(divI);
            footer.append(headerFooter);
          }
            //Content-Footer
          let contentFooter=$("<div>");
          contentFooter.addClass("border-bot");
          row.append(footer);
          contingut.append(row);
        });
        // End Foreach
      }
    });
}

</script>
@endsection