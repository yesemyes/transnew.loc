<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from default/pool-form.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'default/pool-form.tpl.html', 1, false),array('function', 'Trans', 'default/pool-form.tpl.html', 12, false),)), $this); ?>
<form action="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'home','action' => 'pool-voting'), $this);?>
?pool=<?php echo $this->_tpl_vars['pool']['id']; ?>
" method="post" class="pool-voting" onsubmit="return poolVoting(this)">
<h2><?php echo $this->_tpl_vars['pool']['title']; ?>
</h2>
<div class="pool_questions">
<?php $_from = $this->_tpl_vars['pool']['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['question']):
?>
<label for="pool_question_<?php echo $this->_tpl_vars['pool']['id']; ?>
_<?php echo $this->_tpl_vars['question']['id']; ?>
" style="display:block;" class="pool-relult">
<input type="radio" id="pool_question_<?php echo $this->_tpl_vars['pool']['id']; ?>
_<?php echo $this->_tpl_vars['question']['id']; ?>
" name="pool_question[<?php echo $this->_tpl_vars['pool']['id']; ?>
]" value="<?php echo $this->_tpl_vars['question']['id']; ?>
" style="position: relative;top: 2px;"/>
<?php echo $this->_tpl_vars['question']['title']; ?>

</label>
<?php endforeach; endif; unset($_from); ?>
<input type="hidden" name="action" value="pool-voting"/>
<div class="pool-relult" style="padding-top:5px">
<button class="btn fr" style="width: 82px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'vote'), $this);?>
</button>
</div>
</div>
</form>