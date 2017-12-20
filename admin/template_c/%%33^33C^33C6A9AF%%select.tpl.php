<?php /* Smarty version 2.6.26, created on 2013-07-22 12:37:13
         compiled from controls/select.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'controls/select.tpl', 5, false),)), $this); ?>
<select name="<?php echo $this->_tpl_vars['_name']; ?>
"  id="<?php echo $this->_tpl_vars['_id']; ?>
" <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "controls/events.tpl.html", 'smarty_include_vars' => array('_setting' => $this->_tpl_vars['_setting'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php if (isset ( $this->_tpl_vars['_setting']['multiple'] )): ?><?php echo $this->_tpl_vars['_setting']['multiple']; ?>
<?php endif; ?> size="<?php if (isset ( $this->_tpl_vars['_setting']['size'] )): ?><?php echo $this->_tpl_vars['_setting']['size']; ?>
<?php endif; ?>" style="width:500px;">
<option value="0">--------------</option>

<?php if (! isset ( $this->_tpl_vars['_setting']['options']['depended'] )): ?>
	<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['_setting']['_options'],'selected' => $this->_tpl_vars['_value']), $this);?>

<?php else: ?>
<?php $this->assign('getMl', '0'); ?>
<?php if ($this->_tpl_vars['_setting']['options']['ml']): ?>
<?php $this->assign('getMl', $this->_tpl_vars['this']->form->defLng['id']); ?>
<?php endif; ?>
<?php $this->assign('depended_index', $this->_tpl_vars['_setting']['options']['depended']['filed']); ?>

<?php $this->assign('depended_value', $this->_tpl_vars['this']->form->_FORM_DATA['main'][$this->_tpl_vars['depended_index']]); ?>

    <?php if ($this->_tpl_vars['_setting']['options']['table'] != 'brandmodel'): ?>
    
    <?php $this->assign('_options', $this->_tpl_vars['this']->form->db->getOptions($this->_tpl_vars['_setting']['options']['table'],$this->_tpl_vars['_setting']['options']['value'],$this->_tpl_vars['_setting']['options']['label'],$this->_tpl_vars['getMl'],($this->_tpl_vars['_setting']['options']['depended']['where'])."=".($this->_tpl_vars['depended_value']))); ?>
    
    <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['_options'],'selected' => $this->_tpl_vars['_value']), $this);?>

    <?php else: ?>
        <?php $this->assign('_options', $this->_tpl_vars['this']->form->db->getTree($this->_tpl_vars['_setting']['options']['table'],"id, pid , `".($this->_tpl_vars['_setting']['options']['value'])."` as `key`,`".($this->_tpl_vars['_setting']['options']['label'])."` as `value`")); ?>
        
        <?php $_from = $this->_tpl_vars['_options'][$this->_tpl_vars['depended_value']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opt']):
?>
        
        <?php if (isset ( $this->_tpl_vars['_options'][$this->_tpl_vars['opt']['id']] )): ?>
        
        <optgroup label="<?php echo $this->_tpl_vars['opt']['value']; ?>
">
        <?php $_from = $this->_tpl_vars['_options'][$this->_tpl_vars['opt']['id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sopt']):
?>
        <option value="<?php echo $this->_tpl_vars['sopt']['id']; ?>
"  <?php if ($this->_tpl_vars['_value'] == $this->_tpl_vars['sopt']['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['sopt']['value']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
        
        </optgroup>
        <?php else: ?>
        <option value="<?php echo $this->_tpl_vars['opt']['id']; ?>
"  <?php if ($this->_tpl_vars['_value'] == $this->_tpl_vars['opt']['id']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['opt']['value']; ?>
</option>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
<?php endif; ?>
</select>
<?php if (isset ( $this->_tpl_vars['_setting']['options']['depended'] )): ?>
<script type="text/javascript" language="javascript" >

var _depended= "#f_<?php echo $this->_tpl_vars['this']->curModule['name']; ?>
_<?php echo $this->_tpl_vars['_setting']['options']['depended']['filed']; ?>
";
var _dependPath='<?php echo $this->_tpl_vars['this']->form->path; ?>
?action=getJson&function=getOptions&viewAjax=1&xTable=<?php echo $this->_tpl_vars['_setting']['options']['table']; ?>
&xML=<?php echo $this->_tpl_vars['getMl']; ?>
&xKey=<?php echo $this->_tpl_vars['_setting']['options']['value']; ?>
&xLabel=<?php echo $this->_tpl_vars['_setting']['options']['label']; ?>
&xWhere=<?php echo $this->_tpl_vars['_setting']['options']['depended']['where']; ?>
'

<?php echo '
$(_depended).change( function(){ fillThisFromDepended(_dependPath,this.value,\''; ?>
<?php echo $this->_tpl_vars['_id']; ?>
<?php echo '\')})
</script>
'; ?>

<?php endif; ?>