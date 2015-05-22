<?php
/* @var $this LoanController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ver',
	'Prestamos',
);
?>

<h2>Prestamos</h2>

<?php 
if(Yii::app()->user->type === "1")
	echo CHtml::link('Registrar Préstamo',array('loan/create'),array('class'=>'btn btn-default')); 
?>
<?php $this->widget(
    'booster.widgets.TbGridView',
    array(
    	'type' => 'striped bordered condensed',
        'dataProvider' => $gridDataProvider,
        'template' => "{items}\n{pager}",
        'columns' => $gridColumns,
    )
);?>

<?php if(Yii::app()->user->type === "0"): ?>
<style type="text/css">
	a.view, a.update, a.delete {
		visibility: hidden;
	}
</style>
<?php endif; ?>