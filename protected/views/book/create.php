<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Libros'=>array('index'),
	'Crear',
);
?>

<h2>Registrar libro nuevo</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>