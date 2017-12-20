$(document).ready(function() {
  

  
 var icons = {
header: "ui-icon-circle-arrow-e",
activeHeader: "ui-icon-circle-arrow-s"
};

var gallerys = new Array();
$( ".accordion" ).accordion({
    collapsible: true,
    icons:icons,
    active: false, 
	activate: function( event, ui ) { console.log("activate");},
    beforeActivate: function( event, ui ) 
    {
		
			
        if( ui.newHeader.context == undefined)
		{
		
			return true;
		}
		
		var me = this;
		$( ".accordion" ).each(
		function(e,i)
		{
					if(me != i)
					{
						$(i).accordion("option", "active" ,false);
					}
		});
		
		if(ui.newPanel.html() != "")
		{
			return true;
		}
		
		$.fancybox.showActivity();
        $.ajax(
		{
           url: "/"+curLng+"/technical/AccordionContent",
           type: "POST",
           data: "id="+ui.newHeader.context.id,
           dataType: "json",
		   complete:function()
		   {
				$.fancybox.hideActivity();
		   },
           success: function(data)
           {
            
           
					
                        
					ui['newPanel'].html(data['content']);
					
					
					
					for(var inf in data.info)
					{
							var cur = data.info[inf];
							var Latitude = cur.latitude;
							var Longitude = cur.longitude; 

							var latLng = new google.maps.LatLng(Latitude, Longitude);


							var mapOptions ={
							zoom : 16,
							center : latLng,
							mapTypeId : google.maps.MapTypeId.ROADMAP
							};
							
							console.log('map_main_canvas_'+cur.id);
							var map = new google.maps.Map(document.getElementById('map_main_canvas_'+cur.id),mapOptions); 
							var marker = new google.maps.Marker({position: latLng,map: map});
							
							
							addGallery(cur.id);
                    
					};
           } 
        });
    }
});
});




function addGallery(id)
{
					var gallery = new Gallery();
					gallery.options.heightSmall	= 71;		
					var imagesArray = new Array();
					
					
					$('a.galleryItem',$("#tect_gallery_"+id)).each( 
					function(u,i)
					{
						var  data_sizes = $(i).attr('data-sizes').split('x');
						 
						imagesArray.push({small:$(i).attr('data-path-small'),big:$(i).attr('data-path-href'),width: data_sizes[0],height: data_sizes[1]});
						var old = 	$(i).remove();
					});
                    
                    gallery.build(imagesArray,$("#tect_gallery_"+id));
                    $('a.fancy-image' ,$("#tect_gallery_"+id)).click(function()
                    {
                        $("span:first",$(".gallery-thumbnails " ,$("#tect_gallery_"+id))).trigger('click');
                        return false;
                        
                        
                    });
					
					return gallery;
}
