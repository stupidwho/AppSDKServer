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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'imei'); ?>
		<?php echo $form->textField($model,'imei',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'imei'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'app_id'); ?>
		<?php echo $form->textField($model,'app_id',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'app_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products_record'); ?>
		<?php echo $form->textArea($model,'products_record',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'products_record'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->