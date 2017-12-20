<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from default/left.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'default/left.tpl.html', 24, false),array('function', 'Link', 'default/left.tpl.html', 35, false),array('modifier', 'htmlentities', 'default/left.tpl.html', 35, false),)), $this); ?>
<?php echo '<div id="left" class="">'; ?><?php echo ''; ?><?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/ads.tpl.html", 'smarty_include_vars' => array('_place' => 'ads_left_verytop')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('ads_left_verytop', ob_get_contents()); ob_end_clean();
 ?><?php echo ''; ?><?php if ($this->_tpl_vars['ads_left_verytop']): ?><?php echo '<div class="adsbg">'; ?><?php echo $this->_tpl_vars['ads_left_verytop']; ?><?php echo '</div><br class="cb" />'; ?><?php endif; ?><?php echo ''; ?><?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/ads.tpl.html", 'smarty_include_vars' => array('_place' => 'ads_left_top')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('ads_left_top', ob_get_contents()); ob_end_clean();
 ?><?php echo ''; ?><?php if ($this->_tpl_vars['ads_left_top']): ?><?php echo '<div class="specialProjectTit">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'special_projects'), $this);?><?php echo '</div><div class="adsbg">'; ?><?php echo $this->_tpl_vars['ads_left_top']; ?><?php echo '</div><br class="cb" />'; ?><?php endif; ?><?php echo ''; ?><?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/ads.tpl.html", 'smarty_include_vars' => array('_place' => 'ads_left_bot')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('ads_left_bot', ob_get_contents()); ob_end_clean();
 ?><?php echo ''; ?><?php if ($this->_tpl_vars['ads_left_bot']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['ads_left_bot']; ?><?php echo ' <br class="cb" />'; ?><?php endif; ?><?php echo '<div class="specialProjectTit">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'services'), $this);?><?php echo '</div><div class="adsbg services"> '; ?><?php $_from = $this->_tpl_vars['this']->dictonary['servicescategory']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['servicescategory']):
?><?php echo ' <a href="'; ?><?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'transport','category' => $this->_tpl_vars['servicescategory']['alias']), $this);?><?php echo '" title="'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['servicescategory']['name'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : HelperModifier::htmlentities($_tmp)); ?><?php echo ' ('; ?><?php echo $this->_tpl_vars['servicescategory']['qty']; ?><?php echo ')"> '; ?><?php echo $this->_tpl_vars['servicescategory']['name']; ?><?php echo '</a> '; ?><?php endforeach; endif; unset($_from); ?><?php echo '<a href="'; ?><?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'transport','action' => "add-service"), $this);?><?php echo '" class="btn fr">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'add_Service','default' => "Ավելացնել"), $this);?><?php echo '</a> </div>'; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/pool.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo '</div>'; ?>