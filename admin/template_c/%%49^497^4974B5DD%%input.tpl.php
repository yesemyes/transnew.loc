<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:12
         compiled from filter_controls/input.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'filter_controls/input.tpl', 5, false),)), $this); ?>
<?php echo ''; ?><?php if ($this->_tpl_vars['_setup']['type'] == 'text'): ?><?php echo '<input type="'; ?><?php echo $this->_tpl_vars['_setup']['type']; ?><?php echo '" name="'; ?><?php echo $this->_tpl_vars['_name']; ?><?php echo '"/>'; ?><?php elseif ($this->_tpl_vars['_setup']['type'] == 'checkbox'): ?><?php echo '<select name="'; ?><?php echo $this->_tpl_vars['_name']; ?><?php echo '" ><option value="">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'ALL'), $this);?><?php echo '</option><option value="1">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'CHECKED'), $this);?><?php echo '</option><option value="0">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'UNCHECKED'), $this);?><?php echo '</option></select>'; ?><?php endif; ?><?php echo ''; ?>