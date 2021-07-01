$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    $("#loginForm").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: $("#loginForm").attr("action"),
            method: "post",
            data: $("#loginForm").serialize(),
            success: function (data) {
                document.location.reload();
            },
            error: function(data, error) {
                document.location.reload();
            }
        })
    })
    $("#regForm").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            url: $("#regForm").attr("action"),
            method: "post",
            data: $("#regForm").serialize(),
            success: function (data) {
                console.log(data);
            },
            error: function(data, error) {
                console.log(error);
            }
        })
    })
})