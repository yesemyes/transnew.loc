<?php /* Smarty version 2.6.26, created on 2017-07-27 15:59:18
         compiled from default/right.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'default/right.tpl.html', 3, false),)), $this); ?>
<?php echo '<div id="right" class="" '; ?><?php if ($this->_tpl_vars['this']->module != 'home'): ?><?php echo 'style=""'; ?><?php endif; ?><?php echo '><div class="specialProjectTit">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'advertising'), $this);?><?php echo '</div><div class="banners__bac"><!--<br class="cb"/>!-->'; ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/ads.tpl.html", 'smarty_include_vars' => array('_place' => 'ads_right','seperator' => '<br class="cb"/>')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '<!--<<div style="background-color: #f7f7f7; height: 130px;width: 202px;overflow: hidden;">div class="fb-like-box" data-href="https://www.facebook.com/Transinfo.am" data-width="202" data-height="220" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div></div>--></div></div>'; ?>



