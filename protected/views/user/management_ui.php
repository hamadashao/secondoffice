<div class="panel panel-default panel-container panel-user">
	<div class="panel-heading"><?php echo Yii::t('Base', 'User Management'); ?></div>
	<div class="panel-body usermanagementui-list">
		<div class="col-sm-2">
			<ul class="nav nav-pills nav-stacked">
  				<li class="usermanagementmenu-item" data-target="user-ui" data-link="<?php echo Yii::app()->createUrl('user/getuserui'); ?>"><a><?php echo Yii::t('Base', 'Users'); ?></a></li>
  				<li class="usermanagementmenu-item" data-target="department-ui" data-link="<?php echo Yii::app()->createUrl('department/getdepartmentui'); ?>"><a><?php echo Yii::t('Base', 'Departments'); ?></a></li>
  				<li class="usermanagementmenu-item" data-target="position-ui" data-link="<?php echo Yii::app()->createUrl('position/getpositionui'); ?>"><a><?php echo Yii::t('Base', 'Positions'); ?></a></li>
                <li class="usermanagementmenu-item" data-target="group-ui" data-link="<?php echo Yii::app()->createUrl('group/getgroupui'); ?>"><a><?php echo Yii::t('Base', 'Groups'); ?></a></li>
			</ul>
		</div>         
    </div>     
</div>

<script>
function getusermanagementUI(ui_url) {
	$.ajax({
		type: "get",
   		url: ui_url,
		dataType: "html",
		error: function() {
			alert("error");
		},
		success: function(data){
			$('.usermanagementui-item').hide();
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
				$('.usermanagementui-item').hide();
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

getusermanagementUI("<?php echo Yii::app()->createUrl('user/getuserui'); ?>");
</script>
