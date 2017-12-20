<?php /* Smarty version 2.6.26, created on 2017-12-18 20:40:26
         compiled from view.tpl */ ?>
<div id="viewPlace-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
"  style="border:1px solid #ccc">
<input type="hidden" id="tab-path-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
" value="<?php echo $this->_tpl_vars['this']->form->path; ?>
">
<div style="float:right"  id="reload-button-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
" onclick="reloadThis('#viewPlaceContent-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
','<?php echo $this->_tpl_vars['this']->request['path']; ?>
?viewAjax=1&tpl=<?php echo $this->_tpl_vars['this']->form->view; ?>
')"><img style="cursor:pointer" src="/admin/images/arrow_refresh_small.png" width="16" height="16"></div>
<div class="btnBAr topOpen" onclick="minimazeThis('<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
',this)" ></div>

<div id="viewPlaceContent-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
"  >
<?php if (isset ( $this->_tpl_vars['this']->form->view )): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['this']->form->view, 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "costum.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>
</div>
<div id="viewForm-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
" style="margin-top:25px;border:1px solid #ccc">
</div>