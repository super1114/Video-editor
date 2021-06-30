function _toggleClass(class1="", class2="", name="hidden") {
    $("."+class1).toggleClass(name);
    $("."+class2).toggleClass(name);
}
var slider_count = 0;
var VIDEO_EDITOR = {
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
                    var new_html = VIDEO_EDITOR.makeResourceItem(resource);
                    $(".resources").html(new_html+origin_html);
                }
            }
        });
    },
    makeResourceItem: function(resource) {
        var html = "";
        html += "<div data-id="+resource.id+" class='relative'>";
        html += "<a class='absolute top-3 right-3 w-5 text-center bg-red-500 hover:bg-white cursor-pointer rounded-md z-50 add_"+resource.id+" add_res_btn'>";
        html += "<i class='icon ion-md-trash text-white hover:text-red-500'></i>";
        html += "</a>";
        html += "<a class='absolute top-3 right-10 w-5 text-center bg-green-600 hover:bg-white cursor-pointer rounded-md z-50 del_"+resource.id+" del_res_btn'>";
        html += "<i class='icon ion-md-add text-white hover:text-green-600'></i>";
        html += "</a>";
        html += "<img src="+site_url+"/"+resource.thumbnail+" class='w-full rounded-md hover:opacity-80 z-0 res_img' data-id="+resource.id+" />";
        html += "<div class='text-center'>"+resource.name+"</div>";
        html += "</div>";
        return html;
    },
    addSliderHtml: function(resource) {
        var html = $(".slider_container").html();
        var slider_html = "<div data-id="+resource.id+" slider_index="+slider_count+" class='slider mt-4'></div>";
        $(".slider_container").html(html+slider_html);
        VIDEO_EDITOR.setWRunner($("div[slider_index="+slider_count+"]"));
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
        VIDEO_EDITOR.setWRunner($(".slider"));
    },
    setWRunner: function(element) {
        element.wRunner({
            step: 1,
            type: "range",
            limits: {
                minLimit: 0, 
                maxLimit: 100
            },

            singleValue: 50,
            rangeValue: { 
                minValue: 20, 
                maxValue: 80 
            },
            roots: document.body,

            divisionsCount: 5,
            valueNoteDisplay: true,
            theme: "default",
            direction: 'horizontal'
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
        $(".add_res_btn").on("click", function(e) {
            var resource = $(e.target).closest("div").data("resource");
            VIDEO_EDITOR.addSliderHtml(resource);
        })
    }
}

VIDEO_EDITOR.init();