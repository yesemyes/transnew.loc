<?php /* Smarty version 2.6.26, created on 2017-02-02 17:22:41
         compiled from calculators/tech.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nf', 'calculators/tech.tpl.html', 35, false),)), $this); ?>
<?php echo ''; ?><?php if ($this->_tpl_vars['this']->calculator['content']): ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo '
    <script type="text/javascript">
    
            $(document).ready(function(){
        $("select.uni").uniform();})
        function selectItem(a)
        {
           $(a).find(\'option\').removeClass(\'active\');
           $(a).find(\'option:selected\').addClass(\'active\');
           
           
          
           
           
                 
        }
    </script>

'; ?><?php echo '<div style="margin: 20px 0;" class="tech_calc"><h2 class="calcTitle">'; ?><?php echo $this->_tpl_vars['this']->calculator['title']; ?><?php echo '</h2><table cellspacing="10" width="720" class="techTblBg">'; ?><?php $_from = $this->_tpl_vars['this']->transType; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['name']['iteration']++;
?><?php echo '<tr><td><span class="trans-type">'; ?><?php echo $this->_tpl_vars['item']['title']; ?><?php echo '</span></td><td><span class="techPrice">'; ?><?php echo ((is_array($_tmp=$this->_tpl_vars['item']['pay'])) ? $this->_run_mod_handler('nf', true, $_tmp) : HelperModifier::nf($_tmp)); ?><?php echo ' AMD</span></td></tr>'; ?><?php if (! ($this->_foreach['name']['iteration'] == $this->_foreach['name']['total'])): ?><?php echo '<tr><td colspan="3"><span class="border"></span></td></tr>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '</table><br class="cb"/><div class="calcul_text">'; ?><?php echo $this->_tpl_vars['this']->calculator['content']; ?><?php echo '</div><br class="cb"/></div>'; ?>