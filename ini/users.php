<?

$root['setup']= array('table'=>'users','view'=>'getList','labelfield'=>'name');
$root['items']["name"]  =array( 'control'=>"input", 'type'=>"text" , 'required'=>'1');
$root['items']["login"] =array( 'control'=>"input", 'type'=>"text" , 'required'=>'1','unique'=>1);
$root['items']["group"]            =
array( 'control'=>"select-tree",'select_control'=>'radio','max_level'=>'2','select_levels'=>array(1), 'required'=>'1');		 
$root['items']["group"]['options'] = array('type'=>'database-tree','table'=>'users-groups','value'=>'id','label'=>'name');
		
$root['items']["password"] =array('control'=>"input", 
								  'type'=>"password",
                                  'FILTER_VAR'=> array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'mkPassword')) 
				  	);
			

$root['setup']['listelements'] = array_keys($root['items']);
$root['setup']['where'] = " `group` != 0 ";
?>
