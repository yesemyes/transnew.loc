<?

$root['setup']                 = array('table'=>'newsletter','view'=>'getList', 'labelfield'=>'value');
$root['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']["name"]   	   = array( 'control'=>"input", 'type'=>"text" , 'required'=>'1');
$root['items']["email"]  	   = array( 'control'=>"input", 'type'=>"text" , 'required'=>'1','unique'=>1 );
$root[ 'items']['date']               = array(  'control'=>"datepicker" , 'required'=>1);  
$root['setup']['listelements'] = array_keys($root['items']);
?>
