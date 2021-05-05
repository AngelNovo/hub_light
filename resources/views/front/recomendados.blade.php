@extends("front.layout.app")

@section("content")
<div class="content">

</div>
<script>
    $(document).ready(function(){
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Recomendados").addClass("isSelected");
    });   
</script>
@endsection
