<?php /* Smarty version 2.6.26, created on 2013-08-10 19:51:43
         compiled from controls/select-tree-node-control.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'controls/select-tree-node-control.tpl', 5, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('_inputValue', $this->_tpl_vars['_controlValue']); ?><?php echo ''; ?><?php $this->assign('checked', ''); ?><?php echo ''; ?><?php if ($this->_tpl_vars['_conf']['select_control'] == 'checkbox'): ?><?php echo ''; ?><?php $this->assign('_name', ((is_array($_tmp=$this->_tpl_vars['_name'])) ? $this->_run_mod_handler('cat', true, $_tmp, "[]") : smarty_modifier_cat($_tmp, "[]"))); ?><?php echo ''; ?><?php $this->assign('_inputValue', 1); ?><?php echo ''; ?><?php if (in_array ( $this->_tpl_vars['_controlValue'] , $this->_tpl_vars['_value'] )): ?><?php echo ''; ?><?php $this->assign('checked', 'checked="checked"'); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if ($this->_tpl_vars['_controlValue'] == $this->_tpl_vars['_value']): ?><?php echo ''; ?><?php $this->assign('checked', 'checked="checked"'); ?><?php echo ''; ?><?php endif; ?><?php echo '<input type="'; ?><?php echo $this->_tpl_vars['_conf']['select_control']; ?><?php echo '"  name="'; ?><?php echo $this->_tpl_vars['_name']; ?><?php echo '" class="'; ?><?php echo $this->_tpl_vars['_key']; ?><?php echo '" value="'; ?><?php echo $this->_tpl_vars['_controlValue']; ?><?php echo '" '; ?><?php echo $this->_tpl_vars['checked']; ?><?php echo ' '; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/events.tpl.html", 'smarty_include_vars' => array('_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ' />'; ?>