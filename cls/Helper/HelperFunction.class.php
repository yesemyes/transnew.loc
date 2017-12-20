<?php
class HelperFunction {
	
	public static $_found_rows;
	
	public static function link($params) {
	   
		if (isset ( $params ['forward'] ) && $params ['forward'] !== '') {
			$url = $params ['forward'];
			if (strpos ( $url, "http" ) === 0) {
				$address = '/goto?link=' . urlencode ( $url );
			
			} else {
				$address = $url;
                
			}
			return $address;
		} elseif (isset ( $params ['forward'] )){
			unset ( $params ['forward'] );
            
		}
		if (isset ( $params ['extention'] )) {
			$extention = $params ['extention'];
			
			unset ( $params ['extention'] );
		} else {
			$extention = '.html';
            
		
		}
		$currentLang = Request::$currentLang;
		$arguments = $params;
		if (isset ( $params ['assign'] )) {
			unset ( $arguments ['assign'] );
		}
		
		$va = $arguments;
		$end = array_pop ( $va );
		$page = "";
        
		if (is_numeric ( $end ) && ! empty ( $va )) {
			
			$page = "-" . $end;
		} else {
			array_push ( $va, $end );
		}
		
		if ($currentLang ['default']) {
			$start = "";
		} else {
			$start = $currentLang ['code'];
			array_unshift ( $va, $start );
		}
		
		foreach ( $va as $k => $part ) {
			if ($part == '')
				unset ( $va [$k] );
		}
        
		$link = implode ( "/", $va );
		
		return "/{$link}{$page}{$extention}";
       
       
	}
	
	public static function lngLink($params) {
		
		$currentLang = Request::$currentLang;
		$languages = Request::$languages;
		
		$arguments = $params;
		
		if (isset ( $params ['assign'] )) {
			unset ( $arguments ['assign'] );
		}
		
		$code = $params ['code'];
		$return = '';
		$ToLng = $languages [$code];
		$Request = Request::getInstance ();
		$requestData = $Request->request;
		
		$path = $requestData ['path'];
		$query_str = $requestData ['query_str'];
		
		if ($code == Request::$currentLang ['code']) {
			$return = $path . ($query_str ? "?$query_str" : '');
		} elseif (! $ToLng ['default']) {
			
			$keys = array_keys ( $languages );
			$pattern = implode ( '|', $keys );
			$pattern = "{/($pattern)/}iu";
			
			if (preg_match ( $pattern, $path )) {
				$return = preg_replace ( $pattern, "/$code/", $path );
				$return = $return . ($query_str ? "?$query_str" : '');
			
			} else {
				$return = "/$code" . $path;
			}
		
		} else {
			$languages = Request::$languages;
			unset ( $languages ['default'] );
			$keys = array_keys ( $languages );
			$pattern = implode ( '|', $keys );
			$pattern = "{/($pattern)/}iu";
			
			if (preg_match ( $pattern, $path )) {
				$return = preg_replace ( $pattern, "/", $path );
				$return = $return . ($query_str ? "?$query_str" : '');
			
			} else {
				$return = $path;
			}
		}
		return $return;
	}
	
	public static function pagingLinkGenreator($params) {
		
		$path = $params ['path'];
		$paging = $params ['paging'];
		
		$body = implode ( "/", $path );
		$paging->links = array ();
		
		$paging->prevPagenum = $paging->prevPage;
		$paging->nextPageNum = $paging->nextPage;
		
        if($paging->_pagesArray)
        {
            
        
        
		foreach ( $paging->_pagesArray as &$page ) {
			$paging->links [$page] = "/" . $body . "-" . ($page) . ".html";
		}
		
        }
		if ($paging->_next) {
			$paging->_next = "/" . $body . "-" . $paging->_next . ".html";
		}
		if ($paging->_prev) {
			$paging->_prev = "/" . $body . "-" . $paging->_prev . ".html";
		}
		
		if ($paging->nextPage) {
			$paging->nextPage = "/" . $body . "-" . $paging->nextPage . ".html";
		}
		
		if ($paging->prevPage) {
			$paging->prevPage = "/" . $body . "-" . $paging->prevPage . ".html";
		}
		
		$paging->_total = "/$body-{$paging->_total}.html";
		$paging->_first = "/$body-1.html";
		
		return $paging;
	}
	
