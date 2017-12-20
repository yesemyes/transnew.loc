<?php
error_reporting(0);
date_default_timezone_set('Europe/Moscow') ;
$incDir = realpath(dirname(__FILE__))."/";
$rootDir = realpath(dirname(__FILE__)."/../");

define('INC_DIR',$incDir);
define('ROOT_DIR',$rootDir);
define('INI_DIR',$rootDir."/admin/ini/");
require_once(INC_DIR.'functions.php');
require_once(INC_DIR.'insert.inc');
require_once(ROOT_DIR.'/cls/AutoLoader.class.php');
$AutoLoader  = new AutoLoader();
$old_error_handler = set_error_handler("exception_error_handler");
###########SMARTY###############################
$smarty = new Smarty();
$smarty->assign('cookie',$_COOKIE);
$smarty->template_dir =$rootDir."/admin/template";
$smarty->compile_dir =$rootDir."/admin/template_c";
$smarty->register_outputfilter('ss'); 
$smarty->register_modifier('TranslateStr','TranslateStr'); 
$smarty->register_modifier('range','numericRange'); 
$smarty->register_modifier('array_chunk','array_chunk'); 
$smarty->register_function('trans','trans'); 
$smarty->register_function('myPush','myPush'); 
$smarty->register_modifier('repeat','str_repeat'); 
$smarty->register_modifier('tplExist','tplExist'); 
$r = ini_get('session.gc_maxlifetime');
$smarty->assign("SESSION_LIFE_TIME",$r);
$smarty->assign("PANEL_BASE",'/admin/');
Helper::register($smarty);
###########SMARTY###############################
?>