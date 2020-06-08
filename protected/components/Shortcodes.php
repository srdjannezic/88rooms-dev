<?php

trait ShortCodes {

    function gallery_callback($atts, $content) {
        extract(Yii::app()->shortcode->shortcode_atts(array(
                    'id' => '',
                        ), $atts));
        $model = CmsGallery::model()->findByPk($id);
        return $this->renderPartial("//common/shortcodes/gallery", array("model" => $model), TRUE);
    }

    function big_gallery_callback($atts, $content) {
        extract(Yii::app()->shortcode->shortcode_atts(array(
                    'id' => '',
                        ), $atts));
        $model = CmsGallery::model()->findByPk($id);
        return $this->renderPartial("//common/shortcodes/big_gallery", array("model" => $model), TRUE);
    }

    function testimonial_callback($atts, $content) {
        extract(Yii::app()->shortcode->shortcode_atts(array(
                    'id' => '',
                        ), $atts));
        $model = Testimonial::model()->findByPk($id);
        return $this->renderPartial("//common/shortcodes/testimonial", array("model" => $model), TRUE);
    }

    function feature_room_callback($atts, $content) {
        $model = HotelRoom::model()->find("is_featured=1");
        return $this->renderPartial("//common/shortcodes/feature_room", array("model" => $model), TRUE);
    }

    function facility_callback($atts, $content) {
        $model = HotelFacilitiesCategory::model()->findAll(array("order" => "ordr"));
        return $this->renderPartial("//common/shortcodes/facilities", array("model" => $model), TRUE);
    }

    function column_callback($atts, $content) {
        extract(Yii::app()->shortcode->shortcode_atts(array(
                    'num' => '',
                    'first' => '',
                    'class' => ''
                        ), $atts));
        return '<div class="grid_' . $num . ($first ? ' first' : '') . ' ' . $class . '">' . Yii::app()->shortcode->parse($content) . '</div>';
    }

    function section_black_callback($atts, $content) {
        extract(Yii::app()->shortcode->shortcode_atts(array(
                    'title' => '',
                    'slider_id' => '',
                    'btn_text' => '',
                    'url' => '',
                    'direction' => 'right',
                    'location' => '',
                    'list' => ''
                        ), $atts));
        $slides = array();

        if ($slider_id) {
            $slides = CmsSlider::model()->findByPk($slider_id)->cmsSlides;
        }
        return $this->renderPartial("//common/shortcodes/section-black", array("title" => $title, 'content' => Yii::app()->shortcode->parse($content), 'slides' => $slides, 'btn_text' => $btn_text, 'url' => $url, 'direction' => $direction, 'location' => $location, 'list' => $list), TRUE);
    }

    function location_callback($atts, $content) {
        extract(Yii::app()->shortcode->shortcode_atts(array(
                    'title' => '',
                    'url' => '',
                    'btn_text' => '',
                    'direction' => 'right',
                    'location' => ''
                        ), $atts));
        return $this->renderPartial("//common/shortcodes/location", array("title" => $title, 'content' => $content, 'btn_text' => $btn_text, 'url' => $url, 'direction' => $direction, 'location' => $location), TRUE);
    }

    function centered_callback($atts, $content) {
        extract(Yii::app()->shortcode->shortcode_atts(array(
                    'class' => ''
                        ), $atts));
        return '<div class="container_12 cf ' . $class . '">' . Yii::app()->shortcode->parse($content) . '</div>';
    }

    function clear_callback($atts, $content) {
        return '<div class="clearfix"></div>';
    }

}