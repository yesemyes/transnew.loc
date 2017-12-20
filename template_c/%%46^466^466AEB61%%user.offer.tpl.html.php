<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:33
         compiled from cars/user.offer.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'GetPriceIn', 'cars/user.offer.tpl.html', 5, false),array('function', 'Trans', 'cars/user.offer.tpl.html', 37, false),array('modifier', 'nf', 'cars/user.offer.tpl.html', 29, false),array('modifier', 'nl2br', 'cars/user.offer.tpl.html', 171, false),array('modifier', 'zerofill', 'cars/user.offer.tpl.html', 231, false),array('modifier', 'date_format', 'cars/user.offer.tpl.html', 232, false),)), $this); ?>
<?php $this->assign('offer', $this->_tpl_vars['this']->_offers['found']['0']); ?>
<?php if ($this->_tpl_vars['offer']['filed_currency'] == 3): ?>
    <?php $this->assign('currency', '$'); ?>
    <?php $this->assign('OTHER1', $this->_tpl_vars['offer']['service_price']); ?> 
    <?php echo $this->_plugins['function']['GetPriceIn'][0][0]->function_GetPriceIn(array('currency' => 'EUR','price' => $this->_tpl_vars['offer']['service_price'],'config' => $this->_tpl_vars['this']->config,'assign' => 'OTHER2'), $this);?>

    <?php $this->assign('currency1', 'AMD'); ?>
    <?php $this->assign('currency2', '€'); ?>
    
<?php elseif ($this->_tpl_vars['offer']['filed_currency'] == 4): ?>
    <?php $this->assign('currency', '€'); ?>
    <?php $this->assign('currency1', 'AMD'); ?>
    <?php $this->assign('currency2', '$'); ?>
    <?php $this->assign('OTHER1', $this->_tpl_vars['offer']['service_price']); ?>
    <?php echo $this->_plugins['function']['GetPriceIn'][0][0]->function_GetPriceIn(array('currency' => 'USD','price' => $this->_tpl_vars['offer']['service_price'],'config' => $this->_tpl_vars['this']->config,'assign' => 'OTHER2'), $this);?>

<?php elseif ($this->_tpl_vars['offer']['filed_currency'] == 5): ?>
    <?php $this->assign('currency', 'AMD'); ?>
    <?php echo $this->_plugins['function']['GetPriceIn'][0][0]->function_GetPriceIn(array('currency' => 'USD','price' => $this->_tpl_vars['offer']['service_price'],'config' => $this->_tpl_vars['this']->config,'assign' => 'OTHER1'), $this);?>

    <?php echo $this->_plugins['function']['GetPriceIn'][0][0]->function_GetPriceIn(array('currency' => 'EUR','price' => $this->_tpl_vars['offer']['service_price'],'config' => $this->_tpl_vars['this']->config,'assign' => 'OTHER2'), $this);?>

    <?php $this->assign('currency1', '$'); ?>
    <?php $this->assign('currency2', '€'); ?>
<?php endif; ?>

