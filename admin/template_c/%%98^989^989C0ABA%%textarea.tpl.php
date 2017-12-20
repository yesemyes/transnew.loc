<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from controls/textarea.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'controls/textarea.tpl', 3, false),)), $this); ?>
<textarea type="text" name="<?php echo $this->_tpl_vars['_name']; ?>
" id="<?php echo $this->_tpl_vars['_id']; ?>
" <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/events.tpl.html", 'smarty_include_vars' => array('_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> class="tinymce" style="width:90%; height:150px"><?php echo $this->_tpl_vars['_value']; ?>
</textarea>
<?php if ($this->_tpl_vars['_setting']['type'] == 'editor'): ?>
<a href="javascript:;" onmousedown="setup('<?php echo $this->_tpl_vars['_id']; ?>
');"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'SHOW'), $this);?>
</a>
<?php endif; ?>