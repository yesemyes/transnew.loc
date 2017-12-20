<?php /* Smarty version 2.6.26, created on 2017-02-03 08:43:26
         compiled from users/addoffer.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/addoffer.tpl.html', 42, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['_where'] )): ?>
<?php $this->assign('condWhere', ''); ?>
<?php $this->assign('condLimit', ''); ?>
<?php $this->assign('condOrder', ''); ?>
<?php $this->assign('condPage', ''); ?>

<?php if (isset ( $this->_tpl_vars['_where'] )): ?>
<?php $this->assign('condWhere', $this->_tpl_vars['_where']); ?>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['_imit'] )): ?>
<?php $this->assign('condLimit', $this->_tpl_vars['_imit']); ?>
<?php endif; ?>

<?php if (isset ( $this->_tpl_vars['_order'] )): ?>
<?php $this->assign('condOrder', $this->_tpl_vars['_order']); ?>
<?php else: ?>
<?php $this->assign('condOrder', 'filed_srtat_date DESC '); ?>
<?php endif; ?>


<?php if (isset ( $this->_tpl_vars['_page'] )): ?>
<?php $this->assign('condPage', $this->_tpl_vars['_page']); ?>
<?php endif; ?>

<?php $this->assign('_offers', $this->_tpl_vars['this']->getOffers($this->_tpl_vars['condWhere'],$this->_tpl_vars['condOrder'],$this->_tpl_vars['condLimit'],$this->_tpl_vars['condPage'])); ?>
<?php $this->assign('offer', $this->_tpl_vars['_offers']['found']['0']); ?>
<?php if ($this->_tpl_vars['offer']['id']): ?>
<?php $this->assign('offer_options', $this->_tpl_vars['this']->getOfferOptionsAll($this->_tpl_vars['offer']['id'])); ?>

<?php $this->assign('offer_images', $this->_tpl_vars['this']->getOfferImages($this->_tpl_vars['offer']['id'])); ?>
<?php endif; ?>
<?php endif; ?>
<?php $this->assign('currnecys', $this->_tpl_vars['db']->getOptions('currency','id','value',$this->_tpl_vars['this']->defLng['id'],'active')); ?>
<?php $this->assign('_filed_stateoptions', $this->_tpl_vars['db']->getOptions('state','id','value',$this->_tpl_vars['this']->defLng['id'],'active')); ?>
<?php $this->assign('_bodyoptions', $this->_tpl_vars['db']->getOptions('body','id','value',$this->_tpl_vars['this']->defLng['id'],'active','','position')); ?>
<?php $this->assign('clors', $this->_tpl_vars['this']->dictonary['color_adv']); ?>
<form action="<?php echo $this->_tpl_vars['this']->path; ?>
" method="post" id="signupForm"   >
<div class="errors" id="errors"></div>
<div id="add-offer-tabs">
  <ul>
    <li ><a href="#main-data"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'main_data','default' => "Оснавные парамерты"), $this);?>
*</a></li>
    <li ><a href="#options-data"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'options_data','default' => "Комплектация"), $this);?>
</a></li>
    <li ><a href="#images-data"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'images_data','default' => "Фотографии"), $this);?>
</a></li>
    <li ><a href="#contact-data"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'contact_data','default' => "Контактная информация"), $this);?>
</a></li>
  </ul>
  <div id="main-data"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "users/add-offer-tabs/main.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br  class="cb"/></div>
  <div id="options-data"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "users/add-offer-tabs/options.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br  class="cb"/></div>
  <div id="images-data"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "users/add-offer-tabs/images.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br  class="cb"/></div>
  <div id="contact-data"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "users/add-offer-tabs/contact.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br  class="cb"/></div>
</div>
<div class="btnbord cb" style="text-align: center;">
    <span class="yelbtn2 margR5"></span>
  <div class="yelbtn1">
    <button type="button" value="user_prev" style="display:none" id="user_prev" name="addThisOffer" class="pointer" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_prev'), $this);?>
</button>
    <button type="submit"   value="user_submit" style="display:none"   id="user_submit" name="addThisOffer" class="pointer" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_submit'), $this);?>
</button>
    <button type="submit"   value="user_next"      id="user_next" name="addThisOffer" class="pointer" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'user_next'), $this);?>
</button>
  </div>
  <span class="yelbtn2 fl"></span> </div>
</form>
<script type="text/javascript" language="javascript" >
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "users/jsValidateMessages.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</script>