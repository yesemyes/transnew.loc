<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:52
         compiled from pdd/showResultThumb.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'FithImageToSize', 'pdd/showResultThumb.tpl.html', 1, false),array('function', 'CatImageToSize', 'pdd/showResultThumb.tpl.html', 4, false),)), $this); ?>
<?php echo $this->_plugins['function']['FithImageToSize'][0][0]->function_FithImageToSize(array('width' => 133,'height' => 104,'frame' => false,'base' => '/images/','image' => "logo_".($this->_tpl_vars['this']->defLng['code']).".png",'assign' => 'srcImage'), $this);?>

<?php if ($this->_tpl_vars['image_original'] && $this->_tpl_vars['image_default']): ?>
	<?php if ($this->_tpl_vars['imageType'] == 'image_default'): ?>
    	<?php echo $this->_plugins['function']['CatImageToSize'][0][0]->function_CatImageToSize(array('width' => $this->_tpl_vars['width'],'height' => $this->_tpl_vars['height'],'frame' => false,'base' => '/img/pddticket/test/','image' => $this->_tpl_vars['image_default'],'assign' => 'srcImage'), $this);?>

    <?php endif; ?>
    <?php if ($this->_tpl_vars['imageType'] != 'image_default'): ?>
    	<?php echo $this->_plugins['function']['CatImageToSize'][0][0]->function_CatImageToSize(array('width' => $this->_tpl_vars['width'],'height' => $this->_tpl_vars['height'],'frame' => false,'base' => '/img/pddticket/test/','image' => $this->_tpl_vars['image_original'],'assign' => 'srcImage'), $this);?>

    <?php endif; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['image_original']): ?>
<?php echo $this->_plugins['function']['CatImageToSize'][0][0]->function_CatImageToSize(array('width' => $this->_tpl_vars['width'],'height' => $this->_tpl_vars['height'],'frame' => false,'base' => '/img/pddticket/test/','image' => $this->_tpl_vars['image_original'],'assign' => 'srcImage'), $this);?>

<?php endif; ?>

<?php if ($this->_tpl_vars['image_default']): ?>
<?php echo $this->_plugins['function']['CatImageToSize'][0][0]->function_CatImageToSize(array('width' => $this->_tpl_vars['width'],'height' => $this->_tpl_vars['height'],'frame' => false,'base' => '/img/pddticket/test/','image' => $this->_tpl_vars['image_default'],'assign' => 'srcImage'), $this);?>

<?php endif; ?>
<img src="<?php echo $this->_tpl_vars['srcImage']; ?>
"  alt=""  width=<?php echo $this->_tpl_vars['width']; ?>
 /> 
<br class="cb"/>