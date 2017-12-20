<?
	$root ['setup']= array('table'=>'users-groups','view'=>'getTree','maxLevels'=>2,'labelfield'=>'name');
	
	$root['items']['pid']  						= array('control'=>"select-pid-tree" ,'type'=>'pid','default'=>0);
	$root['items']['pid']['options']			= array('type'=>'database-tree','table'=>'users-groups','value'=>'id','label'=>'name');
	$root ['items']["name"] =array( 'control'=>"input", 'type'=>"text" , 'required'=>'1');

?>
