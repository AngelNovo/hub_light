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
        $("#Nav-Inicio").addClass("isSelected");
    });   
</script>
@endsection


