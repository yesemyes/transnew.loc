<?

$root['setup']                 = array('table'=>'rates','view'=>'getList', 'labelfield'=>'value',);
$root['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']['currency']     = array('control'=>"select" ,'default'=>0);
$root['items']["value"]    	   =array('control'=>"input", 'type'=>"text" ,'required'=>'1');
$root[ 'items']['date']               = array(  'control'=>"datepicker");  

$root['items']['currency']['options'] =array('type'=>'database','table'=>'currency','value'=>'id','label'=>'iso');
$root[ 'items']['date']['FILTER_VAR'] = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'checkDateStr' ) );

$root['setup']['listelements'] = array_keys($root['items']);
?>
