<?php

class ActiveRecordLogableBehavior extends CActiveRecordBehavior
{
    private $_oldattributes = array();
 
    public function afterSave($event)
    {
		$newattributes = $this->Owner->getAttributes();
		
        if (!$this->Owner->isNewRecord) { 
			Yii::log('user update', CLogger::LEVEL_INFO, 'event.data.update');
			           
            $oldattributes = $this->getOldAttributes();
 
            foreach ($newattributes as $name => $value) 
			{
                if (!empty($oldattributes)) 
				{
                    $old = $oldattributes[$name];
                } 
				else 
				{
                    $old = '';
                }
 
                if ($value != $old) 
				{ 
                    $log = new LogDetail;
					
					$log->log_uid			= Yii::app()->user->getState('log_uid');
					$log->model_name		= get_class($this->Owner);
					$log->model_primarykey	= $this->Owner->getPrimaryKey();
					$log->action			= 'CHANGE';
					$log->field				= $this->Owner->getAttributeLabel($name);
					$log->value_now			= $newattributes[$name];
					$log->value_original	= $old;
					
                    $log->save();
                }
            }
        } 
		else 
		{
			Yii::log('user create', CLogger::LEVEL_INFO, 'event.data.create');
			
            foreach ($newattributes as $name => $value) 
			{
                $log = new LogDetail;
					
				$log->log_uid			= Yii::app()->user->getState('log_uid');
				$log->model_name		= get_class($this->Owner);
				$log->model_primarykey	= $this->Owner->getPrimaryKey();
				$log->action			= 'CREATE';
				$log->field				= $this->Owner->getAttributeLabel($name);
				$log->value_now			= $newattributes[$name];
					
                $log->save();
            }
        }
    }
 
    public function afterDelete($event)
    {
		Yii::log('user delete', CLogger::LEVEL_INFO, 'event.data.delete');
	
        $log = new LogDetail;
		
        $log->log_uid			= Yii::app()->user->getState('log_uid');
	    $log->model_name		= get_class($this->Owner);
		$log->model_primarykey	= $this->Owner->getPrimaryKey();
		$log->action			= 'DELETE';
		
        $log->save();
    }
 
    public function afterFind($event)
    {
        $this->setOldAttributes($this->Owner->getAttributes());
    }
 
    public function getOldAttributes()
    {
        return $this->_oldattributes;
    }
 
    public function setOldAttributes($value)
    {
        $this->_oldattributes=$value;
    }
}
?>