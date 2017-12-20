<?php /* Smarty version 2.6.26, created on 2017-02-02 17:31:34
         compiled from users/mycars.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/mycars.tpl.html', 2, false),array('function', 'Link', 'users/mycars.tpl.html', 4, false),array('function', 'BulidQuery', 'users/mycars.tpl.html', 57, false),array('modifier', 'nf', 'users/mycars.tpl.html', 32, false),array('modifier', 'ceil', 'users/mycars.tpl.html', 32, false),)), $this); ?>

    <script>var CONFIRM = "<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'CONFIRM'), $this);?>
"</script>

<a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'addoffer'), $this);?>
" class="add_car fl" style="color: #06b2f3; text-decoration: none;">
<span class="fl" style="display: block; margin-right: 10px;margin-top: 3px;"><img src="/css/car.png"/></span>
<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'add_offer'), $this);?>

</a>

<table class="offerList_offerList" border="0px"  cellpadding="0" cellspacing="0">
  <tr class="offerList_fisrt">
    <td class="offerList_first_title"><span class="offerList_bg"><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'mycars'), $this);?>
?order_by=brandmodel&direction=asc" class="offerList_title2"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_model','default' => "Модель"), $this);?>
</a></span></td>
    <td class="offerList_first_shadow"></td>
    <td class="offerList_first_title"><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'mycars'), $this);?>
?order_by=price&direction=asc" class="offerList_title"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_price','default' => "Цена"), $this);?>
</a></td>
    <td class="offerList_first_shadow"></td>
    <td class="offerList_first_title"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_photo','default' => "Фото"), $this);?>
</td>
    <td class="offerList_first_shadow"></td>
    <td class="offerList_first_title"><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'mycars'), $this);?>
?order_by=year&direction=asc" class="offerList_title"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_year','default' => "Год"), $this);?>
</a></td>
    <td class="offerList_first_shadow"></td>
    <td class="offerList_first_title"><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'mycars'), $this);?>
?order_by=engine&direction=asc" class="offerList_title"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_engine','default' => "Двигатель"), $this);?>
</a></td>
    <td class="offerList_first_shadow"></td>
    <td class="offerList_first_title"><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'mycars'), $this);?>
?order_by=milage&direction=asc" class="offerList_title"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_milage','default' => "Пробег"), $this);?>
</a></td>
    <td class="offerList_first_shadow"></td>
    <td class="offerList_first_title"> <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_actions','default' => "Пок./ред./Удал."), $this);?>
 </td>
  </tr>
  <?php if (! empty ( $this->_tpl_vars['this']->userOffers['found'] )): ?>
  <?php $_from = $this->_tpl_vars['this']->userOffers['found']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['offer']):
?>
  <tr class="offerList_last">
   <td class="offerList_first_title"><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','action' => 'user','brand' => $this->_tpl_vars['offer']['brandalias'],'model' => $this->_tpl_vars['offer']['modelalias'],'name' => $this->_tpl_vars['offer']['name']), $this);?>
" class="offerList_simple"><?php echo $this->_tpl_vars['offer']['brandmodel']; ?>
</a> </td>
    <td class="offerList_shadow"></td>
  
    <td class="offerList_just"><?php if ($this->_tpl_vars['offer']['contract'] != 1): ?><?php if ($this->_tpl_vars['offer']['currency_id'] == 3): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['filed_price'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['price']/$this->_tpl_vars['this']->config['USD_RATE'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)))) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
 $<?php endif; ?><?php else: ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'filed_contract'), $this);?>
<?php endif; ?></td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just"><?php if ($this->_tpl_vars['offer']['image']): ?><img src="/img/offers/thumb/<?php echo $this->_tpl_vars['offer']['image']; ?>
" alt="<?php echo $this->_tpl_vars['offer']['brandmodel']; ?>
" title="<?php echo $this->_tpl_vars['offer']['brandmodel']; ?>
"/><?php else: ?>-<?php endif; ?></td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just"><?php echo $this->_tpl_vars['offer']['year']; ?>
</td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just"><?php if ($this->_tpl_vars['offer']['engine'] && $this->_tpl_vars['offer']['engine'] != 0): ?><?php echo $this->_tpl_vars['offer']['engine']; ?>
 <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'liter','default' => 'л'), $this);?>
<?php else: ?>-<?php endif; ?></td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just"><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['milage']*$this->_tpl_vars['offer']['milagek'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
&nbsp;<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_milage_km','default' => "км"), $this);?>
</td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just">
    <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','action' => 'user','brand' => $this->_tpl_vars['offer']['brandalias'],'model' => $this->_tpl_vars['offer']['modelalias'],'name' => $this->_tpl_vars['offer']['name']), $this);?>
" class="user_action view"></a> 
    <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'editoffer','name' => $this->_tpl_vars['offer']['name']), $this);?>
" class="user_action edit"></a> 
    <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','action' => 'deleteoffer'), $this);?>
" class="user_action delete" data-offer-id="<?php echo $this->_tpl_vars['offer']['id']; ?>
"></a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr class="offerList_lines" >
    <td colspan="13"><div class="offerList_line"></div></td>
  </tr>
  <?php else: ?>
  <tr class="offerList_lines" >
    <td colspan="13"><div class="offerList_line"></div></td>
  </tr>
  <?php endif; ?>
</table>
<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'assign' => 'queryTail'), $this);?>

    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/paging.tpl.html", 'smarty_include_vars' => array('className' => 'offerListPaginator','found_rows' => $this->_tpl_vars['this']->userOffers['total'],'limit' => $this->_tpl_vars['this']->userOffers['limit'],'page' => $this->_tpl_vars['this']->userOffers['page'],'tail' => $this->_tpl_vars['queryTail'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br />
<div class="btnbord cb"></div>