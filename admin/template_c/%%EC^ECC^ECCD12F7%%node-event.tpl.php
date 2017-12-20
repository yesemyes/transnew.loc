<?php /* Smarty version 2.6.26, created on 2013-08-01 10:36:39
         compiled from node-event.tpl */ ?>
class='<?php if ($this->_tpl_vars['_sTree']): ?>close_sub<?php else: ?>open_sub<?php endif; ?>' onclick="getSub('<?php echo $this->_tpl_vars['row']['id']; ?>
',<?php echo $this->_tpl_vars['_lavel']+1; ?>
,this,'<?php echo $this->_tpl_vars['this']->request['path']; ?>
','<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
-<?php echo $this->_tpl_vars['row']['id']; ?>
')"