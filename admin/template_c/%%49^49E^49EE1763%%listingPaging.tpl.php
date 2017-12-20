<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:12
         compiled from listingPaging.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'listingPaging.tpl', 1, false),array('modifier', 'range', 'listingPaging.tpl', 4, false),array('modifier', 'array_chunk', 'listingPaging.tpl', 6, false),)), $this); ?>
<?php echo smarty_function_math(array('equation' => "ceil(total/limit)",'total' => $this->_tpl_vars['_total'],'limit' => $this->_tpl_vars['_limit'],'assign' => '_pagesCounrt'), $this);?>

<?php echo smarty_function_math(array('equation' => "floor(page/per_limit)",'page' => $this->_tpl_vars['_page'],'per_limit' => 10,'assign' => '_pagesIndex'), $this);?>


<?php $this->assign('pages', ((is_array($_tmp=1)) ? $this->_run_mod_handler('range', true, $_tmp, $this->_tpl_vars['_pagesCounrt'], 1) : numericRange($_tmp, $this->_tpl_vars['_pagesCounrt'], 1))); ?>

<?php $this->assign('pages2', array_chunk($this->_tpl_vars['pages'], 10)); ?>
<?php $this->assign('current_array', $this->_tpl_vars['pages2'][$this->_tpl_vars['_pagesIndex']]); ?>


<?php if ($this->_tpl_vars['_pagesCounrt'] > 1): ?>
<table cellpadding="2" cellspacing="2" align="center">
<tr>
<?php $_from = $this->_tpl_vars['current_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<td style="<?php if ($this->_tpl_vars['item'] == $this->_tpl_vars['_page']): ?> border:1px solid #933<?php else: ?>cursor:pointer; <?php endif; ?>" <?php if ($this->_tpl_vars['item'] != $this->_tpl_vars['_page']): ?> onClick="gotoPage('<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
','<?php echo $this->_tpl_vars['this']->request['path']; ?>
',<?php echo $this->_tpl_vars['item']; ?>
)"<?php endif; ?>><?php echo $this->_tpl_vars['item']; ?>
</td>
<?php endforeach; endif; unset($_from); ?>
</tr>
</table>
<?php endif; ?>


