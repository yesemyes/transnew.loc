<?

$root['setup']            = array('table'=>'config','view'=>'getList', 'labelfield'=>'name','order'=>'position');
$root['items']["name"]     =array( 'control'=>"input", 'type'=>"text" , 'required'=>'1','unique'=>1 );
$root['items']["value"]    =array('control'=>"input", 'type'=>"text" ,'required'=>'1');
$root['setup']['listelements'] = array_keys($root['items']);
?>
