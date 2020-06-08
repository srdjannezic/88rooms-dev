<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'sendModal')); ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4><?php echo __('Pošalji oglas prijatelju'); ?></h4>
</div>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'send-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:submitFormSendToFriendFunction', // Your JS function to submit form
    ),
    'action' => Utility::createUrl("site/sendToFriend", array("id" => $model->id))
        ));
?>

<div class="modal-body">
    <div class="alert alert-error" id="sending-error" style="display: none">        
    </div>
    <div class="alert alert-success" id="sending-success" style="display: none">        
    </div>
    <?php echo $form->errorSummary($send_model); ?>  
    <div class="span3-re left">
        <?php echo $form->textFieldRow($send_model, 'name', array('rows' => 6, 'cols' => 50, 'class' => 'span3-re')); ?>
    </div>
    <div class="span3-re">
        <?php echo $form->textFieldRow($send_model, 'email', array('rows' => 6, 'cols' => 50, 'class' => 'span3-re')); ?>
    </div>
    <div class="clearfix"></div>
    <div class="span3-re left">
        <?php echo $form->textFieldRow($send_model, 'friend_name', array('rows' => 6, 'cols' => 50, 'class' => 'span3-re')); ?>
    </div>
    <div class="span3-re">
        <?php echo $form->textFieldRow($send_model, 'friend_email', array('rows' => 6, 'cols' => 50, 'class' => 'span3-re')); ?>
    </div>
    <div class="clearfix"></div>
    <?php echo $form->textAreaRow($send_model, 'text', array('rows' => 6, 'cols' => 50, 'class' => 'span7')); ?>
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
    function submitFormSendToFriendFunction(form, data, hasError){
        if (!hasError){            
            var serialized = form.serialize();            
            $.post(form.attr('action'), serialized, function(res){  
                $("#sendModal #sending-error").hide();
                if (!res.error){
                    $("#sendModal #sending-success").html(res.message).show();
                    setTimeout(function(){                        
                        $('#sendModal').modal('hide');
                        form.find("input[type=text], textarea").val("");
                        $("#sendModal #sending-success").hide();
                    },1000);                    
                }else{
                    $("#sendModal #sending-error").html(res.message).show();
                }
            },'json');
        }        
        return false;
    }
</script>