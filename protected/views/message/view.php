<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->message_id,
);
?>

<h2>Detalles del mensaje</h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user',
		'subject',
		'body',
		'sent_date',
	),
)); ?>
