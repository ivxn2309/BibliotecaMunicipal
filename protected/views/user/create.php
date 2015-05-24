<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear',
); 

?>

<h2>Crear un nuevo usuario</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>