<?
$root['setup']                                              = array( 'table'=>'pddtest','view'=>'getList', 'labelfield'=>'value',);
$root['items']['active']                                    = array( 'control'=>"input" ,'type'=>'checkbox','default'=>1);
$root['items']["title"]    	                                = array( 'control'=>"input", 'type'=>"text" ,'required'=>'1', 'ml'=>1);
$root['items']['tickets']          	= array('control'=>"checbox-group", 'required'=>'1','rel'=>1);
$root['items']['tickets']['options'] =array('type'=>'database','table'=>'pddticket','value'=>'id','label'=>'label', "order"=>"CONVERT(REPLACE(`label`,'_','.') , DECIMAL(10,2))  ASC");
?>