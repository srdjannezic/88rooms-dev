<?php

class LanguageSelectorLinks extends CWidget {

    public function run() {
        $app = Yii::app();
        $route = $app->controller->route;
        $languages = $app->request->allLangs;
        $language = $app->language;
        $params = $_GET;
        echo '<div class="langdrop">';
        echo '<ul>';
        echo '<li>' . $languages[$language]['name'] . '</li>';

        array_unshift($params, $route);
        foreach ($languages as $code => $lang) {
            if ($code === $language)
                continue;

            $params['_lang'] = $code;

            echo '<li>' . CHtml::link($lang['name'], $params) . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }

}