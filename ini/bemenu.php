<?
	$root['setup']			        =array('table'=>'bemenu','view'=>'getTree','maxLevels'=>2,'labelfield'=>'label');
	$root['items']['name']          = array( 'control'=>"input", 'type'=>"text", 'required'=>'1');
	$root['items']['label']         = array( 'control'=>"input", 'type'=>"text", 'required'=>'1','ml'=>1);
	$root['items']['pid']           = array('control'=>"select-pid-tree" ,'type'=>'pid','default'=>0);
	$root['items']['pid']['options']=array('type'=>'database-tree','table'=>'bemenu','value'=>'id','label'=>'name');
	
//	$root['items']['position']            = array('control'=>"select" ,'default'=>0);
//	$root['items']['position']['options'] =array('type'=>'database','ml'=>1,'table'=>'bemenu','value'=>'id','label'=>'label','thislevel'=>1);


?>