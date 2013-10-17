<div id="panel-group">
	<div class="navbar-right">
		<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Add User'); ?></button>
       	<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Delete User'); ?></button>
		<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Refresh List'); ?></button>
		<div class="btn-group">
			<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><?php echo Yii::t('Base', 'Results / Page'); ?><span class="caret" style="margin-left:5px;"></span></button>
			<ul class="dropdown-menu" role="menu">
				<li><a>10</a></li>
				<li><a>20</a></li>
				<li><a>50</a></li>
				<li><a><?php echo Yii::t('Base', 'All'); ?></a></li>
			</ul>
		</div>
	</div>
   	<div class="navbar-right" style="margin-right:20px;">
   		<input type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'Search'); ?>">
   	</div>
   	<table class="table table-list">
		<thead class="tablehead-list">
   			<tr>
      			<th><input type="checkbox"></th>
      			<th></th>
  	  			<th><a><?php echo Yii::t('Base', 'User'); ?><span class="reversal-caret"></span></a></th>
      			<th><a><?php echo Yii::t('Base', 'Name'); ?></a></th>
      			<th><a><?php echo Yii::t('Base', 'Email'); ?></a></th>
      			<th><a><?php echo Yii::t('Base', 'Work Phone'); ?></a></th>
      			<th><a><?php echo Yii::t('Base', 'Mobie Phone'); ?></a></th>
      			<th><a><?php echo Yii::t('Base', 'Department'); ?></a></th>
      			<th><a><?php echo Yii::t('Base', 'Position'); ?></a></th>
      			<th><a><?php echo Yii::t('Base', 'Group'); ?></a></th>
			</tr>
       	</thead>
		<tbody>
			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span class="glyphicon glyphicon-pencil"></span></a><a><span class="glyphicon glyphicon-remove"></span></a></td>
				<td>Ram</td>
				<td>Fengyihao</td>
				<td>ram@welon-cn.com</td>
      			<td>28350192</td>
      			<td>13642713467</td>
      			<td>Network Manager</td>
      			<td>IT Dep</td>
      			<td>Administrator</td>
   			</tr>
   			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span class="glyphicon glyphicon-pencil"></span></a><a><span class="glyphicon glyphicon-remove"></span></a></td>
				<td>Ram</td>
				<td>Fengyihao</td>
				<td>ram@welon-cn.com</td>
      			<td>28350192</td>
      			<td>13642713467</td>
      			<td>Network Manager</td>
      			<td>IT Dep</td>
      			<td>Administrator</td>
   			</tr>
   			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span class="glyphicon glyphicon-pencil"></span></a><a><span class="glyphicon glyphicon-remove"></span></a></td>
				<td>Ram</td>
				<td>Fengyihao</td>
				<td>ram@welon-cn.com</td>
      			<td>28350192</td>
      			<td>13642713467</td>
      			<td>Network Manager</td>
      			<td>IT Dep</td>
      			<td>Administrator</td>
   			</tr>
		</tbody>
	</table>
   	<ul class="pagination pagination-sm">
       <li><a>&laquo;</a></li>
       <li><a>1</a></li>
       <li><a>2</a></li>
   		<li><a>&raquo;</a></li>
	</ul>   
</div>
