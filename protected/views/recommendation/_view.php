<?php
/* @var $this RecommendationController */
/* @var $data Recommendation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('recom_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->recom_id), array('view', 'id'=>$data->recom_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('book')); ?>:</b>
	<?php echo CHtml::encode($data->book); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('recom_author')); ?>:</b>
	<?php echo CHtml::encode($data->recom_author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />


</div>