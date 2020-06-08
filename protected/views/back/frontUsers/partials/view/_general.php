<div class="row-fluid profile-classic">
    <div class="span2">
        <?php echo CHtml::image(param("baseUrl") . 'images/avatar.png'); ?>        
    </div>
    <div class="span10">
        <?php
        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $model,
            'attributes' => array(
                'id',
                'first_name',
                'last_name',
                'address',
                'city',
                'zip_code',
                'email',
                'phone',
                'username',
                'password',
                'status',
                'activation_code',
                'receive_all_mails',
            ),
        ));
        ?>
    </div>
</div>