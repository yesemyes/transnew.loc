<?php /* Smarty version 2.6.26, created on 2017-02-03 08:43:28
         compiled from users/offer_main_photo.tpl.html */ ?>
<div id="offer_photos_tpl_html">
<div id="offer_main_photo">

<?php if ($this->_tpl_vars['offer']['filed_main_image']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "users/imageblock-main.tpl.html", 'smarty_include_vars' => array('imagePath' => $this->_tpl_vars['offer']['filed_main_image'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>
<div id="ifContainer" class="fl">
<iframe id="myIframe" src="<?php echo $this->_tpl_vars['this']->path; ?>
?external=true&itpl=users/uploader.tpl.html&action=uploadFile&pl=offer_main_photo" frameborder="0" scrolling="no" style="height:50px; clear:left; width:300px;"> </iframe>
</div>
</div>