	public static function processPaging($params) {
		
// $totalFound, $limit, $pagesPerPage, $page = 1
		
		$totalFound = $params ['found_rows'];
		$limit = $params ['limit'];
		$pagesPerPage = $params ['pagesPerPage'];
		$page = $params ['page'];
		
		$nextIndex = $prevIndex = $nextPage = $prevPage = null;
		$_pagesQty = ceil ( $totalFound / $limit );
		$_pages = range ( 1, $_pagesQty );
		$_pagesAll = array_chunk ( $_pages, $pagesPerPage, true );
		$pageIndex = floor ( ($page - 1) / $pagesPerPage );
		//$CurrentPagesArray = $_pagesAll [$pageIndex];
		$start = $page - $pagesPerPage / 2;
		if($start < 0){
			$start = 0;
		}
		$CurrentPagesArray = array_slice($_pages,$start,$pagesPerPage);
		$next = null;
		$prev = null;
		if ($pageIndex < count ( $_pagesAll ) - 1) 
		{
			$nextIndex = $pageIndex + 1;
			$next = current ( $_pagesAll [$nextIndex] );
		
		}
		if ($pageIndex > 0) {
			$prevIndex = $pageIndex - 1;
			$prev = end ( $_pagesAll [$prevIndex] );
		
		}
		
			$return = new stdClass ( );
		
			$return->_pagesArray = $CurrentPagesArray;
			$return->_pages = $_pages;
			$return->_pagesAll = $_pagesAll;
			$return->nextIndex = $nextIndex;
			$return->prevIndex = $prevIndex;
			$return->pageIndex = $pageIndex;
			$return->_current = intval($page);
			$return->_next = $next;
			$return->_prev = $prev;
			$return->_total = $_pagesQty;
		
			$firs = array_shift ( $CurrentPagesArray );
			$last = array_pop ( $CurrentPagesArray );
		
			$nextPage = $page + 1;
			$prevPage = $page - 1;
		
			if ($nextPage > $last)
				$nextPage = $return->_next;
		
			if ($prevPage < $firs)
				$prevPage = $return->_prev;
		
			$return->nextPage = $nextPage;
			$return->prevPage = $prevPage;
			
			return $return;
	
	}
	
	public static function staticText($params) {
		global $smarty;
		$advanced = isset ( $params ['advanced'] ) ? $params ['advanced'] : 0;
		
		$alias = $params ['alias'];
		$lng_id = isset ( $params ['lng_id'] ) ? $params ['lng_id'] : 0;
		$assign = isset ( $params ['var'] ) ? $params ['var'] : 0;
		$db = db::getInstance ();
		
		if ($lng_id) {
			$return = $db->getRow ( $db->tbl_prefix . 'text', '*', "`alias`='$alias' AND `lng_id`='$lng_id'" );
		} else {
			$languages = Request::$languages;
			$return_tmp = $db->getArray ( $db->tbl_prefix . 'text', '*', "`alias`='$alias' ", '', '', '', 'lng_id' );
			
			foreach ( $languages as $code => $lng ) {
				$return [$code] = $return_tmp [$lng ['id']];
			}
		
		}
		
		if ($assign) {
			$smarty->assign ( $assign, $return );
		
		} elseif ($lng_id && ! $advanced) {
			return $return ['content'];
		} else {
			return $return;
		}
	
	}
	
	public static function trans($params, $debug = false) {
		
		if (! isset ( base::$lngdata )) {
			
			base::LoadLNGXML ( Request::$currentLang ['code'] );
		}
		$lngdata = base::$lngdata;
		
		$default = false;
		if (isset ( $params ['default'] )) {
			$default = $params ['default'];
			unset ( $params ['default'] );
		
		}
		$arguments = $params;
		
		if (count ( $arguments ) < 1)
			return '_NULL__';
		$const = array_shift ( $arguments );
		$constF = convertAlpha ( $const );
		
		if (isset ( $lngdata [$constF] )) {
			$return = $lngdata [$constF];
		} else {
			$return = $default ? $default : $constF;
			
			if ($default) {
				langdata::addFromDefault ( $const, $default );
			}
		}
		
		$callArguments = $arguments;
		array_unshift ( $callArguments, $return );
		
		$result = call_user_func_array ( 'sprintf', $callArguments );
		return $result;
	
	}
	
	public static function getByAlias($params) {
		$db = db::getInstance ();
		$tbl = $params ['tbl'];
		$where = $params ['where'];
		$lng_id = isset ( $params ['lng_id'] ) ? $params ['lng_id'] : 0;
		$return = array ();
		
		$return = $db->getRow ( $db->tbl_prefix . $tbl, '*', "`lng_id`='{$lng_id}' AND $where" );
		
		return $return;
	
	}
	
