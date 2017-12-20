<?php /* Smarty version 2.6.26, created on 2017-02-02 21:28:25
         compiled from technical/user.offer.images.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'FithImageToSize', 'technical/user.offer.images.tpl', 11, false),array('function', 'GetSizes', 'technical/user.offer.images.tpl', 18, false),)), $this); ?>
<div id="tect_gallery_<?php echo $this->_tpl_vars['technical']['id']; ?>
">
<?php if ($this->_tpl_vars['technical']['image']): ?>
	<?php $this->assign('_paththumb', "/img/technicalinspection/thumb/".($this->_tpl_vars['technical']['image'])); ?>
	<?php $this->assign('_pathMiddle', "/img/technicalinspection/middle/".($this->_tpl_vars['technical']['image'])); ?>
	<?php $this->assign('_pathBig', "/img/technicalinspection/big/".($this->_tpl_vars['technical']['image'])); ?>
	<a href="<?php echo $this->_tpl_vars['_pathBig']; ?>
" class="fancy-image" rel="fancy-auto-image" title="">    
	<img src="<?php echo $this->_tpl_vars['_pathMiddle']; ?>
" alt=""  width="349"/>
	</a>

<?php else: ?>
<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 349,'height' => 298,'frame' => true,'base' => 'img/technicalinspection/big/','image' => $this->_tpl_vars['technical']['image'],'assign' => 'srcImage'), $this);?>

<img src="<?php echo $this->_tpl_vars['srcImage']; ?>
" width="349"/>
     
<?php endif; ?>

<div class="gallery-thumbnails clearfix technicalinsp" style="margin-top:15px;width:auto!important;">

<?php echo $this->_plugins['function']['GetSizes'][0][0]->function_GetSizes(array('path' => $this->_tpl_vars['_pathBig'],'assign' => 'sizes'), $this);?>

<a data-path-href="<?php echo $this->_tpl_vars['_pathBig']; ?>
"    data-sizes="<?php echo $this->_tpl_vars['sizes']; ?>
"  data-path-middle="<?php echo $this->_tpl_vars['_pathMiddle']; ?>
" class="galleryItem" data-path-small="<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 126,'height' => 71,'frame' => false,'base' => '/img/technicalinspection/big/','image' => $this->_tpl_vars['technical']['image']), $this);?>
">01  

</a>

<?php $_from = $this->_tpl_vars['technical']['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gallItem']):
?>

<?php $this->assign('_pathMiddle', "/img/technicalinspection/middle/".($this->_tpl_vars['gallItem']['images'])); ?>
<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 126,'height' => 71,'frame' => false,'base' => '/img/technicalinspection/big/','image' => $this->_tpl_vars['gallItem']['images'],'assign' => '_path'), $this);?>

<?php $this->assign('_pathBig', "/img/technicalinspection/big/".($this->_tpl_vars['gallItem']['images'])); ?>
<?php echo $this->_plugins['function']['GetSizes'][0][0]->function_GetSizes(array('path' => $this->_tpl_vars['_pathBig'],'assign' => 'sizes'), $this);?>

<?php if ($this->_tpl_vars['sizes']): ?>
<a data-path-href="<?php echo $this->_tpl_vars['_pathBig']; ?>
" data-sizes="<?php echo $this->_tpl_vars['sizes']; ?>
" data-path-small="<?php echo $this->_tpl_vars['_path']; ?>
" data-path-middle="<?php echo $this->_tpl_vars['_pathMiddle']; ?>
" class="galleryItem" >11</a>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

</div>
</div>
<br class="cb">
