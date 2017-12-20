<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from default/pool.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'default/pool.tpl.html', 4, false),)), $this); ?>
<?php $this->assign('pool', $this->_tpl_vars['this']->getPool()); ?>
<?php if ($this->_tpl_vars['pool']): ?>
<br class="cb"/>
<div class="specialProjectTit"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'pool','default' => "Հարցում"), $this);?>
</div>
<div class="adsbg services">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['pool']['inner_tpl'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<br class="cb"/>
<?php endif; ?>