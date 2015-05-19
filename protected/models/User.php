<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $username
 * @property string $password
 * @property string $firstname
 * @property string $surnames
 * @property string $address
 * @property string $phone
 * @property integer $age
 * @property string $guarantor
 * @property string $email
 * @property integer $usertype
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property Loan[] $loans
 * @property Message[] $messages
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, firstname, surnames, usertype, is_active', 'required'),
			array('age, usertype, is_active', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			array('password, firstname, surnames, address, guarantor, email', 'length', 'max'=>100),
			array('phone', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('username, password, firstname, surnames, address, phone, age, guarantor, email, usertype, is_active', 'safe', 'on'=>'search'),
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
			'loans' => array(self::HAS_MANY, 'Loan', 'user'),
			'messages' => array(self::HAS_MANY, 'Message', 'user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'password' => 'Password',
			'firstname' => 'Firstname',
			'surnames' => 'Surnames',
			'address' => 'Address',
			'phone' => 'Phone',
			'age' => 'Age',
			'guarantor' => 'Guarantor',
			'email' => 'Email',
			'usertype' => 'Usertype',
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

		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('surnames',$this->surnames,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('guarantor',$this->guarantor,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('usertype',$this->usertype);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
