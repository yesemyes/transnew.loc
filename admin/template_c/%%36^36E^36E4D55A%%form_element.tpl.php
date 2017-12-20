<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from controls/form_element.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'controls/form_element.tpl', 2, false),array('modifier', 'default', 'controls/form_element.tpl', 55, false),)), $this); ?>
    <?php $this->assign('_label', $this->_tpl_vars['this']->trans($this->_tpl_vars['key'])); ?>
    <?php $this->assign('control_tpl', ((is_array($_tmp=((is_array($_tmp='controls/')) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['item']['control']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['item']['control'])))) ? $this->_run_mod_handler('cat', true, $_tmp, '.tpl') : smarty_modifier_cat($_tmp, '.tpl'))); ?>
    <?php if (isset ( $this->_tpl_vars['item']['ml'] )): ?>
    <tr>
    <th><?php echo $this->_tpl_vars['_label']; ?>
</th>
    <td>
    <div  style="clear:both">
    	<?php $_from = $this->_tpl_vars['this']->languages; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lngEachlbl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lngEachlbl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lng_code'] => $this->_tpl_vars['lng']):
        $this->_foreach['lngEachlbl']['iteration']++;
?>
        <div id="cl-<?php echo $this->_tpl_vars['key']; ?>
-<?php echo $this->_tpl_vars['lng_code']; ?>
" class="lng-class-<?php echo $this->_tpl_vars['key']; ?>
 lng-tab<?php if (($this->_foreach['lngEachlbl']['iteration'] <= 1)): ?>-active<?php endif; ?>" onclick="ShowTab('ck_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['key']; ?>
_<?php echo $this->_tpl_vars['lng_code']; ?>
','tab-<?php echo $this->_tpl_vars['key']; ?>
',this,'.lng-class-<?php echo $this->_tpl_vars['key']; ?>
')">
         <img src="/admin/images/f/<?php echo $this->_tpl_vars['lng_code']; ?>
.png">
        <?php if (isset ( $this->_tpl_vars['item']['_ERRORS'] ) && ! empty ( $this->_tpl_vars['item']['_ERRORS'][$this->_tpl_vars['lng']['id']] )): ?><span class="error-span">*</span>
        <?php elseif (isset ( $this->_tpl_vars['item']['required'] ) && $this->_tpl_vars['item']['required']): ?>
        <span >*</span>
        <?php endif; ?>
        
        
        </div>
        <?php endforeach; endif; unset($_from); ?>
   </div> 
    <div  style="clear:both">
        <?php $_from = $this->_tpl_vars['this']->languages; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lngEach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lngEach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['lng_code'] => $this->_tpl_vars['lng']):
        $this->_foreach['lngEach']['iteration']++;
?>
			
        <div id="ck_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['key']; ?>
_<?php echo $this->_tpl_vars['lng_code']; ?>
" class="tab-<?php echo $this->_tpl_vars['key']; ?>
 tab-clas-content" style="<?php if (! ($this->_foreach['lngEach']['iteration'] <= 1)): ?>display:none;<?php endif; ?>" > 
        
       <?php if (isset ( $this->_tpl_vars['item']['_ERRORS'][$this->_tpl_vars['lng']['id']] )): ?>
       
       <?php endif; ?>
        	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['control_tpl'], 'smarty_include_vars' => array('_name' => "_FORM_DATA[ml][".($this->_tpl_vars['key'])."][".($this->_tpl_vars['lng']['id'])."]",'_value' => $this->_tpl_vars['this']->form->_FORM_DATA['ml'][$this->_tpl_vars['key']][$this->_tpl_vars['lng']['id']],'_setting' => $this->_tpl_vars['item'],'_id' => "f_".($this->_tpl_vars['this']->curModule['name'])."_".($this->_tpl_vars['key'])."_".($this->_tpl_vars['lng']['id']),'_key' => $this->_tpl_vars['key'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div> 
        <?php endforeach; endif; unset($_from); ?>
    </div>
    </td>
    </tr>
    <?php elseif (isset ( $this->_tpl_vars['item']['rel'] )): ?>
    <tr>
        <th id="c1_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['key']; ?>
"  ><label for="f_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['_label']; ?>
  
     	<?php if (isset ( $this->_tpl_vars['item']['_ERRORS'] ) && ! empty ( $this->_tpl_vars['item']['_ERRORS'] )): ?><span class="error-span">*</span>
        
        <?php elseif (isset ( $this->_tpl_vars['item']['required'] ) && $this->_tpl_vars['item']['required']): ?>
        <span >*</span>
        <?php endif; ?>
        
        <?php if (isset ( $this->_tpl_vars['item']['unique'] ) && $this->_tpl_vars['item']['unique']): ?>
        <sup  style="<?php if (isset ( $this->_tpl_vars['item']['_ERRORS'] ) && in_array ( 'FIELD_UNIQUE_ERROR' , $this->_tpl_vars['item']['_ERRORS'] )): ?>color:#F00<?php else: ?> color:#0F0<?php endif; ?>">U</sup>
        <?php endif; ?>
        </label>
        </th>
       	<td id="c2_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['key']; ?>
"  > 

    		<?php $this->assign('_val', ((is_array($_tmp=@$this->_tpl_vars['this']->form->_FORM_DATA['rel'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, ''))); ?>
                  
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['control_tpl'], 'smarty_include_vars' => array('_name' => "_FORM_DATA[rel][".($this->_tpl_vars['key'])."]",'_value' => $this->_tpl_vars['_val'],'_setting' => $this->_tpl_vars['item'],'_id' => "f_".($this->_tpl_vars['this']->curModule['name'])."_".($this->_tpl_vars['key']),'_key' => $this->_tpl_vars['key'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
   		</td>
        </tr>
    <?php else: ?>
     <tr>
        <th id="c_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['key']; ?>
"  ><label for="f_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['_label']; ?>
  
     	<?php if (isset ( $this->_tpl_vars['item']['_ERRORS'] ) && ! empty ( $this->_tpl_vars['item']['_ERRORS'] )): ?><span class="error-span">*</span>
        
        <?php elseif (isset ( $this->_tpl_vars['item']['required'] ) && $this->_tpl_vars['item']['required']): ?>
        <span >*</span>
        <?php endif; ?>
        
        <?php if (isset ( $this->_tpl_vars['item']['unique'] ) && $this->_tpl_vars['item']['unique']): ?>
        <sup  style="<?php if (isset ( $this->_tpl_vars['item']['_ERRORS'] ) && in_array ( 'FIELD_UNIQUE_ERROR' , $this->_tpl_vars['item']['_ERRORS'] )): ?>color:#F00<?php else: ?> color:#0F0<?php endif; ?>">U</sup>
        <?php endif; ?>
        </label>
        </th>
       	<td id="c_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['key']; ?>
"  > 
       
    		<?php $this->assign('_val', ((is_array($_tmp=@$this->_tpl_vars['this']->form->_FORM_DATA['main'][$this->_tpl_vars['key']])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, ''))); ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['control_tpl'], 'smarty_include_vars' => array('_name' => "_FORM_DATA[main][".($this->_tpl_vars['key'])."]",'_value' => $this->_tpl_vars['_val'],'_setting' => $this->_tpl_vars['item'],'_id' => "f_".($this->_tpl_vars['this']->curModule['name'])."_".($this->_tpl_vars['key']),'_key' => $this->_tpl_vars['key'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
   		</td>
        </tr>
    <?php endif; ?>