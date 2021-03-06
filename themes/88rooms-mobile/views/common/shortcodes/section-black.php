<div class="section-bg section-<?php echo $direction; ?>">
    <span class="bg-rect"></span>
    <div class="container_12 cf">
        <?php if ($slides || $location): ?>
            <div class="grid_6 first positioned-el modified"> 
                <?php if ($slides): ?>
                    <?php echo $this->renderPartial("//common/shortcodes/slider", array("slides" => $slides)); ?>
                <?php endif; ?>
                <?php if ($location): ?>
                    <?php echo $this->renderPartial("//common/shortcodes/location"); ?>
                <?php endif; ?>
                <?php if ($list): ?>
                    <ul class="list cf">
                        <?php $list = explode(",", $list); ?>
                        <?php foreach ($list as $l): ?>
                            <li><?php echo $l; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="grid_6 first black-section modified">
            <div class="title-bar">
                <h2><?php echo $title; ?></h2>
            </div>
            <div class="inner-section">                
                <?php echo $content; ?>
                <?php if ($url): ?>
                    <a href="<?php echo $url; ?>" class="btn btn-read-more" title="<?php echo $title; ?>"><?php echo $btn_text; ?></a>
                <?php endif; ?>
            </div>
        </div>        
    </div>
</div>