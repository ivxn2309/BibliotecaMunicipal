<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con un <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php if($model->isNewRecord): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div><br>
	<?php endif; ?>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'surnames'); ?>
		<?php echo $form->textField($model,'surnames',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'surnames'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'guarantor'); ?>
		<?php echo $form->textField($model,'guarantor',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'guarantor'); ?>
	</div><br>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div><br>
	<?php 
		$model->usertype = 0; 
		$model->is_active = 1; 
	?>
	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'usertype'); ?>
		<?php echo $form->textField($model,'usertype'); ?>
		<?php echo $form->error($model,'usertype'); ?>
	</div>

	<div class="row" style="display:none;">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ''); ?>
		<br><br>
		<?php echo CHtml::link('Volver a la lista de usuarios sin hacer cambios',array('user/index'),array('class'=>'btn btn-success btn-large'));?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<style type="text/css">
	#user-form {
		text-align: center;
	}
	label {
		margin-bottom: 2px;
	}
</style>