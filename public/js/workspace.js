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
            //setVideoScreen();
            max_dur = data.max_dur;
            var itemHtml = data.itemHtml;
            if(itemHtml==""){
                curTimeSlot.closest(".time_slot_parent").remove();    
            }else {
                curTimeSlot.closest(".time_slot_parent").html(itemHtml);    
            }
            timeSlotAction();
            curTimeSlot = "";
            console.log(selectedItem);
            $("#slot_"+selectedItem.id).remove();
            if(items.length==0) {
                $("#item_"+selectedItem.item_id).remove();
                var org_html = $("#workspace").html();
                var new_html = "<h1 class='text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-br from-gray-400 to-gray-600 text-center leading-normal drag_text'>Drag and drop media to the timeline</h1>"
                $("#workspace").append(new_html);
                DrawTimelineCanvas();
            }
            timeLineCanvasAction();
            initTimeSlotMoveHandler();
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
        //video.currentTime = curTimeSec;
        $(".canvas").removeClass("hidden");
        
        setNewPlayingItem();
        //video.pause();
        //var playing_icon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z' /><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
        //$(".preview").html(playing_icon);
    

    })
    initSeekerMoveHandler();
}

function timeSlotAction(){
    $(".time_slot").on("click", function(e){
        var time_slot = $(e.target).closest(".time_slot");
        selectedItem = time_slot.data("slot");
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
    $(".delete_item").on("click", function(e) {
        delete_item();
    })
    $(document).on("keydown", function(e) {
        if(e.keyCode==46) {
            delete_item();
        }
    })
    $(".cut_item").on("click", function(e) {
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
                if(data.status=="success") {
                    items = data.items;
                    max_dur = data.max_dur;
                    $("#item_"+selectedItem.item_id).html(data.itemHtml);
                    timeSlotAction();
                    initTimeSlotMoveHandler();    
                }
                
            },
            error: function(data, error) {

            }
        })
    })
})
window.onload = initSeekerMoveHandler;
window.onload = initTimeSlotMoveHandler;

function initSeekerMoveHandler(){
    document.getElementById('seeker').addEventListener('mousedown', seekerMouseDown, false);
    window.addEventListener('mouseup', seekermouseUp, false);
}

function seekermouseUp()
{
    setNewPlayingItem();
    window.removeEventListener('mousemove', seekerMove, true);
}

function seekerMouseDown(e){
    window.addEventListener('mousemove', seekerMove, true);
}

function seekerMove(e){
    var pos = getMousePos(c,e).x;
    if(pos<=0)return;
    $("#seeker").css({'transform' : 'translate(' + pos+"px" +', ' + "0px" + ')'})    
    curTimeSec = Math.floor(pos/1.5);
    $(".canvas").removeClass("hidden");
    video.currentTime = curTimeSec;
}

var distance = 0;
function initTimeSlotMoveHandler(){
    for(var i=0;i<items.length;i++){
        for(var j=0; j< items[i].slots.length;j++){
            console.log(items[i].slots[j]);
            document.getElementById("slot_"+items[i].slots[j].id).addEventListener('mousedown', timeSlotMouseDown, false);
        }
    }
    window.addEventListener('mouseup', timeSlotMouseUp, false);
}

var targetString = "";

function timeSlotMouseUp()
{
    curMovingItemElement = "";
    curMovingSlotElement = "";
    console.log("moused up");
    window.removeEventListener('mousemove', timeSlotMove, true);
}

function timeSlotMouseDown(e){
    curMovingItemElement = $(e.target).closest(".time_slot_parent");
    curMovingSlotElement = $(e.target).closest(".time_slot");
    selectedItem = curMovingSlotElement.data("slot");
    var pos = getMousePos(c, e).x;
    var left = parseInt($(e.target).closest(".time_slot").css("left"));
    distance = pos-left;
    window.addEventListener('mousemove', timeSlotMove, true);
}


function timeSlotMove(e){
    
    if(distance==0) return;
    if(detectedConflict()) return;
    var pos = getMousePos(c,e).x;
    let left = pos-distance;
    if(left<0) left = 0;
    if(curMovingSlotElement=="") return;
    curMovingSlotElement.css('left', left+"px");
    
}

