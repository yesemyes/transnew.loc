<?
class base {
	public $t1;
	public $t2;
	
	public static $lngdata;
	function __construct($request) {
		$this->t1 = microtime ( 1 );
		$this->LoadLNGXML ( $request ['lng'] );
	
	}
	public function __destruct() {
		$this->t2 = microtime ( 1 );
	
	}
	public static function LoadLNGXML($lng) {
		
		if (file_exists ( ROOT_DIR . "/lng/{$lng}.xml" )) {
			$xml = simplexml_load_file ( ROOT_DIR . "/lng/{$lng}.xml" );
			
			$lngdata = array ();
			foreach ( $xml as $node ) {
				$lngdata [$node->getName ()] = ( string ) $node;
			}
			self::$lngdata = $lngdata;
		}
	}
	public function breandPathBuilder() 
	{
		$breandPathBuilder = new breandPathBuilder();
	}
	public function trans($const) {
		
		return HelperFunction::trans(array('them'=>$const));
	}
	public static function redirect($address) {
		header ( "Location: " . $address );
        exit ();
	}
	static public function mkLngXML(db $db, $id = null) {
		$languages = $db->getArray ( $db->tbl_prefix . 'languages', '*', '', '', '', '', 'code' );
		
		foreach ( $languages as $lng => $data ) {
			$dd = new DOMDocument ( '1.0', 'utf-8' );
			$comment = $dd->createComment ( 'XML DATA CREATED ' . date ( 'Y-m-d H:i:s' ) );
			$dd->appendChild ( $comment );
			$id = $data ['id'];
			$query = "SELECT name,value FROM {$db->tbl_prefix}langdata INNER JOIN {$db->tbl_prefix}langdata_ml using( id ) WHERE lng_id=  $id";
			$res = $db->query ( $query );
			$data = $db->getArray ( "{$db->tbl_prefix}langdata", 'name,value', "lng_id='$id'" );
			$lngRoot = $dd->createElement ( $lng );
			foreach ( $data as $row ) {
				if ($row ['name']) {
					$nodeName = $row ['name'];
					$term = $dd->createElement ( $nodeName );
					$cdatat = $dd->createCDATASection ( $row ['value'] );
					$term->appendChild ( $cdatat );
					$lngRoot->appendChild ( $term );
				}
			}
			
			
			
			$dd->appendChild ( $lngRoot );
			if (file_exists ( ROOT_DIR . "/lng/{$lng}-old.xml" )) {
				@unlink ( ROOT_DIR . "/lng/{$lng}-old.xml" );
			}
			rename ( ROOT_DIR . "/lng/{$lng}.xml", ROOT_DIR . "/lng/{$lng}-old.xml" );
			$baytes = $dd->save ( ROOT_DIR . "/lng/{$lng}.xml" );
		
		}
	}
	public function _mklink() {
		$va = func_get_args ();
		$end = array_pop ( $va );
		$page = "";
		if (is_numeric ( $end ) && ! empty ( $va )) {
			
			$page = "-" . $end;
		} else {
			array_push ( $va, $end );
		}
		
		if ($this->defLng ['default']) {
			$start = "";
		} else {
			$start = $this->defLng ['code'];
			array_unshift ( $va, $start );
		}
		
		$link = implode ( "/", $va );
		// $link = str_replace("\r",$link);
		// $link = str_replace("\n",$link);
		// $link = str_replace("\t",$link);
		return "/{$link}{$page}.html";
	
	}
	
	function _mkLngUrl($params, $path) {
		
		$code = $params ['code'];
		
		$_lngs = array_keys ( $this->languages );
		
		$lng_pattern = implode ( '|', $_lngs );
		
		$pattern = "/($lng_pattern)(.*?)/ius";
		$url2 = preg_replace ( $pattern, '$2', $path );
		$url2 = trim ( $url2, '/ ' );
		if (! $url2) {
			$url2 = 'home.html';
		}
		$url2 = $code . '/' . $url2;
		$path1 = $url2;
		if (! empty ( $_GET )) {
			$path1 = $path1 . "?" . http_build_query ( $_GET );
		}
		return '/' . $path1;
	}
	public function _mkLngUrl2($params, $path) {
		
		$code = $params ['code'];
		$this->languages [$code];
		
		$path = trim ( $path, " /" );
		
		if (strpos ( $path, "/" )) {
			$pathArray = explode ( "/", $path );
		} else {
			$pathArray [] = $code;
			$pathArray [] = $path;
			return "/" . implode ( "/", $pathArray );
		}
		
		if (! empty ( $pathArray )) {
			$first = array_shift ( $pathArray );
			
			if ($first == $code) {
				return "/" . $path;
			} else {
				
				// array_unshift( $pathArray,$first);
				array_unshift ( $pathArray, $code );
				
				return "/" . implode ( "/", $pathArray );
			}
		}
	
	}
	
