<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:33
         compiled from cars/user.offer.images.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'FithImageToSize', 'cars/user.offer.images.tpl', 11, false),array('function', 'GetSizes', 'cars/user.offer.images.tpl', 22, false),array('function', 'CatImageToSize', 'cars/user.offer.images.tpl', 23, false),)), $this); ?>


<?php $this->assign('_paththumb', "/img/offers/thumb/".($this->_tpl_vars['offer']['filed_main_image'])); ?>
<?php $this->assign('_pathMiddle', "/img/offers/middle/".($this->_tpl_vars['offer']['filed_main_image'])); ?>
<?php $this->assign('_pathBig', "/img/offers/big/".($this->_tpl_vars['offer']['filed_main_image'])); ?>
<?php if ($this->_tpl_vars['offer']['filed_main_image']): ?>
<a href="<?php echo $this->_tpl_vars['_pathBig']; ?>
" class="fancy-image" rel="fancy-auto-image" title="<?php echo $this->_tpl_vars['this']->dictonary['brandmodel'][$this->_tpl_vars['offer']['filed_car_brand']]; ?>
 <?php echo $this->_tpl_vars['this']->dictonary['brandmodel'][$this->_tpl_vars['offer']['filed_car_brand_model']]; ?>
">    
<img src="<?php echo $this->_tpl_vars['_pathMiddle']; ?>
" alt="<?php echo $this->_tpl_vars['this']->dictonary['brandmodel'][$this->_tpl_vars['offer']['filed_car_brand']]; ?>
 <?php echo $this->_tpl_vars['this']->dictonary['brandmodel'][$this->_tpl_vars['offer']['filed_car_brand_model']]; ?>
" />
</a>
<?php else: ?>
<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 395,'height' => 298,'frame' => true,'base' => 'img/services/big/','image' => $this->_tpl_vars['this']->catalog['image'],'assign' => 'srcImage'), $this);?>


<img src="<?php echo $this->_tpl_vars['srcImage']; ?>
" width="395"/>
<?php endif; ?>    

<?php if (! empty ( $this->_tpl_vars['offer']['gallery'] )): ?>



<div class="gallery-thumbnails clearfix" style="margin-top:15px;">

<?php echo $this->_plugins['function']['GetSizes'][0][0]->function_GetSizes(array('path' => $this->_tpl_vars['_pathBig'],'assign' => 'sizes'), $this);?>

<a data-path-href="<?php echo $this->_tpl_vars['_pathBig']; ?>
"    data-sizes="<?php echo $this->_tpl_vars['sizes']; ?>
"  data-path-middle="<?php echo $this->_tpl_vars['_pathMiddle']; ?>
" class="no-fancy-image" data-path-small="<?php echo $this->_plugins['function']['CatImageToSize'][0][0]->function_CatImageToSize(array('width' => 126,'height' => 71,'frame' => false,'base' => '/img/offers/big/','image' => $this->_tpl_vars['offer']['filed_main_image']), $this);?>
">  </a>
<?php $_from = $this->_tpl_vars['offer']['gallery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gallItem']):
?>
<?php $this->assign('_pathMiddle', "/img/offers/middle/".($this->_tpl_vars['gallItem'])); ?>

<?php echo $this->_plugins['function']['CatImageToSize'][0][0]->function_CatImageToSize(array('width' => 126,'height' => 71,'frame' => false,'base' => '/img/offers/big/','image' => $this->_tpl_vars['gallItem'],'assign' => '_path'), $this);?>

<?php $this->assign('_pathBig', "/img/offers/big/".($this->_tpl_vars['gallItem'])); ?>

<?php echo $this->_plugins['function']['GetSizes'][0][0]->function_GetSizes(array('path' => $this->_tpl_vars['_pathBig'],'assign' => 'sizes'), $this);?>


<?php if ($this->_tpl_vars['sizes']): ?>
<a data-path-href="<?php echo $this->_tpl_vars['_pathBig']; ?>
" data-sizes="<?php echo $this->_tpl_vars['sizes']; ?>
" data-path-small="<?php echo $this->_tpl_vars['_path']; ?>
" data-path-middle="<?php echo $this->_tpl_vars['_pathMiddle']; ?>
" class="galleryItem" ></a>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</div>
<br class="cb">

<?php endif; ?>