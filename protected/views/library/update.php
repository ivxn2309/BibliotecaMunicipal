<?php
/* @var $this LibraryController */
/* @var $model Library */

$this->breadcrumbs=array(
	'Libraries'=>array('index'),
	$model->name=>array('view','id'=>$model->library_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Library', 'url'=>array('index')),
	array('label'=>'Create Library', 'url'=>array('create')),
	array('label'=>'View Library', 'url'=>array('view', 'id'=>$model->library_id)),
	array('label'=>'Manage Library', 'url'=>array('admin')),
);
?>

<h1>Update Library <?php echo $model->library_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>