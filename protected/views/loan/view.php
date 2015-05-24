<?php
/* @var $this LoanController */
/* @var $model Loan */

$this->breadcrumbs=array(
	'Loans'=>array('index'),
	$model->loan_id,
);

?>

<h1>View Loan #<?php echo $model->loan_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'loan_id',
		'user',
		'book',
		'start_date',
		'end_date',
		'returned',
	),
)); ?>
