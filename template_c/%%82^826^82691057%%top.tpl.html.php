<?php /* Smarty version 2.6.26, created on 2017-02-02 17:19:33
         compiled from technical/top.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'technical/top.tpl.html', 9, false),array('function', 'StaticText', 'technical/top.tpl.html', 12, false),)), $this); ?>
<?php echo ''; ?><?php echo '
<script type="text/javascript">
$(document).ready(function(){ $(\'#hintShow\').hover(function(){$(\'.hint\').show()},function(){$(\'.hint\').hide()})})
   
</script>
'; ?><?php echo '<div style="padding: 0 13px; display: none;"><span class="blue">'; ?><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'technical_insp','default' => 'Технический осмотр транспортных средств'), $this);?><?php echo '</span><div class="texDesc"><div class="hint" style="display: none; height: 50px; width: 150px; background: red; position: absolute;"></div>'; ?><?php echo $this->_plugins['function']['StaticText'][0][0]->function_staticText(array('alias' => 'technical','lng_id' => $this->_tpl_vars['this']->defLng['id'],'assign' => 'technical'), $this);?><?php echo ''; ?><?php echo $this->_tpl_vars['technical']; ?><?php echo '</div></div><br class="cb"/>'; ?>