	public function mklangLink($params, $path) {
		$code = $params ['code'];
		$allCodes = array_keys ( $this->languages );
		$regExp = implode ( "|", $allCodes );
		$regExp = "/\/($regExp)\/(.*?)";
		if (preg_match ( $regExp, $path )) {
		
		}
	
	}
	public function _processPaging($totalFound, $limit, $pagesPerPage, $page = 1) {
		$nextIndex = $prevIndex = $nextPage = $prevPage = null;
		
		$_pagesQty = ceil ( $totalFound / $limit );
		$_pages = range ( 1, $_pagesQty );
		// $_pages = array_flip($_pages);
		$_pagesAll = array_chunk ( $_pages, $pagesPerPage, true );
		
		$pageIndex = floor ( ($page - 1) / $pagesPerPage );
		
		$CurrentPagesArray = $_pagesAll [$pageIndex];
		
		if ($pageIndex < count ( $_pagesAll ) - 1) {
			$nextIndex = $pageIndex + 1;
			$next = current ( $_pagesAll [$nextIndex] );
		
		}
		
		if ($pageIndex > 0) {
			$prevIndex = $pageIndex - 1;
			$prev = end ( $_pagesAll [$prevIndex] );
		
		}
		
		$return = new stdClass ();
		
		$return->_pagesArray = $CurrentPagesArray;
		$return->_pages = $_pages;
		$return->_pagesAll = $_pagesAll;
		$return->nextIndex = $nextIndex;
		$return->prevIndex = $prevIndex;
		$return->pageIndex = $pageIndex;
		$return->_current = $page;
		$return->_next = $next;
		$return->_prev = $prev;
		$return->_total = $_pagesQty;
		
		return $return;
	
	}
	public function _pagingLinkGenreator($params, &$paging) {
		
		// if ($this->defLng['default'])
		// {
		// $start = "";
		// } else
		// {
		// $start = $this->defLng['code'];
		// if(is_array($params))
		// array_unshift($params,$start);
		// }
		//
		$body = implode ( "/", $params );
		
		foreach ( $paging->_pagesArray as $index => $page ) {
			$paging->_pagesArray [$index] = "/" . $body . "-" . ($page) . ".html";
		}
		
		if ($paging->_next) {
			$paging->_next = "/" . $body . "-" . $paging->_next . ".html";
		}
		if ($paging->_prev) {
			$paging->_prev = "/" . $body . "-" . $paging->_prev . ".html";
		}
		
		$paging->_total = "/$body-{$paging->_total}.html";
		$paging->_first = "/$body-1.html";
		
		return $paging;
	}
	static public function imageResize($imageInfo, $size, $upFile, $imageName) {
		$r = base::smart_resize_image ( $upFile, $size, 0, true, $imageName, false );
		if ($r)
			return $imageName;
		else
			return false;
	}
	static public function resizeAndCopy($infile, $size, $output, $folder) {
		$imageInfo = getimagesize ( $infile );
		$Imagetypes = array ('image/gif' => IMAGETYPE_GIF, 'image/jpeg' => IMAGETYPE_JPEG, 'image/jpeg' => IMAGETYPE_JPEG, 'image/png' => IMAGETYPE_PNG );
		$ext = image_type_to_extension ( $Imagetypes [$imageInfo ['mime']] );
		if (! is_dir ( $folder )) {
			mkdir ( $folder, 0777 );
			chmod ( $folder, 0777 );
		}
		
		$output = $output . $ext;
		self::imageResize ( $imageInfo, $size, $infile, $folder . "/" . $output );
		
		return $output;
	
	}
	public function convert_price($price, $currency_code) {
		
		$query = " 
				SELECT  * FROM (
					SELECT 
		                  rates.date as date, 
		                  rates.value as value,
		                 `currency`.`iso` as iso
		                    
		           FROM rates LEFT JOIN 
				   currency ON (`rates`.`currency` = `currency`.`id`)
				   ORDER BY rates.date DESC
				   ) as lastrates
				   GROUP BY lastrates.iso
				   ";
		$rates = $this->db->queryFetch ( $query );
		$rates_code = array ();
		
		foreach ( $rates as $row ) {
			$rates_code [$row ['iso']] = $row ['value'];
		
		}
		
		$price_converted = $price;
		$currency_code_view = "AMD";
		
		if (key_exists ( $currency_code, $rates_code )) {
			$price_converted = $price_converted * ($rates_code [$currency_code]);
		}
		$price_converted = number_format ( $price_converted, 2, ".", "," );
		return "$price_converted $currency_code_view";
	}
	
