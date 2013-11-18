<?php

/**
 * This is the model class for table "tbl_profile_companyrecord".
 *
 * The followings are the available columns in table 'tbl_profile_companyrecord':
 * @property string $profile_uid
 * @property string $eventtype_uid
 * @property string $event_date
 */
class ProfileCompanyRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProfileCompanyRecord the static model class
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
		return 'tbl_profile_companyrecord';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profile_uid, eventtype_uid, event_date', 'required'),
			array('profile_uid, eventtype_uid', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('profile_uid, eventtype_uid, event_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'profile_uid' => 'Profile Uid',
			'eventtype_uid' => 'Eventtype Uid',
			'event_date' => 'Event Date',
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

		$criteria->compare('profile_uid',$this->profile_uid,true);
		$criteria->compare('eventtype_uid',$this->eventtype_uid,true);
		$criteria->compare('event_date',$this->event_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}