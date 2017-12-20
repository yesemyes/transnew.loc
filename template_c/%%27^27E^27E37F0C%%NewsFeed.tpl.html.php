<?php /* Smarty version 2.6.26, created on 2017-02-02 17:18:42
         compiled from news/NewsFeed.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'news/NewsFeed.tpl.html', 10, false),)), $this); ?>


<?php $_from = $this->_tpl_vars['this']->feed; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['newsFeed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['newsFeed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['news']):
        $this->_foreach['newsFeed']['iteration']++;
?>
<?php if ($this->_tpl_vars['news']['title']): ?>
<div class="news_item atom_<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
" style="position: relative;border-bottom: 1px solid #b2afaf;padding-bottom: 4px;width: 745px;
margin-left: 5px;">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "news/atom.tpl.html", 'smarty_include_vars' => array('_news' => $this->_tpl_vars['news'],'_iterator' => $this->_foreach['newsFeed'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>

<br class="cb" />

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>


<br class="cb" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/paging.tpl.html", 'smarty_include_vars' => array('found_rows' => $this->_tpl_vars['this']->news_found_rows,'limit' => $this->_tpl_vars['this']->limit,'page' => $this->_tpl_vars['this']->page)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br class="cb" />