	public static function uniqid($params) {
		
		$prefix = null;
		$more_entropy = null;
		$assign = null;
		extract ( $params );
		
		return uniqid ( $prefix, $more_entropy );
	}
	public static function dbCall($params) {
		$db = db::getInstance ();
		$assign = isset ( $params ['assign'] ) ? $params ['assign'] : false;
		$table = isset ( $params ['table'] ) ? $params ['table'] : false;
		if (! $table) {
			trigger_error ( "table param is mandatory in DbCall" );
			$return = false;
		}
		
		$table = $db->tbl_prefix . $table;
		$call = isset ( $params ['call'] ) ? $params ['call'] : false;
		if (! $call) {
			trigger_error ( "call param is mandatory in DbCall" );
			$return = false;
		}
		
		if (! method_exists ( $db, $call )) {
			trigger_error ( "$call  is undefined in DB" );
			$return = false;
		} else {
			
			$what = isset ( $params ['what'] ) ? $params ['what'] : '*';
			$where = isset ( $params ['where'] ) ? $params ['where'] : '';
			$order = isset ( $params ['order'] ) ? $params ['order'] : '';
			$group = isset ( $params ['group'] ) ? $params ['group'] : '';
			$limit = isset ( $params ['limit'] ) ? $params ['limit'] : '';
			
			$return = $db->$call ( $table, $what, $where, $group, $order, $limit );
			if ($limit) {
				self::$_found_rows = db::$_found_rows;
			}
		
		}
		
		return $return;
	
	}
	
	public static function filterBy($haystack, $needle, $key = 'alias') {
		
		foreach ( $haystack as $node ) {
			if ($node [$key] == $needle) {
				return $node;
			}
		}
		return false;
	}
	
	public static function OptionExists($params) {
		$haystack = $params ['from'];
		$key = $params ['key'];
		$needle = $params ['needle'];
		$value = $params ['value'];
		
		foreach ( $haystack as $node ) {
			if (($node [$key] == $needle) && $node ['value'] == $value) {
				return 'checked="checked"';
			}
		}
		return '';
	
	}
	public static function filterOptions($params) {
		$haystack = $params ['from'];
		$needle = $params ['search'];
		$key = $params ['key'];
		$return = $params ['return'];
		
		$found = self::filterBy ( $haystack, $needle, $key );
		
		if ($found != false) {
			return isset ( $found [$return] ) ? $found [$return] : $found;
		}
	}
	public static function implode($params) {
		$pieces = $params ['pieces'];
		$glue = $params ['glue'];
		
		$found = implode ( $glue, $pieces );
		
		return $found;
	
	}
	public static function toJson($params) {
		$params ['data'];
		return json_encode ( $params ['data'] );
	
	}
	public static function getImagePath($params) {
		$settings = $params ['settings'];
		$src = $params ['src'];
		$pathInfo = pathinfo ( $src );
		
		$module = $params ['module'];
		if ($settings ['resize']) {
			$min = min ( $settings ['resize'] );
			
			$folder = array_search ( $min, $settings ['resize'] );
			
			if ($pathInfo ['dirname'] == '.') {
				$location = THEM_PATH . $src;
				
				$file = '/' . THEM_URL . 'img/' . $module . '/' . $folder . '/' . $src;
			} else {
				
				$dirname = $pathInfo ['dirname'];
				
				$pathName = str_replace ( ROOT_DIR, '', $dirname );
				
				$file = $pathName . '/' . $pathInfo ['basename'];
			
			}
			
			// if(!file_exists($location))
			// {
			// return false;
			// }else
			{
				
				$maxSize = min ( 100, $min );
				$return = array ('src' => $file, 'dimensions' => "style='width:{$maxSize}px; max-height:{$maxSize}px'" );
				
				return $return;
			}
		}
	
	}
	
	public static function isToDay($params) {
		$day = $params ['day'];
		
		return date ( 'Y-m-d', $day ) == date ( 'Y-m-d' ) ? 'today' : 'not-today';
	
	}
	public static function isHoliday($params) {
		$day = $params ['day'];
		return date ( 'N', $day ) > 5 ? 'sun' : 'wd';
	
	}
	public static function calendareRange($params) {
		
		$delta = $params ['delta'];
		$before = round ( $delta / 4, 0 );
		$after = $delta - $before;
		$start = strtotime ( "-$before day" );
		$end = strtotime ( "+$after day" );
		
		return range ( $start, $end, 24 * 60 * 60 );
	}
	
