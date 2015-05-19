<?php

/**
 * This is the model class for table "recommendation".
 *
 * The followings are the available columns in table 'recommendation':
 * @property string $recom_id
 * @property integer $book
 * @property string $start_date
 * @property string $recom_author
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property Book $book0
 */
class Recommendation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'recommendation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('book, start_date, is_active', 'required'),
			array('book, is_active', 'numerical', 'integerOnly'=>true),
			array('recom_author', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('recom_id, book, start_date, recom_author, is_active', 'safe', 'on'=>'search'),
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
			'book0' => array(self::BELONGS_TO, 'Book', 'book'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'recom_id' => 'Recom',
			'book' => 'Book',
			'start_date' => 'Start Date',
			'recom_author' => 'Recom Author',
			'is_active' => 'Is Active',
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

		$criteria->compare('recom_id',$this->recom_id,true);
		$criteria->compare('book',$this->book);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('recom_author',$this->recom_author,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Recommendation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
