<?php echo $form->textFieldRow($model, 'title' . $suffix, array('class' => 'span12', 'maxlength' => 255)); ?>
<?php
/* $this->widget('application.extensions.eckeditor.ECKEditor', array(
  'model' => $model,
  'attribute' => 'text',
  )); */
$attribute = 'text';
$this->widget('ext.imperavi-redactor-widget.ImperaviRedactorWidget', array(
    // You can either use it for model attribute
    'model' => $model,
    'attribute' => $attribute . $suffix,
    // or just for input field            
    // Some options, see http://imperavi.com/redactor/docs/
    'options' => array(
        'toolbar' => true,
        'iframe' => false,
        'focus' => true,
        'minHeight' => 500,
        'maxHeight' => 500,
        'fileUpload' => Yii::app()->createUrl('post/fileUpload', array(
            'attr' => $attribute . $suffix
        )),
        'fileUploadErrorCallback' => new CJavaScriptExpression(
                'function(obj,json) { alert(json.error); }'
        ),
        'imageUpload' => Yii::app()->createUrl('ajax/mediaCreate', array(
            'attr' => $attribute . $suffix
        )),
        'imageGetJson' => Yii::app()->createUrl('ajax/imageList', array(
            'attr' => $attribute . $suffix
        )),
        'imageUploadErrorCallback' => new CJavaScriptExpression(
                'function(obj,json) { alert(json.error); }'
        ),
    ),
    'plugins' => array(
        'fullscreen' => array(
            'js' => array('fullscreen.js',),
        )
    )
));
?>
<br/>
<?php echo $form->textAreaRow($model, 'excerpt' . $suffix, array('class' => 'span12', 'maxlength' => 255)); ?>

<?php $this->renderPartial('partials/_seo', array("form" => $form, "model" => $model, "suffix" => $suffix)); ?>