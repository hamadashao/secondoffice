<div id="user-ui" class="col-sm-10 usermanagementui-item">
	<div class="navbar-right">
		<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Add User'); ?></button>
       	<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Delete User'); ?></button>
		<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Refresh List'); ?></button>
		<div class="btn-group resultnum-list">
			<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="result_num">10</span> <?php echo Yii::t('Base', 'Results / Page'); ?><span class="caret" style="margin-left:5px;"></span></button>
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
      			<th><input type="checkbox"></th>
      			<th></th>
  	  			<th data-sort="user"><a><?php echo Yii::t('Base', 'User'); ?><span></span></a></th>
      			<th data-sort="name"><a><?php echo Yii::t('Base', 'Name'); ?><span></span></a></th>
      			<th data-sort="email"><a><?php echo Yii::t('Base', 'Email'); ?><span></span></a></th>
      			<th data-sort="phone"><a><?php echo Yii::t('Base', 'Work Phone'); ?><span></span></a></th>
      			<th data-sort="mobie"><a><?php echo Yii::t('Base', 'Mobie Phone'); ?><span></span></a></th>
      			<th data-sort="department"><a><?php echo Yii::t('Base', 'Department'); ?><span></span></a></th>
      			<th data-sort="position"><a><?php echo Yii::t('Base', 'Position'); ?><span></span></a></th>
      			<th data-sort="group"><a><?php echo Yii::t('Base', 'Group'); ?><span></span></a></th>
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
<script>
$('#user-ui th').each(function(index, domEle){
	if($(domEle).attr('data-sort'))
	{		
		$(this).bind('click', {msg: $(domEle).attr('data-sort')}, function(event) {
			$('.tablehead-list span').removeAttr("class");
			
			if($(domEle).closest(".usermanagementui-item").attr("data-sort") == $(domEle).attr('data-sort'))
			{
				$(domEle).closest(".usermanagementui-item").attr('data-sort', $(domEle).attr('data-sort') + ".desc");					
				$(domEle).find("span").addClass("caret");
			}
			else
			{
				$(domEle).closest(".usermanagementui-item").attr('data-sort', $(domEle).attr('data-sort'));					
				$(domEle).find("span").addClass("reversal-caret");
			}
		});
	}
});

$('.resultnum-list li').each(function(index, domEle){
	if($(domEle).attr('data-results'))
	{		
		$(this).bind('click', {msg: $(domEle).attr('data-results')}, function(event) {
			/*
					
			if($(domEle).closest(".usermanagementui-item").attr("data-sort") == $(domEle).attr('data-sort'))
			{
				$(domEle).closest(".usermanagementui-item").attr('data-sort', $(domEle).attr('data-sort') + ".desc");					
				$(domEle).find("span").addClass("caret");
			}
			else
			{
				$(domEle).closest(".usermanagementui-item").attr('data-sort', $(domEle).attr('data-sort'));					
				$(domEle).find("span").addClass("reversal-caret");
			}
			*/
			
			$(domEle).closest(".usermanagementui-item").attr('data-results', $(domEle).attr('data-results'));	
			
			$(domEle).closest(".resultnum-list").find(".result_num").html($(domEle).find("a").html());
		});
	}
}); 
</script>
