@extends('back.layout.app')

@section('content')
<script src={{asset('js/back/ajax_call.js')}}></script>
<script src={{asset('js/back/image_preview.js')}}></script>
<input type="hidden" id="page" value="perfil" />
<input type="hidden" id="users" value={{Auth::user()->id}} />
<input type="hidden" id="sub" value="gestion" />
<form id="table-info" action="/usuaris/update/foto" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

<input type="hidden" name="ruta" value="/back/admin/home">
    <div class="row">
        <div class="card p-3 col-8 mx-auto" title="Escribe en los campos para modificarlos">
                <div class="ml-3 w-90">
                    <h4 class="mb-0 mt-0 text-center">Gestor de perfil de: {{Auth::user()->name}}</h4>
                    <br>
                    <div class="image text-center">
                        <label for="file-input">
                            <div class="upload-icon">

                                <img style="cursor: pointer;" src={{asset('images/perfil/usuarios/'.Auth::user()->foto)}} alt="Foto de perfil" data-toggle="tooltip" data-placement="right" title="Haz clic para cambiar la foto de perfil" class="rounded img-thumbnail center-block foto-perfil">
                                </div>
                            </label>
                        <input id="file-input" name="foto" hidden type="file"/>
                    </div>
                    <div class="p-2 mt-2 rounded text-white">
                        <div class="d-flex flex-column col"><input type="text" class="form-control" data-toggle="tooltip" data-placement="right" title="Modifica tu nombre de usuario" name="name" value={{Auth::user()->name}}></div>
                        <br />
                        <div class="d-flex flex-column col"><input type="text" class="form-control" data-toggle="tooltip" data-placement="right" title="Modifica tu email" name="email" value={{Auth::user()->email}}></div>
                        <br />
                        <div class="d-flex flex-column col"><input type="text" class="form-control" title="Modifica tu nombre de usuario" value={{Auth::user()->created_at}} name="created_at" disabled></div>
                        <div class="d-flex flex-column"> </div>
                        <br />

                        <div class="d-flex flex-column col"><input type="password" class="form-control" data-toggle="tooltip" data-placement="left" title="Reestablece tu contraseña" name="password" value={{Auth::user()->password}} ></div>
                        <br />
                        <div class="d-flex flex-column">
                            <button class="btn btn-primary" id="btn" hidden type="submit">Enviar</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</form>
@endsection
