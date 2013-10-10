// JavaScript Document
(function($) {
		  
	jQuery.SmartNotification = {
		direction:"bottom",
		distance:10,
		timmer:"",		
		time:3000,
		
		show:function(content, type) {			
			if($("body").find("#SmartNotification").length == 0)
			{
				$("body").append('<div id="SmartNotification" style="text-align:center; position:absolute; ' + jQuery.SmartNotification.direction + ':' + jQuery.SmartNotification.distance + 'px; z-index:999999; width:100%; display:none;"><span style="display:inline-block; vertical-align:middle;"></span></div>');
			}
			
			if(!type) type = "normal";
			
			clearTimeout(jQuery.SmartNotification.timmer);
			$("body").find("#SmartNotification").stop(true);
			
			$("body").find("#SmartNotification span").html(content);
			
			$("body").find("#SmartNotification").slideDown("normal", function(){
				jQuery.SmartNotification.timmer = setTimeout(function(){jQuery.SmartNotification.hide();}, jQuery.SmartNotification.time);
			});
		}, 
		
		hide:function() {
			$("body").find("#SmartNotification").slideUp("normal");
		}         
	};
	
})(jQuery); 