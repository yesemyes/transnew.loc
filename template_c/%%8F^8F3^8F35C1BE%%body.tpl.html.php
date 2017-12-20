<?php /* Smarty version 2.6.26, created on 2017-02-02 17:18:18
         compiled from cameras/body.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'cameras/body.tpl.html', 36, false),)), $this); ?>
<div id="content" class="advanced_c ">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/middle.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<br class="cb"/>

<aside class="share-btns">
			
			
			<div class="share__item share__item-like">
				<div class="fb-like" data-href="http://www.transinfo.am/roadpolice/cameras.html" data-width="150" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
			</div>
            <div class="fb-share-button" data-href="http://www.transinfo.am/roadpolice/cameras.html" data-layout="button_count" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.transinfo.am%2Froadpolice%2Fcameras.html&amp;src=sdkpreparse">Поделиться</a></div>
			
			<!--<div class="share__item">
				<!--<div class="fb-share-button" data-href="http://www.transinfo.am/roadpolice/cameras.html" data-layout="button_count"></div>
				<a href="#" class="share-btn__fb-like" data-text="Share" rel="nofollow"><i></i></a>
				<span>0</span>
			</div>
			<div class="share__item">
				<a href="#" class="share-btn__ok" data-text="Класс" rel="nofollow"><i></i></a>
				<span>0</span>
			</div>
			<div class="share__item">
				<a href="#" class="share-btn__vk" data-text="Нравится" rel="nofollow"><i></i></a>
				<span>0</span>
			</div>
			
			<div class="share__item">
				<a href="#" class="share-btn__tw" data-text="Tweet" rel="nofollow"><i></i></a>
				<span>0</span>
			</div>-->
					
</aside>
		
<div class="street-desc fl">
<select name='type' id='select-type'>
	<option value='0'><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'select_type'), $this);?>
</option>
	<option value='speed'><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'speed_camera'), $this);?>
</option>
	<option value='violation'><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'violation_camera'), $this);?>
</option>
</select>
</div>
<div class="street-desc fl">
		<select name='city' id='select-city'>
		<option value='0'><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'select_city'), $this);?>
</option>
		<?php $_from = $this->_tpl_vars['this']->citys; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['city']):
?>
			<option value='<?php echo $this->_tpl_vars['city']['id']; ?>
'><?php echo $this->_tpl_vars['city']['value']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
		</select>
</div>
<div class="street-desc fl">
		<select name='street' id='select-street'>
			<option value='0'><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'select_street'), $this);?>
</option>
		</select>
</div>

	
<div class="street-desc fl" id="street-desc" style="width:358px"></div>
<br class='cb'/>
<br class='cb'/>
<div id="map_main_canvas" style="width: 765px; height: 500px"></div>
<br class='cb'/>
<div class="fb-comments" data-colorscheme="dark" data-href="http://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
" data-width="765" data-num-posts="10"></div>
<br class='cb'/>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/right.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>