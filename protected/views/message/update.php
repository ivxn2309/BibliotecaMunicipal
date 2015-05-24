<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->message_id=>array('view','id'=>$model->message_id),
	'Actualizar',
);

?>

<h2>Editar mensaje</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>