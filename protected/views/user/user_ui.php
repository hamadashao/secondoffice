<div id="user-ui" class="col-sm-10 usermanagement-ui ui-item">
	<div class="navbar-right">
		<button type="button" class="btn btn-default" data-id="" data-toggle="modal" data-target="#EditModal"><?php echo Yii::t('Base', 'Add User'); ?></button>
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
				<td><a><span data-toggle="modal" data-id="ISBN564541" data-target="#EditModal" class="glyphicon glyphicon-pencil"></span></a><a><span data-toggle="modal" data-target="#DeleteModal" class="glyphicon glyphicon-remove"></span></a></td>
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

<div class="modal fade" id="EditModal" data-link="<?php echo Yii::app()->createUrl('user/getuserdata'); ?>" data-url="getuserdata" tabindex="-1" role="dialog" aria-hidden="true" style="text-align:left;">
	<div class="modal-dialog">
		<div class="modal-content">
        	<div class="modal-header">
          		<h4 class="modal-title"><?php echo Yii::t('Base', 'User Edit'); ?></h4>
        	</div>
        	<div class="modal-body">
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'User Name'); ?></label>
    				<input type="text" class="form-control" placeholder="<?php echo Yii::t('Base', 'User Name'); ?>">
  				</div>
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'Password'); ?></label>
    				<input type="password" class="form-control" placeholder="<?php echo Yii::t('Base', 'Password'); ?>">
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Name'); ?></label>
    				<input type="password" class="form-control" placeholder="<?php echo Yii::t('Base', 'Name'); ?>">
  				</div>
  				<div class="form-group">
    				<label><?php echo Yii::t('Base', 'Department'); ?></label>
    				<div class="btn-group btn-group-fullwidth dropdown-list" data-maxnum=5 >
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><span class="dropdown-string">Dropdown 3 Dropdown 3 Dropdown 3</span><span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">                        	
							<li data-results="10"><a tabindex="-1" role="menuitem">Action 1</a></li>
							<li data-results="20"><a tabindex="-1" role="menuitem">Another action 2</a></li>
							<li data-results="30"><a tabindex="-1" role="menuitem">Something else here Something else here Something else here</a></li>
                            <li data-results="11"><a tabindex="-1" role="menuitem">Action 2</a></li>
                            <li data-results="12"><a tabindex="-1" role="menuitem">Action 3</a></li>
                            <li data-results="13"><a tabindex="-1" role="menuitem">Action 4</a></li>
                            <li data-results="14"><a tabindex="-1" role="menuitem">Action 5</a></li>
                            <li data-results="15"><a tabindex="-1" role="menuitem">Action 6</a></li>
                            <li data-results="16"><a tabindex="-1" role="menuitem">Action 7</a></li>
                            <li data-results="17"><a tabindex="-1" role="menuitem">Action 8</a></li>
                            <li data-results="18"><a tabindex="-1" role="menuitem">Action 9</a></li>
                            <li data-results="19"><a tabindex="-1" role="menuitem">Action 10</a></li>
                            <li data-results="21"><a tabindex="-1" role="menuitem">Action 11</a></li>
                            <li data-results="40"><a tabindex="-1" role="menuitem">Action 12</a></li>
							<!-------------  <li data-type="more" style="text-align:center;">more</li> --->
						</ul>
					</div>
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Position'); ?></label>
    				<div class="btn-group btn-group-fullwidth">
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">Dropdown 3<span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
                        	<!------------- <li data-type="filter"><a><input type="text"class="form-control" placeholder="<?php echo Yii::t('Base', 'Filter'); ?>"></a></li> -->
							<li><a tabindex="-1" role="menuitem">Action</a></li>
							<li><a tabindex="-1" role="menuitem">Another action</a></li>
							<li><a tabindex="-1" role="menuitem">Something else here</a></li>
						</ul>
					</div>
  				</div>
                <div class="form-group">
    				<label><?php echo Yii::t('Base', 'Group'); ?></label>
    				<div class="btn-group btn-group-fullwidth">
        				<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">Dropdown 3<span class="caret"></span></button>
						<ul class="dropdown-menu" role="menu">
							<li><a tabindex="-1" role="menuitem">Action</a></li>
							<li><a tabindex="-1" role="menuitem">Another action</a></li>
							<li><a tabindex="-1" role="menuitem">Something else here</a></li>
						</ul>
					</div>
  				</div>
                <div class="btn-group">
