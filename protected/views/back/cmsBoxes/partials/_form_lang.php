<?php echo $form->textFieldRow($model, 'title' . $suffix, array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textAreaRow($model, 'text' . $suffix, array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->textFieldRow($model, 'btn_text' . $suffix, array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>