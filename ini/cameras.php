<?php

$root ['setup'] = array ('table' => 'cameras', 'view' => 'getList', 'labelfield' => 'value' ,'order'=>"`position` ASC");
$root ['items'] ['active'] = array ('control' => "input", 'type' => 'checkbox', 'default' => 0 );
$root ['items'] ["alias"] = array ('control' => "input", 'type' => "text", 'required' => '1', 'default' => base::uniqid ( 'camera', 'cameras' ) );

$root['items']['city'] 						= array('control'=>"select" ,'default'=>0, 'required'=>'1');
$root['items']['street'] 				= array('control'=>"select" ,'default'=>0,'required'=>'1');
$root['items']['city']['options']     		=array('type'=>'database'     ,'ml'=>1,'table'=>'city',	'value'=>'id','label'=>'value');
$root['items']['street']['options']      =array('type'=>'database'     ,'depended'=>array('filed'=>'city','where'=>'city'),  'ml'=>1,'table'=>'street',	'value'=>'id','label'=>'value');

$root ['items'] ["address"] = array ('control' => "input", 'type' => "text",   'ml' => 1 );
$root['items']['description']       		= array( 'control'=>"textarea", 'type' =>"editor",     'required'=>'0','ml'=>1) ;
$root ['items'] ["latitude"] = array ('control' => "input", 'type' => "text", 'required' => '1', "default"=>'40.177682' );
$root ['items'] ["longitude"] = array ('control' => "input", 'type' => "text", 'required' => '1' , "default"=>'44.512470');

$root ['items'] ['angle'] = array ('control' => "select", 'default' => 0 );
$root ['items'] ['angle'] ['options'] = array ('type' => 'options' );

$range = range(0, 355,5);
$range = array_flip($range);

foreach ($range as $deg=>&$val)
{
	$val = $deg;
	
}

$root ['items'] ['angle'] ['options'] ['_options'] = $range;
$root ['items'] ['camera_type'] = array ('control' => "select", 'default' => 0, 'required' => 1 );
$root ['items'] ['camera_type'] ['options'] = array ('type' => 'options' );
$root ['items'] ['camera_type'] ['options'] ['_options'] = array (
		'speed' => HelperFunction::trans ( array ('term' => 'speed_camera' ) ), 
		'violation' => HelperFunction::trans ( array ('term' => 'violation_camera' ) ) );
$root['items']['max_speed'] 	 = array('control' => "input", 'type' => "text", 'default'=>0 );
$root ['items'] ['dubleside'] = array ('control' => "select", 'default' => 1,'required' => 1 );
$root ['items'] ['dubleside'] ['options'] = array ('type' => 'options' );
$root ['items'] ['dubleside'] ['options'] ['_options'] = array (
		'3' => HelperFunction::trans ( array ('term' => 'circular' ) ),
		'1' => HelperFunction::trans ( array ('term' => 'one_side' ) ),
		'2' => HelperFunction::trans ( array ('term' => 'dubleside' ) ) );
$root ['items'] ["map"] = array (
			'exclude'=>true,
			'control' => "gmap", 
		    'controls'=>array(
		    		'latitude'=>'latitude',
		    		'longitude'=>'longitude',
		    		'angle'=>'angle',
		    		'DirType'=>'dubleside',
		    		));

$root ['setup'] ['listelements'] = array ('active','city','street', 'address', 'city', 'street', 'angle', 'camera_type','dubleside','max_speed' );
?>
