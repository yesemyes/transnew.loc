<?php /* Smarty version 2.6.26, created on 2017-02-02 19:26:16
         compiled from services/offer_photos.tpl.html */ ?>
<div id="offer_photos_tpl_html" style="margin-top: 25px;">
<div id="offer_photos">

  <?php $_from = $this->_tpl_vars['offer_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "services/imageblock.tpl.html", 'smarty_include_vars' => array('imagePath' => $this->_tpl_vars['item']['image'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <?php endforeach; endif; unset($_from); ?></div>
<div id="ifContainer" class="fl">
<iframe id="myIframe" src="<?php echo $this->_tpl_vars['this']->path; ?>
?external=true&itpl=services/uploader.tpl.html&action=uploadFile" frameborder="0" scrolling="no" style="height:70px; clear:left; width:300px;"> </iframe>
</div>
</div>