<?php /* Smarty version 2.6.26, created on 2017-02-03 02:27:50
         compiled from users/registration.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/registration.tpl.html', 30, false),array('function', 'StaticText', 'users/registration.tpl.html', 108, false),array('modifier', 'session_name', 'users/registration.tpl.html', 124, false),array('modifier', 'session_id', 'users/registration.tpl.html', 125, false),)), $this); ?>
<?php echo '
<style>
label.error
{
    width: auto!important; 
}
</style>
'; ?>

<div style="margin-left: 27px;">    <br class="cb" />
    <span style="width: 695px;
float: left;">
    <?php echo $this->_tpl_vars['this']->currentPage['content']; ?>
 
    </span>
</div>
<br class="cb" />
<div style="height: 1px;
width: 695px;
background-color: #1d5465;margin: 30px 0 30px 27px;">    
</div>
<div style="width:590px; margin:0 auto" id="signupFormLaoder">
    <img src="/images/ajax-loader.gif"/>
</div>
<div style="width:695px;" id="signupFormContiner">
  <form action="<?php echo $this->_tpl_vars['thia']->path; ?>
"  method="post" id="signupForm"  autocomplete="off">
    <div style="clear:both; width:590px" class="error"> </div>
    <div class="fl"> 
      <span class="formtit  textR fl  pad10_0 ">          
          <div style="width: 200px;float: left;margin-left: 30px;">
          <label for="data_login"  class="req_field fl" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_login'), $this);?>
</label>
          </div>
          <input type="text" name="data_login" id="data_login" class="inp fl"  />
      </span>
      <br class="cb" />
      <span class="formtit  textR fl  pad10_0 ">
          <div style="width: 200px;float: left;margin-left: 30px;">
      <label for="data_password" class="req_field fl"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_password'), $this);?>
</label>
          </div>
      <input type="password" name="data_password" id="data_password"  class="inp fl" />
      </span>
      <br class="cb" />
      <span class="formtit  textR fl  pad10_0 ">
          <div style="width: 200px;float: left;margin-left: 30px;">
      <label for="re_password" class="req_field fl"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_re_password'), $this);?>
</label>
          </div>
      <input type="password" name="re_password"  id="re_password" class="inp fl" />
      </span>
      <br class="cb" />
      <span class="formtit  textR fl  pad10_0 ">
          <div style="width: 200px;float: left;margin-left: 30px;">
      <label for="data_email" class="req_field fl"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_email'), $this);?>
</label>
          </div>
      <input type="text" name="data_email" id="data_email" class="inp fl" />
      </span>
      <br class="cb" />
      <span class="formtit  textR fl  pad10_0 ">
          <div style="width: 200px;float: left;margin-left: 30px;">
      <label for="data_name" class="req_field fl"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_name'), $this);?>
</label>
          </div>
      <input type="text" name="data_name" id="data_name"  class="inp fl" />
      </span> 
      <br class="cb" />
            
      <br class="cb" />      <div  style="margin-left: 30px;margin-top: 20px;font-size: 0.917em;">
      <?php echo $this->_plugins['function']['StaticText'][0][0]->function_staticText(array('alias' => 'reg_content','lng_id' => $this->_tpl_vars['this']->defLng['id'],'assign' => 'text'), $this);?>


        <span><?php echo $this->_tpl_vars['text']; ?>
</span>
      </div>
            <br class="cb" />
      <span class="formtit  textR fl  pad10_0 ">
          <div style="width: 200px;float: left;margin-left: 30px;">
      <label class="req_field fl"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'input_code','default' => 'Введите код с картинки'), $this);?>
</label>
          </div>      
          <div style="float: left">
      <?php $this->assign('ssName', session_name("")); ?>
      <?php $this->assign('ssId', session_id("")); ?> 
      <img  src="/kcaptcha/index.php" id="captImage" class="fl"/>
      <input type="button" name="reload" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'reload_captch','default' => 'Обновить, если не виден код'), $this);?>
" onclick="reloadCaptcha()" class="login-btn fl reload-btn" />
      </div>
      </span>
      <br class="cb" />
      <input type="text" name="captcha" id="captcha"   class="code fl"  style="margin-left: 230px; margin-top: 10px;"/>
      <br class="cb" />
      <div style="margin-left: 230px;
margin-top: 20px;height: 90px">
        <div class="yelbtn1 fl">
          <input type="submit" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_submit'), $this);?>
" class="sbtn" />
        </div>
        <span class="yelbtn2 fl"></span> </div>
    </div>
  </form>
</div>
<br class="cb" />