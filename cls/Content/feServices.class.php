<?
class feServices extends front {
	function __construct($init) {
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
		
        
        
		
		$vars = get_object_vars ( $init );
		foreach ( $vars as $key => $value ) {
			$this->{$key} = $value;
		}
		if (isset ( $this->get ['method'] )) {
			$_method = $this->get ['method'];
			$_method = ucfirst ( $_method );
			$_method = "validate{$_method}";
			
			if (method_exists ( $this, $_method )) {
				
				$this->$_method ();
			}
		}
		
		
		if(isset($this->path_params[2]))
		{
			$action = $this->path_params[2];
			
			$callBack = base::toMethodName($action,'','action');
			 
			if(method_exists($this, $callBack))
			{
				$this->$callBack();
			}else
			{
				$this->indexAction();
			}
		}else
		{
			$this->indexAction();
		}
		
	
	}
	public function addServiceAction()
	{
	   
		$this->mainTpl = 'services/add-form.tpl.html';
	}
	public function indexAction()
	{
		$where[] = "`active`='1'";
		$where[] = "`lng_id`='{$this->defLng['id']}'";
		$db = db::getInstance();
		
		
		$action = end($this->path_params);
		
		if(isset($this->path_params[2]))
		{
			$catAlias = $db->escape($this->path_params[2]);
			$cat = $db->getRow('servicescategory',"*","`alias`='{$catAlias}'");
			if(empty($cat))
			{
				$this->errorPage();
			}else
			{
				$where[] = "`servicescategory`='{$cat['id']}'";
			}
			
		}
		$condition = implode(" AND ", $where);
		$limit = $this->config['fe_paging_per_page'];
		
		
		 
		
		$page = isset($this->pages[$action]) ? intval($this->pages[$action]):1;
		$page =  $page > 1 ? $page:1;
		$offset = ($page-1)*$limit;
		
		$catalog = $db->getArray("services","*",$condition,'',"`position` ASC","$offset,$limit");
        $this->catalog = $catalog;
		$this->catalogFound =$db->_found_rows[0];
		$this->currentPage =$page;
		
		$this->mainTpl = 'services/body.tpl.html';
	}
	

}
?>