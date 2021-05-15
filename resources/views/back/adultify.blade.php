@extends('back.layout.app')

@section('content')
<input type="hidden" id="page" value="content" />
<input type="hidden" id="pag" value="content" />
<input type="hidden" id="sub" value="adultify" />
<script src={{asset('js/back/functions.js')}}></script>
<script>
    $(document).ready(function() {
        $('.edat').on('change',function() {
            let id=$(this).attr('data-id');
            let value=$(this).val();
            adultify(id,value);
        });
    });
</script>



<form action="#" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <table id="tableContent" class="table table-fluid">
        <thead>
            <th>Enlace contenido</th>
            <th class="text-warning">+18</th>
        </thead>
        <tbody>
            @foreach ($content as $c)
                <tr id="{{$c->id}}">ç
                    <td><a href="{{url('/contingut/'.$c->id)}}" target="_blank">{{$c->descripcio}}</a></td>
                    <td class="text-center">
                        <label class="switch">
                            <input type="checkbox" class="edat" name="major" value="{{$c->majoria_edat}}"  data-id="{{$c->id}}" {{($c->majoria_edat) ? 'checked' : ""}}>
                            <span class="slider round"></span>
                        </label>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>
@endsection
