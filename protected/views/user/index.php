<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ver',
	'Usuarios',
);
?>

<h2>Usuarios</h2>
<?php echo CHtml::link('Crear usuario nuevo',array('user/create'),array('class'=>'btn btn-default')); ?>
<?php $this->widget(
    'booster.widgets.TbGridView',
    array(
    	'type' => 'striped bordered condensed',
        'dataProvider' => $gridDataProvider,
        'template' => "{items}\n{pager}",
        'columns' => $gridColumns,
    )
);?>


