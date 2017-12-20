// JavaScript Document
var _selector = null;
var initNewsTabs=function(selector)
{    _selector = selector;
	$(_selector+"> div").each( function(i,e)
									   {
							
									  
									   $(e).css('left','-'+(i*35)+'px');
									   
									   });
	$(selector+"> div").click( tabClick);
	$(_selector+"> div:first").trigger('click')
	
	
}
var tabClick = function()
{
	try{
	$(_selector+"> div").each( function(i,e)
									   {
									   	
										$(e).removeClass('newsTabActive');
									   	$(e).addClass('newsTab');
									   	$(e).css('left','-'+(i*35)+'px');
										
									   });
	
	var _possition = $('#newsTabsMainContent').position();
	
	var _innerHeight = $('#newsTabsMainContent').outerHeight();
	var _innerWidth = $('#newsTabsMainContent').outerWidth();
	var img = document.createElement("img");
	img.src= "/img/site-loader.gif";
	var _overlayDiv = document.createElement('div');

	
		
	//$(_overlayDiv).css({position:'absalute','top':_possition.top+"px",'left':_possition.left+"px",width:_innerWidth,height:_innerHeight});
	
	_overlayDiv.style.zIndex = 12;
	_overlayDiv.id = 'loading';
		
	img.style.marginTop = Math.round(_innerHeight/2)+"px";
	img.style.marginLeft = Math.round(_innerWidth/2)+"px";
	/*$(_overlayDiv).append(img);*/
	$('#newsTabsMainContent').html('');
	 $('#newsTabsMainContent').append(_overlayDiv);

	$(this).addClass('newsTabActive');
	var _path = $(this).attr('rel');
	
	$.post(_path,function(data)
						  { 
						  $('#newsTabsMainContent').html(data); 		$("#accordion").accordion({clearStyle: true });
						  
						  })
	}catch(e)
	{
		alert(e.message);
	}
}

function effectExecuteInit()
{
	
	$('.effectExecute').click( function() { 
											var _smal_id = "#news-"+this.id; 
											 $('.effectBlock').fadeOut();
											 
											 $('.effectExecuteActive').addClass('effectExecute');
											 $('.effectExecute').removeClass('effectExecuteActive');
											 
											 $(_smal_id).fadeIn();
											 
											 $(this).removeClass('effectExecute');
											 $(this).addClass('effectExecuteActive');
											
											
										});
	$('.effectExecute:first').trigger('click');
	  
}
var NewsLineIndex = 0;

var selectNextNews=function()
{


	var _elem = $(".NewsLine_a").next();	
	var _cur = $(".NewsLine_a");
	
	if($(_cur).hasClass("last"))
	{
		
	    $(".NewsLine:first").trigger("mouseover");	
	}
	else
	$(_elem).trigger("mouseover");	
}
var _Interval = null;
var _setTimeout = null;
$(document).ready
(
 function()
 {
	_Interval =  window.setInterval("newsTimmer()",2000);

  }
);

var newsTimmer = function()
{
	if(_Interval)
	window.clearInterval(_Interval);
	selectNextNews();

	_setTimeout = window.setTimeout("newsTimmer()",5000);
}