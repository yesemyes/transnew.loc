<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:32
         compiled from home/TabsContent.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'home/TabsContent.tpl', 13, false),array('function', 'Trans', 'home/TabsContent.tpl', 13, false),)), $this); ?>
<?php echo '<div>'; ?><?php if (! empty ( $this->_tpl_vars['this']->catNews )): ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['this']->catNews['noEffect']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tbnews'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tbnews']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['tbnews']['iteration']++;
?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/no-effect-news-block.tpl.html", 'smarty_include_vars' => array('_iterator' => $this->_foreach['tbnews'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php if (! empty ( $this->_tpl_vars['this']->Allnews )): ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['this']->Allnews['noEffect']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tbnews'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tbnews']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['tbnews']['iteration']++;
?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/no-effect-news-block.tpl.html", 'smarty_include_vars' => array('_iterator' => $this->_foreach['tbnews'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?><?php endif; ?><?php echo '<a href="'; ?><?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'news','catalias' => $this->_tpl_vars['this']->catNews['noEffect']['0']['catalias']), $this);?><?php echo '" class="btn fl">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'all_cat_news'), $this);?><?php echo '</a></div>'; ?>
