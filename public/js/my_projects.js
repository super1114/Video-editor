$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var MyProject = {
    init: function(){
        
    }
}

MyProject.init();