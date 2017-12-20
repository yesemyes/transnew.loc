<?php /* Smarty version 2.6.26, created on 2017-02-03 08:42:42
         compiled from users/registration.tpl.js */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/registration.tpl.js', 140, false),)), $this); ?>
<?php echo '
var invalidHandlerF = function(form, validator) {
	var errors = validator.numberOfInvalids();
	if (errors) {
		var message = errors == 1 ? \'You missed 1 field. It has been highlighted\'
				: \'You missed \' + errors
						+ \' fields. They have been highlighted\';
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
													\'data-position\');
											var myPos = "right";
											if (atPos == undefined) {
												atPos = "right";
											}
											if (atPos == \'right\') {
												myPos = "left";
											}
											$(error).css({
												position : \'absolute\',
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
													\'url\' : "'; ?>
<?php echo $this->_tpl_vars['this']->path; ?>
<?php echo '?action=ajax&method=checkLogin"
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
													\'url\' : "'; ?>
<?php echo $this->_tpl_vars['this']->path; ?>
<?php echo '?action=ajax&method=checkEmail"
												}
											},
											topic : {
												required : "#newsletter:checked",
												minlength : 2
											},
                                            /*	data_currentcar_brand_model : {
												required : function() {
													return $(
															\'#data_currentcar_brand_model\')
															.val() > 0
												},
												min : 1

											},
											data_currentcar_brand : {
												required : function() {
													return $(
															\'#data_currentcar_brand\')
															.val() > 0
												},
												min : 1

											},*/
											captcha : {
												required : true,
												remote : {
													\'url\' : "'; ?>
<?php echo $this->_tpl_vars['this']->path; ?>
<?php echo '?action=ajax&method=checkCaptcha"
												}
											}
										},
										messages : {
											data_name : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'please_enter_a_username'), $this);?>
<?php echo '",

											data_day : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'day_required'), $this);?>
<?php echo '",
											data_month : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'month_required'), $this);?>
<?php echo '",
											data_year : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'year_required'), $this);?>
<?php echo '",
											captcha : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'captcha_required'), $this);?>
<?php echo '",
												remote : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'captcha_invlaid'), $this);?>
<?php echo '"
											},
											data_login : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'please_enter_a_login'), $this);?>
<?php echo '",
												minlength : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'your_username_must_contanin'), $this);?>
<?php echo '",
												remote : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'this_username_exist'), $this);?>
<?php echo '"
											},

											data_password : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'please_provide_a_password'), $this);?>
<?php echo '",
												minlength : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'your_password_must_be'), $this);?>
<?php echo '"
											},
											re_password : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'your_password_must_be'), $this);?>
<?php echo '",
												minlength : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'your_password_must_be'), $this);?>
<?php echo '",
												equalTo : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'please_enter_the_same_password_as_above'), $this);?>
<?php echo '"
											},
											user_phone1_code : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'phone_code_required'), $this);?>
<?php echo '",
												digits : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'phone_code_only_digits'), $this);?>
<?php echo '"
											},
											user_phone2_code : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'only_digits'), $this);?>
<?php echo '",
											user_phone1 : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'phone_required'), $this);?>
<?php echo '",
												digits : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'phone_only_digits'), $this);?>
<?php echo '"
											},
											user_phone2 : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'only_digits'), $this);?>
<?php echo '",
										/*	data_currentcar_brand_model : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'currentcar_brand_model_is_required'), $this);?>
<?php echo '"
                    
											},
                                            
                                            data_currentcar_brand : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'currentcar_brand_is_required'), $this);?>
<?php echo '"
                    
											},*/
											data_email : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'email_address_required'), $this);?>
<?php echo '",
												email : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'email_address_invalid'), $this);?>
<?php echo '",
												remote : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'email_address_exist'), $this);?>
<?php echo '"

											}
										}
									});
				});
/*'; ?>
*/