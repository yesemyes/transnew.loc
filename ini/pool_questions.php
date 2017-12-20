<?php
$root ['setup'] = array ('table' => 'pool_questions', 'view' => 'getList', 'labelfield' => 'alias', 'order' => 'position ASC' );
$root ['items'] ['active'] = array ('control' => "input", 'type' => 'checkbox', 'default' => 0 );
$root ['items'] ['alias'] = array ('control' => "input", 'type' => "text", 'unique' => 1, 'required' => '1', 'FILTER_VAR' => array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'convertUrl' ) ) );
$root ['items'] ['title'] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root ['items'] ['alias'] ['FILTER_VAR'] = array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'convertUrl' ) );
$root ['setup'] ['listelements'] = array ('active', 'title' );

?>