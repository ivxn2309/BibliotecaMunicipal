<?php
/* @var $this CourseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Servicios',
	'Juegos'
);

$len = sizeof($models);
$adm = Yii::app()->user->type === "1";
?>

<h2>Juegos</h2>
<?php if($adm): ?>
<p>
	<?php echo CHtml::link('Registrar un juego nuevo', 
		array('game/create/'), 
		array('class'=>'btn btn-primary btn-xl')); ?>
</p>
<?php endif; ?>


<?php if($len != 0): ?>
<section class="grid-wrap">

	<header class="grid col-full"></header>
	
	<?php for($i=0; $i<$len; $i++): ?>
	<figure class="grid col-one-quarter mq2-col-one-half">
		<a href="#">
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/games/<?php echo $models[$i]->game_id ?>.jpg" alt="">
			<span class="zoom"></span>
		</a>
		<figcaption>
			<h5><?php echo $models[$i]->name ?></h5>
			<p class="des"><?php echo $models[$i]->description ?></p>
			<p class="sch"><?php echo $models[$i]->start_date ?></p>
		</figcaption>
		<?php if($adm): ?>
		<p class="cmd">
			<?php echo CHtml::link('Editar', array('game/update/'.$models[$i]->game_id), array('class'=>'btn btn-info btn-block')); ?>
			<?php echo CHtml::link('Descartar', array('game/delete/'.$models[$i]->game_id), array('class'=>'btn btn-danger btn-block')); ?>
		</p>
		<?php endif; ?>
	</figure>
	<?php endfor; ?>
</section>
<?php else: ?>
	<h3>Esta sección se encuentra vacía por el momento</h3>
<?php endif; ?>


<style type="text/css">
	section.grid-wrap figure {
		margin-bottom: 50px;
	}

	section.grid-wrap figure figcaption h5 {
		text-align: center;
	}

	section.grid-wrap figure figcaption .des {
		text-align: center;
		margin-bottom: 0px;
	}

	section.grid-wrap figure figcaption .sch {
		font-size: .8em;
		font-weight: bold;
		text-align: center;
		margin-bottom: 0px;
	}

	section.grid-wrap figure figcaption .cmd {
		text-align: center;
	}

</style>