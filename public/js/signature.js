$(document).ready(function(){
    var specify;

    var pixie = new Pixie({
        baseUrl: asset_url,
        ui: {
            visible: false, // whether pixie is visible initially
            mode: 'overlay',
            toolbar: {
                hideOpenButton: true,
                hideCloseButton: true,
            },
            nav: {
                position: 'top',
                replaceDefault: true,
                items: [
                    {name: 'draw', icon: 'pencil-custom', action: 'draw'},
                    {name: 'text', icon: 'text-box-custom', action: 'text'},
                    {name: 'shapes', icon: 'polygon-custom', action: 'shapes'},
                    {name: 'stickers', icon: 'sticker-custom', action: 'stickers'},
                ]
            },
            openImageDialog: null,
        },
        ToolbarItemAction : ['exportImage', 'toggleHistory', 'closeEditor'],
        onLoad : function () {
            $('.mat-focus-indicator.mat-menu-trigger.mat-button.mat-button-base.ng-star-inserted').css('display','none')
            // $('.mat-focus-indicator.mat-button.mat-button-base.mat-icon-button.ng-star-inserted').css('display','none')
            $('toolbar .right').find('toolbar-item').eq(2).css('display', 'none')
        },
        onOpen : function() {
            if (specify === 'hirer_signature-image' || specify === 'tcl_signature-image') {
                $('navigation-bar .scroll-container').find('button').eq(1).css('display', 'none')
                $('navigation-bar .scroll-container').find('button').eq(2).css('display', 'none')
                $('navigation-bar .scroll-container').find('button').eq(3).css('display', 'none')
            } else {
                $('navigation-bar .scroll-container').find('button').eq(1).css('display', 'block')
                $('navigation-bar .scroll-container').find('button').eq(2).css('display', 'block')
                $('navigation-bar .scroll-container').find('button').eq(3).css('display', 'block')
            }
            $('.parentForm').attr('onsubmit', "return false")
        },
        onSave: function(data, name) {
            let current_Url;
            let imageId;
            let imageFormId;

            switch(specify) {
                case 'left-side-image':
                    name = 'left-side.' + name.split('.').pop()
                    current_Url = $('#left-side-image').attr('src')
                    imageId = '#left-side-image'
                    imageFormId = '#left-side-image-form'
                    break;
                case 'front-side-image':
                    name = 'front-side.' + name.split('.').pop()
                    current_Url = $('#front-side-image').attr('src')
                    imageId = '#front-side-image'
                    imageFormId = '#front-side-image-form'
                    break;
                case 'back-side-image':
                    name = 'back-side.' + name.split('.').pop()
                    current_Url = $('#back-side-image').attr('src')
                    imageId = '#back-side-image'
                    imageFormId = '#back-side-image-form'
                    break;
                case 'right-side-image':
                    name = 'right-side.' + name.split('.').pop()
                    current_Url = $('#right-side-image').attr('src')
                    imageId = '#right-side-image'
                    imageFormId = '#right-side-image-form'
                    break;
                case 'internal-image':
                    name = 'internal-image.' + name.split('.').pop()
                    current_Url = $('#internal-image').attr('src')
                    imageId = '#internal-image'
                    imageFormId = '#internal-image-form'
                    break;
                case 'hirer_signature-image':
                    name = 'hirer_signature-image.' + name.split('.').pop()
                    current_Url = $('#hirer_signature-image').attr('src')
                    imageId = '#hirer_signature-image'
                    imageFormId = '#hirer_signature-image-form'
                    break;
                case 'tcl_signature-image':
                    name = 'tcl_signature.' + name.split('.').pop()
                    current_Url = $('#tcl_signature-image').attr('src')
                    imageId = '#tcl_signature-image'
                    imageFormId = '#tcl_signature-image-form'
                    break;
            }


            pixie.http()
                .post(image_saveUrl, 
                    {
                        _token : csrf_token ,
                        name: name,
                        data: data,
                        current_Url : current_Url
                    })
                .subscribe(function(response) {
                    $(imageId).attr('src', response.filePath)
                    $(imageFormId).attr('value', response.filePath)
                    // console.log(response);
                });
        },
        onClose : function () {
            $('.parentForm').attr('onsubmit', "")
        }
    });


    $('#left-side').on('click', function() {
        specify = 'left-side-image'
        pixie.openEditorWithImage(document.querySelector('#left-side-image'));
    })
    $('#front-side').on('click', function() {
        specify = 'front-side-image'
        pixie.openEditorWithImage(document.querySelector('#front-side-image'));
    })
    $('#back-side').on('click', function() {
        specify = 'back-side-image'
        pixie.openEditorWithImage(document.querySelector('#back-side-image'));
    })
    $('#right-side').on('click', function() {
        specify = 'right-side-image'
        pixie.openEditorWithImage(document.querySelector('#right-side-image'));
    })
    $('#internal').on('click', function() {
        specify = 'internal-image'
        pixie.openEditorWithImage(document.querySelector('#internal-image'));
    })
    $('#tcl_signature').on('click', function() {
        specify = 'tcl_signature-image'
        pixie.openEditorWithImage(document.querySelector('#tcl_signature-image'));
    })
    $('#hirer_signature').on('click', function() {
        specify = 'hirer_signature-image'
        pixie.openEditorWithImage(document.querySelector('#hirer_signature-image'));
    })

    if(!editing) {
        var now = new Date();
    
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
    
        var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    
        $('#tcl_sign_date').val(today);
        $("#hirer_sign_date").val(today);
    }
});
