<?php
/* @var $this ApplicationController */
/* @var $model Application */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'app_id'); ?>
		<?php echo $form->textField($model,'app_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'package_name'); ?>
		<?php echo $form->textField($model,'package_name',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'private_key'); ?>
		<?php echo $form->textArea($model,'private_key',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'public_key'); ?>
		<?php echo $form->textArea($model,'public_key',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products'); ?>
		<?php echo $form->textArea($model,'products',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->