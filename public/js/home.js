var VIDEO_EDITOR = {
    init: function() {
        this.initPlugins();
        this.initHandlers();
    },
    initPlugins: function() {
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
        })
    }
}

VIDEO_EDITOR.init();