<?php /* Smarty version 2.6.26, created on 2013-09-10 18:57:38
         compiled from ac_menu_main.tpl */ ?>
<div >
<form name="accses-form" action="<?php echo $this->_tpl_vars['this']->form->request['path']; ?>
?action=<?php echo $this->_tpl_vars['this']->request['query']['action']; ?>
&viewAjax=1&tpl=<?php echo 'ac_menu_main.tpl'; ?>
">
<table cellpadding="1" cellspacing="1" summary="" width="100%" border="0"> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ac_menu.tpl", 'smarty_include_vars' => array('_pid' => 0,'_m' => $this->_tpl_vars['this']->form->be_menu,'_l' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</table>
<input type="button" name="submit-mi" value="save" onclick="submitMe(this)"/>
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['group']; ?>
"/>
</form>

</div>