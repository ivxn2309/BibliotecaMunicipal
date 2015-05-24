<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->name,
);
?>

<h2>Curso #<?php echo $model->course_id; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'course_id',
		'name',
		'description',
		'schedule',
	),
)); ?>
