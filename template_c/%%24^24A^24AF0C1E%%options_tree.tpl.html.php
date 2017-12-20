<?php /* Smarty version 2.6.26, created on 2017-02-03 08:43:27
         compiled from default/options_tree.tpl.html */ ?>

<ul class="top_ul_left">
  <?php $_from = $this->_tpl_vars['_options']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach["chk".($this->_tpl_vars['_pid'])] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach["chk".($this->_tpl_vars['_pid'])]['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach["chk".($this->_tpl_vars['_pid'])]['iteration']++;
?>
  
  <li valign="top" class="fl"><span class="Level0"><?php echo $this->_tpl_vars['item']['label']; ?>
</span>
  
  <?php if (isset ( $this->_tpl_vars['_options'][$this->_tpl_vars['item']['id']] ) && ! empty ( $this->_tpl_vars['_options'][$this->_tpl_vars['item']['id']] )): ?>
  
  
  <ul  class="sub_ul">
  
  <?php $this->assign('eachName', "chk".($this->_tpl_vars['item']['id'])); ?>
    <?php $_from = $this->_tpl_vars['_options'][$this->_tpl_vars['item']['id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach["chk".($this->_tpl_vars['item']['id'])] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach["chk".($this->_tpl_vars['item']['id'])]['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sitem']):
        $this->_foreach["chk".($this->_tpl_vars['item']['id'])]['iteration']++;
?>
    <li   valign="top" nowrap="nowrap" style="float: left; width: 225px;"  >
     <input type="checkbox" name="<?php echo $this->_tpl_vars['_name']; ?>
" value="<?php echo $this->_tpl_vars['sitem']['id']; ?>
" id="subr<?php echo $this->_tpl_vars['sitem']['id']; ?>
" class="unlocker"  <?php if (is_array ( $this->_tpl_vars['values'] ) && in_array ( $this->_tpl_vars['sitem']['id'] , $this->_tpl_vars['values'] )): ?> checked="checked"<?php endif; ?>/>
     <span class="Level1"><label for="subr<?php echo $this->_tpl_vars['sitem']['id']; ?>
" style="position: relative;top: -2px;color: #000;font-size: 13px;"><?php echo $this->_tpl_vars['sitem']['label']; ?>
</label></span>
       <br class="cb" />
      <?php if (isset ( $this->_tpl_vars['_options'][$this->_tpl_vars['sitem']['id']] ) && ! empty ( $this->_tpl_vars['_options'][$this->_tpl_vars['sitem']['id']] )): ?>
      <?php $this->assign('_pc', 0); ?>
      <?php if (is_array ( $this->_tpl_vars['values'] ) && in_array ( $this->_tpl_vars['sitem']['id'] , $this->_tpl_vars['values'] )): ?> <?php $this->assign('_pc', 1); ?><?php endif; ?>
      
     <ul class="sub_ul_sub">
      <?php $_from = $this->_tpl_vars['_options'][$this->_tpl_vars['sitem']['id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ssitem']):
?>
       <li><input type="radio" name="<?php echo $this->_tpl_vars['_name']; ?>
[<?php echo $this->_tpl_vars['sitem']['id']; ?>
]" <?php if (is_array ( $this->_tpl_vars['values'] ) && in_array ( $this->_tpl_vars['ssitem']['id'] , $this->_tpl_vars['values'] )): ?> checked="checked" <?php endif; ?> value="<?php echo $this->_tpl_vars['ssitem']['id']; ?>
" id="R<?php echo $this->_tpl_vars['ssitem']['id']; ?>
" class="subr<?php echo $this->_tpl_vars['ssitem']['pid']; ?>
" <?php if (! $this->_tpl_vars['_pc']): ?>disabled="disabled"<?php endif; ?> />
       <span class="Level2"style="position: relative;top: -3px;color: #000;font-size: 13px;"><label for="R<?php echo $this->_tpl_vars['ssitem']['id']; ?>
"><?php echo $this->_tpl_vars['ssitem']['label']; ?>
</label></span>
       <br class="cb" />
</li>
      <?php endforeach; endif; unset($_from); ?>
     </ul>
      <?php endif; ?>
     
     </li>
     <br class="cb"/>
    
    <?php endforeach; endif; unset($_from); ?>
  </li> 
  
  
  </ul>
  <?php endif; ?>
  
  <?php endforeach; endif; unset($_from); ?>
</ul>