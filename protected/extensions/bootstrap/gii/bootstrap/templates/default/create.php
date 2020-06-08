<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label = $this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	__('Create'),
);\n";
?>

$this->menu=array(
array('label'=>'List <?php echo $this->modelClass; ?>','url'=>array('index')),
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
<h1><?php echo "<?php echo __('Create');?> <?php echo __('" . $str . "');?>"; ?> <?php echo $this->modelClass; ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
