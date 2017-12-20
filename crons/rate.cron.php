<?php 
date_default_timezone_set('Asia/Yerevan' );
error_reporting ( 0 );
include dirname ( __FILE__ ) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR.'inc/initf.php';
function curl_download($Url) {
	
	// is cURL installed yet?
	if (! function_exists ( 'curl_init' )) {
		die ( 'Sorry cURL is not installed!' );
	}
	
	// OK cool - then let's create a new cURL resource handle
	$ch = curl_init ();
	
	// Now set some options (most are optional)
	
	// Set URL to download
	curl_setopt ( $ch, CURLOPT_URL, $Url );
	
	// Set a referer
	curl_setopt ( $ch, CURLOPT_REFERER, "http://www.topcars.am/updater/" );
	
	// User agent
	curl_setopt ( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:8.0) Gecko/20100101 Firefox/8.0" );
	
	// Include header in result? (0 = yes, 1 = no)
	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	
	// Should cURL return or print out the data? (true = return, false = print)
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
	
	// Timeout in seconds
	curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );
	
	// Download the given URL, and return output
	$output = curl_exec ( $ch );
	
	// Close the cURL resource, and free system resources
	curl_close ( $ch );
	
	return $output;
}



$db =  db::getInstance();

$currency = '';
$query = " SELECT * FROM currency WHERE active ";
$return = array ();

if ($db->multi_query ( $query )) {
	do {
		/*
		 * store first result set
		 */
		if ($result = $db->store_result ()) {
			while ( $row = $result->fetch_assoc () ) {
				$return [$row ['iso']] = $row;
			}
			$result->free ();
		}
		/*
		 * print divider
		 */
	
	} while ( $db->next_result () );
} else {
	printf ( "Error message: %s\n", $db->error );
	die ();
}

$request ['ISO'] = array_keys ( $return );

$request ['view'] = "XML";

$queryStr = http_build_query ( $request );

$url = "http://api.studio-one.am/reates-reader.php?$queryStr";
$data = curl_download ( $url );
$xml = simplexml_load_string ( $data );
/*
 * currency,date,value
 */
if (! $xml) {
	die ( " Error" );
}

foreach ( $xml as $node ) {
	//
	$iso = ( string ) $node->iso;
	
	$currency = $return [$iso] ['id'];
	$value = $node->rate;
	$date = date ( 'Y-m-d H:i:s' );
	$rates [$iso] = $node->rate;
	$INSERT [] = " INSERT INTO `rates` (`active`,`currency`,`date`,`value`) VALUES ('1','$currency','$date','$value')";
}
$INSERT [] = " INSERT INTO `rates` (`active`,`currency`,`date`,`value`) VALUES ('1','5','$date','1')";
$INSERT [] = " UPDATE `config` SET `value`='{$rates['EUR']}' WHERE `name`='EUR_RATE' ";
$INSERT [] = " UPDATE `config` SET `value`='{$rates['USD']}' WHERE `name`='USD_RATE' ";
$insertQuery = implode ( ";\r\n", $INSERT );
foreach($INSERT as $q)
{
	//printf "\n$q\n";
	if(($res= $db->query($q))!= false )
	{
		printf($db->error);
		 
	}
}
$db->close();
?>