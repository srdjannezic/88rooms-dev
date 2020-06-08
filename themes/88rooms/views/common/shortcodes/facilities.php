<ul class="facilities-all">
    <?php $i = 0; ?>
    <?php $counter = 0; ?>
    <?php foreach ($model as $category): ?>
        <?php if (count($category->hotelFacilities) > 0): ?>
            <?php if ($counter == 0 || $counter > 5): ?>
                <li class="grid_<?php echo (count($category->hotelFacilities) > 5) ? 6 : 3; ?>">
                <?php endif; ?>
                <h3><?php echo $category->name; ?></h3>
                <ul>
                    <?php foreach ($category->hotelFacilities as $facility): ?>
                        <li><?php echo $facility->name; ?></li>
                        <?php $counter++; ?>
                    <?php endforeach; ?>
                </ul>
                <?php if ($counter == 0 || $counter > 5): ?>
                    <?php $counter = 0; ?>
                </li>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
