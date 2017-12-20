<?php /* Smarty version 2.6.26, created on 2017-02-03 08:43:28
         compiled from users/add-offer-tabs/contact.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/add-offer-tabs/contact.tpl.html', 3, false),)), $this); ?>
<div class="fl" >
<span class="formtit  fl" style="margin-bottom: 10px;"> 
<label class="req_field textR fl" style="width: 130px;font-size: 1.2em;color: #000;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'contact_person','default' => 'Контактное лицо'), $this);?>
:</label>
<input type="text" <?php if ($this->_tpl_vars['offer']['contact_name']): ?>value="<?php echo $this->_tpl_vars['offer']['contact_name']; ?>
"<?php endif; ?> class="inp margL10 fl" style="width:198px;margin-top: 3px;" name="main[contact_name]" id="contact_name"/>
</span>
<br class="cb"/>








<span class="formtit  fl" style="margin-bottom: 10px;"> 
<label class="req_field textR fl" style="width: 130px; font-size: 1.2em;color: #000;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'country','default' => 'Страна'), $this);?>
:</label>
<select style="width: 200px;margin-top: 3px;" class="inp" name="main[filed_country]" id="filed_state" onchange="fillMyStates(this.value,'filed_city','<?php echo $this->_tpl_vars['this']->path; ?>
')">
    <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'select_state','default' => 'Ընտրել երկիրը'), $this);?>
</option>
    <?php $_from = $this->_tpl_vars['this']->states['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_id'] => $this->_tpl_vars['state']):
?>
    <option value="<?php echo $this->_tpl_vars['_id']; ?>
" value="<?php echo $this->_tpl_vars['_id']; ?>
" <?php if ($this->_tpl_vars['offer']['filed_country'] == $this->_tpl_vars['_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['state']['value']; ?>
</option>
    
    <?php endforeach; endif; unset($_from); ?>
    
</select>
</span>
<br class="cb"/>

<span class="formtit  fl" style="margin-bottom: 10px;"> 
<label class="req_field textR fl" style="width: 130px;font-size: 1.2em;color: #000;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'city','default' => 'Город'), $this);?>
:</label>




<select style="width: 200px;margin-top: 3px;" class="inp"  name="main[filed_city]" id="filed_city" <?php if (! $this->_tpl_vars['offer']['filed_country']): ?> disabled="disabled"<?php endif; ?> >
<option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'select_city'), $this);?>
</option>
<?php if ($this->_tpl_vars['offer']['filed_country']): ?>

	<?php $this->assign('select_city', $this->_tpl_vars['db']->getTree('states','*',"lng_id=".($this->_tpl_vars['this']->defLng['id'])." AND `active`",'','position')); ?>
    
    <?php $_from = $this->_tpl_vars['select_city'][$this->_tpl_vars['offer']['filed_country']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
    
      <?php if (isset ( $this->_tpl_vars['select_city'][$this->_tpl_vars['item']['id']] )): ?>
  
      
                <option  label="<?php echo $this->_tpl_vars['item']['label']; ?>
"><?php echo $this->_tpl_vars['item']['label']; ?>
</option>
 
 
                
      
  <?php else: ?>
    
      
                <option value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['offer']['filed_city'] == $this->_tpl_vars['item']['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['value']; ?>
</option>
                
      
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>
    


 </select>   

</span>

<span class="formtit  fr" style="margin-bottom: 10px;"> 
<label class="textR fl" style="width: 130px;font-size: 1.2em;color: #000;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'other_city','default' => 'или другой город'), $this);?>
:</label>
<input type="text" class="inp margL10 fl" style="width:200px;margin-top: 3px;" <?php if ($this->_tpl_vars['offer']['filed_other_city']): ?>value="<?php echo $this->_tpl_vars['offer']['filed_other_city']; ?>
"<?php endif; ?>  name="main[filed_other_city]" id="filed_other_city"/>
</span>
<br class="cb"/>




<span class="formtit  fl" style="margin-bottom: 3px;">
<label  for="user_phone1" class="req_field textR fl" style="width: 130px;font-size: 1.2em;color: #000;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_phone1'), $this);?>
:*</label>
<?php $this->assign('phone1', $this->_tpl_vars['offer']['phone1']); ?>

<input <?php if ($this->_tpl_vars['phone1']): ?> value="<?php echo $this->_tpl_vars['phone1']; ?>
"<?php endif; ?> size="12" maxlength="12" type="text" name="user_phone1" id="user_phone1" class="phone inp margL10 fl" style="width:70px;margin-top: 3px;" />
</span>
<br class="cb"/>
<span class="formtit  fl" style="margin-bottom: 3px;padding-left: 144px;">
<?php $this->assign('phone2', $this->_tpl_vars['offer']['phone2']); ?>
<input <?php if ($this->_tpl_vars['phone2']): ?> value="<?php echo $this->_tpl_vars['phone2']; ?>
"<?php endif; ?> size="12	" maxlength="12" type="text" name="user_phone2" id="user_phone2" class="phone inp margL10 fl" style="width:70px;margin-top: 3px;" />
</span>
<br class="cb"/>



</div>
