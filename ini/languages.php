<?

$root = array(
'setup'=> array('table'=>'languages','view'=>'getList','labelfield'=>'name'),
'items' =>array(
			"active"   =>array(  'control'=>"input" ,'type'=>"checkbox"),
			"default"  =>array('control'=>"input", 'type'=>"checkbox"),
			"code"     =>array('control'=>"input", 'type'=>"text" ,'required'=>'1'),
			"name"     =>array( 'control'=>"input", 'type'=>"text" , 'required'=>'1'),
)
);

$root['setup']['listelements'] = array_keys($root['items']);
?>
