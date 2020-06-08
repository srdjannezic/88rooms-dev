<?php
$attribute1 = 'about';
echo CHtml::label('About', $attribute1);
$this->widget('ext.imperavi-redactor-widget.ImperaviRedactorWidget', array(
    // You can either use it for model attribute
    'model' => $model,
    'attribute' => $attribute1 . $suffix,
    // or just for input field            
    // Some options, see http://imperavi.com/redactor/docs/
    'options' => array(
        'toolbar' => true,
        'iframe' => false,
        'fileUpload' => Yii::app()->createUrl('post/fileUpload', array(
            'attr' => $attribute1 . $suffix
        )),
        'fileUploadErrorCallback' => new CJavaScriptExpression(
                'function(obj,json) { alert(json.error); }'
        ),
        'imageUpload' => Yii::app()->createUrl('ajax/mediaCreate', array(
            'attr' => $attribute1 . $suffix
        )),
        'imageGetJson' => Yii::app()->createUrl('ajax/imageList', array(
            'attr' => $attribute1 . $suffix
        )),
        'imageUploadErrorCallback' => new CJavaScriptExpression(
                'function(obj,json) { alert(json.error); }'
        ),
    ),
));
$attribute2 = 'concept';
echo CHtml::label('Concept', $attribute2);
$this->widget('ext.imperavi-redactor-widget.ImperaviRedactorWidget', array(
// You can either use it for model attribute
    'model' => $model,
    'attribute' => $attribute2 . $suffix,
    // or just for input field            
// Some options, see http://imperavi.com/redactor/docs/
    'options' => array(
        'toolbar' => true,
        'iframe' => false,
        'fileUpload' => Yii::app()->createUrl('post/fileUpload', array(
            'attr' => $attribute2 . $suffix
        )),
        'fileUploadErrorCallback' => new CJavaScriptExpression(
                'function(obj,json) { alert(json.error); }'
        ),
        'imageUpload' => Yii::app()->createUrl('ajax/mediaCreate', array(
            'attr' => $attribute2 . $suffix
        )),
        'imageGetJson' => Yii::app()->createUrl('ajax/imageList', array(
            'attr' => $attribute2 . $suffix
        )),
        'imageUploadErrorCallback' => new CJavaScriptExpression(
                'function(obj,json) { alert(json.error); }'
        ),
    ),
));
?>
<br/>