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
          ...
          <div class="row">
            <label for="portada">
                <div class="upload-icon">
                    <img style="cursor: pointer;" src={{asset('images/No-Image.png')}} alt="Portada" data-toggle="tooltip" data-placement="right" title="Haz clic para cambiar la foto de perfil" class="img-portada">
                </div>
            </label>
            <input id="portada" name="portada" hidden type="file" form="formModal"/>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Subir</button>
          <form id="formModal" action="#" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        </form>
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
    });
</script>