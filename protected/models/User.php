<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $uid
 * @property string $name
 * @property string $user_name
 * @property string $password
 * @property string $password_salt
 * @property integer $valid
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, real_name, user_name, password, password_salt', 'required'),
			array('valid', 'numerical', 'integerOnly'=>true),
			array('uid, real_name, user_name, password, password_salt, password_salt', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, real_name, user_name, password, password_salt, valid', 'safe', 'on'=>'search'),
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
			'department' => array(self::MANY_MANY, 'Department', 'tbl_user_department_position(user_uid, department_uid)'),
			'position' => array(self::MANY_MANY, 'Position', 'tbl_user_department_position(user_uid, position_uid)'),
			'group' => array(self::MANY_MANY, 'Group', 'tbl_user_group(user_uid, group_uid)'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'real_name' => 'Real Name',
			'user_name' => 'User Name',
			'password' => 'Password',
			'password_salt' => 'Password Salt',
			'valid' => 'Valid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('real_name',$this->real_name,true);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('password_salt',$this->password_salt,true);
		$criteria->compare('valid',$this->valid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function init()
	{
		if(!$this->password_salt) $this->password_salt = uniqid('',true);
	}
	
	public function validatePassword($password)
	{
		return md5($password.$this->password_salt)===$this->password;
	}
}