<?php /* Smarty version 2.6.26, created on 2017-02-02 17:27:13
         compiled from services/user.offer.images.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'FithImageToSize', 'services/user.offer.images.tpl', 26, false),array('function', 'GetSizes', 'services/user.offer.images.tpl', 37, false),)), $this); ?>
<div id="seri">
<?php $this->assign('services', $this->_tpl_vars['this']->catalog); ?>



<?php $this->assign('_pathBig', "/img/services/big/".($this->_tpl_vars['services']['images']['0']['images'])); ?>
<?php $this->assign('_pathMiddle', "/img/services/middle/".($this->_tpl_vars['services']['images']['0']['images'])); ?>

<?php if (! $this->_tpl_vars['services']['images']): ?>
<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 395,'height' => 298,'frame' => true,'base' => 'img/services/big/','image' => $this->_tpl_vars['this']->catalog['image'],'assign' => 'srcImage'), $this);?>


<img src="<?php echo $this->_tpl_vars['srcImage']; ?>
" width="395"/>
<?php endif; ?>
<?php if ($this->_tpl_vars['services']['images']): ?>
<a href="<?php echo $this->_tpl_vars['_pathBig']; ?>
" class="fancy-image" rel="fancy-auto-image" title="<?php echo $this->_tpl_vars['this']->dictonary['brandmodel'][$this->_tpl_vars['offer']['filed_car_brand']]; ?>
 <?php echo $this->_tpl_vars['this']->dictonary['brandmodel'][$this->_tpl_vars['offer']['filed_car_brand_model']]; ?>
">    
<img src="<?php echo $this->_tpl_vars['_pathMiddle']; ?>
" alt="" />
</a>
<?php endif; ?>
<div class="gallery-thumbnails clearfix " style="margin-top:15px;">

<?php echo $this->_plugins['function']['GetSizes'][0][0]->function_GetSizes(array('path' => $this->_tpl_vars['_pathBig'],'assign' => 'sizes'), $this);?>


<?php $_from = $this->_tpl_vars['services']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gallItem']):
?>
<?php $this->assign('_pathMiddle', "/img/services/middle/".($this->_tpl_vars['gallItem']['images'])); ?>

<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 126,'height' => 71,'frame' => false,'base' => '/img/services/big/','image' => $this->_tpl_vars['gallItem']['images'],'assign' => '_path'), $this);?>

<?php $this->assign('_pathBig', "/img/services/big/".($this->_tpl_vars['gallItem']['images'])); ?>
<?php echo $this->_plugins['function']['GetSizes'][0][0]->function_GetSizes(array('path' => $this->_tpl_vars['_pathBig'],'assign' => 'sizes'), $this);?>

<?php if ($this->_tpl_vars['sizes']): ?>
<a data-path-href="<?php echo $this->_tpl_vars['_pathBig']; ?>
" data-sizes="<?php echo $this->_tpl_vars['sizes']; ?>
" data-path-small="<?php echo $this->_tpl_vars['_path']; ?>
" data-path-middle="<?php echo $this->_tpl_vars['_pathMiddle']; ?>
" class="galleryItem" >fffffffffffffff</a>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</div>
</div>
<br class="cb">