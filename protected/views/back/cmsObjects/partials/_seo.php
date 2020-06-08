<?php echo $form->textFieldRow($model, 'meta_title' . $suffix, array('class' => 'span12', 'maxlength' => 60)); ?>
<?php echo $form->textAreaRow($model, 'meta_description' . $suffix, array('class' => 'span12', 'maxlength' => 160)); ?>
<?php echo $form->textAreaRow($model, 'meta_keywords' . $suffix, array('class' => 'span12', 'maxlength' => 255)); ?>