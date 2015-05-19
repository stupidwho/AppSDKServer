<?php
/* @var $this ApplicationController */
/* @var $model Application */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'application-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'package_name'); ?>
		<?php echo $form->textField($model,'package_name',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'package_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'private_key'); ?>
		<?php echo $form->textArea($model,'private_key',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'private_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'public_key'); ?>
		<?php echo $form->textArea($model,'public_key',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'public_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'products'); ?>
		<?php echo $form->textArea($model,'products',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'products'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->