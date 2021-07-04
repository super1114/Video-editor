$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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
var slider_count = 0;
var play_index = 0;
var selectedResource = "";
var VIDEO_EDITOR = {
    isPlaying: false,
    startPlay: function (sort_items) {
        var videoDom = document.getElementById("myVideo");
        videoDom.src = site_url + "/" + sort_items[play_index].resource.path
        videoDom.currentTime = 3;
        videoDom.play();
        videoDom.ontimeupdate = function(e) {
            if(videoDom.currentTime>sort_items[play_index].i_end) {
                videoDom.pause();
                if(play_index==sort_items.length-1){ play_index=0; return; }
                play_index++;
                VIDEO_EDITOR.startPlay(sort_items);
            }
        }
        //console.log(videoDom.currentTime);
    },
    togglePlay: function () {
        console.log(this.isPlaying);
        if(this.isPlaying){
            this.isPlaying =  false;
            var playing_icon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z' /><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
            $(".preview").html(playing_icon);
        }else {
            $.ajax({
                url: save_item_url,
                method:"post",
                data: {
                    items: items,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    VIDEO_EDITOR.isPlaying = true;
                    var pause_icon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
                    $(".preview").html(pause_icon);
                    var sort_items = items.sort(function(a, b) {return a.i_start-b.i_start});
                    VIDEO_EDITOR.startPlay(sort_items);
                    
                }
            })
            
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
    initItemContainer: function() {
        console.log(items);
        console.log(max_dur);
        
    },
    init: function() {
        this.initPlugins();
        this.initHandlers();
    },
    initPlugins: function() {
        console.log($('meta[name="csrf-token"]').attr('content'));
        initRangeSlider();
        VIDEO_EDITOR.initItemContainer();
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

            VIDEO_EDITOR.togglePlay();

            
        })
        $(".export_video").on("click", function(e) {
            var sorted_items = items.sort(function(a, b) {return a.i_start-b.i_start});
            $.ajax({
                url: export_video_url,
                method: "post",
                data: {
                    items: sorted_items,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {

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
    addSliderHtml: function(resource) {
        initRangeSlider();
        $.ajax({
            url: add_item_url,
            method: "post",
            data: {
                items: items,
                project_id: project_id,
                new_item: resource,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {                
                items = data.items;
                max_dur = data.max_dur;
                VIDEO_EDITOR.initItemContainer();
            },
            error: function(data, error) {

            }
        })
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
        
        $(".del_res_btn").on("click", function(e) {
            var resource = $(e.target).closest("div").data("resource");
            $.ajax({
                url:del_resource_url,
                method: "post",
                data: {
                    id: resource.id,
                    project_id: project_id,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if(data.status=="success") {
                        items = data.items;
                        max_dur = data.max_dur;
                        VIDEO_EDITOR.initItemContainer();
                        $(e.target).closest("div").remove();
                    }
                }
            })
        })
    }
}

VIDEO_EDITOR.init();