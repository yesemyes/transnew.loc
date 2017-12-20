<?php /* Smarty version 2.6.26, created on 2013-09-10 18:57:38
         compiled from acsess_types.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'acsess_types.tpl', 4, false),)), $this); ?>
<?php $this->assign('checkeds', $this->_tpl_vars['selected'][$this->_tpl_vars['_id']]); ?>
<td>
<label class="al">
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'VIEW'), $this);?>



<?php $this->assign('checked', ''); ?>


<?php if (isset ( $this->_tpl_vars['checkeds']['VIEW'] )): ?>
<?php $this->assign('checked', 'checked="checked"'); ?>

<?php endif; ?>
<input type="checkbox" value="1"  <?php echo $this->_tpl_vars['checked']; ?>
 name="VIEW[<?php echo $this->_tpl_vars['_id']; ?>
]" id="chVIEW-<?php echo $this->_tpl_vars['_id']; ?>
"  <?php if ($this->_tpl_vars['_pid'] > 0): ?> class="ch VIEW-<?php echo $this->_tpl_vars['_pid']; ?>
" <?php else: ?> class="VIEW" onClick="chStatus(this,'<?php echo $this->_tpl_vars['_id']; ?>
')" <?php endif; ?>     />
</label>&nbsp;
</td>

<td>
<label class="al">

<?php $this->assign('checked', ''); ?>



<?php if (isset ( $this->_tpl_vars['checkeds']['ADD'] )): ?>
<?php $this->assign('checked', 'checked="checked"'); ?>

<?php endif; ?>


<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'ADD'), $this);?>

<input type="checkbox" value="1" <?php echo $this->_tpl_vars['checked']; ?>
  name="ADD[<?php echo $this->_tpl_vars['_id']; ?>
]"  id="chADD-<?php echo $this->_tpl_vars['_id']; ?>
" <?php if ($this->_tpl_vars['_pid'] > 0): ?>  class="ch ADD-<?php echo $this->_tpl_vars['_pid']; ?>
" <?php else: ?> class="ADD" onClick="chStatus(this,'<?php echo $this->_tpl_vars['_id']; ?>
')" <?php endif; ?>    />
</label>&nbsp;
</td>
<td>
<label class="al">

<?php $this->assign('checked', ''); ?>



<?php if (isset ( $this->_tpl_vars['checkeds']['EDIT'] )): ?>
<?php $this->assign('checked', 'checked="checked"'); ?>

<?php endif; ?>


<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'EDIT'), $this);?>

<input type="checkbox" value="1" <?php echo $this->_tpl_vars['checked']; ?>
  name="EDIT[<?php echo $this->_tpl_vars['_id']; ?>
]"  id="chEDIT-<?php echo $this->_tpl_vars['_id']; ?>
"  <?php if ($this->_tpl_vars['_pid'] > 0): ?> class="ch EDIT-<?php echo $this->_tpl_vars['_pid']; ?>
" <?php else: ?> class="EDIT" onClick="chStatus(this,'<?php echo $this->_tpl_vars['_id']; ?>
')" <?php endif; ?>  class="ch EDIT-<?php echo $this->_tpl_vars['_pid']; ?>
"  />
</label>&nbsp;
</td>
<td>
<label class="al">
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'DELETE'), $this);?>


<?php $this->assign('checked', ''); ?>



<?php if ($this->_tpl_vars['checkeds']['DELETE']): ?>
<?php $this->assign('checked', 'checked="checked"'); ?>

<?php endif; ?>

<input type="checkbox" value="1" <?php echo $this->_tpl_vars['checked']; ?>
  name="DELETE[<?php echo $this->_tpl_vars['_id']; ?>
]" id="chDELETE-<?php echo $this->_tpl_vars['_id']; ?>
"  <?php if ($this->_tpl_vars['_pid'] > 0): ?> class="ch DELETE-<?php echo $this->_tpl_vars['_pid']; ?>
" <?php else: ?> class="DELETE" onClick="chStatus(this,'<?php echo $this->_tpl_vars['_id']; ?>
')" <?php endif; ?>     />
</label>
</td>