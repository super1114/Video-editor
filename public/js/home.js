$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function _toggleClass(class1="", class2="", name="hidden") {
    $("."+class1).toggleClass(name);
    $("."+class2).toggleClass(name);
}
var slider_count = 0;
var play_index = 0;
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
        _toggleClass("upload_btn", "uploading", "hidden");
        $.ajax({
            url: upload_resource_url,
            data: formdata,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(data) {
                if(data.status=="success") {
                    _toggleClass("upload_btn", "uploading", "hidden");
                    var resource = data.resource; 
                    var origin_html = $(".resources").html().search("No resources")==-1 ? $(".resources").html() : "";
                    $(".resources").html(data.resourceHtml+origin_html);
                    VIDEO_EDITOR.repeatHandlers();
                }
            }
        });
    },
    initItemContainer: function() {
        console.log(items);
        console.log(max_dur);
        $(".items_container").html("");
        items.forEach(function(item) {
            var orghtm = $(".items_container").html();
            var item_html = "<div class='flex items-start justify-between'><img src='"+site_url+"/"+item.resource.thumbnail+"' class='w-2/12 pr-4' /><div id='item_"+item.id+"' class='item w-full'></div></div>";
            $(".items_container").html(orghtm+item_html);
        })
        items.forEach(function(item){
            $('#item_'+item.id).rangeSlider({ settings: false, skin: 'red', type: 'interval', scale: false });
            $('#item_'+item.id).rangeSlider({}, { step: 1, values: [item.i_start,item.i_end],min:0, max: max_dur });
            $('#item_'+item.id).rangeSlider('onChange', function(event){
                item.i_start = event.detail.values[0];
                item.i_end = event.detail.values[1];
            });
        })
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
                items.forEach(function(item) {
                    
                    
                })
                items = data.items;
                max_dur = data.max_dur;
                VIDEO_EDITOR.initItemContainer();
            },
            error: function(data, error) {

            }
        })
    },
    repeatHandlers: function() {
        $(".add_res_btn").on("click", function(e) {
            var resource = $(e.target).closest("div").data("resource");
            VIDEO_EDITOR.addSliderHtml(resource);
        });
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