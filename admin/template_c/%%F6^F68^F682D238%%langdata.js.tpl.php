<?php /* Smarty version 2.6.26, created on 2013-07-22 12:36:56
         compiled from langdata.js.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'JsClean', 'langdata.js.tpl', 5, false),)), $this); ?>
<?php echo '
var jsLngdata = {};
'; ?>

<?php $_from = $this->_tpl_vars['lngdata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['constant'] => $this->_tpl_vars['tr']):
?>
jsLngdata.<?php echo $this->_tpl_vars['constant']; ?>
 = "<?php echo $this->_plugins['function']['JsClean'][0][0]->function_JsClean(array('term' => $this->_tpl_vars['tr']), $this);?>
";
<?php endforeach; endif; unset($_from); ?>