<?
$root['setup']=array
  		 (
  			 'table'=>'text',
  		 	 'view'=>'getList',
  		     'labelfield'=>'alias'
  		 );

$root[ 'items']['alias'] = array( 
				                   'control'    =>"input",
				                   'type'		=>"text",
				                   'unique'     =>1 ,
				                   'required'   =>'1', 
				                   'FILTER_VAR' => array
				                    			(
				                                  'FILTER'=>FILTER_CALLBACK,
				                                  'OPTIONS'=>array('options'=>'convertUrl' )	
				                                )		 
				  );
$root['items']["title"]               = array( 'control'=>"input", 'type'=>"text" ,'ml'=>1,'required'=>1);				  
$root[ 'items'][ 'content']           = array(  'control'=>"textarea",   'type' =>"editor", 'required'=>'1','ml'=>1);
$root['setup']['listelements']        = array_keys($root['items']);

?>