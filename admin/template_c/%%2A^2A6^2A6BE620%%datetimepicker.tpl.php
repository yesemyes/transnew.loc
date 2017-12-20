<?php /* Smarty version 2.6.26, created on 2013-12-24 11:56:47
         compiled from controls/datetimepicker.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'controls/datetimepicker.tpl', 4, false),array('modifier', 'numericRange', 'controls/datetimepicker.tpl', 6, false),array('function', 'html_options', 'controls/datetimepicker.tpl', 6, false),)), $this); ?>
<?php if (! $this->_tpl_vars['_value']): ?>
	<?php $this->assign('_value', time()); ?>
<?php endif; ?>
<input type="text" name="<?php echo $this->_tpl_vars['_name']; ?>
[date]" id="<?php echo $this->_tpl_vars['_id']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['_value'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>
" readonly="readonly" class="datepickers" <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/events.tpl.html", 'smarty_include_vars' => array('_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>/>
<select name="<?php echo $this->_tpl_vars['_name']; ?>
[hours]" class="time"  >
<?php echo smarty_function_html_options(array('options' => numericRange(0, 23),'selected' => ((is_array($_tmp=$this->_tpl_vars['_value'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%H') : smarty_modifier_date_format($_tmp, '%H'))), $this);?>


</select>
:<select  name="<?php echo $this->_tpl_vars['_name']; ?>
[minutes]" class="time"  >
<?php echo smarty_function_html_options(array('options' => numericRange(0, 59),'selected' => ((is_array($_tmp=$this->_tpl_vars['_value'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%M') : smarty_modifier_date_format($_tmp, '%M'))), $this);?>


</select>
<script>
var datepicker = "#<?php echo $this->_tpl_vars['_id']; ?>
";
<?php echo '
$(datepicker).datepicker({changeMonth: true,showButtonPanel: true,changeYear: true,yearRange: \'1970:2038\',showOn: \'both\', buttonImage: "'; ?>
<?php echo $this->_tpl_vars['PANEL_BASE']; ?>
<?php echo 'images/calendar.gif", buttonImageOnly: true,dateFormat: \'dd/mm/yy\'});
'; ?>
	
</script>
