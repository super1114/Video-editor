var curTimeSlot="";
var selectedItem="";
var curTimeSec = 0;


function delete_item() {
    if(selectedItem=="")return;
    console.log(selectedItem);
    $.ajax({
        url:del_item_url,
        method:"post",
        data: {
            project_id:project_id,
            item_id:selectedItem.item_id,
            slot_id:selectedItem.id,
        },
        success: function(data) {
            items = data.items;
            max_dur = data.max_dur;
            var itemHtml = data.itemHtml;
            //curTimeSlot.closest(".time_slot_parent").remove();
            curTimeSlot.closest(".time_slot_parent").html(itemHtml);
            timeSlotAction();
            curTimeSlot = "";
            console.log(items);
            if(items.length==0){
                $("#item_"+selectedItem.item_id).remove();
                var org_html = $("#workspace").html();
                var new_html = "<h1 class='text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-br from-gray-400 to-gray-600 text-center leading-normal drag_text'>Drag and drop media to the timeline</h1>"
                $("#workspace").html(org_html+new_html);
                DrawTimelineCanvas();
                timeLineCanvasAction();
            }
        },
        error:function(data,error) {

        }
    })
}

function timeLineCanvasAction () {
    $("#timelineCanvas").on("click", function(e) {
        canvas = document.getElementById("timelineCanvas");
        var pos = getMousePos(canvas, e).x;
        $(".seeker").css({'transform' : 'translate(' + pos+"px" +', ' + "0px" + ')'})    
        curTimeSec = Math.floor(pos/1.5);
        console.log(curTimeSec);
    })
}

function timeSlotAction(){
    $(".time_slot").on("click", function(e){
        var time_slot = $(e.target).closest(".time_slot");
        selectedItem = time_slot.data("item");
        if(curTimeSlot!=""){
            curTimeSlot.removeClass("border-solid border-4 border-green-300");
        }
        curTimeSlot = time_slot;
        curTimeSlot.addClass("border-solid border-4 border-green-300");
    })
}
$(document).ready(function(){
    timeSlotAction();
    timeLineCanvasAction();
    $(".seeker").on("mousedown", function(e) {
        if(e.buttons){
            prevX = e.pageX;
            curX = e.pageX;
            console.log($(".seeker").css("left"));
            //$(this).css({'transform' : 'translate(' + "10px" +', ' + "0px" + ')'})    
        }
    })
    $(".seeker").on("mousemove", function(e) {
        if(e.buttons){
            $(this).css({'transform' : 'translate(' + "10px" +', ' + "0px" + ')'})    
        }
    });
    

    
    $(".delete_item").on("click", function(e) {
        delete_item();
    })
    $(document).on("keydown", function(e) {
        if(e.keyCode==46) {
            delete_item();
        }
    })
    $(".cut_item").on("click", function(e) {
        console.log(items);
        console.log(curTimeSec);
        if(selectedItem=="") return;
        console.log(selectedItem);
        $.ajax({
            url: cut_item_url,
            method: "post",
            data: {
                slot_id: selectedItem.id,
                item_id: selectedItem.item_id,
                cutPosTime: curTimeSec
            },
            success: function(data){
                $("#item_"+selectedItem.item_id).html(data.itemHtml);
                timeSlotAction();
            },
            error: function(data, error) {

            }
        })
    })
})