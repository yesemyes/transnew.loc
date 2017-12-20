<?php
$root['setup']                 = array('table'=>'city','view'=>'getList', 'labelfield'=>'value','order'=>"`position` ASC");
$root['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']["value"]    	   =array('control'=>"input", 'type'=>"text" ,'required'=>'1', 'ml'=>1);
$root['setup']['listelements'] = array_keys($root['items']);
?>
