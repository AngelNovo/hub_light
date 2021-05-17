@extends("front.layout.app")

@section("content")
<div class="content">
    {{-- <img src="{{asset('/contenido/1/'.$results->portada)}}"> --}}
    {{$results->url}}
</div>
<script>
    $(document).ready(function(){
    });
</script>
@endsection
