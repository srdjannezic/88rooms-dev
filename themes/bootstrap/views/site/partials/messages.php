<?php if (!Yii::app()->customer->isGuest && $model->status != Statuses::COMPLETED): ?><br><br>
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'message-form',
        'enableAjaxValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
            'afterValidate' => 'js:submitFormFunction', // Your JS function to submit form
        ),
        'action' => Utility::createUrl("site/addMessage", array("id" => $model->id))
            ));
    ?>
    <?php echo $form->errorSummary($message_model); ?>    
    <div class="alert in alert-block fade alert-success" style="display: none" id="flashMessage"></div>    
    <?php echo $form->textAreaRow($message_model, 'message', array('class' => 'span8')); ?>

    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => __('Pošalji'),
        'htmlOptions' => array('id' => 'send_btn'),
    ));
    ?>
    <?php $this->endWidget(); ?>    
<?php endif; ?>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $messages,
    'itemView' => 'partials/_messages',
));
?>

<script>
    function submitFormFunction(form, data, hasError){        
        if (!hasError){           
            $.post(form.attr('action'), form.serialize(), function(res){
                res = $.parseJSON(res);
                if(res['error'] == false){
                    $("#flashMessage").html(res['message']).fadeIn().delay(3000);                    
                    var form_id = form.attr("id");
                    document.getElementById(form_id).reset();
                }
            });
        }        
        return false;
    }
</script>