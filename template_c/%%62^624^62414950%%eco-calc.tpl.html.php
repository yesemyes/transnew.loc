<?php /* Smarty version 2.6.26, created on 2017-02-02 17:34:58
         compiled from calculators/eco-calc.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'calculators/eco-calc.tpl.html', 30, false),)), $this); ?>
<?php echo ''; ?><?php if ($this->_tpl_vars['this']->calculator['content']): ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo '
    <script type="text/javascript">
    
        
        function selectItem(a)
        {
           $(a).find(\'option\').removeClass(\'active\');
           $(a).find(\'option:selected\').addClass(\'active\');
           
           
          
           
           
                 
        }
        
    $(document).ready(function(){
        $("select.uni").uniform();
       if($(\'#pay\').length != 0 && $(\'#k_cent\').length != 0)
        {
            $(\'#calculate\').live(\'click\',function()
            {
                var pay = $(\'#pay\').find(\'option.active\').attr(\'data-pay\');
                var k_cent = $(\'#k_cent\').find(\'option.active\').attr(\'data-pay\');
        
                var result = pay * k_cent + \' '; ?><?php echo ''; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'amd'), $this);?><?php echo ''; ?><?php echo '\'; 
                
                $(\'#result\').html(result);
            })    
        }
        
      
    })
        
    </script>

'; ?><?php echo '<div style="margin: 20px 0;" class="eco_calc"><h2 class="calcTitle">'; ?><?php echo $this->_tpl_vars['this']->calculator['title']; ?><?php echo '</h2><table cellspacing="20"><tr><td><label>'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'pay'), $this);?><?php echo '</label></td><td><select id="pay" onchange="selectItem(this);" class="uni" style="width: 480px;opacity: 0;">'; ?><?php $_from = $this->_tpl_vars['this']->pay; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['name']['iteration']++;
?><?php echo '<option class="'; ?><?php if (($this->_foreach['name']['iteration'] <= 1)): ?><?php echo 'active'; ?><?php endif; ?><?php echo '" data-pay="'; ?><?php echo $this->_tpl_vars['item']['pay']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['item']['title']; ?><?php echo '</option>'; ?><?php endforeach; endif; unset($_from); ?><?php echo '</select></td></tr><tr><td colspan="2"><span class="border"></span></td></tr><tr><td><label>'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'k_cent'), $this);?><?php echo '</label></td><td><select id="k_cent" onchange="selectItem(this);" class="uni" style="width: 480px;opacity: 0;">'; ?><?php $_from = $this->_tpl_vars['this']->k_cent; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['name']['iteration']++;
?><?php echo '<option class="'; ?><?php if (($this->_foreach['name']['iteration'] <= 1)): ?><?php echo 'active'; ?><?php endif; ?><?php echo '" data-pay="'; ?><?php echo $this->_tpl_vars['item']['k_cent']; ?><?php echo '">'; ?><?php echo $this->_tpl_vars['item']['title']; ?><?php echo '</option>'; ?><?php endforeach; endif; unset($_from); ?><?php echo '</select></td></tr><tr><td colspan="2"><span class="border"></span></td></tr></table><div class="result"><label class="fl">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'result'), $this);?><?php echo '</label><span id="result" class="fr" ></span></div><br class="cb"/><input type="button" id="calculate" value="'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'calculate'), $this);?><?php echo '"/><div class="calcul_text">'; ?><?php echo $this->_tpl_vars['this']->calculator['content']; ?><?php echo '</div><br class="cb"/></div>'; ?>
