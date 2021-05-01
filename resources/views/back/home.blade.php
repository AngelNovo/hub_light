@extends('back.layout.app')

@section('content')
<input type="hidden" id="page" value="dashboard" />
<main class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="card p-3 col-8 mx-auto" title="Escribe en los campos para modificarlos">
                    <div class="ml-3 w-100">
                        <h4 class="mb-0 mt-0 text-center">Gestor de perfil de: {{Auth::user()->name}}</h4>
                        <br>
                        <div class="image text-center">
                            {{-- @if (Auth::user()->foto===null || Auth::user()->foto==="")
                                <img src={{asset('images/perfil/avatar.jpg')}} alt="Foto de perfil por defecto" class="rounded" width="155">
                                @else
                                    <img src={{asset('images/perfil/usuarios/'.Auth::user()->foto)}} alt="Foto de perfil por defecto" class="rounded" width="155">
                            @endif --}}
                            <label for="file-input">
                                <div class="upload-icon">
                                     @if (Auth::user()->foto===null || Auth::user()->foto==="")
                                        <img src={{asset('images/perfil/avatar.jpg')}} alt="Foto de perfil por defecto" class="rounded" width="155">
                                        @else
                                            <img src={{asset('images/perfil/usuarios/'.Auth::user()->foto)}} alt="Foto de perfil por defecto" class="rounded" width="155">
                                    @endif
                                 </div>
                               </label>
                            <input id="file-input" hidden type="file"/>
                        </div>
                        <div class="p-2 mt-2 rounded text-white">
                            <div class="d-flex flex-column col"><input type="text" class="form-control" data-toggle="tooltip" data-placement="right" title="Modifica tu nombre de usuario" value={{Auth::user()->name}}></div>
                            <br />
                            <div class="d-flex flex-column col"><input type="text" class="form-control" title="Modifica tu nombre de usuario" value={{Auth::user()->created_at}} disabled></div>
                            <div class="d-flex flex-column"> </div>
                            <br />
                            <div class="row">
                                <div class="d-flex flex-column col"><input type="password" class="form-control" data-toggle="tooltip" data-placement="left" title="Reestablece tu contraseña" value="" placeholder="***"></div>
                                <div class="d-flex flex-column col"><input data-toggle="tooltip" data-placement="right" title="Reescribe tu contraseña" type="password" placeholder="***" class="form-control" title="Fecha de registro" value=""></div>
                            </div>
                            <div class="d-flex flex-column"> </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
  </main>
@endsection
