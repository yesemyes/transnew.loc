<?php /* Smarty version 2.6.26, created on 2017-02-02 17:19:33
         compiled from technical/main.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'technical/main.tpl.html', 12, false),)), $this); ?>
<?php echo ''; ?><?php echo '<div style="padding: 0px 13px 17px 0px;"><span class="blue">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'tech_center','default' => 'Центры технического обслуживания'), $this);?><?php echo '</span></div>'; ?><?php $_from = $this->_tpl_vars['this']->citys; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?><?php echo '<div class="city"><span>'; ?><?php echo $this->_tpl_vars['item']['value']; ?><?php echo '</span></div><div class="accordion">'; ?><?php $this->assign('sub_region', $this->_tpl_vars['item']['sub_region']); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['sub_region']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub_region']):
?><?php echo '<div class="kvartal" id="'; ?><?php echo $this->_tpl_vars['sub_region']['id']; ?><?php echo '"><span>'; ?><?php echo $this->_tpl_vars['sub_region']['value']; ?><?php echo '</span></div><div style="padding: 0!important;"></div>'; ?><?php endforeach; endif; unset($_from); ?><?php echo '</div>'; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>