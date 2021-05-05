$(document).ready(function() {
    let pag = $("#pag").val();
    // Adminify
    $("input:checkbox").on('change',function(e) {

        let aux=(e.target.checked) ? 1 : 0;
        let id=$(this).data("id");

        $.ajax({
            url: (pag==="admin") ? "/back/admin/u/adminify/" : "/back/admin/u/block/",
            // url: url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "PUT",
            data: {
                id: id,
                aux: aux
            },
            dataType: 'json',

            success: function(data){
                console.log(data);
            }

        });
    });

    $("select").on('change',function(e) {
        let avis=e.target.value;
        let user=e.target.closest("tr");
        user=$(this).closest('tr').data('id');

        $.ajax({
            url: "/back/admin/u/notify",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: {
                avis: avis,
                user: user
            },
            dataType: 'json',

            success: function(data){
                console.log(data);
            }

        });
    });
});
