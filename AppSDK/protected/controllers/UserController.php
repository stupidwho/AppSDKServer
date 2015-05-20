<?php
require_once dirname(__FILE__).'/response.php';
class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	/*public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}*/

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/

	public function constructArray($jsonStr)
	{
		return CJSON::decode($jsonStr);
	}

	public function constructLicense($model, $appId, $imei) 
	{
		$tmpKey = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQC19+3Zkg8ko4S7XeAjGl2ps8dEVGx2prFAAsq9OeNjvI4zbUG2
iw7fvk02VZuilYyspB/MR1nMEWreVj21FdnN/szIlC/stptlNMtmkZ28jv8QVvls
8O2Zp97qDxSWbYwZFT1nmQVK1uSZV7wMEldWTSlFcLuOXoFGGXndO9062QIDAQAB
AoGASoBHkVyLdqS8Izo8GiMhVemVHBS0k5+L0nlSKEcbIiqAze1dii9E17ZCRoym
O9qezdAkdK6BxVscNgt5GDrqAQvS6LmQ1KQfOF2mr3rNeCjz6RLl4ujl9mjwAikG
HRWBev7Dz9q/YjKg4OaFTTT5HcgnuyLzO2DY8rKA1PM3gkECQQDlPtu0N4gZJe2/
BSqEFwLLme+lQP8d1NNoICAP5U+GowUc885AMMWqOObOUVe/PzaSSObyAsRTht2H
OCalqWh/AkEAyzSUXpThSShB6JQxDC52r+SS9342bEa6z3vSJ2gBfIZObxA25jHS
F7pRh/vXpGXzcsV4fzIDGKz6tEPHfh3wpwJBANUwnrs7RWs1taKGWGKcz7Guh4nk
JxyD9tKHxalitJFd+3xQU4eok7pYznQie3rUe5iRCY0Y+6E987gzhOVc5VsCQFNs
4MT75on8ZyKvRHu1z7Bi7RuCy6EkYKmyMhNPldyj3yulwoQ7S//F1Jc5g8zQtmQW
QmQmCjNlQQAlG4/hht0CQByUzQ2Vj9uB/RXMvPWtGimEENaAO5Q2wF5kWnoyfg8U
8DjPPoFe0B9mWxAjPBCnI3UwW3P7B7TZKrAlf+GbtxE=
-----END RSA PRIVATE KEY-----';
		$productInfo=$model->products_record;
		// $productInfo='{"description":"aaaaaa","subProducts":[{"isConsumer":true,"price":1,"subId":"1","num":3,"description":"nnnnnn"},{"isConsumer":false,"price":1,"subId":"2","num":0,"description":"jjjjj"}]}'
		$productArray=$this->constructArray($productInfo);
		$pkgName=Application::model()->findByPk($appId)->package_name;
		$licenseArray=array('appId'=>$appId,'packageName'=>$pkgName,'imei'=>$imei,'timeStamp'=>time(),'productInfo'=>$productArray);
		$content=CJSON::encode($licenseArray);
		$app = Application::model()->findByPk($appId);
		if ($app === null)
		{
			_sendResponse(404,'not found');
		} else 
		{
			$key = $app->private_key;
			// $key = $tmpKey;
			// $content = base64_encode($content);
			// $content='hhhhhhhhhhhhhhhhh';
			openssl_sign($content, $sign, $key, OPENSSL_ALGO_SHA1);
			$sign=base64_encode($sign);
			return CJSON::encode(array('signature'=>$sign, 'content'=>$content));
			// return array('signature'=>$sign, 'content'=>$content);
		}
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($imei, $app_id)
	{
		$model=User::model()->findByAttributes(array('imei' => $imei, 'app_id'=>$app_id ));
		if($model===null)
			_sendResponse(404,'not found');
		else
		 {
		 	$responseStr = $this->constructLicense($model, $app_id, $imei);
			_sendResponse(200, $responseStr);
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
