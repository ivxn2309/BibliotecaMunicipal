<?php
/* @var $this ForumController */
/* @var $model Forum */

$this->breadcrumbs=array(
	'Foro'=>array('index'),
	$model->name=>array('view','id'=>$model->forum_id),
	'Actualizar',
);

?>

<h2>Editar foro #<?php echo $model->forum_id; ?></h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>