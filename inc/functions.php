<?php
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
function convertUrl($str) {
	$str = trim ( $str );
	$str = mb_strtolower ( $str, 'UTF-8' );
	$str = str_replace ( " ", '-', $str );
	$str = preg_replace ( '/(-){1,}/', '-', $str );
	
	$ralpha = russianAlphabet ();
	$aalpha = armenianAlphabet();
	
	$str = preg_replace ( '/[^a-z0-9' . $aalpha.$ralpha . '\-_]/', '', $str );
	
	$strArray = explode ( "-", $str );
	$lasts = array ();
	
	$last = $strArray [count ( $strArray ) - 1];
	
	while ( is_numeric ( $last ) ) {
		$lasts [] = $last;
		array_pop ( $strArray );
		$last = $strArray [count ( $strArray ) - 1];
	
	}
	
	if (! empty ( $lasts )) {
		$lasts = array_reverse ( $lasts );
		$lasts = implode ( "_", $lasts );
		$str = implode ( "-", $strArray );
		$str = $str . "_" . $lasts;
	
	}
	
	$str = trim ( $str, "_ - " );
// 	if (is_numeric ( $str )) {
// 		$str = $str;
// 	}
	return $str;

}

function russianAlphabet() {

	$return = array ();
	for($i = 176; $i <= 239; ++ $i) {
		$return [] = iconv ( 'ISO-8859-5', 'UTF-8', chr ( $i ) );
	}

	return implode ( '', $return );
}
function armenianAlphabet()
{
	$alphabet [] = iconv ( 'ArmSCII-8', 'UTF-8', chr ( 162 ) );
	$alphabet [] = iconv ( 'ArmSCII-8', 'UTF-8', chr ( 166 ) );
	$alphabet [] = iconv ( 'ArmSCII-8', 'UTF-8', chr ( 167 ) );
	for($i = 178; $i < 254; $i ++) {
		$alphabet [] = iconv ( 'ArmSCII-8', 'UTF-8', chr ( $i ) );

	}
	return implode ( "", $alphabet );
}
function checkUsername($username) {
	if (! preg_match ( '/[^a-z,A-Z,0-9\-\_]/isu', $username )) {
		return $username;
	
	}
	return '__FALSE__';
}
function mkPassword($password) {
	
	if (preg_match ( '/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/isu', $password )) {
		return $password;
	} else {
		return '__FALSE__';
	}

}
function trans($params, &$smarty) {
	return $params ['key'];
}
function _exception_error_handler($errno, $errstr, $errfile, $errline) 
{
    if ($errno == 8) 
        return false;
    $filename = ROOT_DIR."/error_log/log".date("d-m-y-H").".csv"; 
    $handle = fopen($filename, "a+"); 
	$writestring = date ( "[d.m.y H:i:s]" ) . ";$errno;$errstr;$errfile ;$errline\r\n"; 
	fwrite($handle, $writestring);
    fclose($handle); 				
}

function exception_error_handler($errno, $errstr, $errfile, $errline) {
	try {
		$handle = fopen(ROOT_DIR.'/error_log/php/error.log','r+');
		$i = 0;
		$str = "";
		while (($buffer = fgets($handle))) {
			$i++;
			$str .= $buffer;
			if($i==9999){ // lines count
				break;
			}
		}
		fclose($handle);
		if ($errno == 8) 
        return false;
        
		$handle = fopen(ROOT_DIR.'/error_log/php/error.log','w+');
		fwrite($handle, date("[Y-m-d H:i:s],")."$errno, $errstr, $errfile, $errline\r\n" . $str);
		fclose($handle);
		
	} catch ( Exception $e ) {
		$e->getTraceAsString ();
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


function getSubsOffersCount($array)
{
	$offerscount = 0;
	
	foreach($array as $soffer)
	{
		$offerscount +=$soffer['offerscount'];
	}
	
	return $offerscount;
}
function checkTimeDateStr($dateTime) {
	if (is_array ( $dateTime )) {
		
		list ( $d, $m, $y ) = explode ( "/", $dateTime ['date'] );
		
		$h = $dateTime ['hours'];
		$i = $dateTime ['minutes'];
		
		$time = mktime ( $h, $i, 0, $m, $d, $y );
		
		return date ( 'Y-m-d H:i:s', $time );
	}
	return date ( 'Y-m-d H:i:s' );
}
?>