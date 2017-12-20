<?php /* Smarty version 2.6.26, created on 2013-07-22 12:38:32
         compiled from controls/imageItem.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'microtime', 'controls/imageItem.tpl', 2, false),)), $this); ?>
<div style="float:left;width:<?php echo $this->_tpl_vars['_min']; ?>
px;max-height:<?php echo $this->_tpl_vars['_min']+18; ?>
px;padding:2px 2px 2px; margin:5px; background:#eee; border:3px groove #333; text-align:center">
<img src="<?php echo $this->_tpl_vars['_imagePath']; ?>
?chk=<?php echo microtime(1); ?>
" style="max-width:<?php echo $this->_tpl_vars['_min']; ?>
px;max-height:<?php echo $this->_tpl_vars['_min']; ?>
px" align="absmiddle"/>

<div style="max-height:32px;padding:2px 2px 2px; background:#ccc;border:0; cursor:pointer" onclick="unlinkThisImage(this)">
<img src="/admin/images/delete_frame.png" width="16" height="16" align="right"/><br style="clear:both" />
<input type="hidden" name="<?php echo $this->_tpl_vars['_name']; ?>
<?php echo $this->_tpl_vars['_postfix']; ?>
" value="<?php echo $this->_tpl_vars['_value']; ?>
">
</div>
</div>

