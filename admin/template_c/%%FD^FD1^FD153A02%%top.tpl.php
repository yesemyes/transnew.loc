<?php /* Smarty version 2.6.26, created on 2013-07-22 12:36:56
         compiled from top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'long2ip', 'top.tpl', 14, false),array('modifier', 'cat', 'top.tpl', 26, false),array('function', 'Trans', 'top.tpl', 16, false),)), $this); ?>
<div style="height:90px; background:#000; border-bottom:6px solid #1cced4 ">

<?php if (isset ( $_SESSION['be_user'] )): ?>

<div style="position:absolute; float:right; left:75%">
<span id="timer_user"  style="color:#0dd0f1;font-size:12px"><?php echo $_SESSION['be_user']['name']; ?>
</span>&nbsp;



<span style="color:#0dd0f1; font-size:12px"  align="right"><?php echo $_SESSION['be_user']['last_login_time']; ?>
</span><br />

<span id="timer"  style="color:#0dd0f1;font-size:12px">0</span>&nbsp;
<br />
<span style="color:#0dd0f1; font-size:12px"  align="right"><?php echo long2ip($_SESSION['be_user']['last_login_ip']); ?>
</span><br />

<span  align="right"><a href="/admin/logout" class="log-out"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'LOG_OUT'), $this);?>
</a></span>
</div>
<?php endif; ?>
<img src="/admin/images/logo.png" width="246" height="75" align="top" style="margin-left:10px; margin-top:5px" />

<?php if (! isset ( $this->_tpl_vars['_menu'] )): ?>
<?php $this->assign('defLng', $this->_tpl_vars['this']->defLng); ?>
<?php $this->assign('defLng', $this->_tpl_vars['defLng']['code']); ?>
<?php $this->assign('_p', ''); ?>
<?php $this->assign('_p', ((is_array($_tmp=$this->_tpl_vars['_p'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/admin") : smarty_modifier_cat($_tmp, "/admin"))); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "be_menu.tpl", 'smarty_include_vars' => array('_pid' => 0,'_m' => $this->_tpl_vars['this']->be_menu,'_p' => $this->_tpl_vars['_p'],'class' => 'sub')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>