<?php /* Smarty version 2.6.26, created on 2017-02-02 17:42:18
         compiled from cars/resul_filter.tpl.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'Trans', 'cars/resul_filter.tpl.html', 23, false),array('function', 'Link', 'cars/resul_filter.tpl.html', 41, false),array('function', 'BulidQuery', 'cars/resul_filter.tpl.html', 41, false),array('modifier', 'count', 'cars/resul_filter.tpl.html', 28, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
    $(document).ready(function()
{
    console.log($(\'span.show_all\').length);
    $(\'span.show_all\').click(function()
    {
        $(\'li.show_all\').slideDown(1000).show();
        $(\'span.show_all\').hide();
        
    })
    
})
</script>
'; ?>

<div class="fl" style="background: url(/css/pdd_style/left_text_bg.png) repeat; width:208px">
<br class="cb"/>
<ul class="UlNoStyle"  style="width:175px; margin: 0 auto; ">


<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_release_date_year'] )): ?>
  <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0"> 
  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_year'), $this);?>
:
    <ul id="cm<?php echo $this->_tpl_vars['obj']->key; ?>
" >
     
      <li >  
          
           <?php $this->assign('count', count($this->_tpl_vars['this']->filters['filed_release_date_year'])); ?>
           <?php $_from = $this->_tpl_vars['this']->filters['filed_release_date_year']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['year'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['year']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['year'] => $this->_tpl_vars['qty']):
        $this->_foreach['year']['iteration']++;
?>
           
           <?php if ($this->_foreach['year']['iteration'] == 7): ?>
          <span class="show_all"><?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'show_all'), $this);?>
</span>
            </li>
            <li style="display: none;" class="show_all">
            
            
          <?php endif; ?>
          
           
           
          <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'action','replace' => 'filed_release_date_year','replaceWith' => $this->_tpl_vars['year']), $this);?>
" class="search-filter" ><?php echo $this->_tpl_vars['year']; ?>
</a>(<?php echo $this->_tpl_vars['qty']; ?>
)
          <br class="cb"/>
          
          
          <?php endforeach; endif; unset($_from); ?>
          
      </li>
      
      
      
    </ul>
    <br class="cb"/>
    </li>
<?php endif; ?>


<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_price'] )): ?>  	
    <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0"> <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_price'), $this);?>
:
    <ul id="cm_filed_price" >
     
      <li >  
      <?php $_from = $this->_tpl_vars['this']->filters['filed_price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['price'] => $this->_tpl_vars['qty']):
?>
	  <?php if ($this->_tpl_vars['qty'] > 0): ?>
      <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'action','replace' => 'price','replaceWith' => $this->_tpl_vars['price']), $this);?>
" class="search-filter"><?php echo $this->_tpl_vars['price']; ?>
 </a>(<?php echo $this->_tpl_vars['qty']; ?>
)
      <br class="cb"/>
	  <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
	 </li>
      
      
      
    </ul>
   
    <br class="cb"/>
    </li>
<?php endif; ?>     
<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_customs'] )): ?>  
    <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0">  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_custom'), $this);?>
:
    <ul id="cm<?php echo $this->_tpl_vars['obj']->key; ?>
" >
     
          <li >  
<?php $_from = $this->_tpl_vars['this']->filters['filed_customs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customs'] => $this->_tpl_vars['qty']):
?>

		<?php if ($this->_tpl_vars['qty'] > 0): ?>
      <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'action','replace' => 'filed_customs','replaceWith' => $this->_tpl_vars['customs']), $this);?>
" class="search-filter"><?php echo $this->_tpl_vars['qty']['name']; ?>
 </a>(<?php echo $this->_tpl_vars['qty']['qty']; ?>
)
      <br class="cb"/>
	  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	 </li>
      
      
      
    </ul>

    <br class="cb"/>
    </li>
<?php endif; ?>    
<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_milage'] )): ?> 
    <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0">  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_milage'), $this);?>
:
    <ul id="cm_filed_milage" >
     
      <li >  
<?php $_from = $this->_tpl_vars['this']->filters['filed_milage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['milage'] => $this->_tpl_vars['qty']):
?>
		<?php if ($this->_tpl_vars['qty'] > 0): ?>
      <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'action','replace' => 'filed_milage','replaceWith' => $this->_tpl_vars['milage']), $this);?>
" class="search-filter"><?php echo $this->_tpl_vars['milage']; ?>
 </a>(<?php echo $this->_tpl_vars['qty']; ?>
)
      <br class="cb"/>
	  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	 </li>
      
      
      
    </ul>

    <br class="cb"/>
    </li>
<?php endif; ?> 

<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_credit'] )): ?> 
    <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0">  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_credit'), $this);?>
:
    <ul id="cm_filed_credit" >
     
      <li >  
<?php $_from = $this->_tpl_vars['this']->filters['filed_credit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['credit'] => $this->_tpl_vars['qty']):
?>
		<?php if ($this->_tpl_vars['qty'] > 0): ?>
      <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'action','replace' => 'filed_credit','replaceWith' => $this->_tpl_vars['credit']), $this);?>
" class="search-filter"><?php echo $this->_tpl_vars['qty']['name']; ?>
 </a>(<?php echo $this->_tpl_vars['qty']['qty']; ?>
)
      <br class="cb"/>
	  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	 </li>
      
      
      
    </ul>

    <br class="cb"/>
    </li>
<?php endif; ?> 

<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_interchange'] )): ?> 
    <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0">  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_interchange'), $this);?>
:
    <ul id="cm_filed_credit" >
     
      <li >  
<?php $_from = $this->_tpl_vars['this']->filters['filed_interchange']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['interchange'] => $this->_tpl_vars['qty']):
?>
		<?php if ($this->_tpl_vars['qty'] > 0): ?>
      <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'action','replace' => 'filed_interchange','replaceWith' => $this->_tpl_vars['interchange']), $this);?>
" class="search-filter"><?php echo $this->_tpl_vars['qty']['name']; ?>
 </a>(<?php echo $this->_tpl_vars['qty']['qty']; ?>
)
      <br class="cb"/>
	  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	 </li>
      
      
      
    </ul>

    <br class="cb"/>
    </li>
<?php endif; ?> 


<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_gearbox'] )): ?>    
    <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0">  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_gearbox'), $this);?>
:
    <ul id="cm_filed_gearbox" >
     
      <li > 
      <?php $_from = $this->_tpl_vars['this']->filters['filed_gearbox']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gearboxId'] => $this->_tpl_vars['gearbox']):
?> 
      <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'action','replace' => 'filed_gearbox','replaceWith' => $this->_tpl_vars['gearboxId']), $this);?>
" class="search-filter"><?php echo $this->_tpl_vars['gearbox']['name']; ?>
 </a>(<?php echo $this->_tpl_vars['gearbox']['qty']; ?>
)
       <br class="cb"/>
      <?php endforeach; endif; unset($_from); ?>
	 </li>
      
      
      
    </ul>

    <br class="cb"/>
    </li>
<?php endif; ?>   
<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_engine'] )): ?>    
    <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0">  Engine volume:
    <ul id="cm<?php echo $this->_tpl_vars['obj']->key; ?>
" >
     
      <li >  
      <a href="<?php echo $this->_tpl_vars['this']->path; ?>
?<?php echo $this->_tpl_vars['sObj']->url; ?>
" class="search-filter">3-3.9 </a>(5)
	 </li>
      
      
      
    </ul>

    <br class="cb"/>
    </li>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_rudder'] )): ?>    
    <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0">  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_rudders'), $this);?>
:
    <ul id="cm_filed_rudder" >
     
      <li > 
      <?php $_from = $this->_tpl_vars['this']->filters['filed_rudder']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rudderId'] => $this->_tpl_vars['rudder']):
?> 
      <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'action','replace' => 'filed_rudder','replaceWith' => $this->_tpl_vars['rudderId']), $this);?>
" class="search-filter"><?php echo $this->_tpl_vars['rudder']['name']; ?>
 </a>(<?php echo $this->_tpl_vars['rudder']['qty']; ?>
)
       <br class="cb"/>
      <?php endforeach; endif; unset($_from); ?>
	 </li>
      
      
      
    </ul>

    <br class="cb"/>
    </li>
<?php endif; ?>

<?php if (! empty ( $this->_tpl_vars['this']->filters['filed_body'] )): ?>    
    <li id="<?php echo $this->_tpl_vars['obj']->key; ?>
" class="" style=" border-bottom:1px solid #395f6f; margin:5px 0">  <?php echo $this->_plugins['function']['Trans'][0][0]->function_trans(array('term' => 'offer_body'), $this);?>
:
    <ul id="cm_filed_body" >
     
      <li > 
      <?php $_from = $this->_tpl_vars['this']->filters['filed_body']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bodyId'] => $this->_tpl_vars['body']):
?> 
      <a href="<?php echo $this->_plugins['function']['Link'][0][0]->function_link(array('page' => 'cars'), $this);?>
?<?php echo $this->_plugins['function']['BulidQuery'][0][0]->function_bulidQuery(array('query' => $this->_tpl_vars['this']->query,'unset' => 'action','replace' => 'filed_body','replaceWith' => $this->_tpl_vars['bodyId']), $this);?>
" class="search-filter"><?php echo $this->_tpl_vars['body']['name']; ?>
 </a>(<?php echo $this->_tpl_vars['body']['qty']; ?>
)
       <br class="cb"/>
      <?php endforeach; endif; unset($_from); ?>
	 </li>
      
      
      
    </ul>

    <br class="cb"/>
    </li>
<?php endif; ?>    


</ul>
</div>