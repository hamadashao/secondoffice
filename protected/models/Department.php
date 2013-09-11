<?php

/**
 * This is the model class for table "tbl_department".
 *
 * The followings are the available columns in table 'tbl_department':
 * @property string $uid
 * @property string $parentuid
 * @property string $name
 * @property integer $valid
 */
class Department extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Department the static model class
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
		return 'tbl_department';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, name', 'required'),
			array('valid', 'numerical', 'integerOnly'=>true),
			array('uid, parentuid, name', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('uid, parentuid, name, valid', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'parentuid' => '001',
			'name' => '002',
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
		$criteria->compare('parentuid',$this->parentuid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('valid',$this->valid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function behaviors()
	{
    	return array(
        // Classname => path to Class
        	'ActiveRecordLogableBehavior'=>
            'application.models.ActiveRecordLogableBehavior',
    	);
	}
}