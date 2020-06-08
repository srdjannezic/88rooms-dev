<?php $rand= rand(1, 9999); ?>

<!--<div id="emptyRelationTab_<?php echo $rand; ?>" class="emptyRelationTab" style="text-align:center">
    <img  src="<?php echo Yii::app()->baseUrl; ?>/images/icons/too_sad_128.png" />
    <br />
    <p>
        Sorry,<br />
        There are no <span class="entity"></span> in this tab
    </p>
</div>-->

<div class="span8" style="margin-left: 25%;">
<br/>
<table>
 <tr >
  <td valign="top"><img src="images/defaultfoto.png"/></td>
  <td>&nbsp;&nbsp;</td>
  <td><h3>This person has no invoices.</h3>
<p>Create a first invoice for this person by clicking the create button. You will be forwarded to the invoice module.</p>
   <?php echo CHtml::submitButton('Create', array("class"=>"btn btn-primary btn-large")); ?>
   </td>
 </tr>
</table>

       


</div>
<script>
    $(function() {
    var $emptyDiv= $("#emptyRelationTab_<?php echo $rand; ?>");
    var tabId= $emptyDiv.parents(".view:first").attr("id");
    var entity= $(".nav-tabs a[href='#"+tabId+"']").text();
    $emptyDiv.find("span.entity").html(entity);
    });
</script>
