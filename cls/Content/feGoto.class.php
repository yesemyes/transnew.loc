<?
class FeGoto extends base 
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
		$link = $this->get['link'];
		$link = urldecode($link);
		$this->redirect($link);
		$this->mainTpl = 'default/body.tpl.html';
		
	}
}
?>