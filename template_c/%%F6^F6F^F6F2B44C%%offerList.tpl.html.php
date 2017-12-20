<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:34
         compiled from cars/offerList.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'OrderingLink', 'cars/offerList.tpl.html', 4, false),array('function', 'Trans', 'cars/offerList.tpl.html', 11, false),array('function', 'Link', 'cars/offerList.tpl.html', 31, false),array('function', 'CatImageToSize', 'cars/offerList.tpl.html', 45, false),array('function', 'FithImageToSize', 'cars/offerList.tpl.html', 47, false),array('function', 'BulidQuery', 'cars/offerList.tpl.html', 66, false),array('modifier', 'nf', 'cars/offerList.tpl.html', 41, false),array('modifier', 'ceil', 'cars/offerList.tpl.html', 41, false),)), $this); ?>
<table class="offerList_offerList" border="0px"  cellpadding="0" cellspacing="0" style="margin-bottom: 30px;">
  <tr class="offerList_fisrt">
    <td class="offerList_first_title">
    <?php echo $this->_plugins['function']['OrderingLink'][0][0]->function_OrderingLink(array('path' => $this->_tpl_vars['this']->path,'order_by' => 'brandmodel','direction' => 'asc','query' => $this->_tpl_vars['this']->query,'term' => 'offer_model'), $this);?>

    </td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title">
    <?php echo $this->_plugins['function']['OrderingLink'][0][0]->function_OrderingLink(array('path' => $this->_tpl_vars['this']->path,'order_by' => 'price','direction' => 'asc','query' => $this->_tpl_vars['this']->query,'term' => 'offer_price'), $this);?>

     </td>
    <td class="offerList_shadow"></td>
 <td class="offerList_first_title"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_photo','default' => "Фото"), $this);?>
</td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title">
     <?php echo $this->_plugins['function']['OrderingLink'][0][0]->function_OrderingLink(array('path' => $this->_tpl_vars['this']->path,'order_by' => 'year','direction' => 'asc','query' => $this->_tpl_vars['this']->query,'term' => 'offer_year'), $this);?>

   </td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title">
     <?php echo $this->_plugins['function']['OrderingLink'][0][0]->function_OrderingLink(array('path' => $this->_tpl_vars['this']->path,'order_by' => 'engine','direction' => 'asc','query' => $this->_tpl_vars['this']->query,'term' => 'offer_engine'), $this);?>

    
     </td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title">
    
    <?php echo $this->_plugins['function']['OrderingLink'][0][0]->function_OrderingLink(array('path' => $this->_tpl_vars['this']->path,'order_by' => 'milage','direction' => 'asc','query' => $this->_tpl_vars['this']->query,'term' => 'offer_milage'), $this);?>

    </td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title"> <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_add_to_fav'), $this);?>
 </td>
  </tr>
  <?php if (! empty ( $this->_tpl_vars['this']->_offers['found'] )): ?>
  <?php $_from = $this->_tpl_vars['this']->_offers['found']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['offer']):
?>
  <?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','action' => 'user','brand' => $this->_tpl_vars['offer']['brandalias'],'model' => $this->_tpl_vars['offer']['modelalias'],'name' => $this->_tpl_vars['offer']['name'],'assign' => 'offerHref'), $this);?>

	<?php $this->assign('selected', 0); ?>
	<?php $_from = $this->_tpl_vars['this']->selected; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
		<?php if ($this->_tpl_vars['offer']['id'] == $this->_tpl_vars['item']): ?>
			<?php $this->assign('selected', 1); ?>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
  <tr class="offerList_last">
    <td class="offerList_first_title"><a href="<?php echo $this->_tpl_vars['offerHref']; ?>
" class="offerList_simple"><?php echo $this->_tpl_vars['offer']['brandmodel']; ?>
</a></td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just"><?php if ($this->_tpl_vars['offer']['filed_contract'] != 1): ?><?php if ($this->_tpl_vars['offer']['filed_currency'] == 3): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['filed_price'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['offer']['service_price']/$this->_tpl_vars['this']->config['USD_RATE'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp)))) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
 <?php endif; ?>$<?php else: ?> <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'filed_contract'), $this);?>
 <?php endif; ?></td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just"><a style="display: block;overflow: hidden;height: 80px;width: 130px;margin: 0 auto;" href="<?php echo $this->_tpl_vars['offerHref']; ?>
" class="offerList_simple">
    <?php if ($this->_tpl_vars['offer']['filed_main_image']): ?>
