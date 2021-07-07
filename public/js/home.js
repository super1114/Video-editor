$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var VIDEO_EDITOR = {
    
    startPlay: function (sort_items) {
        //video.src = site_url + "/" + sort_items[play_index].resource.path
        video.currentTime = curTimeSec;
        //$("#seeker").css({"transform":video.currentTime*1.5+"300px;"});
        $(".canvas").addClass("hidden");
        video.play();
        console.log(curPlayingItem);
        video.ontimeupdate = function(e) {
            curTimeSec = video.currentTime;
            if(curTimeSec>curPlayingItem.slots[0].t_start+curPlayingItem.slots[0].duration){
                setNewPlayingItem();
                video.pause();

                isPlaying =  false;
            var playing_icon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z' /><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
            $(".preview").html(playing_icon);
            }
            $("#seeker").css({'transform' : 'translate(' + (video.currentTime*1.5)+"px" +', ' + "0px" + ')'});
        }
    },
    togglePlay: function () {
        if(isPlaying){
            isPlaying =  false;
            var playing_icon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z' /><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
            $(".preview").html(playing_icon);
            video.pause();
        }else {
            isPlaying = true;
            var pause_icon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
            $(".preview").html(pause_icon);
            VIDEO_EDITOR.startPlay(items);
        }
    },
    uploadResource: function(e) {
        var resource = $('#upload_file')[0].files[0];
        var formdata = new FormData();
        formdata.append("resource", resource);
        formdata.append("_token", $('meta[name="csrf-token"]').attr('content'));
        formdata.append("project_hash", project_hash);
        _toggleClass("upload_btn", "uploading", true);
        $.ajax({
            url: upload_resource_url,
            data: formdata,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(data) {
                if(data.status=="success") {
                    _toggleClass("upload_btn", "upload", false);
                    var resource = data.resource; 
                    var origin_html = $(".resources").html().search("No resources")==-1 ? $(".resources").html() : "";
                    $(".resources").html(data.resourceHtml+origin_html);
                    $(".no_media_text").addClass("hidden");
                    dragDropInit();
                    if(selectedResource!=""){
                        console.log(selectedResource);
                        selectedResource.removeClass("border-dashed border-1 border-blue-500");
                        selectedResource = "";      
                    }
                    VIDEO_EDITOR.repeatHandlers();
                }
            }
        });
    },
    
    init: function() {
        this.initPlugins();
        this.initHandlers();
    },
    initPlugins: function() {
        
    },
    initHandlers: function() {
        
        $("#upload_file").on("change", function(e) {
            VIDEO_EDITOR.uploadResource(e);
        })
        $(".upload_btn").on("click", function(e) {
            e.preventDefault();
            $("#upload_file").trigger("click");
        })
        $(".preview").on("click", function(e) {
            console.log(items);
            console.log(curTimeSec);
            VIDEO_EDITOR.togglePlay();
        })
        $(".export_video").on("click", function(e) {
            //var sorted_items = items.sort(function(a, b) {return a.i_start-b.i_start});
            _toggleClass("export_video", "Exporting", true);
            $.ajax({
                url: export_video_url,
                method: "post",
                data: {
                    //items: sorted_items,
                    project_id: project_id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    _toggleClass("export_video", "Export", false);
                    showMsg("OK", "Video Exported Successfully");
                    console.log(data);
                },
                error: function(data) {
                    _toggleClass("export_video", "Export", false);
                    showMsg("Error", "Video Exporting Failed");

                }
            })
        });
        $(".order_btn").on("click", function(e) {
            var pro_id = $(this).closest("tr").data("id");
            $.ajax({
                url: order_video_url,
                method: "post",
                data: {
                    id: pro_id
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(data, error) {

                }
            })
        })
        VIDEO_EDITOR.repeatHandlers();
    },
    repeatHandlers: function() {
        $(".each").on("click", function(e) {
            var target = $(e.target).closest(".each");
            if(selectedResource!="") selectedResource.removeClass("border-dashed border-1 border-blue-500");
            selectedResource = target;
        })
        $(".each").on("mouseover", function (e) {
            var target = $(e.target).closest(".each");
            target.find(".badge").removeClass("hidden");
        })
        $(".each").on("mouseout", function (e) {
            var target = $(e.target).closest(".each");
            target.find(".badge").addClass("hidden");
        })
    }
}

VIDEO_EDITOR.init();