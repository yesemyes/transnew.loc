<?php /* Smarty version 2.6.26, created on 2017-02-02 17:45:26
         compiled from advancedsearch/form.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'advancedsearch/form.tpl.html', 3, false),)), $this); ?>
<?php $this->assign('modelsTree', $this->_tpl_vars['db']->getTree('brandmodel',' pid,id,alias, label '," lng_id=".($this->_tpl_vars['this']->defLng['id'])." ",'','label')); ?>
<div style="width:300px;display:none" id="signupFormLaoder" > <img src="/images/ajax-loader.gif" alt="" title="" /> </div>
<form action="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'advancedsearch'), $this);?>
" method="get" id="signupForm" >
      
  <?php $this->assign('bodyTypes', $this->_tpl_vars['this']->dictonary['body_all']); ?>
  <ul class="bodySelector UlNoStyle" >
    <?php $_from = $this->_tpl_vars['bodyTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['cc'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cc']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['cc']['iteration']++;
?>
    <?php $this->assign('_path', "/img/body/image/".($this->_tpl_vars['item']['image'])); ?>
    <?php if ($_GET['filed_body']): ?>
    <?php $this->assign('selected_body', $_GET['filed_body']); ?>
    <?php endif; ?>
    <li > 
     
      <label <?php if ($this->_tpl_vars['selected_body'] && in_array ( $this->_tpl_vars['item']['id'] , $this->_tpl_vars['selected_body'] )): ?>class="selected_body"<?php endif; ?> title="<?php echo $this->_tpl_vars['item']['value']; ?>
" for="filed_bodys_<?php echo $this->_tpl_vars['item']['id']; ?>
" id="li_bodys_<?php echo $this->_tpl_vars['item']['id']; ?>
" style=" background:url(<?php echo $this->_tpl_vars['_path']; ?>
) no-repeat;">
      <input type="checkbox" name="filed_body[]" onclick="selectThisCH(this,'li_bodys_<?php echo $this->_tpl_vars['item']['id']; ?>
')"  value="<?php echo $this->_tpl_vars['item']['id']; ?>
" id="filed_bodys_<?php echo $this->_tpl_vars['item']['id']; ?>
"  <?php if ($this->_tpl_vars['selected_body'] && in_array ( $this->_tpl_vars['item']['id'] , $this->_tpl_vars['selected_body'] )): ?>checked="checked";<?php endif; ?> />
      
      </label>
      
    </li>
    <?php endforeach; endif; unset($_from); ?>
    <br class="cb"/>
  </ul>
  <br class="cb" />
    <input type="hidden" name="search" value="search-advanced" />
  
</form>