<?php
/* @var $this RecommendationController */
/* @var $model Recommendation */

$this->breadcrumbs=array(
	'Recommendations'=>array('index'),
	$model->recom_id=>array('view','id'=>$model->recom_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Recommendation', 'url'=>array('index')),
	array('label'=>'Create Recommendation', 'url'=>array('create')),
	array('label'=>'View Recommendation', 'url'=>array('view', 'id'=>$model->recom_id)),
	array('label'=>'Manage Recommendation', 'url'=>array('admin')),
);
?>

<h1>Update Recommendation <?php echo $model->recom_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>