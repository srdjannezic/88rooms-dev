<?php $rand = rand(1, 9999); ?>

<div id="emptyRelationTab_<?php echo $rand; ?>" class="span8" style="margin-left: 25%;">
    <br/>
    <table>
        <tr >
            <td valign="top"><img src="images/defaultfoto.png"/></td>
            <td>&nbsp;&nbsp;</td>
            <td><h3><?php echo __('This item has no');?> <span class="entity"></span>.</h3>
                <p><?php echo __('Create a first');?> <span class="entity_singular"></span> <?php echo __('for this item by clicking the create button. You will be forwarded to the appropriate module');?>.</p>
            </td>
        </tr>
    </table>
</div>

<script>
    $(function() {
        var $emptyDiv= $("#emptyRelationTab_<?php echo $rand; ?>");
        var tabId= $emptyDiv.parents(".view:first").attr("id");
        var entity= $("a[href='#"+tabId+"']").text();
        $emptyDiv.find("span.entity").html(entity);
        
        var singular_entity= (entity.substr(entity.length-1) === "s") ? entity.substr(0, entity.length-1) : entity;
        $emptyDiv.find("span.entity_singular").html(singular_entity);
    });
</script>