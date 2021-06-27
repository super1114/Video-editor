$(document).ready(function() {        
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var file_data = $('#photo').prop('files')[0];
                var form_data = new FormData();
                form_data.append('photo', file_data);
                form_data.append('_token', $("[name='_token']").val());
                $.ajax({
                    url: base_url + '/user/avatarUpload',
                    data: form_data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    type: 'post',
                    success: function (response) {
                        $('#user_avatar').attr('src', e.target.result);
                    }
                });
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#user_avatar").on('click', function() {        
        $("#photo").click();
    });

    $("#photo").on('change', function(){
        readURL(this);
    });

});    