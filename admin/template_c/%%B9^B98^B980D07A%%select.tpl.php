<?php /* Smarty version 2.6.26, created on 2013-07-24 21:10:32
         compiled from filter_controls/select.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'filter_controls/select.tpl', 4, false),)), $this); ?>
<select name="<?php echo $this->_tpl_vars['_name']; ?>
"  id="<?php echo $this->_tpl_vars['_id']; ?>
" <?php if (isset ( $this->_tpl_vars['_setting']['multiple'] )): ?><?php echo $this->_tpl_vars['_setting']['multiple']; ?>
<?php endif; ?> size="<?php if (isset ( $this->_tpl_vars['_setting']['size'] )): ?><?php echo $this->_tpl_vars['_setting']['size']; ?>
<?php endif; ?>">
<option value="">--------------</option>

<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['_setup']['_options'],'selected' => $this->_tpl_vars['_value']), $this);?>

</select>