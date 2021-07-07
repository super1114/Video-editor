$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    $(".order_btn").on("click", function(e) {
        var project_id = $(e.target).closest("tr").data("id");
        _toggleClass("order_btn", "Ordering", true);
        $.ajax({
            url: order_video_url,
            method: "post",
            data: {
                project_id: project_id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                _toggleClass("order_btn", "Order", false);
                showMsg("OK" , "Successfully Ordered");
                setTimeout(function(){
                    document.location.reload();
                }, 2000);
            },
            error: function(data, error) {
                _toggleClass("order_btn", "Order", false);
                showMsg("Oops" , "Ordering Failed");
                
            }
        })
    })
})