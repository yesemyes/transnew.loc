<?
$root['setup']                 = array('table'=>'offers','view'=>'getList', 'labelfield'=>'value','afterSave'=>'updatePrice');

#
#Item Init
#

$root['items']['active']       							= array('control'=>"input"  ,'type'=>'checkbox','default'=>0 );
$root['items']['dealer']    		        			= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['featured']    		        			= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['highlight']    		        			= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['isnew']    		        			    = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['intop']    		        			= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['name']									= array('control'=>"input"  ,'type'=>'text','required'=>'1');
$root['items']["filed_main_image"]= array('control'=>"input"       ,'fileExt'=>'*.gif;*.jpg;*.png;*.jpeg'                  ,'type'=>"fileImage" ,      'resize'=>array('thumb'=>100,'small'=>200,'middle'=>400,'big'=>800));
$root['items']['siteuser'] 								= array('control'=>"select" ,'default'=>0,'required'=>'1');
$root['items']['filed_car_brand'] 						= array('control'=>"select" ,'default'=>0, 'required'=>'1');
$root['items']['filed_car_brand_model'] 				= array('control'=>"select" ,'default'=>0,'required'=>'1');
$root['items']['filed_modification']					= array('control'=>"input"  ,'type'=>'text');
$root['items']['filed_engine'] 							= array('control'=>"input"  ,'type'=>'text','required'=>'1');
$root['items']['filed_engine_power']					= array('control'=>"input"  ,'type'=>'text','default'=>0);
$root['items']['filed_state'] 							= array('control'=>"select" ,'default'=>0);
$root['items']['filed_body'] 							= array('control'=>"select" ,'default'=>0,'required'=>'1');
$root['items']['filed_drive'] 							= array('control'=>"select" ,'default'=>0,'required'=>'1');
$root['items']['filed_rudder'] 							= array('control'=>"select" ,'default'=>0,'required'=>'1');
$root['items']['filed_gearbox']            				= array('control'=>"select" ,'default'=>0,'required'=>'1');
$root['items']['filed_fuel']            				= array('control'=>"select" ,'default'=>0,'required'=>'1');
$root['items']['filed_warranty'] 						= array('control'=>"select" ,'default'=>0);
$root['items']['filed_release_date_year'] 				= array('control'=>"select" ,'default'=>0,'required'=>'1');
$root['items']['filed_release_date_month'] 				= array('control'=>"select" ,'default'=>0);
$root['items']['filed_milage'] 							= array('control'=>"input"  ,'type'=>'text','default'=>0);
$root['items']['filed_milage_kayficent'] 				= array('control'=>"select" ,'default'=>0);
$root['items']['filed_contract']    		        	= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['filed_price'] 							= array('control'=>"input"  ,'type'=>'text','default'=>0);
$root['items']['filed_currency'] 						= array('control'=>"select" ,'default'=>0);
$root['items']['filed_bargaining'] 						= array('control'=>"select" ,'default'=>0);
$root['items']['phone1'] 								= array('control'=>"input"  ,'type'=>'text');
$root['items']['phone2'] 							    = array('control'=>"input"  ,'type'=>'text');
$root['items']['filed_customs'] 						= array('control'=>"select" ,'default'=>0);
$root['items']['filed_color'] 							= array('control'=>"select" ,'default'=>0);
$root['items']['filed_metalic']    		        		= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['filed_duration'] 						= array('control'=>"select" ,'default'=>0);
$root['items']['filed_srtat_date']               		= array( 'control'=>"datepicker");  
$root['items']['filed_end_date']               			= array( 'control'=>"datepicker");  
$root['items']['filed_options'] 						= array('control'=>"select-tree",'select_control'=>'checkbox' ,'max_level'=>'2','select_levels'=>array(1,2),'rel'=>array('table'=>'options','value'=>'id','label'=>'label'));
$root['items']["image"]= array('control'=>"input"      ,'rel'=>1    ,'fileExt'=>'*.gif;*.jpg;*.png;*.jpeg'                  ,'type'=>"fileImage" ,"multiple"=>true,      'resize'=>array('thumb'=>100,'small'=>200,'middle'=>400,'big'=>800));

$root['items']['description']       					= array( 'control'=>"textarea", 'type' =>"no-editor") ;

#
#Item Init
#

