<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from default/head.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'default/head.tpl.html', 12, false),array('modifier', 'htmlentities', 'default/head.tpl.html', 17, false),array('modifier', 'default', 'default/head.tpl.html', 53, false),array('block', 'Minify', 'default/head.tpl.html', 37, false),array('function', 'Trans', 'default/head.tpl.html', 44, false),array('function', 'GetVersion', 'default/head.tpl.html', 65, false),)), $this); ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $this->_tpl_vars['this']->currentPage['description']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['this']->currentPage['keyword']; ?>
" />
<?php if (! $this->_tpl_vars['this']->currentPage['noindex']): ?>
<meta name="ROBOTS" content="INDEX, FOLLOW"/>
<?php else: ?>
<meta name="ROBOTS" content="NOINDEX, FOLLOW"/>
<?php endif; ?>


<?php if ($this->_tpl_vars['this']->module == 'news' && count($this->_tpl_vars['this']->path_params) == 4): ?>
<meta property="og:image" content="http://<?php echo $_SERVER['HTTP_HOST']; ?>
/img/news/slide/<?php echo $this->_tpl_vars['this']->current['image']; ?>
">
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['0']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['1']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['2']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['3']; ?>
.html" />
<meta property="og:site_name" content="<?php echo $_SERVER['HTTP_HOST']; ?>
"/>   
<meta property="og:title" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['this']->current['title'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : HelperModifier::htmlentities($_tmp)); ?>
"/>
<meta property="fb:app_id" content="803753502984232" />
<?php endif; ?>
<?php if ($this->_tpl_vars['this']->module == 'cars'): ?>
<meta property="og:image" content="http://<?php echo $_SERVER['HTTP_HOST']; ?>
/img/offers/middle/<?php echo $this->_tpl_vars['this']->current['filed_main_image']; ?>
">
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['0']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['1']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['2']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['3']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['4']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['5']; ?>
/<?php echo $this->_tpl_vars['this']->path_params['6']; ?>
.html" />
<meta property="og:site_name" content="<?php echo $_SERVER['HTTP_HOST']; ?>
"/>   
<meta property="og:title" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['this']->current['title'])) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : HelperModifier::htmlentities($_tmp)); ?>
"/>
<meta property="fb:app_id" content="803753502984232" />
<?php endif; ?>

<meta name='yandex-verification' content='7871ee662cf032b6' />

<meta name="author" content="Ruben Ordanyan" />
<meta name="google-site-verification" content="<?php echo $this->_tpl_vars['this']->config['google_site_verification']; ?>
" />
<title><?php if ($this->_tpl_vars['this']->currentPage['title']): ?><?php echo $this->_tpl_vars['this']->currentPage['title']; ?>
<?php else: ?><?php echo $this->_tpl_vars['this']->currentPage['label']; ?>
<?php endif; ?> | <?php echo $this->_tpl_vars['this']->config['defaultTitle']; ?>
</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />

<?php $this->_tag_stack[] = array('Minify', array('type' => 'css','minify' => 1,'version' => $this->_tpl_vars['this']->config['css_version'])); $_block_repeat=true;HelperBlock::minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php $_from = $this->_tpl_vars['this']->headStyleSheets; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cssFile']):
?>
<link href="<?php echo $this->_tpl_vars['cssFile']; ?>
" rel="stylesheet" type="text/css" />
<?php endforeach; endif; unset($_from); ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo HelperBlock::minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<script  type="text/javascript" language="javascript" >
var _noneSelected ="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'noneSelected'), $this);?>
" ;
var SELECT_ANSWER ="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'SELECT_ANSWER','defaulr' => 'Выберите ответ'), $this);?>
" ;
var Back_to_top ="<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Back_to_top','default' => 'На Верх'), $this);?>
" ;
var _selectAllText = "<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'selectAllText'), $this);?>
";
var _selectAllText = "<?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'selectAllText'), $this);?>
";
var top_search_submit_label = "<?php echo $this->_tpl_vars['this']->trans('top_search_submit'); ?>
";
var top_search_reset_label = "<?php echo $this->_tpl_vars['this']->trans('top_search_reset'); ?>
";
var curLng = "<?php echo $this->_tpl_vars['this']->defLng['code']; ?>
";
var downpay_min = <?php echo $this->_tpl_vars['this']->config['downpay_min']; ?>
;
var downpay_max = <?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->config['downpay_max'])) ? $this->_run_mod_handler('default', true, $_tmp, 5000) : smarty_modifier_default($_tmp, 5000)); ?>
;
var downpay_step = <?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->config['downpay_step'])) ? $this->_run_mod_handler('default', true, $_tmp, 100) : smarty_modifier_default($_tmp, 100)); ?>
;
var rate_min = <?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->config['rate_min'])) ? $this->_run_mod_handler('default', true, $_tmp, 500) : smarty_modifier_default($_tmp, 500)); ?>
;
var rate_max = <?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->config['rate_max'])) ? $this->_run_mod_handler('default', true, $_tmp, 500) : smarty_modifier_default($_tmp, 500)); ?>
;
var rate_step = <?php echo ((is_array($_tmp=@$this->_tpl_vars['this']->config['rate_step'])) ? $this->_run_mod_handler('default', true, $_tmp, 500) : smarty_modifier_default($_tmp, 500)); ?>
;
var module = "<?php echo $this->_tpl_vars['this']->currentPage['alias']; ?>
";
</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options();</script>

<?php $this->_tag_stack[] = array('Minify', array('type' => 'script','minify' => 0)); $_block_repeat=true;HelperBlock::minify($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php $_from = $this->_tpl_vars['this']->headScripts; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['jsFile']):
?>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['jsFile']; ?>
<?php echo $this->_plugins['function']['GetVersion'][0][0]->function_getVersion(array('file' => $this->_tpl_vars['jsFile']), $this);?>
" language="javascript"></script>
<?php endforeach; endif; unset($_from); ?>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo HelperBlock::minify($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<script type="text/javascript" src="/scripts/rt_share.js"></script> 

<script>(function() })();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6021018461660', ]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6021018461660&amp;cd[value]=0.01&amp;cd[currency]=USD&amp;noscript=1" /></noscript>

</head>