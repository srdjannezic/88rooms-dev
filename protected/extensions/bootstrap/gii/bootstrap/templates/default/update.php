<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn = $this->guessNameColumn($this->tableSchema->columns);
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	__('Update'),
);\n";
?>

$this->menu=array(
array('label'=>'List <?php echo $this->modelClass; ?>','url'=>array('index')),
array('label'=>'Create <?php echo $this->modelClass; ?>','url'=>array('create')),
array('label'=>'View <?php echo $this->modelClass; ?>','url'=>array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
array('label'=>'Manage <?php echo $this->modelClass; ?>','url'=>array('admin')),
);
?>
<?php
$vowels = array("a", "o", "e", "i", "u");
if (in_array(substr(strtolower($this->modelClass), 0, 1), $vowels)) {
    $str = "an";
} else {
    $str = "a";
}
?>
<h1><?php echo "<?php echo __('Update');?> <?php echo __('" . $str . "');?>"; ?> <?php echo $this->modelClass . " <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>
<hr/>
<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>