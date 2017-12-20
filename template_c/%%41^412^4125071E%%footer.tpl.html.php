<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:30
         compiled from default/footer.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'default/footer.tpl.html', 10, false),array('function', 'Link', 'default/footer.tpl.html', 36, false),array('modifier', 'date_format', 'default/footer.tpl.html', 28, false),)), $this); ?>
<div id="footer">
    <div class="fotter_top">
        <div class="fotter_top_center_main">
            <div class="fotter_top_left">
                <p class="fott_phone">+374 (77) 44-06-44</p>
                <p class="fott_mail"><a href="mailto:info@transinfo.am" style="color: #5ac6f1;" class="fottmail">info@transinfo.am</a></p>
            </div>
            <div class="inity"></div>
            <div class="fotter_top_center"> 
               <p class="author" style="font-size: 19px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'author'), $this);?>
:<a href="https://www.facebook.com/ruben.ordanyan" title="Ruben Ordanyan" target="_blank" class="author_main" style="font-size: 19px;"> Ruben Ordanyan</a></div>
            <div class="inity"></div>
    
            <div class="fotter_top_right">
                <p class="dev_by"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'developed'), $this);?>
:<a href="http://www.studio-one.am" target="_blank" class="studio"> Studio-One</a></p>
                <p class="supp_by" style="margin-left: -12px;"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('param' => 'support'), $this);?>
:<a href="http://masterweb.am" target="_blank" class="master"> Master Web</a></p>
            </div>
        </div>
    </div>
    <div class="fotter_bottom">
        <div class="fotter_bottom_center">
             <div class="coltwo_bottom">
                <div style="float:left; margin-left: 15px;">
                    <a href="">
                    <span class="fl" style="margin-top: 3px;">
                    <img src="/images/copy1.png" title="" alt=""/>
                    </span>
                    <div class="fl" style="margin-left: 5px; margin-top: 3px;">
                    <span  style="color: #00a7e3;">&copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 BigTechLine</span>
                    <br class="cb"/>
                    <span style="color: #fff;">All rights reserved</span>
                    </div></a>
                </div>
              </div>
            <div class="colone">
                <ul class="colone_menu">
                    <li class="colone_menu_1"><?php $_from = $this->_tpl_vars['this']->menu['bottom']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['RigthTopMenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['RigthTopMenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
        $this->_foreach['RigthTopMenu']['iteration']++;
?><a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => $this->_tpl_vars['item']['alias']), $this);?>
" class="hov botmenu <?php if ($this->_tpl_vars['this']->currentPage['alias'] == $this->_tpl_vars['item']['alias']): ?>under<?php endif; ?>"><?php echo $this->_tpl_vars['item']['label']; ?>
</a><?php endforeach; endif; unset($_from); ?></li>
                </ul>
            </div>	 
	   </div>
    </div>
  </div>