<input class="btn btn-default">
<button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
<span class="caret"></span>
</button>
<ul class="dropdown-menu" role="menu">
	<li><a tabindex="-1" role="menuitem">Action</a></li>
							<li><a tabindex="-1" role="menuitem">Another action</a></li>
							<li><a tabindex="-1" role="menuitem">Something else here</a></li>
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
	if($(this).attr('data-link'))
	{
		$.ajax({
			type: "post",
   			url: $(this).attr('data-link'),
			data: "id=" + $(this).attr('data-id'),
			dataType: "json",
			error: function() {
				//alert("error");
				//alert($(this).html());
			},
			success: function(data){
				//alert("success");
				//alert(data.result);
			}
		});
	}
});
///////////     end of modal setting     ///////////

$("body").delegate(".dropdown-menu li", 'click.bs.dropdown.data-api', function(){
	if(($(this).attr('data-type') == 'filter') || ($(this).attr('data-type') == 'more')) return false;
});

$("body").delegate(".dropdown-list", 'show.bs.dropdown', function(){
	//alert("dropdown");
	//return false;
	//alert($(this).attr('data-maxnum'));
	//alert($(this).find("li[data-results]").length);
	if( $(this).attr('data-maxnum') < $(this).find("li[data-results]").length )
	{
		if($(this).find(".dropdown-menu li[data-type='filter']").length == 0) $(this).find(".dropdown-menu").prepend('<li data-type="filter"><a><input type="text"class="form-control" placeholder="<?php echo Yii::t('Base', 'Filter'); ?>"></a></li>');
		if($(this).find(".dropdown-menu li[data-type='more']").length == 0) $(this).find(".dropdown-menu").append('<li data-type="more" style="text-align:center;"><?php echo Yii::t('Base', 'More'); ?></li>');
		
		$(this).find(".dropdown-menu li[data-results]").hide();
		
		for(idx = 0; idx < $(this).attr('data-maxnum'); idx++)
		{
			$(this).find(".dropdown-menu li[data-results]").eq(idx).show();
		}
	}
});


/////////////////////////////////////////////////////
$("body").delegate(".dropdown-list li[data-results]", 'click', function(event) {
	$(this).closest(".dropdown-list").attr('data-results', $(this).attr('data-results'));	
	$(this).closest(".dropdown-list").find(".dropdown-string").html($(this).find("a").html());	
});
/////////////////////////////////////////////////////



$("body").delegate(".dropdown-list li[data-type='more']", 'click', function(event) {
	$(this).closest(".dropdown-list").find("li[data-results]").show();
	
	if(!($(this).closest(".dropdown-list").find("li[data-type='filter'] input").val())) $(this).closest(".dropdown-list").find("li[data-type='filter']").remove();
	$(this).closest(".dropdown-list").find("li[data-type='more']").remove();
});

$("body").delegate(".dropdown-list li[data-type='filter']", 'keyup', function(event) {
	//console.log($(this).closest(".dropdown-list").find("li[data-type='filter'] input").val());
	filter = $(this).closest(".dropdown-list").find("li[data-type='filter'] input").val();	
	console.log(filter);
	$(this).closest(".dropdown-list").find("li[data-results]").hide();
	
	for(idx = 0; idx < $(this).closest(".dropdown-list").find("li[data-results]").length; idx++)
	{
		if($(this).closest(".dropdown-list").find("li[data-results] a").eq(idx).html().toLowerCase().indexOf(filter.toLowerCase()) != -1)
			$(this).closest(".dropdown-list").find("li[data-results]").eq(idx).show();
	} 
	
	if($(this).find(".dropdown-menu li[data-type='more']").length != 0)
	{
		for(idx = 0; idx < $(this).attr('data-maxnum'); idx++)
		{
			$(this).find(".dropdown-menu li[data-results]").eq(idx).show();
		}
	}
});

</script>
