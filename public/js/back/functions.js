function quitarAvisos(id) {
    $.ajax({
        url: "/back/admin/u/notifyList",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "DELETE",
        data: {
            id: id
        },
        dataType: 'json',

        success: function(data){
            window.location="/back/admin/u/notifyList";
        }

    });
}

function aceptarAviso(id) {
    $.ajax({
        url: "/back/admin/u/notifyList",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "PUT",
        data: {
            id: id
        },
        dataType: 'json',

        success: function(data){
            window.location="/back/admin/u/notifyList";
            // console.log(data);
        }

    });
}

function adultify(id,value) {
    $.ajax({
        url: "/back/admin/adultify",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "PUT",
        data: {
            id: id,
            val:value
        },
        dataType: 'json',

        success: function(data){
            // window.location="/back/admin/u/notifyList";
            console.log(data);
        }

    });
}
