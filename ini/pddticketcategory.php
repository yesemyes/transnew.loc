<?php

$resize = array ('big' => 1024, 'test' => 480, 'small' => 370 );
$resize_answer = array ('big' => 1024, 'test' => 110 );
$root ['setup'] = array ('table' => 'pddticketcategory', 'view' => 'getList', 'labelfield' => 'alias' );
$root ['items'] ['alias'] = array ('control' => "input", 'type' => "text"); 
$root ['items'] ['alias']['required'] =1; 
$root ['items'] ['alias']['default'] =base::uniqid ( 'group', 'pddticketcategory' );
$root ['items'] ['alias']['unique'] =1;
$root ['items'] ['alias']['FILTER_VAR'] =array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'convertUrl' ) ) ;
$root ['items'] ['active'] = array ('control' => "input", 'type' => 'checkbox', 'default' => 1 );
$root ['items'] ["label"] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root ['setup'] ['listelements'] = array ('active', 'label' );

?>