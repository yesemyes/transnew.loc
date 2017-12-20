<?php /* Smarty version 2.6.26, created on 2013-08-10 19:43:27
         compiled from ../../index2.php */ ?>
<?php echo '<?php'; ?>

	error_reporting(E_ALL);
	ini_set('session.gc_maxlifetime',2*60*60);
	ini_set('session.gc_probability',1);
	ini_set('session.gc_divisor',1);
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	require_once(dirname(__FILE__).'/../inc/init.php');
	$request = new Request();
	$admin = new admin($request);
<?php echo '?>'; ?>