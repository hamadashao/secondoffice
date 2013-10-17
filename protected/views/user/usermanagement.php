<div id="panel-usermanagement" class="panel panel-default panel-container">
	<div class="panel-heading"><?php echo Yii::t('Base', 'User Management'); ?></div>
	<div class="panel-body usermanagementui-list">
		<div class="col-sm-2">
			<ul class="nav nav-pills nav-stacked" data-flag="true">
  				<li data-toggle="panel" data-target="#usermanagement-panel-item" data-panel="#panel-user" data-link="<?php echo Yii::app()->createUrl('user/getuserpanel'); ?>"><a><?php echo Yii::t('Base', 'Users'); ?></a></li>
  				<li data-toggle="panel" data-target="#usermanagement-panel-item" data-panel="#panel-department" data-link="<?php echo Yii::app()->createUrl('department/getdepartmentpanel'); ?>"><a><?php echo Yii::t('Base', 'Departments'); ?></a></li>
  				<li data-toggle="panel" data-target="#usermanagement-panel-item" data-panel="#panel-position" data-link="<?php echo Yii::app()->createUrl('position/getpositionpanel'); ?>"><a><?php echo Yii::t('Base', 'Positions'); ?></a></li>
                <li data-toggle="panel" data-target="#usermanagement-panel-item" data-panel="#panel-group" data-link="<?php echo Yii::app()->createUrl('group/getgrouppanel'); ?>"><a><?php echo Yii::t('Base', 'Groups'); ?></a></li>
			</ul>
		</div> 
        <div id="usermanagement-panel-item" class="col-sm-10"></div>      
    </div>     
</div>

<script>
/*
function getusermanagementUI(ui_url) {
	$.ajax({
		type: "get",
   		url: ui_url,
		dataType: "html",
		error: function() {
			alert("error");
		},
		success: function(data){
			$('.usermanagement-ui').hide();
			$('.usermanagementmenu-item').removeClass('active');
		
			$('.usermanagementui-list').append(data);
			$('.usermanagementmenu-item[data-target="' + $(data).attr("id") + '"]').addClass('active');
		}
	});
}

$('.usermanagementmenu-item').each(function(index, domEle){
	if($(domEle).attr('data-link'))
	{		
		$(this).bind('click', {msg: $(domEle).attr('data-link')}, function(event) {
			if($('#' + $(domEle).attr('data-target')).html())
			{
				$('.usermanagement-ui').hide();
				$('.usermanagementmenu-item').removeClass('active');
				
				$('#' + $(domEle).attr('data-target')).show();
				$(domEle).addClass('active');
			}
			else
			{
				getusermanagementUI(event.data.msg);
			}
		});
	}
}); 
*/

//getusermanagementUI("<?php echo Yii::app()->createUrl('user/getuserui'); ?>");

$(document).ready(function(){
	$('#panel-usermanagement').find('[data-panel="#panel-user"]').trigger('click');
});
</script>
