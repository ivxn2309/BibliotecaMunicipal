<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'signature'); ?>
		<?php echo $form->textField($model,'signature',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'signature'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'author'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'volume'); ?>
		<?php echo $form->textField($model,'volume',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'volume'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'copy'); ?>
		<?php echo $form->textField($model,'copy',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'copy'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'classification'); ?>
		<?php echo $form->textField($model,'classification',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'classification'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div><br>
	<?php $model->is_active = 1;?>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
		<br><br>
		<?php echo CHtml::link('Volver a la lista de libros sin hacer cambios',array('book/index'),array('class'=>'btn btn-success btn-large'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<style type="text/css">
	#book-form {
		text-align: center;
	}
	label {
		margin-bottom: 2px;
	}
</style>