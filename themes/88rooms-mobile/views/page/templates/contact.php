<div class="section-bg contact-page section-right">
    <div class="container_12 cf">        
        <div class="grid_6 first black-section modified">            
            <div class="inner-section">                
                <?php echo $model->text; ?>                
            </div>
        </div>
        <div class="grid_6 first modified contact-form">
            <div class="inner-section">
                <?php
                $this->widget('ContactFormP', array(
                    'url' => Utility::createUrl("site/contact")
                ));
                ?>
            </div>
        </div>        
    </div>
    <span class="contact-rect"></span>
</div>