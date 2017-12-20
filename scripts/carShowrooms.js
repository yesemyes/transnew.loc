$(document).ready( function(){
                            if (latitude != "" && longitude != ""){
                            
                            var latLng = new google.maps.LatLng(latitude, longitude);
                            var mapOptions ={
							zoom : 16,
							center : latLng,
							mapTypeId : google.maps.MapTypeId.ROADMAP
							};
							map = new google.maps.Map(document.getElementById("map_main_canvas"),mapOptions); 
							var marker = new google.maps.Marker({position: latLng,map: map});

    }
    
    
	var holder = $("#user-list");
	
	$.ajax (
	{
		url:holder.attr('data-href'),
		context:holder,
		success:function(data)
		{
			$(this).html(data);
			console.clear();
			initOffersLIstAjax(this);
		}
	});
	
	$(".user-offer-filter-by-brand").click(function()
	{
		$(".user-offer-filter-by-brand").removeClass('act');
		$(this).addClass('act');
		$.ajax (
		{
			url:this,
			context:holder,
			success:function(data)
			{
				$(this).html(data);
				 console.clear();
				initOffersLIstAjax(this);
			}
		});
			return false;
		})
});

var initOffersLIstAjax = function (me)
{
	$('a.offerList_title, a.offerList_title2, a.offerListPaginator',me).click(function()
	{
		var aMe = this;
		$.ajax(
		{
			url:$(aMe).attr("href"),
			context:me,
			success:function(data)
			{
				$(me).html(data);
				
				
				initOffersLIstAjax(me);
				
			}
		})
		return false;
		
	});
}