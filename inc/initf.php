<?php
error_reporting(0);

date_default_timezone_set('Europe/Moscow') ;
header("Content-Type: text/html; charset=utf-8");
$incDir = realpath(dirname(__FILE__))."/";
$rootDir = realpath(dirname(__FILE__)."/../");
define('INC_DIR',$incDir);
define('ROOT_DIR',$rootDir);


define('THEM_URL',DIRECTORY_SEPARATOR);

require_once(INC_DIR.'functions.php');
require_once(INC_DIR.'insert.inc');
require_once(ROOT_DIR.'/cls/AutoLoader.class.php');


$AutoLoader  = new AutoLoader();
$old_error_handler = set_error_handler("exception_error_handler");
$smarty = new Smarty();
#$smarty->debugging = true;
$smarty->cache_lifetime = 180;
$smarty->cache_dir = $rootDir."/cache";;
$smarty->template_dir =$rootDir."/template";
$smarty->compile_dir =$rootDir."/template_c";
Helper::register($smarty);