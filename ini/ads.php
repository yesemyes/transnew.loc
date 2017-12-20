<?
$root['setup']                                              = array( 'table'=>'ads','view'=>'getList', 'labelfield'=>'value',);
$root['items']['active']                                    = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );

$root['items']["image"]        		  					    = array('control'=>"input"   ,'type'=>"fileImage" ,'fileExt'=>'*.gif;*.jpg;*.png;*.jpeg','resize'=>array('thumb'=>1024));
$root['items']["href"]    	                                = array( 'control'=>"input", 'type'=>"text" );
$root['items']["title"]    	                                = array( 'control'=>"input", 'type'=>"text" ,'required'=>'1', 'ml'=>1);

$root['items']["href"]['FILTER_VAR']      					=array( 'FILTER'=>FILTER_VALIDATE_URL);

$root['items']["description"]                               = array( 'control'=>"textarea",   'type' =>"editor",'ml'=>1);

$root['items']['group']                                     = array('control'=>"select" ,'default'=>0,'required'=>1);
$root['items']['group']['options']                          = array('type'=>'database','ml'=>1,'table'=>'adsgroup','value'=>'id','label'=>'name');


$root['items']['menu']          = array('control'=>"select-tree",'select_control'=>'checkbox','max_level'=>'3','select_levels'=>array(0,1,2), 'required'=>'1','rel'=>1);
$root['items']['menu']['options'] =array('type'=>'database-tree','table'=>'menu','value'=>'id','label'=>'label');

$root['items']['srtat_date']               		            = array( 'control'=>"datepicker",'required'=>'0',);  
$root['items']['end_date']               			         = array( 'control'=>"datepicker",'required'=>'0',);  

$root['items']['srtat_date']['FILTER_VAR'] = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'checkDateStr' ) );
$root['items']['end_date']['FILTER_VAR'] = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'checkDateStr' ) );

$root['items']['max_view_qty']        				        = array( 'control'=>"input" ,'type'=>'text'    ,'default'=>0 );
$root['items']['views_qty']        				            = array( 'control'=>"input" ,'type'=>'text'    ,'default'=>0 );

$root['items']['max_view_qty']['FILTER_VAR']                = array('FILTER'=>FILTER_VALIDATE_INT);
$root['items']['views_qty']['FILTER_VAR']                   = array('FILTER'=>FILTER_VALIDATE_INT);
$root['setup']['listelements']              				= array_keys($root['items']);
?>