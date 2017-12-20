$(document).ready(function(e) {
    loadFilter();
	
	$('a.offerList_plus').live("click",function()
	{
		
		var dataId=$(this).attr('data-offer-id');
		
		var data = 
		{
			
			id:$(this).attr('data-offer-id'),
			img:$(this).attr('data-offer-img'),
			href:$(this).attr('href'),
			name:$(this).attr('data-name')
		};
		
		var savedItems = ReadCookie("___trans_info_saved_items");
        var saveingObject = {};
		console.log("savedItems",savedItems);
		if(savedItems != '')
		{
			saveingObjectTmp = $.parseJSON(savedItems);
			$('#show_list','#remove_list').hide(); 
			if(saveingObjectTmp)
			{
					saveingObject = saveingObjectTmp;
			}
			
		}
		//console.log("saveingObjectTmp",data);
		saveingObject[dataId] = data;
		
		setCookieMinutes("___trans_info_saved_items",JSON.stringify(saveingObject),20);
		$('#show_list,#remove_list').show();
		$(this).empty();
		$(this).addClass('offerList_added');
		
		return false;
	});
	
	/*api = $('.CarMainTbl').jScrollPane({
		showArrows : false,
		maintainPosition : true,
		stickToBottom : true
	}).data('jsp');*/
});

function loadFilter()
{
	$.ajax(
	{
		url:$('#resul_filter').attr('data-location'),
		context:$('#resul_filter'),
		complete: function(){$(this).removeClass('ui-autocomplete-loading');},
		beforeSend: function(){ $(this).addClass('ui-autocomplete-loading');},
		success:function(data)
		{
			
			$(this).html(data);
		}
	})
}