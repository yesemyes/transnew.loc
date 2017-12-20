<?php
class HelperModifier {
	
	
	public static function htmlentities($string) 
	{
		 
		return htmlentities ( $string, 3, 'UTF-8' );
	}

	public static function mt_rand($a,$b)
	{
		return  mt_rand($a,$b);
	}
	public static function yearRange($low,$high,$step=1)
	{
		$rteturn = range($low, $high,$step);
		$rteturn = array_flip($rteturn);
		foreach ($rteturn as $r=>&$k)
		{
			$k = $r;
		}
		
		
		return $rteturn;
		
	}
	public static function seondsToTime($number)
	{
		$seconds = ceil($number/1000);
		$minutes = floor($seconds/60);
		$second = $seconds%60;
		
		return $return = ($minutes < 10 ? "0":'').$minutes.':'.($second < 10 ? "0":'').$second;
		
	}
	public static function zerofill($number,$leadingZerrors=5)
	{
		
		$pattern = "%'0{$leadingZerrors}s";
		return sprintf($pattern,$number);
	} 
	public static function nf($number)
	{
		return number_format($number,0,'.'," ");
	} 
	public static function trim($str) 
	{
		return trim($str,"\n \t ");
	}
	public static function htmlspecialchars_decode($string) 
	{
		return  htmlspecialchars_decode($string,ENT_NOQUOTES,'UTF-8' );
	}
	public static function uid($prefix=null,$more=null) 
	{
		return uniqid($prefix,$more);
	}
	public static function round($val,$precision = null, $mode = null) 
	{
		return round($val,$precision = null, $mode = null);
		
	}
	public static function nl2br($string) 
	{
		return nl2br($string);
	}
	public static function banner_title_spliter($string)
	{
		$string = trim($string);
		$string = preg_replace('!\s+!', '_', $string);
		
		$words = explode('_', $string);
		$rar[]  = array_shift($words) ;
		$first = $second = '';
		
		if(!empty($words))
		{
			$rar[]  = array_shift($words) ;
		}
		$first = implode(' ', $rar);
		$second = implode(' ', $words);
		$pattern = '<span class="slidetit">%s</span><span class="slidedesc">%s</span>';
		return sprintf($pattern,$first,$second);
	} 
	public static function ubaoptionsDecorator($string) 
	{
		$return = explode(' ', $string,2);
		$return = implode('<br/>', $return);
		return  $return;
	}
	
	
}