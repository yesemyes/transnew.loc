<?php /* Smarty version 2.6.26, created on 2013-08-08 00:41:07
         compiled from controls/checbox-group.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'controls/checbox-group.tpl', 2, false),array('function', 'html_checkboxes', 'controls/checbox-group.tpl', 18, false),)), $this); ?>
<fieldset class="checbox-group">
<legend><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => $this->_tpl_vars['_label']), $this);?>

</legend>

<?php if (empty ( $this->_tpl_vars['_value'] ) && $this->_tpl_vars['_setting']['inherit'] && $this->_tpl_vars['this']->form->pid > 0): ?>

<?php $this->assign('_values', $this->_tpl_vars['this']->form->db->queryFetchF("SELECT options FROM  category_options_rel WHERE id=".($this->_tpl_vars['this']->form->pid),'options')); ?>
<?php $this->assign('_value', $this->_tpl_vars['_values']['options']); ?>
<?php endif; ?>

<?php echo smarty_function_html_checkboxes(array('options' => $this->_tpl_vars['_setting']['_options'],'selected' => $this->_tpl_vars['_value'],'name' => $this->_tpl_vars['_name']), $this);?>

</fieldset>
<?php echo '

<script>
$(document).ready(function(){
    $(\'input:checkbox:checked\').parent().addClass(\'salat\');    
   
   $(\'input:checkbox\').change(function () {
        
            if($(this).parent().hasClass(\'salat\')){
                $(this).parent().removeClass(\'salat\');    
                
            }
            else{
                $(this).parent().addClass(\'salat\')
            }
            
       });
   
})
   


</script>
<style>
    .salat{
        background-color:#99FF66;
            
    }
</style>


</script>
'; ?>