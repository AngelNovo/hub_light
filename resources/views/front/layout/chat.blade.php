{{-- Css --}}
<link rel="stylesheet" href={{asset("/css/front/chat.css")}}>
{{-- Modal --}}
<div class="modal fade" id="ChatModal" tabindex="-1" role="dialog" aria-labelledby="ChatModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="xats-disp">
        <div class="card-header">Chat 
          <button type="button" class="btn btn-secondary closeButon" data-dismiss="modal" form="formModal"><i class="fa pe-7s-close"></i></button>
          <i class="fa pe-7s-angle-up showChat" title="Ver Chat" style="color: black"> </i>
        </div>
        <div></div>
        <div class="row">
          <div class="Agrega">
            +
          </div>
          <div class="chat-msg">
            Agrega un nuevo chat
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">Chat 
              <button type="button" class="btn btn-secondary closeButon" data-dismiss="modal" form="formModal"><i class="fa pe-7s-close"></i></button>
              <i class="fa pe-7s-angle-down showChat" title="Ver Chat"> </i>
              <i class="fa pe-7s-add-user" title="Añadir Usuario"> </i>
            </div>
              <div class="card-body height3">
                <ul class="chat-list">                                  
                </ul>
              </div>
              <div class="card-header d-flex">
                <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 p-0">
                  <textarea class="inputMsg" name="newMsg" maxlength="200" id="newMsg" rows="10"></textarea>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 p-0 d-flex">
                  <button type="button" class="btn btn-primary butonSendMSG" id="submitForm" form="formModal">Subir</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- Scripts --}}
<script>
  // Document Ready
  let idChat=1;
  $(document).ready(function(){
    rebreChats();
    rebreMissatges();
    $(".showChat").on("click",function(){
      $(".xats-disp").slideToggle();
    });
    $(".butonSendMSG").on("click",function(){
      enviaMSG();
    });
  });

  function rebreChats(){
    let AUTH=JSON.parse($("#Auth").val());
    $.ajax({
        url: "/chats",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        dataType: 'json',
        success: function(data){                   
          console.log(data);
          //Chats
          $.each(data, function(index,element){
            let integrantes=[];
            $.each(element.integrantes, function(i,el){
              if(el.id_usuari!=element.id_usuari){
                integrantes.push(el.foto);
              }
            });
            let contenidor=$("<div>");
            contenidor.addClass("row");
            contenidor.addClass("addChat");
            let chatImg=$("<div>");
            chatImg.addClass("foto-Chats");
            let fotoChat=$("<img>");
            let nomChat=$("<p>");
            nomChat.addClass("chat-msg");
            let lastMensage=$("<p>");
            lastMensage.text(element.last_message.missatge);
            lastMensage.addClass("chat-msg");
            if(element.nom_xat!=""&&element.nom_xat!=null&&element.nom_xat!=undefined){
              nomChat.text(element.nom_xat);
            }else{
              let nom="";
              $.each(element.integrantes, function(i,el){
                if(el.id_usuari!=element.id_usuari){
                  nom+=el.name+" ";
                }
              });
              nomChat.text(nom);
            }
            let random=Math.floor(Math.random() * integrantes.length); 
            fotoChat.attr("src","{{asset('images/perfil/usuarios/')}}/"+integrantes[random]);
            chatImg.append(fotoChat);
            contenidor.append(chatImg);
            contenidor.append(nomChat);
            contenidor.append(lastMensage);
            $(".xats-disp").append(contenidor);
          });
        }
    });
  }

  function rebreMissatges(){
    let AUTH=JSON.parse($("#Auth").val());
    $.ajax({
        url: "/chats/missatges/"+idChat,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        dataType: 'json',
        success: function(data){                   
          console.log(data);
          //Mensages
          $.each(data, function(index,element){
            let li=$("<li>");
            if(element.id_usuari==AUTH.id){
              li.addClass("out");
            }else{
              li.addClass("in");
            }
            let chatImg=$("<div>");
            chatImg.addClass("chat-img");
            let imgPerf=$("<img>");
            imgPerf.attr("alt","Avtar");
            imgPerf.attr("src","{{asset('images/perfil/usuarios/')}}/"+element.foto);
            chatImg.append(imgPerf);
            let chatBody=$("<div>");
            chatBody.addClass("chat-body");
            let chatMessage=$("<div>");
            chatMessage.addClass("chat-message");
            let name=$("<h5>");
            name.text(element.name);
            let msg=$("<p>");
            msg.text(element.missatge);
            let hora=$("<span>");
            let fecha=new Date(element.created_at);
            hora.text(fecha.getHours()+":"+fecha.getMinutes());
            chatMessage.append(name);
            chatMessage.append(msg);
            chatMessage.append(hora);  
            chatBody.append(chatMessage); 
            li.append(chatImg);
            li.append(chatBody);            
            $(".chat-list").prepend(li);
          }); 
        }
    });
  }

  function enviaMSG(){
    let missatge=$("#newMsg").val();
    console.log(idChat);
    console.log(missatge);
    $.ajax({
        url: "/chats/missatges",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        data: {
            "missatge":missatge,
            "id_xat":idChat
        },
        success: function(data){
           console.log(data);
        },error: function(data){
           console.log(data);
        }
      });
  }
</script>
