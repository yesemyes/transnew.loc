<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from controls/existingimages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'min', 'controls/existingimages.tpl', 6, false),array('modifier', 'array_flip', 'controls/existingimages.tpl', 7, false),array('modifier', 'default', 'controls/existingimages.tpl', 38, false),array('function', 'math', 'controls/existingimages.tpl', 40, false),)), $this); ?>
<div id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_key']; ?>
_existinImages"> <?php $this->assign('_UploadRoot', "/img/"); ?>
  
  <?php if ($this->_tpl_vars['_value']): ?>
  
<?php if (isset ( $this->_tpl_vars['_setting']['resize'] )): ?>
          <?php $this->assign('_min', min($this->_tpl_vars['_setting']['resize'])); ?>
          <?php $this->assign('folders', array_flip($this->_tpl_vars['_setting']['resize'])); ?>
          <?php $this->assign('folder', $this->_tpl_vars['folders'][$this->_tpl_vars['_min']]); ?>
          
          
          <?php if ($this->_tpl_vars['_min'] > 450): ?>
          
          
          <?php $this->assign('_min', 450); ?>
          
          
          <?php endif; ?>
          
          <?php if ($this->_tpl_vars['_min'] < 150): ?>
          
          
          <?php $this->assign('_min', 150); ?>
          
          
          <?php endif; ?>
          <?php if (! is_array ( $this->_tpl_vars['_value'] )): ?>
          
                          <?php $this->assign('_imagePath', "/img/".($this->_tpl_vars['this']->curModule['name'])."/".($this->_tpl_vars['folder'])."/".($this->_tpl_vars['_value'])); ?>
                          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/imageItem.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
          <?php else: ?>
                          <?php $_from = $this->_tpl_vars['_value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image']):
?>
                           <?php $this->assign('_imagePath', "/img/".($this->_tpl_vars['this']->curModule['name'])."/".($this->_tpl_vars['folder'])."/".($this->_tpl_vars['image'])); ?>
                           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/imageItem.tpl", 'smarty_include_vars' => array('_value' => $this->_tpl_vars['image'],'_postfix' => "[]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
                          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['_setting']['fixed'] )): ?>
          <?php $this->assign('_width', ((is_array($_tmp=@$this->_tpl_vars['_setting']['fixed']['width'])) ? $this->_run_mod_handler('default', true, $_tmp, 150) : smarty_modifier_default($_tmp, 150))); ?>
          <?php $this->assign('_height', ((is_array($_tmp=@$this->_tpl_vars['_setting']['fixed']['height'])) ? $this->_run_mod_handler('default', true, $_tmp, 150) : smarty_modifier_default($_tmp, 150))); ?>
		  <?php echo smarty_function_math(array('equation' => "min(x,y)",'x' => $this->_tpl_vars['_width'],'y' => '_height','assign' => '_min'), $this);?>
         
          <?php $this->assign('folder', $this->_tpl_vars['_setting']['fixed']['folder']); ?>
          
          
          <?php if ($this->_tpl_vars['_min'] > 450): ?>
          
          
          <?php $this->assign('_min', 450); ?>
          
          
          <?php endif; ?>
          
          <?php if ($this->_tpl_vars['_min'] < 150): ?>
          
          
          <?php $this->assign('_min', 150); ?>
          
          
          <?php endif; ?>
          
          <?php if (! is_array ( $this->_tpl_vars['_value'] )): ?>
          
                          <?php $this->assign('_imagePath', "/img/".($this->_tpl_vars['this']->curModule['name'])."/".($this->_tpl_vars['folder'])."/".($this->_tpl_vars['_value'])); ?>
                          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/imageItem.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
          <?php else: ?>
                          <?php $_from = $this->_tpl_vars['_value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image']):
?>
                           <?php $this->assign('_imagePath', "/img/".($this->_tpl_vars['this']->curModule['name'])."/".($this->_tpl_vars['folder'])."/".($this->_tpl_vars['image'])); ?>
                           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/imageItem.tpl", 'smarty_include_vars' => array('_value' => $this->_tpl_vars['image'],'_postfix' => "[]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
                          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>
<?php endif; ?>
 <?php if (isset ( $this->_tpl_vars['_setting']['lessThan'] )): ?>
          <?php $this->assign('_min', $this->_tpl_vars['_setting']['lessThan']['size']); ?>
          <?php $this->assign('folder', $this->_tpl_vars['_setting']['lessThan']['folder']); ?>
                    
          
          <?php if ($this->_tpl_vars['_min'] > 450): ?>
          
          
          <?php $this->assign('_min', 450); ?>
          
          
          <?php endif; ?>
          
          <?php if ($this->_tpl_vars['_min'] < 150): ?>
          
          
          <?php $this->assign('_min', 150); ?>
          
          
          <?php endif; ?>
          <?php if (! is_array ( $this->_tpl_vars['_value'] )): ?>
          
                          <?php $this->assign('_imagePath', "/img/".($this->_tpl_vars['this']->curModule['name'])."/".($this->_tpl_vars['folder'])."/".($this->_tpl_vars['_value'])); ?>
                          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/imageItem.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
          <?php else: ?>
                          <?php $_from = $this->_tpl_vars['_value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['image']):
?>
                           <?php $this->assign('_imagePath', "/img/".($this->_tpl_vars['this']->curModule['name'])."/".($this->_tpl_vars['folder'])."/".($this->_tpl_vars['image'])); ?>
                           <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/imageItem.tpl", 'smarty_include_vars' => array('_value' => $this->_tpl_vars['image'],'_postfix' => "[]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
                          <?php endforeach; endif; unset($_from); ?>
          <?php endif; ?>
<?php endif; ?>


<?php endif; ?>
</div>
