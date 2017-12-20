<?
$root['setup']=array('table'=>'k_cent','view'=>'getList','labelfield'=>'title');

$root[ 'items']['alias'] = array(  'control'    =>"input",'type'		=>"text",'unique'     =>1 , 
'FILTER_VAR' => array('FILTER'=>FILTER_CALLBACK,'OPTIONS'=>array('options'=>'convertUrl' )));
$root['items']["title"]               = array( 'control'=>"input", 'type'=>"text" ,'ml'=>1,'required'=>1);				  
$root['items']["k_cent"]               = array( 'control'=>"input", 'type'=>"text" ,'required'=>1);
$root ['items'] ['calculator'] = array ('control' => "select", 'default' => 0, 'required' => 1 );
$root ['items'] ['calculator'] ['options'] = array ('type' => 'database', 'ml' => 1, 'table' => 'calculators', 'value' => 'id', 'label' => 'title' );

$root['setup']['listelements']        = array('title','k_cent');

?>