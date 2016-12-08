<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use app\models\Ticket;
use app\models\City;
use app\models\Flight;


/**
 * Site controller
 */
class TicketController extends Controller
{
	public function actionIndex()
	{
		$tickets=Ticket::find()
		->orderBy(['first_name'=>SORT_ASC,'last_name'=>SORT_ASC])
		->all();
		return $this->render('index',['tickets'=>$tickets]);
	}
	
	public function actionIndex1() 
	{
		$flight=Flight::find()
		->having('status = 1')->all();
		return $this->render('index1',['flight'=>$flight]);
	}
	
	public function actionIndexc()
	{
		$city=City::find()
		->all();
		return $this->render('indexc',['city'=>$city]);
	}
	
	public function actionAddt($flight) 
	{
		$ticket=new Ticket;
		$ticket->flight_id=$flight;
			if (isset($_POST['Ticket'])) {
				$ticket->attributes=$_POST['Ticket'];
				If ($ticket->save()) {
					return $this->render('addt_success',['ticket'=>$ticket]); //статичная страница
				}
			}
			return $this->render('addt',['ticket'=>$ticket]);	
	}
	
	
	public function actionEditt($id) 
	{
		$ticket=Ticket::findOne($id);
		if (!$ticket) {
			throw new \yii\web\NotFoundHttpException('Билет не найден');
		} 
		if (isset($_POST['Ticket'])) {
			$ticket->attributes=$_POST['Ticket'];
			If ($ticket->save()) {
				return $this->redirect(['ticket/index']);
			}
		}
		return $this->render('addt',['ticket'=>$ticket]); 
	}
}