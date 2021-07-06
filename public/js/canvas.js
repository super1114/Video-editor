function getTwoNum(i) {
    if(i<10) return "0"+i;
    else return i;
}
function DrawTimelineCanvas() {
    ctx.beginPath();
    ctx.lineWidth = 1;
    ctx.moveTo(0,0);
    ctx.lineTo(2700,0);
    for (var i = 0; i < 16; i++) {
        ctx.lineWidth = 1;
        ctx.moveTo(i*90, 0);
        ctx.lineTo(i*90, 23);    
    }
    
    ctx.strokeStyle = "rgb(141, 141, 156)";
    ctx.stroke();
    ctx.beginPath();
    ctx.lineWidth = 2;
    ctx.font = "12px Courier";
    for (var i = 0; i < 15; i++) {
        ctx.moveTo(i*90+45, 0);
        ctx.lineTo(i*90+45, 7);
        min = getTwoNum(i);
        //sec = getTwoNum(i%2)+30
        ctx.strokeText(min+":30",i*90+26,20);
    }
    
    ctx.strokeStyle = "rgb(141, 141, 156)";
    ctx.stroke();
}
$(document).ready(function(){
    DrawTimelineCanvas();
})