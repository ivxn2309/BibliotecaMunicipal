<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property string $signature
 * @property string $title
 * @property string $author
 * @property string $volume
 * @property string $copy
 * @property string $classification
 * @property string $image
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property Loan[] $loans
 * @property Recommendation[] $recommendations
 */
class Book extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('signature, title', 'required'),
			array('is_active', 'numerical', 'integerOnly'=>true),
			array('signature', 'length', 'max'=>20),
			array('title, author, copy, classification, image', 'length', 'max'=>100),
			array('volume', 'length', 'max'=>5),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('signature, title, author, volume, copy, classification, image, is_active', 'safe', 'on'=>'search'),
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
			'loans' => array(self::HAS_MANY, 'Loan', 'book'),
			'recommendations' => array(self::HAS_MANY, 'Recommendation', 'book'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'signature' => 'Signature',
			'title' => 'Title',
			'author' => 'Author',
			'volume' => 'Volume',
			'copy' => 'Copy',
			'classification' => 'Classification',
			'image' => 'Image',
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

		$criteria->compare('signature',$this->signature,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('volume',$this->volume,true);
		$criteria->compare('copy',$this->copy,true);
		$criteria->compare('classification',$this->classification,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}