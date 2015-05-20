<?php
require_once dirname(__FILE__).'/../../pingpp-php/init.php';
require_once dirname(__FILE__).'/response.php';
\Pingpp\Pingpp::setApiKey('sk_test_CaTSC0u10mnTX14uX1jrvj1K');
class PayController extends Controller
{
	public function actionBuy()
	{
		$this->render('buy');
	}

	public function actionOrder() {
		$input_data = json_decode(file_get_contents('php://input'), true);
		$channel = strtolower($input_data['channel']);
		$amount = $input_data['amount'];
		$orderNo = $input_data['order_no'];
		$ch = \Pingpp\Charge::create(
			array(
				'order_no'  => $orderNo,
				'app'       => array('id' => 'app_D00m5SaHenv1O8mr'),
				'channel'   => $channel,
				'amount'    => $amout,
				'client_ip' => $_SERVER["REMOTE_ADDR"],
				'currency'  => 'cny',
				'subject'   => 'Your Subject',
				'body'      => 'Your Body',
				'extra'     => $extra
				)
			);
		echo $ch;
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	// -----------------------------------------------------------
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}