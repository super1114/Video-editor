var dragItems = document.getElementsByClassName("eachRes");
for(var i=0; i<dragItems.length; i++) {
    dragItems[i].addEventListener("dragstart", dragStart);
} 
var curItem = "";
var dragStarted = false;
function dragStart(e){
    dragStarted = true;
    curItem = e.target;
    var resource = JSON.stringify($(e.target).closest("img").data("resource"));
    e.dataTransfer.setData("resource", resource);
}



var workspaceItem = document.getElementById("workspace");
function drop(e) {
    if(!dragStarted) return;
    $("#workspace").removeClass("drop-over");
    var resource= JSON.parse(e.dataTransfer.getData("resource"));
    var nodeCopy = curItem.cloneNode(true);
    $.ajax({
        url: add_item_url,
        method: "post",
        data: {
            new_item: resource,
            items: items,
            project_id: project_id,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {

        },
        error: function(data) {

        }
    })
    dragStarted = false;
    console.log(resource);
}
workspaceItem.addEventListener("drop", drop);


function repeatHandlers() {
    
}


$(document).ready(function(){
    //repeatHandlers();
    $("#workspace").on("dragenter", function(e) {
        e.preventDefault();
        $(e.target).closest("#workspace").addClass("drop-over");
    })
    $("#workspace").on("dragover", function(e) {
        e.preventDefault();
        $(e.target).closest("#workspace").addClass("drop-over");
    })
    $("#workspace").on("dragleave", function(e) {
        $(e.target).removeClass("drop-over");
    })
})