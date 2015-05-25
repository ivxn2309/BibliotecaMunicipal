<?php
/* @var $this LoanController */
/* @var $model Loan */

$this->breadcrumbs=array(
	'Prestamos'=>array('index'),
	$model->loan_id=>array('view','id'=>$model->loan_id),
	'Actualizar',
);

?>

<h2>Actualiza préstamo</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>