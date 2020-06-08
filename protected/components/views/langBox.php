<div class="langdrop">
    <?php if ($this->type == 'select'): ?>
        <?php echo CHtml::form('', 'GET'); ?>
        <?php echo CHtml::dropDownList('_lang', $currentLang, CHtml::listData(Language::model()->findAll(), "code", "short"), array('submit' => '')); ?>
        <?php echo CHtml::endForm(); ?>
    <?php else: ?>
        <?php echo CHtml::form(); ?>
        <ul>
            <?php foreach (Language::model()->findAll() as $lang): ?>
                <li>
                    <?php
                    echo CHtml::link(
                            $lang->name, "", array(
                        'submit' => "",
                        'method' => 'GET',
                        'params' => array('_lang' => $lang->code),
                            )
                    );
                    ?>
                <?php endforeach; ?>
            </li>
        </ul>
        <?php echo CHtml::endForm(); ?>
    <?php endif; ?>
</div>
<?php
$app = Yii::app();
$route = $app->controller->route;
$language = $app->language;
$params = $_GET;
//array_unshift($params, $route);
var_dump($route);
//var_dump($params);
$url = Utility::createUrl($route,$params);
var_dump($url);
?>