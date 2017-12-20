<?php /* Smarty version 2.6.26, created on 2017-02-03 08:43:27
         compiled from users/add-offer-tabs/main.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/add-offer-tabs/main.tpl.html', 6, false),array('function', 'html_options', 'users/add-offer-tabs/main.tpl.html', 72, false),array('function', 'html_radios', 'users/add-offer-tabs/main.tpl.html', 160, false),array('modifier', 'date_format', 'users/add-offer-tabs/main.tpl.html', 67, false),array('modifier', 'yearRange', 'users/add-offer-tabs/main.tpl.html', 68, false),array('modifier', 'default', 'users/add-offer-tabs/main.tpl.html', 139, false),)), $this); ?>
<table cellpadding="0" cellspacing="0" summary="" width="100%">
  <tr>
    <td style="vertical-align:top" width="55%">
    <table cellpadding="0" cellspacing="0" summary="" width="100%">
        <tr>
          <td width="25%"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_brand','default' => "Марка"), $this);?>
*</td>
           <td style="padding-left: 10px;"><select style="margin-top: 3px;"  data-position="left top" name="main[filed_car_brand]" id="main[filed_car_brand]"  onchange="fillMyModelsGR(this.value,'filed_car_brand_model','<?php echo $this->_tpl_vars['this']->path; ?>
')"  class="sel w170">
              <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'select_car_brand'), $this);?>
</option>
              
      
        <?php $_from = $this->_tpl_vars['this']->dictonary['brand']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_id'] => $this->_tpl_vars['item']):
?>
            
      
              <option value="<?php echo $this->_tpl_vars['_id']; ?>
" <?php if ($this->_tpl_vars['offer']['filed_car_brand'] == $this->_tpl_vars['_id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']; ?>
</option>
              
      
        <?php endforeach; endif; unset($_from); ?>
  
    
            </select></td>
        </tr>
        <tr>
          <td><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_model','default' => "Серия"), $this);?>
*</td>
          <td style="padding-left: 10px;"><div class="no_bg">
              <select style="margin-top: 3px;" data-position="left top" name="main[filed_car_brand_model]" id="filed_car_brand_model" <?php if (! $this->_tpl_vars['offer']['filed_car_brand']): ?> disabled="disabled"<?php endif; ?> class="sel w170" >
                <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'select_car_model'), $this);?>
</option>
                
      
  
 <?php if ($this->_tpl_vars['offer']['filed_car_brand']): ?>
  
	<?php $this->assign('select_car_models', $this->_tpl_vars['db']->getTree('brandmodel','*',"lng_id=".($this->_tpl_vars['this']->defLng['id'])." AND `active` ")); ?>
        
  <?php $_from = $this->_tpl_vars['select_car_models'][$this->_tpl_vars['offer']['filed_car_brand']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
  
  <?php if (isset ( $this->_tpl_vars['select_car_models'][$this->_tpl_vars['item']['id']] )): ?>
  
      
                <option value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['offer']['filed_car_brand_model'] == $this->_tpl_vars['item']['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['label']; ?>
</option>
                 
                
      
  <?php else: ?>
    
      
                <option value="<?php echo $this->_tpl_vars['item']['id']; ?>
" <?php if ($this->_tpl_vars['offer']['filed_car_brand_model'] == $this->_tpl_vars['item']['id']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['item']['label']; ?>
</option>
                
      
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  <?php endif; ?>

    
              </select>
            </div></td>
        </tr>
        <tr>
          <td><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_year','default' => "Год выпуска"), $this);?>
*</td>
          <td style="padding-left: 10px;"> <?php $this->assign('cyear', ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y"))); ?>
            <?php $this->assign('years', ((is_array($_tmp=$this->_tpl_vars['cyear'])) ? $this->_run_mod_handler('yearRange', true, $_tmp, 1900) : HelperModifier::yearRange($_tmp, 1900))); ?>
            <select  data-position="left top" name="main[filed_release_date_year]" id="filed_release_date_year" class="sel" style="width:95px;margin-top: 3px;" >
              <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'select_year'), $this);?>
</option>
              
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['years'],'selected' => $this->_tpl_vars['offer']['filed_release_date_year']), $this);?>


            </select></td>
        </tr>
        
        <tr>
          <td><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_milage','default' => "Пробег"), $this);?>
*</td>
          <td style="padding-left: 10px;"><input maxlength="9" data-position="left top" style="width:120px;border: 1px solid #717171;margin-top: 3px; " type="text" name="main[filed_milage]" id="filed_milage" value="<?php echo $this->_tpl_vars['offer']['filed_milage']; ?>
" class="inp fl" <?php if ($this->_tpl_vars['offer']['isnew']): ?> disabled="disabled"<?php endif; ?>/>
            <select style="margin-top: 3px; padding-left: 3px; width: 56px;" name="main[filed_milage_kayficent]" class="sel fl" style="width: 65px;">
         
              
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['this']->dictonary['milage_kayficent'],'selected' => $this->_tpl_vars['offer']['filed_milage_kayficent']), $this);?>


            </select></td>
        </tr>
        <tr>
          <td ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_gearbox','default' => "КПП"), $this);?>
*</td>
          <td style="padding-left: 10px;"> <?php $this->assign('_gearboxoptions', $this->_tpl_vars['db']->getOptions('gearbox','id','value',$this->_tpl_vars['this']->defLng['id'],'active','','position')); ?>
            <select style="margin-top: 3px;" data-position="left top" name="main[filed_gearbox]" id="filed_gearbox" class="sel w170 fl"  style="width:171px">
              <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'select_gearbox'), $this);?>
</option>
              
      
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['_gearboxoptions'],'selected' => $this->_tpl_vars['offer']['filed_gearbox']), $this);?>


    
            </select></td>
        </tr>
        
        
        <tr>
          <td><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_price','default' => "Цена"), $this);?>
*</td>
          <td style="padding-left: 10px;"><input data-position="left top" maxlength="9" type="text" name="main[filed_price]" style="width:120px;height:18px; border: 1px solid #717171;margin-top: 3px; " id="filed_price" class="inp fl"   value="<?php echo $this->_tpl_vars['offer']['filed_price']; ?>
" <?php if ($this->_tpl_vars['offer']['contract']): ?> disabled="disabled"<?php endif; ?> />
            <select style="margin-top: 3px; padding-left: 0px; width: 56px;" name="main[filed_currency]" id="filed_currency" 
        style="width:65px;  " class="sel fl"  <?php if ($this->_tpl_vars['offer']['contract']): ?> disabled="disabled"<?php endif; ?> >
              
  
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['currnecys'],'selected' => $this->_tpl_vars['offer']['filed_currency']), $this);?>


            </select></td>
        </tr>
        
        
        
		<tr>
		<td></td>
		<td style="padding-left: 10px;"><label for="filed_contract" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'filed_contract'), $this);?>
</label>
        <input style="position: relative;top: 4px;" type="checkbox" name="main[filed_contract]" id="filed_contract" <?php if ($this->_tpl_vars['offer']['filed_contract']): ?> checked="checked"<?php endif; ?> value="0" onclick="changeProceStatus(this)" class="chkMarg2 fl" /></td>

		</tr>
       	
      </table></td>
    <td style="vertical-align:top">
    <table cellpadding="0" cellspacing="0" summary="" width="100%">
        
		 <tr>
          <td width="30%"> <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_body','default' => "Кузов"), $this);?>
</td>
          <td ><select style="margin-top: 3px;" data-position="right top" name="main[filed_body]" id="filed_body" class="sel w170 fl">
              <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'select_body'), $this);?>
</option>
              
      
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['_bodyoptions'],'selected' => $this->_tpl_vars['offer']['filed_body']), $this);?>


    
            </select></td>
        </tr>
        <tr>
          <td><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_engine','default' => "Двигатель"), $this);?>
</td>
          <td><input  data-position="right top" type="text" name="main[filed_engine]" id="filed_engine" class="inp " style="margin-top: 3px; width:80px;border: 1px solid #717171;margin-right: 2px!important;text-align: center;" placeholder="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'sm3'), $this);?>
" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['offer']['filed_engine'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/>
            
            <input  data-position="right top"  type="text" name="main[filed_engine_power]" id="filed_engine_power" class="inp " style="margin-top: 3px; width:80px;border: 1px solid #717171;margin-right: 5px!important;text-align: center;" placeholder="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'MENSURATION_OF_POWER'), $this);?>
" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['offer']['filed_engine_power'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/>
            </td>
        </tr>
		<tr>
          <td> <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => "\"offer_DRIVE\";",'default' => "Привод"), $this);?>
</td>
			<td > <?php $this->assign('_driveoptions', $this->_tpl_vars['db']->getOptions('drive','id','value',$this->_tpl_vars['this']->defLng['id'],'active')); ?>
            <select data-position="right top" name="main[filed_drive]" id="filed_drive" class="sel w170 fl">
              <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'select_drive'), $this);?>
</option>
              
      
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['_driveoptions'],'selected' => $this->_tpl_vars['offer']['filed_drive']), $this);?>


    
            </select></td>
        </tr>
       
        <tr style="line-height: 35px;">
          <td><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_rudders','default' => "Руль"), $this);?>
</td>
          <td > <?php $this->assign('_rudder', $this->_tpl_vars['db']->getOptions('rudder','id','value',$this->_tpl_vars['this']->defLng['id'],'active')); ?>
<?php echo smarty_function_html_radios(array('name' => 'main[filed_rudder]','id' => 'filed_rudder','options' => $this->_tpl_vars['_rudder'],'selected' => ((is_array($_tmp=@$this->_tpl_vars['offer']['filed_rudder'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1))), $this);?>
 </td>
        </tr>
		 <tr>
          <td><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_color','default' => "Цвет"), $this);?>
</td>
          <td >
          <select  data-position="right top" name="main[filed_color]" id="filed_color" class="sel  fl" style="margin-top: 3px; width:100px">
                            
      			<?php $_from = $this->_tpl_vars['clors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['color']):
?>
                <option value="<?php echo $this->_tpl_vars['color']['id']; ?>
" hexcode="<?php echo $this->_tpl_vars['color']['hexcode']; ?>
"  <?php if ($this->_tpl_vars['color']['id'] == $this->_tpl_vars['offer']['filed_color']): ?> selected="selected" <?php endif; ?>></option>
				<?php endforeach; endif; unset($_from); ?>
    
            </select>
            &nbsp;
            <label for="filed_metalic" style="position: relative;  top: 7px;">
              <input style="position: relative;top: 2px;" type="checkbox" name="main[filed_metalic]"  <?php if ($this->_tpl_vars['offer']['filed_metalic']): ?> checked="checked"<?php endif; ?>id="filed_metalic" value="1"/>
              <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'color_metalic'), $this);?>
 </label></td>
        </tr>
        <tr style="line-height: 35px;">
          <td><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_customs_free','default' => "Растамжен"), $this);?>
</td>
          <td  ><?php $this->assign('_customsoptions', $this->_tpl_vars['db']->getOptions('customs','id','value',$this->_tpl_vars['this']->defLng['id'],'active')); ?>
            
            <?php echo smarty_function_html_radios(array('name' => 'main[filed_customs]','id' => 'filed_customs','options' => $this->_tpl_vars['_customsoptions'],'selected' => ((is_array($_tmp=@$this->_tpl_vars['offer']['filed_customs'])) ? $this->_run_mod_handler('default', true, $_tmp, 1) : smarty_modifier_default($_tmp, 1)),'separator' => ''), $this);?>
</td>
        </tr>

        
		<!-- փոխանակում և ապառիկ
		 <tr>
          <td ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_interchange'), $this);?>
</td>
          <td > <?php $this->assign('_interchangeoptions', $this->_tpl_vars['db']->getOptions('interchange','id','value',$this->_tpl_vars['this']->defLng['id'],'active','','position')); ?>
            <select style="margin-top: 3px;" name="main[filed_interchange]" id="filed_interchange" class="sel w170 fl"  style="width:171px">
              <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'select_car_brand'), $this);?>
</option>
              
      
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['_interchangeoptions'],'selected' => $this->_tpl_vars['offer']['filed_interchange']), $this);?>


    
            </select></td>
        </tr>
         <tr>
          <td ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_credit'), $this);?>
</td>
          <td > <?php $this->assign('_creditoptions', $this->_tpl_vars['db']->getOptions('credit','id','value',$this->_tpl_vars['this']->defLng['id'],'active','','position')); ?>
            <select style="margin-top: 3px;" name="main[filed_credit]" id="filed_credit" class="sel w170 fl"  style="width:171px">
              <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'select_car_brand'), $this);?>
</option>
              
      
        <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['_creditoptions'],'selected' => $this->_tpl_vars['offer']['filed_credit']), $this);?>


    
            </select></td>
        </tr>
		-->
      </table></td>
  </tr>
  <tr style="position: absolute; top: 304px;">
   <td colspan="2"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_description','default' => "Комментарий владельца"), $this);?>
</td>
   </tr>
   <tr>
  <td colspan="2">
  <textarea id="main[description]" name="main[description]" rows="0" cols="0" class="txtarea " style="width: 703px; height:100px;margin-left: 142px;"><?php echo $this->_tpl_vars['offer']['description']; ?>
</textarea>
  </td>
  </tr>
</table>