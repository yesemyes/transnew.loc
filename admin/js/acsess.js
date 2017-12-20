function InitView()
{
	
	
	$('.ug-span').click(function()
								 {
									_path = $(this).attr("rel");
										$('#actype-place').html('<img src=images/ajax-loader.gif" alt="" />');
									$.get(_path,
										       function(data)
											   {
												   $('#actype-place').html(data);
												   chbClick();
												   });
								 }
								 )
	
}

function chbClick()
{
	$('input[name^=VIEW]').click( function()
										  {
											  try{
											  var this_id = this.id;
											  var IDS = new Array();
											  IDS[0] =this_id.replace('chVIEW',"#chADD");
											  IDS[1] =this_id.replace('chVIEW',"#chEDIT");
											  IDS[2] =this_id.replace('chVIEW',"#chDELETE");
											  var jQIDS = IDS.join(",");
											  
											  if(this.checked)
											  {
												  $(jQIDS).attr('disabled',false);
												  $(jQIDS).each( function(i,e){
																			var repl ='ch'+e.className+'-';
																			
																			var id= e.id.replace(repl,'');
																			chStatus(e,id)
																			
																		})
											  }else
											  {
												  $(jQIDS).attr('disabled',true)
												          .attr('checked',false);
														  
													$(jQIDS).each( function(i,e)
																		{
																			var repl ='ch'+e.className+'-';
																			var id= e.id.replace(repl,'');
																			chStatus(e,id)
																			
																		}
																 )		  
											  }
											  }catch(e){ alert(e.message)}
										  })
}
function chStatus(elem,id)
{
	_class = elem.className+"-"+id;
	$('.'+_class).each( function(i,e)
									{
										
										if(elem.checked)
										{
											e.disabled = false;
											e.checked = true;
										}else
										{
											e.checked = false;
											e.disabled = true;
										}
									}
								);
}
function submitMe(elem)
{
	var _form = elem.form;
	var _path = _form.action;
	var _data = $(_form).serialize();
	$('#actype-place').html('<img src=images/ajax-loader.gif" alt="" />');
	$.post(_path,_data,function(data){ $('#actype-place').html(data)});
	
}
InitView();
