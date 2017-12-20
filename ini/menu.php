<?php

$root['setup']								= array( 'table'	 =>'menu', 	 'view'		 =>'getTree',    'maxLevels' =>3, 'labelfield'=>'label','afterSave'=>'breandPathBuilder' );
$root['setup']['listelements'] 				= array( 'label',   'active',   'topmenu',	   'position'   );
$root['items']['active']      				= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 ); 		 
$root['items']['noindex']      				= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0,'group'=>'seo' ); 		 
$root['items']['topmenu']  					= array('control'=>"select" ,'default'=>0);
$root['items']['private']     				= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 ); 		 
$root['items']['bottommenu']  				= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 ); 		 
$root['items']['alias']       				= array( 'control'=>"input", 'type'=>"text",'unique'=>1 ,'required'=>'1') ;
$root['items']['href']                      = array ('control' => "input", 'type' => "text");

$root['items']['label']       				= array( 'control'=>"input", 'type'=>"text", 'required'=>'1','ml'=>1) ;
$root['items']['title']       				= array( 'control'=>"input", 'type'=>"text", 'group'=>'seo',  'ml'=>1) ;
$root['items']['description']       		= array( 'control'=>"textarea", 'type' =>"no-editor", 'group'=>'seo',   'required'=>'0','ml'=>1) ;
$root['items']['keyword']       			= array( 'control'=>"textarea", 'type' =>"no-editor", 'group'=>'seo',   'required'=>'0','ml'=>1) ;
$root['items']['content']       			= array( 'control'=>"textarea",   'type' =>"editor", 'required'=>'1','ml'=>1) ;

$root['items']['alias']['FILTER_VAR']       = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'convertUrl' ));
$root['items']['label']['FILTER_VAR']       = array('FILTER'=>FILTER_SANITIZE_STRING,'OPTIONS'=>array('options'=>FILTER_FLAG_NO_ENCODE_QUOTES) );
$root['items']['title']['FILTER_VAR']		= array('FILTER'=>FILTER_SANITIZE_STRING,'OPTIONS'=>array('options'=>FILTER_FLAG_NO_ENCODE_QUOTES) );
$root['items']['description']['FILTER_VAR'] = array('FILTER'=>FILTER_SANITIZE_STRING,'OPTIONS'=>array('options'=>FILTER_FLAG_NO_ENCODE_QUOTES) );
$root['items']['keyword']['FILTER_VAR']     = array('FILTER'=>FILTER_SANITIZE_STRING,'OPTIONS'=>array('options'=>FILTER_FLAG_NO_ENCODE_QUOTES) );
$root['items']['href']['FILTER_VAR']        = array( 'FILTER'=>FILTER_VALIDATE_URL);
$root['items']['pid']  						= array('control'=>"select-pid-tree" ,'type'=>'pid','default'=>0);
$root['items']['pid']['options']			= array('type'=>'database-tree','table'=>'menu','value'=>'id','label'=>'label');
$root['items']['topmenu']['options']		= array('type'=>'options');
$root['items']['topmenu']['options']['_options']		= array('left'=>HelperFunction::trans(array('term'=>'Main_menu')) ,'right'=>HelperFunction::trans(array('term'=>'tope_menu')));

?>