<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from controls/input_checkbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'controls/input_checkbox.tpl', 3, false),array('function', 'Trans', 'controls/input_checkbox.tpl', 12, false),)), $this); ?>
<?php $this->assign('checked', ''); ?>
<?php if ($this->_tpl_vars['_value'] == ''): ?>
<?php $this->assign('_value', ((is_array($_tmp=@$this->_tpl_vars['_setting']['default'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0))); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['_value'] == 1): ?>
<?php $this->assign('checked', 'checked="checked"'); ?>

<?php endif; ?>



<label><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'ON'), $this);?>

<input type="radio" name="<?php echo $this->_tpl_vars['_name']; ?>
" id="<?php echo $this->_tpl_vars['_id']; ?>
" value="1" <?php if ($this->_tpl_vars['_value'] == 1): ?> checked="checked"<?php endif; ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/events.tpl.html", 'smarty_include_vars' => array('_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>/> 
</label>
<label><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'OFF'), $this);?>

<input type="radio" name="<?php echo $this->_tpl_vars['_name']; ?>
" id="<?php echo $this->_tpl_vars['_id']; ?>
" value="0" <?php if ($this->_tpl_vars['_value'] != 1): ?>checked="checked"<?php endif; ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/events.tpl.html", 'smarty_include_vars' => array('_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>/> 
</label>