<table class="car_params" border="0px"  cellpadding="0" cellspacing="0" style="margin: 0 auto;">


   <tr class="first">
    <td class="price">
	<?php if ($this->_tpl_vars['offer']['filed_contract'] != 1): ?>
      <span class="size25"><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['filed_price'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
 <?php echo $this->_tpl_vars['currency']; ?>
</span>
      <br class="cb"/>
      <div class=" size11">
      
      <span class="line"><?php echo ((is_array($_tmp=$this->_tpl_vars['OTHER1'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
 <?php echo $this->_tpl_vars['currency1']; ?>
</span>
      <span><?php echo ((is_array($_tmp=$this->_tpl_vars['OTHER2'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?>
 <?php echo $this->_tpl_vars['currency2']; ?>
</span>
      </div>
	 <?php else: ?>
	  <span class="size25"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'filed_contract'), $this);?>
 </span>
	<?php endif; ?>	 
    </td>
    <td class="shadow"></td>
        <td  class="bg">
     <span class="size11">
     <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_year','default' => "Год выпуска"), $this);?>

    </span>
     <br class="cb"/>
     <span class="size13"><?php echo $this->_tpl_vars['offer']['filed_release_date_year']; ?>
</span>
     
     </td>
    <td >
     <span class="size11"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_milage','default' => "Пробег"), $this);?>
</span>
     <br class="cb"/>
     <span class="size13"><?php echo $this->_tpl_vars['offer']['filed_milage']; ?>
 <?php echo $this->_tpl_vars['this']->dictonary['milage_kayficent'][$this->_tpl_vars['offer']['filed_milage_kayficent']]; ?>
</span>
    </td>
   
  </tr>
  <tr class="shadow2">
  <td colspan="5" ></td>
  </tr>
   <tr class="cont">
   <td colspan="5">
   <div class=" fl left">
     <div class="with_bg"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_brand','default' => "Марка"), $this);?>

     <a><?php echo $this->_tpl_vars['this']->dictonary['brandmodel'][$this->_tpl_vars['offer']['filed_car_brand']]; ?>
</a>
     </div>
     <div class="no_bg"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_model','default' => "Серия"), $this);?>

     <a><?php echo $this->_tpl_vars['this']->dictonary['brandmodel'][$this->_tpl_vars['offer']['filed_car_brand_model']]; ?>
</a>
     </div>
      
      <div class="with_bg">
      <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_body','default' => "Кузов"), $this);?>

      
     <span class="fr icon"><?php if ($this->_tpl_vars['this']->dictonary['body'][$this->_tpl_vars['offer']['filed_body']]): ?><?php echo $this->_tpl_vars['this']->dictonary['body'][$this->_tpl_vars['offer']['filed_body']]; ?>
<?php else: ?>-<?php endif; ?></span>
     </div>
     <div class="no_bg">
       <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_engine','default' => "Двигатель"), $this);?>

     <span class="fr"><?php if ($this->_tpl_vars['offer']['filed_engine'] && $this->_tpl_vars['offer']['filed_engine'] != 0): ?><?php echo $this->_tpl_vars['offer']['filed_engine']; ?>
 <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'SM3'), $this);?>
<?php else: ?>-<?php endif; ?>  ,  <?php if ($this->_tpl_vars['offer']['filed_engine_power'] || $this->_tpl_vars['offer']['filed_engine_power'] != 0): ?><?php echo $this->_tpl_vars['offer']['filed_engine_power']; ?>
 <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'MENSURATION_OF_POWER'), $this);?>
<?php else: ?>-<?php endif; ?></span>
     </div>
      <div class="with_bg"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_color','default' => "Цвет"), $this);?>

      
     <span class="fr">
     <div class="fl"  style="display:inline-block; width:16px; height:16px;background:<?php echo $this->_tpl_vars['this']->dictonary['color_adv'][$this->_tpl_vars['offer']['filed_color']]['hexcode']; ?>
!important"></div><?php if ($this->_tpl_vars['offer']['filed_metalic'] == 1): ?><span class="fr" style="display: block;margin-left: 10px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'metalic'), $this);?>
</span><?php endif; ?>
     <br class="cb"/>
          </span>
     </div>
     <div class="no_bg"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_rudders','default' => "Руль"), $this);?>

     <span class="fr"><?php if ($this->_tpl_vars['this']->dictonary['rudder'][$this->_tpl_vars['offer']['filed_rudder']]): ?><?php echo $this->_tpl_vars['this']->dictonary['rudder'][$this->_tpl_vars['offer']['filed_rudder']]; ?>
<?php else: ?>-<?php endif; ?></span>
     </div>
      <div class="with_bg">
      <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_DRIVE','default' => "Привод"), $this);?>

      
     <span class="fr"><?php if ($this->_tpl_vars['this']->dictonary['drive'][$this->_tpl_vars['offer']['filed_drive']]): ?><?php echo $this->_tpl_vars['this']->dictonary['drive'][$this->_tpl_vars['offer']['filed_drive']]; ?>
<?php else: ?>-<?php endif; ?></span>
     </div>
      <div class="no_bg"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_gearbox','default' => "КПП"), $this);?>

     <span class="fr"><?php echo $this->_tpl_vars['this']->dictonary['gearbox'][$this->_tpl_vars['offer']['filed_gearbox']]; ?>
</span>
     </div>
      
     
            
     <div class="with_bg"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_city','default' => "город"), $this);?>

     <a><?php if ($this->_tpl_vars['offer']['filed_city']): ?><?php echo $this->_tpl_vars['this']->statesList[$this->_tpl_vars['offer']['filed_city']]['value']; ?>
<?php elseif ($this->_tpl_vars['offer']['filed_other_city']): ?><?php echo $this->_tpl_vars['offer']['filed_other_city']; ?>
<?php else: ?>-<?php endif; ?></a>
     </div>
     <div class="no_bg"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'customs'), $this);?>

     <a><?php if ($this->_tpl_vars['offer']['filed_customs']): ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'nocustom'), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'hascustom'), $this);?>
<?php endif; ?></a>
     </div>
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cars/user.offer.options.tpl.html", 'smarty_include_vars' => array('offer' => $this->_tpl_vars['offer'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
     
   </div>
   <div class=" fl right" style="margin: 0 0 0 15px;width: 400px;">
   
   <div style="min-height: 290px;" id="user_offer_images">
   <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cars/user.offer.images.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
   </div>
   
   <?php if (! empty ( $this->_tpl_vars['offer']['phone1'] ) || empty ( $this->_tpl_vars['offer']['phone2'] )): ?>
  <span class="title">
  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_contact_info','default' => " Контактные данные"), $this);?>
