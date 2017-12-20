<?php
function __autoload($class_name)
{
	
	$libDir = ROOT_DIR . "/cls/";
	$all = scandir ( $libDir );
	$all = array_diff($all,array('.','..'));
	$require = $class_name . '.class.php';
	
	if (in_array ( $require, $all ))
	{
		require_once ($libDir . $require);
	}else
	{
		$libDir = ROOT_DIR . "/cls/content/";
		$all = scandir ( $libDir );
		$all = array_diff($all,array('.','..'));
		$require = $class_name . '.class.php';
		
		if (in_array ( $require, $all ))
			require_once ($libDir . $require);
	}
}
function mkLinkAdmin($string, $array) {
	return $string . "?" . http_build_query ( $array );
}
function ss($Str, &$smarty) {
	if (get_magic_quotes_gpc ())
		$Str = stripslashes ( $Str );
	return $Str;
}
function TranslateStr($Str) {
	if (get_magic_quotes_gpc ())
		$Str = stripslashes ( $Str );
	return $Str;
}
function convertAlpha($str) {
	$str = trim ( $str );
	$str = mb_strtoupper ( $str );
	$str = preg_replace ( '/[^A-Z0-9_]/', '', $str );
	return $str;

}
function convertUrl($str)
{
	
    $str = trim ( $str );
	$str = mb_strtolower ( $str );
	$str = str_replace ( " ", '-', $str );
	$str = preg_replace ( '/(-){1,}/', '-', $str );
	$str = preg_replace ( '/[^a-z0-9\-_]/', '', $str );
	$strArray = explode("-",$str) ;
	$lasts = array();
	$last = $strArray[count($strArray)-1];
	
	
	
	while (is_numeric($last))
	{
		$lasts[] = $last;
		array_pop($strArray);
		$last = $strArray[count($strArray)-1];
		
		
		
	}
	
	if(!empty($lasts))
	{
			$lasts = array_reverse($lasts);
			$lasts = implode("_",$lasts);
			$str = implode("-",$strArray);
			$str = $str."_".$lasts;
			
	}
	
	
	$str = trim($str,"_ - ");
	return $str;

}
function checkUsername($username) {
	if (! preg_match ( "/[^a-z,A-Z,0-9\-\_]/", $username )) {
		return $username;
	
	}
	return '__FALSE__';
}
function mkPassword($password) {
	
	if (preg_match ( "/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $password )) {
		return $password;
	} else {
		return '__FALSE__';
	}

}
function trans($params, &$smarty) {
	return $params ['key'];
}
function exception_error_handler($errno, $errstr, $errfile, $errline) 
{
	if ($errno != 8) {		
		
	$filename = ROOT_DIR."/error_log/log.csv"; 
    //first, obtain the data initially present in the text file 
    if(!file_exists($filename))
    file_put_contents($filename,'                        ');
    $ini_handle = fopen($filename, "r"); 
    $ini_contents = fread($ini_handle, filesize($filename)); 
    fclose($ini_handle); 
    //done obtaining initially present data 
   
    //write new data to the file, along with the old data 
    $handle = fopen($filename, "w+"); 
    if($errno == 2048)
    return ;
    $errstr = str_replace("\n",'',$errstr);
        $writestring = date ( "[d.m.y H:i:s]" ) . ",$errno,$errstr,$errfile , $errline\r\n" . $ini_contents; 
        if (fwrite($handle, $writestring) === false) { 
            echo "Cannot write to text file. <br />";           
        } 
    fclose($handle); 				
	}
}
function numericRange($start, $end, $step = 1) {
	$renage = range ( $start, $end, $step );
	$rrenage = array ();
	foreach ( $renage as $value ) {
		$rrenage [$value] = $value;
	}
	
	return $rrenage;
}
function sImplode($array, $glue = "") {
	$array = implode ( $glue, $array );
	return $array;
}
function sExplode($array, $glue = "") {
	$array = explode ( $glue, $array );
	return $array;
}
function myPush($params, &$smarty) {
	extract ( $params );
	
	if (! is_array ( $mYarray ))
		$array = array ();
	if (! isset ( $_item ['group'] ))
		$group = 'public';
	
	else {
		$group = $_item ['group'];
	}
	
	if (! isset ( $mYarray [$group] )) {
		$mYarray [$group] = array ();
	}
	
	$mYarray [$group] [] = $_element;
	
	$smarty->assign ( $assign, $mYarray );
}
function tplExist($tplFile) {
	global $smarty;
	return $smarty->template_exists ( $tplFile );
}
function checkDateStr($str)
{
	list($d,$m,$y) = explode("/",$str);
	$time = mktime(0,0,0,$m,$d,$y);
    return date('Y-m-d',$time);
	
}
function IdMaker($id)
{
	return sprintf ("TI%'03s\n",  $id); 
}
function range_price($start,$end,$step=1,$prefix="$",$postfix="")
{
	
	$renage = range ( $start, $end, $step );
	$rrenage = array ();
	foreach ( $renage as $value ) {
		$rrenage [$value] = $prefix.number_format($value,0," ",",").$postfix;
	}
	
	return $rrenage;
}
function my_array_push(&$array,$key)
{
	if(!is_array($array))
	{	
		if($array)
		{
			$tmp = $array;
			$array = array();
			$array[] = $tmp;
		}else
		{
			$array  =array() ;	
		}
		

		
	}
		
	array_push($array,$key);
	
	return $array;
}
?>