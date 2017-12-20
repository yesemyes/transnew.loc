<?php
$root['setup']                 = array('table'=>'regions','view'=>'getTree', 'labelfield'=>'value','maxLevels' =>2,'order'=>"`position` ASC");
$root['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']["value"]    	   =array('control'=>"input", 'type'=>"text" ,'required'=>'1', 'ml'=>1);
$root['items']['pid']  						= array('control'=>"select-pid-tree" ,'type'=>'pid','default'=>0);
$root['items']['pid']['options']			= array('type'=>'database-tree','table'=>'regions','value'=>'id','label'=>'value');
?>
