/*{literal}*/
var invalidHandlerF = function(form, validator) {
	var errors = validator.numberOfInvalids();
	if (errors) {
		var message = errors == 1 ? 'You missed 1 field. It has been highlighted'
				: 'You missed ' + errors
						+ ' fields. They have been highlighted';
		$("div.error span").html(message);
		$("div.error").show();
	} else {
		$("div.error").hide();
	}
}
// JavaScript Document
$(document).ready(function(){$("select.uni").uniform();
var rules = {};
rules["company[title]"] = {
	required : true,
    digits : false
};
rules["company[email]"] = {
    email : true,
	remote : {
	'url' : "{/literal}{$this->path}{literal}?action=ajax&method=checkEmail"
	}
};
rules["company[phone]"] = {
	required : true,
    digits : true,
};
rules["company[addres]"] = {
	required : true,
};

     					$("#signupForm")
							.validate(
									{
									    rules : rules,
										messages : _messages,
                                       
										errorPlacement : function(error,
												element) {

											var atPos = $(element).attr(
													'data-position');
											var myPos = "left";
											if (atPos == undefined) {
												atPos = "left";
											}
											if (atPos == 'left') {
												myPos = "left";
											}
											$(error).css({
												position : 'absolute',
											})
											.click(function()
													{
														$(this).hide(250);
													}).insertAfter(element);
											var positionSettings = {
												of : $(element),
												my : myPos,
												at : atPos,
												offset : "0 10",
												collision : "fit fit"
											};

											var s = $(error).position(
													positionSettings);
											console
													.log(
															"errorPlacement(error, element)",
															s);
										},
										
									});           
                
                
/*{/literal}*/


});