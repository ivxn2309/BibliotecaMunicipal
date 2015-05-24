<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->firstname,
);
?>

<h2>Datos del usuario <?php echo $model->firstname; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'username',
		'firstname',
		'surnames',
		'address',
		'phone',
		'age',
		'guarantor',
		'email',
	),
)); ?>
