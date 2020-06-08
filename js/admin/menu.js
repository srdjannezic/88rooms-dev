$(function(){
    var accordionOpts = {
        collapsible: true,
        active: false,
        height: 'fill',
        header: 'h3'
    };
    $("#menu-item-add-form").submit(function(){
        var ind = $(".s_panel").index() + 1;
        console.log(ind);
        
        $.post(baseUrl+"/menus/addMenuItem",$(this).serialize() + "&i=" + ind,function(response){
            $("#accordion").append(response);
            $('#accordion').accordion('destroy').accordion(accordionOpts).sortable({
                items: '.s_panel'
            });
        });
    });
    $('#accordion').accordion(accordionOpts).sortable({
        items: '.s_panel'
    });
    
    $('#accordion').on('accordionactivate', function (event, ui) {
        if (ui.newPanel.length) {
            $('#accordion').sortable('disable');
        } else {
            $('#accordion').sortable('enable');
        }
    });
    $("#add-menu-tiem").click(function(){
        
        });
});
function removeMenuItem(el){
    $(el).parents(".s_panel").remove();
}
function changeMenuItemTitle(val,index){
    console.log(index)
    $("#menuItemTitle-"+index).html(val);
}