<?php /* Smarty version 2.6.26, created on 2017-02-03 02:14:10
         compiled from default/pool-reults.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'PoolReslult', 'default/pool-reults.tpl.html', 6, false),)), $this); ?>
<?php $this->assign('pool', $this->_tpl_vars['this']->getPool()); ?>
<h2><?php echo $this->_tpl_vars['pool']['title']; ?>
</h2>
<div class="pool_questions">
<?php $_from = $this->_tpl_vars['pool']['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['question']):
?>
<div class="pool-relult">
<?php echo $this->_plugins['function']['PoolReslult'][0][0]->function_PoolReslult(array('votes' => $this->_tpl_vars['question']['votes'],'total' => $this->_tpl_vars['pool']['totalVotes'],'assign' => 'pr'), $this);?>

<?php echo $this->_tpl_vars['question']['title']; ?>

<div  id="pool_question_<?php echo $this->_tpl_vars['pool']['id']; ?>
_<?php echo $this->_tpl_vars['question']['id']; ?>
"  class="result-row" ><?php echo $this->_tpl_vars['pr']; ?>
%<span> / </span><span><?php echo $this->_tpl_vars['question']['votes']; ?>
</span></div>
<br class="cb"/>
</div>

<?php endforeach; endif; unset($_from); ?>
</div>
