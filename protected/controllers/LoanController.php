<?php

class LoanController extends Controller
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
		$model=new Loan;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Loan']) && Yii::app()->user->type === "1")
		{
			$model->attributes=$_POST['Loan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->loan_id));
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

		if(isset($_POST['Loan']) && Yii::app()->user->type === "1")
		{
			$model->attributes=$_POST['Loan'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->loan_id));
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
			$model->returned = 1;
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
		//Se obtienen todos los registros de la tabla prestamos
		$models=Loan::model()->findAll();
		$arreglo = array();
		$idx = 0;
		//Se recorre la lista de libros
		for($i=0;$i<sizeOf($models);$i++){
			//Si el libro se encuentra activo
			if($models[$i]->returned == 0){
				//Se obtienen los objetos foraneos
				$usr = User::model()->findByPk($models[$i]->user);
				$lib = Book::model()->findByPk($models[$i]->book);
				//Se genera un objeto de tipo BookEntity con los atributos deseados
				$testLoan = new LoanEntity();
				$testLoan->id=$idx;
				$testLoan->loan_id=$models[$i]->loan_id;
				$testLoan->user=$usr->firstname." ".$usr->surnames;
				$testLoan->book=$lib->title.", ". $lib->author;
				$testLoan->start_date=$models[$i]->start_date;
				$testLoan->end_date=$models[$i]->end_date;
				//El objeto es agregado a un segundo arreglo
				$arreglo[$idx++] = $testLoan;
			}			
		}
		$testLoan = new LoanEntity();
		//Se genera un CArrayDataProvider a partir del nuevo arreglo
		$gridDataProvider = new CArrayDataProvider($arreglo);
		//Se definen las columnas y opciones
		$gridColumns = array(
			array('name'=>'id', 'header'=>'ID'),
			array('name'=>'user', 'header'=>'Usuario'),
			array('name'=>'book', 'header'=>'Libro'),
			array('name'=>'start_date', 'header'=>'Fecha de Préstamo'),
			array('name'=>'end_date', 'header'=>'Fecha de devolución.'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
				'viewButtonUrl'=>'Yii::app()->createUrl("loan/view/", array("id"=>$data->loan_id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("loan/update/", array("id"=>$data->loan_id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("loan/delete/", array("id"=>$data->loan_id))',
			)
		);
		$this->render('index', array(
			'models'=>$models,
			'gridDataProvider'=>$gridDataProvider,
			'gridColumns'=>$gridColumns,
			'book'=>$testLoan
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Loan('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Loan']))
			$model->attributes=$_GET['Loan'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Loan the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Loan::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Loan $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='loan-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
class LoanEntity {}