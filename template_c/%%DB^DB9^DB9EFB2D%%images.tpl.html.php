<?php /* Smarty version 2.6.26, created on 2017-02-03 08:43:28
         compiled from users/add-offer-tabs/images.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'users/add-offer-tabs/images.tpl.html', 3, false),)), $this); ?>
<div id="images_tab">
<div style="padding:5px;" class="fl">
 <label for="filed_options"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'filed_main_photos'), $this);?>
</label>
 <br class="cb" />
 <div class="margL10 fl" ><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "users/offer_main_photo.tpl.html", 'smarty_include_vars' => array('offer' => $this->_tpl_vars['offer'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
 <br class="cb" />
</div>

<div class="fl" style="padding:5px;">
  <label for="filed_options"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'filed_photos'), $this);?>
</label>
<br class="cb" />
<div class="margL10 fl" ><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "users/offer_photos.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<br class="cb" />
</div>



</div>
<?php if ($this->_tpl_vars['offer']['id']): ?>
<input type="hidden" value="<?php echo $this->_tpl_vars['offer']['id']; ?>
" name="offer_id" />
<?php endif; ?>