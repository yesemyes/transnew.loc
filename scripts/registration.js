var successCallBack = function(data){ alert(data)}
$(document).ready(function() {
var loader = $('#signupFormLaoder');
loader.hide();				
$().ajaxStart(function() {
			

			loader.show();
		}).ajaxStop(function() {
			
			loader.hide();
		}).ajaxError(function(a, b, e) {
			throw e;
		});
});



