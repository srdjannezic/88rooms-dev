<div id="sidebar" class="bg-white">
    <h2 class="title-bar light"><?php echo __('Filteri'); ?></h2>
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'filter-form',
        'enableAjaxValidation' => false,
        'method' => 'get',
        'action' => Utility::createUrl("site/search")
            ));
    ?>
    <?php echo $form->textFieldRow($this->search, 'deadline_from', array('class' => 'input-large datepicker', 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($this->search, 'deadline_to', array('class' => 'input-large datepicker', 'maxlength' => 255)); ?>
    <?php echo $form->dropDownListRow($this->search, 'start_point', CHtml::listData(City::model()->findAll(), 'id', 'name'), array('class' => 'input-large', 'empty' => '')); ?>
    <?php echo $form->dropDownListRow($this->search, 'end_point', CHtml::listData(City::model()->findAll(), 'id', 'name'), array('class' => 'input-large', 'empty' => '')); ?>
    <?php echo $form->textFieldRow($this->search, 'weight', array('class' => 'input-large', 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($this->search, 'width', array('class' => 'input-large', 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($this->search, 'height', array('class' => 'input-large', 'maxlength' => 255)); ?>
    <?php echo $form->textFieldRow($this->search, 'length', array('class' => 'input-large', 'maxlength' => 255)); ?>
    <button class="btn-blue btn" type="submit"><?php echo __('Pretraži');?></button>
    <?php $this->endWidget(); ?>
</div><!-- sidebar -->