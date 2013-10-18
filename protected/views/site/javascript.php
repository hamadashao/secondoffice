<script>
SecondOffice = {}; 
 
SecondOffice.System = {
	InitMainUI:function() {
		$.ajax({
   			type: "get",
   			url: "<?php echo Yii::app()->createUrl('site/getmainpanel'); ?>",
			dataType: "html",
			error: function() {
				SecondOffice.System.HideSigninForm(false);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, initialize main UI fail!'); ?>", "error");
			
			},
			success: function(data){
				$("#system-css").remove();
				$.loadCss('<?php echo Yii::app()->request->baseUrl; ?>/css/secondoffice.system.main.css');
				$('body').empty();
				$('body').html(data);
			}
		});
	},
	HideSigninForm:function(flag) {
		if(flag)
		{			
			if(!($('.div-signin').find('.btn').hasClass('active'))) $('.btn').addClass('active');
						
			$('.div-signin').find('.form-control').	addClass('disable');
			$('.div-signin').find('.form-control').	attr("disabled", "disabled");
		}
		else
		{
			if($('.div-signin').find('.btn').hasClass('active')) $('.btn').removeClass('active');
			
			$('.div-signin').find('.form-control').	removeClass('disable');
			$('.div-signin').find('.form-control').	removeAttr("disabled");
		}
	},
	SignIn:function() {
		if( ($('.div-signin').find(".user-name").val() == "") || ($('.div-signin').find(".user-password").val() == "") )
		{
			$.SmartNotification.Show("<?php echo Yii::t('Base', 'User name or/and password is empty'); ?>", "error");	
			return;
		}
	
		$.SmartNotification.Show("<?php echo Yii::t('Base', 'Signing in'); ?>", "info", "true");			
		SecondOffice.System.HideSigninForm(true);
			
		$.ajax({
   			type: "post",
   			url: "<?php echo Yii::app()->createUrl('user/signin'); ?>",
  			data: "name=" + $('.div-signin').find(".user-name").val() + "&password=" + hex_md5($('.div-signin').find(".user-password").val()),
			dataType: "json",
			error: function() {
				SecondOffice.System.HideSigninForm(false);
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
   			success: function(data){
				SecondOffice.System.HideSigninForm(false);
					
				if(data.result != "ok")
				{
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'User name or password invalid'); ?>", "error");
				}
				else
				{
					SecondOffice.System.InitMainUI();
				}		
   			}
		});
	}
}; 

/******************************* component enchance ***********************************/
$(document).ready(function(){
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
            $(target_node).find(".modal-dialog[data-modal='" + modal_node + "']").attr("id", modal_node);
            $(target_node).find(modal_node).removeAttr("data-modal");
            
            $(target_node).attr('data-id', $(this).attr('data-id'));           
            
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
			}
		});
	});
    
    $(document).delegate(".modal", "shown.bs.modal", function() {    
		$(this).find(".dropdown-list[data-link]").filter("[data-type='preload']").trigger('loadlist.bs.dropdown');
        
        target_modal = $(this).find(".modal-dialog");
        
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
								//target_modal.find("[data-name='" + data.list[idx].data_name + "']").val(data.list[idx].data_value);
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
    
    $(document).delegate(".modal", "hidden.bs.modal", function() {
		$(this).attr('data-id', '');
        $(this).empty();
	});
/*------------------------------    end of modal    ----------------------------------*/

/*------------------------------     dropdownlist   ----------------------------------*/
	$(document).delegate(".dropdown-list li[data-results]", 'click', function(event) {
		$(this).closest(".dropdown-list").attr('data-results', $(this).attr('data-results'));	
		$(this).closest(".dropdown-list").find(".dropdown-string").html($(this).find("a").html());	
	});
    
    $(document).delegate(".dropdown-menu li", 'click.bs.dropdown.data-api', function(){
		if(($(this).attr('data-type') == 'filter') || ($(this).attr('data-type') == 'more')) return false;
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
		$.ajax({
			type: "get",
   			url: $(this).attr('data-link'),
			dataType: "json",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
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
			$(this).closest(".table-list").attr('data-sort', $(this).attr('data-sort') + ".desc");					
			$(this).find("span").addClass("caret");
		}
		else
		{
			$(this).closest(".table-list").attr('data-sort', $(this).attr('data-sort'));					
			$(this).find("span").addClass("reversal-caret");
		}
	});
	
	$(document).delegate(".table-list .tableitem-keyword", "input", function(event) {
		$(this).closest(".table-list").attr('data-filter', $(this).val());	
	});
	
	$(document).delegate(".table-list .tableitem-number li[data-results]", "click", function(event) {
		$(this).closest(".table-list").attr('data-number', $(this).attr('data-results'));	
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
	
	$(document).delegate(".table-list", 'refresh.bs.tablelist', function(event) {
		sort_type = "";
		filter = "";
		page_num = "10";
		
		if($(this).attr('data-sort')) sort_type = $(this).attr('data-sort');
		if($(this).attr('data-filter')) filter = $(this).attr('data-filter');
		if($(this).attr('data-number')) page_num = $(this).attr('data-number');
		
	
		$.ajax({
			type: "post",
   			url: $(this).attr('data-link'),
			data: "sort=" + sort_type + "&filter=" + filter + "&page_num=" + page_num,
			dataType: "json",
			error: function() {
				$.SmartNotification.Show("<?php echo Yii::t('Base', 'Server error, please contact administrator'); ?>", "error");
			},
			success: function(data){
				if(data.result == "ok")
				{
					console.log("test");
				}
				else
				{
					$.SmartNotification.Show("<?php echo Yii::t('Base', 'Load list fail, please contact administrator'); ?>", "error");
				}
			}
		});
	});
/*------------------------------- end of table list ----------------------------------*/

/*-------------------------------      trigger     -----------------------------------*/
	$(document).delegate("[data-toggle='trigger']", 'click', function(event) {
		$($(this).attr("data-target")).trigger($(this).attr("data-event"));
	});
/*-------------------------------  end of trigger  -----------------------------------*/

});
/**************************** end of component enchance *******************************/
</script>
