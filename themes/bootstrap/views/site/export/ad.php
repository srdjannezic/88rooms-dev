<div class="page-header" style="position: relative;min-height: 100px;">

    <table class="table-nobordered">
        <tr>
            <td>
                <span class="head1span" ><?php echo CHtml::encode($model->start->name . " - " . $model->end->name); ?></span><br/>
                <small><?php echo CHtml::encode($model->title); ?></small>

            </td>
        </tr>
    </table>
</div>
<br/>
<span class="head4span"><?php echo __('Osnovni podaci'); ?></span><br/>
<hr/>
<table class="table-nobordered">
    <tr>
        <td class="span2"><span class="head6spansmall span1"/><?php echo __('Težina'); ?></span></td>
        <td><span class="head6span"/><?php echo $model->weight; ?></span> </td>
    </tr>
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Dimenzije'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->dimensions) ?></span></td>
    </tr>
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Ponuđena cena'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->price) ?></span></td>
    </tr>
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Datum kreiranja'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->date_created) ?></span></td>
    </tr>
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Rok'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->deadline) ?></span></td>
    </tr>    
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Polazna tačka'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->start->name)."(".CHtml::encode($model->start_municipality).")"; ?></span></td>
    </tr>
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Krajnja tačka'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->end->name)."(".CHtml::encode($model->end_municipality).")" ?></span></td>
    </tr>
    <tr>
        <td><span class="head6spansmall span1"/><?php echo __('Opis'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->description) ?></span></td>
    </tr>
</table>
<br/><br/>

<span class="head4span"><?php echo __('Kontakt podaci'); ?></span><br/>
<hr/>
<table class="table-nobordered">
    <tr>
        <td class="span2"><span class="head6spansmall span1"/><?php echo __('Ime i prezime'); ?></span></td>
        <td><span class="head6span"/><?php echo CHtml::encode($model->contact->first_name) . " " . CHtml::encode($model->contact->last_name); ?></span></td>
    </tr>
</table>
<br/><br/>
<span class="head4span"><?php echo __('Slike'); ?></span><br/>
<hr/>

<table>
    <tr>
        <?php
        if (!empty($model->img_1)) {
            ?>
            <td>
                <img src="<?php echo $model->_img1_th; ?>"  />        
            </td>
            <?php
        }
        ?>
        <?php
        if (!empty($model->img_2)) {
            ?>
            <td>
                <img src="<?php echo $model->_img2_th; ?>"  />        
            </td>
            <?php
        }
        ?>
        <?php
        if (!empty($model->img_3)) {
            ?>
            <td>
                <img src="<?php echo $model->_img3_th; ?>"  />        
            </td>
            <?php
        }
        ?>
    <tr>
        <?php
        if (!empty($model->img_4)) {
            ?>
            <td>
                <img src="<?php echo $model->_img4_th; ?>"  />        
            </td>
            <?php
        }
        ?>            

        <?php
        if (!empty($model->img_5)) {
            ?>
            <td>
                <img src="<?php echo $model->_img5_th; ?>"  />                
            </td>
            <?php
        }
        ?>
        <?php
        if (!empty($model->img_6)) {
            ?>
            <td>
                <img src="<?php echo $model->_img6_th; ?>"  />                
            </td>
            <?php
        }
        ?>
    </tr>
    <tr>
        <?php
        if (!empty($model->img_7)) {
            ?>
            <td>
                <img src="<?php echo $model->_img7_th; ?>"  />                
            </td>
            <?php
        }
        ?>
        <?php
        if (!empty($model->img_8)) {
            ?>
            <td>
                <img src="<?php echo $model->_img8_th; ?>"  />                
            </td>
            <?php
        }
        ?>
    </tr>
</table>