<?

$root['setup']                        = array('table'=>'catalog','view'=>'getList', 'labelfield'=>'name',);
$root['items']['active']              = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']["name"]    	          = array('control'=>"input",  'type'=>"text" ,  'required'=>'1', );


$root['items']['brandmodel']          = array('control'=>"select-tree",'select_control'=>'radio','max_level'=>'2','select_levels'=>array(1), 'required'=>'1');
$root['items']['drive']               = array('control'=>"select" ,'default'=>0);
$root['items']['body']                = array('control'=>"select" ,'default'=>0);
$root['items']['rudder']              = array('control'=>"select" ,'default'=>0);
$root['items']['gearbox']             = array('control'=>"select" ,'default'=>0);
$root['items']['warranty']            = array('control'=>"select" ,'default'=>0);
$root['items']['customs']             = array('control'=>"select" ,'default'=>0);
$root['items']['options']             = array('control'=>"select-tree",'select_control'=>'checkbox','max_level'=>'2','select_levels'=>array(1,2),'rel'=>array('table'=>'options','value'=>'id','label'=>'label'));


$root['items']['brandmodel']['options'] =array('type'=>'database-tree','table'=>'brandmodel','value'=>'id','label'=>'label');
$root['items']['drive']['options']      =array('type'=>'database'     ,'ml'=>1,'table'=>'drive',		'value'=>'id','label'=>'value');
$root['items']['body']['options']       =array('type'=>'database'     ,'ml'=>1,'table'=>'body',		'value'=>'id','label'=>'value');
$root['items']['rudder']['options']     =array('type'=>'database'     ,'ml'=>1,'table'=>'rudder',	'value'=>'id','label'=>'value');
$root['items']['gearbox']['options']    =array('type'=>'database'     ,'ml'=>1,'table'=>'gearbox',	'value'=>'id','label'=>'value');
$root['items']['warranty']['options']   =array('type'=>'database'     ,'ml'=>1,'table'=>'warranty',	'value'=>'id','label'=>'value');
$root['items']['customs']['options']    =array('type'=>'database'     ,'ml'=>1,'table'=>'customs',	'value'=>'id','label'=>'value');
$root['items']['options']['options']    =array('type'=>'database-tree','ml'=>1,'table'=>'options',  'value'=>'id','label'=>'label');






//$root['items']['position']            = array('control'=>"select" ,'default'=>0);
//$root['items']['position']['options'] =array('type'=>'database','table'=>$root['setup']['table'],'value'=>'id','label'=>$root['setup']['labelfield']);
$root['setup']['listelements'] = array_keys($root['items']);


?>
