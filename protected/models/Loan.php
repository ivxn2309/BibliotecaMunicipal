<?php

/**
 * This is the model class for table "loan".
 *
 * The followings are the available columns in table 'loan':
 * @property string $loan_id
 * @property string $user
 * @property integer $book
 * @property string $start_date
 * @property string $end_date
 * @property integer $returned
 *
 * The followings are the available model relations:
 * @property User $user0
 * @property Book $book0
 */
class Loan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'loan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user, book, start_date, end_date, returned', 'required'),
			array('book, returned', 'numerical', 'integerOnly'=>true),
			array('user', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('loan_id, user, book, start_date, end_date, returned', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user0' => array(self::BELONGS_TO, 'User', 'user'),
			'book0' => array(self::BELONGS_TO, 'Book', 'book'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'loan_id' => 'Folio',
			'user' => 'Usuario',
			'book' => 'Libro',
			'start_date' => 'Fecha de Préstamo',
			'end_date' => 'Fecha de Entrega',
			'returned' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('loan_id',$this->loan_id,true);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('book',$this->book);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('returned',$this->returned);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Loan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
