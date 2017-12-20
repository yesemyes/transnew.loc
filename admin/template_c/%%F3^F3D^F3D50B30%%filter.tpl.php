<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:12
         compiled from filter.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'filter.tpl', 8, false),array('function', 'Trans', 'filter.tpl', 13, false),)), $this); ?>
<form method="post" action="" enctype="application/x-www-form-urlencoded" id='main_filter_form_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
'>
<table cellpadding="2" cellspacing="0" summary=""  align="left" border="0" class="tableContTableErrors" >
<?php $_from = $this->_tpl_vars['this']->form->setup['listelements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key']):
?>
  
  
    <?php $this->assign('item', $this->_tpl_vars['this']->form->items[$this->_tpl_vars['key']]); ?>
   
    <?php $this->assign('control_tpl', ((is_array($_tmp=((is_array($_tmp='filter_controls/')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['control']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['control'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.tpl') : smarty_modifier_cat($_tmp, '.tpl'))); ?>
    <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['control_tpl'], 'smarty_include_vars' => array('_setup' => $this->_tpl_vars['item'],'_setting' => $this->_tpl_vars['item'],'_name' => $this->_tpl_vars['key'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('tplContent', ob_get_contents()); ob_end_clean();
 ?> 
        <?php if ($this->_tpl_vars['tplContent']): ?>
         <tr> 
        <th id="f_<?php echo $this->_tpl_vars['key']; ?>
" > 
         <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => $this->_tpl_vars['key']), $this);?>

         </th>
         <td>
         <?php echo $this->_tpl_vars['tplContent']; ?>

          </td>
        </tr>
        <?php endif; ?>
    

<?php endforeach; endif; unset($_from); ?>
</table>
<input type="hidden" name="order[by]"   id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_order_by" value="">
<input type="hidden" name="order[type]" id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_order_type" value="">
<input type="hidden" name="limit[page]" id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_limit_page" value="1">
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'SHOW_ITEMS_PERPAGE'), $this);?>
&nbsp;
<select name="limit[limit]" id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_limit_limit" onchange="gotoPage('<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
','<?php echo $this->_tpl_vars['this']->request['path']; ?>
',1)">

<option value="10"  <?php if ($this->_tpl_vars['this']->_config['limit'] == 10): ?> selected="selected"<?php endif; ?>>10</option>
<option value="20" <?php if ($this->_tpl_vars['this']->_config['limit'] == 20): ?> selected="selected"<?php endif; ?>>20</option>
<option value="50" <?php if ($this->_tpl_vars['this']->_config['limit'] == 50): ?> selected="selected"<?php endif; ?>>50</option>
<option value="100" <?php if ($this->_tpl_vars['this']->_config['limit'] == 100): ?> selected="selected"<?php endif; ?>>100</option>
</select>
</form>
 <div  style="margin:2px; padding:2px ;  float:left; width:55%" >
<img src="/admin/images/admin/find.png" width="16" height="16" align="right" id='filter_form_button<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
' onclick="filterThis('<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
','<?php echo $this->_tpl_vars['this']->request['path']; ?>
')">&nbsp;
<img src="/admin/images/admin/table_refresh.png" width="16" height="16" align="right" onclick="filterReset('<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
','<?php echo $this->_tpl_vars['this']->request['path']; ?>
')">
</div>





