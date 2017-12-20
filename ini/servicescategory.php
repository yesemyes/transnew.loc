<?

$root['setup']                       = array('table'=>'servicescategory','view'=>'getList','labelfield'=>'name',);
$root['items']['active']             = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']['home']             = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']["alias"]              =array( 'control'   =>"input", 'type'=>"text",'unique'=>1 ,'required'=>'1', 
				    						'FILTER_VAR'=> array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'convertUrl' )));
$root['items']["name"]               =array( 'control'=>"input", 'type'=>"text" , 'required'=>'1' , 'ml'=>1);
$root['setup']['listelements']       = array_keys($root['items']);
?>
