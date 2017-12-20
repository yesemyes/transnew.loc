$(document).ready
(
 function()
 {
	$("a[rel=fnacyImage]").fancybox({padding:0,'titleFormat' : function(title, currentArray, currentIndex,	currentOpts) { return title}});
 });