var VIDEO_EDITOR = {
    uploadResource: function(e) {
        var resource = $('#upload_file')[0].files[0];
        var formdata = new FormData();
        formdata.append("resource", resource);
        formdata.append("project_hash", project_hash);
        $.ajax({
            url: upload_resource_url,
            data: formdata,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
            }
        });
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
        let slider = document.getElementById("slider");
        noUiSlider.create(slider, {
            start: [0, 100],
            connect: true,
            range: {
                'min': 0,
                'max': 100
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
        })
    }
}

VIDEO_EDITOR.init();