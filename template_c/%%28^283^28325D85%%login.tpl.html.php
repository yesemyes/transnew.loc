<?php /* Smarty version 2.6.26, created on 2017-02-02 17:18:44
         compiled from users/login.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/login.tpl.html', 11, false),array('function', 'Link', 'users/login.tpl.html', 14, false),)), $this); ?>
<div class="protext">
    <?php echo $this->_tpl_vars['this']->currentPage['content']; ?>

</div>
<br class="cb"/>
<div>
    <div class="loginLeft fl">
        <div id="uLogin2" data-ulogin="display=panel;fields=email,sex,photo,photo_big,first_name,last_name;providers=facebook,odnoklassniki;hidden=;redirect_uri=http%3A%2F%2F<?php echo $_SERVER['HTTP_HOST']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['0']; ?>
/users/login.html"></div>
    </div>
    <div class="loginRight fr">    <?php if ($this->_tpl_vars['this']->_loginError): ?>
    <label class="error" style="font-weight: normal;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'LOGIN_PASSWORD_ERROR'), $this);?>
</label>
    <br class="cb"/>
    <?php endif; ?>
    <form name="login" action="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'login'), $this);?>
" method="post">
    
        <table>
            <tr>
            	<td>
                    <span class="formtit textR fl" style="font-weight: normal;display: block;font-size: 1em;text-align: left;">
                      <label for="user_login"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_login'), $this);?>
</label>
                    </span>
                </td>
            	<td>
                    <input type="text" name='user_login' class="margL10 sinp" />
                </td>
            </tr>
            <tr>
            	<td>
                    <span class="formtit textR fl" style="font-weight: normal;display: block;font-size: 1em;text-align: left;">
                      <label for="user_password"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_password'), $this);?>
</label>
                    </span>
                </td>
            	<td>
                    <input type="password"  name='user_password' class="margL10 sinp" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div style="text-align: center;margin-left: 10px;">
                        <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'registration'), $this);?>
" class="hov"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'registration'), $this);?>
</a>&nbsp;|&nbsp;
                        <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'forgot'), $this);?>
" class="hov"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'forgot'), $this);?>
</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span class="borderLine"></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div class="btnbord">
    	               <div class="yelbtn1"><input style="width: 164px;" type="submit" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_submit'), $this);?>
" name="login-btn" class="pointer" /></div><span class="yelbtn2 fl"></span>
                    </div>
                </td>
            </tr>
        </table>
       
        
    	  
      </form>
    </div> 
    <br class="cb"/> 
</div>
<br class="cb"/>