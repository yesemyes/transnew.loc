<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:12
         compiled from getList.tpl */ ?>
<table cellpadding="0" cellspacing="0" summary="" width="100%">
  <tr>
    <td><div id="filter-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
" class="filter hide" style="width:550px"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'filter.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div></td>
  </tr>
  <tr>
    <td><div  style="margin:2px; padding:2px ;  float:left; width:99%" > <img src="/admin/images/admin/arrow_down.png" width="16" height="16"  onclick="$('#filter-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
').toggleClass('hide')"/> </div></td>
  </tr>
  <tr>
    <td><div id="list-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
" style="width:99%"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div></td>
  </tr>
</table>