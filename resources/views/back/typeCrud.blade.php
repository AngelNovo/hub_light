@extends('back.layout.app')

@section('content')
<input type="hidden" id="page" value="typeUser" />
<input type="hidden" id="sub" value="crud" />
<script src={{asset('js/back/adminify.js')}}></script>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal">
    Nuevo tipo de usuario
</button>
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="/back/admin/typeUser" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo tipo de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                </button>
              </div>
              <div class="modal-body">
                <input type="text" name="test" id="1">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" />
              </div>
        </form>
      </div>
    </div>
  </div>
  {{-- End modal --}}
<form action="#" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <table id="tableContent" class="table table-fluid">
        <thead>
            <th>Id</th>
            <th>Tipus</th>
            <th>Data creació</th>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr data-id={{$type->id}}>
                    <td><input type="number" class="form-control" name="id" value={{$type->id}} disabled></td>
                    <td><input type="text" class="form-control" name="nombre" value={{$type->tipus}}></td>
                    <td><input type="text" class="form-control" name="nombre" value={{$type->created_at}} disabled></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>
@endsection
