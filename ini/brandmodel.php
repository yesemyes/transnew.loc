<?
	$root['setup']			        = array('table'=>'brandmodel','view'=>'getTree','maxLevels'=>3,'labelfield'=>'label');
	
	
	
	$root['items']['label']         = array( 'control'=>"input", 'type'=>"text", 'required'=>'1' );
	$root['items']['label']['events']['onkeyup'] = "convertAlias(this.value,'brandmodel','alias')";
	$root['items']['alias']         = array( 'control'=>"input", 'type'=>"text", 'required'=>'1','unique'=>1 ,);
	
	$root['items']['is_usssr']    	= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
	$root['items']['active']    	= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
	$root['items']['home']    		= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0 );
	$root['items']["link1"]         = array( 'control'=>"input", 'type'=>"text" );
//    $root['items']["link1"]['FILTER_VAR']      =array( 'FILTER'=>FILTER_VALIDATE_URL);
    $root['items']["link2"] = $root['items']["link1"];
	$root['items']['short']   = 
				  array( 		
				  'control'=>"textarea",   
				  'type' =>"editor",
				  'ml'=>1
				  );
	
	
    
	
	$root['items']['full']=$root['items']['short'];
	$root['items']['full']['required']=0;
	$root['items']["image"]           =array('control'=>"input",   'type'=>"fileImage" ,  'fileExt'=>'*.gif;*.jpg;*.png;*.jpeg',     'resize'=>array('small'=>25,'image'=>140,'big'=>600));
	
	$root['items']["galery"]         = array('control'=>"input" ,'rel'=>1,'type'=>"fileImage" ,'fileExt'=>'*.gif;*.jpg;*.png;*.jpeg', "multiple"=>true,'resize'=>array('thumb'=>100,'small'=>140,'middle'=>400,'big'=>800));
	
	
	$root['items']['pid']           = array('control'=>"select-pid-tree" ,'type'=>'pid','default'=>0);
	$root['items']['pid']['options']=array('type'=>'database-tree','table'=>'brandmodel','value'=>'id','label'=>'label');
	$root['items']['alias']['FILTER_VAR'] = array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'convertUrl' ));
	
?>