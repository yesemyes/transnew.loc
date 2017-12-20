<?
error_reporting(E_ALL);
session_start();
?>
<img src="<?=dirname(__FILE__);?>/?<?php echo session_name()?>=<?php echo session_id()?>" id="captchaImg">
