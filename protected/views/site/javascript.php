<script>
$(document).ready(function(){

	$(document).delegate("body", "blockinput.secondoffice.system", function(event, target, flag) {
		if(flag)
		{
			if(!($(target).hasClass('active'))) $(target).addClass('active');
			if(!($(target).find('.btn').hasClass('active'))) $(target).find('.btn').addClass('active');
						
			$(target).find('.form-control').addClass('disable');
			$(target).find('.form-control').attr("disabled", "disabled");
		}
		else
		{
			if($(target).hasClass('active')) $(target).removeClass('active');
			if($(target).find('.btn').hasClass('active')) $(target).find('.btn').removeClass('active');
			
			$(target).find('.form-control').removeClass('disable');
			$(target).find('.form-control').removeAttr("disabled");
		}
	});
	
	$(document).delegate("body", "changemodulestatus.secondoffice.system", function(event, data) {
		$.ajax({
   			type: "post",
   			url: data,
			dataType: "json",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			
			},
			success: function(data){
				if(data.result != "ok")
				{
					$.SmartNotification.Show(data.message, "error");
				}
				else
				{
					$.SmartNotification.Show(data.message);					
					$("#panel-module").find(".table-list").trigger("refresh.bs.tablelist");
				}
			}
		});
	});
	
	$(document).delegate("body", "show.deletedialog.secondoffice.system", function(event, target) {
		if($("#panel-" + target + " tbody").find("input[type='checkbox']:checked").length == 0)
		{
			$.SmartNotification.Show("<?php echo Yii::t('Base', 'No item has been selected!'); ?>", "error");
			return;
		}
		
		$("#" + target + "-delete-btn").trigger("click");
	});
		
	$(document).delegate("body", "init.secondoffice.system", function(event) {
		$.ajax({
   			type: "get",
   			url: "<?php echo Yii::app()->createUrl('site/getmainpanel'); ?>",
			dataType: "html",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			
			},
			success: function(data){
				$("link[href*='secondoffice.system.signin.css']").remove();
				$.loadCss('<?php echo Yii::app()->request->baseUrl; ?>/css/secondoffice.system.main.css');
				$('body').empty();
				$('body').html(data);				
				$(".navbar").find("[data-panel='#panel-home']").trigger("click");
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Signin successfully!'); ?>");
			}
		});
	});

	$(document).delegate("body", "signin.secondoffice.system", function(event) {
		if($('.div-signin').find('.btn').hasClass('active')) return;
	
		if( ($('.div-signin').find(".user-name").val() == "") || ($('.div-signin').find(".user-password").val() == "") )
		{
			$.SmartNotification.Show("<?php echo Yii::t('Base', 'User name or/and password is empty'); ?>", "error");	
			return;
		}
	
		$.SmartNotification.Show("<?php echo Yii::t('Base', 'Signing in'); ?>", "info", "true");	
		$("body").trigger("blockinput.secondoffice.system", [".div-signin", true]);
			
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('user/signin'); ?>",
  			data: "name=" + $('.div-signin').find(".user-name").val() + "&password=" + hex_md5($('.div-signin').find(".user-password").val()),
			dataType: "json",
			error: function() {
				$("body").trigger("blockinput.secondoffice.system", [".div-signin", false]);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
   			success: function(data){
				$("body").trigger("blockinput.secondoffice.system", [".div-signin", false]);
					
				if(data.result != "ok")
				{
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'User name or password invalid'); ?>", "error");
				}
				else
				{
					$("body").trigger("init.secondoffice.system");
				}		
   			}
		});
	});
	
	$(document).delegate("body", "ajaxsignin.secondoffice.system", function(event) {
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('site/index'); ?>",
			data: "ajax=true",
			dataType: "html",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
   			success: function(data){					
				$("link[href*='secondoffice.system.main.css']").remove();
				$.loadCss('<?php echo Yii::app()->request->baseUrl; ?>/css/secondoffice.system.signin.css');
				$('body').empty();
				$('body').html(data);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Signin timeout, please signin again'); ?>");	
   			}
		});
	});

	$(document).delegate("body", "logout.secondoffice.system", function(event) {
		if($('#modal-logout').find('.btn').hasClass('active')) return;
		$("body").trigger("blockinput.secondoffice.system", ["#modal-logout", true]);
		
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('user/logout'); ?>",
			dataType: "json",
			error: function() {
				$("body").trigger("blockinput.secondoffice.system", ["#modal-logout", false]);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				$("body").trigger("blockinput.secondoffice.system", ["#modal-logout", false]);
				
				if(data.result == "ok")
				{					
					window.location.href = "<?php echo Yii::app()->baseUrl; ?>";
				}
				else
				{
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Logout fail, please contact administrator'); ?>", "error");
				}
			}
		});
	});
	
	$(document).delegate("body", "changeownpassword.secondoffice.system", function(event) {
		if($('#modal-changepassword').find('.btn').hasClass('active')) return;
		
		if( (!$("#modal-changepassword").find(".old-password").val()) || (!$("#modal-changepassword").find(".new-password").val()) || (!$("#modal-changepassword").find(".retype-password").val()) )
		{
			$.SmartNotification.Show("<?php echo Yii::t('Base', 'Please fill all the blank'); ?>", "error");
			return;
		}
		
		if( $("#modal-changepassword").find(".new-password").val() != $("#modal-changepassword").find(".retype-password").val() )
		{
			$.SmartNotification.Show("<?php echo Yii::t('Base', 'Enter the new password twice are not the same'); ?>", "error");
			return;
		}		
		
		$("body").trigger("blockinput.secondoffice.system", ["#modal-changepassword", true]);
		
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('user/changeownpassword'); ?>",
			data: "oldpass=" + hex_md5($("#modal-changepassword").find(".old-password").val()) + "&newpass=" + hex_md5($("#modal-changepassword").find(".new-password").val()),
			dataType: "json",
			error: function() {
				$("body").trigger("blockinput.secondoffice.system", ["#modal-changepassword", false]);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				$("body").trigger("blockinput.secondoffice.system", ["#modal-changepassword", false]);
				
				if(data.result == "ok")
				{					
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Your password has been changed'); ?>");
					$('#modal-changepassword').closest(".modal").modal('hide');
				}
				else
				{
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Old password is not correct'); ?>", "error");
				}
			}
		});
	});	
	
	$(document).delegate("body", "save.user.secondoffice.system", function(event) {
		modal = $('#modal-useredit');
		
		if(modal.find('.btn').hasClass('active')) return;
		
		if( (!modal.find("[data-name='user_name']").val()) || (!modal.find("[data-name='real_name']").val()) || (!modal.find("[data-name='department_id']").attr("data-results")) || (!modal.find("[data-name='position_id']").attr("data-results")) || (!modal.find("[data-name='group_id']").attr("data-results")) )
		{
			$.SmartNotification.Show("<?php echo Yii::t('Base', 'Please fill all the blank '); ?>", "error");
			return;
		}
		
		$("body").trigger("blockinput.secondoffice.system", ["#modal-main", true]);
		
		password = "";	
		id = "";	
		if(modal.find("[data-name='password']").val()) password = hex_md5(modal.find("[data-name='password']").val());
		if(modal.closest(".modal").attr("data-id")) id = modal.closest(".modal").attr("data-id");
		
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('user/saveitem'); ?>",
			data: "id=" + id + "&username=" + modal.find("[data-name='user_name']").val() + "&password=" + password + "&realname=" + modal.find("[data-name='real_name']").val() + "&department=" + modal.find("[data-name='department_id']").attr("data-results") + "&position=" + modal.find("[data-name='position_id']").attr("data-results") + "&group=" + modal.find("[data-name='group_id']").attr("data-results"),
			dataType: "json",
			error: function() {
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				
				if(data.result == "ok")
				{					
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'User data has been saved'); ?>");
					$('#modal-useredit').closest(".modal").modal('hide');
					$("#panel-user").find(".table-list").trigger('refresh.bs.tablelist');
				}
				else
				{
					$.SmartNotification.Show(data.message, "error");
				}
			}
		});
	});
	
	$(document).delegate("body", "save.department.secondoffice.system", function(event) {
		modal = $('#modal-departmentedit');
				
		if(modal.find('.btn').hasClass('active')) return;		
		$("body").trigger("blockinput.secondoffice.system", ["#modal-main", true]);
		
		id = "";
		if(modal.closest(".modal").attr("data-id")) id = modal.closest(".modal").attr("data-id");
		
		item_list = "";
		modal.find(".item-accordion").find("input[type='checkbox']:checked").each(function (index, domEle) { 
			if(item_list)
			{
				item_list = item_list + "," + $(domEle).attr("data-name");
			}
			else
			{
				item_list = $(domEle).attr("data-name");
			}
		});		
		
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('department/saveitem'); ?>",
			data: "id=" + id + "&name=" + modal.find("[data-name='department_name']").val() + "&parent=" + modal.find("[data-name='parent_id']").attr("data-results") + "&manager=" + modal.find("[data-name='manager_id']").attr("data-results") + "&auth=" + item_list,
			dataType: "json",
			error: function() {
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				
				if(data.result == "ok")
				{					
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Department data has been saved'); ?>");
					$('#modal-departmentedit').closest(".modal").modal('hide');
					$("#panel-department").find(".table-list").trigger('refresh.bs.tablelist');
				}
				else
				{
					$.SmartNotification.Show(data.message, "error");
				}
			}
		});
	});
	
	$(document).delegate("body", "save.position.secondoffice.system", function(event) {
		modal = $('#modal-positionedit');
				
		if(modal.find('.btn').hasClass('active')) return;		
		$("body").trigger("blockinput.secondoffice.system", ["#modal-main", true]);
		
		id = "";
		if(modal.closest(".modal").attr("data-id")) id = modal.closest(".modal").attr("data-id");
		
		item_list = "";
		modal.find(".item-accordion").find("input[type='checkbox']:checked").each(function (index, domEle) { 
			if(item_list)
			{
				item_list = item_list + "," + $(domEle).attr("data-name");
			}
			else
			{
				item_list = $(domEle).attr("data-name");
			}
		});		
		
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('position/saveitem'); ?>",
			data: "id=" + id + "&name=" + modal.find("[data-name='position_name']").val() + "&auth=" + item_list,
			dataType: "json",
			error: function() {
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				
				if(data.result == "ok")
				{					
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Position data has been saved'); ?>");
					$('#modal-positionedit').closest(".modal").modal('hide');
					$("#panel-position").find(".table-list").trigger('refresh.bs.tablelist');
				}
				else
				{
					$.SmartNotification.Show(data.message, "error");
				}
			}
		});
	});
	
	$(document).delegate("body", "save.group.secondoffice.system", function(event) {
		modal = $('#modal-groupedit');
				
		if(modal.find('.btn').hasClass('active')) return;		
		$("body").trigger("blockinput.secondoffice.system", ["#modal-main", true]);
		
		id = "";
		if(modal.closest(".modal").attr("data-id")) id = modal.closest(".modal").attr("data-id");
		
		item_list = "";
		modal.find(".item-accordion").find("input[type='checkbox']:checked").each(function (index, domEle) { 
			if(item_list)
			{
				item_list = item_list + "," + $(domEle).attr("data-name");
			}
			else
			{
				item_list = $(domEle).attr("data-name");
			}
		});		
		
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('group/saveitem'); ?>",
			data: "id=" + id + "&name=" + modal.find("[data-name='group_name']").val() + "&auth=" + item_list,
			dataType: "json",
			error: function() {
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				
				if(data.result == "ok")
				{					
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Group data has been saved'); ?>");
					$('#modal-groupedit').closest(".modal").modal('hide');
					$("#panel-group").find(".table-list").trigger('refresh.bs.tablelist');
				}
				else
				{
					$.SmartNotification.Show(data.message, "error");
				}
			}
		});
	});
	
	$(document).delegate("body", "delete.listitem.secondoffice.system", function(event, data) {
		process_data = data.split(":");
		
		if($("#modal-" + process_data[0] + "delete").find('.btn').hasClass('active')) return;		
		$("body").trigger("blockinput.secondoffice.system", ["#modal-main", true]);
		
		item_list = "";
		
		if($("#modal-" + process_data[0] + "delete").closest(".modal").attr("data-id"))
		{
			item_list = $("#modal-" + process_data[0] + "delete").closest(".modal").attr("data-id");
		}
		else
		{
			$("#panel-" + process_data[0] + " tbody").find("input[type='checkbox']:checked").each(function (index, domEle) { 
				if(item_list)
				{
					item_list = item_list + "," + $(domEle).closest("tr").find("span[data-id]").attr("data-id");
				}
				else
				{
					item_list = $(domEle).closest("tr").find("span[data-id]").attr("data-id");
				}
			});
		}
		
		$.ajax({
   			type: "post",
   			url: process_data[1],
			data: "id=" + item_list,
			dataType: "json",
			error: function() {
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				$("body").trigger("blockinput.secondoffice.system", ["#modal-main", false]);
				
				if(data.result == "ok")
				{					
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Item has been deleted'); ?>");
					$("#modal-" + process_data[0] + "delete").closest(".modal").modal('hide');
					$("#panel-" + process_data[0]).find(".table-list").trigger('refresh.bs.tablelist');
				}
				else
				{
					$.SmartNotification.Show(data.message, "error");
				}
			}
		});
	});
