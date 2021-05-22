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
        data=data.sort(function (a, b) {
          return (b.q_likes - a.q_likes)
        });
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
          console.log({{Auth::user()->id}});
          if({{isset(Auth::user()->id)}}){
            //Header-Footer
            let headerFooter=$("<div>");
            headerFooter.addClass("header-footer-contingut");
            let divI=$("<div>");
            if({{Auth::user()->id}}!=element.propietari){
              let like=$("<i>");
              like.addClass("fa");
              like.addClass("pe-7s-like");
              like.addClass("like");
              like.attr("data-toggle","Me gusta");
              if(element.like_bool=="1"){
                like.addClass("megusta");
              }
              divI.append(like);
            }
            let enviar=$("<i>");
              enviar.addClass("fa");
              enviar.addClass("pe-7s-paper-plane");
              enviar.addClass("enviar");
              enviar.attr("data-toggle","Enviar");            
              divI.append(enviar);
            headerFooter.append(divI);
            footer.append(headerFooter);
          }
            //Content-Footer
          let contentFooter=$("<div>");
          contentFooter.addClass("border-bot");
          let divCont=$("<div>");
          let spanLikes=$("<span>");
          spanLikes.text(element.q_likes+" likes");
          let spanFecha=$("<span>");
          spanFecha.addClass("fecha-contingut");
          let fecha=new Date(element.created_at);
          spanFecha.text(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear());
          let descripcio=$("<p>");
          descripcio.addClass("descripcio");
          descripcio.text(element.descripcio);
          divCont.append(spanLikes);
          divCont.append(spanFecha);
          divCont.append(descripcio);
          contentFooter.append(divCont);
          let mostComent=$("<p>");
          mostComent.addClass("most-coment");
          mostComent.text("--- Mostrar Comentarios ---");
          footer.append(contentFooter);
            //Footer-Footer
          if({{isset(Auth::user()->id)}}){
            if({{Auth::user()->id}}!=element.propietari){
              let form=$("<form>");
              form.addClass("formComentaris");
              let formGrup=$("<div>");
              formGrup.addClass("form-group");
              let fotoMiUser=$("<img>");
              fotoMiUser.attr("src","{{asset('images/perfil/usuarios/'.Auth::user()->foto)}}");
              fotoMiUser.addClass("foto-coment");
              let checklike=$("<input>");
              checklike.attr("type","checkbox");
              checklike.val(element.like_bool);
              checklike.addClass("inputMG");
              checklike.attr("name","megusta");
              if(element.like_bool=="1"){
                checklike.prop("checked",true);
              }
              checklike.hide();
              let inIdCont=$("<input>");
              inIdCont.attr("type","hidden");
              inIdCont.val(element.contingut_id);
              inIdCont.attr("name","id_contingut");
              inIdCont.addClass("id_contingut");
              let inIdProp=$("<input>");
              inIdProp.attr("type","hidden");
              inIdProp.val(element.propietari);
              inIdProp.attr("name","id_propitari");
              inIdProp.addClass("id_propitari");
              let textArea=$("<textarea>");
              textArea.addClass("form-control");
              textArea.addClass("MSG");
              textArea.attr("rows","4");
              textArea.attr("name","comentario");              
              formGrup.append(fotoMiUser);
              formGrup.append(checklike);
              formGrup.append(inIdCont);
              formGrup.append(inIdProp);
              formGrup.append(textArea);
              form.append(formGrup);
              let buttonComent=$("<button>");
              buttonComent.attr("type","button");
              buttonComent.addClass("btn");
              buttonComent.addClass("btn-primary");
              buttonComent.addClass("submit-comment");
              buttonComent.text("Enviar");
              form.append(buttonComent);
              form.hide();
              footer.append(form);
            }
          }
          footer.append(mostComent);
          row.append(footer);
          contingut.append(row);           
        });
        // End Foreach
        $(".most-coment").on("click",function(){
          let form=$(this);
          form=form.parent().find(".formComentaris");
          if(form.is(':hidden')){
            form.slideDown();
            $(this).text("--- Ocultar Comentarios ---");
          }else{
            form.slideUp();
            $(this).text("--- Mostrar Comentarios ---");
          }       
        });
        $(".like").on("click",function(){
          let input=$(this).parent().parent().parent();
          input= input.find(".formComentaris").find(".form-group");
          let like= input.find(".inputMG");
          let megusta="0";
          if(like.prop("checked")){
            like.prop("checked",false);
            $(this).removeClass("megusta");
          }else{
            like.prop("checked",true);
            $(this).addClass("megusta");
            megusta="1";
          }
          let idCont=input.find(".id_contingut").val();
          let idProp=input.find(".id_propitari").val();
          console.log(idCont+"/"+megusta+"/"+idProp);
          enviaLike(idCont,megusta,idProp);
        });
        $(".submit-comment").on("click",function(){
          let input=$(this).parent().parent().parent();
          input= input.find(".formComentaris").find(".form-group");
          let msg= input.find(".MSG").val();
          let idCont=input.find(".id_contingut").val();
          let idProp=input.find(".id_propitari").val();
          console.log(idCont+"/"+msg+"/"+idProp);
          enviaComent(idCont,msg,idProp);
        });
        
      }
    });

    function enviaLike(idCont,megusta,idProp){
        $.ajax({
        url: "/comment",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        data: {
            "id_contingut":idCont,
            "megusta":megusta,
            "idProp":idProp
        },
        success: function(data){
           console.log(data);
        },error: function(data){
           console.log(data);
        }
      });
  }

  function enviaComent(idCont,msg,idProp){
        $.ajax({
        url: "/comment",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        data: {
            "id_contingut":idCont,
            "comentario":msg,
            "idProp":idProp
        },
        success: function(data){
           console.log(data);
        }
        });
    }
}

</script>
@endsection