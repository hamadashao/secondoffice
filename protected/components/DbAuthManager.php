<?php
/**
 * CDbAuthManager class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CDbAuthManager represents an authorization manager that stores authorization information in database.
 *
 * The database connection is specified by {@link connectionID}. And the database schema
 * should be as described in "framework/web/auth/*.sql". You may change the names of
 * the three tables used to store the authorization data by setting {@link itemTable},
 * {@link itemChildTable} and {@link assignmentTable}.
 *
 * @property array $authItems The authorization items of the specific type.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CDbAuthManager.php 3515 2011-12-28 12:29:24Z mdomba $
 * @package system.web.auth
 * @since 1.0
 */
class DbAuthManager extends CDbAuthManager
{
	public $itemTable='tbl_auth_item';
	public $itemChildTable='tbl_auth_item_child';
	public $assignmentTable='tbl_auth_assignment';	
}
