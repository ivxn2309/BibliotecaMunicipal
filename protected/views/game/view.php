<?php
/* @var $this GameController */
/* @var $model Game */

$this->breadcrumbs=array(
	'Juegos'=>array('index'),
	$model->name,
);
?>

<h2>Juego #<?php echo $model->game_id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'game_id',
		'name',
		'description',
		'start_date',
	),
)); ?>
