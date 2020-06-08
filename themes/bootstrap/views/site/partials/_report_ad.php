<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'reportModal', 'htmlOptions' => array("data-status" => 0))); ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><?php echo __('Prjavi oglas'); ?></h4>
</div>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'report-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:submitFormFunction', // Your JS function to submit form
    ),
    'action' => Utility::createUrl("site/reportAd", array("id" => $model->id))
        ));
?>

<div class="modal-body">
    <div class="alert alert-error" id="sending-error" style="display: none">        
    </div>
    <div class="alert alert-success" id="sending-success" style="display: none">        
    </div>
    <?php echo $form->errorSummary($report_model); ?>  
    <?php echo $form->textAreaRow($report_model, 'reason', array('rows' => 6, 'cols' => 50, 'class' => 'span7')); ?>    
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => __('Pošalji'),
        'htmlOptions' => array('id' => 'send_btn'),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => __('Zatvori'),
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>

<script>
    function submitFormFunction(form, data, hasError){
        if (!hasError){           
            $.post(form.attr('action'), form.serialize(), function(res){  
                $("#sending-error").hide();
                if (!res.error){
                    $("#sending-success").html(res.message).show();
                    setTimeout(function(){                        
                        $('#reportModal').modal('hide');
                        form.find("textarea").val("");
                        $("#sending-success").hide();
                    },1000);                    
                }else{
                    $("#sending-error").html(res.message).show();
                }
            },'json');
        }        
        return false;
    }
</script>