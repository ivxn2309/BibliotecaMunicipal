<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->username=>array('view','id'=>$model->username),
	'Actualizar',
);
?>

<h2>Editando a <?php echo $model->firstname; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>