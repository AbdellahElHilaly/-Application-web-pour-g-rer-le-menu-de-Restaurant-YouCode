$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function store() {
    let form  = document.getElementById('categoryForm');
    let formData = new FormData(form);

    $.ajax({
        url: "/category",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,

        success: function (response) {
            if(response.success) showMessage( response.message , 1)
            else showMessage( response.message , 2)
            get();
            closeModel();

        },
        error: function(jqXHR, textStatus, errorThrown) {
            let errors = jqXHR.responseJSON.errors


            if(errors.name) $("#error-name").html(errors.name[0]);
            else if(errors.description) $("#error-description").html(errors.description[0]);
            else showMessage(jqXHR.responseJSON , 0)

        }
    });



}

function closeModel(){
    $('#exampleModalToggle').modal('hide');
}


function showMessage(msg , etat){
    let alert = $("#alert-action");
    let result = "Action Success ";

    if(etat == 0) {alert.removeClass("alert-success").addClass("alert-danger"); result = "Action Error ";}
    else if(etat == 1) alert.removeClass("alert-danger").addClass("alert-success");
    else if(etat == 2)  { alert.removeClass("alert-danger").addClass("alert-warning"); result = "Action Roffus ";}

    alert.addClass("show" );
    alert.html("<strong>" + result +  "</strong>" + msg + '<button type="button" class="btn-close close" ></button>');


    $('.btn-close').click(function() {
        $('#alert-action').removeClass('show');
    });

}



$(document).ready(function() {
    $("#submitBtn").click(function(e) {
        e.preventDefault();
        store();
    });
});

get();


function get() {
    $.ajax({
        url: '/ajax',
        type: 'GET',
        success: function(data) {
            //loop through the data and generate the options
            var options = '';
            for(var i = 0; i < data.length; i++) {
                options += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            //add the options to the select element
            $("#category_id").html(options);
        }
    });
}
