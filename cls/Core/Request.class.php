<?php
class Request {
	public $request;
	public static  $currentLang ;
	public static  $instance ;
	public static  $languages ;
	public static  $xRequestedWith=false ;
	
	function __construct($lng=null) {
		$this->modRewrite ();
		
		$this->config ( $lng );
		
		self::$instance = $this;
	
	}
	private function modRewrite() {
		
		if (isset ( $_SERVER ['HTTP_X_REQUESTED_WITH']) &&  $_SERVER ['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
		{
			self::$xRequestedWith = true;
		}
		
		
		$_SERVER ['REQUEST_URI'] = $this->RemoveXSS ( $_SERVER ['REQUEST_URI'] );
		$REQUEST_URI = $_SERVER ['REQUEST_URI'];
		$REQUEST_URL = parse_url ( $REQUEST_URI );
		
		$query = array ();
		if (isset ( $REQUEST_URL ['query'] )) {
			$query_str = $REQUEST_URL ['query'];
			parse_str ( $REQUEST_URL ['query'], $query );
		}
		$REQUEST_URL ['query_str'] = $query_str;
		$REQUEST_URL ['query'] = $query;
		$REQUEST_URL ['method'] = $_SERVER ['REQUEST_METHOD'];
		$path = $REQUEST_URL ['path'];
		
		if (preg_match ( '/\.(html)$/', $path )) {
			$path = preg_replace ( '/\.(html)$/', '/', $path );
		
		}
		$path = trim ( $path, " /" );
		
		if ($path)
			$path = explode ( "/", $path );
		else
			$path = array ();
		
		$pages = array ();
		$num = array ();
		
		foreach ( $path as $kk => $item ) {
			if (is_numeric ( $item )) {
				$num [] = $item;
			}
			if (strstr ( $item, '-' )) {
				$parts = explode ( '-', $item );
				$tail = array_pop ( $parts );
				if (is_numeric ( $tail )) {
					$key = implode ( '-', $parts );
					$key = strtolower ( $key );
					//					$key = str_replace(' ','',$key);
					$pages [$key] = $tail;
					$path [$kk] = $key;
				} else {
					array_push ( $parts, $tail );
					$key = implode ( '-', $parts );
					//					$key = ucwords(strtolower($key)); 
					//					$key = str_replace(' ','',$key);
					$path [$kk] = $key;
				}
			}
		}
		foreach ($path as &$pitem)
		{
			$pitem = urldecode($pitem);
		}
		$REQUEST_URL ['path_params'] = $path;
		$REQUEST_URL ['path_numeric'] = $num;
		$REQUEST_URL ['pages'] = $pages;
		$REQUEST_URL ['post'] = $_POST;
		$REQUEST_URL ['files'] = $_FILES;
		$REQUEST_URL ['get'] = $_GET;
		$this->request = $REQUEST_URL;
	
	}
	private function RemoveXSS($val) {
		// remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
		// this prevents some character re-spacing such as <java\0script>
		// note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
		$val = preg_replace ( '/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val );
		
		// straight replacements, the user should never need these since they're normal characters
		// this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&#X3A &#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29>
		$search = 'abcdefghijklmnopqrstuvwxyz';
		$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$search .= '1234567890!@#$%^&*()';
		$search .= '~`";:?+/={}[]-_|\'\\';
		for($i = 0; $i < strlen ( $search ); $i ++) {
			// ;? matches the ;, which is optional
			// 0{0,7} matches any padded zeros, which are optional and go up to 8 chars
			

			// &#x0040 @ search for the hex values
			$val = preg_replace ( '/(&#[xX]0{0,8}' . dechex ( ord ( $search [$i] ) ) . ';?)/i', $search [$i], $val ); // with a ;
			// &#00064 @ 0{0,7} matches '0' zero to seven times
			$val = preg_replace ( '/(&#0{0,8}' . ord ( $search [$i] ) . ';?)/', $search [$i], $val ); // with a ;
		}
		
		// now the only remaining whitespace attacks are \t, \n, and \r
		$ra1 = Array ('javascript', 'vbscript', 'expression', 'applet', 'blink', 'style', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'base' );
		$ra2 = Array ('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload' );
		$ra = array_merge ( $ra1, $ra2 );
		
		$found = true; // keep replacing as long as the previous round replaced something
		while ( $found == true ) {
			$val_before = $val;
			for($i = 0; $i < sizeof ( $ra ); $i ++) {
				$pattern = '/';
				for($j = 0; $j < strlen ( $ra [$i] ); $j ++) {
					if ($j > 0) {
						$pattern .= '(';
						$pattern .= '(&#[xX]0{0,8}([9ab]);)';
						$pattern .= '|';
						$pattern .= '|(&#0{0,8}([9|10|13]);)';
						$pattern .= ')*';
					}
					$pattern .= $ra [$i] [$j];
				}
				$pattern .= '/i';
				$replacement = substr ( $ra [$i], 0, 2 ) . '<x>' . substr ( $ra [$i], 2 ); // add in <> to nerf the tag
				$val = preg_replace ( $pattern, $replacement, $val ); // filter out the hex tags
				if ($val_before == $val) {
					// no replacements were made, so exit the loop
					$found = false;
				}
			}
		}
		return $val;
	}
	private function config($lng=null) 
	{
	
		$db = db::getInstance();
		self::$languages = $db->getArray('languages', '*', 'active', '', '', '', 'code');
 		$config  = parse_ini_file ( ROOT_DIR . '/config/config.ini', true );
		$lang = $config ['lang'];
		$path_params = $this->request ['path_params'];
		if (count ( $path_params ) == 1 && in_array ( $path_params [0], $lang ))
			$path_params [] = $config ['setup'] ['defaultModule'];
		
		if (empty ( $path_params )) 
		{
			
			$this->request ['module'] = $config ['setup'] ['defaultModule'];
			$this->request ['lng'] = $lang ['default'];
			
			$path_params [] = $this->request ['lng'];
			$path_params [] = $this->request ['module'];
			$this->request ['path_params'] = $path_params;
			
			self::$currentLang  = self::$languages [ $this->request ['lng']];
			return;
		
		}
		$this->request ['module'] = $config ['setup'] ['defaultModule'];
		
		$f = array_shift ( $path_params );
		$m = array_shift ( $path_params );
		
		if ($m) {
			
			array_unshift ( $path_params, $m );
			$this->request ['module'] = $m;
		}
		
		array_unshift ( $path_params, $f );
		
		
		
		if (! in_array ( $f, $lang )) {
			
			$this->request ['lng'] = $lang ['default'];
			array_unshift ( $path_params, $lang ['default'] );
			$this->request ['module'] = $f;
		
		} elseif ($m) {
			
			$this->request ['lng'] = $f;
		
		}
		
		
		$requestLng =  $this->request['lng'];
		
		$lngIndex = $lng ? $lng:$requestLng;
		
		self::$currentLang  = self::$languages [$lngIndex ];
		
		if(self::$currentLang ['code'] == 'am')
		{
			setlocale(LC_TIME, 'hy_AM.UTF8');
		}
		
		if(self::$currentLang ['code'] == 'ru')
		{
			setlocale(LC_TIME, 'ru_RU.UTF8');
		}
		
		$this->request ['path_params'] = $path_params;
	}

	
	/**
	 * @return Request
	 */
	public static function getInstance()
	{
	
		if (! self::$instance) {
			new self ( );
		}
	
		return self::$instance;
	
	}
}