	public function convert_price_sql_query() {
		
		$query = " 
				SELECT  * FROM (
					SELECT 
		                  rates.date as date, 
		                  rates.value as value,
		                 `currency`.`id` as id
		                    
		           FROM rates LEFT JOIN 
				   currency ON (`rates`.`currency` = `currency`.`id`)
				   ORDER BY rates.date DESC
				   ) as lastrates
				   GROUP BY lastrates.iso
				   ";
		$rates = $this->db->queryFetch ( $query );
		$rates_code = array ();
		
		foreach ( $rates as $row ) {
			$rates_code [$row ['id']] = $row ['value'];
		}
		
		return "$price_converted $currency_code_view";
	}
	static function getExtension($file) {
		$imageInfo = getimagesize ( $file );
		$Imagetypes = array ('image/gif' => IMAGETYPE_GIF, 'image/jpeg' => IMAGETYPE_JPEG, 'image/pjpeg' => IMAGETYPE_JPEG, 'image/png' => IMAGETYPE_PNG );
		$ext = image_type_to_extension ( $Imagetypes [$imageInfo ['mime']] );
		return $ext;
	}
	function __call($f, $p) {
		if (method_exists ( $this, $f )) {
			call_user_method ( $f, $this, $p );
		}
	}
	static function smart_resize_image($file, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false) {
		
		if ($height <= 0 && $width <= 0)
			return false;
			
			// Setting defaults and meta
		$info = getimagesize ( $file );
		$image = '';
		$final_width = 0;
		$final_height = 0;
		list ( $width_old, $height_old ) = $info;
		$maxSide = max($width_old, $height_old);
		
		if($maxSide <= max($width,$height) )
		{
		
			 
			return copy($file,$output);
		}
		if ($width >= $width_old && $width >= $height_old) {
			$final_width = $width_old;
			$final_height = $height_old;
		} else {
			if ($width_old > $height_old) {
				$final_width = $width;
				$final_height = $final_width * $height_old / $width_old;
			} else {
				$final_height = $width;
				$final_width = $final_height * $width_old / $height_old;
			}
		}
		
		
		if($maxSide > max($width,$height) )
		{
			if ($proportional) {
				if ($width == 0)
					$factor = $height / $height_old;
				elseif ($height == 0)
					$factor = $width / $width_old;
				else
					$factor = min ( $width / $width_old, $height / $height_old );
				
				$final_width = round ( $width_old * $factor );
				$final_height = round ( $height_old * $factor );
			} else {
				$final_width = ($width <= 0) ? $width_old : $width;
				$final_height = ($height <= 0) ? $height_old : $height;
			}
		}
		
		switch ($info [2]) {
			case IMAGETYPE_GIF :
				$image = imagecreatefromgif ( $file );
				break;
			case IMAGETYPE_JPEG :
				$image = imagecreatefromjpeg ( $file );
				break;
			case IMAGETYPE_PNG :
				$image = imagecreatefrompng ( $file );
				break;
			default :
				return false;
		}
		
		// This is the resizing/resampling/transparency-preserving magic
		$image_resized = imagecreatetruecolor ( $final_width, $final_height );
		if (($info [2] == IMAGETYPE_GIF) || ($info [2] == IMAGETYPE_PNG)) {
			$transparency = imagecolortransparent ( $image );
			
			if ($transparency >= 0) {
				$transparent_color = imagecolorsforindex ( $image, $trnprt_indx );
				$transparency = imagecolorallocate ( $image_resized, $trnprt_color ['red'], $trnprt_color ['green'], $trnprt_color ['blue'] );
				imagefill ( $image_resized, 0, 0, $transparency );
				imagecolortransparent ( $image_resized, $transparency );
			} 
			elseif ($info [2] == IMAGETYPE_PNG) 
			{
				imagealphablending ( $image_resized, false );
				$color = imagecolorallocatealpha ( $image_resized, 0, 0, 0, 127 );
				imagefill ( $image_resized, 0, 0, $color );
				imagesavealpha ( $image_resized, true );
			}
		}
		imagecopyresampled ( $image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old );
		
		// Taking care of original, if needed
		if ($delete_original) {
			if ($use_linux_commands)
				exec ( 'rm ' . $file );
			else
				@unlink ( $file );
		}
		
		// Preparing a method of providing result
		switch (strtolower ( $output )) {
			case 'browser' :
				$mime = image_type_to_mime_type ( $info [2] );
				header ( "Content-type: $mime" );
				$output = NULL;
				break;
			case 'file' :
				$output = $file;
				break;
			case 'return' :
				return $image_resized;
				break;
			default :
				break;
		}
		
		// Writing image according to type to the output destination
		switch ($info [2]) {
			case IMAGETYPE_GIF :
				imagegif ( $image_resized, $output );
				break;
			case IMAGETYPE_JPEG :
				imagejpeg ( $image_resized, $output, 95 );
				break;
			case IMAGETYPE_PNG :
				imagepng ( $image_resized, $output );
				break;
			default :
				return false;
		}
		
		return true;
	}
	
