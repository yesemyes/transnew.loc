function __initLagData()
{

$('#addButton').click( function() {addButtonFunction()} );
$('#saveNewRows').click( function() {saveNewRowsFunction()} );

$('#reloader').click( function() 
							   { 
									path = $('#_ldataSabveAjaxPath').val();
									$(this).before("<img src='images/ajax-loader.gif' id='ldataLoader' />");
									$.ajax({   
											url:path,
											type:"post",
											data:
											{
												action:'saveDbToFile'
											},
										    success:sucsessSave,
										    error:errorSave
									});
							   
							   
							   } );

$('.cell-t-value').dblclick( function()
								   { 
								  _spanToInput(this)
							   
								   });

}

function _spanToInput(t)
{
	
									 var _input = document.createElement('input');
								   _input.id = $(t).attr('id')+'_input';
								   _input.value = $(t).html();
									$(t).replaceWith($(_input));
									_input.focus();
									$(_input).blur( function(){ elementBlure(_input);});
									$(_input).keyup( function(event){
															  if(event.keyCode == '13')
															  	elementBlure(_input);
															  });
} 
var elementBlure=function(inp)
{
	
	
	
	var _span = document.createElement('span');
	_span.id = inp.id.replace('_input','');
	_span.className = 'cell-t-value';
	$(_span).html($(inp).val());
	$(inp).replaceWith($(_span));
	$(_span).dblclick( function(){_spanToInput(_span)});
	saveMeInp(inp);
	
	
}

var chechkForUniqiue=function(elem)
{
	
	if(!elem.value)
	{
		$(elem).addClass('haserror');
		elem.focus();
		return;
	}
	var same = $(".langdata-row:contains('"+elem.value.toUpperCase()+"')");
	path = $('#_ldataSabveAjaxPath').val();
	$.ajax({url:path,
			   type:"post",
			   data:{ action:'checkForUnique',term:elem.value},
			   dataType:'json',
			   success:function(_data){ if(_data) { $(elem).addClass('haserror'); alert(jsLngdata.FIELD_UNIQUE_ERROR); elem.focus(); }else{$(elem).removeClass('haserror'); } }
			   
		      });
}
function addButtonFunction()
{
	try{
	//$('.langdata-row:last').hide();
	x= $(".langdata-row:first").clone();
	x.addClass("new-row"); 
	
	x.find('>td').each( function () 
								  {
									  
									  var _index=$('.new-row').length;
									  
									  if(this.id)
									  {
								  		$(this).attr("id" , this.id+"-new");
										$(this).html("");
										var np = CrNewInpField(this.className,-1,_index);
										$(this).append( np);
										$(np).change( function(){chechkForUniqiue(this)});
										
										
									  }
									  else
									  {
										 var _sSpan =$(this).find("span:first"); 
										  
										  if(!_sSpan.length)
										  return;
										  _id=_sSpan.attr('id');
										  _class=_sSpan.attr('class');
										  
										 _class=_class.split("-");
										 
										 
										   
										 
										 _id = _id.split("_");
										 _id.pop();
										 var _lngId = _id.pop();
										 
										 
										// _class.push(_lngId);
										 
										 _class = _class.join("_");
										
										
										 
										$(this).html("");
									  	$(this).append( CrNewInpField(_class,_lngId,_index));
									  }
								 
								  } 
								  
								  );
	$(".langdata-row:last").after(x);

	}catch(Ex){ alert(Ex)}
}
function saveMeInp(elem)
{
	path = $('#_ldataSabveAjaxPath').val();
	//alert($(elem).val());
	$('#reloader').before("<img src='images/ajax-loader.gif' id='ldataLoader' />");
	$.ajax(
		   {   
		   	   url:path,
			   type:"post",
			   data:{
				    	action:'saveToDb',
				    	sendDataId:$(elem).attr('id'),
				    	sendDataValue:$(elem).val()
				   },
			   success:sucsessSave,
			   error:errorSave
			 }
			);
}

function errorSave(Xhr,m,s)
{
	alert(Xhr.responseText);
}
function sucsessSave(datta)
{
	//alert(datta);
	$('#ldataLoader').remove();
}

function CrNewInpField(className,lng_id,_index)
{
	var _inp = document.createElement("input");
	if(lng_id > 0)
	_inp.name=className+"["+_index+"]["+lng_id+"]";
	else
	_inp.name=className+"["+_index+"]";
	
	_inp.className=className+' newIput';
	_inp.id =  className+"-"+_index;
	return $(_inp);

}

function saveNewRowsFunction()
{
	var _isExistNew = $('.newIput').length;
	if(_isExistNew)
	{
	$('.newIput').removeClass('haserror');
	$('.newIput').each(
					   function()
					   {
						   if($(this).hasClass('cell-name'))
						   {
							   chechkForUniqiue(this);
							}
						   var _val=$(this).val() ;
						   if(!_val)
						   {
							   $(this).addClass('haserror');
						   }
						   
						  
					   }
					   )
	var _errorsCels = $('.haserror');
	//alert(_errorsCels);
	if(_errorsCels.length > 0)
	{
		alert(jsLngdata.FILL_ALL_INPUTS);
		return;
	}
	
	path = $('#_ldataSabveAjaxPath').val();
	_data = $('#langdata-tpl').serialize();

	_path   = $('#langdata-tpl').attr("action");
	_method =$('#langdata-tpl').attr("post");
	
	$.ajax({   url:path,
			   type:'post',
			   data:_data,											
			   success:sucsessSaveAll,
			   error:errorSave
									});
	
	}else
	{
		jsLngdata.NO_NEW_NODES;
	}
}

function sucsessSaveAll(_data)
{

	path = $('#_ldataLoadAjaxPath').val();
	
	
	$.get(path,function(data){ 
						$('#main-tpl').replaceWith(data);
						__initLagData();
						});
	
}


function removeLngData(ID)
{
	if(confirm(jsLngdata.CONFIRM_DELETE))
	{
			$("#LDR"+ID).css({opacity:'0.3'});
				_path   = $("#LDR"+ID).attr("rel");


			$.post(_path,{'id':ID,action:"deleteRow"},function(data){ $("#LDR"+ID).hide(250,function(){$(this).remove()}) ; })
			
	}
	
} 

var doSearch = function(t)
{
	$(".langdata-row").show();
	if(t.value.length > 1){
	$(".langdata-row:not(:contains('"+ t.value.toUpperCase()+"'))").hide();
	}
}
__initLagData();