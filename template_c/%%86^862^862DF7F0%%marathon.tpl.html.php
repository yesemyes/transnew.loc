<?php /* Smarty version 2.6.26, created on 2017-02-02 17:35:13
         compiled from pdd/marathon.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'pdd/marathon.tpl.html', 6, false),)), $this); ?>
﻿<div class="fl pdd "   id="pdd-main-continer" data-min-wrong-count="<?php echo $this->_tpl_vars['this']->config['pdd_min_wrong_count']; ?>
" style="height:100%">
 
<?php if (! empty ( $this->_tpl_vars['this']->quetions )): ?>

  <div class="cb fl exam_left" style="margin-top: 16px; margin-left: 14px;"> <span class="fl title" style="width: 70px; padding-left: 9px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'exam_questions','default' => "Ð’Ð¾Ð¿Ñ€Ð¾Ñ�Ñ‹:"), $this);?>
</span> <br class="cb"/>
    <div class="scroll-pane fl" >
      <div class="numbers fl" <?php if ($this->_tpl_vars['this']->loadLink): ?>data-load="<?php echo $this->_tpl_vars['this']->loadLink; ?>
"<?php endif; ?>>
        <ul>
          <?php $_from = $this->_tpl_vars['this']->quetions; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['numbers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['numbers']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['quetion']):
        $this->_foreach['numbers']['iteration']++;
?>
          <li id="data-question-<?php echo $this->_tpl_vars['quetion']['id']; ?>
" class="marathone-questions"><span><?php echo $this->_tpl_vars['index']+1; ?>
</span></li>
		  
          <?php endforeach; endif; unset($_from); ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="fl exam_right" style="width:685px;"> 
  <div  id="marathon-questions-holder">
  <?php $_from = $this->_tpl_vars['this']->quetions; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['quetion']):
?>
     
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pdd/question.tpl", 'smarty_include_vars' => array('question_number' => $this->_tpl_vars['index']+1,'ticket' => $this->_tpl_vars['quetion'],'showHint' => 'show','numberoff' => 1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 
	 
    <?php endforeach; endif; unset($_from); ?> 
  </div>	
	<br class="cb"/>
     <button class="fl btn" id="next-btn"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'answer','default' => "Պատասխանել"), $this);?>
</button>
     <button class="fl btn" id="fake-next-btn"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'next_question','default' => "Следующий вопрос"), $this);?>
</button>
     &nbsp;
     <button class="fl btn" id="finish-btn"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'finsh_test','default' => "Завершит"), $this);?>
</button>
      &nbsp;
<label style="float:left; margin:3px 0  0 10px; padding:15px;">    <input type="checkbox" id="turn-off-hints" ><span style="padding-left:10px; margin-top:-1px; float:right"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'turn_off_hints'), $this);?>
</span></label>
  <br class="cb"/>
  </div>
  <br class="cb"/>
<?php else: ?>
<h2><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'no_questions_found','default' => "Извените раздел находится в стадии разработки"), $this);?>
</h2>
<?php endif; ?> 
<br class="cb"/> 
<div style="margin: 30px 10px;"><div class="fb-comments" data-colorscheme="dark" data-href="http://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo $_SERVER['REQUEST_URI']; ?>
" data-width="765" data-num-posts="10"></div></div>
</div>
<div id="resultView" style="display:none;float: left;"></div>
 

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/right.tpl.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>