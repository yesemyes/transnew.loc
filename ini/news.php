<?php
$root ['setup'] = array ('table' => 'news', 'view' => 'getList', 'labelfield' => 'alias', 'order' => '`id` DESC' );

$root ['items'] ['last'] = array ('control' => "input", 'type' => 'checkbox', 'default' => 1 );
$root ['items'] ['active'] = array ('control' => "input", 'type' => 'checkbox', 'default' => 1 );
$root ['items'] ["images"] = array('control'=>"input",'rel'=>1,'fileExt'=>'*.gif;*.jpg;*.png;*.jpeg','type'=>"fileImage" ,"multiple"=>true,'resize'=>array('thumb'=>100,'slidethumb'=>148,'small'=>200,'middle'=>400,'slide'=>650,'big'=>800));
$root ['items'] ["image"] = array ('control' => "input", 'type' => "fileImage", 'fileExt' => '*.gif;*.jpg;*.jpeg;*.png;*.jpeg', 'resize' => array ('thumb'=>120,'image' => 250,'slide'=>428 ) );
$root ['items'] ["href"] = array ('control' => "input", 'type' => "text");
$root ['items'] ['alias'] = array ('control' => "input", 'type' => "text", 'unique' => 1, 'required' => '1', 'FILTER_VAR' => array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'convertUrl' ) ),"default" => base::autoLink('news','alias',1,'news_prefix')   );
$root ['items'] ['date'] = array ('control' => "datetimepicker", 'type' => 'DateTimepicker', 'required' => 1 );
//$root ['items'] ['date'] = array ('control' => "datepicker", 'required' => 1 );


$db = db::getInstance();
$newsPage =$db->getRow('menu',"*","`alias` LIKE 'news'");
$newsPagePid = $newsPage['id'];
$root ['items'] ['newscategory'] = array ('control' => "select", 'default' => 0, 'required' => 1 );
$root ['items'] ['newscategory'] ['options'] = array ('type' => 'database', 'ml' => 1, 'table' => 'menu', 'value' => 'id', 'label' => 'label',"where"=>"pid=$newsPagePid" );

$root ['items'] ['title'] = array ('control' => "input", 'type' => "text", 'ml' => 1 );
$root ['items'] ['youtube'] = array ('control' => "input", 'type' => "text");
//$root ['items'] ['subtitle'] = array ('control' => "input", 'type' => "text", 'ml' => 1 );
$root ['items'] ['date'] ['FILTER_VAR'] = array ('FILTER' => FILTER_CALLBACK, 'OPTIONS' => array ('options' => 'checkTimeDateStr' ) );
$root['items']["href"]['FILTER_VAR'] =array( 'FILTER'=>FILTER_VALIDATE_URL);
//$root ['items'] ['small'] = array ('control' => "textarea", 'type' => "editor", 'ml' => 1,);
$root ['items'] ['content'] = array ('control' => "textarea", 'type' => "editor", 'ml' => 1);

$root ['setup'] ['listelements'] = array ('last','alias' ,'active', 'date', 'title');
?>