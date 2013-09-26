<div id="user-ui" class="col-sm-10 usermanagementui-item">
	<div class="navbar-right">
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#EditModal"><?php echo Yii::t('Base', 'Add User'); ?></button>
       	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#DeleteModal"><?php echo Yii::t('Base', 'Delete User'); ?></button>
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
      			<th><input type="checkbox" class="global-checkbox"></th>
      			<th></th>
  	  			<th data-sort="user"><a><?php echo Yii::t('Base', 'User'); ?><span></span></a></th>
      			<th data-sort="name"><a><?php echo Yii::t('Base', 'Name'); ?><span></span></a></th>
      			<th data-sort="department"><a><?php echo Yii::t('Base', 'Department'); ?><span></span></a></th>
      			<th data-sort="position"><a><?php echo Yii::t('Base', 'Position'); ?><span></span></a></th>
      			<th data-sort="group"><a><?php echo Yii::t('Base', 'Group'); ?><span></span></a></th>
			</tr>
       	</thead>
		<tbody>
			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span data-toggle="modal" data-target="#EditModal" class="glyphicon glyphicon-pencil"></span></a><a><span data-toggle="modal" data-target="#DeleteModal" class="glyphicon glyphicon-remove"></span></a></td>
				<td>Ram</td>
				<td>Fengyihao</td>
      			<td>Network Manager</td>
      			<td>IT Dep</td>
      			<td>Administrator</td>
   			</tr>
   			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span data-toggle="modal" data-target="#EditModal" class="glyphicon glyphicon-pencil"></span></a><a><span data-toggle="modal" data-target="#DeleteModal" class="glyphicon glyphicon-remove"></span></a></td>
				<td>Ram</td>
				<td>Fengyihao</td>
      			<td>Network Manager</td>
      			<td>IT Dep</td>
      			<td>Administrator</td>
   			</tr>
   			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span data-toggle="modal" data-target="#EditModal" class="glyphicon glyphicon-pencil"></span></a><a><span data-toggle="modal" data-target="#DeleteModal" class="glyphicon glyphicon-remove"></span></a></td>
				<td>Ram</td>
				<td>Fengyihao</td>
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

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true" style="text-align:left;">
	<div class="modal-dialog">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title"><?php echo Yii::t('Base', 'Comfirm'); ?></h4>
        	</div>
        	<div class="modal-body">
          		<?php echo Yii::t('Base', 'Are you sure want to delete selected item/items?'); ?>
        	</div>
        	<div class="modal-footer">
            	<button type="button" class="btn btn-primary" id="delete-comfirm"><?php echo Yii::t('Base', 'Comfirm'); ?></button>
          		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>          		
        	</div>
      	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true" style="text-align:left;">
	<div class="modal-dialog">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title"><?php echo Yii::t('Base', 'Edit'); ?></h4>
        	</div>
        	<div class="modal-body">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>

        	</div>
        	<div class="modal-footer">
            	<button type="button" class="btn btn-primary" id="delete-comfirm"><?php echo Yii::t('Base', 'Save'); ?></button>
          		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>          		
        	</div>
      	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
			$(domEle).closest(".usermanagementui-item").attr('data-results', $(domEle).attr('data-results'));				
			$(domEle).closest(".resultnum-list").find(".result_num").html($(domEle).find("a").html());
		});
	}
});

$(".global-checkbox").bind('click', function(event) {
	if($(".global-checkbox").prop("checked"))
	{
		$(".global-checkbox").closest(".table-list").find("input[type='checkbox']").each(function(index, domEle){
			$(domEle).prop('checked', true);
		})
	}
	else
	{
		$(".global-checkbox").closest(".table-list").find("input[type='checkbox']").each(function(index, domEle){
			$(domEle).prop('checked', false);
		})
	}
});

$(".table-list tbody").find("input[type='checkbox']").each(function(index, domEle){	
	$(this).bind('click', function(event) {
		if($(".global-checkbox").prop("checked")) $(".global-checkbox").prop('checked', false);
	});
})
</script>
