<?php
/* @var $this MessageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Libros',
	'Recomendaciones',
);
?>

<h2>Recomendaciones</h2>

<?php $this->widget(
    'booster.widgets.TbGridView',
    array(
    	'type' => 'striped bordered condensed',
        'dataProvider' => $gridDataProvider,
        'template' => "{items}\n{pager}",
        'columns' => $gridColumns,
    )
);?>

<?php if(Yii::app()->user->type === "1"): ?>
<style type="text/css">
	a.update {
		visibility: hidden;
	}
</style>
<?php else: ?>
<style type="text/css">
	a.view, a.update, a.delete {
		visibility: hidden;
	}
</style>
<?php endif; ?>