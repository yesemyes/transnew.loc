<?php
class Helper {
	
	public static $inst = null;
	
	public static function getInst()
	{
		if(! self::$inst)
		{
			self::$inst = new self();
		}
		return self::$inst;
	}
	public  function __call($name,$params) 
	{
		$callBack = str_replace('function_', '', $name);
		
		$smarty = array_pop($params);
		$p = array_shift($params);
      
         
		$return = HelperFunction::$callBack($p);
		
		if(isset($p['assign']))
		{
			$smarty->assign($p['assign'],$return);
		}else
		{
			return $return;
		}
	}
	public static function register($smarty) 
	{
		self::register_function ( $smarty );
		self::register_modifier ( $smarty );
		self::register_block ( $smarty );
		self::register_outputfilter ( $smarty );
	}
	
	public static function __callStatic($name, $arguments) {
		
		list ( $prefix, $callBack ) = explode ( '_', $name, 2 );
		$callBackMethod = lcfirst ( $callBack );
		$callBackClass = "Helper" . ucfirst ( $prefix );
		$callBack = array ($callBackClass, $callBackMethod );
		
		$smarty = array_pop ( $arguments );
		$params = array_shift ( $arguments );
		
		$result = call_user_func ( $callBack, $params );
		
		if (isset ( $params ['assign'] )) {
			
			$smarty->assign ( $params ['assign'], $result );
		} else {
			return $result;
		}
	
	}
	static private function register_function(Smarty $smarty) {
		$callbacks = get_class_methods ( 'HelperFunction' );
		$self = self::getInst();
		
		foreach ( $callbacks as $func ) 
		{
			$tag = ucfirst ( $func );
			
			
			$callBack = array($self ,"function_$func");
			$smarty->register_function($tag, $callBack);
		
		}
	}

	static private function register_modifier(Smarty $smarty) {
		
		$callbacks = get_class_methods ( 'HelperModifier' );
		
		
		foreach ( $callbacks as $tag ) {
			$callBack = array ('HelperModifier', $tag );
			
			$smarty->register_modifier ( $tag, $callBack );
		}
	
	}
	static private function register_block(Smarty $smarty) {
		
		$callbacks = get_class_methods ( 'HelperBlock' );
		$self = self::getInst();
		
		foreach ( $callbacks as $func )
		{
			$tag = ucfirst ( $func );
				
				
			$callBack = array ('HelperBlock', $func );
			$smarty->register_block($tag, $callBack);
		
		}
	
	}
	static private function register_outputfilter(Smarty $smarty) 
	{
		
		$callbacks = get_class_methods ( 'HelperOutputfilter' );
		
		foreach ( $callbacks as $tag ) {
			
			$callBack = array ('HelperOutputfilter', $tag );
			$smarty->register_outputfilter($callBack);
		}
	}
}

?>