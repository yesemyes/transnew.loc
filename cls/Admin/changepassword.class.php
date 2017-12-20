<?

class changepassword extends base 
{
	public  function  __construct($request,db $db)
	{
		parent::__construct($request->request);
		$this->request = $request->request;
		
			
		
		
		
		if($this->request['method'] == 'POST')
		{
			
			$post =$this->request['post'];
			
			if(isset($this->request['post']['action']))
			{
					
					$action = $post['action'];
					if(method_exists($this,$action))
					{
						$this->$action($post,$db);
					}else
					{
						
					}
					
			
			}
		}
		
		$this->languages_id = $request->languages_id;
		$this->view = __CLASS__.'.tpl';
		
		
	}
	private function validateAndSave($post,db $db)
	{
		$bbe_user = $_SESSION['be_user'];
		extract($post);
		$be_password = md5($be_password);
		$row = $db->getRow('users','`id` ,`name` ,`login`, `group`'," `password`='$be_password'");
		if($row['id'] == $bbe_user['id'])
		{
			$be_new_password = filter_var($be_new_password,FILTER_CALLBACK,array('options'=>'mkPassword'));
			$be_re_password = filter_var($be_new_password,FILTER_CALLBACK,array('options'=>'mkPassword'));
			
			$be_new_password = ($be_new_password == '__FALSE__') ? false:md5($be_new_password);
			$be_re_password = ($be_re_password == '__FALSE__') ? false:md5($be_re_password);
			
			if(!$be_new_password)
				$this->_errors['BE_NEW_PASSWORD'] ='be_new_password' ;
			if(!$be_re_password)
				$this->_errors['BE_RE_PASSWORD'] ='be_re_password' ;
				
			if(!isset($this->_errors))
			{
				if($be_new_password != $be_re_password)
				{
					$this->_errors['BE_RE_PASSWORD'] ='be_re_password' ;
					$this->_errors['BE_NEW_PASSWORD'] ='be_new_password' ;
				}
				
			}	
			
		}else
		{
			$this->_errors['BE_PASSWORD'] ='be_password' ;
		
		}
		
		
		if(!isset($this->_errors))
		{
			$id = $row['id'];
			$db->query("UPDATE `users` SET `password`='$be_new_password' WHERE  `id`='{$row['id']}'");
			$this->_status = "PASSWORD_UPDATED";
			
			
		}
		
	}
	
	
}

?>