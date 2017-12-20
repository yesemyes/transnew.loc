<?
$root['setup']=array('table'=>'langdata','view'=>'getList','afterSave'=>'mkLngXML');
$root['items']['name']=array( 'control'=>"input", 'type'=>"text", 'required'=>'1', 
				  			  'FILTER_VAR'=> array
				  						(
				  									'FILTER'=>FILTER_CALLBACK,
				  									'OPTIONS'=>array("options"=>"convertAlpha")
				  	
				  						)		 
				             );
$root['items']['value']=array( 'control'     =>"input", 'type'=>"text", 'required'=>'1', 'ml'=>1,
				  				'FILTER_VAR' => array(	'FILTER'=>FILTER_SANITIZE_STRING)		 
				              );
			              				              				  
?>
