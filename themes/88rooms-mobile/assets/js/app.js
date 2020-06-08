$(function(){
    $('.main-slider.flexslider').flexslider({
        animation: "fade",
        directionNav: false,
        controlNav:false
    });
    $('.slider-boxes').flexslider({
        animation: "slide",
        directionNav: false,
        controlNav:true,
        controlsContainer:'.cntrls',
        smoothHeight:true
    });
    $('.flex-inner.flexslider').flexslider({
        animation: "slide",
        directionNav: false,
        controlNav:true
    });
    
    $(".book-now-drop .portlet-title, .book-now-form, .open-book-now").click(function(){
        $(".book-now-drop").toggleClass("active");
        $("body").toggleClass("book-now-active");
    });    
    var $body = document.body
    , $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

    if ( typeof $menu_trigger !== 'undefined' ) {
        $menu_trigger.addEventListener('click', function() {
            $body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
            $(".book-now-drop").removeClass("active");
        });
    }
    $(".book-now-form input[name='BookNowForm[date]']").Zebra_DatePicker({
        direction: true, 
        format: 'Y-m-d', 
        header_width:226,
        default_position:'below',
        offset:[-237,27]
    });
    
    $(".book-now-drop input[name='BookNowForm[date]'],.book-now-drop input[name='date']").Zebra_DatePicker({
        direction: true, 
        format: 'Y-m-d',
        header_width:235,
        default_position:'below',
        offset:[10,30]
    });
    $(".dropdown-toggle").click(function(e){
        e.preventDefault();
        var toggle = $(this).attr("data-toggle");
        $(this).parents(".dropdown-wrap").find("." + toggle + "-menu").toggleClass("show");
    });
    
    $("a.thumbnail-link").iLightBox({
        skin: 'dark',
        path: 'horizontal',
        fullViewPort: 'fill',
        infinite: true,
        //linkId: "music",
        overlay: {
            opacity: 0.8,
            blur: false
        },
        controls: {
            thumbnail: false
        },
        styles: {
            nextOffsetX: -45,
            prevOffsetX: -45
        }
    });
})