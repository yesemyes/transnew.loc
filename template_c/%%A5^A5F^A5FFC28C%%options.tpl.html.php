<?php /* Smarty version 2.6.26, created on 2017-02-03 08:43:27
         compiled from users/add-offer-tabs/options.tpl.html */ ?>
<?php $this->assign('_options', $this->_tpl_vars['db']->getTree('options','*',"active AND lng_id=".($this->_tpl_vars['this']->defLng['id']),'','position')); ?>
    <div class="fl margL10" style="margin-bottom:8px;">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/options_tree.tpl.html", 'smarty_include_vars' => array('_options' => $this->_tpl_vars['_options'],'values' => $this->_tpl_vars['offer_options'],'_pid' => 0,'_level' => 0,'_name' => "rel[filed_options][]")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<br class="cb" />