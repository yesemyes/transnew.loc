<?php /* Smarty version 2.6.26, created on 2013-07-22 12:36:56
         compiled from be_menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'be_menu.tpl', 8, false),)), $this); ?>
<ul   <?php if ($this->_tpl_vars['_pid'] == 0): ?> class="list"<?php endif; ?>>
<?php $_from = $this->_tpl_vars['_m'][$this->_tpl_vars['_pid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<li  >

    <a href="<?php echo $this->_tpl_vars['_p']; ?>
/<?php echo $this->_tpl_vars['item']['name']; ?>
" rel="<?php echo $this->_tpl_vars['item']['name']; ?>
"><?php echo $this->_tpl_vars['item']['label']; ?>
</a>
    
    <?php if (isset ( $this->_tpl_vars['_m'][$this->_tpl_vars['item']['id']] )): ?>
	    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "be_menu.tpl", 'smarty_include_vars' => array('_pid' => $this->_tpl_vars['item']['id'],'_m' => $this->_tpl_vars['_m'],'_p' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['_p'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/") : smarty_modifier_cat($_tmp, "/")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['name'])),'class' => 'sub')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
</li>
<?php endforeach; endif; unset($_from); ?>

</ul>