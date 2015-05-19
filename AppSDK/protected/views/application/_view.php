<?php
/* @var $this ApplicationController */
/* @var $data Application */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->app_id), array('view', 'id'=>$data->app_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_name')); ?>:</b>
	<?php echo CHtml::encode($data->package_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('private_key')); ?>:</b>
	<?php echo CHtml::encode($data->private_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('public_key')); ?>:</b>
	<?php echo CHtml::encode($data->public_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products')); ?>:</b>
	<?php echo CHtml::encode($data->products); ?>
	<br />


</div>