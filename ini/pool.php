<?php
$root ['setup'] = array ('table' => 'pool', 'view' => 'getList', 'labelfield' => 'alias', 'order' => 'position ASC' );
$root ['items'] ['active'] = array ('control' => "input", 'type' => 'checkbox', 'default' => 0 );
$root ['items'] ['alias'] = array ('control' => "input", 'type' => "text", 'unique' => 1, 'required' => '1', 'FILTER_VAR' => array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'convertUrl' ) ) );
$root ['items'] ['date_from'] = array ('control' => "datepicker", 'required' => 1 );
$root ['items'] ['date_to'] = array ('control' => "datepicker", 'required' => 1 );
$root ['items'] ['title'] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root ['items'] ['date_from'] ['FILTER_VAR'] = array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'checkDateStr' ) );
$root ['items'] ['date_to'] ['FILTER_VAR'] = array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'checkDateStr' ) );
$root ['items'] ['questions'] = array ('control' => "checbox-group", 'required' => '1', 'rel' => 1  );
$root ['items'] ['questions'] ['options'] = array ('type' => 'database', 'table' => 'pool_questions', 'value' => 'id', 'label' => 'title' ,'ml'=>1);
$root ['items'] ['alias'] ['FILTER_VAR'] = array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'convertUrl' ) );
$root ['setup'] ['listelements'] = array ('active', 'date_from', 'date_to', 'title' );

?>