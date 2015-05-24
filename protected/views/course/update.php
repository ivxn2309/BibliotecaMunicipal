<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->name=>array('view','id'=>$model->course_id),
	'Actualizar',
);

?>

<h2>Actualizar curso</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>