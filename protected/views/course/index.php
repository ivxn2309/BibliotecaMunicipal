<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Servicios',
	'Cursos'
);

$len = sizeof($models);
$adm = Yii::app()->user->type === "1";
?>

<h2>Cursos</h2>
<?php if($adm): ?>
<p>
	<?php echo CHtml::link('Registrar un curso nuevo', 
		array('course/create/'), 
		array('class'=>'btn btn-primary btn-xl')); ?>
</p>
<?php endif; ?>


<?php if($len != 0): ?>
<section class="grid-wrap">

	<header class="grid col-full">
	</header>
	
	<?php for($i=0; $i<$len; $i++): ?>
	<article class="grid col-one-third mq3-col-full box">
		<h5><?php echo $models[$i]->name ?></h5>
		<p class="des"><?php echo $models[$i]->description ?></p>
		<p class="sch"><?php echo $models[$i]->schedule ?></p>
		<?php if($adm): ?>
		<p class="cmd">
			<?php echo CHtml::link('Editar', array('course/update/'.$models[$i]->course_id), array('class'=>'btn btn-info btn-block')); ?>
			<?php echo CHtml::link('Descartar', array('course/delete/'.$models[$i]->course_id), array('class'=>'btn btn-danger btn-block')); ?>
		</p>
		<?php endif; ?>
	</article>
	<?php endfor; ?>

</section>
<?php else: ?>
	<h3>Esta sección se encuentra vacía por el momento</h3>
<?php endif; ?>



<style type="text/css">
	section.grid-wrap article {
		margin-bottom: 50px;
	}

	section.grid-wrap article h5 {
		text-align: center;
	}

	section.grid-wrap article .des {
		text-align: center;
		margin-bottom: 0px;
	}

	section.grid-wrap article .sch {
		font-size: .8em;
		font-weight: bold;
		text-align: center;
		margin-bottom: 0px;
	}

	section.grid-wrap article .cmd {
		text-align: center;
	}

</style>