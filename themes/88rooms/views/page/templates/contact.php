<div class="section-bg-wrap contact-page">
    <div class="section-bg section-right">
        <div class="container_12 cf">
            <span class="multiple-rect top-center"></span>
            <span class="multiple-rect-btm bottom-center"></span>
            <div class="grid_6 first black-section modified">            
                <div class="inner-section">                
                    <?php echo $model->text; ?>                
                </div>
            </div>
            <div class="grid_6 first modified contact-form">
                <?php
                $this->widget('ContactFormP', array(
                    'url' => Utility::createUrl("site/contact"),
                    'title' => Translation::model()->getByKey('send_us_an_email')
                ));
                ?>
            </div>        
        </div>
    </div>
</div>