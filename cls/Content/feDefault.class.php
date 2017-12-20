<?
class FeDefault extends base 
{
	function __construct($init)
	{
			/*
		***************************
		***************************
		*Path Params  Varibles
		* [0] lng
		* [1] home
		***************************
		***************************
		*/
		$vars = get_object_vars($init);
		foreach ($vars as $key=>$value)
		{
			$this->{$key} = $value;
		}
		
		$this->mainTpl = 'default/body.tpl.html';
		
	}
}
?>