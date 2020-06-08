<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'cms-slide-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block"><?php echo sprintf(__('Fields with %s are required.'), '<span class=\'required\'>*</span>'); ?></p>

<?php echo $form->errorSummary($model); ?>
<div id="slide-boxes">
    <?php $i = 0; ?>
    <?php foreach ($model->slideBoxes as $box): ?>
        <?php
        echo $this->renderPartial('partials/_box', array(
            "model" => $box,
            "i" => $i
        ));
        $i++;
        ?>
    <?php endforeach; ?>
</div>
<button class="add-box" id="addBox" type="button">Add box</button>
<div class="clearfix"></div>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $model->isNewRecord ? 'Create' : 'Save',
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
