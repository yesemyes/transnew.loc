<?php /* Smarty version 2.6.26, created on 2017-02-02 17:18:44
         compiled from users/middle.tpl.html */ ?>
<div id="content" class="advanced_c2 ">
 <?php if (! $this->_tpl_vars['this']->contentTpl): ?>
      		<?php echo $this->_tpl_vars['this']->currentPage['content']; ?>

      <?php else: ?>
	  
      		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['this']->contentTpl, 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>
</div>      