<?
	$root['setup']			              = array('table'=>'options','view'=>'getTree','maxLevels'=>3,'labelfield'=>'label','order'=>'position');
	$root['items']['active']       		  = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
	$root['items']['alias']               = array( 'control'=>"input", 'type'=>"text", 'required'=>'1','unique'=>1 ,);
	$root['items']['alias']['FILTER_VAR'] = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'convertUrl' ));
	$root['items']['label']               = array( 'control'=>"input", 'type'=>"text", 'required'=>1,'ml'=>1);
	$root['items']['pid']                 = array('control'=>"select-pid-tree" ,'type'=>'pid','default'=>0);
	$root['items']['pid']['options']      =array('type'=>'database-tree','table'=>'options','value'=>'id','label'=>'label');
//	$root['items']['position']            = array('control'=>"select" ,'default'=>0);
//	$root['items']['position']['options'] =array('type'=>'database','ml'=>1,'table'=>'options','value'=>'id','label'=>'label','thislevel'=>1);
	
	
?>