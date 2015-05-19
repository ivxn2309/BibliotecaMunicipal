<?php
/* @var $this RecommendationController */
/* @var $model Recommendation */

$this->breadcrumbs=array(
	'Recommendations'=>array('index'),
	$model->recom_id,
);

$this->menu=array(
	array('label'=>'List Recommendation', 'url'=>array('index')),
	array('label'=>'Create Recommendation', 'url'=>array('create')),
	array('label'=>'Update Recommendation', 'url'=>array('update', 'id'=>$model->recom_id)),
	array('label'=>'Delete Recommendation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->recom_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recommendation', 'url'=>array('admin')),
);
?>

<h1>View Recommendation #<?php echo $model->recom_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'recom_id',
		'book',
		'start_date',
		'recom_author',
		'is_active',
	),
)); ?>
