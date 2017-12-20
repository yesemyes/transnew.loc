<?php /* Smarty version 2.6.26, created on 2017-02-02 17:19:26
         compiled from cars/allbrands.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'cars/allbrands.tpl.html', 3, false),array('function', 'Link', 'cars/allbrands.tpl.html', 14, false),array('function', 'FithImageToSize', 'cars/allbrands.tpl.html', 15, false),array('modifier', 'count', 'cars/allbrands.tpl.html', 5, false),array('modifier', 'floor', 'cars/allbrands.tpl.html', 6, false),array('modifier', 'ceil', 'cars/allbrands.tpl.html', 37, false),)), $this); ?>
<div class="CarMainTbl">
<?php if (! empty ( $this->_tpl_vars['this']->AllBrands['1'] )): ?>
<div class="titles2 cb shadowbg_pic" style="line-height:36px; margin-top:0px !important"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'usssr_vendors','default' => "Российские автомобили"), $this);?>
</div>
<?php endif; ?>
<?php $this->assign('brandCountRus', count($this->_tpl_vars['this']->AllBrands['1'])); ?>
<?php $this->assign('brandperBlockRus', floor($this->_tpl_vars['brandCountRus']/5)); ?>
<div style="float: left;width: 150px;">
<?php $_from = $this->_tpl_vars['this']->AllBrands['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bb'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bb']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['bb']['iteration']++;
?>

  <div class="brandView">
    <div class="fl" style="width:27px">
      <div class="distbl">
        <div class="distblcell">
          <div class="disinnertbl"> <?php if ($this->_tpl_vars['item']['image']): ?><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','brand' => $this->_tpl_vars['item']['alias']), $this);?>
" class="barand"> 
		  <img src="<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 25,'height' => 25,'frame' => true,'base' => "/img/brandmodel/big/",'image' => $this->_tpl_vars['item']['image']), $this);?>
"  style="max-width:25px;max-height:25px" class="margR5" alt="<?php echo $this->_tpl_vars['item']['label']; ?>
" title="<?php echo $this->_tpl_vars['item']['label']; ?>
" /> </a><?php endif; ?></div>
        </div>
      </div>
    </div>
    <div style="float:left;  padding-left:3px">
    <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','brand' => $this->_tpl_vars['item']['alias']), $this);?>
" class="barand lh25 fl"><?php echo $this->_tpl_vars['item']['label']; ?>
</a>
    </div>
    <div style="float:right;  line-height:25px"> <?php echo $this->_tpl_vars['item']['offers_count']; ?>
 </div>

    </div>
  <?php if ($this->_foreach['bb']['iteration']%$this->_tpl_vars['brandperBlockRus'] == 0): ?>
  </div>
  <div style="float: left;width: 150px;">
  
  
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  </div> 
  <?php if (! empty ( $this->_tpl_vars['this']->AllBrands['1'] )): ?>
<div class="titles2 cb shadowbg_pic" style="line-height:36px"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'not_usssr_vendors','default' => "Иномарки"), $this);?>
</div>
<?php endif; ?>
<?php $this->assign('brandCount', count($this->_tpl_vars['this']->AllBrands['0'])); ?>
<?php $this->assign('brandperBlock', ceil($this->_tpl_vars['brandCount']/5)); ?>
<div style="float: left;width: 150px;">
  <?php $_from = $this->_tpl_vars['this']->AllBrands['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bb'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bb']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['bb']['iteration']++;
?>
  <div class="brandView">
    <div class="fl" style="width:27px">
      <div class="distbl">
        <div class="distblcell">
          <div class="disinnertbl"> <?php if ($this->_tpl_vars['item']['image']): ?><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','brand' => $this->_tpl_vars['item']['alias']), $this);?>
" class="barand"> <img src="<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 25,'height' => 25,'frame' => true,'base' => "/img/brandmodel/big/",'image' => $this->_tpl_vars['item']['image']), $this);?>
"style="max-width:25px;max-height:25px"  class="margR5" alt="<?php echo $this->_tpl_vars['item']['label']; ?>
" title="<?php echo $this->_tpl_vars['item']['label']; ?>
" /> </a><?php endif; ?></div>
        </div>
      </div>
    </div>
    <div style="float:left; padding-left:3px" >
    <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars','brand' => $this->_tpl_vars['item']['alias']), $this);?>
" class="barand lh25 fl"><?php echo $this->_tpl_vars['item']['label']; ?>
</a>
    </div>
    <div style="float:right; line-height:25px"> <?php echo $this->_tpl_vars['item']['offers_count']; ?>
 </div>

    </div>
  <?php if ($this->_foreach['bb']['iteration']%$this->_tpl_vars['brandperBlock'] == 0): ?>
  </div>
  <div style="float: left;width: 150px;">
  
  
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?> 
  </div>
</div>