	public static function invertHex($params) {
		
		$color = $params ['color'];
		
		$r = DECHEX ( 255 - HEXDEC ( SUBSTR ( $color, 0, 2 ) ) );
		$r = (STRLEN ( $r ) > 1) ? $r : '0' . $r;
		$g = DECHEX ( 255 - HEXDEC ( SUBSTR ( $color, 2, 2 ) ) );
		$g = (STRLEN ( $g ) > 1) ? $g : '0' . $g;
		$b = DECHEX ( 255 - HEXDEC ( SUBSTR ( $color, 4, 2 ) ) );
		$b = (STRLEN ( $b ) > 1) ? $b : '0' . $b;
		
		return "#{$r}{$g}{$b}";
	}
	
	
	public static function JsClean($params) 
	{
		$term = $params['term'];
		$term = str_replace("\n", ' ', $term);
		$term = str_replace("\r", ' ', $term);
		$term =  htmlentities($term ,3, 'UTF-8');
		
		return $term;
	}
	public static function bulidQuery($params) {
		
		if (isset ( $params ['unset'] ) && isset ( $params ['query'] [$params ['unset']] )) {
			unset ( $params ['query'] [$params ['unset']] );
		}
		
		if (isset ( $params ['replace'] )) {
			
			if (isset ( $params ['query'] [$params ['replace']] )) {
				unset ( $params ['query'] [$params ['replace']] );
			}
			if (! in_array($params ['replace'], array('price','filed_milage')) ) 
			{
				$params ['query'] [$params ['replace']] = $params ['replaceWith'];
			} else {
				if (strstr ( $params ['replaceWith'], '-' )) 
				{
					list ( $low, $hight ) = explode ( '-', $params ['replaceWith'] );
					if ($low) {
						$params ['query'] [$params ['replace']] ['from'] = $low;
					}
					if ($hight) {
						$params ['query'] [$params ['replace']] ['to'] = $hight;
					}
				
				} else {
					$params ['query'] [$params ['replace']] = $params ['replaceWith'];
				}
			}
		}
		return $return = http_build_query ( $params ['query'] );
	
	}
	public static function IsCurrent($params) {
		$category = $params ['category'];
		$cItem = $params ['cItem'];
		$isFirst = $params ['isFirst'];
		
		$flag1 = (($category != null) && $category ['id'] == $cItem ['id']);
		$flag2 = (($category == null) && $isFirst);
		
		return $flag1 || $flag2;
	
	}
	public static function AddToGallery($params) {
		$gallery = $params ['gallery'];
		$images = $params ['images'];
		$description = $params ['description'];
		$node = array ('images' => $images, 'description' => $description );
		array_unshift ( $gallery, $node );
		return $gallery;
	}
	public static function parseStr($params) {
		$str = parse_str ( $params ['str'], $ret );
		
		return $ret;
	}
	public static function AddCssFile($params) {
		$base = $params ['base'];
		$base = trim ( $base, '/' );
		$file = $params ['file'];
		$version = isset ( $params ['v'] ) && $params ['v'] != 'RANDOM' ? $params ['v'] : uniqid ( 'css' );
		
		$pathInfo = pathinfo ( $file );
		
		if ($pathInfo ['dirname'] == '.') {
			return "/$base/css/$file?v=$version";
		} else {
			return $file;
		}
	
	}
	public static function AddJsFile($params) {
		$base = $params ['base'];
		$base = trim ( $base, '/' );
		$file = $params ['file'];
		$version = isset ( $params ['v'] ) && $params ['v'] != 'RANDOM' ? $params ['v'] : uniqid ( 'css' );
		
		$pathInfo = pathinfo ( $file );
		
		if ($pathInfo ['dirname'] == '.') {
			return "/$base/js/$file?v=$version";
		} else {
			return $file;
		}
	
	}
	public static function timeOfLeft($params) {
		
		$end = $params ['end'];
		if ($end == '') {
			$end = date ( 'Y-m-d 23:59:59' );
		}
		$intervalo = date_diff ( date_create ( $end ), date_create () );
		
		$Years = HelperFunction::trans ( array ('term' => 'Years' ) );
		$Months = HelperFunction::trans ( array ('term' => 'Months' ) );
		$Days = HelperFunction::trans ( array ('term' => 'Days' ) );
		$Hours = HelperFunction::trans ( array ('term' => 'Hours' ) );
		$Minutes = HelperFunction::trans ( array ('term' => 'Minutes' ) );
		$Seconds = HelperFunction::trans ( array ('term' => 'Seconds' ) );
		
		return $intervalo->format ( "%a d %h:%i:%s" );
	
	}
	
