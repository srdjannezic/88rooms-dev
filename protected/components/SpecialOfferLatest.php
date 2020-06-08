<?php

/**
 * Description of BookNow
 *
 * @author Nikola
 */
Yii::import('zii.widgets.CPortlet');

class SpecialOfferLatest extends CPortlet {

    //public $title = 'Stay More Save More';
    public $htmlOptions = array("class" => "grid_offer last");

    protected function renderContent() {
        $model = SpecialOffer::model()->findLatest();
        $this->title = $model->title;
        $this->render('specialOffer', array('model' => $model));
    }

    protected function renderDecoration() {
        if ($this->title !== null) {
            echo "<h2 class=\"{$this->titleCssClass}\">{$this->title}</h2>\n";
        }
    }

}