<?php /* Smarty version 2.6.26, created on 2017-02-02 17:57:13
         compiled from pdd/ticketsonthetopicsaction.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'pdd/ticketsonthetopicsaction.tpl.html', 7, false),)), $this); ?>
<div class="fl">
	<div class="cb fl">
		<div class="quest" style="background: url(/images/pdd-block-bg.png) repeat">
        <?php $_from = $this->_tpl_vars['this']->pddticketcategory; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['category']):
?>
			<a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'pdd','action' => 'marathon'), $this);?>
?category=<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['category']['label']; ?>
</a>
		<?php endforeach; endif; unset($_from); ?>  
		</div>
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/right.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>