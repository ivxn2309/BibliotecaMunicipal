<?php
/* @var $this GameController */
/* @var $model Game */

$this->breadcrumbs=array(
	'Juegos'=>array('index'),
	$model->name=>array('view','id'=>$model->game_id),
	'Actualizar',
);
?>

<h2>Actualizar juego #<?php echo $model->game_id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>