/******************************* component enchance ***********************************/	

/*------------------------------       panel        ----------------------------------*/
	$(document).delegate("[data-toggle='panel']", 'click', function(event) {
    	target_node = $(this).attr('data-target');
        pangel_node = $(this).attr('data-panel');
        
        if($(this).parent().attr('data-flag') == "true")
        {
        	$(this).parent().children().removeClass('active');
        	$(this).addClass('active');
        }
           
        if($(pangel_node).html())
		{
			$(target_node).children().hide();
			$(pangel_node).show();
			return;
		}
        
        $.ajax({
   			type: "get",
   			url: $(this).attr("data-link"),
			dataType: "html",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				$(target_node).children().hide();
				$(target_node).append(data);
			}
		});
	});
/*------------------------------    end of panel    ----------------------------------*/

/*------------------------------       modal        ----------------------------------*/
	$(document).delegate("[data-toggle='modal']", 'click', function(event) { 
    	modal_node = $(this).attr('data-modal');
        target_node = $(this).attr('data-target');
        data_id = $(this).attr('data-id');
        
        if($(target_node + "-list").length == 0) $("body").append("<div id='" + target_node.replace("#","") + "-list' style='display:none;'></div>");
               
        if($(target_node + "-list").find(".modal-dialog[data-modal='" + modal_node + "']").length != 0)
		{            
            $(target_node + "-list").find(".modal-dialog[data-modal='" + modal_node + "']").clone().appendTo(target_node);			
            $(target_node).find(".modal-dialog[data-modal='" + modal_node + "']").attr("id", modal_node.replace("#", ""));			
            $(target_node).find(modal_node).removeAttr("data-modal");            
            $(target_node).attr('data-id', $(this).attr('data-id'));    
			
			$(target_node).trigger('loaddata.bs.modal');       
            
			return;
		}
        
        $.ajax({
   			type: "get",
   			url: $(this).attr("data-link"),
			dataType: "html",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				$(target_node).append(data);
                $(target_node).attr('data-id', data_id);
                
                $(target_node + "-list").append(data);
                $(target_node + "-list").find(modal_node).attr("data-modal", modal_node);
                $(target_node + "-list").find(modal_node).removeAttr("id");
				
				$(target_node).trigger('loaddata.bs.modal');
			}
		});
	});
    
    $(document).delegate(".modal", "loaddata.bs.modal", function() {
		var target_modal = $(this).find(".modal-dialog");
	
		$(this).find(".dropdown-list[data-link]").filter("[data-filter='true']").attr("filter-data", $(this).attr('data-id'));	
		$(this).find(".dropdown-list[data-link]").filter("[data-type='preload']").trigger('loadlist.bs.dropdown');
		
		$(this).find(".item-accordion[data-link]").attr("data-id", $(this).attr('data-id'));			
		$(this).find(".item-accordion[data-link]").trigger('loadlist.bs.accordion');
        
        
		if(target_modal.attr('data-link'))
		{		
			if($(this).attr('data-id'))
			{
				$.ajax({
					type: "post",
   					url: target_modal.attr('data-link'),
					data: "id=" + $(this).attr('data-id'),
					dataType: "json",
					error: function() {
						$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
					},
					success: function(data){
						if(data.result == "ok")
						{					
							for(idx = 0; idx < data.list.length; idx++)
							{
								data_field = target_modal.find("[data-name='" + data.list[idx].data_name + "']");
								if(data_field.filter("[class*='form-control']").length > 0)
								{
									data_field.val(data.list[idx].data_value);
								}
								
								if(data_field.filter("[class*='dropdown-string']").length > 0)
								{
									data_field.html(data.list[idx].data_value);
								}
								
								if(data_field.filter("[class*='dropdown-list']").length > 0)
								{
									data_field.attr("data-results", data.list[idx].data_value);
								}
							}
						}
						else
						{
							$.SmartNotification.Show("<?php echo Yii::t('Base', 'Load data fail! please contact administrator'); ?>", "error");
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
	
	$(document).delegate(".modal", "hide.bs.modal", function(event) {
		if($(this).hasClass('active')) return event.preventDefault();
	});
    
    $(document).delegate(".modal", "hidden.bs.modal", function() {
		$(this).attr('data-id', '');
        $(this).empty();
	});
/*------------------------------    end of modal    ----------------------------------*/

/*------------------------------     dropdownlist   ----------------------------------*/
	$(document).delegate(".dropdown-list li[data-results]", 'click', function(event) {
		if($(this).attr('data-type') != 'checkbox')
		{
			$(this).closest(".dropdown-list").attr('data-results', $(this).attr('data-results'));	
			$(this).closest(".dropdown-list").find(".dropdown-string").html($(this).find("a").html());
		}
	});
	
    $(document).delegate(".dropdown-menu li", 'click.bs.dropdown', function(e){
		if(($(this).attr('data-type') == 'filter') || ($(this).attr('data-type') == 'more') || ($(this).attr('data-type') == 'checkbox')) return e.stopPropagation();
	});
	
	$(document).delegate(".dropdown-menu div", 'click.bs.dropdown', function(e){
		return e.stopPropagation();
	});	
    
    $(document).delegate(".dropdown-list", 'refresh.bs.dropdown', function(){
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
	});
	
	$(document).delegate(".dropdown-list", 'show.bs.dropdown', function(event){
		if($(this).find("[data-toggle='dropdown']").hasClass('active')) return event.preventDefault();
	});

	$(document).delegate(".dropdown-list", 'shown.bs.dropdown', function(){
		$(this).attr('data-more', 'false');
		$(this).attr('data-filter', '');
		$(this).find("li[data-type='filter'] input").val("");
	
		$(this).trigger('refresh.bs.dropdown');
	});
    
    $(document).delegate(".dropdown-list li[data-type='more']", 'click', function(event) {
		$(this).closest(".dropdown-list").attr('data-more', 'true');
		$(this).closest(".dropdown-list").trigger('refresh.bs.dropdown');
	});

	$(document).delegate(".dropdown-list li[data-type='filter']", 'input', function(event) {
		$(this).closest(".dropdown-list").attr('data-filter', $(this).closest(".dropdown-list").find("li[data-type='filter'] input").val());
		$(this).closest(".dropdown-list").trigger('refresh.bs.dropdown');
	});	
    
    $(document).delegate(".dropdown-list", 'loadlist.bs.dropdown', function(event) {
		var list_obj = $(this);
		var filter_data = "";
		if(list_obj.attr("filter-data")) filter_data = list_obj.attr("filter-data");		
		
		$.ajax({
			type: "post",
   			url: list_obj.attr('data-link'),
			data: "filter=" + filter_data,
			dataType: "json",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				if(data.result == "ok")
				{			
					list_items = $(list_obj).find(".dropdown-menu");
					list_items.empty();
				
					for(idx = 0; idx < data.list.length; idx++)
					{
						list_items.append('<li data-results="' + data.list[idx].value + '"><a>' + data.list[idx].string + '</a></li>');
					}
				}
				else
				{
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Load list data fail, please contact administrator'); ?>", "error");
				}
			}
		});	
	});
/*------------------------------ end of dropdownlist ---------------------------------*/

/*-------------------------------     table list   -----------------------------------*/
	$(document).delegate(".table-list th[data-sort]", 'click', function(event) {
		$(this).closest("tr").find("th span").removeAttr("class");
	
		if($(this).closest(".table-list").attr("data-sort") == $(this).attr('data-sort'))
		{
			$(this).closest(".table-list").attr('data-sort', $(this).attr('data-sort') + " desc");					
			$(this).find("span").addClass("caret");
		}
		else
		{
			$(this).closest(".table-list").attr('data-sort', $(this).attr('data-sort'));					
			$(this).find("span").addClass("reversal-caret");
		}
		
		$(this).closest(".table-list").trigger("refresh.bs.tablelist");
	});
	
	$(document).delegate(".table-list .tableitem-keyword", "keyup", function(e) {
		$(this).closest(".table-list").attr("data-page", "1");
		$(this).closest(".table-list").attr('data-filter', $(this).val());
		if(e.keyCode == 13)
		{
			$(this).closest(".table-list").attr("data-condition","");
			$(this).attr("placeholder", '<?php echo Yii::t('Base', 'Search'); ?>');
			$(this).closest(".table-list").trigger("refresh.bs.tablelist");
		} 
	});
	
	$(document).delegate(".tableitem-number li[data-results]", "click", function(event) {
		$(this).closest(".table-list").attr('data-number', $(this).attr('data-results'));	
		$(this).closest(".table-list").attr("data-page", "1");
		$(this).closest(".table-list").trigger("refresh.bs.tablelist");
	});
	
	$(document).delegate(".tableitem-item", "hidden.bs.dropdown", function(event) {
		var select_list = "";
			
		$(this).find("input[type='checkbox']").each(function(index, domEle){
			if($(domEle).prop('checked')) 
			{
				if(select_list)
				{
					select_list = select_list + ',' + $(domEle).closest("li").attr('data-results');
				}
				else
				{
					select_list = $(domEle).closest("li").attr('data-results');
				}
			}
		})	
		
		if($(this).attr('data-results') != select_list)
		{
			$(this).attr('data-results', select_list);	
			$(this).closest(".table-list").attr('data-items', $(this).attr('data-results'));
			$(this).closest(".table-list").trigger("refresh.bs.tablelist");
		}
	});
	
    
    $(document).delegate(".table-list tbody input[type='checkbox']", 'click', function(event) {
		if($(this).closest(".table-list").find(".global-checkbox").prop("checked")) $(this).closest(".table-list").find(".global-checkbox").prop('checked', false);
	});

	$(document).delegate( ".global-checkbox", 'click', function(event) {
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
	
	$(document).delegate(".table-list", 'advanced.search.bs.tablelist', function(event) {
		console.log("advanced.search.bs.tablelist");
		$(this).find(".table-advanced-search").dropdown("toggle");
		
		$(this).attr('data-filter', '');		
		
		var option_obj = $(this).find(".advanced-search-option table");
		var data_condition = "";
		var condition_num = 0;				
		
		option_obj.find("input[type='checkbox']").each(function(index, domEle){			
			if($(domEle).prop('checked')) 
			{
				var value_name = $(domEle).closest("tr").attr('data-name');
				var value_type = $(domEle).closest("tr").find("select").val();	
				
				var value_data = "";
				
				if(value_type == 'between')
				{
					value_data = $(domEle).closest("tr").find(".keyword1").val() + ':' + $(domEle).closest("tr").find(".keyword2").val();
				}
				else
				{
					value_data = $(domEle).closest("tr").find(".keyword1").val();
				}
							
				if(data_condition)
				{					
					data_condition = data_condition + ',' + value_name + ':' + value_type + ':' + value_data;
				}
				else
				{
					data_condition = value_name + ':' + value_type + ':' + value_data;
				}
				
				condition_num ++;				
			}
		})
		
		$(this).attr('data-condition', data_condition);
		$(this).find(".tableitem-keyword").val("");
		$(this).find(".tableitem-keyword").attr("placeholder", condition_num + ' <?php echo Yii::t('Base', 'Search Conditions'); ?>');
		$(this).trigger("refresh.bs.tablelist");
	});
	
	$(document).delegate(".table-list", 'search.option.refresh.bs.tablelist', function(event) {
		var option_obj = $(this).find(".advanced-search-option table");
		var option_items = $(this).closest(".table-list").attr("data-items").split(",");
		var tableitem_list = $(this).closest(".table-list").find(".tableitem-item ul");
		
		option_obj.empty();
		
		for (i = 0; i < option_items.length; i++ ){						
			var item_name =  tableitem_list.find("li[data-results='" + option_items[i] + "'] a").text();
			var item_type =  tableitem_list.find("li[data-results='" + option_items[i] + "']").attr("value-type");	
			
			var select_options = '';
			
			if(item_type == "string")
			{
				select_options = '<select>' + 
                        		'<option value="include"><?php echo Yii::t('Base', 'Include'); ?></option>' + 
                            	'<option value="exclude"><?php echo Yii::t('Base', 'Exclude'); ?></option>' +
                        		'</select>';
			}
			
			if(item_type == "number")
			{
				select_options = '<select>' + 
                        		'<option value="greater"><?php echo Yii::t('Base', 'Greater'); ?></option>' + 
                            	'<option value="smaller"><?php echo Yii::t('Base', 'Smaller'); ?></option>' +
								'<option value="equal"><?php echo Yii::t('Base', 'Eequal'); ?></option>' +
								'<option value="between"><?php echo Yii::t('Base', 'Between'); ?></option>' +
                        		'</select>';
			}
			
			if(item_type == "date")
			{
				select_options = '<select>' + 
                        		'<option value="greater"><?php echo Yii::t('Base', 'Greater'); ?></option>' + 
                            	'<option value="smaller"><?php echo Yii::t('Base', 'Smaller'); ?></option>' +
								'<option value="equal"><?php echo Yii::t('Base', 'Eequal'); ?></option>' +
								'<option value="between"><?php echo Yii::t('Base', 'Between'); ?></option>' +
                        		'</select>';
			}
			
			option_obj.append(
				'<tr data-name="' + option_items[i] + '" >' + 
				'<td><input type="checkbox"></td>' + 
				'<td align="left"><span>' + item_name + '</span></td>' + 
				'<td align="left">' + select_options + '</td>' +
				'<td style="padding-right:0px;"><input type="text" class="advanced-search-keyword keyword1" /><span class="addition_keyword hidden"> to <input type="text" class="advanced-search-keyword keyword2" /></span></td>' +
				'</tr>');
		}
	});
	
	$(document).delegate(".advanced-search-option select", 'change', function(event) {
		if($(this).val() == "between")
		{
			$(this).closest("tr").find(".addition_keyword").removeClass("hidden");
		}
		else
		{
			$(this).closest("tr").find(".addition_keyword").addClass("hidden");
		}
	});
	
	$(document).delegate(".table-list", 'refresh.bs.tablelist', function(event) {
		console.log("refresh.bs.tablelist");
		items		= ""
		sort_type 	= "";
		filter 		= "";
		condition	= "";
		page_num 	= "10";
		page 		= "1";
		
		if($(this).attr('data-sort')) sort_type = $(this).attr('data-sort');
		if($(this).attr('data-filter')) filter = $(this).attr('data-filter');
		if($(this).attr('data-condition')) condition = $(this).attr('data-condition');
		if($(this).attr('data-number')) page_num = $(this).attr('data-number');
		if($(this).attr('data-page')) page = $(this).attr('data-page');
		if($(this).attr('data-items')) items = $(this).attr('data-items');
		
		var table_obj = $(this);	
	
		$.ajax({
			type: "post",
   			url: $(this).attr('data-link'),
			data: "sort=" + sort_type + "&filter=" + filter + "&condition=" + condition + "&page_num=" + page_num + "&page=" + page + "&items=" + items,
			dataType: "json",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				if(data.result == "ok")
				{
					if(table_obj.attr('data-items'))
					{
						table_head = table_obj.find("thead tr");
						tableitem_list = table_obj.find(".tableitem-item ul");
						
						table_head.empty();
						
						if(data.checkbox == "yes") table_head.append('<th class="table_tools"><input type="checkbox" class="global-checkbox"></th>');
						table_head.append('<th class="table_tools"></th>');	
						
						items = table_obj.attr('data-items').split(",");
						style = 'style="width:' + 90/items.length + '%"';
						
						for (i = 0; i < items.length; i++ ){						
							item_name =  tableitem_list.find("li[data-results='" + items[i] + "'] a");								
							sort_type = ""; 						
							
							if(table_obj.attr('data-sort'))
							{
								if(table_obj.attr('data-sort').indexOf(items[i]) != -1)
								{
									if(table_obj.attr('data-sort').indexOf("desc") != -1)
									{
										sort_type = 'class="caret"';
									}
									else
									{
										sort_type = 'class="reversal-caret"';
									}
								}
							}							
											
							table_head.append('<th ' + style + ' data-sort="' + items[i] + '"><a>' + item_name.text() + '<span ' + sort_type + '></span></a></th>');
						} 
						
						table_obj.trigger('search.option.refresh.bs.tablelist');
					}		
				
					table_obj.find(".table-items-list tbody").empty();
					
					for(idx = 0; idx < data.list.length; idx++)
					{
						data_list = "";	
											
						for(data_idx = 0; data_idx < data.list[idx].data.length; data_idx++)
						{
							data_list = data_list + '<td>' + data.list[idx].data[data_idx] + '</td>';
						}
						
											
						tools_list = "";				
						
						if(data.tools.length > 0)
						{
							for(tools_idx = 0; tools_idx < data.tools.length; tools_idx++)
							{
								tools_list = tools_list + '<a><span ' + data.tools[tools_idx] + ' data-id="' + data.list[idx].id + '" ></span></a>';
							}
						}
						else
						{
							for(tools_idx = 0; tools_idx < data.list[idx].tools.length; tools_idx++)
							{
								tools_list = tools_list + '<a><span ' + data.list[idx].tools[tools_idx] + ' data-id="' + data.list[idx].id + '" ></span></a>';
							}
							
						}
						
						
						check_box = "";
						if(data.checkbox == "yes") check_box = '<td><input type="checkbox"></td>';
						
						table_obj.find("tbody").append('<tr>' + 
      						check_box + 
							'<td>' + tools_list + '</td>' +							
							data_list +
					   		'</tr>');
					}
					
					table_obj.find(".pagination").remove();	
					
					if((parseInt(data.item_num) > parseInt(data.item_pagenum)) && (parseInt(data.item_pagenum) > 0))
					{
						page_num = Math.ceil(data.item_num / data.item_pagenum);						
											
						table_obj.append('<ul class="pagination pagination-sm navbar-right"></ul>');
						
						for(idx = 1; idx <= page_num; idx++)
						{
							class_string = "";
							event_string = "";
							
							if(idx == data.item_page)
							{
								class_string = " class='active' ";								
							}
							else
							{
								event_string = " data-toggle='click.trigger' data-event='changepage.bs.tablelist' data-result='" + idx + "' ";
							}
							
							table_obj.find(".pagination").append("<li" + event_string + class_string + "><a>" + idx + "</a></li>");							
						}
						
						firstpage_string = " data-toggle='click.trigger' data-event='changepage.bs.tablelist' data-result='1' ";
						lastpage_string = " data-toggle='click.trigger' data-event='changepage.bs.tablelist' data-result='" + page_num + "' ";
												
						if(data.item_page == 1) firstpage_string = " class='disabled' ";
						if(data.item_page == page_num) lastpage_string = " class='disabled' ";
						
						table_obj.find(".pagination").prepend("<li" + firstpage_string + "><a>&laquo;</a></li>");
						table_obj.find(".pagination").append("<li" + lastpage_string + "><a>&raquo;</a></li>");						
					}
				}
				else
				{
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Load list fail, please contact administrator'); ?>", "error");
				}
			}
		});
	});
	
	$(document).delegate(".table-list .pagination li", 'changepage.bs.tablelist', function(event) {
		$(this).closest(".table-list").attr("data-page", $(this).attr("data-result"));
		$(this).closest(".table-list").trigger("refresh.bs.tablelist");
	});
/*------------------------------- end of table list ----------------------------------*/

/*-------------------------------      trigger     -----------------------------------*/
	$(document).delegate("[data-toggle='click.trigger']", 'click', function(event) {
		var trigger_data = $(this).attr("data-trigger");
	
		if($(this).attr("data-target"))
		{
			if(trigger_data)
			{
				$($(this).attr("data-target")).trigger($(this).attr("data-event"), trigger_data);
			}
			else
			{
				$($(this).attr("data-target")).trigger($(this).attr("data-event"));
			}
		}
		else
		{
			if(trigger_data)
			{
				$(this).trigger($(this).attr("data-event"), trigger_data);
			}
			else
			{
				$(this).trigger($(this).attr("data-event"));
			}			
		}		
	});
	
	$(document).delegate("[data-toggle='enter.trigger']", 'keyup', function(event) {
		var trigger_data = $(this).attr("data-trigger");
		
		if (event.keyCode == "13")
		{
			if($(this).attr("data-target"))
			{
				$($(this).attr("data-target")).trigger($(this).attr("data-event"));
			}
			else
			{
				$(this).trigger($(this).attr("data-event"));
			}
		}				
	});
/*-------------------------------  end of trigger  -----------------------------------*/

/*-------------------------------     accordion    -----------------------------------*/
	$(document).delegate(".item-accordion", 'loadlist.bs.accordion', function(event) {
		var list_obj = $(this);
		
		$.ajax({
			type: "post",
   			url: list_obj.attr('data-link'),
			data: "id=" + list_obj.attr('data-id'),
			dataType: "json",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				if(data.result == "ok")
				{
					list_obj.html(data.output);
				}
				else
				{
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Load list data fail, please contact administrator'); ?>", "error");
				}
			}
		});	
	});
/*------------------------------- end of accordion -----------------------------------*/
/**************************** end of component enchance *******************************/
});
</script>
