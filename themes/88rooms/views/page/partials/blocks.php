<?php if ($model->blocks): ?>
    <div class="big-rect"></div>

    <div class="container_12 block-section cf">
        <?php if ($model->slug == 'gallery'): ?>
            <span class="circles-big"></span>
            <span class="circles-small"></span>
        <?php endif; ?>
        <?php $i = 0; ?>
        <?php foreach ($model->blocks as $block): ?>
            <?php foreach ($block->cmsBoxes(array('scopes' => array('visible'))) as $box): ?>
                <div class="grid_4 grid_box <?php echo ($i == 0 || $i % 3 == 0) ? 'first' : ''; ?>">
                    <?php if ($box->type): ?>
                        <?php echo $this->renderPartial('//page/partials/box-types/' . $box->type, array("model" => $box)); ?>                       
                    <?php else: ?>
                        <?php echo $this->renderPartial('//page/partials/box-types/custom', array("model" => $box)); ?>
                    <?php endif; ?>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>