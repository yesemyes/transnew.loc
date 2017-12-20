<?php /* Smarty version 2.6.26, created on 2017-07-26 08:35:24
         compiled from pdd/tests.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'pdd/tests.tpl.html', 5, false),array('function', 'Link', 'pdd/tests.tpl.html', 9, false),)), $this); ?>
<div id="content" class="advanced_c ">
<!--<br class="cb"/>-->
<!--<br class="cb"/>-->
<h2 class="tickets-bg"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'PDD_TICKETS','default' => "Билеты ПДД"), $this);?>
</h2>
<div class="tickets-list-bg">
<ul class="tests-holders">
<?php $_from = $this->_tpl_vars['this']->tests; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['test']):
?>
<li><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'pdd','action' => 'to-pass-the-exam'), $this);?>
?test=<?php echo $this->_tpl_vars['test']['id']; ?>
"><?php echo $this->_tpl_vars['test']['title']; ?>
</a></li>
 
 <?php endforeach; endif; unset($_from); ?>
</ul>
<br class="cb"/>
</div>
<br class="cb"/>
<br class="cb"/>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/right.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>