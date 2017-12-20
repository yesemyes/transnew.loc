<?php

class AutoLoader {
	public static $classList;
	public function __construct() {
		$libDir = ROOT_DIR . DIRECTORY_SEPARATOR . "cls" . DIRECTORY_SEPARATOR;
		$iterator = new RecursiveIteratorIterator ( new RecursiveDirectoryIterator ( $libDir ), RecursiveIteratorIterator::SELF_FIRST );
		foreach ( $iterator as $item ) {
			if (! $item->isDir ()) {
				$pathInfo = pathinfo ( $item );
				$all [$pathInfo ['filename']] = ( string ) $item;
			}
		}
		
		self::$classList = $all;
		 
		spl_autoload_register ( array (__CLASS__, 'includeClass' ) );
	
	}
	public static function includeClass($class_name) {
		
		$all = self::$classList;
		$require = $class_name . '.class';
		if (isset ( $all [$require] )) 
		{
			require_once ($all [$require]);
			return true;
		} else {
			
			return false;
		}
	}
}