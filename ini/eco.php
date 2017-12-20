<?php
$root ['setup'] = array ('table' => 'calculators', 'view' => 'getList', 'labelfield' => 'title' );
$root[ 'items']['alias'] = array(  'control'    =>"input",'type'		=>"text",'unique'     =>1 , 
'FILTER_VAR' => array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'convertUrl' )));
$root ['items'] ['title'] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root['items']['name']          = array( 'control'=>"input", 'type'=>"text", 'required'=>'1');




$root ['setup'] ['listelements'] = array ('title');








?>