<div class="span12">
    <h3><?php echo __('Ponude'); ?></h3>
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'sortableAttributes' => array(
            'date_created', 'title'
        ),
        'dataProvider' => $offerDataProvider,
        'itemView' => 'profile/advertiser/partials/_view_ad_offer',
    ));
    ?>
    <?php/*
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'offer-grid',
        'dataProvider' => $offerDataProvider,
        'filter' => $model_offer,
        'columns' => array(
            'date_created',
            'description',
            'offer',
            array(
                'name' => 'status',
                'value' => '$data->_status',
                'type' => 'raw'
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 70px'),
                'template' => '{approve}',
                "buttons" => array(
                    'approve' => array(
                        'label' => __('Izaberi ponudu'), // text label of the button
                        'icon' => 'icon-ok',
                        'url' => 'Yii::app()->createUrl("/site/profileOfferApprove", array("id"=>$data->id))',
                        'visible' => '!$data->checkIfAproved($data->ad_id)',
                        'click' => 'function(event){  
                                    event.preventDefault();
                                    var r = confirm("' . __('Da li ste sigurni da je izabrana ponuda konačna?') . '");                                        
                                    if(r==false){
                                        return false;
                                    }
                                    approveOffer(this);                                    
                                }',
                    ),
                )
            ),
        ),
    ));*/
    ?>
</div>