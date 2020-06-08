<?php

$GLOBALS['rbamCache'] = array();

// email purpose
function replaceImages($matches) {
    var_dump($matches);
    die();
    if (isset($matches[2])) {
        return $matches[2];
    }
    return null;
}

function param($param) {
    return Yii::app()->params[$param];
}

function baseUrl() {
    return param("baseUrl");
}

function __($text, $params = array(), $category = "") {
    //return Yii::t($category, $text, $params);
    if (empty($text)) {
        return $text;
    } else {
        return _($text);
    }
}
