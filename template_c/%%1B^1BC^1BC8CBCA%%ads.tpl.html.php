<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from default/ads.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'urlencode', 'default/ads.tpl.html', 7, false),array('modifier', 'default', 'default/ads.tpl.html', 18, false),array('function', 'Link', 'default/ads.tpl.html', 8, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('_info', $this->_tpl_vars['this']->currentPage['ads'][$this->_tpl_vars['_place']]); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['inf']):
?><?php echo '<div class="banner'; ?><?php echo $this->_tpl_vars['_place']; ?><?php echo '_'; ?><?php echo $this->_tpl_vars['inf']['id']; ?><?php echo '">'; ?><?php echo ''; ?><?php if ($this->_tpl_vars['inf']['type'] == 'img'): ?><?php echo ''; ?><?php $this->assign('href', urlencode($this->_tpl_vars['inf']['href'])); ?><?php echo ''; ?><?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'goto','assign' => 'adhref'), $this);?><?php echo ''; ?><?php if ($this->_tpl_vars['_st']): ?><?php echo ''; ?><?php $this->assign('marg', '5'); ?><?php echo ''; ?><?php endif; ?><?php echo '<a href="'; ?><?php echo $this->_tpl_vars['adhref']; ?><?php echo '?link='; ?><?php echo $this->_tpl_vars['href']; ?><?php echo '" target="_blank"><img  src="'; ?><?php echo $this->_tpl_vars['inf']['file']; ?><?php echo '" title="'; ?><?php echo $this->_tpl_vars['inf']['title']; ?><?php echo '" alt="'; ?><?php echo $this->_tpl_vars['inf']['title']; ?><?php echo '"  hspace="'; ?><?php echo $this->_tpl_vars['marg']; ?><?php echo '" /></a>'; ?><?php else: ?><?php echo ''; ?><?php echo $this->_tpl_vars['inf']['description']; ?><?php echo ''; ?><?php endif; ?><?php echo '</div>'; ?><?php echo ((is_array($_tmp=@$this->_tpl_vars['seperator'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?><?php echo ''; ?><?php echo $this->_tpl_vars['this']->updateAdsViews($this->_tpl_vars['inf']['id']); ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>