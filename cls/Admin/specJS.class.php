<?

class specJS
{
	
	public $view;
	public $script;
	public function __construct($init_obj,$db)
	{
		$this->view = __CLASS__."-module.tpl";
		$vars = get_object_vars($init_obj);
		foreach ($vars as $key=>$value)
		{
			$this->{$key} = $value;
		}
		
		$name = $this->request['query']['moduleJS'];
		$src = "js/$name.js";
		if(file_exists($src))
		{
			$this->script = file_get_contents($src);
		}else
		{
			echo //$name;
			$this->script = file_get_contents("js/empty.js");
		}
		
	}
}
?>