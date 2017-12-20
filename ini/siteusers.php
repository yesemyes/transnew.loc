<?

$root['setup']= array('table'=>'siteusers','view'=>'getList','labelfield'=>'name');
$root['items']['active']    		    	= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']['confirmed']    		    	= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']['confirm_code']    	    	= array( 'control'=>"input", 'type'=>"text"  );
$root['items']["name"]   					= array( 'control'=>"input", 'type'=>"text" , 'required'=>'1');
$root['items']["email"]  					= array( 'control'=>"input", 'type'=>"text" , 'required'=>'1','unique'=>1 );
$root['items']["login"]  					= array( 'control'=>"input", 'type'=>"text" , 'required'=>'1','unique'=>1);
$root['items']["phone1"]  					= array( 'control'=>"input", 'type'=>"text" );
$root['items']["phone2"]  					= array( 'control'=>"input", 'type'=>"text" );
$root['items']["password"]              	= array('control'=>"input",  'type'=>"password");
$root[ 'items']['regdate']              	= array(  'control'=>"datepicker",'required'=>'1');  
$root['items']['dealer']    		    	= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0,'group'=>'dealer');
$root['items']['brand']            			= array('control'=>"checbox-group",'group'=>'dealer','where'=>'pid=0','rel'=>array('table'=>'brandmodel','value'=>'id','label'=>'label') );


$root['items']['data_currentcar_brand'] 						= array('control'=>"select" ,'default'=>0);
$root['items']['data_currentcar_brand_model'] 				    = array('control'=>"select" ,'default'=>0);

$root['items']['data_dream_brand'] 						        = array('control'=>"select" ,'default'=>0);
$root['items']['data_dream_model'] 				        		= array('control'=>"select" ,'default'=>0);



$root['items']['addres']       				= array( 'control'=>"textarea", 'type' =>"no-editor", 'group'=>'dealer','ml'=>1) ;
$root['items']['description']       		= array( 'control'=>"textarea", 'type' =>"no-editor", 'group'=>'dealer','ml'=>1) ;
$root['items']["password"]['FILTER_VAR'] = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'mkPassword')) ;
$root['items']["email"]['FILTER_VAR']    = array('FILTER'=>FILTER_VALIDATE_EMAIL) ;
$root[ 'items']['regdate']['FILTER_VAR'] = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'checkDateStr' ) );
$root['items']['brand']['options']       =array('type'=>'database','table'=>'brandmodel','value'=>'id','label'=>'label','where'=>'pid=0');


$root['items']['data_currentcar_brand']['options']     		=array('type'=>'database'     ,'ml'=>1,'table'=>'brandmodel',	'value'=>'id','label'=>'label','where'=>'pid=0');
$root['items']['data_currentcar_brand_model']['options']      =array('type'=>'database'     ,'depended'=>array('filed'=>'data_currentcar_brand','where'=>'pid'),  'ml'=>1,'table'=>'brandmodel',	'value'=>'id','label'=>'label');

$root['items']['data_dream_brand']['options']     		=array('type'=>'database'     ,'ml'=>1,'table'=>'brandmodel',	'value'=>'id','label'=>'label','where'=>'pid=0');
$root['items']['data_dream_model']['options']           =array('type'=>'database'     ,'depended'=>array('filed'=>'data_dream_brand','where'=>'pid'),  'ml'=>1,'table'=>'brandmodel',	'value'=>'id','label'=>'label');

$root['setup']['listelements'] = array('active','confirmed','dealer','login','name','regdate');

?>
