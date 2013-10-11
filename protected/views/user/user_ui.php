<div id="user-ui" class="col-sm-10 usermanagement-ui ui-item">
	<div class="navbar-right">
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#EditModal"><?php echo Yii::t('Base', 'Add User'); ?></button>
       	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#DeleteModal"><?php echo Yii::t('Base', 'Delete User'); ?></button>
		<button type="button" class="btn btn-default"><?php echo Yii::t('Base', 'Refresh List'); ?></button>
		<div class="btn-group dropdown-list">
			<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string">10</span> <?php echo Yii::t('Base', 'Results / Page'); ?><span class="caret"></span></button>
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
				<td><a><span data-toggle="modal" data-id="524400ac0b72a5.33689761" data-target="#EditModal" class="glyphicon glyphicon-pencil"></span></a><a><span data-toggle="modal" data-target="#DeleteModal" class="glyphicon glyphicon-remove"></span></a></td>
				<td>Ram</td>
				<td>Fengyihao</td>
      			<td>Network Manager</td>
      			<td>IT Dep</td>
      			<td>Administrator</td>
   			</tr>
   			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span data-toggle="modal"  data-id="ISBN123456" data-target="#EditModal" class="glyphicon glyphicon-pencil"></span></a><a><span data-toggle="modal" data-target="#DeleteModal" class="glyphicon glyphicon-remove"></span></a></td>
				<td>Ram</td>
				<td>Fengyihao</td>
      			<td>Network Manager</td>
      			<td>IT Dep</td>
      			<td>Administrator</td>
   			</tr>
   			<tr>
      			<td><input type="checkbox"></td>
				<td><a><span data-toggle="modal"  data-id="ISBN565766" data-target="#EditModal" class="glyphicon glyphicon-pencil"></span></a><a><span data-toggle="modal" data-target="#DeleteModal" class="glyphicon glyphicon-remove"></span></a></td>
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

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-hidden="true" style="text-align:left;">
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
      	</div>
    </div>
</div>

<div class="modal fade" id="EditModal" data-link="<?php echo Yii::app()->createUrl('user/getuserdata'); ?>" tabindex="-1" role="dialog" aria-hidden="true" style="text-align:left;">
	<div class="modal-dialog">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title"><?php echo Yii::t('Base', 'User Edit'); ?></h4>
        	</div>
        	<div class="modal-body">
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'User Name'); ?></label>
    				<input data-name="user_name" type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'User Name'); ?>">
  				</div>
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'Password'); ?></label>
    				<input data-name="password" type="password" class="form-control" placeholder="<?php echo Yii::t('Base', 'Password'); ?>">
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Name'); ?></label>
    				<input data-name="name" type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'Name'); ?>">
  				</div>
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'Department'); ?></label>
    				<div class="btn-group btn-group-fullwidth dropdown-list" data-maxnum=5 data-type="preload" data-filter="" data-link="<?php echo Yii::app()->createUrl('department/getlist'); ?>" >
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string"></span><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu"></ul>
					</div>
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Position'); ?></label>
    				<div class="btn-group btn-group-fullwidth dropdown-list" data-maxnum=5 data-type="preload" data-filter="" data-link="<?php echo Yii::app()->createUrl('position/getlist'); ?>" >
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string"></span><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu"></ul>
					</div>
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Group'); ?></label>
    				<div class="btn-group btn-group-fullwidth dropdown-list" data-maxnum=5 data-type="preload" data-filter="" data-link="<?php echo Yii::app()->createUrl('group/getlist'); ?>" >
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string"></span><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu"></ul>
					</div>
  				</div>
        	</div>
        	<div class="modal-footer">
            	<button type="button" class="btn btn-primary" id="delete-comfirm"><?php echo Yii::t('Base', 'Save'); ?></button>
          		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo Yii::t('Base', 'Close'); ?></button>
        	</div>
      	</div>
    </div>
