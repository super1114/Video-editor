$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    $("#createProjectForm").on("submit", function(e) {
        e.preventDefault();
        var project_name = $("#project_name").val();
        alert(project_name);
        document.location.href = site_url+"/new_project/"+project_name;
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