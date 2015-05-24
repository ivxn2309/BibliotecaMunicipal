<?php
/* @var $this ForumController */
/* @var $model Forum */

$this->breadcrumbs=array(
	'Foro'=>array('index'),
	'Crear',
);

?>

<h2>Crear Foro</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>