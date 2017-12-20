<?php /* Smarty version 2.6.26, created on 2017-02-02 19:26:16
         compiled from services/add-services-tabs/main.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'services/add-services-tabs/main.tpl.html', 2, false),array('modifier', 'default', 'services/add-services-tabs/main.tpl.html', 6, false),)), $this); ?>
<div class="add_services">
<h2><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'profile-create','default' => 'Создание профиля компании'), $this);?>
</h2>
<table  border="0" cellpadding="10" cellspacing="0" class="text" id="Table2">
            <tr>
                    <td><label  for="company_title" class="req_field addLabel"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'company_Name','default' => "Название компании:"), $this);?>
*</label></td>
        	               <td colspan="3"><input data-position="left bottom" name="company[title]" type="text" maxlength="150" size="90" id="company_title" class="inputbig" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->post['company']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/></td>
                        </tr>
                        <tr>
                          <td><label class="addLabel"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Category','default' => "Категория:"), $this);?>
*</label></td>
                          <td>
                              <select class="uni"  name="company[servicescategory]" id="company_category" class="select_170" onchange="loadSubCategory(this)">
                                      
										<!--<?php $_from = $this->_tpl_vars['this']->dictonary['servicescategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['servicesIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['servicesIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['servicescategory']):
        $this->_foreach['servicesIteration']['iteration']++;
?> -->
										
                                      <option  value="<?php echo $this->_tpl_vars['servicescategory']['id']; ?>
"><?php echo $this->_tpl_vars['servicescategory']['name']; ?>
</option>
                                      
										<!--<?php endforeach; endif; unset($_from); ?>-->

                                    
                                </select>
                          </td>
                          <td><div style="width: 12px;text-align: center;"><img src="../../css/addslaq.png"/></div></td>
                          <td>
                            <select class="uni" name="company[sub_servicescategory]" id="sub_servicescategory" class="select_170" style="display: none;float: left;">
                                      	<option  value="0"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'SELECT_ONE'), $this);?>
</option>
                              </select>
                          </td>
                          
                        </tr>
                        
                              
                        
                        <tr>
                          <td><label for="company_addres" class="addLabel"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'address_label','default' => "Адрес:"), $this);?>
*</label></td>
                          <td colspan="3"><input data-position="left bottom"  name="company[addres]" type="text" maxlength="200" size="50" id="company_addres"  class="inputbig" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->post['company']['addres'])) ? $this->_run_mod_handler('default', true, $_tmp, ' ') : smarty_modifier_default($_tmp, ' ')); ?>
"/></td>  
                          
                        </tr>
                        <tr>
                          <td><label for="company_url" class="addLabel"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'web_page_label','default' => "Сайт (начиная с http://):"), $this);?>
</label></td>
                          <td colspan="3"><input   name="company[url]" type="text" maxlength="50" size="50" id="company_url" class="inputbig" value=""/></td>
                        </tr>
                        <tr>
                            <td><label class="addLabel" for="company_phone"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Contact_details_phone','default' => "Телефон:"), $this);?>
*</label></td>
                            <td><input data-position="left bottom"   name="company[phone]" type="text" maxlength="50" size="50"   id="company_phone" class="inputsmall" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->post['company']['phone'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/></td>
                            <td colspan="2"><input  name="company[phone1]" type="text" maxlength="50" size="50"   id="company_phone1" class="inputsmall" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->post['company']['phone1'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/></td>
                        </tr>    
                        <tr>
                          <td><label for="company_email" class="addLabel"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Email','default' => "E-mail:"), $this);?>
</label></td>
                          <td colspan="3"><input data-position="left bottom"  name="company[email]" type="text" maxlength="50" size="50" id="company_email" class="inputbig" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->post['company']['email'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
"/></td>
                        </tr>
                        <tr>
                            <td><label for="company_text" class="addLabel"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'short_desc_label_label','default' => "Краткое описание:"), $this);?>
<span class="red" id="SpanError"></span></label></td>
                            <td colspan="3"><textarea name="company[description]" rows="6" id="company_text"  ><?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->post['company']['description'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
</textarea></td>
                        </tr>
                        
                        <tr>
                            <td><label  class="addLabel" for="filed_options"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'logo'), $this);?>
</label></td>
                            <td colspan="3"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "services/services_logo.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                        </tr>
                        <tr>
                            <td><label  class="addLabel" for="filed_options"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'filed_photos'), $this);?>
</label></td>
                            <td colspan="3"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "services/offer_photos.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
                        </tr>
                        <tr>
                          <td rowspan="2"><button type="submit" name="btnNext" value=""  id="btnNext" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'create','default' => "Создать"), $this);?>
</button></td>
                        </tr>
                
          </table>
</div>