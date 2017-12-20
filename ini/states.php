<?php
$root['setup']                 = array('table'=>'states','view'=>'getTree', 'labelfield'=>'value','maxLevels' =>2,'order'=>"`position` ASC");
$root['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']["value"]    	   = array('control'=>"input", 'type'=>"text" ,'required'=>'1', 'ml'=>1);
$root['items']["image"]= array('control'=>"input"  ,'fileExt'=>'*.gif;*.jpg;*.png;*.jpeg'                  ,'type'=>"fileImage" ,     'resize'=>array('thumb'=>25,'small'=>50,'middle'=>400,'big'=>800));
$root['items']['pid']  						= array('control'=>"select-pid-tree" ,'type'=>'pid','default'=>0);
$root['items']['pid']['options']			= array('type'=>'database-tree','table'=>'states','value'=>'id','label'=>'value');
?>
