<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:53
         compiled from pdd/exam.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'pdd/exam.html', 7, false),)), $this); ?>
<div class="fl pdd " style="display:table">
<div  style="display:none" id="pdd-main-continer" data-min-wrong-count="<?php echo $this->_tpl_vars['this']->config['pdd_min_wrong_count']; ?>
" data-test-id="<?php echo $this->_tpl_vars['this']->query['test']; ?>
"> 
<br class="cb"/>

<div class="progressbar">
<span><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'estimated_time','default' => "ÐžÑ�Ñ‚Ð°Ð»Ð¾Ñ�ÑŒ Ð²Ñ€ÐµÐ¼ÐµÐ½Ð¸:"), $this);?>
</span>
<br class="cb"/>
<div id="progressbar" style="margin-top: 5px;"></div>
<span class="cb fr" estimated="1200"  id="estimated">15:00</span>
</div>
<div class="cb fl exam_left " style="margin-top: 16px; margin-left: 14px;">
<span class="fl title" style="width: 70px;padding-left: 9px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'exam_questions','default' => "Ð’Ð¾Ð¿Ñ€Ð¾Ñ�Ñ‹:"), $this);?>
</span>
<br class="cb"/>
<div class="numbers">
<ul>
<?php $_from = $this->_tpl_vars['this']->test['quetions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['quetion']):
?>
<li id="data-question-<?php echo $this->_tpl_vars['quetion']['id']; ?>
" <?php if ($this->_tpl_vars['index'] < 1): ?> class="current_q"<?php endif; ?>><span><?php echo $this->_tpl_vars['index']+1; ?>
</span></li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>

</div>
<div class="fl exam_right" style="width:697px;margin-top:16px;">
    <div  id="exam-questions-holder">
	<?php $_from = $this->_tpl_vars['this']->test['quetions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['quetion']):
?>
   
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pdd/question.tpl", 'smarty_include_vars' => array('question_number' => $this->_tpl_vars['index']+1,'ticket' => $this->_tpl_vars['quetion'],'showHint' => 'hide','test' => $this->_tpl_vars['this']->query['test'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    
    <?php endforeach; endif; unset($_from); ?>
	</div>
    <br class="cb"/>
  <button disabled="disabled" class="fl btn"  id="next-btn"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'answer','default' => "Պատասխանել"), $this);?>
</button>
</div>
<br class="cb"/>
</div>

<div id="resultView" style="display:none;float: left;">
    
</div>
<div style="margin: 30px 10px;"><div class="fb-comments" data-colorscheme="dark" data-href="http://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
" data-width="765" data-num-posts="10"></div></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/right.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>