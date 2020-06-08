// Youtube and Vimeo Flexslider Control
// Partly from Duppi on GitHub, partly from digging into the YouTube API
// Need to set this up to use classes instead of IDs

var tag = document.createElement('script');
tag.src = "http://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

jQuery(window).load(function() {
    $(window).resize(function(){
        changeHeight();
    });
    //$(".big-gallery").fitVids();
    jQuery('.big-gallery.flexslider').flexslider({
        useCSS: false,
        animation: "slide",
        directionNav: true,
        prevText: "",           //String: Set the text for the "previous" directionNav item
        nextText: "",
        controlNav: true,
        animationLoop: false,
        slideshow: false,
        pauseOnAction: true,
        pauseOnHover: true,        
        video: true,
        useCSS: false,
        manualControls: ".thumbnails li img",
        
    });
    
    var num = $(".controls-with-thumbs li").length;

    $(".controls-with-thumbs ul").width(num*165+num*10);
    
    $(".controls-with-thumbs").mCustomScrollbar({
        horizontalScroll:true,
        setWidth:'100%',
        autoDraggerLength:false
    });
    
});
function changeHeight(){
    var ww = $(".flex-viewport").height();
    var imgw = $(".flex-active-slide img").height();
        
    if(imgw < ww){
        $(".flex-active-slide img").addClass("resize");
    }else{
        $(".flex-active-slide img").removeClass("resize");
    }
}