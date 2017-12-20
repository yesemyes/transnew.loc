<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:12
         compiled from list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'list.tpl', 4, false),array('function', 'cycle', 'list.tpl', 30, false),array('modifier', 'default', 'list.tpl', 5, false),)), $this); ?>
<?php $this->assign('cmoduleId', $this->_tpl_vars['this']->curModule['id']); ?>
<?php $this->assign('CAN_ADD', $_SESSION['be_user']['access']['ADD']); ?>

<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'FOUND_ROWS'), $this);?>
&nbsp;<?php echo $this->_tpl_vars['this']->form->_getList_found; ?>

<?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "listingPaging.tpl", 'smarty_include_vars' => array('_total' => $this->_tpl_vars['this']->form->_getList_found,'_limit' => ((is_array($_tmp=@$this->_tpl_vars['this']->form->get['limit']['limit'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)),'_page' => $this->_tpl_vars['this']->form->get['limit']['page'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('_paging', ob_get_contents()); ob_end_clean();
 ?>

<br class='cb'/>
<?php if (in_array ( $this->_tpl_vars['cmoduleId'] , $this->_tpl_vars['CAN_ADD'] )): ?>
<button  type="button" onclick="openFromDialog('<?php echo $this->_tpl_vars['this']->request['path']; ?>
','edit',0,'<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
',0,'<?php echo $this->_tpl_vars['this']->curModule['label']; ?>
')"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'new'), $this);?>
</button>
<?php endif; ?>
<br class='cb'/>

<?php echo $this->_tpl_vars['_paging']; ?>

<table cellpadding="2" cellspacing="2" summary="" width="95%" align="center" border="0" class="list_table">
  <thead>
  
    <tr><?php $_from = $this->_tpl_vars['this']->form->setup['listelements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['label']):
?>
    <?php $this->assign('_item', $this->_tpl_vars['this']->form->items[$this->_tpl_vars['label']]); ?>
      <th class="<?php echo $this->_tpl_vars['_item']['control']; ?>
_<?php echo ((is_array($_tmp=@$this->_tpl_vars['_item']['type'])) ? $this->_run_mod_handler('default', true, $_tmp, 'css') : smarty_modifier_default($_tmp, 'css')); ?>
 td<?php echo $this->_tpl_vars['label']; ?>
">
      <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => $this->_tpl_vars['label']), $this);?>

      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "orderArrows.tpl", 'smarty_include_vars' => array('_item' => $this->_tpl_vars['_item'],'_label' => $this->_tpl_vars['label'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </th>
      <?php endforeach; endif; unset($_from); ?>
      <th width="36" style="width:36px" ><img src="/admin/images/admin/edit.png" width="12"  title="Edit"/>&nbsp;<img src="/admin/images/admin/delete.png" width="14"  title="Delete"/></th>
    </tr>
  </thead>
  <tbody class="list_tableBody">
  
  <?php $_from = $this->_tpl_vars['this']->form->_getList; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
  <tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
 " rel="<?php echo $this->_tpl_vars['this']->request['path']; ?>
?action=savePosition&viewAjax=1&tpl=json.tpl" id="treeNode-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
-<?php echo $this->_tpl_vars['row']['id']; ?>
" >
  <?php $_from = $this->_tpl_vars['this']->form->setup['listelements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key']):
?>
  <?php $this->assign('settings', $this->_tpl_vars['this']->form->items[$this->_tpl_vars['key']]); ?>
    <td style="padding:0 2px 0 2px" class="td<?php echo $this->_tpl_vars['key']; ?>
 " ><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "view_listItem.tpl", 'smarty_include_vars' => array('value' => $this->_tpl_vars['row'][$this->_tpl_vars['key']],'_field' => $this->_tpl_vars['key'],'_id' => $this->_tpl_vars['row']['id'],'_settings' => $this->_tpl_vars['settings'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
    <?php endforeach; endif; unset($_from); ?>
    <th id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
-<?php echo $this->_tpl_vars['row']['id']; ?>
"   style="height:25px; width:36px">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "edit-delet-addsub-buttons.tpl", 'smarty_include_vars' => array('row' => $this->_tpl_vars['row'],'_lavel' => 100000,'view_buttons' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    </th>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  </tbody>
  
</table>
<?php echo $this->_tpl_vars['_paging']; ?>



<br class='cb'/>
<?php if (in_array ( $this->_tpl_vars['cmoduleId'] , $this->_tpl_vars['CAN_ADD'] )): ?>
<button type="button" onclick="openFromDialog('<?php echo $this->_tpl_vars['this']->request['path']; ?>
','edit',0,'<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
',0,'<?php echo $this->_tpl_vars['this']->curModule['label']; ?>
')"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'new'), $this);?>
</button>
<?php endif; ?>