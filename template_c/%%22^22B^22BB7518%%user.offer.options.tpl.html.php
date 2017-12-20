<?php /* Smarty version 2.6.26, created on 2017-02-02 17:16:33
         compiled from cars/user.offer.options.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'cars/user.offer.options.tpl.html', 3, false),array('modifier', 'strstr', 'cars/user.offer.options.tpl.html', 7, false),array('modifier', 'cat', 'cars/user.offer.options.tpl.html', 13, false),)), $this); ?>
<?php $this->assign('offerOptions', $this->_tpl_vars['this']->getOfferOptions($this->_tpl_vars['offer']['id'])); ?>
<?php if (! empty ( $this->_tpl_vars['offerOptions'] )): ?>
<div class="des"> <span class="title"> <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_equipment_set','default' => "Комплектация автомобиля"), $this);?>
 </span> <span class="fl text">
  <ul class="UlNoStyle">
    <?php $this->assign('lockeds', ""); ?>
    <?php $_from = $this->_tpl_vars['offerOptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['opeach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['opeach']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['p'] => $this->_tpl_vars['opt']):
        $this->_foreach['opeach']['iteration']++;
?>
    <?php $this->assign('found', strstr($this->_tpl_vars['lockeds'], $this->_tpl_vars['p'])); ?>
    <?php if (! $this->_tpl_vars['found']): ?>
    <li class="fl w250" style="margin:7px;"><strong class="fs15 " style="color: #67d5ff;"><?php echo $this->_tpl_vars['p']; ?>
</strong> <?php if (! empty ( $this->_tpl_vars['opt'] )): ?>
      <ul>
        <?php $_from = $this->_tpl_vars['opt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_opt']):
?>
        <li class="fs12"><?php echo $this->_tpl_vars['_opt']; ?>
<?php if (key_exists ( $this->_tpl_vars['_opt'] , $this->_tpl_vars['offerOptions'] )): ?>
          <?php $this->assign('lockeds', ((is_array($_tmp=$this->_tpl_vars['lockeds'])) ? $this->_run_mod_handler('cat', true, $_tmp, "|".($this->_tpl_vars['_opt'])."|") : smarty_modifier_cat($_tmp, "|".($this->_tpl_vars['_opt'])."|"))); ?>
          <ul>
            <?php $_from = $this->_tpl_vars['offerOptions'][$this->_tpl_vars['_opt']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
            <li class="fs11"><?php echo $this->_tpl_vars['i']; ?>
</li>
            <?php endforeach; endif; unset($_from); ?>
          </ul>
          <?php endif; ?> </li>
        <?php endforeach; endif; unset($_from); ?>
      </ul>
      <?php endif; ?> </li>
    <?php if (($this->_foreach['opeach']['iteration']-1) % 2): ?> <br class="cb"/>
    <?php endif; ?>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
  </ul>
  </span> </div>
<?php endif; ?>