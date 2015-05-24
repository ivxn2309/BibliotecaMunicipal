<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Crear',
);

?>

<h2>Crear un curso nuevo</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>