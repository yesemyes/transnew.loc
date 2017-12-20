<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from controls/events.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'controls/events.tpl.html', 3, false),)), $this); ?>
<?php $this->assign('events', ""); ?>
<?php $_from = $this->_tpl_vars['_setting']['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['event'] => $this->_tpl_vars['function']):
?>
<?php $this->assign('events', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['events'])) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' ')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['event']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['event'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "=\"") : smarty_modifier_cat($_tmp, "=\"")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['function']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['function'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '"') : smarty_modifier_cat($_tmp, '"'))); ?>
<?php endforeach; endif; unset($_from); ?>
<?php echo $this->_tpl_vars['events']; ?>