</div>

<script>
///////////     sort setting     ///////////
$("body").delegate(".ui-item table th[data-sort]", 'click', function(event) {
	$(this).closest("tr").find("th span").removeAttr("class");
	
	if($(this).closest("table").attr("data-sort") == $(this).attr('data-sort'))
	{
		$(this).closest("table").attr('data-sort', $(this).attr('data-sort') + ".desc");					
		$(this).find("span").addClass("caret");
	}
	else
	{
		$(this).closest("table").attr('data-sort', $(this).attr('data-sort'));					
		$(this).find("span").addClass("reversal-caret");
	}
});
///////////     end of sort setting     ///////////

///////////     pagenum setting     ///////////
/*
$("body").delegate(".resultnum-list li[data-results]", 'click', function(event) {
	$(this).closest(".ui-item").attr('data-results', $(this).attr('data-results'));	
	$(this).closest(".resultnum-list").find(".result_num").html($(this).find("a").html());	
});
*/
///////////     end of pagenum setting     ///////////

///////////     checkbox setting     ///////////
$("body").delegate(".table-list tbody input[type='checkbox']", 'click', function(event) {
	if($(this).closest(".table-list").find(".global-checkbox").prop("checked")) $(this).closest(".table-list").find(".global-checkbox").prop('checked', false);
});

$("body").delegate( ".global-checkbox", 'click', function(event) {
	if($(this).prop("checked"))
	{
		$(this).closest(".table-list").find("input[type='checkbox']").each(function(index, domEle){
			$(domEle).prop('checked', true);
		})
	}
	else
	{
		$(this).closest(".table-list").find("input[type='checkbox']").each(function(index, domEle){
			$(domEle).prop('checked', false);
		})
	}
});
///////////     end of checkbox setting     ///////////

///////////     modal setting     ///////////
$("body").delegate("[data-toggle='modal']", 'click', function(event) {
	$($(this).data('target')).attr('data-id', $(this).attr('data-id'));
});

$("body").delegate(".modal", "shown.bs.modal", function() {
	$(this).find(".dropdown-list[data-link]").filter("[data-type='preload']").trigger('loadlist.bs.dropdown');
	
	if($(this).attr('data-link'))
	{		
		if($(this).attr('data-id'))
		{
			$.ajax({
				type: "post",
   				url: $(this).attr('data-link'),
				data: "id=" + $(this).attr('data-id'),
				dataType: "json",
				error: function() {
					$.SmartNotification.Show("load data error");
				},
				success: function(data){
					if(data.result == "ok")
					{
						modal_obj = $(".modal[data-link*='" + data.url + "']");
					
						for(idx = 0; idx < data.list.length; idx++)
						{						
							modal_obj.find("[data-name='" + data.list[idx].data_name + "']").val(data.list[idx].data_value);
						}
					}
					else
					{
						$.SmartNotification.Show("load data fail");
					}
					
				}
			});
		}
		else
		{
			$(this).find('.dropdown-string').html('<?php echo Yii::t('Base', 'Please Select A Value'); ?>');	
		}		
	}
});

$("body").delegate(".modal", "hidden.bs.modal", function() {
	$(this).attr('data-id', '');
	$(this).find('input').val('');	
	$(this).find('.dropdown-string').html('');	
	$(this).find('.dropdown-list').attr('data-results', '');	
});
///////////     end of modal setting     ///////////


///////////     dropdown list setting     ///////////
$("body").delegate(".dropdown-menu li", 'click.bs.dropdown.data-api', function(){
	if(($(this).attr('data-type') == 'filter') || ($(this).attr('data-type') == 'more')) return false;
});

