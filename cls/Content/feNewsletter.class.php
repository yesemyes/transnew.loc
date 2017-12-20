<?
class feNewsletter extends front 
{
	function __construct($init)
	{
		/*
		***************************
		***************************
		*Path Params  Varibles
		* [0] lng
		* [1] home
		* [2] [message]
		***************************
		***************************
		*/
		$vars = get_object_vars($init);
		foreach ($vars as $key=>$value)
		{
			$this->{$key} = $value;
		}
		if(isset($this->get['method']))
		{
			$_method = $this->get['method'];
			$_method=ucfirst($_method);
			$_method = "validate{$_method}";
			
			if (method_exists($this,$_method))
			{
				
				
				$this->$_method();
			}
		}
		
		if($this->method == 'POST')
		{
			
			$contacts_email_content = "" ;
			$contacts = $this->post['contacts'];
			$newsLeater = array();
			
			$contacts['date']   = date('Y-m-d');
			$contacts['active'] = 1;
			
			foreach ($contacts as $key=>$value)
			{
			
				$newsLeater[] =" `$key`='".ss($value)."'";
			}
			

			$newsLeater_str = implode(",",$newsLeater);
			
			$query = "REPLACE  INTO newsletter SET $newsLeater_str ";
			$this->db->query($query);
			
			$this->redirect($this->_mklink('newsletter','you-are-subscribed'));
			
		}
		if(count($this->path_params) == 2)
			$this->mainTpl = 'newsletter/body.tpl.html';
		if(count($this->path_params) == 3)
		{
			$this->mainTpl = 'newsletter/message.tpl.html';
		}
		
	}
}
?>