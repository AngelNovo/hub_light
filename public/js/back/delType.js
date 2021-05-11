$(document).ready(function() {
    $('i').on('click',function(e) {
        console.log(e.target.data-id);
        console.log($(this).data('id'));
        // $.ajax({
        //     url: "//back/admin/tipususer",
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     },
        //     type: "DELETE",
        //     data: {
        //         id: id
        //     },
        //     dataType: 'json',

        //     success: function(data){
        //         console.log(data);
        //     }

        // });
    });
});
