<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'imei'); ?>
		<?php echo $form->textField($model,'imei',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'app_id'); ?>
		<?php echo $form->textField($model,'app_id',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products_record'); ?>
		<?php echo $form->textArea($model,'products_record',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->