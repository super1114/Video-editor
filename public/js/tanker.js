function archive(tanker) {
    console.log(tanker);
    $.ajax({
        type: 'POST',
        url: base_url + '/tankers/archive',
        data: {
            _token: $("[name='_token']").val(),
            tanker_id: tanker
        },
        success: function(response) {
            if(response == 'success') {    
                document.getElementById("row" + tanker).innerHTML = null;
            }
        }
    })
}