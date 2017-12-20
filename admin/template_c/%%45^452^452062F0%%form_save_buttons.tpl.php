<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from form_save_buttons.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'form_save_buttons.tpl', 6, false),)), $this); ?>
<?php $this->assign('cmoduleId', $this->_tpl_vars['this']->curModule['id']); ?>
<?php $this->assign('CAN_EDIT', $_SESSION['be_user']['access']['EDIT']); ?>

<?php if (in_array ( $this->_tpl_vars['cmoduleId'] , $this->_tpl_vars['CAN_EDIT'] )): ?>
<input type="button" class='saveBtn' name="_save" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'SAVE'), $this);?>
" onclick="saveMe(this,'form-cont-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
')" />&nbsp;
<input type="reset" name="_reset" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'RESET'), $this);?>
" />
<?php endif; ?>

