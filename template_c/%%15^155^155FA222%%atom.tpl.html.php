<?php /* Smarty version 2.6.26, created on 2017-02-02 17:18:42
         compiled from news/atom.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'news/atom.tpl.html', 2, false),array('function', 'ImageExists', 'news/atom.tpl.html', 3, false),array('function', 'CatImageToSize', 'news/atom.tpl.html', 7, false),)), $this); ?>
<?php $this->assign('thisCat', $this->_tpl_vars['this']->NewsCategorys[$this->_tpl_vars['news']['newscategory']]); ?>
<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'news','catalias' => $this->_tpl_vars['thisCat']['alias'],'item' => $this->_tpl_vars['news']['alias'],'assign' => 'href'), $this);?>

<?php echo $this->_plugins['function']['ImageExists'][0][0]->function_ImageExists(array('frame' => false,'base' => '/img/news/image/','image' => $this->_tpl_vars['news']['image'],'assign' => 'isImageExists'), $this);?>

<?php if ($this->_tpl_vars['isImageExists']): ?>
<div class="img-holder"> 
<a href="<?php echo $this->_tpl_vars['href']; ?>
">
<img src="<?php echo $this->_plugins['function']['CatImageToSize'][0][0]->function_CatImageToSize(array('width' => 169,'height' => 106,'frame' => true,'base' => '/img/news/image/','image' => $this->_tpl_vars['news']['image']), $this);?>
" width="169"></a> 
</div>
<?php endif; ?>
<div class="fl"  <?php if ($this->_tpl_vars['isImageExists']): ?>style="width: 555px;"<?php endif; ?>>
    <div class="pseudo-h3" style="font-size: 1.1em;"><a href="<?php echo $this->_tpl_vars['href']; ?>
" style="text-decoration: none!important;color: #000;"><?php echo $this->_tpl_vars['news']['title']; ?>
</a></div>
    <div class="text" style="color: #FFFACD;margin: 15px 6px;">
    <?php echo $this->_tpl_vars['news']['small']; ?>

    </div>
</div>
<div class="time" style="position: absolute; bottom: 10px;right: 10px;"><?php echo $this->_tpl_vars['news']['date']; ?>
</div>
<br class="cb" />