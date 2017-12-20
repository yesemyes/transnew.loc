<?
class fe404 extends front 
{
	
	function __construct($init)
	{
		
		/*
		***************************
		***************************
		*Path Params  Varibles
		* [0] lng
		* [1] home
		* [2] [home sub]
		***************************
		***************************
		*/
		$vars = get_object_vars($init);
		
		foreach ($vars as $key=>$value)
		{
			$this->{$key} = $value;
		}
		
		$this->_Headers[] = 'HTTP/1.0 404 Not Found';
		
		
	}
	
	

	
}
?>