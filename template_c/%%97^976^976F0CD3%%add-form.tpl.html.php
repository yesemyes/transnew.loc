<?php /* Smarty version 2.6.26, created on 2017-02-02 19:26:16
         compiled from services/add-form.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'services/add-form.tpl.html', 23, false),)), $this); ?>
<style>
    label.error</style>

<div  style="margin: 0 15px; width:750px; float:left">
<form action="<?php echo $this->_tpl_vars['this']->path; ?>
" method="post" id="signupForm" autocomplete="off" >




<div id="main-data"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "services/add-services-tabs/main.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br  class="cb"/></div>

  <div id="hide" style="display: none;">
    <div id='view-port'>

</div>
<button type="button" name="btnPrev" value=""  id="btnPrev" onclick="prevTab()"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'btnPrevlabel','default' => "Назад"), $this);?>
</button>
<button type="submit" name="btnSubmit" value="btnSubmit"  id="btnSubmit"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'btnSavee','default' => "Сохранить"), $this);?>
</button>
</div>

  </form>
  <script type="text/javascript" language="javascript" >
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "services/jsValidateMessages.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</script>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/right.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>