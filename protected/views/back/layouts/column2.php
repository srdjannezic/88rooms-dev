<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="page-container row-fluid" id="main_content">
    <div id="flashAlert" style="display:none">
        <?php
        $this->widget('ext.bootstrap.widgets.TbAlert', array(
            'block' => true, // display a larger alert block?
            'fade' => true, // use transitions?
            'closeText' => '&times;', // close link text - if set to false, no close link is displayed
            'alerts' => array(// configurations per alert type
                'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
            ),
        ));
        ?>
    </div>        

    <div id="sidebar" class="page-sidebar nav-collapse collapse">
        <div class="sidebar-toggler hidden-phone"></div>
        <?php
        $this->widget('FlatMenu', array(
            'submenuHtmlOptions' => array("class" => 'sub'),
            "activeCssClass" => "active",
            'items' => array(
                array('label' => 'Dashboard', 'url' => Utility::createUrl("site/index"), 'icon' => 'home'),
                array('label' => 'Users', 'url' => Utility::createUrl("users/admin"), 'icon' => 'user'),
                array('label' => 'Translations', 'url' => Utility::createUrl("translations/admin"), 'icon' => 'globe'),
                array('label' => 'Cms', 'icon' => 'folder-open', 'url' => 'javascript:;', "itemOptions" => array('class' => 'has-sub'), "active" => in_array(Yii::app()->controller->id, array("cmsCategories", "cmsObjects", "cmsGalleries", 'cmsSliders', 'testimonials', 'menus', 'cmsBlocks', 'cmsBoxes', 'languages', 'cmsMedias')),
                    'items' => array(
                        array('label' => 'Cms Categories', 'url' => Utility::createUrl("cmsCategories/admin")),
                        array('label' => 'Cms Pages', 'url' => Utility::createUrl("cmsObjects/admin", array("type" => CmsObjectTypes::CMS_PAGE))),
                        array('label' => 'Cms Posts', 'url' => Utility::createUrl("cmsObjects/admin", array("type" => CmsObjectTypes::CMS_POST))),
                        array('label' => 'Menu', 'url' => Utility::createUrl("menus/admin")),
                        array('label' => 'Cms Blocks', 'url' => Utility::createUrl("cmsBlocks/admin")),
                        array('label' => 'Cms Boxes', 'url' => Utility::createUrl("cmsBoxes/admin")),
                        array('label' => 'Cms Galleries', 'url' => Utility::createUrl("cmsGalleries/admin")),
                        array('label' => 'Cms Media', 'url' => Utility::createUrl("cmsMedias")),
                        array('label' => 'Cms Sliders', 'url' => Utility::createUrl("cmsSliders/admin")),
                        array('label' => 'Testimonials', 'url' => Utility::createUrl("testimonials/admin")),
                        array('label' => 'Languages', 'url' => Utility::createUrl("languages/admin")),
                    )
                ),
                array('label' => 'Hotel', 'icon' => 'building', 'url' => 'javascript:;', "itemOptions" => array('class' => 'has-sub'), "active" => in_array(Yii::app()->controller->id, array("hotelFacilitiesCategories", "hotelFacilities", "hotelRooms", "specialOffers")),
                    'items' => array(
                        array('label' => 'Room Amenities Categories', 'url' => Utility::createUrl("hotelFacilitiesCategories/admin")),
                        array('label' => 'Room Amenities', 'url' => Utility::createUrl("hotelFacilities/admin")),
                        array('label' => 'Rooms', 'url' => Utility::createUrl("hotelRooms/admin")),
                        array('label' => 'Best Offers', 'url' => Utility::createUrl("specialOffers/admin")),
                    )
                ),
                array('label' => 'POI', 'icon' => 'map-marker', 'url' => 'javascript:;', "itemOptions" => array('class' => 'has-sub'), "active" => in_array(Yii::app()->controller->id, array("pointOfInterests", "cityOffers")),
                    'items' => array(
                        array('label' => 'Point of interests', 'url' => Utility::createUrl("pointOfInterests/admin")),
                        array('label' => 'City Offers', 'url' => Utility::createUrl("cityOffers/admin")),
                    )
                ),
            ),
        ));
        ?>
    </div><!-- sidebar -->

    <div class="page-content">        
        <div id="content" class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <h3 class="page-title">
                        <?php echo $this->title; ?>
                        <small><?php echo $this->description; ?></small>
                    </h3>
                    <?php if (isset($this->breadcrumbs)): ?>
                        <?php
                        $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                        ));
                        ?><!-- breadcrumbs -->
                    <?php endif ?>
                </div>                
            </div>

            <?php if (Yii::app()->user->hasFlash('RightsSuccess')): ?>
                <div class="alert alert-success">
                    <?php echo Yii::app()->user->getFlash('RightsSuccess'); ?>
                </div>
            <?php endif; ?>
            <?php echo $content; ?>
        </div><!-- content -->       
    </div>
</div>
<?php $this->endContent(); ?>