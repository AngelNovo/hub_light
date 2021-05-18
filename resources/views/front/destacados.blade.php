@extends("front.layout.app")

@section("content")
<div class="content">

</div>
{{-- Scripts --}}
<script>
    // Document Ready
    $(document).ready(function(){
        // Marcar Navbar
        $(".isSelected").removeClass("isSelected");
        $("#Nav-Destacados").addClass("isSelected");
    });   
</script>
@endsection
