<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Libros'=>array('index'),
	$model->title=>array('view','id'=>$model->book_id),
	'Actualizar',
);

?>

<h2>Editar libro "<?php echo $model->title; ?>"</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>