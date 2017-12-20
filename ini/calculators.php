<?php
$root ['setup'] = array ('table' => 'calculators', 'view' => 'getList', 'labelfield' => 'title' , 'order'=>'position');
$root['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root[ 'items']['alias'] = array(  'control'    =>"input",'type'		=>"text",'unique'     =>1 , 
'FILTER_VAR' => array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'convertUrl' )));

$root ['items'] ['content'] = array ('control' => "textarea", 'type' => "editor", 'required' => '1', 'ml' => 1 );
$root ['items'] ['title'] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root ['setup'] ['listelements'] = array ('title','active');








?>