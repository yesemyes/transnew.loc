<?php /* Smarty version 2.6.26, created on 2017-02-02 17:17:46
         compiled from calculators/top.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'calculators/top.tpl.html', 6, false),)), $this); ?>
<?php echo '<div class="texTabs"><ul class="texList">'; ?><?php $_from = $this->_tpl_vars['this']->calculators; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['name']['iteration']++;
?><?php echo '<li class="'; ?><?php if ($this->_tpl_vars['item']['alias'] == $this->_tpl_vars['this']->path_params['2']): ?><?php echo 'active'; ?><?php endif; ?><?php echo ' grad'; ?><?php echo ($this->_foreach['name']['iteration']-1); ?><?php echo '"><a href="'; ?><?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('p1' => 'calculators','p2' => $this->_tpl_vars['item']['alias']), $this);?><?php echo '">'; ?><?php echo $this->_tpl_vars['item']['title']; ?><?php echo '</a></li>'; ?><?php endforeach; endif; unset($_from); ?><?php echo '</ul><br class="cb"/></div><br class="cb"/>'; ?>