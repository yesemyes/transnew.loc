<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'form.tpl', 6, false),array('function', 'myPush', 'form.tpl', 16, false),array('modifier', 'cat', 'form.tpl', 22, false),array('modifier', 'sImplode', 'form.tpl', 37, false),)), $this); ?>
<div id="form-cont-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
">
<div style="background:#D8D8D8; color:#333; height:18px" >
<div style="float:right; margin:0 2px 2px 0" id="reload-button-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
" onclick="closeThis('#viewForm-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
')" ><img src="/admin/images/admin/tab_delete.png" style="cursor:pointer"></div>
</div>
<?php if (isset ( $this->_tpl_vars['this']->form->_saveresult ) && $this->_tpl_vars['this']->form->_saveresult): ?>
<img src="/admin/images/admin/accept.png"  width="16" height="16"/><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'SAVE_COMPLETE'), $this);?>

<?php endif; ?>
<form method="post" action="<?php echo $this->_tpl_vars['this']->request['path']; ?>
?action=<?php echo $this->_tpl_vars['this']->request['query']['action']; ?>
&viewAjax=1&tpl=formView.tpl
<?php if (isset ( $this->_tpl_vars['this']->form->SEARCH['pid'] )): ?>&pid=<?php echo $this->_tpl_vars['this']->form->SEARCH['pid']; ?>
<?php endif; ?>" enctype="application/x-www-form-urlencoded" id='main_form-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
'>
<?php $this->assign('elementsArray', ''); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "form_save_buttons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div style="clear:both; margin-bottom:2px"></div>
    <?php $this->assign('ErrorsRows', ''); ?>
<?php $_from = $this->_tpl_vars['this']->form->items; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/form_element.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('element', ob_get_contents()); ob_end_clean();
 ?>
<?php echo myPush(array('mYarray' => $this->_tpl_vars['elementsArray'],'_element' => $this->_tpl_vars['element'],'assign' => 'elementsArray','_item' => $this->_tpl_vars['item']), $this);?>



<?php if (isset ( $this->_tpl_vars['item']['_ERRORS'] )): ?>

	<?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/errors.tpl", 'smarty_include_vars' => array('_error' => $this->_tpl_vars['item']['_ERRORS'],'_key' => $this->_tpl_vars['key'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('c_error', ob_get_contents()); ob_end_clean();
 ?>
    <?php $this->assign('ErrorsRows', ((is_array($_tmp=$this->_tpl_vars['ErrorsRows'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['c_error']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['c_error']))); ?>
<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['ErrorsRows']): ?>
<table cellpadding="2" cellspacing="0" summary=""  align="left" border="0" class="tableContTableErrors" >
<?php echo $this->_tpl_vars['ErrorsRows']; ?>

</table>
<?php endif; ?>
<div style="clear:both; width:100%">
<?php $_from = $this->_tpl_vars['elementsArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group'] => $this->_tpl_vars['elems']):
?>
<fieldset style="margin:5px" class="tableCont">
 <legend style="cursor:pointer" class="open_sub2<?php if ($this->_tpl_vars['group'] == 'public'): ?>Open<?php endif; ?>" onclick="swapStatus('<?php echo $this->_tpl_vars['group']; ?>
','<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
',this)"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => $this->_tpl_vars['group']), $this);?>
 </legend>
        <table id="group-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
-<?php echo $this->_tpl_vars['group']; ?>
" class="tableContTable<?php if ($this->_tpl_vars['group'] != 'public'): ?> hide<?php endif; ?>" border="0" cellpadding="3" cellspacing="0">
        
        <?php echo sImplode($this->_tpl_vars['elems']); ?>

        </table>
</fieldset>
        <?php endforeach; endif; unset($_from); ?>
</div>
<div style="clear:both; margin-bottom:2px"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "form_save_buttons.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<input type="hidden" name="action" value="<?php echo $this->_tpl_vars['this']->request['query']['action']; ?>
"/>
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['this']->form->id; ?>
"/>
</form>
<?php if (isset ( $this->_tpl_vars['this']->form->_saveresult ) && $this->_tpl_vars['this']->form->_saveresult): ?>
<img src="/admin/images/admin/accept.png"  width="16" height="16"/><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'SAVE_COMPLETE'), $this);?>

<?php endif; ?>
</div>




