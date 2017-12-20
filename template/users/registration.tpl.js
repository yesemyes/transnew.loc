{
	literal
}
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
$(document)
		.ready(
				function() {
					$("#signupForm")
							.validate(
									{
										errorPlacement : function(error,
												element) {

											var atPos = $(element).attr(
													'data-position');
											var myPos = "right";
											if (atPos == undefined) {
												atPos = "right";
											}
											if (atPos == 'right') {
												myPos = "left";
											}
											$(error).css({
												position : 'absolute',
												width : 150
											})
											.click(function()
													{
														$(this).hide(250);
													}).insertAfter(element);
											var positionSettings = {
												of : $(element),
												my : myPos,
												at : atPos,
												offset : "0 0",
												collision : "fit fit"
											};

											var s = $(error).position(
													positionSettings);
											console
													.log(
															"errorPlacement(error, element)",
															s);
										},
										rules : {

											data_name : {
												required : true
											},
											data_day : {
												required : true
											},
											data_month : {
												required : true
											},
											data_year : {
												required : true
											},

											data_login : {
												required : true,
												minlength : 3,
												remote : {
													'url' : "{/literal}{$this->path}{literal}?action=ajax&method=checkLogin"
												}
											},
											data_password : {
												required : true,
												minlength : 5
											},
											user_phone1_code : {
												digits : true,
												required : true
											},
											user_phone2_code : {
												digits : true
											},
											user_phone1 : {
												digits : true,
												required : true
											},
											user_phone2 : {
												digits : true
											},
											re_password : {
												required : true,
												minlength : 5,
												equalTo : "#data_password"
											},
											data_email : {
												required : true,
												email : true,
												remote : {
													'url' : "{/literal}{$this->path}{literal}?action=ajax&method=checkEmail"
												}
											},
											topic : {
												required : "#newsletter:checked",
												minlength : 2
											},
                                            /*	data_currentcar_brand_model : {
												required : function() {
													return $(
															'#data_currentcar_brand_model')
															.val() > 0
												},
												min : 1

											},
											data_currentcar_brand : {
												required : function() {
													return $(
															'#data_currentcar_brand')
															.val() > 0
												},
												min : 1

											},*/
											captcha : {
												required : true,
												remote : {
													'url' : "{/literal}{$this->path}{literal}?action=ajax&method=checkCaptcha"
												}
											}
										},
										messages : {
											data_name : "{/literal}{Trans param='please_enter_a_username'}{literal}",

											data_day : "{/literal}{Trans param='day_required'}{literal}",
											data_month : "{/literal}{Trans param='month_required'}{literal}",
											data_year : "{/literal}{Trans param='year_required'}{literal}",
											captcha : {
												required : "{/literal}{Trans param='captcha_required'}{literal}",
												remote : "{/literal}{Trans param='captcha_invlaid'}{literal}"
											},
											data_login : {
												required : "{/literal}{Trans param='please_enter_a_login'}{literal}",
												minlength : "{/literal}{Trans param='your_username_must_contanin'}{literal}",
												remote : "{/literal}{Trans param='this_username_exist'}{literal}"
											},

											data_password : {
												required : "{/literal}{Trans param='please_provide_a_password'}{literal}",
												minlength : "{/literal}{Trans param='your_password_must_be'}{literal}"
											},
											re_password : {
												required : "{/literal}{Trans param='your_password_must_be'}{literal}",
												minlength : "{/literal}{Trans param='your_password_must_be'}{literal}",
												equalTo : "{/literal}{Trans param='please_enter_the_same_password_as_above'}{literal}"
											},
											user_phone1_code : {
												required : "{/literal}{Trans param='phone_code_required'}{literal}",
												digits : "{/literal}{Trans param='phone_code_only_digits'}{literal}"
											},
											user_phone2_code : "{/literal}{Trans param='only_digits'}{literal}",
											user_phone1 : {
												required : "{/literal}{Trans param='phone_required'}{literal}",
												digits : "{/literal}{Trans param='phone_only_digits'}{literal}"
											},
											user_phone2 : "{/literal}{Trans param='only_digits'}{literal}",
										/*	data_currentcar_brand_model : {
												required : "{/literal}{Trans param='currentcar_brand_model_is_required'}{literal}"
                    
											},
                                            
                                            data_currentcar_brand : {
												required : "{/literal}{Trans param='currentcar_brand_is_required'}{literal}"
                    
											},*/
											data_email : {
												required : "{/literal}{Trans param='email_address_required'}{literal}",
												email : "{/literal}{Trans param='email_address_invalid'}{literal}",
												remote : "{/literal}{Trans param='email_address_exist'}{literal}"

											}
										}
									});
				});
/*{/literal}*/
