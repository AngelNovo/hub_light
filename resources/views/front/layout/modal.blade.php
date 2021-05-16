<link rel="stylesheet" href={{asset("/css/front/modal.css")}}>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Subir Contenido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formModal" action="/contingut" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
          <div class="row">
            <div>
              <label for="tipoC">Tipo de contenido</label>
                <select class="form-select" id="tipoC" name="tipoC" aria-label="Default select example">
                </select>
              <label for="ageRestrict">+18</label>
              <input type="checkbox" name="ageRestrict"/>
            </div>
            <div>
              <label for="portada" class="form-portada">
                <div class="upload-icon">
                    <img style="cursor: pointer;" src={{asset('images/No-Image.png')}} alt="Portada" data-toggle="tooltip" data-placement="right" title="Haz clic para insertar una portada" class="img-portada">
                </div>
              </label>
              <input id="portada" name="portada" hidden type="file" form="formModal"/>
            </div>
            <div>
              <label for="arxiu-i" id="arxiu-img">
              <div class="upload-icon">
                  <img style="cursor: pointer;" src={{asset('images/No-Image.png')}} alt="Arxiu" data-toggle="tooltip" data-placement="right" title="Haz clic para insertar un archivo" class="img-arxiu image-thumbnail">
              </div>
              </label>
              <label for="arxiu" id="arxiu-musica">
            <div class="upload-icon">
                <audio controls="controls" style="cursor: pointer;" src={{asset('images/No-Image.png')}} alt="Arxiu" data-toggle="tooltip" data-placement="right" class="music-arxiu"></audio>
            </div>
            </label>
            <label for="arxiu" id="video-musica">
            <div class="upload-icon">
              <video controls="controls" style="cursor: pointer;" src={{asset('images/No-Image.png')}} alt="Arxiu" data-toggle="tooltip" data-placement="right" class="video-arxiu embed-responsive"></video>
            </div>
            </label>
            <div>
            <label for="arxiu" id="arxiu-otros">Archivo</label>
            <input id="arxiu" name="arxiu" type="file" form="formModal"/>
            <input id="arxiu-i" name="arxiu" hidden type="file" form="formModal"/>
            <input id="arxiu-m" name="arxiu" type="file" form="formModal"/>
            <input id="arxiu-v" name="arxiu" type="file" form="formModal"/>
            </div>
            </div>
            <div class="modal-row">
            <label for="titol">Titulo</label>
            <input id="titol" name="titol" type="text" form="formModal"/>
            </div>
            <div class="modal-row">
            <label for="desc">Descripción</label>
            <textarea id="desc" name="desc"></textarea>
            </div>
            <div>
              <label>Select values (comma-separated):</label>
              <input type="text" list="Suggestions" multiple="multiple" />

              <datalist id="Suggestions" name="tags">
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
              </datalist>
            </div>
            <div>
            <label for="derechoA">Derechos de autor</label>
            <select class="form-select" id="derechoA" name="derechoA" aria-label="Default select example">
            </select>
            </div>
            <div id="licencias">
            <label for="linkCopy">Licencia</label>
            <input id="linkCopy" name="linkCopy" type="text" placeholder="url"/>
            </div>
          </div>
        </div>
      </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" form="formModal">Cancelar</button>
          <button type="submit" class="btn btn-primary" id="submitForm" form="formModal">Subir</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    let tipoC;
    $(document).ready(function(){
        $("#portada").on("change",function() {
            let inpFile = $("#portada");
            let previewImage = document.querySelector(".img-portada");

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
        $("#arxiu-i").on("change",function() {
            let inpFile = $("#arxiu-i");
            let previewImage = document.querySelector(".img-arxiu");

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
        $("#arxiu-m").on("change",function() {
            let inpFile = $("#arxiu-m");
            let previewImage = document.querySelector(".music-arxiu");

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
        $("#arxiu-v").on("change",function() {
            let inpFile = $("#arxiu-v");
            let previewImage = document.querySelector(".video-arxiu");

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
        getDerechos();
        getTipo();
        $("#tipoC").change(function(){
          selectTipo();
        });

        $("#derechoA").change(function(){
          selectLicencia();
        })

        $("#submitForm").click(function(event){     
          if(!valida()){
            event.preventDefault();
          }
        });

    });

    function getDerechos() {
    $.ajax({
        url: "/derechosautor",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        dataType: 'json',
        success: function(data){
          $.each(data, function(index,element){
            var option=$("<option>");
            option.text(element.tipus);
            option.val(element.id_dret);
            $("#derechoA").append(option);
          });
          $('#derechoA option[value="2"]').attr("selected",true);
          selectLicencia();
        }
    });
    }

  function getTipo() {
    $.ajax({
        url: "/tipocontenido",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "GET",
        dataType: 'json',
        success: function(data){         
          $.each(data, function(index,element){
            var option=$("<option>");
            option.text(element.tipus);
            option.attr("title",element.Descripcio);
            option.val(element.id);
            $("#tipoC").append(option);
          });        
          tipoC=data;
          selectTipo();
        }
    });
  }
  function selectTipo(){
      var tipo=$("#tipoC").val();
      $(".form-portada").hide();
      $("#arxiu-otros").hide();
      $("#arxiu-img").hide();
      $("#arxiu").hide();
      $("#arxiu-m").hide();
      $("#arxiu-v").hide();
      $("#arxiu").prop( "disabled", true);
      $("#arxiu-i").prop( "disabled", true);
      $("#arxiu-m").prop( "disabled", true);
      $("#arxiu-v").prop( "disabled", true);
      $("#arxiu-musica").hide();
      $("#video-musica").hide();
      $("#portada").prop( "disabled", true);
      switch(tipo){
        case  "1":
          $("#arxiu-img").show();
          $("#arxiu-i").prop( "disabled", false);
          $(".img-arxiu").attr("title","Haz click para añadir un archivo: "+tipoC[0].Descripcio);
        break;
        case "2":
          $(".form-portada").show();
          $("#portada").prop( "disabled", false);
          $("#arxiu").show();
          $("#arxiu").prop( "disabled", false);
          $("#arxiu-otros").show();
          $("#arxiu").attr("title","Haz click para añadir un archivo: "+tipoC[1].Descripcio);
          break;
        case "3":
          $(".form-portada").show();
          $("#portada").prop( "disabled", false);
          $("#arxiu-musica").show();
          $("#arxiu-m").show();
          $("#arxiu-m").prop( "disabled", false);
          $("#arxiu-otros").show();
          $("#arxiu-m").attr("title","Haz click para añadir un archivo: "+tipoC[2].Descripcio);
          break;

        case "4":
          $(".form-portada").show();
          $("#portada").prop( "disabled", false);
          $("#video-musica").show();
          $("#arxiu-v").show();
          $("#arxiu-v").prop( "disabled", false);
          $("#arxiu-otros").show();
          $("#arxiu-v").attr("title","Haz click para añadir un archivo: "+tipoC[3].Descripcio);
          break;

        case "5":
          $(".form-portada").show();
          $("#portada").prop( "disabled", false);
          $("#arxiu").show();
          $("#arxiu").prop( "disabled", false);
          $("#arxiu-otros").show();
          $("#arxiu").attr("title","Haz click para añadir un archivo: "+tipoC[4].Descripcio);
          break;
      }
  }

  function selectLicencia(){
    var tipo=$("#derechoA").val();
    if(tipo=="2"){
      $("#licencias").hide();
      $("#linkCopy").prop( "disabled", true);
    }else{
      $("#licencias").show();
      $("#linkCopy").prop( "disabled", false);
    }
  }

  function valida(){
      let validacion=true;
      let error="";
      var tipo=$("#tipoC").val();
      switch(tipo){
        case  "1":
          if($("#arxiu-i").val()==null||$("#arxiu-i").val()==""||$("#arxiu-i").val()==undefined){
            error=error+"¡No se encuentra el archivo!";
            validacion=false;
          }else{
            filename= $("#arxiu-i").val().split('.').pop();
            if(!validaExt(filename,tipoC[0].Descripcio)){
              error=error+"¡Extension incorrecta!";
              validacion=false;
            }
          }       
        break;
        case "2":
          if($("#arxiu").val()==null||$("#arxiu").val()==""||$("#arxiu").val()==undefined){
            error=error+"¡No se encuentra el archivo!";
            validacion=false;
          }else{
            filename= $("#arxiu").val().split('.').pop();
            if(!validaExt(filename,tipoC[1].Descripcio)){
              error=error+"¡Extension incorrecta!";
              validacion=false;
            }
          }
          if($("#titol").val()==null||$("#titol").val()==""||$("#titol").val()==undefined){
            error=error+"¡No se encuentra el titulo!";
            validacion=false;
          }
          break;
        case "3":
          if($("#arxiu-m").val()==null||$("#arxiu-m").val()==""||$("#arxiu-m").val()==undefined){
            error=error+"¡No se encuentra el archivo!";
            validacion=false;
          }else{
            filename= $("#arxiu-m").val().split('.').pop();
            if(!validaExt(filename,tipoC[2].Descripcio)){
              error=error+"¡Extension incorrecta!";
              validacion=false;
            }
          }
          break;
        case "4":
          if($("#arxiu-v").val()==null||$("#arxiu-v").val()==""||$("#arxiu-v").val()==undefined){
            error=error+"¡No se encuentra el archivo!";
            validacion=false;
          }else{
            filename= $("#arxiu-v").val().split('.').pop();
            if(!validaExt(filename,tipoC[3].Descripcio)){
              error=error+"¡Extension incorrecta!";
              validacion=false;
            }
          }
          break;
        case "5":
        if($("#arxiu").val()==null||$("#arxiu").val()==""||$("#arxiu").val()==undefined){
            error=error+"¡No se encuentra el archivo!";
            validacion=false;
          }else{
            filename= $("#arxiu").val().split('.').pop();
            if(!validaExt(filename,tipoC[4].Descripcio)){
              error=error+"¡Extension incorrecta!";
              validacion=false;
            }
          }
          break;
      }
      var tipo=$("#derechoA").val();
      if(tipo!="2"){
        if($("#linkCopy").val()==null||$("#linkCopy").val()==""||$("#linkCopy").val()==undefined){
          error=error+"¡Porfavor inserte su licencia!";
          validacion=false;
        }
      }
      
      if(!validacion){
        alert(error);
        console.log(error+"/"+validacion);
      }
      return validacion;
}

function validaExt(arxiu,disp){
  var ext=disp.split(" ");  
  let correctExt=false;
  $.each(ext, function(index,element){
    if(element=="."+arxiu){
      correctExt=true;
      return true;
    }
  });
  return correctExt;
}








document.addEventListener("DOMContentLoaded", function () {
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
});
</script>
