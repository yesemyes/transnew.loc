<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from default/top-menu-item.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Link', 'default/top-menu-item.tpl.html', 3, false),)), $this); ?>
<ul class="active">
<?php $_from = $this->_tpl_vars['tree'][$this->_tpl_vars['pid']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['LeftTopMenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['LeftTopMenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['LeftTopMenu']['iteration']++;
?> 
<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => $this->_tpl_vars['item']['alias'],'extention' => '','assign' => 'href'), $this);?>

<li <?php if ($this->_tpl_vars['this']->path_params[$this->_tpl_vars['level']] == $this->_tpl_vars['item']['alias']): ?> class="active current-back"<?php endif; ?> $level=<?php echo $this->_tpl_vars['level']; ?>
  $level-alais=<?php echo $this->_tpl_vars['this']->path_params[$this->_tpl_vars['level']]; ?>
>
<?php if ($this->_tpl_vars['item']['href']): ?>
<a <?php if (! empty ( $this->_tpl_vars['tree'][$this->_tpl_vars['item']['id']] )): ?>class="parent"<?php endif; ?>  href="<?php echo $this->_tpl_vars['item']['href']; ?>
" target="_blank"><span><?php echo $this->_tpl_vars['item']['label']; ?>
</span></a>
<?php else: ?>
<a <?php if (! empty ( $this->_tpl_vars['tree'][$this->_tpl_vars['item']['id']] )): ?>class="parent"<?php endif; ?>  href="<?php echo $this->_tpl_vars['prefix']; ?>
<?php echo $this->_tpl_vars['href']; ?>
.html"><span><?php echo $this->_tpl_vars['item']['label']; ?>
</span></a>
<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['tree'][$this->_tpl_vars['item']['id']] )): ?>
<div <?php if ($this->_tpl_vars['item']['alias'] == 'roadpolice'): ?> class="second"<?php endif; ?>><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "default/top-menu-item.tpl.html", 'smarty_include_vars' => array('pid' => $this->_tpl_vars['item']['id'],'tree' => $this->_tpl_vars['this']->menu['top']['left'],'prefix' => ($this->_tpl_vars['prefix']).($this->_tpl_vars['href']),'level' => $this->_tpl_vars['level']+1)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
<?php endif; ?>
</li>
<?php endforeach; endif; unset($_from); ?>
</ul>