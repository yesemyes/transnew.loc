<?

$root['setup']                 = array('table'=>'currency','view'=>'getList', 'labelfield'=>'iso','order'=>'position');
$root['items']['active']       = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
$root['items']['iso']          = array( 'control'=>"input", 'type'=>"text",'unique'=>1 ,'required'=>'1') ;
$root['items']["value"]    	   =array('control'=>"input", 'type'=>"text" ,'required'=>'1', 'ml'=>1);
$root['items']["image"]        =array('control'=>"input",   'type'=>"fileImage" ,  'fileExt'=>'*.gif;*.jpg;*.png;*.jpeg',     'resize'=>array('image'=>16));
//$root['items']['position']            = array('control'=>"select" ,'default'=>0);
//$root['items']['position']['options'] =array('type'=>'database','ml'=>1,'table'=>$root['setup']['table'],'value'=>'id','label'=>$root['setup']['labelfield']);
$root['setup']['listelements'] = array_keys($root['items']);
?>
