<h3 class="page-title">
    Dashboard <small> statistics and more</small>
</h3>
<div id="inner-content">
    <div class="row-fluid">
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="icon-user"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo $users; ?>
                    </div>
                    <div class="desc">									
                        New users
                    </div>
                </div>
                <a class="more" href="<?php echo Utility::createUrl("users/admin"); ?>">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>						
            </div>
        </div>
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="icon-globe"></i>
                </div>
                <div class="details">
                    <div class="number"><?php echo $cms_objects; ?></div>
                    <div class="desc">New cms objects</div>
                </div>
                <a class="more" href="<?php echo Utility::createUrl("cmsObjects/admin"); ?>">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>						
            </div>
        </div>
        <div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="icon-globe"></i>
                </div>
                <div class="details">
                    <div class="number"><?php echo $languages; ?></div>
                    <div class="desc">New languages</div>
                </div>
                <a class="more" href="<?php echo Utility::createUrl("languages/admin"); ?>">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>						
            </div>
        </div>
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="icon-map-marker"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo $pois; ?>
                    </div>
                    <div class="desc">									
                        New POIs
                    </div>
                </div>
                <a class="more" href="<?php echo Utility::createUrl("pointOfInterests/admin"); ?>">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>						
            </div>
        </div>        
    </div>
    <div class="row-fluid">
        <div class="span3 responsive" data-tablet="span6" data-desktop="span3">
            <div class="dashboard-stat yellow">
                <div class="visual">
                    <i class="icon-building"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo $rooms; ?>
                    </div>
                    <div class="desc">									
                        New Rooms
                    </div>
                </div>
                <a class="more" href="<?php echo Utility::createUrl("hotelRooms/admin"); ?>">
                    View more <i class="m-icon-swapright m-icon-white"></i>
                </a>						
            </div>
        </div>
    </div>
</div>