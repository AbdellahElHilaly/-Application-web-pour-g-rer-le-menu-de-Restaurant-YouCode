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
            console.log(response);
            get();
            closeModel();
        },
        error: function(jqXHR, textStatus, errorThrown) {
            let errors = jqXHR.responseJSON.errors

            if(errors.name) $("#error-name").html(errors.name[0]);
            else if(errors.description) $("#error-description").html(errors.description[0]);
            else console.log(jqXHR.responseJSON);
        }
    });



}

function closeModel(){
    $('#exampleModalToggle').modal('hide');
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
        url: '/category',
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
