<?php

class CmsGalleryItemsController extends BackEndController {

    public function actions() {
        return array(
            'order' => array(
                'class' => 'ext.yiisortablemodel.actions.AjaxSortingAction',
            ),
        );
    }

}