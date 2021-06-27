$(document).ready(function() {

    if(!editing && hire) {
        if(hire['hirer_name'] != '') {
            $("#hirer_name").val(hire['hirer_name']);
        }
        if(hire['hirer_position']) {
            $("#hirer_position").val(hire['hirer_position']);
        }
        if(hire['hirer_behalf']) {
            $("#hirer_behalf").val(hire['hirer_behalf']);
        }
        if(hire['tcl_behalf']) {
            $("#tcl_behalf").val(hire['tcl_behalf']);
        }
    }
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#cleaning_status_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
   
    $("#cleaning_status_image_form").on('change', function(){        
        readURL(this);
    });
    
    $("#cleaning_status_image").on('click', function() {            
       $("#cleaning_status_image_form").click();
    });
});