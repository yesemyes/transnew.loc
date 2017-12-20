<?
class feContacts extends front 
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
			$captcha= isset($_POST['captcha']) ? $_POST['captcha']:'SPAMMER' ;
			$captcha_keystring =isset( $_SESSION['captcha_keystring']) ? $_SESSION['captcha_keystring']:'NOCAPTCH';
			$contacts_email_content = "" ;
			$contacts = $this->post['contacts'];
			
			
			foreach ($contacts as $key=>$value)
			{
				$contacts_email_content .= $this->trans($key).":\t".ss($value)."\r\n";	
				$contacts [$key] = ss($value);
			}
		 
			base::mailSend ($contacts_email_content,$contacts['subject'],$this->config['site_admin_mail'],'plain',$contacts['mail'],$contacts['name']);
			 base::redirect ( HelperFunction::link ( array ('contacts', 'message-send-succes' ) ) );
			
			
		}
		if(count($this->path_params) == 2)
			$this->mainTpl = 'contacts/body.tpl.html';
		if(count($this->path_params) == 3)
		{
			$this->mainTpl = 'default/body.tpl.html';
		}
		
	}
}
?>