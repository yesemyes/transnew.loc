<?
$root['setup']                 = array('table'=>'milage_kayficent','view'=>'getList', 'labelfield'=>'value',);
$root['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']["value"]    	   =array('control'=>"input", 'type'=>"text" ,'required'=>'1', 'ml'=>1);
$root['items']["kayficent"]    =array('control'=>"input", 'type'=>"text" ,'required'=>'1');
$root['setup']['listelements'] = array_keys($root['items']);
?>
