<?php
$this->breadcrumbs = array(
    'Menus' => array('index'),
    $model->name,
);

$this->menu = array(
    array('label' => 'List Menu', 'url' => array('index')),
    array('label' => 'Create Menu', 'url' => array('create')),
    array('label' => 'Update Menu', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Menu', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Menu', 'url' => array('admin')),
);
?>

<h1>View Menu #<?php echo $model->id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'menu_position'
    ),
));
?>
<div class="row">
    <div class="span3" style="padding-left: 20px;">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'menu-item-add-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array(
                'onSubmit' => 'return false;'
            )
                ));
        ?>
        <?php foreach (CHtml::listData(Language::model()->findAll(), "code", "name") as $l => $lang) : ?>            
            <?php
            if ($l === Yii::app()->params['defaultLanguage'])
                $suffix = '';
            else
                $suffix = '_' . $l;
            ?>
            <?php echo $form->textFieldRow($menuItem, 'title' . $suffix, array('class' => 'span12', 'maxlength' => 255)); ?>
        <?php endforeach; ?>

        <?php echo $form->textFieldRow($menuItem, 'url', array('class' => 'span12', 'maxlength' => 255)); ?>
        <?php echo $form->dropDownListRow($menuItem, 'cms_object_id', CHtml::listData(CmsObject::model()->pages()->findAll(array('order' => 'title')), "id", "title"), array('class' => 'span12', 'prompt' => '')); ?>
        <?php echo $form->textFieldRow($menuItem, 'class', array('class' => 'span12', 'maxlength' => 255)); ?>
        <?php echo $form->textFieldRow($menuItem, 'target', array('class' => 'span12')); ?>                
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => 'Add item',
        ));
        ?>
        <?php $this->endWidget(); ?>
    </div>
    <div class="span9">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'hotel-room-form',
            'enableAjaxValidation' => false,
                ));
        ?>
        <div id="accordion">
            <?php
            $i = 0;
            foreach ($menuItems as $menuItem):
                ?>
                <?php                
                echo $this->renderPartial('//general/menu-item', array(
                    "model" => $menuItem,
                    "i" => $i
                ));
                $i++;
                ?>
            <?php endforeach; ?>
        </div>
        <div class="form-actions">            
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => 'Save',
            ));
            ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>