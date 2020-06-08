<h2><?php echo CHtml::link(CHtml::encode($model->title), array('specialOffers/view', 'slug' => $model->slug),array('title'=> CHtml::encode($model->title))); ?></h2>
<p><?php echo $model->excerpt; ?></p>
<p><?php echo date('d F', strtotime($model->active_from)); ?> - <?php echo date('d F', strtotime($model->active_to)); ?>. <?php echo Translation::model()->getByKey("minimum_stay")." ".$model->minimum_stay; ?></p>
<p><?php echo Translation::model()->getByKey("minimum_persons") . " " . $model->minimum_persons; ?></p>
<p><?php echo Translation::model()->getByKey("price_from") . " " . $model->price_from; ?> €</p>