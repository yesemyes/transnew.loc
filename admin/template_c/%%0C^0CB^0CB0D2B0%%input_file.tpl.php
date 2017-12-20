<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from controls/input_file.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'controls/input_file.tpl', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'controls/existingimages.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br style="clear:both" />
<div class="uploaders" id="up_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
">
<div id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_fileQueue"></div>
<input type="file" name="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_uploadify" id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_uploadify" />
<p><a href="javascript:jQuery('#<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_id']; ?>
_uploadify').uploadifyClearQueue()">Cancel All Uploads</a></p>
</div>

<input type="hidden" name="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_fileExt"   id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_fileExt"   value="<?php echo $this->_tpl_vars['_setting']['fileExt']; ?>
"/>
<input type="hidden" name="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_name" id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_name" value="<?php echo $this->_tpl_vars['_name']; ?>
"/>
<input type="hidden" value="<?php echo $this->_tpl_vars['this']->form->path; ?>
" id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_path" name="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_path" />

<input type="hidden" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['_setting']['multiple'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_multiple" name="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_multiple" />