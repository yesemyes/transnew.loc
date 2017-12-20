<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:41
         compiled from cars/body-left.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'cars/body-left.tpl.html', 5, false),array('function', 'Link', 'cars/body-left.tpl.html', 40, false),array('function', 'BulidQuery', 'cars/body-left.tpl.html', 40, false),)), $this); ?>
<?php if (isset ( $this->_tpl_vars['changeParrams'] )): ?> 

<div class="pdd" id="left-filter" style="width:200px; margin: 0 10px; float:left;">
<div   class="cb fl exam_left ">
<span class="fl title" style="width:200px;padding-left: 8px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => "finded %s cars",'count' => $this->_tpl_vars['this']->_offers['total']), $this);?>
</span>
<br class="cb" />
<div style="width: 208px;background: url(/css/images/leftBg.png) repeat;">
<ul class="UlNoStyle"  style="width:175px; margin: 0 auto;">

<?php $_from = $this->_tpl_vars['changeParrams']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['obj'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['obj']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['obj']):
        $this->_foreach['obj']['iteration']++;
?>
   <?php if (isset ( $this->_tpl_vars['obj']->subs ) && ( $this->_tpl_vars['obj']->key != 'price' && $this->_tpl_vars['obj']->key != 'filed_release_date_year' )): ?>
  <li id="cmm<?php echo $this->_tpl_vars['obj']->key; ?>
" class="fItem" >
   
  <?php echo $this->_tpl_vars['obj']->label; ?>
  
 
    <ul id="cm<?php echo $this->_tpl_vars['obj']->key; ?>
" class="fMenu">
      <?php $_from = $this->_tpl_vars['obj']->subs; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sObj']):
?>
      
	  <li id="cm<?php echo $this->_tpl_vars['obj']->key; ?>
<?php echo $this->_tpl_vars['sObj']->dir; ?>
"> 
	  
	  <a href="<?php echo $this->_tpl_vars['this']->path; ?>
?<?php echo $this->_tpl_vars['sObj']->url; ?>
" class="fr closebtn">x</a><?php if ($this->_tpl_vars['sObj']->dir): ?>
	  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => "searchdir_".($this->_tpl_vars['sObj']->dir)), $this);?>
&nbsp;<?php endif; ?>
      <a href="<?php echo $this->_tpl_vars['this']->path; ?>
?<?php echo $this->_tpl_vars['sObj']->url; ?>
" class="search-filter"><?php echo $this->_tpl_vars['sObj']->label; ?>
</a> </li>
      
      <?php endforeach; endif; unset($_from); ?>
      
      
    </ul>
    <br class="cb"/>
   </li>
   
   <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
 
</ul>
</div>

<br class="cb" />
<span class="fl title" style="width:200px;padding-left: 8px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'resul_filter','default' => 'Фильтровать результат:'), $this);?>
</span>
<div id="resul_filter"  data-location="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?action=filter&<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query), $this);?>
">

</div>
</div>
<br class="cb" />
</div>
<?php endif; ?>


<div id="content" class="" style=""><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['this']->contentTpl, 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div> 