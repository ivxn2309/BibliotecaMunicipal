<?php
/* @var $this ForumController */
/* @var $model Forum */

$this->breadcrumbs=array(
	'Foros'=>array('index'),
	$model->name,
);
?>

<h2>Foro #<?php echo $model->forum_id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'forum_id',
		'name',
		'description',
		'start_date',
	),
)); ?>
