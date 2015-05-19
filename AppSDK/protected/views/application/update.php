<?php
/* @var $this ApplicationController */
/* @var $model Application */

$this->breadcrumbs=array(
	'Applications'=>array('index'),
	$model->app_id=>array('view','id'=>$model->app_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Application', 'url'=>array('index')),
	array('label'=>'Create Application', 'url'=>array('create')),
	array('label'=>'View Application', 'url'=>array('view', 'id'=>$model->app_id)),
	array('label'=>'Manage Application', 'url'=>array('admin')),
);
?>

<h1>Update Application <?php echo $model->app_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>