	public static function smallContent($params) {
		$content = $params ['content'];
		$pagebreak = '<!-- pagebreak -->';
		$pos = strpos ( $content, $pagebreak );
		$smallContent = substr ( $content, 0, $pos + strlen ( $pagebreak ) );
		if (function_exists ( 'tidy_parse_string' )) {
			$tidy = tidy_parse_string ( $smallContent );
			$tidy->cleanRepair ();
			$smallContent = ( string ) $smallContent;
		
		}
		
		return $smallContent;
	}
	public static function currrentBg($params) {
		$background = $params ['background'];
		if ($background && file_exists ( THEM_PATH . 'img/menu/bg/' . $background )) {
			$bgUrl = THEM_URL . 'img/menu/bg/' . $background;
			return "style=\"background-image:url($bgUrl)!important;\"";
		}
		
		return '';
	}
	
	public static function processPhoneNumber($params) {
		$phone = $params ['phone'];
		$phoneParts = explode ( ')', $phone );
		$phoneParts [0] = trim ( $phoneParts [0], ') (' );
		return $phoneParts;
	}
	
	public static function getVersion($params) {
		$filename = ROOT_DIR . $params ['file'];
		if (file_exists ( $filename )) {
			return '?v=' . filectime ( $filename );
		} else {
			return '';
		}
	}
	public static function PoolReslult($params) {
		$votes = $params ['votes'];
		$total = $params ['total'];
		
		$x = round ( ($votes * 100) / $total, 2 );
		return $x;
	
	}
	public static function FithImageToSize($params) {
		$base = $params ['base'];
		$image = $params ['image'];
		$pathinfo = pathinfo ( $image );
		$file = ROOT_DIR . $base . $image;
		$file = realpath($file);
		
		$frame = isset ( $params ['frame'] ) ? $params ['frame'] : true;
		$width = isset ( $params ['width'] ) ? $params ['width'] : 0;
		$height = isset ( $params ['height'] ) ? $params ['height'] : 0;
		$basLoacation = "/img/cach/{$width}x{$height}/";
		
		$destFolder = ROOT_DIR . "/img/cach/{$width}x{$height}/";
		
		$ck = '';
		$filename = $pathinfo ['filename'];
		
		if (! file_exists ( $file )) {
			$filename = "empty";
			
			$file = ROOT_DIR . "/images/logo_am.png";
		
		}
		
		$destFile = "{$destFolder}{$filename}.png";
		
		if (! file_exists ( $destFile )) {
			
			$image_resized = imagecreatetruecolor ( $width, $height );
			imagealphablending ( $image_resized, false );
			$color = imagecolorallocatealpha ( $image_resized, 0, 0, 0, 127 );
			imagefill ( $image_resized, 0, 0, $color );
			imagesavealpha ( $image_resized, true );
			
			if (file_exists ( $file )) 
			{
				$res = base::smart_resize_image ( $file, $width, $height, true, 'return', false );
				$outWidth = imagesx ( $res );
				$outHeight = imagesy ( $res );
				$xOffset = 0;
				$yOffset = 0;
				
				/*
				$data = getimagesize($file);
				if($data[2] == IMAGETYPE_PNG)
				{       $transparent_color = imagecolorsforindex (  $res,0);
						$transparency = imagecolorallocate ( $res, 127, 127, 127);
						imagefill ( $res, 0, 0, $transparency );
						imagecolortransparent ( $res, $transparency );
				}
				*/
				
				
				if ($outWidth != $width) {
					$xOffset = ceil ( ($width - $outWidth) / 2 );
				} else {
					$yOffset = ceil ( ($height - $outHeight) / 2 );
				}
				imagecopyresampled ( $image_resized, $res, $xOffset, $yOffset, 0, 0, $outWidth, $outHeight, $outWidth, $outHeight );
			}
			
			if (! is_dir ( $destFolder )) {
				mkdir ( $destFolder, 0777, true );
			}
			imagepng ( $image_resized, "{$destFolder}{$filename}.png", 9 );
			imagedestroy ( $image_resized );
			$ck = '?__=' . microtime ();
		}
		return $basLoacation . $filename . ".png{$ck}";
	
	}
	public static function OrderingLink($params) {
		
		$return [] = "<a";
		$path = $params ['path'];
		$order_by = $params ['order_by'];
		$direaction = $params ['direction'];
		$query = $params ['query'];
		$term = $params ['term'];
		$ttlPrefix = '';
		$append = '</a>';
		if (! isset ( $query ['order_by'] ) && $order_by == 'brandmodel') {
			$query ['order_by'] = $order_by;
		}
		if ($query ['order_by'] == $order_by) {
			array_unshift ( $return, '<span class="offerList_bg">' );
			$append = '</a></span>';
			if (! isset ( $query ['direction'] )) {
				$query ['direction'] = 'asc';
			
			} elseif ($query ['direction'] == 'asc') {
				$query ['direction'] = 'desc';
				$ttlPrefix = '2';
			
			} elseif ($query ['direction'] == 'desc') {
				$query ['direction'] = 'asc';
			}
		} else {
			
			$query ['direction'] = 'asc';
		}
		
		$query ['order_by'] = $order_by;
		
		$href = $path . '?' . http_build_query ( $query );
		$return [] = "href='{$href}'";
		$return [] = "class='offerList_title$ttlPrefix'";
		
		$return [] = ">";
		$return [] = HelperFunction::trans ( array ('term' => $term ) );
		
		$return [] = $append;
		
		return implode ( ' ', $return );
	
	}
	public static function GetSizes($params) {
		$path = $params ['path'];
		list ( $width, $ehight ) = getimagesize ( ROOT_DIR . $path );
        
		if ($width && $ehight) {
			return "{$width}x{$ehight}";
		} else {
			return false;
		}
	}
	public static function ImageExists ($params) 
	{
		$base = $params ['base'];
		$image = $params ['image'];
		
		$path = ROOT_DIR."{$base}{$image}";
		return file_exists($path) && ! is_dir($path);
	}
	public static function BuildeNavigation($params) 
	{
	
		$path_params = $params['path'];
		$currentPage = $params['currentPage'];
		$return = array();
		
		
		self::goUpByTable($currentPage, 'menu', 'label', $return);
		
		$return = array_reverse($return);
		
		if($path_params[1]=='cars' && isset($path_params[2]))
		{
			$return[0]['alias']= 'cars';
			$return[0]['label']= HelperFunction::trans(array('page'=>'cars'));
			
		}
        if($path_params[1]=='users' && isset($path_params[2]))
		{
			$return[0]['alias']= 'users/profile';
			$return[0]['label']= HelperFunction::trans(array('page'=>'navi_users'));
			
		}
		//print_r($return);
		$path = array();
		$paths = array();
		$pathUrl = HelperFunction::link(array('home'));
		
		$path [] = "<a href='{$pathUrl}' class='path-navigation c-navi'>".HelperFunction::trans(array('page'=>'home'))."</a>";
		foreach ($return as $index=>$row)
		{
			if($row['alias'] == 'home')
				continue;
			$paths[$row['alias']] = $row['alias'];
			$pathUrl = HelperFunction::link($paths);
			
			$isLast = ($index == count($return)-1) ? 'last-navi':'c-navi';
			
			$path[] = "<a href=\"{$pathUrl}\"   class=\"path-navigation $isLast\">{$row['label']}</a>";
		}
		if(count($path) > 1)
		return 	implode('/', $path);
		else
		{
			return '';
		}
	}
	
	
	private static function goUpByTable($id,$table,$f,&$return) 
	{
		$db = db::getInstance();
                $currentLangId = Request::$currentLang['id'];
		$row = $db->getRow($table,"id,pid,alias,$f","`lng_id` = '$currentLangId' AND `id`='$id'");
		$return[] = $row;
		if($row['pid'] != 0)
		{
			HelperFunction::goUpByTable($row['pid'], $table, $f, $return);
		}
	}
	public static function GetPriceIn($params) 
	{
		$price = $params['price'];
		$currency = $params['currency'];
		$config = $params['config'];
		$cnf = $config;
		$rate = $config["{$currency}_RATE"];
		return round($price/$rate);
		
	}
	public static function ____CatImageToSize($params) {
		$base = $params ['base'];
		$image = $params ['image'];
		$pathinfo = pathinfo ( $image );
		$file = ROOT_DIR . $base . $image;
		$frame = isset ( $params ['frame'] ) ? $params ['frame'] : true;
		$width = isset ( $params ['width'] ) ? $params ['width'] : 0;
		$height = isset ( $params ['height'] ) ? $params ['height'] : 0;
		$basLoacation = "/img/cach/cat/{$width}x{$height}/";
		
		$destFolder = ROOT_DIR . "/img/cach/cat/{$width}x{$height}/";
		
		$ck = '';
		$filename = $pathinfo ['filename'];
		
		if (! file_exists ( $file )) {
			$filename = "empty";
			
			$file = ROOT_DIR . "/images/logo_am.png";
		
		}
		
		if ($filename == '') {
			$filename = "empty";
			
			$file = ROOT_DIR . "/images/logo_am.png";
		}
		
		$destFile = "{$destFolder}{$filename}.jpg";
		
		if (! file_exists ( $destFile )) 
		{
			
			$image_resized = imagecreatetruecolor ( $width, $height );
			imagealphablending ( $image_resized, false );
			$color = imagecolorallocatealpha ( $image_resized, 0, 0, 0, 127 );
			imagefill ( $image_resized, 0, 0, $color );
			imagesavealpha ( $image_resized, true );
			
			if (file_exists ( $file )) {
				list ( $sWidth, $sHeight ) = getimagesize ( $file );
				
				$kayfImage = $sWidth / $sHeight;
				$kayfDest = $width / $height;
				
				if ($kayfImage > $kayfDest) {
					$res = base::smart_resize_image ( $file, 0, $height, true, 'return', false );
				} else {
					$res = base::smart_resize_image ( $file, $width, 0, true, 'return', false );
				}
				
				$outWidth = imagesx ( $res );
				$outHeight = imagesy ( $res );
				
				$xOffset = 0;
				$yOffset = 0;
				if ($outWidth != $width) {
					$xOffset = floor ( ($width - $outWidth) / 2 );
				} else {
					$yOffset = floor ( ($height - $outHeight) / 2 );
				}
				
				//file_put_contents ( $destFile . '.log', " $xOffset, $yOffset, 0, 0, $outWidth, $outHeight, $width, $height,($sWidth, $sHeight)" );
				imagecopyresampled ( $image_resized, $res, $xOffset, $yOffset, 0, 0, $outWidth, $outHeight, $outWidth, $outHeight );
			}
			
			if (! is_dir ( $destFolder )) {
				mkdir ( $destFolder, 0777, true );
			}
			imagejpeg( $image_resized, "{$destFolder}{$filename}.jpg", 70 );
			imagedestroy ( $image_resized );
			$ck = '?__=' . microtime ();
		}
		return $basLoacation . $filename . ".jpg{$ck}";
	
	}
	
	
	public static function CatImageToSize($params) 
	{
		$base = $params ['base'];
		$image = $params ['image'];
		
		if ($params ['image'] == '') {
			$image = 'empty.jpg';
		}
		
		$frame = isset ( $params ['frame'] ) ? $params ['frame'] : false;
		$width = isset ( $params ['width'] ) ? $params ['width'] : 0;
		$height = isset ( $params ['height'] ) ? $params ['height'] : 0;
		$basLoacation = "/img/cach/{$width}x{$height}/";
		
		$destFolder = ROOT_DIR . "/img/cach/{$width}x{$height}/";
		
		if (! is_dir ( $destFolder )) {
			mkdir ( $destFolder, 0777, true );
		}
		
		$sourceFile = ROOT_DIR . $base . $image;
		//$sourceFileInfo = parse_url ( $image );
		//$sourceFile = ROOT_DIR . $sourceFileInfo ['path'];
		
		if (! file_exists ( $sourceFile )) {
			$sourceFile = ROOT_DIR . "/img/empty.jpg";
		}
		
		$pathinfo = pathinfo ( $sourceFile );
		
		//$destFile = "{$destFolder}" .  "-{$pathinfo['filename']}.jpg";
		$destFile = "{$destFolder}" . "{$pathinfo['filename']}.jpg";
		$ck = '';
		if (! file_exists ( $destFile )) 
		{
			if (file_exists ( $sourceFile )) 
			{
				if ($frame) 
				{
					$output = 'return';
				} 
				else 
				{
					$output = "{$destFolder}{$pathinfo['basename']}";
				}
				 
				list($oWidth,$oHeight) = getimagesize($sourceFile);
				list($cWidth, $cHeight) = self::__getSizes($oWidth,$oHeight,$width,$height) ;
				$res = base::smart_resize_image ( $sourceFile, $cWidth, $cHeight, true, $output, false );
				if ($res && $output != 'return') 
				{
					// return $basLoacation .  "-" . $pathinfo ['basename'];
					return $basLoacation . $pathinfo ['basename'];
				}
				
				$outWidth = imagesx ( $res );
				$outHeight = imagesy ( $res );
				$xOffset = 0;
				$yOffset = 0;
				
				if ($outWidth != $width) 
				{
					$xOffset = ceil ( ($width - $outWidth) / 2 );
				} 
				else 
				{
					$yOffset = ceil ( ($height - $outHeight) / 2 );
				}
				
				if($xOffset < 0 )
				{
					$xOffset--;
				}
				
				if($yOffset < 0 )
				{
					$yOffset--;
				}
			}
			else
			{
				return self::_FithImageToSize($params);
			}
			
			if ($frame && $frame  === true) 
			{
				$image_resized = imagecreatetruecolor ( $width, $height );
				imagealphablending ( $image_resized, false );
				$color = imagecolorallocatealpha ( $image_resized, 0, 0, 0, 127 );
				imagefill ( $image_resized, 0, 0, $color );
				imagesavealpha ( $image_resized, true );
				imagecopyresampled ( $image_resized, $res, $xOffset, $yOffset, 0, 0, $outWidth, $outHeight, $outWidth, $outHeight );
			}
			
			
			//imagejpeg ( $image_resized, "{$destFolder}" .  "-{$pathinfo['filename']}.jpg", 90 );
			
			imagejpeg ( $image_resized, "{$destFolder}" .  "{$pathinfo['filename']}.jpg", 90 );
			imagedestroy ( $image_resized );
			$ck = '?__=' . microtime ();
		}
		return $basLoacation .   $pathinfo ['filename'] . ".jpg{$ck}";
	
	}
	
	
	public static function __getSizes($oWidth,$oHeight,$width,$height) 
	{
	
			if(($oWidth/$oHeight) < 1)
			{
				if(($width/$height) > 1)
				{
					$cWidth = $width;
					$cHeight = ceil($oHeight*$width/$oWidth);
				}
				else
				{
					if(($oWidth/$oHeight) >   ($width/$height))
					{
						$cHeight = $height;
							$cWidth = ceil($oWidth*$height/$oHeight);
					}elseif(($oWidth/$oHeight) <=   ($width/$height))
					{
						$cWidth = $width;
						$cHeight = ceil($oHeight*$width/$oWidth);
					}
				}
			}
			
			if(($oWidth/$oHeight) >= 1)
			{
				if(($width/$height) < 1)
				{
					$cWidth = $width;
					$cHeight = ceil($oHeight*$width/$oWidth);
				}
				else
				{
					if(($oWidth/$oHeight) >   ($width/$height))
					{
						$cHeight = $height;
						$cWidth = ceil($oWidth*$height/$oHeight);
						
					}
					elseif(($oWidth/$oHeight) <=   ($width/$height))
					{
						$cWidth = $width;
						$cHeight = ceil($oHeight*$width/$oWidth);
					}
				}
			}
			
			return array($cWidth,$cHeight);
		
	}
	public static function _FithImageToSize($params) {
		$base = $params ['base'];
		$image = $params ['image'];
		
		if ($params ['image'] == '') {
			$image = 'no-image.jpg';
		}
		
		$frame = isset ( $params ['frame'] ) ? $params ['frame'] : false;
		$width = isset ( $params ['width'] ) ? $params ['width'] : 0;
		$height = isset ( $params ['height'] ) ? $params ['height'] : 0;
		$basLoacation = "/img/cach/{$width}x{$height}/";
		
		$destFolder = ROOT_DIR . "/img/cach/{$width}x{$height}/";
		
		if (! is_dir ( $destFolder )) {
			mkdir ( $destFolder, 0777, true );
		}
		
		$sourceFileUrl = ROOT_DIR . $base . $image;
		$sourceFileInfo = parse_url ( $image );
		$sourceFile = ROOT_DIR . $sourceFileInfo ['path'];
		
		if (! file_exists ( $sourceFile )) {
			$sourceFile = ROOT_DIR . "/img/no-image.png";
		}
		
		$pathinfo = pathinfo ( $sourceFile );
		
		$destFile = "{$destFolder}" .  "-{$pathinfo['filename']}.png";
		$ck = '';
		if (! file_exists ( $destFile )) {
			if (file_exists ( $sourceFile )) {
				if ($frame) {
					$output = 'return';
				} else {
					
					$output = "{$destFolder}{$pathinfo['basename']}";
				}
				$res = base::smart_resize_image ( $sourceFile, $width, $height, true, $output, false );
				
				if ($res && $output != 'return') {
					return $basLoacation . $pathinfo ['basename'];
				}
				
				$outWidth = imagesx ( $res );
				$outHeight = imagesy ( $res );
				$xOffset = 0;
				$yOffset = 0;
				
				if ($outWidth != $width) {
					$xOffset = ceil ( ($width - $outWidth) / 2 );
				} else {
					$yOffset = ceil ( ($height - $outHeight) / 2 );
				}
			
			}
			
			if ($frame) {
				$image_resized = imagecreatetruecolor ( $width, $height );
				imagealphablending ( $image_resized, false );
				$color = imagecolorallocatealpha ( $image_resized, 0, 0, 0, 127 );
				imagefill ( $image_resized, 0, 0, $color );
				imagesavealpha ( $image_resized, true );
				imagecopyresampled ( $image_resized, $res, $xOffset, $yOffset, 0, 0, $outWidth, $outHeight, $outWidth, $outHeight );
			}
			if($image_resized){
			imagepng ( $image_resized, "{$destFolder}" .  "-{$pathinfo['filename']}.png", 8 );
			imagedestroy ( $image_resized );
			$ck = '?__=' . microtime ();
            }
		}
		return $basLoacation.$pathinfo ['filename'] . ".png{$ck}";
	
	}

}