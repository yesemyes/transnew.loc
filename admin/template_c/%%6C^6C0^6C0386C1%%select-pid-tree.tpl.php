<?php /* Smarty version 2.6.26, created on 2013-08-01 10:36:43
         compiled from controls/select-pid-tree.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'controls/select-pid-tree.tpl', 6, false),)), $this); ?>
<?php echo ''; ?><?php if (! $this->_tpl_vars['_value']): ?><?php echo ''; ?><?php $this->assign('_value', $this->_tpl_vars['this']->form->pid); ?><?php echo ''; ?><?php endif; ?><?php echo '<select name="'; ?><?php echo $this->_tpl_vars['_name']; ?><?php echo '"  id="'; ?><?php echo $this->_tpl_vars['_id']; ?><?php echo '" '; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['_setting']['multiple'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?><?php echo ' size="20" '; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/events.tpl.html", 'smarty_include_vars' => array('_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ' style="width:500px;"><option value="0"  '; ?><?php if (! $this->_tpl_vars['_value']): ?><?php echo 'selected="selected"'; ?><?php endif; ?><?php echo '>--------------</option>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/select-pid-tree-subs.tpl", 'smarty_include_vars' => array('_pid' => 0,'_level' => 0,'_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</select>'; ?>