<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from home/top-search.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'home/top-search.tpl.html', 3, false),array('function', 'Trans', 'home/top-search.tpl.html', 9, false),array('function', 'FithImageToSize', 'home/top-search.tpl.html', 20, false),array('function', 'BulidQuery', 'home/top-search.tpl.html', 77, false),array('modifier', 'default', 'home/top-search.tpl.html', 45, false),array('modifier', 'is_array', 'home/top-search.tpl.html', 62, false),array('modifier', 'date_format', 'home/top-search.tpl.html', 64, false),)), $this); ?>
<!-- // "display:none" hetagayum verakangnelu hamar //-->
<div class="search_blok" style="display:none">
<form method="get" action="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
">

<div class="fl left">
<div class="advert_add">
    <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'users','curr' => 'addoffer'), $this);?>
" class="advert">
        <span class="fl" style="margin: 0 20px;">+</span>
        <span class="fl"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'add_advert'), $this);?>
</span>
        <br class="cb"/>
    </a>

</div>
<br class="cb"/>
<div class="combo fl">
    
    <select name="filed_car_brand[]" id="filed_car_brand" class="uniform filed_car_brand" onchange="fillMyModelsMC(this.value,'search_filed_car_brand_model','/')" >
        <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Select_brand','defaul' => "Ընտրել մակնիշը"), $this);?>
</option>
        <?php $_from = $this->_tpl_vars['this']->dictonary['brand_icons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['brand']):
?>
        <option value="<?php echo $this->_tpl_vars['brand']['id']; ?>
" data-image="<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 25,'height' => 25,'frame' => true,'base' => "/img/brandmodel/big/",'image' => $this->_tpl_vars['brand']['image']), $this);?>
"><?php echo $this->_tpl_vars['brand']['label']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>

    </select>
    
     <select name="filed_car_brand_model[]" id="search_filed_car_brand_model"  class="uniform filed_car_brand_model">
        <option value=""><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Select_model','defaul' => "Ընտրել մոդելը"), $this);?>
</option>
        

    </select>
</div>
<br class="cb" />

</div>
<div class="fl right">
<div class="text">

<span><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'price','default' => "Գինը"), $this);?>
 ($):</span>
<span class="date"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'year','default' => "Տարեթիվը"), $this);?>
:</span>

</div>

<div class="form fl" style="margin-right:20px;">

<div class="price">
<input type="text" name="price[from]" class="inp rc6" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->query['price']['from'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
" placeholder="0" id="amount2" />
<span class="line fl"></span>
<input type="text"  name="price[to]" class="inp rc6"  value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->query['price']['to'])) ? $this->_run_mod_handler('default', true, $_tmp, 100000) : smarty_modifier_default($_tmp, 100000)); ?>
" placeholder="100000"  id="amount3"/>
<br class="cb"/>
</div>
<div class="sl">

<div id="slider-range"></div>
<div class="range_num" style="text-align:center">
    <label for="amount" class="fl" >0</label>
    <span type="text" id="amount"  ></span>
    <label  class="fr">> 100 000</label>
 </div>   
</div>
</div>
<div class="form fl" style="margin-right:23px;">
    <div class="year">
    <input type="text" name="filed_release_date_year[from]" class="inp rc6" value="<?php if (((is_array($_tmp=$this->_tpl_vars['this']->query['filed_release_date_year'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->query['filed_release_date_year']['from'])) ? $this->_run_mod_handler('default', true, $_tmp, 1990) : smarty_modifier_default($_tmp, 1990)); ?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->query['filed_release_date_year'])) ? $this->_run_mod_handler('default', true, $_tmp, 1990) : smarty_modifier_default($_tmp, 1990)); ?>
<?php endif; ?>" id="year1" />
    <span class="line fl"></span>
    <?php $this->assign('cyear', ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y'))); ?>
    <input type="text" name="filed_release_date_year[to]" class="inp rc6" value="<?php if (((is_array($_tmp=$this->_tpl_vars['this']->query['filed_release_date_year'])) ? $this->_run_mod_handler('is_array', true, $_tmp) : is_array($_tmp))): ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->query['filed_release_date_year']['to'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['cyear']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['cyear'])); ?>
<?php else: ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->query['filed_release_date_year'])) ? $this->_run_mod_handler('default', true, $_tmp, @$this->_tpl_vars['cyear']) : smarty_modifier_default($_tmp, @$this->_tpl_vars['cyear'])); ?>
<?php endif; ?>" id="year2" />
    <br class="cb"/>
    </div>
    <div class="search">
    <button class="btn fl"><span class="fl"><img src="/css/images/loop.png" alt=""/></span><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'search','default' => "Որոնում"), $this);?>
</button>
    
    <br class="cb"/>
    </div>
    
</div>

<div class="form fl" style="width: 127px;margin-right:7px;">
    <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'advancedsearch'), $this);?>
<?php if (! empty ( $this->_tpl_vars['this']->query )): ?>?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'search'), $this);?>
<?php endif; ?>" class="bodys adv"></a>
    <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'advancedsearch'), $this);?>
<?php if (! empty ( $this->_tpl_vars['this']->query )): ?>?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'search'), $this);?>
<?php endif; ?>" class="adv" style="width: 108px;display: block;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'adv_search_body','default' => "Որոնում ըստ թափքի տեսակի"), $this);?>
</a>
</div>
<div class="form fl">
    <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'calculators'), $this);?>
" class="calculator"></a>
</div>
 

</div>
<input type="hidden" name="search" value="search"/>
</form>
</div>