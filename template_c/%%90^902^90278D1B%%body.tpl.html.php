<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from home/body.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'home/body.tpl.html', 15, false),array('modifier', 'mb_truncate', 'home/body.tpl.html', 27, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/left.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content" style="margin: 0 9px;"> 
	
  <?php $this->assign('LastNews', $this->_tpl_vars['this']->getLastNews()); ?>
  
  <?php if (! empty ( $this->_tpl_vars['LastNews'] )): ?>
  
  
  
  
  
  	<div id="showcase" class="Newsshowcase">
		<!-- Each child div in #showcase with the class .showcase-slide represents a slide. -->
        <?php $_from = $this->_tpl_vars['LastNews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['LastNewsIteration'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['LastNewsIteration']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['NewsLast']):
        $this->_foreach['LastNewsIteration']['iteration']++;
?>
        <?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('assign' => '_href','page' => 'news','catalias' => $this->_tpl_vars['NewsLast']['catalias'],'alias' => $this->_tpl_vars['NewsLast']['alias']), $this);?>

        
		<div class="showcase-slide">
			<!-- Put the slide content in a div with the class .showcase-content. -->
            <?php if ($this->_tpl_vars['NewsLast']['image']): ?>
			<div class="showcase-content">
				<img src="/img/news/slide/<?php echo $this->_tpl_vars['NewsLast']['image']; ?>
" alt="<?php echo $this->_tpl_vars['NewsLast']['title']; ?>
" width="428" height="auto"/>
			</div>
			<!-- Put the thumbnail content in a div with the class .showcase-thumbnail -->
			<div class="showcase-thumbnail">
				<img src="/img/news/thumb/<?php echo $this->_tpl_vars['NewsLast']['image']; ?>
" alt="<?php echo $this->_tpl_vars['NewsLast']['title']; ?>
" width="120" height="75" />
				<!-- The div below with the class .showcase-thumbnail-caption contains the thumbnail caption. -->
				<div class="showcase-thumbnail-caption"><?php echo ((is_array($_tmp=$this->_tpl_vars['NewsLast']['title'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 35) : smarty_modifier_mb_truncate($_tmp, 35)); ?>
</div>
				<!-- The div below with the class .showcase-thumbnail-cover is used for the thumbnails active state. -->
				<div class="showcase-thumbnail-cover"></div>
			</div>
            <?php endif; ?>
			<!-- Put the caption content in a div with the class .showcase-caption -->
			<div class="showcase-caption">
				<h2 style="color: #000;font-size: 1.7em;font-weight: normal;"><a style="text-decoration: none;" href="<?php echo $this->_tpl_vars['_href']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['NewsLast']['title'])) ? $this->_run_mod_handler('mb_truncate', true, $_tmp, 100) : smarty_modifier_mb_truncate($_tmp, 100)); ?>
</a></h2>
			</div>
		</div>
        <?php endforeach; endif; unset($_from); ?>
	</div>
  

  <?php endif; ?>
  <div style="margin:20px 0; text-align:center;"> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/ads.tpl.html", 'smarty_include_vars' => array('_place' => 'ads_home_bot')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </div>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "home/homeNewsTabs.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/right.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 