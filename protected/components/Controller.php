<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';
    public $description = '';
    public $isHome;

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    public $config;

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function isMobileBrowser() {
        $useragent = $_SERVER['HTTP_USER_AGENT'];

        return preg_match('/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od|ad)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re|ad)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4));
    }

    public function init() {
        if ($this->isMobileBrowser()) {
            Yii::app()->theme = "88rooms-mobile";
        }
        
        Yii::app()->clientScript->registerMetaTag("website", null, null, array('property' => "og:type"));
        Yii::app()->clientScript->registerMetaTag(Yii::app()->name, null, null, array('property' => "og:site_name"));

        $controller = $this;
        $default_controller = Yii::app()->defaultController;
        //Utility::dump($this->id);
        $this->isHome = (($this->id == 'site') && ($this->action == NULL)) ? true : false;

        $this->config = Configuration::model()->getConfig();
        Yii::app()->shortcode->add_shortcode('gallery', array($this, 'gallery_callback'));
        Yii::app()->shortcode->add_shortcode('big_gallery', array($this, 'big_gallery_callback'));
        Yii::app()->shortcode->add_shortcode('caption', array($this, 'caption_callback'));
        Yii::app()->shortcode->add_shortcode('section_black', array($this, 'section_black_callback'));
        Yii::app()->shortcode->add_shortcode('testimonial', array($this, 'testimonial_callback'));
        Yii::app()->shortcode->add_shortcode('column', array($this, 'column_callback'));
        Yii::app()->shortcode->add_shortcode('centered', array($this, 'centered_callback'));
        Yii::app()->shortcode->add_shortcode('feature_room', array($this, 'feature_room_callback'));
        Yii::app()->shortcode->add_shortcode('location', array($this, 'location_callback'));
        Yii::app()->shortcode->add_shortcode('facilities', array($this, 'facility_callback'));
        Yii::app()->shortcode->add_shortcode('clear', array($this, 'clear_callback'));

        parent::init();
        $app = Yii::app();
    }

    public function processOutput($output) {
        $output = Yii::app()->shortcode->parse($output);
        return parent::processOutput($output);
    }

//use Shortcodes;

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