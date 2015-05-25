<?php
/* @var $this LoanController */
/* @var $model Loan */

$this->breadcrumbs=array(
	'Prestamos'=>array('index'),
	'Crear',
);

?>

<h2>Crear préstamo</h2>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>