@extends("front.layout.app")

@section("content")
<div class="content">

</div>
<script>
    $(document).ready(function(){
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Explorar").addClass("isSelected");
    });   
</script>
@endsection
