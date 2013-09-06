<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class DbEventLogRoute extends CDbLogRoute
{
	public $logTableName='tbl_log';
	
	protected function createLogTable($db,$tableName)
	{
		$driver=$db->getDriverName();
		if($driver==='mysql')
			$logID='uid VARCHAR(32) NOT NULL PRIMARY KEY';
		else if($driver==='pgsql')
			$logID='uid VARCHAR(32) PRIMARY KEY';
		else
			$logID='uid VARCHAR(32) NOT NULL PRIMARY KEY';

		$sql="
CREATE TABLE $tableName
(
	$logID,
	category VARCHAR(128),
	ip VARCHAR(32),
	user VARCHAR(32),
	logtime TIMESTAMP,
	message TEXT
)";
		$db->createCommand($sql)->execute();
	}
	
	protected function processLogs($logs)
	{
		$sql="
INSERT INTO {$this->logTableName}
(uid, category, ip, user, message) VALUES
(:uid, :category, :ip, :user, :message)
";
		$command=$this->getDbConnection()->createCommand($sql);
		foreach($logs as $log)
		{
			$command->bindValue(':uid', uniqid('',true));
			$command->bindValue(':ip', CHttpRequest::getUserHostAddress());
			$command->bindValue(':user', Yii::app()->user->name);
			$command->bindValue(':category',$log[2]);
			$command->bindValue(':message',$log[0]);
			$command->execute();
		}
	}
}