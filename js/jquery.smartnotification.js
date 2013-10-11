// JavaScript Document
(function($) {
		  
	jQuery.SmartNotification = {
		direction:"bottom",
		infotype:"info",
		distance:15,
		timmer:new Array(),		
		time:5000,
		
		clearlist:function() {			
			for (var idx = 0; idx < jQuery.SmartNotification.timmer.length; idx++)
			{
				clearTimeout(jQuery.SmartNotification.timmer[idx]);
			}
		},
		
		Show:function(content, content_type, continued) {	
			if($("body").find("#SmartNotification").length == 0)
			{
				$("body").append('<div id="SmartNotification" style="text-align:center; position:absolute; ' + jQuery.SmartNotification.direction + ':' + jQuery.SmartNotification.distance + 'px; z-index:999999; width:100%; display:none;"><span style="display:inline-block; vertical-align:middle;"></span></div>');
			}
			
			jQuery.SmartNotification.Hide(content, content_type);
			
			$("body").find("#SmartNotification").slideDown("normal", function(){
				if(continued != "true") 
				{
					jQuery.SmartNotification.timmer.push(setTimeout(function(){jQuery.SmartNotification.Hide();}, jQuery.SmartNotification.time));
				}
				else
				{
					jQuery.SmartNotification.clearlist();					
				}
			});
		}, 
		
		Hide:function(content, content_type) {	
			$("body").find("#SmartNotification").slideUp("normal", function(){
				type = "";
				
				if(!content_type) 
				{
					type = "smartnotification-" + jQuery.SmartNotification.infotype;	
				}
				else
				{
					type = "smartnotification-" + content_type;
				}
				
				$("body").find("#SmartNotification").removeClass();
				$("body").find("#SmartNotification").addClass(type);
				$("body").find("#SmartNotification span").html(content);
			});
		}         
	};
	
})(jQuery); 