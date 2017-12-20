<?php /* Smarty version 2.6.26, created on 2017-02-03 02:27:44
         compiled from users/forgot.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/forgot.tpl.html', 59, false),)), $this); ?>
<script type="text/javascript" language="javascript" src="/scripts/jquery.validate.js"></script>


<?php echo '
<script type="text/javascript" language="javascript" >
// JavaScript Document
$(document).ready(function() {
						   try{
$("#signupForm").validate({errorLabelContainer: $("#signupForm div.errors"),
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
												width : 200
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
											
										},
		rules: {
			data_email: {
				required: true,
				email:    true,
				remote:   {\'url\':"'; ?>
<?php echo $this->_tpl_vars['this']->path; ?>
<?php echo '?action=ajax&method=CheckEmailExist"}
			}
            ,
            
            captcha : {
												required : true,
												remote : {
													\'url\' : "'; ?>
<?php echo $this->_tpl_vars['this']->path; ?>
<?php echo '?action=ajax&method=checkCaptcha"
												}
											}
		},
		messages: {
			data_email:{
						 required:"'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'email_address_required'), $this);?>
<?php echo '", 
						 email:"'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'email_address_invalid'), $this);?>
<?php echo '", 
						 remote:   "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'email_address_not_exist'), $this);?>
<?php echo '"
						 }
                         ,
        captcha : {
												required : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'captcha_required'), $this);?>
<?php echo '",
												remote : "'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'captcha_invlaid'), $this);?>
<?php echo '"
											}
		}
	});
						   }catch(e){alert(e.message);}
});


</script>

'; ?>

<div class="blueleft"><?php echo $this->_tpl_vars['this']->currentPage['label']; ?>
</div>
<div class="blueright"></div>
<div style="width:590px;display:none" id="signupFormLaoder"><img src="/images/ajax-loader.gif"/></div>
<form action="<?php echo $this->_tpl_vars['this']->path; ?>
" method="post" id="signupForm" name="signupForm">
    <div class="error"> </div>
      <br class="cb" />
      <br class="cb" />
      
<table cellpadding="5" class="table20">
    <tr>
        <td>
                <span class="forgot_label">
                      <label for="data_email"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_email'), $this);?>
</label>
                </span>
        </td>
        <td>
            
                      <input style="margin: 0;"  type="text" name="data_email" id="data_email" class="sinp2"/>
            
        </td>
    </tr>
    <tr>
        <td>
            <span class="forgot_label fl" style="font-size: 1em;">
                  <label for="captcha"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'input_code'), $this);?>
</label>
            </span>
        </td>
        <td>
            <div class="fl">    
                   <div class="fl">  
                  <img  src="/kcaptcha/index.php" id="captImage" class="fl"/>
                  </div>
                  <div class="fl">
                    <input style="margin: 0;" type="button" name="reload" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'reload_captch','default' => '????????, ???? ?? ????? ???'), $this);?>
" onclick="reloadCaptcha()" class="login-btn fl reload-btn" /><br />
                    <input style="margin: 31px 10px 10px 10px;" type="text" name="captcha" id="captcha"   class="code fl"  style="margin-left: 230px; margin-top: 10px;"/>
                  </div>
                  <br class="cb"/>
                  <span class="borderLine"></span>
            </div>
        </td>
        
    </tr>
    <tr>
        <td></td>
        <td>
            <div class="yelbtn1" style="width: 150px;margin: 0 auto;"><input style="width: 150px" type="submit" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_submit'), $this);?>
" class="pointer" /></div>
        </td>
    </tr>
</table>      

    
</form>