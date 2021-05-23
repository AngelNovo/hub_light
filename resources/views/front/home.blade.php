@extends("front.layout.app")
{{-- Css --}}
<link rel="stylesheet" href={{asset("/css/front/contingut.css")}}>
@section("content")
<div class="content">
    {{-- Header --}}
       <input type="hidden" id="Auth" value="{{(isset(Auth::user()->id)) ? Auth::user() : 0}}">
    </div>
    {{-- Scripts --}}
    <script>
    // Document Ready
    $(document).ready(function(){
        // Marcar Navbar
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Inicio").addClass("isSelected");
        cargarContenido();
    });
    
    function cargarContenido(){
        $.ajax({
          url: "/home/getall/0",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "GET",
          dataType: 'json',
          success: function(data){
            // Success
            // Start Foreach   
            let AUTH=JSON.parse($("#Auth").val());
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
              enlaceProp.attr("href","{{asset('usuaris/')}}"+"/"+element.propietari);
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
              if(AUTH!=0){
                //Header-Footer
                let headerFooter=$("<div>");
                headerFooter.addClass("header-footer-contingut");
                let divI=$("<div>");
                if(AUTH.id!=element.propietari && AUTH!=0){
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
              let mostComent=$("<span>");
              mostComent.addClass("most-coment");
              mostComent.text("--- Mostrar Comentarios ---");
              mostComent.attr("val","0")
              footer.append(contentFooter);
                //Footer-Footer
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
              if(AUTH!=0){
                if(AUTH.id!=element.propietari && AUTH!=0){
                  let form=$("<form>");
                  form.addClass("formComentaris");
                  let formGrup=$("<div>");
                  formGrup.addClass("form-group");
                  let fotoMiUser=$("<img>");
                  fotoMiUser.attr("src","{{asset('images/perfil/usuarios/')}}/"+AUTH.foto);
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
                }else{
                  footer.append(inIdCont);
                  footer.append(inIdProp);
                }
              }else{
                footer.append(inIdCont);
                footer.append(inIdProp);
              }
              footer.append(mostComent);
              row.append(footer);
              contingut.append(row);           
            });
            // End Foreach
            $(".most-coment").on("click",function(){
              let form=$(this);
              form=form.parent().find(".formComentaris");
              var comentaris=$(this).parent();
              comentaris=comentaris.find(".border-bot").find("div");
              let input=$(this).parent();
              let id= input.find(".formComentaris").find(".form-group").find(".id_contingut").val();          
              if(form.is(':hidden')){
                form.slideDown();
                $(this).text("--- Ocultar Comentarios ---");
                mostraComents(comentaris,id);
              }else{
                form.slideUp();
                $(this).text("--- Mostrar Comentarios ---");
                eliminaComents(comentaris);
              } 
              if(form.attr("class")==undefined){
                if( $(this).attr("val")=="0"){
                  $(this).text("--- Ocultar Comentarios ---");
                  $(this).attr("val","1");
                  id=$(this).parent().find(".id_contingut").val();
                  mostraComents(comentaris,id);
                }else{
                  $(this).text("--- Mostrar Comentarios ---");
                  $(this).attr("val","0");
                  eliminaComents(comentaris);
                }
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
              var comentaris=$(this).parent().parent();
              comentaris=comentaris.find(".border-bot").find("div");
              enviaComent(idCont,msg,idProp,comentaris);    
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
      //Mostrar Comentarios
      function mostraComents(contingut,id){
        $.ajax({
          url: "/comment/"+id,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "GET",
          dataType: 'json',
          success: function(data){
            let contador=0;
            $.each(data, function(index,element){
              if(element.comentario!=null&&element.comentario!=""&&element.comentario!=undefined){
                let comentario=$("<div>");
                comentario.addClass("comentario");
                let fotoUser=$("<a>");
                fotoUser.attr("href","{{asset('/usuaris/')}}/"+element.id_usuari);
                let img=$("<img>");
                img.addClass("foto-coment");
                img.attr("src","{{asset('images/perfil/usuarios/')}}/"+element.foto);
                fotoUser.append(img);
                let coment=$("<p>");
                coment.addClass("text-comment");
                coment.text(element.comentario);
                comentario.append(fotoUser);
                comentario.append(coment);
                comentario.hide();
                contingut.append(comentario);
                contador=contador++;
              }
            });
            if(contador==0){
              let comentario=$("<div>");
              comentario.addClass("comentario");
              comentario.text("No hay comentarios");
              comentario.css("text-align","center");
              comentario.css("width","100%");
            }
            contingut.find(".comentario").slideDown();
          }
        });
      }
    
      function eliminaComents(contingut){
        contingut.find(".comentario").slideUp(function(){
          contingut.find(".comentario").remove();
        });
      }
    
      function enviaComent(idCont,msg,idProp,contingut){
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
              contingut.find(".comentario").remove();
              mostraComents(contingut,idCont);
            }
            });
        }
    }
    
    </script>
    @endsection