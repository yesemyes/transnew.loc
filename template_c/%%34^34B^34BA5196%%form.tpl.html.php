<?php /* Smarty version 2.6.26, created on 2017-02-02 17:18:33
         compiled from contacts/form.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'contacts/form.tpl.html', 13, false),array('modifier', 'session_name', 'contacts/form.tpl.html', 31, false),array('modifier', 'session_id', 'contacts/form.tpl.html', 32, false),)), $this); ?>
<script type="text/javascript" language="javascript" src="/scripts/jquery.validate.js" ></script>
<script type="text/javascript" language="javascript" src="/scripts/registration.tpl.js" ></script>
 <br class="cb" />
<form id="contactsForm" name="contactsform" action="<?php echo $this->_tpl_vars['this']->path; ?>
" method="post">
<div class="errors" id="errors"></div>
  <br class="cb" />
  <br class="cb" />
<table cellspacing='5'>
<tr>
	<td><label for="contacts_name" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'name'), $this);?>
</label></td>
	<td style="height:35px;"><input type="text" name="contacts[name]" id="contacts_name" class="inp margL10"/></td>
</tr>
<tr>
	<td><label for="contacts_mail"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'USER_EMAIL'), $this);?>
</label></td>
	<td style="height:35px;"><input type="text" name="contacts[mail]" id="contacts_mail" class="fl inp margL10"/></td>
    <tr>
	<td><label for="contacts_subject" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'subject'), $this);?>
</label></td>
    <td style="height:35px;"><input type="text" name="contacts[subject]" id="contacts_subject" class="inp margL10"/></td>
    </tr>
    
</tr>
<tr>
	<td><label for="contacts_message" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'message'), $this);?>
</label></td>
	<td colspan="3"><textarea name="contacts[message]" id="contacts_message" class="txtarea margL10"></textarea></td>
</tr>
<tr>
    <td></td>
	<td><?php $this->assign('ssName', session_name("")); ?>
  <?php $this->assign('ssId', session_id("")); ?> <img  src="/kcaptcha/index.php" id="captImage" class="margL10 fl"/><input type="text" name="captcha" id="captcha"   class="margL10 code fl"  />
   <input type="button" name="reload" value="reload" onclick="reloadCaptcha()" class="login-btn fl" /></td>
  <td></td>
  </tr>
  <tr>
  <td></td>
  <!--<td colspan="2" style="text-align: center;"><input type="text" name="captcha" id="captcha"   class="margL10 code fl"  />
   <input type="button" name="reload" value="reload" onclick="reloadCaptcha()" class="login-btn fl" /></td>-->
    
</tr>
</table>

  
  <br class="cb" />
  <br class="cb" />
  <div class="btnbord">
                <span class="yelbtn2 fl margR5"></span>
    <div class="yelbtn1"><input type="submit" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_submit'), $this);?>
" class="pointer" /></div>
    <span class="yelbtn2 fl"></span>

  </div>
</form>
<?php echo '
<script language="javascript" type="text/javascript" >

var rules= {};
rules["contacts[name]"]                   ={required:true};
rules["contacts[mail]"]                   ={required:true,email:true};
rules["contacts[subject]"]                ={required:true};
rules["contacts[message]"]                ={required:true};
rules["captcha"]                          ={required: true,remote: {\'url\':"'; ?>
<?php echo $this->_tpl_vars['this']->path; ?>
<?php echo '?action=ajax&method=checkCaptcha"}};
messages={};


messages["contacts[name]"]                   ="'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'err_name'), $this);?>
<?php echo '";
messages["contacts[mail]"]                   ={required:"'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'err_email'), $this);?>
<?php echo '",email:"'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'err_email_exists'), $this);?>
<?php echo '"};
messages["contacts[subject]"]                ="'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'err_subject'), $this);?>
<?php echo '";
messages["contacts[message]"]                ="'; ?>
<br/>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'err_message'), $this);?>
<?php echo '";
messages["captcha"]                          ="'; ?>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'err_captcha'), $this);?>
<?php echo '";
$(document).ready(function() {	
   try{
   $("#contactsForm").validate({rules:rules,messages:messages});
   }catch(e){alert(e.message)}
   });
</script>
'; ?>