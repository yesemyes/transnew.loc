<?php /* Smarty version 2.6.26, created on 2013-09-10 18:57:35
         compiled from user-groups-tree.tpl */ ?>
<ul>
<?php $_from = $this->_tpl_vars['_array'][$this->_tpl_vars['_pid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<li >
<span id="ug-<?php echo $this->_tpl_vars['item']['pid']; ?>
-<?php echo $this->_tpl_vars['item']['id']; ?>
" class="ug-span" rel="<?php echo $this->_tpl_vars['this']->request['path']; ?>
?action=laodUserAccses&viewAjax=1&tpl=ac_menu_main.tpl&group=<?php echo $this->_tpl_vars['item']['id']; ?>
" ><?php echo $this->_tpl_vars['item']['name']; ?>
</span>
<?php if (! empty ( $this->_tpl_vars['_array'][$this->_tpl_vars['item']['id']] )): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "user-groups-tree.tpl", 'smarty_include_vars' => array('_array' => $this->_tpl_vars['_array'],'_pid' => $this->_tpl_vars['item']['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></span>
<?php endif; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>