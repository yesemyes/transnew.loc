<?
class acsess
{
	public $view;
	public $insert;
	public function __construct($init_obj,db $db)
	{
		$this->view = __CLASS__."-module.tpl";
		$vars = get_object_vars($init_obj);
		$this->db = $db;
		$this->_usersGroups = $db->getTree('users-groups','*','','','','',$init_obj->request['lng_id']);
		foreach ($vars as $key=>$value)
		{
			$this->{$key} = $value;
		
		}
		
		
		if(isset($this->request['query']['action']))
		{
			$function = "view".ucfirst($this->request['query']['action']);
			
			if( method_exists($this,$function))
			{
				$this->$function();
			}
		}
		
		if($this->request['method'] == 'POST')
		{
			$this->savePaost();
		}
	}
	public  function viewLaodUserAccses()
	{
		$group = $this->request['query']['group'];
		$selected = $this->db->queryFetch("SELECT be_menu_id,	action FROM `users-groups-access` WHERE  group_id= $group");
		
		$assign = array();
		
		foreach ($selected as $row)
		{
				$assign[$row['be_menu_id']][$row['action']]=1;
		}
		
		
		$this->smarty->assign('_m',  $this->be_menu);
		$this->smarty->assign('selected',  $assign);
		$this->smarty->assign('_pid',0);
		$this->smarty->assign('group',$group);
	}
	public function savePaost()
	{
		$insert = array();
		foreach ($this->request['post'] as $type=>$ids)
		{
			$idss = array_keys($ids);
			
			foreach ($idss as $id)
			{
				$insert [] = "({$this->request['post']['id']},$id,'$type')";	
			}
			
		}
		$this->insert = $insert;
		
		
		$this->db->query("DELETE FROM `users-groups-access` WHERE `group_id`={$this->request['post']['id']}");
		$inserts = implode(",\n",$this->insert);
		
		 $query = " INSERT INTO `users-groups-access`(`group_id`,`be_menu_id`,`action`) VALUES $inserts";
		 $this->db->query($query);
		 
		$group = $this->request['post']['id'];
		$selected = $this->db->queryFetch("SELECT be_menu_id,	action FROM `users-groups-access` WHERE  group_id= $group");
		$assign = array();
		
		foreach ($selected as $row)
		{
				$assign[$row['be_menu_id']][$row['action']]=1;
		}
		
		
		$this->smarty->assign('_m',  $this->be_menu);
		$this->smarty->assign('selected',  $assign);
		$this->smarty->assign('_pid',0);
		$this->smarty->assign('group',$group);
		
	}
}
?>