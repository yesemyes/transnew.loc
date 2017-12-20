<?php /* Smarty version 2.6.26, created on 2013-09-10 18:57:38
         compiled from ac_menu.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'ac_menu.tpl', 11, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['_m'][$this->_tpl_vars['_pid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<tr  class="I<?php echo $this->_tpl_vars['item']['pid']; ?>
 <?php if ($this->_tpl_vars['item']['pid'] > 0): ?>subaccses<?php endif; ?>">
<?php echo '<td style="padding-left:'; ?><?php echo $this->_tpl_vars['_l']*5+5*$this->_tpl_vars['_l']; ?><?php echo 'px">'; ?><?php echo $this->_tpl_vars['item']['label']; ?><?php echo '</td>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'acsess_types.tpl', 'smarty_include_vars' => array('_id' => $this->_tpl_vars['item']['id'],'_pid' => $this->_tpl_vars['item']['pid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>
        
		</tr>
        <?php if (isset ( $this->_tpl_vars['_m'][$this->_tpl_vars['item']['id']] )): ?>
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "ac_menu.tpl", 'smarty_include_vars' => array('_pid' => $this->_tpl_vars['item']['id'],'_m' => $this->_tpl_vars['_m'],'_p' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['_p'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/") : smarty_modifier_cat($_tmp, "/")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['name']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['name'])),'class' => 'sub','_l' => $this->_tpl_vars['_l']+1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>