	static function updatePrice(db $db, $id = null) {
		
		$conf = $db->getOptions ( 'config', 'name', 'value' );
		
		$rates ['EUR'] = $conf ['EUR_RATE'];
		$rates ['USD'] = $conf ['USD_RATE'];
		
		$return = array ();
		
		$return = $db->getArray ( 'currency', '*', 'active', '', '', '', 'iso' );
		
		$INSERT [] = " UPDATE  `offers` SET `service_price`=0 WHERE id=$id ";
		$INSERT [] = " UPDATE  `offers` SET `service_price`=(`filed_price`*{$rates['EUR']})/{$rates['USD']} 
		              WHERE `filed_currency`= {$return['EUR']['id']} AND id=$id";
		$INSERT [] = " UPDATE  `offers` SET `service_price`=`filed_price`/{$rates['USD']} 
		              WHERE `filed_currency`={$return['AMD']['id']} AND id=$id";
		$INSERT [] = " UPDATE  `offers` SET `service_price`=`filed_price` 
		              WHERE `filed_currency`={$return['USD']['id']} AND  id=$id";
		
		foreach ( $INSERT as $q ) {
			$db->query ( $q );
		}
	}
	public static function toMethodName($f, $prefix = null, $postfix = null) {
		$moduleMethodName = preg_replace ( '/[^a-z0-9_]/is', ' ', "{$prefix}  $f {$postfix}" );
		$moduleMethodName = ucwords ( $moduleMethodName );
		
		$moduleMethodName = str_replace ( " ", '', $moduleMethodName );
		if (function_exists ( 'lcfirst' )) {
			$moduleMethodName = lcfirst ( $moduleMethodName );
		}
		return $moduleMethodName;
	
	}
	
	static public function mailSend($html, $subject, $toEmail, $toName = '', $fromEmail, $fromName = '') {
		/*
		 * $html = stripslashes ( $html ); $mail = new phpmailer ( 0 );
		 * $mail->IsHTML ( 1 ); $mail->CharSet = 'utf-8'; $mail->Encoding =
		 * 'base64'; $mail->Body = $html; $mail->Subject = $subject; $mail->From
		 * = $fromEmail; $mail->FromName =$fromName; $mail->AddAddress (
		 * $toEmail, $toName ); if (! $mail->send ()) { $dir = ROOT_DIR .
		 * "/email/d" . date ( 'dmY' ) . 'h' . date ( 'Hi' ); file_put_contents
		 * ( $dir . "-" . microtime ( 0 ) . ".html"," $toEmail,$toName,
		 * $fromEmail<br/>".$mail->Body );
		 * self::mail_utf8($toEmail,$fromName,$fromEmail,$subject,$mail->Body);
		 * }
		 */
		
		$status = self::mail_utf8 ( $toEmail, $fromName, $fromEmail, $subject, $html );
		if (! $status) {
			$dir = ROOT_DIR . "/email/d" . date ( 'dmY' ) . 'h' . date ( 'Hi' );
			file_put_contents ( $dir . "-" . microtime ( 0 ) . ".html", " $toEmail,$toName, $fromEmail<br/>" . $mail->Body );
		}
	}
	
	static function mail_utf8($to, $fromEmail, $from_email, $subject = '(No subject)', $message = '') {
		$from_user = "=?UTF-8?B?" . base64_encode ( $from_user ) . "?=";
		$subject = "=?UTF-8?B?" . base64_encode ( $subject ) . "?=";
		$headers = "From: $from_user <$from_email>\r\n" . "MIME-Version: 1.0" . "\r\n" . "Content-type: text/html; charset=UTF-8" . "\r\n";
		
		return mail ( $to, $subject, $message, $headers );
	}
	public static function uniqid($prefix, $table) {
		$db = db::getInstance ();
		$row = $db->queryFetchOne ( "SHOW TABLE STATUS LIKE '$table'" );
		
		return $prefix . sprintf ( "%'03s", $row ['Auto_increment'] );
	}

    public static function autoLink($table,$fild,$step,$prefix)
    {
        	$db = db::getInstance();
            $_config = $db->getOptions ( 'config', 'name', 'value' );
           
            //$count = $db->getRow($table,"count($fild) as `count`","","iddfkjkfg");
            $query = "SELECT count($fild) as `count` FROM $table";
            $count =$db->queryFetch($query);
            $count=$count[0];
            
            $prefix = $db->escape($_config[$prefix]);
            
            return $prefix.($count['count']+$step);
        
    }

}