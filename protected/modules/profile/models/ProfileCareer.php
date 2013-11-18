<?php

/**
 * This is the model class for table "tbl_profile_career".
 *
 * The followings are the available columns in table 'tbl_profile_career':
 * @property string $profile_uid
 * @property string $type
 * @property string $date_from
 * @property string $date_to
 * @property string $organization
 * @property string $remark
 */
class ProfileCareer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProfileCareer the static model class
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
		return 'tbl_profile_career';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profile_uid, date_from, date_to, organization', 'required'),
			array('profile_uid', 'length', 'max'=>32),
			array('type', 'length', 'max'=>8),
			array('organization', 'length', 'max'=>64),
			array('remark', 'length', 'max'=>512),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('profile_uid, type, date_from, date_to, organization, remark', 'safe', 'on'=>'search'),
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
			'type' => 'Type',
			'date_from' => 'Date From',
			'date_to' => 'Date To',
			'organization' => 'Organization',
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

		$criteria->compare('profile_uid',$this->profile_uid,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('date_from',$this->date_from,true);
		$criteria->compare('date_to',$this->date_to,true);
		$criteria->compare('organization',$this->organization,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}