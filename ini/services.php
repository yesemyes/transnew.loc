<?php
$root['setup']=array
  		 (
  			 'table'=>'services',
  		 	 'view'=>'getList',
  		     'labelfield'=>'alias',
  		      'order'	 =>'position ASC',
  		 );


$root['items']['active']    		  = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
		 
$root[ 'items'][ 'alias' ] = array( 
				                   'control'    =>"input",
				                   'type'       =>"text",
				                   'unique'     =>1 ,
				                   'required'   =>'1', 
				                   'FILTER_VAR' => array
				                    			  (
				                                  'FILTER'=>FILTER_CALLBACK,
				                                  'OPTIONS'=>array('options'=>'convertUrl' )	
				                                  )		 
				  );
				  


  
$db = db::getInstance();
$transportPage =$db->getRow('menu',"*","`alias` LIKE 'transport'");
$transportPagePid = $transportPage['id'];

$root['items']['servicescategory']            = array('control'=>"select" ,'default'=>0,'required'=>1);
$root['items']['servicescategory']['options'] =array('type'=>'database','ml'=>1,'table'=>'menu','value'=>'id','label'=>'label',"where"=>"pid=$transportPagePid");
$root['items']['sub_servicescategory'] 				= array('control'=>"select" ,'default'=>0);
$root['items']['sub_servicescategory']['options']      =array('type'=>'database'     ,'depended'=>array('filed'=>'servicescategory','where'=>'pid'),  'ml'=>1,'table'=>'menu',	'value'=>'id','label'=>'label');
$root ['items'] ["image"] = array ('control' => "input", 'type' => "fileImage", 'fileExt' => '*.gif;*.jpg;*.jpeg;*.png;*.jpeg', 'resize'=>array('thumb'=>80,'small'=>200,'middle'=>400,'big'=>800));
$root['items']  ["images"]= array('control'=>"input"      ,'rel'=>1    ,'fileExt'=>'*.gif;*.jpg;*.png;*.jpeg'                  ,'type'=>"fileImage" ,"multiple"=>true,      'resize'=>array('thumb'=>117,'small'=>200,'middle'=>400,'big'=>800));
$root ['items'] ["logo"] = array ('control' => "input", 'type' => "fileImage", 'fileExt' => '*.gif;*.jpg;*.jpeg;*.png;*.jpeg', 'resize' => array ('thumb'=>80,'big'=>393 ) );
$root['items'] [ 'title' ]                    =array( 'control'=>"input", 'type'=>"text" ,'ml'=>1,'required'=>1);
$root[ 'items'][ 'addres'  ]               = array(  'control'=>"textarea",   'type' =>"editor", 'required'=>'1','ml'=>1);
$root ['items'] ['date'] = array ('control' => "datepicker", 'required' => 1 );
$root ['items'] ['date'] ['FILTER_VAR'] = array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'checkDateStr' ) );

$root[ 'items'][ 'email'  ]               = array(  'control'=>"input", 'type'=>"text",   'required'=>'1');
$root[ 'items'][ 'phone'  ]               = array(  'control'=>"input", 'type'=>"text",  );
$root[ 'items'][ 'phone1'  ]               = array(  'control'=>"input", 'type'=>"text",  );
$root[ 'items'][ 'url'  ]               = array(  'control'=>"input", 'type'=>"text" );
$root[ 'items'][ 'description']             = array(  'control'=>"textarea",   'type' =>"editor", 'required'=>'1','ml'=>1);
$root ['items'] ['work_time'] = array ('control' => "textarea", 'type' => "editor",   'ml' => 1 );
$root['items'] [ 'person_name' ]                    =array( 'control'=>"input", 'type'=>"text"  ,'required'=>0);
$root['items'] [ 'person_phone' ]                    =array( 'control'=>"input", 'type'=>"text"  ,'required'=>0);
$root['items'] [ 'person_email' ]                    =array( 'control'=>"input", 'type'=>"text"  ,'required'=>0);
$root['items']['customer']            = array('control'=>"select" ,'default'=>0);
$root['items']['customer']['options'] =array('type'=>'database','ml'=>0,'table'=>'siteusers','value'=>'id','label'=>array('name','email'));
$root ['items'] ["latitude"] = array ('control' => "input", 'type' => "text", 'required' => '0', "default" => '40.177682' );
$root ['items'] ["longitude"] = array ('control' => "input", 'type' => "text", 'required' => '0', "default" => '44.512470' );
$root ['items'] ["map"] = array ('exclude' => true, 'control' => "gmap", 'controls' => array ('latitude' => 'latitude', 'longitude' => 'longitude' ) );


$root['setup']['listelements'] = array('active','date','title',"servicescategory",'addres','customer');
?>