<?php /* Smarty version 2.6.26, created on 2013-08-01 10:36:43
         compiled from controls/select-pid-tree-subs.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'controls/select-pid-tree-subs.tpl', 7, false),array('modifier', 'repeat', 'controls/select-pid-tree-subs.tpl', 8, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['_setting']['_options'][$this->_tpl_vars['_pid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
<?php if ($this->_tpl_vars['option']['id'] != $this->_tpl_vars['this']->form->id): ?>
    <?php $this->assign('selected', ''); ?>
    <?php if ($this->_tpl_vars['_value'] == $this->_tpl_vars['option']['id']): ?>
    <?php $this->assign('selected', 'selected="selected"'); ?>
    <?php endif; ?>
    <?php echo smarty_function_math(array('equation' => "5*y",'x' => 5,'y' => $this->_tpl_vars['_level'],'assign' => 'tabs'), $this);?>

    <option value="<?php echo $this->_tpl_vars['option']['id']; ?>
" <?php echo $this->_tpl_vars['selected']; ?>
 ><?php echo ((is_array($_tmp="&nbsp;")) ? $this->_run_mod_handler('repeat', true, $_tmp, $this->_tpl_vars['tabs']) : str_repeat($_tmp, $this->_tpl_vars['tabs'])); ?>
<?php echo $this->_tpl_vars['option'][$this->_tpl_vars['_setting']['options']['label']]; ?>
</option>
    <?php if (isset ( $this->_tpl_vars['_setting']['_options'][$this->_tpl_vars['option']['id']] )): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/select-pid-tree-subs.tpl", 'smarty_include_vars' => array('_pid' => $this->_tpl_vars['option']['id'],'_level' => $this->_tpl_vars['_level']+1,'_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
