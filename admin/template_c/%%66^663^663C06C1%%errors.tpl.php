<?php /* Smarty version 2.6.26, created on 2013-07-24 21:29:53
         compiled from controls/errors.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'controls/errors.tpl', 12, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['_error'] )): ?>

<?php $_from = $this->_tpl_vars['_error']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_L'] => $this->_tpl_vars['er']):
?>


<?php if (! is_array ( $this->_tpl_vars['er'] )): ?>
<tr>
<th style="background:url(/admin/images/admin/error-small.png) no-repeat top left; padding-left:16px">
<?php echo $this->_tpl_vars['_key']; ?>

</th>

<td ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => $this->_tpl_vars['er']), $this);?>
</td>
</tr>
<?php else: ?>

<tr >
<th style="background:url(/admin/images/admin/error-small.png) no-repeat top left; padding-left:16px"><?php echo $this->_tpl_vars['_key']; ?>
</th>

<?php $_from = $this->_tpl_vars['er']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['err']):
?>
<?php $this->assign('flng', $this->_tpl_vars['this']->languages_id[$this->_tpl_vars['_L']]); ?>
<td ><img src="/admin/images/f/<?php echo $this->_tpl_vars['flng']['code']; ?>
.png">&nbsp;<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => $this->_tpl_vars['err']), $this);?>
&nbsp;</td>
<?php endforeach; endif; unset($_from); ?>
</tr>

<?php endif; ?>

<?php endforeach; endif; unset($_from); ?>

<?php endif; ?>