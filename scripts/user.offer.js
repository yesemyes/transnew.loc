$(document).ready(
function(){
gallery = new Gallery();
gallery.options.heightSmall	= 71;		
var imagesArray = new Array();
$('a',$('.gallery-thumbnails ')).each( function(u,i)
{
		var  data_sizes = $(i).attr('data-sizes').split('x');
		console.log(i,$(i).attr('data-sizes'));
		imagesArray.push({small:$(i).attr('data-path-small'),big:$(i).attr('data-path-href'),width: data_sizes[0],height: data_sizes[1]});
		var old = 	$(i).remove();
		 
		 
		 
});

gallery.build(imagesArray,$('#user_offer_images'));

$(".fancy-image").click( function()
{
	$("span:first",$(".gallery-thumbnails ")).trigger('click');
	return false;
})
});