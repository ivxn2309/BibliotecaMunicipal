<?php
/* @var $this LoanController */
/* @var $data Loan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('loan_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->loan_id), array('view', 'id'=>$data->loan_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user')); ?>:</b>
	<?php echo CHtml::encode($data->user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('book')); ?>:</b>
	<?php echo CHtml::encode($data->book); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('returned')); ?>:</b>
	<?php echo CHtml::encode($data->returned); ?>
	<br />


</div>