<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imei')); ?>:</b>
	<?php echo CHtml::encode($data->imei); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_id')); ?>:</b>
	<?php echo CHtml::encode($data->app_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products_record')); ?>:</b>
	<?php echo CHtml::encode($data->products_record); ?>
	<br />


</div>