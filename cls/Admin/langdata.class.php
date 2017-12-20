<?

class langdata extends base 
{
	public function __construct($file, $request, db $db) {
		parent::__construct ( $request->request );
		$this->request = $request->request;
		require_once ($file);
		foreach ( $root as $key => $value ) {
			
			if ($key == 'items') {
				foreach ( $value as $item => $iSettings ) {
					if (isset ( $iSettings ['options'] )) {
						$options = array ();
						switch ($iSettings ['options'] ['type']) {
							case 'database' :
								$options = $db->getOptions ( $iSettings ['options'] ['table'], $iSettings ['options'] ['value'], $iSettings ['options'] ['label'] );
								break;
							case 'database-tree' :
								$options = $db->getTree ( $iSettings ['options'] ['table'], '*', '', '', '', '', $request->request ['lng_id'] );
								break;
						}
						$iSettings ['_options'] = $options;
					}
					$value [$item] = $iSettings;
					
					if (isset ( $iSettings ['ml'] ) && $iSettings ['ml'] = 1) {
						$this->fileds ['ml'] [] = $item;
					} else {
						$this->fileds ['main'] [] = $item;
					}
				}
			}
			
			$this->{$key} = $value;
		}
		
		if ($this->request ['method'] == 'POST') {
			
			if (isset ( $this->request ['post'] ['action'] )) {
				$post = $this->request ['post'];
				$action = $post ['action'];
				if (method_exists ( $this, $action )) {
					$this->$action ( $post, $db );
				}
			
			}
		}
		
		$this->languages_id = $request->languages_id;
		$this->table ['main'] = __CLASS__;
		$this->getList ( $db );
		$this->view = __CLASS__ . '.tpl';
	
	}
	
	function saveToDb($post, $db) {
		$sendDataId = $post ['sendDataId'];
		$sendDataValue = $post ['sendDataValue'];
		$sendDataId = str_replace ( 'cell_t_', '', $sendDataId );
		$sendDataId = str_replace ( '_input', '', $sendDataId );
		
		list ( $lng_id, $id ) = explode ( "_", $sendDataId );
		
		$db->query ( "
								UPDATE  `langdata_ml` 
					            SET `value`='$sendDataValue' 
					            WHERE  `id`=$id AND `lng_id`=$lng_id "
					
					            );
	}
	function saveDbToFile($post,$db)
	{
		base::mkLngXML($db);
	}
	function saveNewRowsAjax($post,db $db)
	{
		
		foreach ($post['cell-name'] as $_index=>$value)
		{
			
			$value=filter_var($value,FILTER_CALLBACK,array('options'=>'convertAlpha'));
			$data['main']['name'] = $value;
			foreach ($post['cell_t_value'][$_index] as $lng_id=>$l_value)
			{	
						$l_value = filter_var($l_value,FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
						$l_value = mysql_escape_string($l_value);
						$data['ml']['value'][$lng_id] = $l_value;
						
			}
					
			$db->insertQuery('langdata',$data);
			$this->mkLngXML($db);	
			
		}
	}
	
	function checkForUnique($post,db $db)
	{
		
		$value=filter_var($post['term'],FILTER_CALLBACK,array('options'=>'convertAlpha'));
		$found = $db->getRow("langdata",'count(*) as qty',"name='{$value}'");
		
		die(json_encode($found['qty'] > 0));
		
		
	}
	function deleteRow($post,db $db)
	{
		
		
		$id = $post['id'];
		
		$query = " DELETE FROM langdata WHERE id=$id";
		$db->query($query );
		$query = " DELETE FROM langdata_ml WHERE id=$id";
		$db->query($query );
		base::mkLngXML($db);
		die("OK");
		
	}
	private function getList(db $db)
	{
		$member = "_".__FUNCTION__;
		$tbale = $this->table['main'];
		///$tbale =is_array($this->table) ?  array_shift($tbale):$tbale;
		$order = 'name ASC';
		if(isset($this->get['order']) && !empty($this->get['order']) && $this->get['order']['by'])
		{
			
			$order = implode(" ",$this->get['order']);
		}
		
		$limit = '';
		

		
		$this->{$member} = $db->getArray($tbale,'*','','',$order,$limit,'');
		
		$tmp = array();
		
		foreach ($this->{$member} as $row)
		{
			if(!isset($tmp[$row['id']]))
			{
				$tmp[$row['id']] = $row;	
				$tmp[$row['id']]['value'] =array($row['lng_id']=>$row['value']);
			}else{
			
			$tmp[$row['id']]['value'][$row['lng_id']] = $row['value'];
			}
		}
		$this->{$member} =$tmp;
		$this->{$member."_found"} =$db::$_found_rows[0]; 
		
		
	}

	public static function addFromDefault($term, $default) {
	
		$term = convertAlpha ( $term );
		if (! preg_match ( '/^[a-z][\w0-9-]*/i', $term )) {
			return false;
		}
	
		$db = db::getInstance ();
		$langs = $db->getOptions ( 'languages', 'id', 'id', 0 );
	
		$query = "INSERT IGNORE INTO `langdata` SET `name`=? ";
	
		if (($stmt = $db->prepare ( $query )) != false)
		{
			$stmt->bind_param ( 's', $term );
			$execute = $stmt->execute ();
			$error = $stmt->error;
				
			$stmt->close ();
				
			if ($execute) {
	
				$FindQuery = "SELECT `id` FROM `langdata` WHERE `name`=?";
	
				if (($stmt = $db->prepare ( $FindQuery )) != false)
				{
					$lastId = null;
					$stmt->bind_param ( 's', $term );
					$stmt->bind_result ( $lastId );
					$stmt->execute ();
					$stmt->fetch();
					$stmt->close ();
						
					if (! $lastId)
					{
						trigger_error ( "Term ".print_r($stmt,1)." not found" ,E_USER_ERROR);
	
						return false;
					}
	
				}
	
				$query = "INSERT IGNORE INTO `langdata_ml`(`id`,`lng_id`,`value`) VALUES (?,?,?)";
	
				if (($stmt = $db->prepare ( $query )) != false)
				{
					$id = $db->insert_id;
						
					foreach ( $langs as $lanId )
					{
						$stmt->bind_param ( 'iis', $lastId, $lanId, $default );
						$stmt->execute ();
					}
					$stmt->close ();
						
					base::mkLngXML ( $db );
				}else
				{
					trigger_error ( "--{$db->error}",E_USER_ERROR );
					return false;
				}
			} else {
				trigger_error ( "--$error" ,E_USER_ERROR);
	
				return false;
			}
		}
		else
		{
			trigger_error ( "--{$db->error}" ,E_USER_ERROR);
				
			return false;
		}
	}
}

?>