// JavaScript Document

function setCookie(c_name,value,expiredays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate()+expiredays);
document.cookie=c_name+ "=" +escape(value)+
((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
}

function getCookie(c_name)
{
if (document.cookie.length>0)
  {
  c_start=document.cookie.indexOf(c_name + "=");
  if (c_start!=-1)
    {
    c_start=c_start + c_name.length+1;
    c_end=document.cookie.indexOf(";",c_start);
    if (c_end==-1) c_end=document.cookie.length;
    return unescape(document.cookie.substring(c_start,c_end));
    }
  }
return "";
}


$(document).ready
(
 function()
 {
	
	try{
	wt = $('#wt');
	if(wt.length > 0)
	{
		var isView = getCookie('welcom_view');
		if(!isView)
		{
			$('#wt').colorbox({html:$('#wt').html(),open:true,maxWidth:520,innerHeight:300});
			setCookie('welcom_view',1,5);
		}
	}
	}
	catch(e){
		//alert(e.message);
		}
	
	 moraboutbrandOnClick();
	 
	__initSubMenus('.menu-item');
	
	
	$('.NewsLine').hover(function(){ 
						
							if(_setTimeout)
							{
								window.clearTimeout(_setTimeout);
							}
						    $('.NewsLine').removeClass('NewsLine_a');
						    $(this).addClass('NewsLine_a');
						    var _date = $(this).attr('rel');
						    $("#news_date").html(_date);
						    pic_ic="#pic_"+$(this).attr('id');
						    desc_ic="#desc_"+$(this).attr('id');
							$('.homeMainPic').fadeOut(25);
							$('.homeMainDesc').hide();
							$(pic_ic).fadeIn(750);
							$(desc_ic).show();
							
/*	  $('.homeMainPic').removeClass('home_active');
	  $(pic_ic).addClass('home_active');
	  $('.homeMainDesc').removeClass('home_active');
	  desc_id="#desc_"+$(this).attr('id');
	  $(desc_id).addClass('home_active');			  
*/								  }, function(){newsTimmer()})


	
	$("#jCarouselLiteDemoUrgent .default .jCarouselLite").jCarouselLite({
		auto: 1500,
		speed: 1500,
		visible:5,
		circular:false,
		btnNext: "#jCarouselLiteDemoUrgent .default .next",
		btnPrev: "#jCarouselLiteDemoUrgent .default .prev"
		
	});



	$(".newsticker-jcarousellite").jCarouselLite({
		vertical: false,
		hoverPause:true,
		visible: 5,
		auto:5000,
		speed:2000
	});
	}
 );



function __initSubMenus(selector)
{
	 $(selector).hover( _menuIn,_menuOut);	 
	 $('.upContentDiv').hover( function(){},hideSubMenu);
	 $('.menus').hover( function(){}, hideSubMenu);
	 
}
var hideSubMenu = function ()
{
		__hideCurrentMenu();
		__hideCurrentMenu2();
}

function __hideCurrentMenu()
{

		$('.sub-menu-dactive').slideUp(50);
		$('.sub-menu-dactive').addClass('sub-menu-d');
		$('.sub-menu-d').removeClass('sub-menu-dactive');
		

}
function __hideCurrentMenu2()
{
		$('.2sub-menu-dactive').slideUp(50);
		$('.2sub-menu-dactive').addClass('2sub-menu-d');
		$('.2sub-menu-d').removeClass('2sub-menu-dactive');
}

		

var _menuIn = function ()
{
	
		var _position = $(this).position();
		
		var _subElement = "#sub-menu-"+$(this).attr("rel");
		if($(_subElement).hasClass('sub-menu-dactive'))
			return 0;
		__hideCurrentMenu();		
		
		$(_subElement).css('left',_position.left);
		$(_subElement).html($(_subElement).html());
		$(_subElement).slideDown();
		$(_subElement).removeClass('sub-menu-d');
		$(_subElement).addClass('sub-menu-dactive');
		
		/**/
		var _subElement2 = "#2sub-menu-"+$(this).attr("rel");
		if($(_subElement2).hasClass('2sub-menu-dactive'))
			return 0;
		__hideCurrentMenu2();		
		
		$(_subElement2).css('left',0);
		$(_subElement2).html($(_subElement2).html());
		$(_subElement2).slideDown();
		$(_subElement2).removeClass('2sub-menu-d');
		$(_subElement2).addClass('2sub-menu-dactive');

}
var _menuOut = function ()
{

		var _subElement = "#sub-menu-"+$(this).attr("rel");
		var _subElement2 = "#2sub-menu-"+$(this).attr("rel");
}


var fillMyModels=function(value,where,path)
{
	

	if(value < 1)
	{
		removeOptions(where);
		$("#"+where).attr('disabled','disabled');
		return;
	}
	var _url =path+"?action=ajax&method=getModels";
//	alert(_url);
	$.ajax({url:_url,
		   data:{pid:value},
		   type:'GET',
		   dataType:'json',
		   success:function(data){ addOptionsTo(data,where)},
		   error:function(xHr,error){ alert(error);}
		   
		   })
}





var addOptionsTo=function(data,where)
{
	
	var _select = $("#"+where);
	
	removeOptions(where);
	$("#"+where).attr('disabled','disabled');
	for(var i = 0 , lim = data.length; i < lim ; i++)
	{
		
		
		if(data[i].subs)
		{

			var Ids = new Array();
			for(var j = 0 ; j < data[i].subs.length ;j++ ){

			Ids[Ids.length] = data[i]['subs'][j].id;
			}
				addOption(where,data[i].label,Ids.join(","));
			for(var j = 0 ; j < data[i].subs.length ;j++ ){

			var opt = addOption(where,""+data[i]['subs'][j].label,data[i]['subs'][j].id);		
			opt.style.paddingLeft = "25px";
			}
				
			
			
		}else
		{
			addOption(where,data[i].label,data[i].id);
		}
	}
	
	if(data.length > 0)
	{
		$("#"+where).attr('disabled','');
	}
}




function removeOptions(selectX)
{
	
  var elSel = document.getElementById(selectX);
  var i;
  var _optgroup=elSel.getElementsByTagName("optgroup");
 
  for (i = elSel.length - 1; i > 0; i--)
  {
     
      elSel.remove(i);
   
  }
  
  if( _optgroup.length > 0)
  {
	  for (i = _optgroup.length - 1; i >= 0; i--)
  		{
			 elSel.removeChild(_optgroup[i]);
		}
  }
}
function addOption(selectControl,option_text,option_value)
{
	
	selectElemObj = document.getElementById(selectControl);
	selectElemObj.options[selectElemObj.options.length] = new Option(option_text, option_value, false, false);
	return selectElemObj.options[selectElemObj.options.length-1];
	
	
}

var imageUploaded = function(imageName,path,pl)
{
		if(!pl){
		var _ajax = {}
		_ajax.url = path+"?external=true&itpl=users/imageblock.tpl.html&imagepath="+imageName;
	
		$.post(_ajax.url,function(data){$('#offer_photos').append(data)});
		}else
		{
			var _ajax = {}
		   _ajax.url = path+"?external=true&itpl=users/imageblock-main.tpl.html&imagepath="+imageName;
	
			$.post(_ajax.url,function(data){$('#'+pl).html(data)});
			//alert(imageName+","+path+","+pl);
		}
}

function removeMe(elem)
{
	$(elem).parent().parent().fadeOut(250,function(){$(this).remove()});
}

var defVars = {}
var removeHint = function(elem,type)
{
	if(type)
	{
		
		_default = $(elem).attr("default");
		if(_default == elem.value)
		elem.value = '';
		
		
	}else
	{
		_default = $(elem).attr("default");
		if(!elem.value)
		elem.value = _default  ;
	}
}

function reloadCaptcha(path)
{
		
		
	$("#captImage").attr('src','/kcaptcha/index.php?chk='+Math.random(150000));
	
	
}

function viewBig(_path,_path2)
{
		var _height=$("#bigImage").height();
		var _width=$("#bigImage").width();
		
	$("#bigImageDiv").css("width",_width);
	$("#bigImageDiv").css("height",_height);
	$("#bigImage2").attr('src',_path2);
	$("#bigImage").fadeOut(250,function(){this.src=_path; $(this).fadeIn(500)});
	
}

function offerTAbChange(s,h)
{
	$('#'+s).show(250);
	$('#'+h).hide(250);
	
	$('#TD'+s).addClass('actTd'); 
	$('#TD'+h).removeClass('actTd') 
}


function removeSelectedOffers(confirm_txt,no_selected_items)
{
	 var n = $(".deloffers:checked").length;
	 if(n > 0)
	 {
		 if(confirm(confirm_txt))
		 {
			$("#myCarsForm").submit();	 
		}
	 }else
	 {
		 alert(no_selected_items);
	  }
	 
	 return false;
}
$(document).ready
(
 function()
 {
	$("#jCarouselLiteDemo .default .jCarouselLite").jCarouselLite({
		auto: 1500,
		speed: 1500,
		visible:3,
		circular:false,
		btnNext: "#jCarouselLiteDemo .default .next",
		btnPrev: "#jCarouselLiteDemo .default .prev"
		
	});
	
	$("#jCarouselLiteDemo2 .default .jCarouselLite").jCarouselLite({
		auto: 1500,
		speed: 1500,
		visible:4,
		btnNext: "#jCarouselLiteDemo2 .default .next",
		btnPrev: "#jCarouselLiteDemo2 .default .prev"
	});   
 });

function checkCount(limit,message)
{
	
	var uupladeimage= $('.uupladeimage');
	if(uupladeimage.length > limit-1 ){
	alert(message);
	return false;
	}
	else
	return true;
}
function InitOfferPagePrices()
{
	$('.prices').hide();
	$('.prices:first').show();
	$('.prices:first').css({cursor:"pointer"});
	$('.prices:first').hover( function()
									   {
										   pos= $(this).position();
										   $('.prices:not(:first)').show(250, function(){ $('.prices:not(:first)').css({ 
																		float:'left', padding:'5px',background:'#333', color:"#AAA",margin:"5px"
																		
																		})
																										 });
										   
										   
																						  
										},function(){  });
	
}
var cnacelUpload = function(e)
{
	var myIframe = document.getElementById("myIframe");
	myIframe.src = myIframe.src+"?chk="+Math.random();
	uploadEnd();
}

var uploadStart=function()
{
	var splash = document.createElement("div");
	var cbutton = document.createElement("input");
	cbutton.style.marginLeft = "20%";
//	cbutton.style.marginTop = "20%";
	cbutton.className = "cbutton login-btn fr";
	cbutton.type = "reset";
	$(cbutton).click(cnacelUpload);
	splash.appendChild(cbutton);
	splash.id        = "splash";
	splash.className = "splash";

	var position = $("#ifContainer").position();
	var xouterHeight = $("#ifContainer").outerHeight()+20;
	var xouterWidth  = $("#ifContainer").outerWidth()+20;

	$(splash).css({"top":position.top,"left":position.left,"width":xouterWidth,"height":xouterHeight});
	$(splash).insertBefore($("#ifContainer"));
	
	
	
	
}
var uploadEnd = function()
{
	$("#splash").remove();
}

var moraboutbrandOnClick = function()
{
	$(".moraboutbrand").click( function()
									   {
										   //var _url = $(this).attr("src");
										   var _image = new Image();
										   _image.src= "/images/35-1.gif";
										   _image.style.position = "fixed";
										   _image.style.top="50%";
										   _image.style.left="50%";
										    _image.id = "moraboutbrandLoader";
										   document.body.appendChild(_image);
										  _this = this; 
										  _url = this+"?external=1&itpl=brand/curentbrand-more-ajax.tpl.html";
										  if( !$("#CurentBrand_full").hasClass('hidden'))
										  {
											 var _thisTxt = $(_this).text();
											 var _thisRel = $(_this).attr('rel');
											 $(_this).text(_thisRel);
											 $(_this).attr('rel',_thisTxt);
											 $( "#moraboutbrandLoader").remove();
											  $("#CurentBrand_full").slideUp(250,function(){  $("#CurentBrand_full").html(''); $("#CurentBrand_full").addClass('hidden');});
											  return false;
										  }
										   $.get(_url,function(data)
															   {
																   var _thisTxt = $(_this).text();
																   var _thisRel = $(_this).attr('rel');
																   
																   $(_this).text(_thisRel);
																   $(_this).attr('rel',_thisTxt);
																   
																   $("#CurentBrand_full").html(data);
																   $("#CurentBrand_full").removeClass('hidden');
																   $("#CurentBrand_full").slideDown(500);
																    $( "#moraboutbrandLoader").remove();
															   });
										   return false;
										})
}


