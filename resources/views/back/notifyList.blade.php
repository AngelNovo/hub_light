@extends('back.layout.app')

@section('content')
<input type="hidden" id="page" value="usuario" />
<input type="hidden" id="sub" value="lista" />
<script>
    $(document).ready(function() {
        $('i').on('click',function() {
            let id=$(this).attr('data-id');
            quitarAvisos(id);
        });
    });
</script>

<form action="#" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <table id="tableContent" class="table table-fluid">
        <thead>
            <th>Usuario</th>
            <th>Explicación</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach ($avis as $a)
                <tr>
                    <td><input type="text" class="form-control" name="nombre" value="{{$a->name}}"></td>
                    <td><input type="text" class="form-control" name="nombre" value="{{$a->explicacio}}" disabled></td>
                    <td class="text-center"><span><i class="fas fa-times text-danger" data-id="{{$a->id}}" data-toggle="tooltip" data-placement="left" title="Eliminar"></i></span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>
@endsection
