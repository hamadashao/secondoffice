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
class ProfileStaff extends CActiveRecord
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
			'profile' => array(self::HAS_ONE, 'Profile', 'user_uid'),
			'profile2' => array(self::HAS_ONE, 'Profile', 'user_uid'),
			'career' => array(self::HAS_MANY, 'ProfileCareer', array('uid'=>'profile_uid'), 'through'=>'profile'),
			'companyrecord' => array(self::HAS_MANY, 'ProfileCompanyRecord', array('uid'=>'profile_uid'), 'through'=>'profile2'),
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
}