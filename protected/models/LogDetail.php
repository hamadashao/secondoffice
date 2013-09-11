<?php

/**
 * This is the model class for table "tbl_log_detail".
 *
 * The followings are the available columns in table 'tbl_log_detail':
 * @property integer $id
 * @property string $log_uid
 * @property string $model_name
 * @property string $model_primarykey
 * @property string $action
 * @property string $field
 * @property string $value_now
 * @property string $value_original
 */
class LogDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LogDetail the static model class
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
		return 'tbl_log_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_uid, model_name, model_primarykey, action', 'required'),
			array('log_uid, model_name, model_primarykey', 'length', 'max'=>32),
			array('action', 'length', 'max'=>16),
			array('field', 'length', 'max'=>64),
			array('value_now, value_original', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, log_uid, model_name, model_primarykey, action, field, value_now, value_original', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'log_uid' => 'Log Uid',
			'model_name' => 'Model Name',
			'model_primarykey' => 'Model Primarykey',
			'action' => 'Action',
			'field' => 'Field',
			'value_now' => 'Value Now',
			'value_original' => 'Value Original',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('log_uid',$this->log_uid,true);
		$criteria->compare('model_name',$this->model_name,true);
		$criteria->compare('model_primarykey',$this->model_primarykey,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('field',$this->field,true);
		$criteria->compare('value_now',$this->value_now,true);
		$criteria->compare('value_original',$this->value_original,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}