#
#Item Config
#
$root['items']['siteuser']['options']     				=array('type'=>'database'     ,'table'=>'siteusers',			'value'=>'id','label'=>'login');
$root['items']['filed_car_brand']['options']     		=array('type'=>'database'     ,'ml'=>1,'table'=>'brandmodel',	'value'=>'id','label'=>'label','where'=>'pid=0');
$root['items']['filed_car_brand_model']['options']      =array('type'=>'database'     ,'depended'=>array('filed'=>'filed_car_brand','where'=>'pid'),  'ml'=>1,'table'=>'brandmodel',	'value'=>'id','label'=>'label');
$root['items']['filed_body']['options']     			=array('type'=>'database'     ,'ml'=>1,'table'=>'body',			'value'=>'id','label'=>'value');
$root['items']['filed_state']['options']     			=array('type'=>'database'     ,'ml'=>1,'table'=>'state',		'value'=>'id','label'=>'value');
$root['items']['filed_milage_kayficent']['options']     =array('type'=>'database'     ,'ml'=>1,'table'=>'milage_kayficent',		'value'=>'kayficent','label'=>'value');
$root['items']['filed_drive']['options']     			=array('type'=>'database'     ,'ml'=>1,'table'=>'drive',		'value'=>'id','label'=>'value');
$root['items']['filed_color']['options']     			=array('type'=>'database'     ,'ml'=>1,'table'=>'color',		'value'=>'id','label'=>'value');
$root['items']['filed_rudder']['options']     			=array('type'=>'database'     ,'ml'=>1,'table'=>'rudder',		'value'=>'id','label'=>'value');
$root['items']['filed_warranty']['options']     		=array('type'=>'database'     ,'ml'=>1,'table'=>'warranty',		'value'=>'id','label'=>'value');
$root['items']['filed_bargaining']['options']     		=array('type'=>'database'     ,'ml'=>1,'table'=>'bargaining',		'value'=>'id','label'=>'value');
$root['items']['filed_duration']['options']     		=array('type'=>'database'     ,'ml'=>1,'table'=>'duration',		'value'=>'id','label'=>'label');
$root['items']['filed_gearbox']['options']    			=array('type'=>'database'     ,'ml'=>1,'table'=>'gearbox',	'value'=>'id','label'=>'value');
$root['items']['filed_fuel']['options']    			=array('type'=>'database'     ,'ml'=>1,'table'=>'fuel',	'value'=>'id','label'=>'value');
$root['items']['filed_release_date_year']['options']    =array('type'=>'options');
$root['items']['filed_release_date_month']['options']   =array('type'=>'options');
$root['items']['filed_currency']['options']     		=array('type'=>'database'     ,'ml'=>1,'table'=>'currency',	'value'=>'id','label'=>'value');
$root['items']['filed_srtat_date']['options']     		=array('type'=>'database'     ,'ml'=>1,'table'=>'color',	'value'=>'id','label'=>'value');
$root['items']['filed_customs']['options']     			=array('type'=>'database'     ,'ml'=>1,'table'=>'customs',	'value'=>'id','label'=>'value');
$root['items']['filed_options']['options']    			=array('type'=>'database-tree','ml'=>1,'table'=>'options',  'value'=>'id','label'=>'label');
$root['items']['filed_release_date_year']['options']['_options']  =numericRange(1900,date('Y'));
$root['items']['filed_release_date_month']['options']['_options'] =numericRange(1,12);
$root['items']['filed_engine'] ['FILTER_VAR']          = array('FILTER'=>FILTER_VALIDATE_FLOAT);
$root['items']['filed_engine_power'] ['FILTER_VAR']          = array('FILTER'=>FILTER_VALIDATE_FLOAT);
$root['items']['filed_milage'] ['FILTER_VAR']          = array('FILTER'=>FILTER_VALIDATE_INT);
$root['items']['filed_price']['FILTER_VAR']       	   = array('FILTER'=>FILTER_VALIDATE_FLOAT);
$root[ 'items']['filed_srtat_date']['FILTER_VAR'] = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'checkDateStr' ) );
$root[ 'items']['filed_end_date']['FILTER_VAR'] = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'checkDateStr' ) );
#
#Item Config
#
$root['setup']['listelements'] = array('active','dealer','highlight','featured','intop','siteuser','filed_car_brand','filed_car_brand_model','filed_srtat_date','filed_price');
?>
