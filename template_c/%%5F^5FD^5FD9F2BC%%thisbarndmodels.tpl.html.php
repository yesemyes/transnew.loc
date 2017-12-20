<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:34
         compiled from cars/thisbarndmodels.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'cars/thisbarndmodels.tpl.html', 2, false),array('function', 'Link', 'cars/thisbarndmodels.tpl.html', 10, false),array('modifier', 'count', 'cars/thisbarndmodels.tpl.html', 5, false),array('modifier', 'ceil', 'cars/thisbarndmodels.tpl.html', 6, false),array('modifier', 'default', 'cars/thisbarndmodels.tpl.html', 15, false),)), $this); ?>
<div class="CarMainTbl"> <?php if (! empty ( $this->_tpl_vars['this']->brandModels )): ?>
  <div class="titles2 cb shadowbg"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'sale_of_brand','default' => "Продажа автомобилей"), $this);?>
&nbsp;<span style="color: #00B9FF;"><?php echo $this->_tpl_vars['this']->CurentBrand['label']; ?>
</span></div>
  <!--<div class="carsalelist">
  <ul class="UlNoStyle ModelMainTbl">
  <?php $this->assign('count', count($this->_tpl_vars['this']->brandModels)); ?>
  <?php $this->assign('countt', ((is_array($_tmp=$this->_tpl_vars['count']/4)) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp))); ?>
  <div class="abcdef" style="float: left;width: 160px; padding-left: 30px;background:url(/css/images/border.png)repeat-y center right;">
   <?php $_from = $this->_tpl_vars['this']->brandModels; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ii'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ii']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['model']):
        $this->_foreach['ii']['iteration']++;
?>
   
    <?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','CurentBrand' => $this->_tpl_vars['this']->CurentBrand['alias'],'modelAlias' => $this->_tpl_vars['model']['alias'],'assign' => 'modelHref'), $this);?>

    <li style=" width: 140px; text-align:left; padding:5px; " class="<?php if ($this->_tpl_vars['this']->offerModel == $this->_tpl_vars['model']['alias']): ?> current<?php endif; ?>"> <?php if ($this->_tpl_vars['model']['image']): ?>
      <?php $this->assign('imgPath', "/img/brandmodel/image/".($this->_tpl_vars['model']['image'])); ?>
      <?php else: ?>
      <?php $this->assign('imgPath', "/img/brandmodel/small/".($this->_tpl_vars['this']->CurentBrand['image'])); ?>
      <?php endif; ?> <span class="titles3  <?php if ($this->_tpl_vars['this']->offerModel == $this->_tpl_vars['model']['alias']): ?> current<?php endif; ?>"> <a href="<?php echo $this->_tpl_vars['modelHref']; ?>
" class="titles3 fs11 <?php if ($this->_tpl_vars['this']->offerModel == $this->_tpl_vars['model']['alias']): ?> current<?php endif; ?>"> <?php echo $this->_tpl_vars['model']['label']; ?>
</a>&nbsp;(<?php echo ((is_array($_tmp=@$this->_tpl_vars['model']['offers_count'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
) </span> </li>
      <?php if ($this->_foreach['ii']['iteration']%$this->_tpl_vars['countt'] == 0): ?>
      
      </div><div class="abcdef" style="float: left;width: 160px; padding-left: 30px;background:url(/css/images/border.png)repeat-y center right;">
      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    </div>
  
  </ul>
  <br class="cb" />
  </div>-->
  <?php endif; ?> 
  
    
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cars/offerList.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
  <br class="cb"/>
    </div>