$("body").delegate(".dropdown-list", 'refresh.bs.dropdown', function(){
	if($(this).attr('data-type') == 'preload')
	{
		$(this).find("li[data-results]").show();
		$(this).find("li[data-type='filter']").hide();
		$(this).find("li[data-type='more']").hide();
		
		if($(this).attr('data-filter').length > 0)
		{			
			for(idx = 0; idx < $(this).find("li[data-results]").length; idx++)
			{
				if($(this).find("li[data-results] a").eq(idx).html().toLowerCase().indexOf($(this).attr('data-filter').toLowerCase()) == -1)
				{
					$(this).find("li[data-results]").eq(idx).hide();
				}
			} 
		}	
		
		if($(this).attr('data-more') == "false")
		{
			if( $(this).attr('data-maxnum') < $(this).find("li[data-results]:visible").length )
			{
				if($(this).find("li[data-type='filter']").length == 0) $(this).find(".dropdown-menu").prepend('<li data-type="filter"><a><input type="text"class="form-control" placeholder="<?php echo Yii::t('Base', 'Filter'); ?>"></a></li>');
				
				if($(this).find("li[data-type='more']").length == 0) $(this).find(".dropdown-menu").append('<li data-type="more" class="dropdownlist-more"><?php echo Yii::t('Base', 'Show All'); ?></li>');
				
				show_num = 0;
				
				for(idx = 0; idx < $(this).find("li[data-results]").length; idx++)
				{
					if( $(this).find("li[data-results]").eq(idx).is(":visible") )
					{
						if(	show_num >= $(this).attr('data-maxnum'))
						{
							$(this).find("li[data-results]").eq(idx).hide();
						}
						else
						{
							show_num++;
						}						
					}
				}
				
				$(this).find("li[data-type='filter']").show();
				$(this).find("li[data-type='more']").show();
			}
			else
			{
				$(this).find("li[data-type='filter']").show();
			}
		}
	}
	else
	{
		$.SmartNotification.Show("================= realtime part =================");	
	}
});

$("body").delegate(".dropdown-list", 'shown.bs.dropdown', function(){
	$(this).attr('data-more', 'false');
	$(this).attr('data-filter', '');
	$(this).find("li[data-type='filter'] input").val("");
	
	$(this).trigger('refresh.bs.dropdown');
});

$("body").delegate(".dropdown-list li[data-results]", 'click', function(event) {
	$(this).closest(".dropdown-list").attr('data-results', $(this).attr('data-results'));	
	$(this).closest(".dropdown-list").find(".dropdown-string").html($(this).find("a").html());	
});

$("body").delegate(".dropdown-list li[data-type='more']", 'click', function(event) {
	$(this).closest(".dropdown-list").attr('data-more', 'true');
	$(this).closest(".dropdown-list").trigger('refresh.bs.dropdown');
});

$("body").delegate(".dropdown-list li[data-type='filter']", 'keyup', function(event) {	
	if (event.keyCode == "13")
	{
		$(this).closest(".dropdown-list").attr('data-filter', $(this).closest(".dropdown-list").find("li[data-type='filter'] input").val());
		$(this).closest(".dropdown-list").trigger('refresh.bs.dropdown');
	}
});

$("body").delegate(".dropdown-list", 'loadlist.bs.dropdown', function(event) {
	$.ajax({
		type: "get",
   		url: $(this).attr('data-link'),
		dataType: "json",
		error: function() {
			$.SmartNotification.Show("error loadlist");
		},
		success: function(data){
			if(data.result == "ok")
			{				
				list_obj = $(".dropdown-list[data-link*='" + data.url + "']").find(".dropdown-menu");
				list_obj.empty();
				
				for(idx = 0; idx < data.list.length; idx++)
				{
					list_obj.append('<li data-results="' + data.list[idx].value + '"><a>' + data.list[idx].string + '</a></li>');
				}
			}
			else
			{
				$.SmartNotification.Show("loadlist fail");
			}
		}
	});	
});



//$(".dropdown-list[data-link]").trigger('loadlist.bs.dropdown');
///////////     end of dropdown list setting     ///////////



</script>
