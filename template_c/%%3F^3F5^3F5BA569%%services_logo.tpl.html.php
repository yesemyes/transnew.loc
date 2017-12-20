<?php /* Smarty version 2.6.26, created on 2017-02-02 19:26:16
         compiled from services/services_logo.tpl.html */ ?>
<div id="services_logo_tpl_html">
<div id="services_logo">
<?php if ($this->_tpl_vars['offer']['logo']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "services/imageblock-logo.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
</div>
<div id="ifContainer" class="fl">

<iframe id="myIframe" src="<?php echo $this->_tpl_vars['this']->path; ?>
?external=true&itpl=services/uploader.tpl.html&action=uploadFile&pl=services_logo" frameborder="0" scrolling="no" style="height:50px; clear:left; width:300px;"> </iframe>
</div>
</div>