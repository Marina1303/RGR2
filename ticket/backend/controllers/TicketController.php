<?php
namespace backend\controllers;


use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use app\models\Ticket;
use app\models\City;
use app\models\Flight;


/**
 * Site controller
 */
class TicketController extends Controller
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        // страница входа в систему и сообщения об ошибке доступны всем
                        'actions' => ['login', 'error','index1','addt','addt_success'],
                        'allow' => true,
                    ],
                    [
                        // выход из системы только для зарегистрированного пользователя
                        'actions' => ['logout','index11','indexc','add_city','addt','addt_success','edit_flight','index','index_cancel',
						'index_opl','pass','editt','add_flight','delete_flight','delete','delete_city'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
	
	
	
	
	
	
	public function actionEditt($id) {
		$ticket=Ticket::findOne($id);
		if (!$ticket) {
			return 'билет найден';
		} 
		
		if (isset($_POST['Ticket'])) {
			$ticket->attributes=$_POST['Ticket'];
			If ($ticket->save()) {
				return $this->redirect(['ticket/index']);
			}
		}
		return $this->render('addt',['ticket'=>$ticket]); 

		
	}
	
	public function actionIndexc() {
		$city=City::find()
		->all();
		return $this->render('indexc',['city'=>$city]);
	}
	
	public function actionAdd_city() {
		$city=new City;
		if (isset($_POST['City'])) {
			$city->attributes=$_POST['City'];
			If ($city->save()) {
				return $this->redirect(['ticket/indexc']); //статичная страница
			}
		}	
		return $this->render('add_city',['city'=>$city]);	
	}
	
	public function actionEdit_city($id) {
		$city=City::findOne($id);
		if (!$city) {
			return 'город найден';
		} 
		if (isset($_POST['City'])) {
			$city->attributes=$_POST['City'];
			If ($city->save()) {
				return $this->redirect(['ticket/indexc']);
			}
		}
		return $this->render('add_city',['city'=>$city]); 
	}
	
	public function actionDelete_city ($id)
	{
		$city=City::findOne($id);
		if (!$city) {
			return 'Город найден';
		}
		$city->delete();
		return $this->redirect(['ticket/indexc']);
	}		
	
	
	public function actionIndex()
	{
		$tickets=Ticket::find()
		->orderBy(['first_name'=>SORT_ASC,'last_name'=>SORT_ASC])
		->having('status_ticket=1')
		->all();
		return $this->render('index',['tickets'=>$tickets]);
	}
			
	public function actionDelete ($id)
	{
		$ticket=Ticket::findOne($id);
		if (!$ticket) {
			return 'Билет найден';
		}
		$ticket->delete();
		return $this->redirect(['ticket/index']);
	}		
	
	public function actionIndex_opl()
	{
		$tickets=Ticket::find()
		->having('status_ticket=2')
		->orderBy(['last_name'=>SORT_ASC,'first_name'=>SORT_ASC])
		->all();
		return $this->render('index_opl',['tickets'=>$tickets]);
	}
	
	public function actionIndex_cancel()
	{
		$tickets=Ticket::find()
		->having('status_ticket=0')
		->orderBy(['last_name'=>SORT_ASC,'first_name'=>SORT_ASC])
		->all();
		return $this->render('index_cancel',['tickets'=>$tickets]);
	}
	
	public function actionIndex11()
	{
		$flight=Flight::find()
		->all();
		return $this->render('index11',['flight'=>$flight]);
	}
	
	public function actionPass($id)
	{
		$flight=Flight::findOne($id);
		$list=$flight->getTickets()
		->orderBy(['last_name'=>SORT_ASC,'first_name'=>SORT_ASC])
		->all();
		return $this->render('pass',['list'=>$list,'flight'=>$flight]);
	}
	
	public function actionEdit_flight($id)
	{
		$flight=Flight::findOne($id);
		if (!$flight) {
			return 'рейс найден';
		} 
		$cities=City::find()->all();
		if (isset($_POST['Flight'])) {
			$flight->attributes=$_POST['Flight'];
			If ($flight->save()) {
			return $this->redirect(['ticket/index11']);
			}
		}
		return $this->render('edit_Flight',['flight'=>$flight,'cities'=>$cities]); 

		
	}
	
	public function actionAdd_flight($city=null)
	{
		$flight=new Flight;
		$flight->departure_city_id=$city;
		$flight->arrival_city_id=$city;
		$cities=City::find()->all();
		if (isset($_POST['Flight'])) {
			$flight->attributes=$_POST['Flight'];
			If ($flight->save()) {
				return $this->redirect(['ticket/index11']); //статичная страница
			}
		}				
		return $this->render('add_flight',['flight'=>$flight,'cities'=>$cities]);	
	}
	
	public function actionDelete_flight ($id)
	{
		$flight=Flight::findOne($id);
		if (!$flight) {
			return 'Рейс найден';
		}
		$flight->delete();
		return $this->redirect(['ticket/index11']);
	}		
}