// JavaScript Document
$.extend({
    loadCss: function(url, callback, nocache){
        if (typeof nocache=='undefined') nocache=false;
		
        if (nocache) url += '?_ts=' + new Date().getTime();
        $('<link>', {rel:'stylesheet', type:'text/css', 'href':url}).ready(function(){
            if (typeof callback=='function') callback;
        }).appendTo('head');
    },
	loadJs: function(url, callback, nocache){
        if (typeof nocache=='undefined') nocache=false;
		
        if (nocache) url += '?_ts=' + new Date().getTime();
        $('<script>', {'src':url}).ready(function(){
            if (typeof callback=='function') callback();
        }).appendTo('head');
    },
});