<div class="view">
    <div class="thumbnail-mini span2-re">        
        <?php echo CHtml::image($data->contact->_img, $data->contact->first_name . " " . $data->contact->last_name, array("class" => 'img-polaroid')); ?>
    </div>
    <div class="info span6-re">
        <div class="span3-re left">
            <h2 class="title-small">            
                <?php echo __("Korisnik:") . " " . $data->contact->first_name . " " . $data->contact->last_name; ?>            
            </h2>
        </div>
        <div class="span3-re rightAlign">
            <span class="dateBig">            
                <?php echo __('Datum:') . " " . CHtml::encode($data->_date_created); ?>
            </span>
        </div>
        <div class="clearfix"></div>
        <p><?php echo $data->message; ?></p>
        <div class="clearfix"></div>
    </div>
</div>
<div class="clearfix"></div>
<hr/>