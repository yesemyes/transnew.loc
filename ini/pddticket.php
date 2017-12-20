<?php
$resize = array ('big' => 1024, 'test' => 650, 'small' => 370 );
$resize_answer = array ('big' => 1024, 'test' => 650 );
//$root ['setup'] = array ('table' => 'pddticket', 'view' => 'getList', 'labelfield' => 'alias','order'=>"CONVERT(REPLACE(`label`,'_','.') , DECIMAL(10,2)) DESC");
$root ['setup'] = array ('table' => 'pddticket', 'view' => 'getList', 'labelfield' => 'alias','order'=>"`id` DESC");
$root ['items'] ['active'] = array ('control' => "input", 'type' => 'checkbox', 'default' => 1 );
$root ['items'] ["label"] = array ('control' => "input", 'type' => "text",  'required' => 1 );
$root ['items'] ['group'] = array ('control' => "select", 'default' => 0, 'required' => '1' );
$root ['items'] ['group'] ['options'] = array ('type' => 'database', 'table' => 'pddticketcategory', 'value' => 'id', 'label' => 'label' ,'ml'=>1);
$root ['items'] ["question"] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root ['items'] ['alias'] = array ('control' => "input", 'type' => "text",'required' => '1', 'default' => base::uniqid ( 'ticket', 'pddticket' ), 'unique' => 1, 'FILTER_VAR' => array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'convertUrl' ) ) );
$root ['items'] ["image"] = array ('control' => "input", 'type' => "fileImage", 'fileExt' => '*.gif;*.jpg;*.png;*.jpeg', 'resize' => $resize );
$root ['items'] ["image_original"] = array ('control' => "input", 'type' => "fileImage", 'fileExt' => '*.gif;*.jpg;*.png;*.jpeg', 'resize' => $resize );
$root ['items'] ["answer_a"] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root ['items'] ["answer_b"] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root ['items'] ["answer_c"] = array ('control' => "input", 'type' => "text", 'ml' => 1 );
$root ['items'] ["answer_d"] = array ('control' => "input", 'type' => "text", 'ml' => 1 );
$root ['items'] ["answer_e"] = array ('control' => "input", 'type' => "text", 'ml' => 1 );
$root ['items'] ['correct_answer'] = array ('control' => "select", 'default' => 0, 'required' => 1 );
$root ['items'] ['correct_answer'] ['options'] = array ('type' => 'options' );
$root ['items'] ['correct_answer'] ['options'] ['_options'] = array (

		'answer_a' => HelperFunction::trans ( array ('term' => 'answer_a' ) ), 
		'answer_b' => HelperFunction::trans ( array ('term' => 'answer_b' ) ), 
		'answer_c' => HelperFunction::trans ( array ('term' => 'answer_c' ) ), 
		'answer_d' => HelperFunction::trans ( array ('term' => 'answer_d' ) ), 
		'answer_e' => HelperFunction::trans ( array ('term' => 'answer_e' ) ) 
		);

$root ['items'] ['hint_for_correct_answer'] = array ('control' => "textarea", 'type' => "editor" , 'ml' => 1 );
$root ['setup'] ['listelements'] = array ('active', 'label', 'question', 'answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_e', 'correct_answer', 'hint_for_correct_answer','group' );
?>