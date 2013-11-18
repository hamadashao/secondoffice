<?php

/**
 * This is the model class for table "tbl_profile".
 *
 * The followings are the available columns in table 'tbl_profile':
 * @property string $uid
 * @property string $user_uid
 * @property string $name
 * @property string $photo
 * @property string $sex
 * @property string $birthday
 * @property string $hometown
 * @property string $education
 * @property string $work_phone
 * @property string $mobie_phone
 * @property string $email
 * @property string $remark
 */
class Profile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profile the static model class
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
		return 'tbl_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, name, birthday', 'required'),
			array('uid, user_uid, name, photo, hometown, education, work_phone, mobie_phone, email', 'length', 'max'=>32),
			array('sex', 'length', 'max'=>1),
			array('remark', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, user_uid, name, photo, sex, birthday, hometown, education, work_phone, mobie_phone, email, remark', 'safe', 'on'=>'search'),
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
			'career' => array(self::HAS_MANY, 'ProfileCareer', 'profile_uid'),
			'companyrecord' => array(self::HAS_MANY, 'ProfileCompanyRecord', 'profile_uid'),
			'user' => array(self::BELONGS_TO, 'User', 'user_uid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uid' => 'Uid',
			'user_uid' => 'User Uid',
			'name' => 'Name',
			'photo' => 'Photo',
			'sex' => 'Sex',
			'birthday' => 'Birthday',
			'hometown' => 'Hometown',
			'education' => 'Education',
			'work_phone' => 'Work Phone',
			'mobie_phone' => 'Mobie Phone',
			'email' => 'Email',
			'remark' => 'Remark',
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
		$criteria->compare('user_uid',$this->user_uid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('photo',$this->photo,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('hometown',$this->hometown,true);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('work_phone',$this->work_phone,true);
		$criteria->compare('mobie_phone',$this->mobie_phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}