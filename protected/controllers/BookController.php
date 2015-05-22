<?php

class BookController extends Controller
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
		$model=$this->loadModel($id);
		if($model->is_active == 0) {
			throw new CHttpException(402,'El libro solicitado fue borrado');
		}
		else {
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		}
		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Book;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Book']))
		{
			$model->attributes=$_POST['Book'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->book_id));
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

		if(isset($_POST['Book']) && Yii::app()->user->type === "1")
		{
			$model->attributes=$_POST['Book'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->book_id));
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
		//Se obtienen todos los registros de la tabla libros
		$models=Book::model()->findAll();
		$arreglo = array();
		$idx = 0;
		//Se recorre la lista de libros
		for($i=0;$i<sizeOf($models);$i++){
			//Si el libro se encuentra activo
			if($models[$i]->is_active == 1){
				//Se genera un objeto de tipo BookEntity con los atributos deseados
				$testBook = new BookEntity();
				$testBook->id=$idx;
				$testBook->book_id=$models[$i]->book_id;
				$testBook->signature=$models[$i]->signature;
				$testBook->title=$models[$i]->title;
				$testBook->author=$models[$i]->author;
				$testBook->volume=$models[$i]->volume;
				$testBook->copy=$models[$i]->copy;
				$testBook->classification=$models[$i]->classification;
				//El objeto es agregado a un segundo arreglo
				$arreglo[$idx++] = $testBook;
			}			
		}
		$testBook = new BookEntity();
		//Se genera un CArrayDataProvider a partir del nuevo arreglo
		$gridDataProvider = new CArrayDataProvider($arreglo);
		//Se definen las columnas y opciones
		$gridColumns = array(
			array('name'=>'id', 'header'=>'ID'),
			array('name'=>'signature', 'header'=>'Signatura'),
			array('name'=>'title', 'header'=>'Titulo'),
			array('name'=>'author', 'header'=>'Autor'),
			array('name'=>'volume', 'header'=>'Vol.'),
			array('name'=>'copy', 'header'=>'Ejemplar'),
			array('name'=>'classification', 'header'=>'Clasificacion'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
				'viewButtonUrl'=>'Yii::app()->createUrl("book/view/", array("id"=>$data->book_id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("book/update/", array("id"=>$data->book_id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("book/delete/", array("id"=>$data->book_id))',
			)
		);
		$this->render('index', array(
			'models'=>$models,
			'gridDataProvider'=>$gridDataProvider,
			'gridColumns'=>$gridColumns,
			'book'=>$testBook
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Book('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$model->attributes=$_GET['Book'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Book the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Book::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Book $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='book-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
class BookEntity {}