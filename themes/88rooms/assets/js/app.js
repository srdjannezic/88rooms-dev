$(function(){    
    var options = {
        horizontal: 1,
        itemNav: 'basic',
        activateMiddle: 1,
        smart: 1,
        activateOn: 'click',
        mouseDragging: 1,
        touchDragging: 1,
        releaseSwing: 1,
        scrollBar: $('.scrollbar'),
        scrollBy: 1,
        activatePageOn: 'click',
        speed: 300,
        moveBy: 600,
        elasticBounds: 1,
        dragHandle: 1,
        dynamicHandle: 0,
        clickBar: 1
    };    
    if($(".frame").length){        
        var sly = new Sly($(".frame"), options).init();
        $(window).resize(function(){
            sly.reload();
        });
    }
    //$('.frame').sly(options);
    $('.single-slider.flexslider,.flex-inner.flexslider').flexslider({
        animation: "fade",
        directionNav: false,
        smoothHeight: true,
        startAt: 0,
        start:function(slider){
            if($(slider).hasClass("loading")){
                $(slider).removeClass('loading');
            }
        }
    });
    $(".book-now-drop .portlet-title").click(function(){
        $(".book-now-drop").toggleClass("active");
    });
    $(".book-now-form input[name='BookNowForm[date]'],.book-now-form input[name='date']").Zebra_DatePicker({
        direction: true, 
        format: 'Y-m-d', 
        header_width:226,
        default_position:'below',
        offset:[-210,27]
    });
    
    $(".book-now-drop input[name='BookNowForm[date]'],.book-now-drop input[name='date']").Zebra_DatePicker({
        direction: true, 
        format: 'Y-m-d',
        header_width:235,
        default_position:'below',
        offset:[-246,27]
    });    
    $(".dropdown-toggle").click(function(e){
        e.preventDefault();
        var toggle = $(this).attr("data-toggle");
        $(this).parents(".dropdown-wrap").find("." + toggle + "-menu").toggleClass("show");
    });
    var si = $('.big-gallery').royalSlider({
        arrowsNav: true,
        loop: false,
        keyboardNavEnabled: true,
        controlsInside: false,
        imageScaleMode: 'fill',
        arrowsNavAutoHide: false,
        autoScaleSlider: true, 
        autoScaleSliderWidth: 960,     
        autoScaleSliderHeight: 350,
        controlNavigation: 'none',        
        navigateByClick: true,
        startSlideId: 0,
        autoPlay: false,
        transitionType:'move',
        globalCaption: false,
        deeplinking: {
            enabled: true,
            change: false
        },
        fullscreen: {
            // fullscreen options go gere
            enabled: true,
            nativeFS: true
        },
        video: {
            // video options go gere
            autoHideBlocks: true,
            autoHideArrows: false
        },
        /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
        
        imageScaleMode:'fill'      
    }).data('royalSlider');
    if(typeof si !== "undefined"){
        console.log("test");
        si.ev.on('rsAfterSlideChange', function(event) {
            console.log(si.currSlideId);
            sly.activate(si.currSlideId);
        });
    }
    $('.frame .thumbnails li').click(function(e) {
        var indx = $(this).index();
        si.goTo(indx);
        return false;
    });
});
phobsSetupForm();