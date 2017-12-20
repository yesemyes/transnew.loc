<?php /* Smarty version 2.6.26, created on 2017-02-02 21:28:25
         compiled from technical/tabinner.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'technical/tabinner.tpl.html', 13, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['this']->technical; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['technical']):
?>
<div  class="rob" style="padding: 12px!important;padding-top: 0!important;">


  <table cellpadding="0" cellspacing="0" width="" align="center" >
  <span style="border-top:1px solid #04435c; display:block;margin-bottom: 10px;"></span>
    <tr>
      <td width="331" valign="top" style="padding-right: 12px;">
      <div class="specialProjectTit" style="width: 313px;font-weight: normal;"><?php echo $this->_tpl_vars['technical']['title']; ?>
</div>
      <table cellpadding="10" cellspacing="0" width="100%" class="tbbg">
            
          <tr>
            <td style="color:#8ea5b0; font-size:13px"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'company_address','default' => "Адрес:"), $this);?>
</td>
            <td  style="color:#ffffff; font-size:13px"><?php echo $this->_tpl_vars['technical']['address']; ?>
</td>
          </tr>
          <?php if ($this->_tpl_vars['technical']['phone']): ?>
          <tr>
            <td style="color:#8ea5b0; font-size:13px"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'company_phone','default' => "Тел.:"), $this);?>
</td>
            <td  style="color:#ffffff; font-size:13px"><?php echo $this->_tpl_vars['technical']['phone']; ?>
</td>
          </tr>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['technical']['url']): ?>
          <tr>
            <td style="color:#8ea5b0; font-size:13px"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'company_url','default' => "Сайты:"), $this);?>
</td>
            <td style="color:#ffffff; font-size:13px"><a href="http://<?php echo $this->_tpl_vars['technical']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['technical']['url']; ?>
</a></td>
          </tr>
          <?php endif; ?>
                    <?php if ($this->_tpl_vars['technical']['work_time']): ?>
          <tr>
            <td style="color:#8ea5b0; font-size:13px"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'company_work_time','default' => "Время:"), $this);?>
</td>
            <td style="color:#ffffff; font-size:13px"><?php echo $this->_tpl_vars['technical']['work_time']; ?>
</td>
          </tr>
          <?php endif; ?>
        </table>
            
            <div id="map_main_canvas_<?php echo $this->_tpl_vars['technical']['id']; ?>
" style="width: 331px; height: 215px;margin-top: 20px;"></div>
        </td>
      <td  valign="top">
      	  
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "technical/user.offer.images.tpl", 'smarty_include_vars' => array('technical' => $this->_tpl_vars['technical'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </td>
    </tr>
    <tr><td colspan="2"><?php echo $this->_tpl_vars['technical']['description']; ?>
</td></tr>

  </table>
  
</div>
<?php endforeach; endif; unset($_from); ?>