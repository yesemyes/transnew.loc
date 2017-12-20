<?php /* Smarty version 2.6.26, created on 2013-12-24 17:16:24
         compiled from view_listItem.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip_tags', 'view_listItem.tpl', 6, false),array('modifier', 'mb_truncate', 'view_listItem.tpl', 6, false),array('modifier', 'date_format', 'view_listItem.tpl', 22, false),array('modifier', 'min', 'view_listItem.tpl', 36, false),array('modifier', 'array_flip', 'view_listItem.tpl', 37, false),)), $this); ?>
<?php if ($this->_tpl_vars['_settings']['control'] == 'input' && $this->_tpl_vars['_settings']['type'] == 'text'): ?>
<?php echo $this->_tpl_vars['value']; ?>

<?php elseif ($this->_tpl_vars['_settings']['control'] == 'input' && $this->_tpl_vars['_settings']['type'] == 'password'): ?>
************
<?php elseif ($this->_tpl_vars['_settings']['control'] == 'textarea'): ?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 40, ' ... ', 'UTF-8', false, true) : smarty_modifier_mb_truncate($_tmp, 40, ' ... ', 'UTF-8', false, true)); ?>

<?php elseif ($this->_tpl_vars['_settings']['control'] == 'input' && $this->_tpl_vars['_settings']['type'] == 'checkbox'): ?>
<?php $this->assign('cmoduleId', $this->_tpl_vars['this']->curModule['id']); ?>
<?php $this->assign('CAN_EDIT', $_SESSION['be_user']['access']['EDIT']); ?>
<?php $this->assign('CAN_EDIT_CH', 0); ?>
<?php if (in_array ( $this->_tpl_vars['cmoduleId'] , $this->_tpl_vars['CAN_EDIT'] )): ?>

	<?php $this->assign('CAN_EDIT_CH', 1); ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['value']): ?>

<img src="/admin/images/admin/tick.png" width="16" height="16" alt="Enabled" <?php if ($this->_tpl_vars['CAN_EDIT_CH']): ?> class="inlineEditCheckbox"    rel="<?php echo $this->_tpl_vars['this']->request['path']; ?>
?action=UpdateFiled&viewAjax=1&tpl=view_listItem.tpl&id=<?php echo $this->_tpl_vars['_id']; ?>
&field=<?php echo $this->_tpl_vars['_field']; ?>
&value=0" id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
<?php echo $this->_tpl_vars['_field']; ?>
<?php echo $this->_tpl_vars['_id']; ?>
"<?php endif; ?>/><?php else: ?>
<img src="/admin/images/admin/untick.png" width="16" height="16" alt="Disabled" <?php if ($this->_tpl_vars['CAN_EDIT_CH']): ?> class="inlineEditCheckbox" rel="<?php echo $this->_tpl_vars['this']->request['path']; ?>
?action=UpdateFiled&viewAjax=1&tpl=view_listItem.tpl&id=<?php echo $this->_tpl_vars['_id']; ?>
&field=<?php echo $this->_tpl_vars['_field']; ?>
&value=1" id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
<?php echo $this->_tpl_vars['_field']; ?>
<?php echo $this->_tpl_vars['_id']; ?>
"<?php endif; ?>/><?php endif; ?>
<?php elseif ($this->_tpl_vars['_settings']['control'] == 'datepicker'): ?>
	<?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d/%m/%Y') : smarty_modifier_date_format($_tmp, '%d/%m/%Y')); ?>

<?php elseif ($this->_tpl_vars['_settings']['control'] == 'datetimepicker'): ?>
	<?php echo $this->_tpl_vars['value']; ?>
  
<?php elseif ($this->_tpl_vars['_settings']['control'] == 'select'): ?>
	<?php echo $this->_tpl_vars['_settings']['_options'][$this->_tpl_vars['value']]; ?>

<?php elseif ($this->_tpl_vars['_settings']['control'] == "select-tree"): ?>
	<?php echo $this->_tpl_vars['_settings']['_options'][$this->_tpl_vars['value']]; ?>
 <?php echo $this->_tpl_vars['value']; ?>
   
<?php else: ?>
	<?php if ($this->_tpl_vars['_settings']['type'] == 'fileImage'): ?>
    
     <?php if ($this->_tpl_vars['value']): ?>
            <?php if (isset ( $this->_tpl_vars['_settings']['resize'] )): ?>
           
          
                <?php $this->assign('min', min($this->_tpl_vars['_settings']['resize'])); ?>
                <?php $this->assign('resizes', array_flip($this->_tpl_vars['_settings']['resize'])); ?>
                <?php $this->assign('needFolder', $this->_tpl_vars['resizes'][$this->_tpl_vars['min']]); ?>
                <?php $this->assign('onclick', "viewThisImage('".($this->_tpl_vars['this']->curModule['name'])."','".($this->_tpl_vars['needFolder'])."','".($this->_tpl_vars['value'])."',this)"); ?>
                
             <?php elseif (isset ( $this->_tpl_vars['_settings']['lessThan'] )): ?>
             
             	<?php $this->assign('needFolder', $this->_tpl_vars['_settings']['lessThan']['folder']); ?>
                <?php $this->assign('onclick', "viewThisImage('".($this->_tpl_vars['this']->curModule['name'])."','".($this->_tpl_vars['needFolder'])."','".($this->_tpl_vars['value'])."',this)"); ?>
             <?php endif; ?>
      
    <?php else: ?>
    
	    <?php $this->assign('onclick', ""); ?>
    <?php endif; ?>    
    <img src="/admin/images/admin/camera<?php if (! $this->_tpl_vars['value']): ?>_error<?php endif; ?>.png" width="16" height="16" onclick="<?php echo $this->_tpl_vars['onclick']; ?>
" />
    <?php endif; ?>
<?php endif; ?>