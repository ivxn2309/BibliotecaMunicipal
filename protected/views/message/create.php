<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	'Crear',
);

?>

<h2>Redactar mensaje</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>