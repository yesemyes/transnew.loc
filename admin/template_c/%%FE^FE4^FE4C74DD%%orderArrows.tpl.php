<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:12
         compiled from orderArrows.tpl */ ?>
<div style="float:right; width:8px">

<?php $this->assign('_ascImgSrc', "arrow-down-1.png"); ?>
<?php $this->assign('_descImgSrc', "arrow-up-1.png"); ?>

<?php if (isset ( $this->_tpl_vars['this']->form->get['order']['by'] ) && $this->_tpl_vars['this']->form->get['order']['by'] == $this->_tpl_vars['_label']): ?>
<?php if (isset ( $this->_tpl_vars['this']->form->get['order']['type'] ) && $this->_tpl_vars['this']->form->get['order']['type'] == 'DESC'): ?>
<?php $this->assign('_ascImgSrc', "arrow-down-1-act.png"); ?>
<?php elseif (isset ( $this->_tpl_vars['this']->form->get['order']['type'] ) && $this->_tpl_vars['this']->form->get['order']['type'] == 'ASC'): ?>
<?php $this->assign('_descImgSrc', "arrow-up-1-act.png"); ?>
<?php endif; ?>
<?php endif; ?>

<img src="/admin/images/admin/<?php echo $this->_tpl_vars['_descImgSrc']; ?>
" width="7" height="7" style="margin-bottom:2px; cursor:pointer" onClick="orderBy('<?php echo $this->_tpl_vars['_label']; ?>
','<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
','<?php echo $this->_tpl_vars['this']->request['path']; ?>
','ASC')"/>
<img src="/admin/images/admin/<?php echo $this->_tpl_vars['_ascImgSrc']; ?>
" width="7" height="7" style="margin-top:2px; cursor:pointer" onClick="orderBy('<?php echo $this->_tpl_vars['_label']; ?>
','<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
','<?php echo $this->_tpl_vars['this']->request['path']; ?>
','DESC')"/>
</div> 