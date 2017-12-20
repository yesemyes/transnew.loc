<?php /* Smarty version 2.6.26, created on 2013-12-15 14:49:27
         compiled from controls/select-tree-node.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['_conf']['_options'][$this->_tpl_vars['key']] )): ?>
<ul>
  <?php $_from = $this->_tpl_vars['_conf']['_options'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_ckey'] => $this->_tpl_vars['_cnode']):
?>
  <li > 
    <?php if (( $this->_tpl_vars['_conf']['select_levels'] && in_array ( $this->_tpl_vars['_level'] , $this->_tpl_vars['_conf']['select_levels'] ) ) || empty ( $this->_tpl_vars['_conf']['select_levels'] )): ?>
    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/select-tree-node-control.tpl", 'smarty_include_vars' => array('_controlValue' => $this->_tpl_vars['_cnode'][$this->_tpl_vars['_conf']['options']['value']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
  <?php echo $this->_tpl_vars['_cnode'][$this->_tpl_vars['_conf']['options']['label']]; ?>

   <?php if ($this->_tpl_vars['_level'] < $this->_tpl_vars['_conf']['max_level']): ?> 
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/select-tree-node.tpl", 'smarty_include_vars' => array('key' => $this->_tpl_vars['_cnode']['id'],'_conf' => $this->_tpl_vars['_conf'],'_level' => $this->_tpl_vars['_level']+1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   <?php endif; ?>
    </li>
  <?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>