<?php

class MessageController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Message;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Message']) && Yii::app()->user->type === "1")
		{
			$model->attributes=$_POST['Message'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->message_id));
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

		if(isset($_POST['Message']) && Yii::app()->user->type === "1")
		{
			$model->attributes=$_POST['Message'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->message_id));
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
		if(Yii::app()->user->type === "1") {
			$model=$this->loadModel($id);
			$model->is_active = 0;
			$model->save();
			//$this->loadModel($id)->delete();
			$this->actionIndex();
		}
		else {
			throw new CHttpException(400,'La petición es inválida');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//Se obtienen todos los registros de la tabla Mensajes
		$models=Message::model()->findAll();
		$arreglo = array();
		$idx = 0;
		//Se recorre la lista de mensajes
		for($i=0;$i<sizeOf($models);$i++){
			//Si el libro se encuentra activo
			if($models[$i]->is_active == 1){
				//Se obtienen los objetos foraneos
				$usr = User::model()->findByPk($models[$i]->user);
				//Se genera un objeto de tipo BookEntity con los atributos deseados
				$testMess = new MessageEntity();
				$testMess->id=$idx+1;
				$testMess->message_id=$models[$i]->message_id;
				$testMess->user=$usr->firstname." ".$usr->surnames;
				$testMess->subject=$models[$i]->subject;
				$testMess->body=$models[$i]->body;
				$testMess->sent_date=$models[$i]->sent_date;
				if($models[$i]->is_read == 1)
					$testMess->is_read="Leído";
				else
					$testMess->is_read="*** Nuevo ***";
				$testMess->is_active=$models[$i]->is_active;
				//El objeto es agregado a un segundo arreglo
				$arreglo[$idx++] = $testMess;
			}			
		}
		$testMess = new MessageEntity();
		//Se genera un CArrayDataProvider a partir del nuevo arreglo
		$gridDataProvider = new CArrayDataProvider($arreglo);
		//Se definen las columnas y opciones
		$gridColumns = array(
			array('name'=>'id', 'header'=>'#'),
			array('name'=>'sent_date', 'header'=>'Fecha'),
			array('name'=>'user', 'header'=>'Remitente'),
			array('name'=>'subject', 'header'=>'Asunto'),
			array('name'=>'is_read', 'header'=>'Estado.'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
				'viewButtonUrl'=>'Yii::app()->createUrl("message/view/", array("id"=>$data->message_id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("message/update/", array("id"=>$data->message_id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("message/delete/", array("id"=>$data->message_id))',
			)
		);
		$this->render('index', array(
			'models'=>$models,
			'gridDataProvider'=>$gridDataProvider,
			'gridColumns'=>$gridColumns,
			'mess'=>$testMess
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Message('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Message']))
			$model->attributes=$_GET['Message'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Message the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Message::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Message $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='message-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
 class MessageEntity{}