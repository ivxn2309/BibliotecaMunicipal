<?php
/* @var $this MessageController */
/* @var $model Message */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php 
	    $model->user = Yii::app()->user->name;
	    $today = getdate();
		$hoy = $today['year']."/".$today['mon']."/".$today['mday'];
		$model->sent_date = $hoy
	?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'user'); ?>
		<?php echo $form->textField($model,'user', array('size'=>60,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'user'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textField($model,'body',array('size'=>60,'maxlength'=>900)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div><br>

	<div class="row" style="display:none;">		
		<?php echo $form->labelEx($model,'sent_date'); ?>
		<?php echo $form->textField($model,'sent_date',array('size'=>60,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sent_date'); ?>
	</div><br>
	<?php 
		$model->is_read = 0;
		$model->is_active = 1;
	?>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'is_read'); ?>
		<?php echo $form->textField($model,'is_read'); ?>
		<?php echo $form->error($model,'is_read'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Enviar' : 'Guardar'); ?><br><br>
		<?php if(!$model->isNewRecord) echo CHtml::link('Volver al buzón',array('message/index'),array('class'=>'btn btn-success btn-large'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<style type="text/css">
	#message-form {
		text-align: center;
	}
	label {
		margin-bottom: 2px;
	}
</style>