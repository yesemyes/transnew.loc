<?php
$root ['setup'] = array ('table' => 'technicalinspection', 'view' => 'getList', 'labelfield' => 'alias', 'order' => 'position ASC' );

$root['items']['alias']       				= array( 'control'=>"input", 'type'=>"text",'unique'=>1 ,'required'=>'1') ;
$root['items']['active']       				= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );

$root['items']['region']                 = array('control'=>"select-tree",'select_control'=>'radio','max_level'=>2,'select_levels'=>array(0,1), 'required'=>'1');
$root['items']['region']['options']      =array('type'=>'database-tree','table'=>'regions','value'=>'id','label'=>'value');
$root ['items'] ["image"] = array ('control' => "input", 'type' => "fileImage", 'fileExt' => '*.gif;*.jpg;*.jpeg;*.png;*.jpeg', 'resize' => array ('thumb' => 117, 'small' => 200, 'middle' => 349, 'big' => 800 ) );
$root ['items'] ["images"] = array ('control' => "input", 'rel' => 1, 'fileExt' => '*.gif;*.jpg;*.png;*.jpeg', 'type' => "fileImage", "multiple" => true, 'resize' => array ('thumb' => 117, 'small' => 200, 'middle' => 400, 'big' => 800 ) );
$root ['items'] ['title'] = array ('control' => "input", 'type' => "text", 'ml' => 1, 'required' => 1 );
$root ['items'] ['address'] = array ('control' => "textarea", 'type' => "editor",   'ml' => 1 );
$root ['items'] ['work_time'] = array ('control' => "textarea", 'type' => "editor",   'ml' => 1 );
$root ['items'] ['email'] = array ('control' => "input", 'type' => "text");
$root ['items'] ['phone'] = array ('control' => "input", 'type' => "text");
$root ['items'] ['url'] = array ('control' => "input", 'type' => "text" );
$root ['items'] ['description'] = array ('control' => "textarea", 'type' => "editor",  'ml' => 1 );
$root ['items'] ["latitude"] = array ('control' => "input", 'type' => "text", 'required' => '1', "default" => '40.177682' );
$root ['items'] ["longitude"] = array ('control' => "input", 'type' => "text", 'required' => '1', "default" => '44.512470' );
$root ['items'] ["map"] = array ('exclude' => true, 'control' => "gmap", 'controls' => array ('latitude' => 'latitude', 'longitude' => 'longitude' ) );
$root ['setup'] ['listelements'] = array ('active','title', "region", 'address','image' );
?>