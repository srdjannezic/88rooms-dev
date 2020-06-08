var input_hidden_media_id;
function openMediaModal(id){
    input_hidden_media_id = id;    
    $("#media-modal").modal('show');    
}
function addMedia(el){
    var id = $(el).attr("data-id");
    var url = $(el).find("img").attr("src");
    var ind = $(".slide-sortable").index() + 1;
    if(!input_hidden_media_id){
        $("#cmd_media_thumb").find("input[type='hidden']").val(id);
        $("#cmd_media_thumb img").attr("src",url);
    }else{
        console.log(1)
        $("#cms_media_slides").append('<div class="slide-sortable ui-sortable-handle" id="media_'+id+'"><a href="#" onclick="removeSlide('+id+')" class="removeMenuItem">Remove</a><input type="hidden" id="hidden_'+id+'" name="CmsSlide['+ind+'][cms_media_id]" value="'+id+'" /><img src="'+url+'"/></div>');    
    }
}
function removeSlide(id){
    $("#media_"+id).remove();
}

function removeGalleryItem(el){
    var id = $(el).attr("data-id")
    $.get("/backend/cmsGalleries/removeGalleryItem/",{
        id:id
    },function(response){
        if(!response.error){
            $.fn.yiiGridView.update("galleryItems");
        }
    }, 'json');
}
$(function(){
    $(".sortable").sortable();
    $('.colPicker').colpick({
        layout:'hex',
        submit:0,
        colorScheme:'dark',
        onChange:function(hsb,hex,rgb,el,bySetColor) {
            $(el).css('border-color','#'+hex);
            // Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
            if(!bySetColor) $(el).val(hex);
        }
    }).keyup(function(){
        $(this).colpickSetColor(this.value);
    });
    Dropzone.options.myAwesomeDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB                                
        complete: function(response, res) {
            //jQuery('.content-reload').load($(".content-reload").attr("data-reloadUrl") + ' .content-reload');
            $.fn.yiiListView.update('media-modal-list');
        }
    };
    initializeBox();
})
function insertTemplatePlaceholder($selectBox, editorInstance) {
    var name= $selectBox.find(".selectBox_button").val();
    var id= $selectBox.find("input[type='hidden']").val();
    var html= "<div contenteditable='false' class='templatePlaceholder' data-entity='Template' data-placeholder-name='"+id+"'>Template."+name+"</div>";
    var element = CKEDITOR.dom.element.createFromHtml( html );
    editorInstance.insertElement( element );
    editorInstance.insertHtml("&nbsp;");
}

function prettyPhotoLoad(){
    $("a[rel^='prettyPhoto']").prettyPhoto({
        theme:'light_square',
        social_tools: '',
        deeplinking: false
    });
}
$(function(){
    /*$("a[rel^=prettyPhoto]").prettyPhoto({        
        theme:'light_square',
        social_tools: '',
        deeplinking: false
    });*/
    $(".selectBox_button").click(function(){        
        var box = $(this).parents("div").attr("data-result-box");
        $("#"+box).toggle();    
    })
    refreashSelectBox();
});
function refreashSelectBox(){
    $(".selectBoxResult .table tbody tr").click(function(){
        var id = $(this).find(".idColumn").html();
        var selectBox = $(this).parents(".selectBox");
        selectBox.find("input[type='hidden']").val(id);
        selectBox.find("input[type='button']").val(id);
        selectBox.find(".selectBoxResult ").toggle();
    })
}
function getSelectBoxOptions(id, options, url, columns, textPattern, random) {
    options.type="POST";
    // for some reason, if first action performed on a cgridview is sort,
    // url is wrong and instead of pointing to the /find action, it points to
    // the /view action
    var properController= url.match(/r=(.*)/)[1];
    var fixedUrl= options.url.replace(/r=[^&]+&(.*)/, "r="+properController+"&$1");
    options.url= fixedUrl;

    var dataObj= {
        "id":id,
        "url":url,
        "columns": columns,
        "textPattern": textPattern,        
        "random": random
    };
    options["data"]=dataObj;

    var $grid= $("#"+id);

    if(type=="selectBox" && multiSelect=="1") {
        var $addResultsetButton= $grid.parents(".selectBoxResult").find(".add_resultset_button");
    //console.log($addResultsetButton);
    // TODO: 1. FIX, 2. IT
    }

}
function reloadAlert(text, type) {
    $.ajax({
        async: false,
        url: "/generic/refreshFlashAlert",
        type: "post",
        data: {
            text:text,
            type:type
        },
        success: function(data) {            
            $('#flashAlert').append(data);
            loadAlert();
        }
    });
}

function loadAlert() {
    if(!$('#flashAlert').is(":visible") && $('#flashAlert .alert').length>0) {
        $('#flashAlert').fadeIn(200);
    }

    var $last= $("#flashAlert .alert");

    // alert item will dissapear after 4 seconds, but hovering it will
    // pause the dissapearance. On mouseout, dissapearance will continue
    $last.hover(function() {
        if($last.data("timeout")) {
            $last.data("timeout").pause();
        }
    }, function() {
        if($last.data("timeout")) {
            $last.data("timeout").resume();
        }
    });
    $last.fadeOut(4000, function() {
        $last.remove();
    })
}

function confirmDelete(url, $relationGridDeleteLink, text) {
    if(!text) text= "Da li ste sigurni da želite da obrišete ovu stavku?";
    if(!url) {
        if(!confirm(text)) {
            return false;
        }
        if(!$relationGridDeleteLink) {
            return true;
        }
        else {
            $.post($relationGridDeleteLink.attr("href"), {}, function(data) {                
                reloadAlert();
                if(data=="ok") {
                    var gridId= $relationGridDeleteLink.parents(".grid-view").attr("id");
                    var selectBoxGridId= gridId.replace("-related-", "-selectBox-");

                    $.fn.yiiGridView.update(gridId);

                    // if select box exists, update it so notIn condition gets updated
                    if($("#"+selectBoxGridId).length==1) {
                        window.setTimeout(function() {
                            $.fn.yiiGridView.update(selectBoxGridId);
                        }, 2000);

                    }
                }
                return false;
            });
            return false;
        }
    }
    else {
        if(confirm(text)) {
            $.post(url, {}, function(data) {
                console.log(data);
                reloadAlert();

                if(data && data!="") {
                    data= $.parseJSON(data);

                    if(data['redirect']) {
                        window.location.href= data['redirect'];
                    }
                    else {
                        window.location.reload();
                    }
                }
            });
        }
        return false;
    }
}
function initializeBox(){
    var accordionBoxOpts = {
        collapsible: true,
        active: false,
        height: 'fill',
        header: 'h3'
    };
    $('#slide-boxes').accordion(accordionBoxOpts).sortable({
        items: '.s_panel'
    });
    
    $('#slide-boxes').on('accordionactivate', function (event, ui) {
        if (ui.newPanel.length) {
            $('#slide-boxes').sortable('disable');
        } else {
            $('#slide-boxes').sortable('enable');
        }
    });
    $("#addBox").click(function(){
        var ind = $(".s_panel").index() + 1;
    
        $.post("/backend/cmsSlides/addBoxItem",{
            i:ind
        },function(response){
            $("#slide-boxes").append(response);
            $('#slide-boxes').accordion('destroy').accordion(accordionBoxOpts).sortable({
                items: '.s_panel'
            });
        });
    });
}
function changeItemTitle(val,index){
    $("#itemTitle-"+index).html(val);
}
function removeItem(el){
    $(el).parents(".s_panel").remove();
}