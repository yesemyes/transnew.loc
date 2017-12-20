<?php /* Smarty version 2.6.26, created on 2017-02-02 17:18:23
         compiled from pdd/viewNoticeAction.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'pdd/viewNoticeAction.tpl.html', 4, false),)), $this); ?>
<?php $this->assign('client_answer', $this->_tpl_vars['this']->question['client_answer']); ?>
<?php $this->assign('correct_answer', $this->_tpl_vars['this']->question['correct_answer']); ?>
<div style="width:398px; padding:30px  72px  10px 72px; color:#666666; font-size:12px">
<div class="answer_status_<?php echo $this->_tpl_vars['this']->question['status']; ?>
" ><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => $this->_tpl_vars['this']->question['status']), $this);?>
</div>
<?php if ($this->_tpl_vars['this']->question['image_original'] || $this->_tpl_vars['this']->question['image']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pdd/showResultThumb.tpl.html", 'smarty_include_vars' => array('width' => 391,'height' => 288,'image_original' => $this->_tpl_vars['this']->question['image_original'],'image_default' => $this->_tpl_vars['this']->question['image'],'imageType' => $this->_tpl_vars['this']->query['imageType'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<div style='color:#000; padding:6px 0;'><strong><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'question'), $this);?>
</strong>:&nbsp;<?php echo $this->_tpl_vars['this']->question['question']; ?>
</div>
<div  style='color:#000; padding:6px 0;'><strong><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'your_answer'), $this);?>
</strong>:&nbsp;<?php echo $this->_tpl_vars['this']->question[$this->_tpl_vars['client_answer']]; ?>
</div>
<div style='color:#000; padding:6px 0;'><strong><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'right_answer'), $this);?>
</strong>:&nbsp;<?php echo $this->_tpl_vars['this']->question[$this->_tpl_vars['correct_answer']]; ?>
</div>
<?php if ($this->_tpl_vars['this']->question['hint_for_correct_answer']): ?><div style='color:#000; padding:6px 0;'><strong><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'right_answer_comment'), $this);?>
</strong>:&nbsp;
<?php echo $this->_tpl_vars['this']->question['hint_for_correct_answer']; ?>
</div>
<?php endif; ?>


</div>
