<?php
$root ['setup']                 = array('table'=>'street','view'=>'getList', 'labelfield'=>'value','order'=>"`position` ASC");
$root ['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root ['items']["value"]    	   =array('control'=>"input", 'type'=>"text" ,'required'=>'1', 'ml'=>1);
$root ['items'] ['city'] = array ('control' => "select", 'default' => 0, 'required' => 1 );
$root ['items'] ['city'] ['options'] = array ('type' => 'database', 'ml' => 1, 'table' => 'city', 'value' => 'id', 'label' => 'value' );
$root ['setup']['listelements'] = array_keys($root['items']);
?>
