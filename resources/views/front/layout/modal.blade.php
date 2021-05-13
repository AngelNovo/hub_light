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
            <label for="tipoC">Tipo de contenido</label>
            <select class="form-select" id="tipoC" name="tipoC" aria-label="Default select example">
            </select>
            <label for="ageRestrict">+18</label>
            <input type="checkbox" name="ageRestrict"/>
            <label for="portada">
                <div class="upload-icon">
                    <img style="cursor: pointer;" src={{asset('images/No-Image.png')}} alt="Portada" data-toggle="tooltip" data-placement="right" title="Haz clic para cambiar la foto de perfil" class="img-portada">
                </div>
            </label>
            <label for="arxiu">Arxivo</label>
            <input id="arxiu" name="arxiu" type="file" form="formModal"/>
            <input id="portada" name="portada" hidden type="file" form="formModal"/>
            <label for="desc">Descripción</label>
            <textarea id="desc" name="desc"></textarea>
            <label for="derechoA">Derechos de autor</label>
            <select class="form-select" id="derechoA" name="derechoA" aria-label="Default select example">
            </select>
            <label for="linkCopy">Licencia</label>
            <input id="linkCopy" name="linkCopy" type="text"/>
          </div>
        </div>
      </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" form="formModal">Cancelar</button>
          <button type="submit" class="btn btn-primary" form="formModal">Subir</button>
          
        
        </div>
      </div>
    </div>
  </div>
  <script>
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
        getDerechos();
        getTipo();

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
        }
    });
    }

</script>