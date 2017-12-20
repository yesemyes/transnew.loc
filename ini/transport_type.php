<?php
$root ['setup'] = array ('table' => 'transport_type', 'view' => 'getList', 'labelfield' => 'alias', 'order' => 'title ASC' );
$root ['items']['active']= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root ['items'] ['title'] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root ['items'] ['pay'] = array ('control' => "input", 'type' => "text");
$root ['items'] ['calculator'] = array ('control' => "select", 'default' => 0, 'required' => 1 );
$root ['items'] ['calculator'] ['options'] = array ('type' => 'database', 'ml' => 1, 'table' => 'calculators', 'value' => 'id', 'label' => 'title' );

$root ['setup'] ['listelements'] = array ('active','title','calculator');
?>