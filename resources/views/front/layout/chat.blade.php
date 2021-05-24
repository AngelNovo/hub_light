{{-- Css --}}
<link rel="stylesheet" href={{asset("/css/front/chat.css")}}>
{{-- Modal --}}
<div class="modal fade" id="ChatModal" tabindex="-1" role="dialog" aria-labelledby="ChatModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="xats-disp">
        <div class="card-header">Chat 
          <button type="button" class="btn btn-secondary closeButon" data-dismiss="modal" form="formModal"><i class="fa pe-7s-close"></i></button>
          <i class="fa pe-7s-angle-up showChat" id="iconDown" title="Ver Chat" style="color: black"> </i>
        </div>
        <div class="row addChat">
          <div class="Agrega">
            +
          </div>
          <div class="chat-msg">
            Agrega un nuevo chat
          </div>
          <div>
              <input type="text" list="nouChat" multiple="multiple" name="nouChatUsr"/>
              <datalist id="nouChat"> </datalist> 
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
          <div class="card">
            <div class="card-header"> 
              <button type="button" class="btn btn-secondary closeButon" data-dismiss="modal" form="formModal"><i class="fa pe-7s-close"></i></button>
              <div class="div-nouUser d-flex">
                <h6>Chat</h6>
                <i class="fa pe-7s-angle-down showChat" title="Ver Chat"> </i>
                <input type="text" list="nouUser" multiple="multiple" name="nouUser"/>
                <datalist id="nouUser"> </datalist> 
                <i class="fa pe-7s-add-user button-add-new-user" title="Añadir Usuario"> </i>
              </div>
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
  let idChat;
  multipleData();
  $(document).ready(function(){
    $("#iconDown").hide();
    rebreChats();
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
            contenidor.addClass("selectChat");
            contenidor.attr("chat-val",element.id_xat);
            let chatImg=$("<div>");
            chatImg.addClass("foto-Chats");
            let fotoChat=$("<img>");
            let nomChat=$("<p>");
            nomChat.addClass("chat-msg");
            let lastMensage=$("<p>");
              let iconMSG=$("<i>");
            iconMSG.addClass("pe-7s-chat");
            iconMSG.addClass("fa");
            iconMSG.addClass("iconMSG");
            lastMensage.append(iconMSG);
            if(element.last_message!=null){
              lastMensage.append($("<span>").text(element.last_message.missatge));
            }
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
          $(".selectChat").on("click",function(){
            idChat=$(this).attr("chat-val");
            rebreMissatges(idChat,0);
          });
        }
    });
  }

  function rebreMissatges(idChat,index){
    let AUTH=JSON.parse($("#Auth").val());
    $.ajax({
        url: "/chats/missatges/anterior",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        data: {
            "id_xat":idChat,
            "index":index
        },
        dataType: 'json',
        success: function(data){   
          data=data.sort(function (a, b) {
          return (a.id - b.id)
        });                
          console.log(data);
          $(".chat-list li").remove();
          //Mensages
          let uFecha="";
          let fechaHoy=new Date();
          $.each(data, function(index,element){
            let fecha=new Date(element.created_at);
            if(uFecha!=(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear())){
              let liFecha=$("<li>");
              if((fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear())==(fechaHoy.getDate()+"/"+(fechaHoy.getMonth()+1)+"/"+fechaHoy.getFullYear())){
                liFecha.text("Hoy");
              }else {
                let fechaAyer="";
                if(fechaHoy.getDate()-1!=0){
                  fechaAyer=(fechaHoy.getDate()-1)+"/"+(fechaHoy.getMonth()+1)+"/"+fechaHoy.getFullYear();
                }else if(fechaHoy.getMonth()!=0){
                  fechaAyer=fechaHoy.getDate()+"/"+fechaHoy.getMonth()+"/"+fechaHoy.getFullYear();
                }else{
                  fechaAyer=fechaHoy.getDate()+"/"+fechaHoy.getMonth()+"/"+(fechaHoy.getFullYear()-1);
                }
                if((fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear())==fechaAyer){
                  liFecha.text("Ayer");
                }else{
                  liFecha.text(fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear());
                }
              }
              liFecha.css("color","black");
              liFecha.css("text-align","center");
              uFecha=fecha.getDate()+"/"+(fecha.getMonth()+1)+"/"+fecha.getFullYear();
              $(".chat-list").append(liFecha);
            }
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
            let hora=$("<p>");
            let minuto=fecha.getMinutes();
            if(minuto<10){
              minuto="0"+minuto;
            }
            hora.text(fecha.getHours()+":"+minuto);
            chatMessage.append(name);
            chatMessage.append(msg);
            if(element.id_contingut!=null){
              let aCont=$("<a>");
              aCont.attr("href","{{asset('contingut/')}}"+"/"+element.id_contingut);
              aCont.addClass("msgContingut");
              let imgCon=$("<img>");
              imgCon.attr("src","{{asset('images/perfil/usuarios/')}}/"+element.foto);
              aCont.append(imgCon);
              chatMessage.append(aCont);
            }
            chatMessage.append(hora);  
            chatBody.append(chatMessage); 
            li.append(chatImg);
            li.append(chatBody);            
            $(".chat-list").append(li);
          });
          $(".xats-disp").slideUp(); 
          $("#iconDown").show();
        }
    });
  }


  function rebreLast(idChat){
    let AUTH=JSON.parse($("#Auth").val());
    $.ajax({
        url: "/chats/missatges/"+idChat,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        dataType: 'json',
        success: function(data){   
          data=data.sort(function (a, b) {
          return (a.id - b.id)
        });                
          console.log(data);
          //Mensages
          $.each(data, function(index,element){
            let fecha=new Date(element.created_at);
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
            hora.text(fecha.getHours()+":"+fecha.getMinutes());
            chatMessage.append(name);
            chatMessage.append(msg);
            chatMessage.append(hora);  
            chatBody.append(chatMessage); 
            li.append(chatImg);
            li.append(chatBody);            
            $(".chat-list").append(li);
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
           missatge=$("#newMsg").val("");
           rebreLast(idChat);
        },error: function(data){
           console.log(data);
        }
      });
  }

  function creaChat(){
    let users=$("#newMsg").val();
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

  function multipleData(){
    const separator = ',';
    for (const input of document.getElementsByTagName("input")) {
      if (!input.multiple) {
        continue;
      }
      if (input.list instanceof HTMLDataListElement) {
        const optionsValues = Array.from(input.list.options).map(opt => opt.value);
        let valueCount = input.value.split(separator).length;
        input.addEventListener("input", () => {
          const currentValueCount = input.value.split(separator).length;
          // Do not update list if the user doesn't add/remove a separator
          // Current value: "a, b, c"; New value: "a, b, cd" => Do not change the list
          // Current value: "a, b, c"; New value: "a, b, c," => Update the list
          // Current value: "a, b, c"; New value: "a, b" => Update the list
          if (valueCount !== currentValueCount) {
            const lsIndex = input.value.lastIndexOf(separator);
            const str = lsIndex !== -1 ? input.value.substr(0, lsIndex) + separator : "";
            filldatalist(input, optionsValues, str);
            valueCount = currentValueCount;
          }
        });
      }
    }
    function filldatalist(input, optionValues, optionPrefix) {
      const list = input.list;
      if (list && optionValues.length > 0) {
        list.innerHTML = "";
        const usedOptions = optionPrefix.split(separator).map(value => value.trim());
        for (const optionsValue of optionValues) {
          if (usedOptions.indexOf(optionsValue) < 0) {
            const option = document.createElement("option");
            option.value = optionPrefix + optionsValue;
            list.append(option);
          }
        }
      }
    }
  }
  
</script>
