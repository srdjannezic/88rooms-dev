<h2 class="title-bar light"><?php echo $this->title; ?></h2>
<div id="inner-content" class="bg-white">            
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'ad-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <?php if (Yii::app()->customer->hasFlash('success')) { ?>
        <div class="alert in alert-block fade alert-success">
            <?php echo Yii::app()->customer->getFlash('success'); ?>
        </div>
    <?php } ?>
    <div class="span6-re left">
        <?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>
        <?php echo $form->textFieldRow($model, 'weight', array('class' => 'span5', 'append' => 'kg')); ?>
        <div class="span1-re left">
            <?php echo $form->textFieldRow($model, 'dimension_width', array('class' => 'span1', 'append' => 'cm')); ?>
        </div>
        <div class="span1-re">
            <?php echo $form->textFieldRow($model, 'dimension_height', array('class' => 'span1', 'append' => 'cm')); ?>
        </div>
        <div class="span1-re">
            <?php echo $form->textFieldRow($model, 'dimension_length', array('class' => 'span1', 'append' => 'cm')); ?>
        </div>
        <div class="clearfix"></div>
        <?php echo $form->textFieldRow($model, 'price', array('class' => 'span5')); ?>
        <?php echo $form->textFieldRow($model, 'deadline', array('class' => 'span5 datepicker')); ?>            
        <?php echo $form->dropDownListRow($model, 'start_point', CHtml::listData(City::model()->findAll(), 'id', 'name'), array('class' => 'span5', "empty" => "")); ?>
        <?php echo $form->textFieldRow($model, 'start_municipality', array('class' => 'span5')); ?>
        <?php echo $form->dropDownListRow($model, 'end_point', CHtml::listData(City::model()->findAll(), 'id', 'name'), array('class' => 'span5', "empty" => "")); ?>
        <?php echo $form->textFieldRow($model, 'end_municipality', array('class' => 'span5')); ?>
    </div>
    <div class="span6-re">
        <?php echo $form->textAreaRow($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'span5')); ?>
        <div class="file" id="img_1_box" style="<?php echo (!empty($model->img_1)) ? "display:none" : "display:block"; ?>">
            <?php echo $form->fileFieldRow($model, 'img_1'); ?>
        </div>
        <div class="file" id="img_2_box" style="<?php echo (!empty($model->img_2)) ? "display:none" : "display:block"; ?>">
            <?php
            echo $form->fileFieldRow($model, 'img_2');
            ?>
        </div>
        <div class="file" id="img_3_box" style="<?php echo (!empty($model->img_3)) ? "display:none" : "display:block"; ?>">
            <?php
            echo $form->fileFieldRow($model, 'img_3');
            ?>
        </div>
        <div class="file" id="img_4_box" style="<?php echo (!empty($model->img_4)) ? "display:none" : "display:block"; ?>">
            <?php
            echo $form->fileFieldRow($model, 'img_4');
            ?>
        </div>
        <div class="file" id="img_5_box" style="<?php echo (!empty($model->img_5)) ? "display:none" : "display:block"; ?>">
            <?php
            echo $form->fileFieldRow($model, 'img_5');
            ?>
        </div>
        <div class="file" id="img_6_box" style="<?php echo (!empty($model->img_6)) ? "display:none" : "display:block"; ?>">
            <?php
            echo $form->fileFieldRow($model, 'img_6');
            ?>
        </div>
        <div class="file" id="img_7_box" style="<?php echo (!empty($model->img_7)) ? "display:none" : "display:block"; ?>">
            <?php
            echo $form->fileFieldRow($model, 'img_7');
            ?>
        </div>
        <div class="file" id="img_8_box" style="<?php echo (!empty($model->img_8)) ? "display:none" : "display:block"; ?>">
            <?php
            echo $form->fileFieldRow($model, 'img_8');
            ?>
        </div>
        <ul class="thumbnails">
            <?php
            if (!empty($model->img_1)) {
                ?>
                <li class="thumbnail span3" id="pic_img_1">
                    <input type="hidden" value="<?php echo $model->img_1; ?>" name="Ad[_img_1]" />
                    <img src="<?php echo $model->_img1; ?>" width="350px" />        
                    <span class="remove" style="position: absolute;top:5px;right:5px;z-index:999;display:block;"><a href="javascript:;" onclick="removePhoto('img_1');"><i class="icon icon-remove"></i></a></span>
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_2)) {
                ?>
                <li class="thumbnail span3" id="pic_img_2">
                    <input type="hidden" value="<?php echo $model->img_2; ?>" name="Ad[_img_2]" />
                    <img src="<?php echo $model->_img2; ?>" width="350px" />        
                    <span class="remove" style="position: absolute;top:5px;right:5px;z-index:999;display:block;"><a href="javascript:;" onclick="removePhoto('img_2');"><i class="icon icon-remove"></i></a></span>
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_3)) {
                ?>
                <li class="thumbnail span3" id="pic_img_3">
                    <input type="hidden" value="<?php echo $model->img_3; ?>" name="Ad[_img_3]" />
                    <img src="<?php echo $model->_img3; ?>" width="350px" />        
                    <span class="remove" style="position: absolute;top:5px;right:5px;z-index:999;display:block;"><a href="javascript:;" onclick="removePhoto('img_3');"><i class="icon icon-remove"></i></a></span>
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_4)) {
                ?>
                <li class="thumbnail span3" id="pic_img_4">
                    <input type="hidden" value="<?php echo $model->img_4; ?>" name="Ad[_img_4]" />
                    <img src="<?php echo $model->_img4; ?>" width="350px" />        
                    <span class="remove" style="position: absolute;top:5px;right:5px;z-index:999;display:block;"><a href="javascript:;" onclick="removePhoto('img_4');"><i class="icon icon-remove"></i></a></span>
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_5)) {
                ?>
                <li class="thumbnail span3" id="pic_img_5">
                    <input type="hidden" value="<?php echo $model->img_5; ?>" name="Ad[_img_5]" />
                    <img src="<?php echo $model->_img5; ?>" width="350px" />        
                    <span class="remove" style="position: absolute;top:5px;right:5px;z-index:999;display:block;"><a href="javascript:;" onclick="removePhoto('img_5');"><i class="icon icon-remove"></i></a></span>
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_6)) {
                ?>
                <li class="thumbnail span3" id="pic_img_6">
                    <input type="hidden" value="<?php echo $model->img_6; ?>" name="Ad[_img_6]" />
                    <img src="<?php echo $model->_img6; ?>" width="350px" />        
                    <span class="remove" style="position: absolute;top:5px;right:5px;z-index:999;display:block;"><a href="javascript:;" onclick="removePhoto('img_6');"><i class="icon icon-remove"></i></a></span>
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_7)) {
                ?>
                <li class="thumbnail span3" id="pic_img_7">
                    <input type="hidden" value="<?php echo $model->img_7; ?>" name="Ad[_img_7]" />
                    <img src="<?php echo $model->_img7; ?>" width="350px" />        
                    <span class="remove" style="position: absolute;top:5px;right:5px;z-index:999;display:block;">
                        <a href="javascript:;" onclick="removePhoto('img_7');"><i class="icon icon-remove"></i></a></span>
                </li>
                <?php
            }
            ?>
            <?php
            if (!empty($model->img_8)) {
                ?>
                <li class="thumbnail span3" id="pic_img_8">
                    <input type="hidden" value="<?php echo $model->img_8; ?>" name="Ad[_img_8]" />
                    <img src="<?php echo $model->_img8; ?>" width="350px" />        
                    <span class="remove" style="position: absolute;top:5px;right:5px;z-index:999;display:block;"><a href="javascript:;" onclick="removePhoto('img_8');"><i class="icon icon-remove"></i></a></span>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="clearfix"></div><br>
    <script>
        function removePhoto(id){
            var r = confirm("<?php echo __("Da li ste sigurni da zelite da obrisete sliku?"); ?>");
            if(r){
                $.post('<?php echo Utility::createUrl("profile/removePhoto", array("id" => $model->id)); ?>',{field:id},function(response){    
                    response = $.parseJSON(response);            
                    if(!response['error']){
                        $("#"+id+"_box").show();
                        $("#pic_"+id).remove();
                    }
                })                
            }else{
                return false;
            }
        }    
    </script>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'blue',
            'label' => $model->isNewRecord ? __('Kreiraj oglas') : __('Zapampti izmene'),
            'htmlOptions' => array('class' => 'btn-blue'),
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>