<?php /* Smarty version 2.6.26, created on 2013-12-24 11:56:44
         compiled from filter_controls/datetimepicker.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'filter_controls/datetimepicker.tpl', 5, false),)), $this); ?>
<?php if (! $this->_tpl_vars['_value']): ?>
<?php $this->assign('_value', time()); ?>
<?php endif; ?>

<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'from'), $this);?>
:
<input type="text" name="<?php echo $this->_tpl_vars['_name']; ?>
[from]" id="<?php echo $this->_tpl_vars['_id']; ?>
" value="" readonly="readonly" class="datepickers_f"/>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'to'), $this);?>
:
<input type="text" name="<?php echo $this->_tpl_vars['_name']; ?>
[to]" id="<?php echo $this->_tpl_vars['_id']; ?>
" value="" readonly="readonly" class="datepickers_f"/>

<script>
var datepicker = ".datepickers_f";
<?php echo '
$(datepicker).datepicker({changeMonth: true,showButtonPanel: true,changeYear: true,yearRange: \'1970:2038\',showOn: \'both\', buttonImage: "'; ?>
<?php echo $this->_tpl_vars['admin_pabnel_base']; ?>
<?php echo 'images/calendar.gif", buttonImageOnly: true,dateFormat: \'dd/mm/yy\'});
'; ?>
	
</script>
