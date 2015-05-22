<?php
/* @var $this BookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ver',
	'Acervos',
);
?>

<h2>Books</h2>

<?php 
if(Yii::app()->user->type === "1")
	echo CHtml::link('Registrar libro',array('book/create'),array('class'=>'btn btn-default')); 
?>
<?php $this->widget(
    'booster.widgets.TbGridView',
    array(
    	'type' => 'striped bordered condensed',
        'dataProvider' => $gridDataProvider,
        'template' => "{items}\n{pager}",
        //'filter' => $book->search(),
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
