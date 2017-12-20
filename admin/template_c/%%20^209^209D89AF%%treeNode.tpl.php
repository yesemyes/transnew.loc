<?php /* Smarty version 2.6.26, created on 2013-08-01 10:36:39
         compiled from treeNode.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'array_keys', 'treeNode.tpl', 15, false),)), $this); ?>
<?php if (! isset ( $this->_tpl_vars['_getTree'] )): ?>
<?php $this->assign('_getTree', $this->_tpl_vars['this']->form->_getTree); ?>
<?php endif; ?>
<?php $_from = $this->_tpl_vars['_getTree']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pid'] => $this->_tpl_vars['MAIN_LIST']):
?>
<ul id='P-<?php echo $this->_tpl_vars['pid']; ?>
' rel='<?php echo $this->_tpl_vars['_lavel']+1; ?>
' class="treeView">
  <?php $_from = $this->_tpl_vars['MAIN_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['row']):
?>
          <?php $this->assign('_subs', $this->_tpl_vars['this']->form->db->getRow($this->_tpl_vars['this']->form->table['main'],'count(*) as q',"pid=".($this->_tpl_vars['row']['id']))); ?>      

  <li  style="list-style:none" id="treeNode-<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
-<?php echo $this->_tpl_vars['row']['id']; ?>
" rel="<?php echo $this->_tpl_vars['this']->request['path']; ?>
?action=savePosition&viewAjax=1&tpl=json.tpl">
  <div  class="divh15 <?php if (isset ( $this->_tpl_vars['row']['active'] ) && $this->_tpl_vars['row']['active'] == '1'): ?> tnactive<?php else: ?> tnInActive<?php endif; ?>"  id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
-<?php echo $this->_tpl_vars['row']['id']; ?>
" ondblclick="openFromDialog('<?php echo $this->_tpl_vars['this']->request['path']; ?>
','edit',<?php echo $this->_tpl_vars['row']['id']; ?>
,'<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
',<?php echo $this->_tpl_vars['row']['pid']; ?>
,'<?php echo $this->_tpl_vars['this']->curModule['label']; ?>
')">
   
    <div style="float:left;">
    
        
        <?php $this->assign('ids', array_keys($this->_tpl_vars['_cookie'])); ?>
        <?php $this->assign('SubTree', 0); ?>
        <?php if (in_array ( $this->_tpl_vars['row']['id'] , $this->_tpl_vars['ids'] )): ?>
        
        <?php $this->assign('getTree', $this->_tpl_vars['this']->form->db->getTree($this->_tpl_vars['this']->form->table['main'],'*',"pid=".($this->_tpl_vars['row']['id']),'','position')); ?>
        <?php if (isset ( $this->_tpl_vars['getTree'][$this->_tpl_vars['row']['id']] )): ?>
        <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "treeNode.tpl", 'smarty_include_vars' => array('_lavel' => $this->_tpl_vars['_lavel']+1,'_cookie' => $this->_tpl_vars['_cookie'],'_getTree' => $this->_tpl_vars['getTree'],'pid' => $this->_tpl_vars['row']['id'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('SubTree', ob_get_contents()); ob_end_clean();
 ?>
        <?php endif; ?>
        
        <?php endif; ?>
        
        <?php if (( $this->_tpl_vars['_lavel'] < $this->_tpl_vars['this']->form->setup['maxLevels'] -1 )): ?> 
        
        <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "node-event.tpl", 'smarty_include_vars' => array('_sTree' => $this->_tpl_vars['SubTree'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('_CLASS', ob_get_contents()); ob_end_clean();
 ?>
        
        
        <?php endif; ?> 
        <span width="8" <?php if ($this->_tpl_vars['_subs']['q'] > 0): ?><?php echo $this->_tpl_vars['_CLASS']; ?>
<?php else: ?>class="no-subs"<?php endif; ?>>&nbsp;</span><?php $this->assign('lf', $this->_tpl_vars['this']->form->setup['labelfield']); ?>   
        
        <?php $this->assign('settings', $this->_tpl_vars['this']->form->items[$this->_tpl_vars['lf']]); ?>
       
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "view_listItem.tpl", 'smarty_include_vars' => array('value' => $this->_tpl_vars['row'][$this->_tpl_vars['lf']],'_settings' => $this->_tpl_vars['settings'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div><div style="float:left; height:15px;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "edit-delet-addsub-buttons.tpl", 'smarty_include_vars' => array('row' => $this->_tpl_vars['row'],'_lavel' => $this->_tpl_vars['_lavel'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
        
     </div>
<div style="clear:both;"></div>
    <?php if ($this->_tpl_vars['SubTree']): ?>
    <?php echo $this->_tpl_vars['SubTree']; ?>

    <?php endif; ?> </li>
  <?php endforeach; endif; unset($_from); ?>
</ul>
<?php endforeach; endif; unset($_from); ?> 