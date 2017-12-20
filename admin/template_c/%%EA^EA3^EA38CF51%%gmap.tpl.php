<?php /* Smarty version 2.6.26, created on 2013-07-24 21:10:39
         compiled from controls/gmap.tpl */ ?>
<div id="<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_gmap" style="wdidth:600px; height:400px"></div>
<script type="text/javascript" language="javascript">
	var latitude = $("#f_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_setting']['controls']['latitude']; ?>
");
	var longitude = $("#f_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_setting']['controls']['longitude']; ?>
");
	var angle = $("#f_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_setting']['controls']['angle']; ?>
");
	var DirType = $("#f_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_setting']['controls']['DirType']; ?>
");
	initAdminGmap(latitude,longitude,angle,DirType,"<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_gmap");
</script>
 <input type="hidden" name="<?php echo $this->_tpl_vars['_name']; ?>
" id="<?php echo $this->_tpl_vars['_id']; ?>
" value='1'/>