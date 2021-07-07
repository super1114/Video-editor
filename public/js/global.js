function getMousePos(canvas, evt) {
    var rect = canvas.getBoundingClientRect();
    return {
      x: evt.clientX - rect.left,
      y: evt.clientY - rect.top
    };
}
function _toggleClass(class_name, text="", status) {
    if(status){
        $("."+class_name).addClass("opacity-50");
        $("."+class_name).addClass("cursor-not-allowed");
    }else {
        $("."+class_name).removeClass("opacity-50");
        $("."+class_name).removeClass("cursor-not-allowed");
    }
    $("."+class_name).prop('disabled', status);
    $("."+class_name).html(text);
}

function setVideoState() {
    console.log(items);
    console.log(curTimeSec);
}

function detectedConflict() {
    console.log(curMovingItemElement);
    return false;
}

function setVideoScreen() {
    if(items.length>0) {
        $(".blank_image").addClass("hidden");
        $("#video_id").removeClass("hidden");
        $(".canvas").removeClass("hidden");
        var video_source = document.getElementById("video_source");
        video_source.src = site_url+"/"+items[0].resource.path;
        //video.src = site_url+items[0].resource.path;
        //.src = site_url+items[0].resource.path;
    }else {
        $(".blank_image").removeClass("hidden");
        $("#video_id").addClass("hidden");
        $(".canvas").addClass("hidden");
    }
}

function setCurPlayingItem() {
    //for(var i=0;i<)
}
function setNewPlayingItem() {
    console.log("currentPlayingItem="+curPlayingItem);
    console.log(items);
    if(curTimeSec==0) {
        curPlayingItem = items[0];
        document.getElementById("source_video").src = site_url+"/"+curPlayingItem.resource.path;
        video.currentTime = 0;
        return;
    }
    for(var i=0;i<items.length;i++){
        for (var j=0;j<items[i].slots.length;j++){
            let xx = items[i].slots[j];
            console.log(curTimeSec,xx.t_start,xx.duration+xx.t_start);
            if(curTimeSec>xx.t_start&&curTimeSec<(xx.t_start+xx.duration)){
                curPlayingItem = items[i];
                console.log("xxOK");
                video.src = site_url+"/"+curPlayingItem.resource.path;
                console.log(curPlayingItem.resource.path);
                video.currentTime = xx.v_start+curTimeSec-xx.t_start;
                return;
            }
        }
    }
}

function showMsg(title, msg) {
    $(".alert_title").html(title);
    $(".alert_msg").html(msg);
    $(".m_alert").removeClass("hidden");
    setTimeout(function(){
        $(".m_alert").addClass("hidden");
    },2000)
}