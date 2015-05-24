<?php
/* @var $this GameController */
/* @var $model Game */

$this->breadcrumbs=array(
	'Juegos'=>array('index'),
	'Crear',
);

?>

<h2>Crear juego</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>