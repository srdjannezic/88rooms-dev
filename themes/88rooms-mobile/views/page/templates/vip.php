<div class="vip">
    <?php echo $model->text; ?>

    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => CityOffer::model()->visible()->search(NULL, 10),
        'template' => "{items}\n{pager}",
        'itemView' => '//page/templates/partials/_city_offer',
        'htmlOptions' => array(
            'class' => 'archive'
        ),
        'pager' => array(
            'class' => 'SimplePager',
            'nextPageLabel' => Translation::model()->getByKey('older'),
            'prevPageLabel' => Translation::model()->getByKey('newer'),
            'header' => '',
            'previousPageCssClass' => 'grid_6 first prev', //default "previours"
            'nextPageCssClass' => 'grid_6 next', //default "next"
            'htmlOptions' => array(
                'class' => ''
            )
        ),
        'pagerCssClass' => 'container_12 pagination cf'
    ));
    ?>
</div>