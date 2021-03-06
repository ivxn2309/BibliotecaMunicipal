<?php
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
				'actions'=>array('create','update', 'delete'),
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->username));
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
				$this->redirect(array('view','id'=>$model->username));
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
		$this->actionIndex();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//Se obtienen todos los registros de la tabla usuarios
		$models=User::model()->findAll();
		$arreglo = array();
		$idx = 0;
		//Se recorre la lista de usuarios
		for($i=0;$i<sizeOf($models);$i++){
			//Si el usuario actual esta activo y no es bibliotecario
			if($models[$i]->is_active == 1 && $models[$i]->usertype == 0){
				//Se genera un objeto de tipo UserEntity con los atributos deseados
				$testSubject = new UserEntity();
				$testSubject->id=$i;
				$testSubject->username=$models[$i]->username;
				$testSubject->firstname=$models[$i]->firstname;
				$testSubject->surnames=$models[$i]->surnames;
				$testSubject->address=$models[$i]->address;
				$testSubject->phone=$models[$i]->phone;
				$testSubject->age=$models[$i]->age;
				$testSubject->guarantor=$models[$i]->guarantor;
				$testSubject->email=$models[$i]->email;
				//El objeto es agregado a un segundo arreglo
				$arreglo[$idx++] = $testSubject;
			}			
		}
		$testSubject = new UserEntity();
		//Se genera un CarrayDataProvider a partir del nuevo arreglo
		$gridDataProvider = new CArrayDataProvider($arreglo);
		//Se definen las columnas y opciones
		$gridColumns = array(
			array('name'=>'username', 'header'=>'Username'),
			array('name'=>'firstname', 'header'=>'Nombre'),
			array('name'=>'surnames', 'header'=>'Apellido'),
			array('name'=>'address', 'header'=>'Direccion'),
			array('name'=>'phone', 'header'=>'Telefono'),
			array('name'=>'age', 'header'=>'Edad'),
			array('name'=>'guarantor', 'header'=>'Fiador'),
			array('name'=>'email', 'header'=>'E-mail'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
				'viewButtonUrl'=>'Yii::app()->createUrl("user/view/", array("id"=>$data->username))',
				'updateButtonUrl'=>'Yii::app()->createUrl("user/update/", array("id"=>$data->username))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("user/delete/", array("id"=>$data->username))',
			)
		);
		$this->render('index', array(
			'models'=>$models,
			'gridDataProvider'=>$gridDataProvider,
			'gridColumns'=>$gridColumns,
			'user'=>$testSubject
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

class UserEntity {}