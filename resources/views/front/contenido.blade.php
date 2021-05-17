@extends("front.layout.app")

@section("content")
<div class="content">
    <input type="hidden" value="{{$contingut->url}}">
    {{-- <img src="{{asset('/contenido/1/'.$contingut->url)}}"> --}}
</div>
<script>
    $(document).ready(function(){
        console.log($("input").val())
    });   
</script>
@endsection
