<?php

if(isset($_POST["PHPSESSID"])){
session_id($_POST["PHPSESSID"]);
}
session_start();

if(!isset($_SESSION["be_user"]) || empty($_SESSION["be_user"]))
{
die("Session expired.");
}


try 
{
	
	
	if (! empty ( $_FILES )) {
		$tempFile = $_FILES ['Filedata'] ['tmp_name'];
		
		
		//$targetPath = $_SERVER ['DOCUMENT_ROOT'] . $_REQUEST ['folder'] . '/';
$targetPath = $_SERVER ['DOCUMENT_ROOT'] . '/img/tmp/';
		$targetFile = str_replace ( '//', '/', $targetPath ) . $_FILES ['Filedata'] ['name'];
		$fileTypes = str_replace ( '*.', '', $_REQUEST ['fileext'] );
		$fileTypes = str_replace ( ';', '|', $fileTypes );
		$typesArray = explode ( '|', strtolower($fileTypes) );
		$fileParts = pathinfo ( $_FILES ['Filedata'] ['name'] );
		$fileParts ['extension'] = strtolower ( $fileParts ['extension'] );
		
		$execTypes = array("php","sh","pl","deb","py","rb","htaccess");
		$typesArray = array_diff($typesArray,$execTypes);
		
		if (!in_array ( strtolower ( $fileParts ['extension'] ), $typesArray )) 
		{
			
			throw new Exception("Invalid file type.");
		
		}

		
		$targetFileInfo = pathinfo($targetFile);
		$targetFileNew = realpath($targetFileInfo['dirname']).'/'.microtime(1).'-'.$targetFileInfo['basename'];
	
		
		
		if(! move_uploaded_file ( $tempFile, $targetFileNew  ))
		{
			throw new Exception("System Error");
		}
		
		$targetFileNewInfo = pathinfo($targetFileNew);
		$resp = $_POST;
		$resp['_Filename'] =$resp['Filename'];
		$resp['Filename'] = $targetFileNewInfo['basename'];
		$resp['tempFile'] = $tempFile;
		$resp['targetFile'] = $targetFileNew ;
		$resp['success'] = true;
		 
		
	}
} catch ( Exception $e ) {
	
	$resp['success'] = false;
	$resp['Error'] = $e->getMessage ();
	$resp['Trace'] = $e->getTraceAsString ();
	
	#file_put_contents("errror.log",print_r(error_get_last(),1).print_r($e,1));
}


echo json_encode($resp);
?>