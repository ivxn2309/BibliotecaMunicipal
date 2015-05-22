<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h2>Introduce tus datos para ingresar al sistema</h2>
<section class="grid-wrap">
	<article class="form col-one-half aligncenter fright" style="padding-left: 80px;">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

		<div class="row">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
		<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
		<div class="row buttons" style="margin:20px">
			<?php echo CHtml::submitButton('Entrar', array('class'=>'btn-primary btn-large','style'=>'padding:5px 60px')); ?>
		</div>

	<?php $this->endWidget(); ?>
	</article><!-- form -->
	<article class="col-one-third fleft">
		En esta sección tanto usuarios como bibliotecarios pueden identificarse 
		en el sistema para acceder a diferentes niveles de privilegios. <br><br>
		Una vez que te hallas identificado como usuario de la biblioteca tendrás acceso
		a más opciones, por ejemplo, el buzón de sugerencias.<br><br>
		Los bibliotecarios pueden llevar un control más organizado de los usuarios, colección 
		de acervos y prestamos.
	</article>
</section>
