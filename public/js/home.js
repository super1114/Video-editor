function _toggleClass(class1="", class2="", name="hidden") {
    $("."+class1).toggleClass(name);
    $("."+class2).toggleClass(name);
}
var slider_count = 0;
var VIDEO_EDITOR = {
    isPlaying: false,
    togglePlay: function () {
        console.log(this.isPlaying);
        if(this.isPlaying){
            this.isPlaying =  false;
            var playing_icon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z' /><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 12a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
            $(".preview").html(playing_icon);
        }else {
            this.isPlaying = true;
            var pause_icon = "<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z' /></svg>";
            $(".preview").html(pause_icon);
        }
    },
    uploadResource: function(e) {
        var resource = $('#upload_file')[0].files[0];
        var formdata = new FormData();
        formdata.append("resource", resource);
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
    addSliderHtml: function(resource) {
        $.ajax({
            url:site_url+"/getComponent/"+resource.id,
            method: "GET",
            success: function(data) {
                var org_html = $(".components").html();
                $(".components").html(org_html+data);
            },
            error: function(data) {
                console.log(data);
            }
        })
        var html = $(".slider_container").html();
        var slider_html = "<div data-id="+resource.id+" slider_index="+slider_count+" class='slider mt-4'></div>";
        $(".slider_container").html(html+slider_html);
        slider_count++;
    },
    init: function() {
        this.initPlugins();
        this.initHandlers();
    },
    initPlugins: function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    },
    initHandlers: function() {
        $(".new_project").on("click", function(e) {
            e.preventDefault();
            toggleModal();
        });
    
        $(".create_project_btn").on("click", function(e) {
            var project_name = $("#project_name").val();
            if(project_name==""||project_name==null) return;
            document.location.href = "/new_project/"+project_name 
        });
        $("#upload_file").on("change", function(e) {
            VIDEO_EDITOR.uploadResource(e);
        })
        $(".upload_btn").on("click", function(e) {
            e.preventDefault();
            $("#upload_file").trigger("click");
        })
        $(".modal-close").on("click", function(e) {
            e.preventDefault();
            toggleModal();
        });
        $(".res_img").on("dblclick", function(e) {
            
        });
        $(".preview").on("click", function(e) {
            VIDEO_EDITOR.togglePlay();
            //$(".preview").html()
            document.getElementById("myVideo").play();
        })
        $(".export_video").on("click", function(e) {
            $.ajax({
                url: export_video_url,
                method: "get",
                success: function(e) {

                },
                error: function(e) {

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
        $(".add_res_btn").on("click", function(e) {
            var resource = $(e.target).closest("div").data("resource");
            
            VIDEO_EDITOR.addSliderHtml(resource);
        })
    }
}

VIDEO_EDITOR.init();