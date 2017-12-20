<?

$root['setup']                              = array( 'table'=>'adsgroup','view'=>'getList', 'labelfield'=>'value',);
$root['items']['active']                    = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']['count_ads_in_group']        = array( 'control'=>"input" ,'type'=>'text'    ,'default'=>1 );
$root['items']["alias"]    	                = array( 'control'=>"input", 'type'=>"text",'unique'=>1 ,'required'=>'1') ;
$root['items']['alias']['FILTER_VAR']       = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'convertUrl' ));
$root['items']["name"]    	                = array( 'control'=>"input", 'type'=>"text" ,'required'=>'1', 'ml'=>1);
$root['setup']['listelements']              = array_keys($root['items']);
$root['items']['count_ads_in_group']['FILTER_VAR']          = array('FILTER'=>FILTER_VALIDATE_INT);
?>
