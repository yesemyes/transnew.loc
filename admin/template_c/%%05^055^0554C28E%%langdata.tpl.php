<?php /* Smarty version 2.6.26, created on 2013-07-30 17:28:34
         compiled from langdata.tpl */ ?>
<form id="langdata-tpl" method="post" action="<?php echo $this->_tpl_vars['this']->request['path']; ?>
?action=saveNewElements" onsubmit="return false">

<input type="hidden" name="_ldataLoadAjaxPath" id="_ldataLoadAjaxPath" value="<?php echo $this->_tpl_vars['this']->request['path']; ?>
?tpl=langdat_sheet.tpl&viewAjax=1" />
<input type="hidden" name="_ldataSabveAjaxPath" id="_ldataSabveAjaxPath" value="<?php echo $this->_tpl_vars['this']->request['path']; ?>
?tpl=langdata-item.tpl&viewAjax=1&action=save" />
<input type="image" src="/admin/images/admin/table_refresh.png" id="reloader"/>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "langdat_sheet.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<input type="hidden" name="action" value="saveNewRowsAjax"/>
</form>