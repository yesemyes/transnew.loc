<?php /* Smarty version 2.6.26, created on 2017-02-02 17:17:46
         compiled from calculators/property-calc.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'calculators/property-calc.tpl.html', 140, false),array('function', 'html_options', 'calculators/property-calc.tpl.html', 178, false),array('modifier', 'date_format', 'calculators/property-calc.tpl.html', 176, false),array('modifier', 'range', 'calculators/property-calc.tpl.html', 177, false),)), $this); ?>
<?php echo ''; ?><?php if ($this->_tpl_vars['this']->calculator['content']): ?><?php echo '<!--<div class="calcul_text">'; ?><?php echo $this->_tpl_vars['this']->calculator['content']; ?><?php echo '</div><br class="cb"/>-->'; ?><?php endif; ?><?php echo ''; ?><?php echo '
    <script type="text/javascript">
    
            $(document).ready(function(){
        $("select.uni").uniform();})
        function selectItem(a)
        {
           $(a).find(\'option\').removeClass(\'active\');
           $(a).find(\'option:selected\').addClass(\'active\');
           
           
          
           
           
                 
        }
        
        function result()
        {
            
            var transportType = $(\'#transportType\').find(\'option.active\').attr(\'data-id\');
            var year = $(\'#year\').val();
            var D = new Date();
            var power = $(\'#power\').val();
            
            if($(\'#power\').length !=0 && $(\'#power\') != 0 && $(\'#power\').val() !== "" && $.isNumeric($(\'#power\').val()) && $(\'#power\').val() <= 1000 && $(\'#power\').val() >= 0){
            
            var year = D.getFullYear() - year;
            
            if (0 <=year && year <=3)
            
            {
                var koef = 1;
            }
            else if(year == 4)
            {
                var koef = 0.9;
            }
            else if(year == 5)
            {
                var koef = 0.8;
            }
            else if(year == 6)
            {
                var koef = 0.7;
            }
            else if(year == 7)
            {
                var koef = 0.6;
            }
            else if(year >= 8)
            {
                var koef = 0.5;
            }
            
            
            
            
            if(transportType == 0)
            {
                if(1 <= power && power<= 120)
                {
                    var pay = 200 * power; 
                    
                    
                }
                else if(121 <= power && power <= 250)
                {
                    if(150 < power)
                    {
                        var pay = 300 * power + ((power - 150)*1000);
                        
                    }
                    else
                    {
                        var pay = 300 * power;
                    }
                }
                else if(power >= 251)
                {
                    var pay = 500 * power + ((power - 150)*1000);
                }
            }
            else if(transportType == 1)
            {
                if(1 <= power && power<= 200)
                {
                    
                        var pay = 100 * power;
                    
                     
                }
                else if(200 < power)
                {
                    var pay = 200 * power;
                }
            }
            
            else if(transportType == 2)
            {
                if(year >= 20)
                {
                    var pay = 0;
                }
                else if(1 <= power && power<= 200)
                {
                    
                        var pay = 100 * power;
                    
                     
                }
                else if(200 < power)
                {
                    var pay = 200 * power;
                }
            }
            
            else if(transportType == 3)
            {
                var koef = 1;
                var pay = 40 * power;
            }
            else if(transportType == 4)
            {
                var koef = 1;
                var pay = 150 * power;
            }
            
            
            
            
            var result = pay * koef + \' '; ?><?php echo ''; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'amd'), $this);?><?php echo ''; ?><?php echo '\';
            $(\'#result\').html(result);
            
            }
            else
            {
                alert(\''; ?><?php echo ''; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'insert_valid_power'), $this);?><?php echo ''; ?><?php echo '\')
            }
        }
        


        
    </script>

'; ?><?php echo '<div style="margin: 20px 0;" class="property_calc"><h2 class="calcTitle">'; ?><?php echo $this->_tpl_vars['this']->calculator['title']; ?><?php echo '</h2><table cellspacing="20"><tr><td><label>'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'Transport_type'), $this);?><?php echo '</label></td><td colspan="3"><select id="transportType" onchange="selectItem(this);" class="uni" style="width: 468px;opacity: 0;">'; ?><?php $_from = $this->_tpl_vars['this']->transType; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['name'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['name']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['name']['iteration']++;
?><?php echo '<option class="'; ?><?php if (($this->_foreach['name']['iteration'] <= 1)): ?><?php echo 'active'; ?><?php endif; ?><?php echo '" data-id="'; ?><?php echo ($this->_foreach['name']['iteration']-1); ?><?php echo '">'; ?><?php echo $this->_tpl_vars['item']['title']; ?><?php echo '</option>'; ?><?php endforeach; endif; unset($_from); ?><?php echo '</select></td></tr><tr><td colspan="4"><span class="border"></span></td></tr><tr><td><label>'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'transport_year'), $this);?><?php echo '</label></td><td><select id="year" onchange="selectItem(this);" class="uni" style="width: 145px;opacity: 0;">'; ?><?php $this->assign('cyear', ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y"))); ?><?php echo ''; ?><?php $this->assign('year_range', ((is_array($_tmp=$this->_tpl_vars['cyear'])) ? $this->_run_mod_handler('range', true, $_tmp, 1900, -1) : range($_tmp, 1900, -1))); ?><?php echo ''; ?><?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['year_range'],'output' => $this->_tpl_vars['year_range']), $this);?><?php echo '</select></td><td><label>'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'power'), $this);?><?php echo '</label></td><td><input type="text" name="power" class="uniInput" id="power"/></td></tr><tr><td colspan="4"><span class="border"></span></td></tr></table><div class="result"><label class="fl">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'result'), $this);?><?php echo '</label><span id="result" class="fr" ></span></div><br class="cb"/><input type="button" id="calculate" value="'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'calculate'), $this);?><?php echo '" onclick="result();" style="color: #FFF;"/><div class="calcul_text">'; ?><?php echo $this->_tpl_vars['this']->calculator['content']; ?><?php echo '</div><br class="cb"/></div>'; ?>