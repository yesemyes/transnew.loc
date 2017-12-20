<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from home/homeNewsTabs.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'home/homeNewsTabs.tpl.html', 4, false),)), $this); ?>
<?php echo ''; ?><?php echo $this->_tpl_vars['this']->getNewsCategorys(); ?><?php echo '<div id="tabButtons"><span class="urgentTit" style="margin-top:7px;">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'news'), $this);?><?php echo '</span><div class="newsTab" rel="'; ?><?php echo $this->_tpl_vars['this']->path; ?><?php echo '?action=Allnews"><span>'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Allnews','default' => 'Все'), $this);?><?php echo '</span></div>'; ?><?php $_from = $this->_tpl_vars['this']->NewsCategorys; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['newsCat']):
?><?php echo '<div class="newsTab" rel="'; ?><?php echo $this->_tpl_vars['this']->path; ?><?php echo '?action=catNews&amp;catId='; ?><?php echo $this->_tpl_vars['newsCat']['id']; ?><?php echo '"><span>'; ?><?php echo $this->_tpl_vars['newsCat']['label']; ?><?php echo '</span></div>'; ?><?php endforeach; endif; unset($_from); ?><?php echo ' </div><div id="newsTabContent"><div id="newsTabsMainContent"></div></div>'; ?><?php echo ' 
<script type="text/javascript" language="javascript" src="/scripts/newsTabs.js" ></script> 
<script type="text/javascript" language="javascript" src="/scripts/ui.core.js" ></script> 
<script type="text/javascript" language="javascript" src="/scripts/ui.accordion.js" ></script> 
<script type="text/javascript" language="javascript" >
$(document).ready(function(){initNewsTabs(\'#tabButtons\')});
</script> 
'; ?><?php echo ''; ?>