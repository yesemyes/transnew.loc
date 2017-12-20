<?php
ob_start();
ob_clean();
session_start();
// readfile('index.html');
// die();
//$_SERVER['REQUEST_URI'] != '/')

	require_once ("inc/initf.php");
	$request = new front ();
	$request->viewHeaders ();
	$db = db::getInstance ();
	if (isset ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) && $_SERVER ['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') 
	{

	} else {
		$request->instance->currentPage ['ads'] = $request->instance->getPageAds ();
	}

	$request->instance->preBuild();
	$smarty->assign ( 'this', $request->instance );
	$smarty->assign ( 'db', $db );
	$smarty->display ( $request->instance->displayTpl, md5 ( $_SERVER ['REQUEST_URI'] ) );

?>
