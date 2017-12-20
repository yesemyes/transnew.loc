<?php /* Smarty version 2.6.26, created on 2017-02-02 17:27:13
         compiled from services/item_car-showrooms.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'services/item_car-showrooms.tpl.html', 10, false),array('function', 'Link', 'services/item_car-showrooms.tpl.html', 72, false),array('function', 'FithImageToSize', 'services/item_car-showrooms.tpl.html', 73, false),)), $this); ?>
<?php echo '

<script>
latitude='; ?>
<?php echo $this->_tpl_vars['this']->catalog['latitude']; ?>
<?php echo '
longitude='; ?>
<?php echo $this->_tpl_vars['this']->catalog['longitude']; ?>
<?php echo '
</script>
'; ?>


<div  id="content" class="advanced_c2" style="background: url(/css/bggg.png) repeat;">
    <div class="comp"><span style="padding-top: 9px; padding-left: 20px; display: block; font-size: 14px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'aboutcomp','default' => 'О компании'), $this);?>
</span></div>
  <table cellpadding="0" cellspacing="4" width="762" align="center" style="margin:0 auto; ">
    <tr>
      <td width="331" valign="top">
      <div class="specialProjectTit" style="font-weight: normal;"><?php echo $this->_tpl_vars['this']->catalog['title']; ?>
</div>
      <table cellpadding="10" cellspacing="0" width="100%" class="transBg" style="min-height:0">
      
          <tr>
            <td style="color:#8ea5b0; font-size:13px"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'company_address','default' => "Адрес:"), $this);?>
</td>
            <td  style="color:#ffffff; font-size:13px"><?php echo $this->_tpl_vars['this']->catalog['addres']; ?>
</td>
          </tr>
          <?php if ($this->_tpl_vars['this']->catalog['phone']): ?>
          <tr>
            <td style="color:#8ea5b0; font-size:13px"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'company_phone','default' => "Тел.:"), $this);?>
</td>
            <td  style="color:#ffffff; font-size:13px"><?php echo $this->_tpl_vars['this']->catalog['phone']; ?>
 , <?php if ($this->_tpl_vars['this']->catalog['phone1']): ?><?php echo $this->_tpl_vars['this']->catalog['phone1']; ?>
<?php endif; ?></td>
            
          </tr>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['this']->catalog['url']): ?>
          <tr>
            <td style="color:#8ea5b0; font-size:13px"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'company_url','default' => "Сайты:"), $this);?>
</td>
            <td style="color:#ffffff; font-size:13px"><a target="_blank" href="http://<?php echo $this->_tpl_vars['this']->catalog['url']; ?>
">http://<?php echo $this->_tpl_vars['this']->catalog['url']; ?>
</a></td>
          </tr>
          <?php endif; ?>
           <?php if ($this->_tpl_vars['this']->catalog['email']): ?>
          <tr>
            <td style="color:#8ea5b0; font-size:13px"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'company_e_mail','default' => "E-mail:"), $this);?>
</td>
            <td style="color:#ffffff; font-size:13px"><a href="mailto:<?php echo $this->_tpl_vars['this']->catalog['email']; ?>
"><?php echo $this->_tpl_vars['this']->catalog['email']; ?>
</a></td>
          </tr>
         
          <?php endif; ?>
        </table>
         
         
          
        
        
        
        <?php if (! empty ( $this->_tpl_vars['this']->catalog['longitude'] ) && ! empty ( $this->_tpl_vars['this']->catalog['latitude'] )): ?> 
        <div id="map_main_canvas" style="width: 362px; height: 198px;margin-top: 20px;"></div>
        <?php endif; ?>
        
        </td>
      <td  valign="top">
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "services/user.offer.images.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </td>
    </tr>
    
	<?php if (! empty ( $this->_tpl_vars['this']->catalog['brands'] )): ?>
	<!--<tr>
    <td ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'sale_off_brands','default' => "Продажа:"), $this);?>
</td>
    <td>&nbsp;</td>
	</tr>
	<tr>
    <td >
	<ul class="sale_off_brands">
	<?php $_from = $this->_tpl_vars['this']->catalog['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['offerBrand']):
?>
		<li> 
			<a class="sale_off_brands_icon" href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','user' => 'user','Brand' => $this->_tpl_vars['offerBrand']['alias']), $this);?>
">
			<img src="<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 45,'height' => 35,'frame' => true,'base' => "/img/brandmodel/big/",'image' => $this->_tpl_vars['offerBrand']['image']), $this);?>
"    alt="<?php echo $this->_tpl_vars['offerBrand']['label']; ?>
" title="<?php echo $this->_tpl_vars['offerBrand']['label']; ?>
" />
			</a>
			<a class="sale_off_brands_label" href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','user' => 'user','Brand' => $this->_tpl_vars['offerBrand']['alias']), $this);?>
"><?php echo $this->_tpl_vars['offerBrand']['label']; ?>
</a>
		</li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
	</td>
     <td>&nbsp;</td>
    </tr>-->
    <tr>
     <td colspan="2">&nbsp;</td>
    </tr>
	<?php endif; ?>
    <tr><td colspan="2"><div style="padding: 10px;word-wrap: break-word;color: #FFFACD;"><?php echo $this->_tpl_vars['this']->catalog['description']; ?>
</div></td></tr>
    
    <?php if (! empty ( $this->_tpl_vars['this']->catalog['brands'] )): ?>
    <tr><td  colspan="2">
	<div class ="filter-holder topmenu ">
	<a class="user-offer-filter-by-brand all-user-offer act " href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','user' => 'user','login' => $this->_tpl_vars['this']->catalog['siteuser']['login']), $this);?>
" style="padding-left:20px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'customer_car_brands','default' => "Марки автомобилей"), $this);?>
 | </a>

    <?php $_from = $this->_tpl_vars['this']->catalog['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['offerBrand']):
?>
<a style="height: auto!important;" class="user-offer-filter-by-brand filter_brnd_icon" href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','user' => 'user','login' => $this->_tpl_vars['this']->catalog['siteuser']['login'],'Brand' => $this->_tpl_vars['offerBrand']['alias']), $this);?>
">
			<img src="<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 45,'height' => 35,'frame' => true,'base' => "/img/brandmodel/big/",'image' => $this->_tpl_vars['offerBrand']['image']), $this);?>
"    alt="<?php echo $this->_tpl_vars['offerBrand']['label']; ?>
" title="<?php echo $this->_tpl_vars['offerBrand']['label']; ?>
" />
	</a>
	<!--<a class="sale_off_brands_label"><?php echo $this->_tpl_vars['offerBrand']['label']; ?>
</a>-->
    <?php endforeach; endif; unset($_from); ?>
	</div>
    </td>
    </tr>
    
    <tr>
    <td  colspan="2" data-href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','user' => 'user','login' => $this->_tpl_vars['this']->catalog['siteuser']['login']), $this);?>
?" id="user-list"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Loaing_list','default' => "Загрузка ...."), $this);?>
</td>
    </tr>
    <?php endif; ?>
  </table>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/right.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>