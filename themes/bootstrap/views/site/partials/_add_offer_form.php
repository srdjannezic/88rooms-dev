<p class="help-block"><span class="alert alert-info span3-re centered left"><strong><?php echo __('Napomena'); ?>:</strong> <?php echo __('Ponuda koju unesete ne može se menjati.'); ?></span></p>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'offer-form',
    'enableAjaxValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'afterValidate' => 'js:submitFormFunctionOffer', // Your JS function to submit form
    ),
    'action' => Utility::createUrl("site/addOffer", array("id" => $model->id))
        ));
?>

<?php echo $form->errorSummary($offer_model); ?>
<div class="alert in alert-block fade alert-success" style="display: none" id="flashMessage"></div>
<?php echo $form->textFieldRow($offer_model, 'offer', array('class' => 'input-large')); ?>
<?php echo $form->textAreaRow($offer_model, 'description', array('class' => 'input-large')); ?>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'buttonType' => 'submit',
    'type' => 'blue',
    'label' => __('Pošalji'),
    'htmlOptions' => array('id' => 'send_btn', 'class' => 'btn-blue'),
));
?>
<?php $this->endWidget(); ?>
<script>
    function submitFormFunctionOffer(form, data, hasError){        
        if (!hasError){           
            $.post(form.attr('action'), form.serialize(), function(res){
                res = $.parseJSON(res);
                if(res['error'] == false){
                    form.find("#flashMessage").html(res['message']).fadeIn().delay(3000);                    
                    var form_id = form.attr("id");
                    document.getElementById(form_id).reset();
                }
            });
        }        
        return false;
    }
</script>