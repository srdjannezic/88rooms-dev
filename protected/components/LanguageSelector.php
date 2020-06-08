<?php

class LanguageSelector extends CWidget {

    public function run() {
        $app = Yii::app();
        $route = $app->controller->route;
        $languages = $app->request->allLangs;
        $language = $app->language;
        $params = $_GET;
        echo '<div class="dropdown-wrap">';
        echo CHtml::link('<span class="lng">' . $languages[$language]['short'] . '</span>' . ' <b class="caret"></b>', '#', array(
            'class' => 'dropdown-toggle',
            'data-toggle' => 'dropdown'
        ));

        array_unshift($params, $route);

        echo '<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">';
        foreach ($languages as $code => $lang) {
            if ($code === $language)
                continue;

            $params['_lang'] = $code;

            echo '<li>' . CHtml::link($lang['short'], $params) . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }

}