<?php /* Smarty version 2.6.26, created on 2013-08-01 10:36:39
         compiled from getTree.tpl */ ?>
<div style="clear:both; margin:7px;">&nbsp;</div>
            
            <?php $this->assign('cookieValue', $this->_tpl_vars['_COOKIE']); ?>
            
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "treeNode.tpl", 'smarty_include_vars' => array('_lavel' => 0,'_cookie' => $this->_tpl_vars['cookieValue'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->assign('cmoduleId', $this->_tpl_vars['this']->curModule['id']); ?>
<?php $this->assign('CAN_ADD', $_SESSION['be_user']['access']['ADD']); ?>
<?php if (in_array ( $this->_tpl_vars['cmoduleId'] , $this->_tpl_vars['CAN_ADD'] )): ?>

<img src="/admin/images/admin/edit.png" width="14"  title="New" onclick="openFromDialog('<?php echo $this->_tpl_vars['this']->request['path']; ?>
','edit',0,'<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
',0,'<?php echo $this->_tpl_vars['this']->curModule['label']; ?>
')"/>
<?php endif; ?>