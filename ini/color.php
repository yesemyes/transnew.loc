<?

$root['setup']                 = array('table'=>'color','view'=>'getList', 'labelfield'=>'value','order'=>'position');
$root['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']["value"]    	   =array('control'=>"input"   , 'type'=>"text"   ,'required'=>'1', 'ml'=>1);
$root['items']["hexcode"]    	   =array('control'=>"input"   , 'type'=>"text"  );


$root['setup']['listelements'] = array_keys($root['items']);
?>
