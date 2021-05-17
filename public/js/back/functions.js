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
            // window.location="/back/admin/adultify";
            document.getElementById(id).value = 0
            console.log(data);
        }

    });
}

function deleteTypeContent(id) {
    $.ajax({
        url: "/back/admin/tipuscontent",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "DELETE",
        data: {
            id: id
        },
        dataType: 'json',

        success: function(data){
            window.location="/back/admin/tipocontent";
        }

    });
}

function editTypeContent(id,campo,valor) {
    $.ajax({
        url: "/back/admin/tipuscontent",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "PUT",
        data: {
            id:id,
            campo:campo,
            valor:valor
        },
        dataType: 'json',

        success: function(data){
            // window.location="/back/admin/adultify";
            console.log(data);
        }

    });
}
