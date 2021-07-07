var curItem = "";
var dragStarted = false;
var dragItems = document.getElementsByClassName("eachRes");
function dragDropInit() {
    for(var i=0; i<dragItems.length; i++) {
        dragItems[i].addEventListener("dragstart", dragStart);
    }
}

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
            items = data.items;
            console.log(items);
            //setNewPlayingItem();
            console.log(items);
            //setVideoScreen();
            max_dur = data.max_dur;
            addedItemHtml = data.addItemHtml;
            $(".drag_text").remove();
            $("#workspace").append(addedItemHtml);
            timeSlotAction();
            initTimeSlotMoveHandler();
            document.getElementById("source_video").src = site_url+items[0].resource.path;
        },
        error: function(data) {

        }
    })
    dragStarted = false;
}
workspaceItem.addEventListener("drop", drop);


$(document).ready(function(){
    dragDropInit();
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


