<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from controls/datepicker.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'controls/datepicker.tpl', 1, false),)), $this); ?>
<input type="text" name="<?php echo $this->_tpl_vars['_name']; ?>
" id="<?php echo $this->_tpl_vars['_id']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['_value'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" readonly="readonly" class="datepickers" <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/events.tpl.html", 'smarty_include_vars' => array('_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>/>
<script>
var datepicker = "#<?php echo $this->_tpl_vars['_id']; ?>
";
<?php echo '
	
		$(datepicker).datepicker({changeMonth: true,showButtonPanel: true,changeYear: true,showOn: \'button\', buttonImage: \'/admin/images/admin/calendar.gif\', buttonImageOnly: true,dateFormat: \'dd/mm/yy\'});
'; ?>
	
</script>
