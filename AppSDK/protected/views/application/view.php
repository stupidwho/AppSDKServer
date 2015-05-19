<?php
/* @var $this ApplicationController */
/* @var $model Application */

$this->breadcrumbs=array(
	'Applications'=>array('index'),
	$model->app_id,
);

$this->menu=array(
	array('label'=>'List Application', 'url'=>array('index')),
	array('label'=>'Create Application', 'url'=>array('create')),
	array('label'=>'Update Application', 'url'=>array('update', 'id'=>$model->app_id)),
	array('label'=>'Delete Application', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->app_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Application', 'url'=>array('admin')),
);
?>

<h1>View Application #<?php echo $model->app_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'app_id',
		'package_name',
		'private_key',
		'public_key',
		'products',
	),
)); ?>
