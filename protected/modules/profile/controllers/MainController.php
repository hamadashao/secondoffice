<?php

class MainController extends Controller
{
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('getstaffpanel','getreservepanel','getstafflist'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	
	
	public function actionGetStaffPanel() 
	{
		$this->render('staff_panel');
	}
	
	public function actionGetReservePanel() 
	{
		$this->render('reserve_panel');
	}
	
	public function actionGetStaffList() 
	{
		$filter = "";
		$condition = "";
		$items = "";
		$page = 1;
		$page_num = intval($_POST['page_num']);
		$sort = "t.uid desc";
		
		if($_POST['items']) 	$items = $_POST['items'];
		if($_POST['filter']) 	$filter = $_POST['filter'];
		if($_POST['condition']) $condition = $_POST['condition'];
		if($_POST['page']) 		$page = intval($_POST['page']);
		if($_POST['sort']) 		$sort = $_POST['sort'];		
		
		$criteria = new CDbCriteria;
		$criteria->with  = array('department','position','group','profile','career','companyrecord');
		$criteria->together = true;
		
		$item_array = explode(',', $items);
		
		if($filter)
		{
			foreach($item_array as $item_data)		
			{
				switch ($item_data) {						
					case 'profile.birthday':
						if(preg_match("/\w/i",$filter))
						{
							$criteria->addSearchCondition($item_data, $filter, true, 'OR');
						}
						break;
						
					case 'career':
						if(preg_match("/\w/i",$filter))
						{
							$criteria->addSearchCondition('career.date_from', $filter, true, 'OR');
							$criteria->addSearchCondition('career.date_to', $filter, true, 'OR');
						}
						else
						{
							$criteria->addSearchCondition('career.organization', $filter, true, 'OR');
							$criteria->addSearchCondition('career.remark', $filter, true, 'OR');
						}
						break;
						
					case 'companyrecord':
						$criteria->addSearchCondition('companyrecord.event_detail', $filter, true, 'OR');
						break;
					
					case 'photo':
						break;
						
    				default:
       					$criteria->addSearchCondition($item_data, $filter, true, 'OR');
						break;
				}
			}		
		}
		elseif($condition)
		{
			$condition_array = explode(',', $condition);
			
			foreach($condition_array as $condition_data)		
			{
				$condition_data_items = explode(':', $condition_data);
				
				switch ($condition_data_items[1]) {
					case 'include':
						$criteria->addSearchCondition($condition_data_items[0], $condition_data_items[2], true, 'AND');
						break;
						
					case 'exclude':
						$criteria->addSearchCondition($condition_data_items[0], $condition_data_items[2], true, 'AND', 'NOT LIKE');
						break;
						
					case 'greater':
						$criteria->addCondition($condition_data_items[0]." > '".$condition_data_items[2]."'");
						break;
						
					case 'smaller':
						$criteria->addCondition($condition_data_items[0]." < '".$condition_data_items[2]."'");
						break;
						
					case 'equal':
						$criteria->addCondition($condition_data_items[0]." = '".$condition_data_items[2]."'");
						break;
						
					case 'between':
						$criteria->addBetweenCondition($condition_data_items[0], $condition_data_items[2], $condition_data_items[3]);
						break;
				}
			}
		}
		
		$criteria->addcondition("t.valid = 1");
		
		$items_num = ProfileStaff::model()->count($criteria);
		
		if($page_num > 0) $criteria->limit	= $page_num;
		$criteria->offset 	= $page_num * ($page - 1);
		$criteria->order 	= $sort;
		$criteria->group 	= "t.uid";
		
		$staffs = ProfileStaff::model()->findAll($criteria);		
		
		$tool_view = 
					"data-toggle='modal' ".
					"data-link='".Yii::app()->createUrl('profile/main/getviewdialog')."' ".
					"data-target='#modal-main' ".
					"data-modal='#modal-profileview' ".
					"class='glyphicon glyphicon-search' ";
					 
		$tool_edit = 
					"data-toggle='modal' ".
					"data-link='".Yii::app()->createUrl('profile/main/geteditdialog')."' ".
					"data-target='#modal-main' ".
					"data-modal='#modal-profileedit' ".
					"class='glyphicon glyphicon-pencil' ";
					 
		$tools = '["'.$tool_view.'","'.$tool_edit.'"]';
					
		$staff_list = "";	
		
		foreach($staffs as $staff)		
		{			
			$data_array = array();
			
			foreach($item_array as $item_data)
			{
				$data_str = "";
				$sort_array = array();
				
				switch ($item_data) {
					case 't.real_name':
						array_push($data_array, $staff->real_name);
						break;
					
					case 'profile.sex':
						array_push($data_array, is_null($staff->profile)?"":$staff->profile->sex);
						break;
						
					case 'department.name':
						array_push($data_array, is_null($staff->department[0])?"":$staff->department[0]->name);
						break;
						
					case 'position.name':
						array_push($data_array, is_null($staff->position[0])?"":$staff->position[0]->name);
						break;
						
					case 'profile.email':
						array_push($data_array, is_null($staff->profile)?"":$staff->profile->email);
						break;
						
					case 'profile.work_phone':
						array_push($data_array, is_null($staff->profile)?"":$staff->profile->work_phone);
						break;
						
					case 'profile.birthday':
						array_push($data_array, is_null($staff->profile)?"":$staff->profile->birthday);
						break;
						
					case 'profile.hometown':
						array_push($data_array, is_null($staff->profile)?"":$staff->profile->hometown);
						break;
						
					case 'profile.mobie_phone':
						array_push($data_array, is_null($staff->profile)?"":$staff->profile->mobie_phone);
						break;
						
					case 'profile.remark':
						array_push($data_array, is_null($staff->profile)?"":$staff->profile->remark);
						break;
						
					case 'career':
						if($staff->profile)
						{
							if(count($staff->profile->career))
							{
								$careers = $staff->profile->career;
								foreach($careers as $career => $row)
								{
									$sort_array[$career]  = $row->date_from;
								}
								
								array_multisort($sort_array, SORT_DESC, $careers);
								
								foreach($careers as $career)
								{
									$data_str = $data_str.'<tr><td>'.$career->date_from.' - '.$career->date_to.'</td><td>'.$career->organization.'</td><td>'.$career->remark.'<td></tr>';
								}
							}
						}
						array_push($data_array, '<table class="table_no_border">'.$data_str.'</table>');
						break;
						
					case 'companyrecord':
						array_push($data_array, '<table class="table_no_border">'.$data_str.'</table>');
						break;
						
					case 'photo':
						array_push($data_array, is_null($staff->profile)?"":'<img class="profile_list_photo" src="'.$staff->profile->photo.'" />');
						break;
				}
			}
			
		
			if($staff_list)
			{
				$staff_list = $staff_list.',{
				"id":"'.$staff->uid.'",
				"data":'.json_encode($data_array).'
				}';
			}
			else
			{
				$staff_list = '{
				"id":"'.$staff->uid.'",
				"data":'.json_encode($data_array).'
				}';
			}
		}	
		
		echo '{"result":"ok","item_page":"'.$page.'","item_pagenum":"'.$page_num.'","item_num":"'.$items_num.'","checkbox":"yes","tools":'.$tools.',"list":['.$staff_list.']}';
		Yii::app()->end();
	}
}