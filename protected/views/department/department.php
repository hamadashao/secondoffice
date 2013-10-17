<div id="panel-department">
	<div class="navbar-right">
		<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Add Department'); ?></button>
       	<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Delete Department'); ?></button>
		<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Refresh List'); ?></button>
		<div class="btn-group resultnum-list">
			<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="result_num">10</span> <?php echo Yii::t('Base', 'Results / Page'); ?><span class="caret"></span></button>
			<ul class="dropdown-menu" role="menu">
				<li data-results="10"><a>10</a></li>
				<li data-results="20"><a>20</a></li>
				<li data-results="50"><a>50</a></li>
				<li data-results="0"><a><?php echo Yii::t('Base', 'All'); ?></a></li>
			</ul>
		</div>
	</div>
   	<div class="navbar-right" style="margin-right:20px;">
   		<input type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'Search'); ?>">
   	</div>
   	<table class="table table-list">
		<thead class="tablehead-list">
   			<tr>
      			<th><input type="checkbox" class="global-checkbox"></th>
      			<th></th>
  	  			<th data-sort="department"><a><?php echo Yii::t('Base', 'Department Name'); ?><span></span></a></th>
      			<th data-sort="parent"><a><?php echo Yii::t('Base', 'Parent Department'); ?><span></span></a></th>
			</tr>
       	</thead>
		<tbody>
			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span class="glyphicon glyphicon-pencil"></span></a><a><span class="glyphicon glyphicon-remove"></span></a></td>
				<td>IT</td>
				<td>CEO Office</td>
   			</tr>
   			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span class="glyphicon glyphicon-pencil"></span></a><a><span class="glyphicon glyphicon-remove"></span></a></td>
				<td>Dep 1</td>
				<td>CEO Office</td>
   			</tr>
   			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span class="glyphicon glyphicon-pencil"></span></a><a><span class="glyphicon glyphicon-remove"></span></a></td>
				<td>Dep 2</td>
				<td>CEO Office</td>
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