</span>
  <div class="contacts">
  <?php if ($this->_tpl_vars['offer']['contact_name']): ?>
  <a style="float: left;"><?php echo $this->_tpl_vars['offer']['contact_name']; ?>
</a>
	<!--
	<button class="btn fl" style="margin-left: 117px;"><span class="fl"></span></a>Այլ առաջարկներ</button>
	-->
  <br class="cb"/>
  <?php endif; ?>
  <div class="fl" style="margin-right: 10px;padding-top: 5px;">
  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_phone','default' => "Телефон"), $this);?>

  </div>
  
  <div class="fl" style="padding-top: 5px;">
   <?php echo $this->_tpl_vars['offer']['phone1']; ?>
<?php if (! empty ( $this->_tpl_vars['offer']['phone2'] )): ?>,&nbsp; <?php echo $this->_tpl_vars['offer']['phone2']; ?>
<?php endif; ?>
   </div>
   <br class="cb"/>
   <?php endif; ?>
   <!--
   <div>
   <br class="cb"/>
    <table>
        <tr>
            <?php if ($this->_tpl_vars['offer']['filed_interchange']): ?>
            <td><div class="change"><?php if ($this->_tpl_vars['offer']['filed_interchange'] == 1): ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'change_yes'), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'change_no'), $this);?>
<?php endif; ?></div></td>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['offer']['filed_credit']): ?>
            <td><div class="credit"><?php if ($this->_tpl_vars['offer']['filed_credit'] == 1): ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'credit_yes'), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'credit_no'), $this);?>
<?php endif; ?></div></td>
            <?php endif; ?>
        </tr>
    </table>
   </div>
   -->
    <?php if (! empty ( $this->_tpl_vars['offer']['description'] )): ?>
  <div style="margin: 10px 0;">
  
  <span class="title" style="font-size: 15px;text-decoration: underline;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_description','default' => "Комментарий владельца"), $this);?>
</span>
    <br class="cb"/>
    <span class="fl text">
  <?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['description'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : HelperModifier::nl2br($_tmp)); ?>
  
  </span>
  
  <br class="cb"/>
  </div>
  <?php endif; ?>
  </div>
  </div>
   <br class="cb"/>
   <div class="fr"> 

<table>
<tr>
	<td>
        <div style="margin-top: 5px;">
            <span class='st_fblike_large' displayText='Facebook Like'></span>
            <span class='st_fbrec_large' displayText='Facebook Recommend'></span>
        </div>
    </td>
	<td>
        <div style="width: 128px;">
        <?php echo '
        <a target="_blank" class="mrc__plugin_uber_like_button" href="http://connect.mail.ru/share" data-mrc-config="{\'nt\' : \'1\', \'cm\' : \'1\', \'sz\' : \'20\', \'st\' : \'2\', \'tp\' : \'mm,ok\'}"></a>
        '; ?>

        </div>
    </td>
	<!--
	<td>
        <div>
            <div id="vk_like"></div>
        </div>
    </td>-->

</tr>
</table>


<?php echo '
<script src="http://cdn.connect.mail.ru/js/loader.js" type="text/javascript" charset="UTF-8"></script>
<script type="text/javascript" src="//vk.com/js/api/openapi.js?105"></script>
<script type="text/javascript">
  VK.init({apiId: 4080440, onlyWidgets: true});
</script>
<script type="text/javascript">
VK.Widgets.Like("vk_like", {type: "mini", height: 20, verb: 1});
</script>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "867184d5-6a35-4d77-851e-427f78052964", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>



'; ?>

</div>
   <br class="cb"/>
   </td>
   </tr>
    <tr>
   <td colspan="5">
   <div class="bottom">
   <span class="num"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'ads_number','default' => 'Номер объявления'), $this);?>
: <font><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['id'])) ? $this->_run_mod_handler('zerofill', true, $_tmp) : HelperModifier::zerofill($_tmp)); ?>
</font></span>
   <span class="num"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_published','default' => "Опубликовано"), $this);?>
: <font><?php echo ((is_array($_tmp=$this->_tpl_vars['offer']['filed_srtat_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%d.%m.%Y') : smarty_modifier_date_format($_tmp, '%d.%m.%Y')); ?>
</font></span>
   <span class="num"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'viewed','default' => 'Просмотров'), $this);?>
: <font><?php echo $this->_tpl_vars['offer']['view_count']; ?>
</font></span>
   </div>
   </td>
   </tr>
  

</table>