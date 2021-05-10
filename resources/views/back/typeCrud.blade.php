@extends('back.layout.app')

@section('content')
<input type="hidden" id="page" value="typeUser" />
<input type="hidden" id="sub" value="crud" />
<script src={{asset('js/back/adminify.js')}}></script>
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
