<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Libros'=>array('index'),
	$model->title,
);
?>

<h2>Datos del libro <?php echo $model->title; ?></h2>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'signature',
		'title',
		'author',
		'volume',
		'copy',
		'classification',
	),
)); ?>