<img src="<?php echo $this->_plugins['function']['CatImageToSize'][0][0]->function_CatImageToSize(array('width' => 130,'height' => 80,'frame' => false,'base' => '/img/offers/big/','image' => $this->_tpl_vars['offer']['filed_main_image']), $this);?>
" alt="<?php echo $this->_tpl_vars['offer']['brandmodel']; ?>
" />
<?php else: ?>
    <img src="<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 130,'height' => 80,'frame' => true,'base' => "{".($this->_tpl_vars['_path'])), $this);?>
"}" alt="<?php echo $this->_tpl_vars['imgAltTitle']; ?>
" title="<?php echo $this->_tpl_vars['imgAltTitle']; ?>
" />
    <?php endif; ?>
    </a></td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just"><?php echo $this->_tpl_vars['offer']['filed_release_date_year']; ?>
</td>
    <td class="offerList_shadow"></td>
<td class="offerList_just"><?php if ($this->_tpl_vars['offer']['filed_engine'] && $this->_tpl_vars['offer']['filed_engine'] != 0): ?><?php echo $this->_tpl_vars['offer']['filed_engine']; ?>
 <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'liter'), $this);?>
<?php else: ?>-<?php endif; ?></td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just"><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['filed_milage']*$this->_tpl_vars['offer']['filed_milage_kayficent'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
 <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'km'), $this);?>
</td>
    <td class="offerList_shadow"></td>
    <td class="offerList_just">
	<a href="<?php echo $this->_tpl_vars['offerHref']; ?>
" data-offer-id="<?php echo $this->_tpl_vars['offer']['id']; ?>
" data-offer-img="<?php echo $this->_tpl_vars['offer']['filed_main_image']; ?>
" data-name="<?php echo $this->_tpl_vars['offer']['brandmodel']; ?>
, <?php echo $this->_tpl_vars['offer']['filed_release_date_year']; ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['service_price'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
 AMD,<?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['filed_engine']*1000)) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
 <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'cm3'), $this);?>
,<?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['filed_milage']*$this->_tpl_vars['offer']['filed_milage_kayficent'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
 <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'km'), $this);?>
" class="<?php if ($this->_tpl_vars['selected'] == 1): ?>offerList_added <?php endif; ?> offerList_plus"><?php if ($this->_tpl_vars['selected'] != 1): ?>+<?php endif; ?></a></td>
  </tr>
  <tr class="offerList_lines" >
    <td colspan="13"><div class="offerList_line"></div></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr class="offerList_lines" >
    <td colspan="13">
    <?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'assign' => 'queryTail'), $this);?>

    
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/paging.tpl.html", 'smarty_include_vars' => array('className' => 'offerListPaginator','found_rows' => $this->_tpl_vars['this']->_offers['total'],'limit' => $this->_tpl_vars['this']->_offers['limit'],'page' => $this->_tpl_vars['this']->_offers['page'],'tail' => $this->_tpl_vars['queryTail'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </td>
  </tr>
  <?php else: ?>
  <tr class="offerList_lines" >
    <td colspan="13"><div class="offerList_line"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'NO_DATA_FOUND'), $this);?>
</div></td>
  </tr>
  <?php endif; ?>
</table>

<table class="saved_items" style="display:none;" cellspacing="0">
 
 <tr class="offerList_fisrt" style="background-position-x: -3px;">
    <td class="offerList_first_title" >
    <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_model'), $this);?>

    </td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title">
    <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_price'), $this);?>

     </td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_photo','default' => "Ð¤Ð¾Ñ‚Ð¾"), $this);?>
</td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title">
     <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_year'), $this);?>

   </td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title">
     <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_engine'), $this);?>

    
     </td>
    <td class="offerList_shadow"></td>
    <td class="offerList_first_title">
    <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_milage'), $this);?>

    </td>
 </tr>

</table>

<input id="show_list" <?php if (! $_COOKIE['___trans_info_saved_items']): ?>style="display: none;" <?php endif; ?>type="button" onclick="show_offerList()" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'SHOWSAVEDITEMS'), $this);?>
" />
<input id="remove_list" <?php if (! $_COOKIE['___trans_info_saved_items']): ?>style="display: none;" <?php endif; ?> type="button" onclick="remove_offerList()" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'REMOVESAVEDITEMS'), $this);?>
" />
<input type="button" <?php if (! $_COOKIE['___trans_info_saved_items']): ?>style="display: none;" <?php endif; ?> id="show_all" onclick="show_table()" value="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'showall'), $this);?>
" />