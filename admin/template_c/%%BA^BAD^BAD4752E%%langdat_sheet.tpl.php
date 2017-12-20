<?php /* Smarty version 2.6.26, created on 2013-07-30 17:28:34
         compiled from langdat_sheet.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'langdat_sheet.tpl', 3, false),)), $this); ?>
<table cellpadding="5" cellspacing="1" summary="" width="710" border="1" id="main-tpl" >
<tr>
<td colspan="10"><b><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'SEARCH_LANGDATA'), $this);?>
</b> <input type="text" style="width:350px" id="finderEye" onkeyup="doSearch(this)"/></td> 
</tr>
<tbody id="translateTable">
<?php $_from = $this->_tpl_vars['this']->form->_getList; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['row']):
?>
<tr class="langdata-row" id="LDR<?php echo $this->_tpl_vars['id']; ?>
" rel="<?php echo $this->_tpl_vars['this']->request['path']; ?>
">
<?php $_from = $this->_tpl_vars['row']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['value']):
?>
<?php if ($this->_tpl_vars['k'] == 'name'): ?>
<td class="cell-<?php echo $this->_tpl_vars['k']; ?>
" id="cell_<?php echo $this->_tpl_vars['id']; ?>
" width="25%"><?php echo $this->_tpl_vars['value']; ?>
</td>

<?php elseif (is_array ( $this->_tpl_vars['value'] )): ?>
        <?php $_from = $this->_tpl_vars['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kk'] => $this->_tpl_vars['v']):
?>
        <td style="background:url(images/f/<?php echo $this->_tpl_vars['this']->languages_id[$this->_tpl_vars['kk']]['code']; ?>
.png) top left no-repeat ; padding-left:16px" >&nbsp;<span class="cell-t-<?php echo $this->_tpl_vars['k']; ?>
" id="cell_t_<?php echo $this->_tpl_vars['kk']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['v']; ?>
</span></td>
        <?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($_SESSION['be_user']['group'] == 0): ?>
<td class="cell-R<?php echo $this->_tpl_vars['id']; ?>
" ><img src="/admin/images/admin/delete.png" onclick="removeLngData(<?php echo $this->_tpl_vars['row']['id']; ?>
)" style="cursor:pointer;" /></td>
<?php endif; ?>
</tr>
<?php endforeach; endif; unset($_from); ?>
</tbody>

<tfoot>
<tr>
<td colspan="10">
<img src="/admin/images/admin/table_gear.png" id="addButton">
&nbsp;
<img src="/admin/images/admin/table_go.png" id="saveNewRows">
</td>
</tr>
</tfoot>
</table>