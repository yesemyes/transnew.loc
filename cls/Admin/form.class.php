<?
class form {
	public $fileds;
	public $insert;
	public $dbquery;
	public $dbqueryml;
	public $db;
	public $externalResurces;
	public function __construct($file, $request, db $db) {
		
		$this->db = $db;
		foreach ( $request as $key => $value )
			$this->{$key} = $value;
		
		foreach ( $request->request as $key => $value ) {
			
			$this->{$key} = $value;
		}
		foreach ( $this->get as $key => $value ) {
			
			$this->{$key} = $value;
		}
		
		if ($this->method == 'POST') {
			foreach ( $this->post as $key => $value ) {
				$this->{$key} = $value;
			}
		}
		//$root = array();
		require_once ($file);
		$this->processFileds ( $root );
		
		//		$this->table ['main'] = $this->setup ['table'];
		$dbFileds = $db->tables [$this->table ['main']];
		//		
		if (key_exists ( $this->setup ['table'] . '_ml', $db->tables )) {
			$dbFileds = array_merge ( $dbFileds, $db->tables [$this->setup ['table'] . '_ml'] );
			$this->table ['ml'] = $this->setup ['table'] . '_ml';
		}
		
		$values = get_object_vars ( $this );
		foreach ( $dbFileds as $field ) {
			$value = null;
			if (key_exists ( $field, $values )) {
				$value = $values [$field];
			}
			if ($field == 'pid' && $value == null) {
				$value = 0;
			}
			$this->SEARCH [$field] = $value;
		}
		
		$module = $this->setup ['view'];
		
		$this->getWhere ();
		
		if (key_exists ( 'action', $values )) {
			
			if ($this->action == 'edit' || $this->action == 'insert') {
				
                
				if ($this->method == 'POST') {
					
					if (isset ( $this->post ['upload-action'] )) {
						$resultUpload = $this->saveUpload ();
						if ($resultUpload)
							$this->FORM_DATA ();
					
					} elseif ($this->post ['deleteFile']) {
						$this->deleteFiled ();
					} else {
						$valid = $this->validatePost ();
						
						if (isset ( $this->setup ['afterSave'] )) {
							$afterSave = $this->setup ['afterSave'];
							base::$afterSave ( $db,$this->id );
						}
						
						if ($valid) {
							$this->processFileds ( $root, $db );
							$this->FORM_DATA ();
						}
					}
				
				} else {
					$this->FORM_DATA ( $db );
				}
			
			} elseif ($this->action == 'delete') {
				$this->deleteAll ();
			
			} elseif ($this->action == 'UpdateFiled') {
				$_field = $this->get ['field'];
				$_value = $this->get ['value'];
				$_id = $this->get ['id'];
				
				$item = $this->items [$_field];
				
				if (isset ( $item ['ml'] ) && $item ['ml']) {
					$table = $this->table ['ml'];
				} else {
					$table = $this->table ['main'];
				}
				
				$query = " UPDATE `$table`  SET $_field='$_value' WHERE id=$_id";
				
				$this->db->query ( $query );
				
				$row = $this->db->getRow ( $table, '*', "id=$_id" );
				$this->smarty->assign ( '_field', $_field );
				$this->smarty->assign ( 'value', $_value );
				$this->smarty->assign ( '_id', $_id );
				$this->smarty->assign ( '_settings', $item );
			
			} elseif ($this->action == 'savePosition') {
				
				$key = "treeNode-{$this->curModule['name']}";
				
				if (isset ( $this->post [$key] )) {
					$this->savePosition ( $db, $this->post [$key] );
				
				}
			} elseif ($this->action == 'getJson') {
				$function = "getJson{$this->get['function']}";
				
				if (method_exists ( $this, $function )) {
					$result = $this->$function ();
					die ( json_encode ( $result ) );
				
				}
			}
		
		} 

		elseif (key_exists ( 'action', $values ) && $this->action == 'delete') {
		
		} else {
			
			$this->$module ( $db );
		}
		$this->view = $this->setup ['view'] . '.tpl';
		var_dump($this);
	}
	private function processFileds($root) {
		$db = $this->db;
		foreach ( $root as $key => $value ) {
			if (! isset ( $this->pid ))
				$this->pid = 0;
			$this->table ['main'] = $this->setup ['table'];
			if ($key == 'items') {
				
				foreach ( $value as $item => $iSettings ) {
					
					if (isset ( $iSettings ['type'] ) && $iSettings ['type'] == 'fileImage') {
						$this->externalResurces [$item] = $iSettings;
					}
					
					if (isset ( $iSettings ['options'] )) {
						$options = array ();
						
						switch ($iSettings ['options'] ['type']) {
							
							case 'database' :
								$where = $iSettings ['options'] ['thislevel'] ? 'pid=' . $this->pid : '';
								$where = $iSettings ['options'] ['where'] ? $iSettings ['options'] ['where'] : '';
								 
								$group = $iSettings ['options'] ['group'] ? $iSettings ['options'] ['group'] : '';
								$order = $iSettings ['options'] ['order'] ? $iSettings ['options'] ['order'] : '';
								
								$options = $db->getOptions ( $iSettings ['options'] ['table'], $iSettings ['options'] ['value'], $iSettings ['options'] ['label'], isset ( $iSettings ['options'] ['ml'] ) && $iSettings ['options'] ['ml'] ? $this->request ['lng_id'] : 0, $where,$group,$order );
								break;
							case 'database-tree' :
								$where = $iSettings ['options'] ['where'] ? $iSettings ['options'] ['where'] : '';
								$options = $db->getTree ( $iSettings ['options'] ['table'], '*', $where, '', '', '', $this->request ['lng_id'] );
								break;
							case 'options' :
								
								$options = $iSettings ['options'] ['_options'];
								break;
						}
						$iSettings ['_options'] = $options;
					}
					
					$value [$item] = $iSettings;
					
					if (isset ( $iSettings ['ml'] ) && $iSettings ['ml'] = 1) {
						$this->table ['ml'] = $this->table ['main'] . "_ml";
						$this->fileds ['ml'] [] = $item;
					
					} elseif (isset ( $iSettings ['rel'] ) && isset ( $iSettings ['rel'] )) {
						$this->fileds ['rel'] [] = $item;
						
						$this->table ['rel'] [$item] = $root ['setup'] ['table'] . "_" . $item . "_rel";
					
					} elseif(! isset($iSettings ['exclude'] )) {
						
						$this->fileds ['main'] [] = $item;
					}
				}
			}
			
			//			$root['setup']['listelements']
			

			$this->{$key} = $value;
		}
		
		if (! isset ( $this->setup ['listelements'] ))
			$this->setup ['listelements'] = array_keys ( $root ['items'] );
		
		foreach ( $this->setup ['listelements'] as $key => $value ) {
			if (isset ( $root ['items'] [$value] ['rel'] ))
				unset ( $this->setup ['listelements'] [$key] );
		}
	
	}
	public function getWhere() {
		
		$where = array ();
		
		foreach ( $this->SEARCH as $key => $value ) {
			//echo "$key=>$value<br/>";
			if ($key == 'pid') {
				
				$where [] = "(`$key`='$value')";
			}
			
			if (! ($value == null || $value == '')) {
if (is_array ( $value )) {
					
					if (isset ( $this->items [$key] ['type'] ) && $this->items [$key] ['type'] == 'datetimepicker') {
						if (isset ( $value ['from'] ) && $value ['from']) {
							
							list ( $d, $m, $y ) = explode ( "/", $value ['from'] );
							$v = "$y-$m-$d";
							
							$where [] = "(`$key` >= '$v')";
						}
						
						if (isset ( $value ['to'] ) && $value ['to']) {
							list ( $d, $m, $y ) = explode ( '/', $value ['to'] );
							$v = "$y-$m-$d";
							
							$where [] = "(`$key` <= '$v')";
						}
					}
				
				} else {
				$value = mysql_escape_string ( $value );
				if (isset ( $this->items [$key] )) {
					if (isset ( $this->items [$key] ['type'] ) && $this->items [$key] ['type'] == 'text') {
						
						$value = mb_strtolower ( $value );
						$where [] = " (LOWER(`$key`) LIKE '$value%' )";
					} else {
						$where [] = "(`$key`='$value')";
					}
				} else
					$where [] = "(`$key`='$value')";
			}
}
		
		}
		if (isset ( $this->setup ['where'] ))
			$where [] = $this->setup ['where'];
		
		$where = implode ( ' AND ', $where );
		
		$this->where = $where;
	}
	private function FORM_DATA() {
		
		$member = "_" . __FUNCTION__;
		$return = array ();
		$db = $this->db;
		foreach ( $this->fileds as $type => $fields ) {
			if ($type == 'main') 
			{
				$select = implode ( "`,`", $fields );
				$t = $this->table [$type];
				$q = "SELECT `$select` FROM `$t` WHERE id=" . ($this->id == null ? 0 : $this->id);
				$data = $db->queryFetchOne ( $q );
				$return [$type] = $data;
			}
			if ($type == 'rel') {
				foreach ( $fields as $filed ) {
					$select = $filed;
					$t = $this->table [$type] [$filed];
					$q = "SELECT `$select` FROM `$t` WHERE id=" . ($this->id == null ? 0 : $this->id);
					$data = $db->queryFetch ( $q );
					foreach ( $data as $row ) {
						$return [$type] [$filed] [] = $row [$filed];
					}
				}
			}
			
			if ($type == 'ml') {
				$fieldsS = $fields;
				$fieldsS [] = 'lng_id';
				$select = implode ( "`,`", $fieldsS );
				$t = $this->table [$type];
				$q = "SELECT `$select` FROM `$t` WHERE id=" . ($this->id == null ? 0 : $this->id);
				$data = $db->queryFetch ( $q );
				foreach ( $data as $row ) {
					foreach ( $row as $keys => $v ) {
						if ($keys != 'lng_id')
							$return [$type] [$keys] [$row ['lng_id']] = $v;
					}
				}
			}
		}
		
		$this->{$member} = $return;
	
	}
	private function getList() {
		$db = $this->db;
		$member = "_" . __FUNCTION__;
		$tbale = $this->table ['main'];
		///$tbale =is_array($this->table) ?  array_shift($tbale):$tbale;
		$order = '';
		if (isset ( $this->get ['order'] ) && ! empty ( $this->get ['order'] ) && $this->get ['order'] ['by']) {
			
			$order = implode ( " ", $this->get ['order'] );
		} else {
			if (isset ( $this->setup ['order'] )) {
				$order = $this->setup ['order'];
			} elseif ($this->setup ['items'] ['position']) {
				$order = ' position ';
			}
		
		}
		$limit = '';
		
		$this->get ['limit'] ['limit'] = isset ( $this->get ['limit'] ['limit'] ) ? $this->get ['limit'] ['limit'] : $this->_config ['limit'];
		$this->get ['limit'] ['page'] = isset ( $this->get ['limit'] ['page'] ) ? $this->get ['limit'] ['page'] : 1;
		
		if (isset ( $this->get ['limit'] ) && ! empty ( $this->get ['limit'] ) && $this->get ['limit'] ['limit']) 
		{
			
			$page = $this->get ['limit'] ['page'] > 0 ? $this->get ['limit'] ['page'] : 1;
			
			$limit = $this->get ['limit'] ['limit'] > 0 ? $this->get ['limit'] ['limit'] : $this->config['limit'];
			if( $this->get ['limit'] ['limit'] > 0 AND  $this->get ['limit'] ['limit'] !=  $this->config['limit'])
			{
				$db->query("UPDATE `config` SET `value`='{$this->get ['limit'] ['limit']}' WHERE `name`='limit'");
			}
			$limit = ($page - 1) * $limit . ", " . $limit;
		
		}
		
		$this->where;
		
		if (isset ( $this->setup ['listelements'] ) && ! empty ( $this->setup ['listelements'] )) {
			
			$select = $this->setup ['listelements'];
			$select [] = 'id';
			$select = "`" . implode ( "`, `", $select ) . "`";
		} else
			$select = "*";
		
		$this->{$member} = $db->getArray ( $tbale, $select, $this->where, '', $order, $limit );
		
		$this->{$member . "_found"} = db::$_found_rows;
	
	}
	private function getTree() {
		$db = $this->db;
		$member = "_" . __FUNCTION__;
		$tbale = $this->table ['main'];
		$order = ' position ASC ';
		
		$_cookiName = $this->curModule ['name'] . "treeNodes";
		
		if (isset ( $_COOKIE [$_cookiName] )) {
			
			$thisCookieS = $_COOKIE [$_cookiName];
			$thisCookieS = stripslashes ( $thisCookieS );
			$thisCookie = ( array ) json_decode ( $thisCookieS );
		
		} else {
			$thisCookie = array ();
		}
		
		$thisCookie [$this->pid] ++;
		
		setcookie ( $_cookiName, json_encode ( $thisCookie ), time () + 5 * 60 * 60 * 60 );
		
		$this->{$member} = $db->getTree ( $tbale, '*', $this->where, '', $order );
		
		
		$this->smarty->assign ( '_COOKIE', $thisCookie );
	
	}
	public function validatePost() {
		$errors = 0;
		
		foreach ( $this->items as $key => $item ) {
			
			
			
			if (isset ( $item ['ml'] ) && $item ['ml']) {
				$e = $this->validateMLItem ( $key, $item );
			} elseif (isset ( $item ['rel'] ) && $item ['rel']) {
				$e = $this->validateReLItem ( $key, $item );
			} else
				$e = $this->validateItem ( $key, $item );
			$errors += $e;
		}
		
		if ($errors < 1) {
			$this->savePost ();
		
		}
	}
	public function validateItem($key, $item) {
		
		if (isset ( $item ['type'] )) {
			
			$testFunction = "Validate" . ucfirst ( $item ['type'] );
			
			
			
			if (method_exists ( $this, $testFunction )) {
				
				$return = $this->$testFunction ( $key, $item );
				return $return;
			}
		}
		
		$return = 0;
		
		$data = isset ( $this->_FORM_DATA ['main'] [$key] ) ? $this->_FORM_DATA ['main'] [$key] : null;
		
		if (isset ( $item ['required'] ) && $item ['required'] && ! $data) {
			$return ++;
			$this->items [$key] ['_ERRORS'] [] = '__ERROR_REQUIRED__';
		}
		
		if (isset ( $item ['unique'] ) && $item ['unique'] && $data) {
			$return = $this->isUnique ( $key, $item );
		}
		
		if (isset ( $item ['FILTER_VAR'] )) {
			if ($data) {
				$validator = $item ['FILTER_VAR'] ['FILTER'];
				$OPTIONS = isset ( $item ['FILTER_VAR'] ['OPTIONS'] ) ? $item ['FILTER_VAR'] ['OPTIONS'] : array ();
				//$data = urlencode($data);
				$result = filter_var ( $data, $validator, $OPTIONS );
				
				
				//echo $data."--".$validator."-".$result."*<br/>";
				
				
				if ($result == '__FALSE__')
					$result = false;
				
				
				
				if ($result == false) {
					$return ++;
					
					$this->items [$key] ['_ERRORS'] [] = "__ERROR_{$validator}__" . implode ( "_", $OPTIONS );
				}
				
				$data = $this->_FORM_DATA ['main'] [$key] = $result;
			}
		}
		
		if (! $data && isset ( $item ['default'] )) {
			$data = $item ['default'];
		}
		
		$this->insert ['main'] [$key] = $data;
		
		return $return;
	}
	public function validateReLItem($key, $item) {
		
		
		
		$data = isset ( $this->_FORM_DATA ['rel'] [$key] ) ? $this->_FORM_DATA ['rel'] [$key] : array ();
		
		
		if(!empty($data))
		{
			$this->insert ['rel'] [$key] = $data;
		}
		
		
	    if (isset ( $item ['type'] ))
	    {
			
			$testFunction = "Validate" . ucfirst ( $item ['type'] );
			
			if (method_exists ( $this, $testFunction )) 
			{
				
				$return = $this->$testFunction ( $key, $item ,$data);
				return $return;
			}
		}
		
		$return = 0;
		if (isset ( $item ['required'] ) && $item ['required'] && empty ( $data ))
			$return ++;
		
		
		
		
		return $return;
	}
	public function validateMLItem($key, $item) {
		
		$return = 0;
		$data = $this->_FORM_DATA ['ml'] [$key];
		
		$data = isset ( $this->_FORM_DATA ['ml'] [$key] ) ? $this->_FORM_DATA ['ml'] [$key] : null;
		
		foreach ( $data as $lng => $value ) {
			if (isset ( $item ['required'] ) && $item ['required'] && ! $value) {
				$return ++;
				$this->items [$key] ['_ERRORS'] [$lng] [] = '__ERROR_REQUIRED__';
			}
		}
		
		if (isset ( $item ['FILTER_VAR'] )) {
			$validator = $item ['FILTER_VAR'] ['FILTER'];
			$OPTIONS = isset ( $item ['FILTER_VAR'] ['OPTIONS'] ) ? $item ['FILTER_VAR'] ['OPTIONS'] : array ();
			
			foreach ( $data as $lng => $value ) {
				if ($value) {
					
					$result = filter_var ( $value, $validator, $OPTIONS );
					
					if ($result == '__FALSE__')
						$result = false;
					
					if ($result == false) {
						$return ++;
						$this->items [$key] ['_ERRORS'] [$lng] [] = "__ERROR_{$validator}__" . implode ( "_", $OPTIONS );
					}
					$data [$lng] = $result;
					$this->_FORM_DATA ['ml'] [$key] [$lng] = $result;
				}
			}
		
		}
		
		foreach ( $data as $lng => $value ) {
			$this->insert ['ml'] [$lng] [$key] = $value;
		}
		return $return;
	}
	public function savePost() 
	{
		$languages = $this->languages;
		$insQueryArray = array ();
		
		
		$array_keys = array_keys($this->insert) ;
		
		if($array_keys[0] == 'ml' )
			$this->insert = array_reverse($this->insert);
		
		
		foreach ( $this->insert as $type => $values ) 
		{
		     
			if ($type == 'main') {
				foreach ( $values as $field => $val ) {
					
					$val = mysql_escape_string ( $val );
					$insQueryArray [$type] [] = "`$field`='$val'";
				}
				
				$insert = $this->table [$type] . " SET " . implode ( ",", $insQueryArray [$type] );
				if ($this->id) {
				
					$qf = " UPDATE ";
					$qt = " WHERE id=" . $this->id;
					
					$query = $qf . $insert . $qt;
					$this->db->query ( $query );
					$this->dbquery = $query;
				
				} else {

				$qf = "INSERT INTO  ";
					$qt = "";
					$query = $qf . $insert . $qt;
					
					$this->db->query ( $query );
					$this->id = $this->db->insert_id;
					$this->action = 'edit';
					$this->dbquery = $query;
				}
			
			}
			
			if ($type == 'ml') {
				foreach ( $values as $lng_id => $data ) {
					$repl = array ();
					
					foreach ( $data as $f => $v ) {
						$v = mysql_escape_string ( $v );
						$repl [] = "`$f`='$v'";
					}
					
					$repl [] = "`lng_id`=$lng_id";
					$repl [] = "`id`='{$this->id}'";
					
					$query = "REPLACE  INTO " . $this->table [$type] . " SET " . implode ( ',', $repl );
					$this->dbqueryml [$lng_id] = $query;
					$this->db->query ( $query );
				}
				;
			
			}
			
			if ($type == 'rel') 
			{
				
				
				foreach ( $values as $item => $data )
				{
					
					
					$query =" DELETE FROM {$this->table [$type][$item]} WHERE id ={$this->id} ";
					$this->db->query ( $query );
					if(empty($data))
					continue;
					
					
					foreach ( $data as $f => $v ) 
					{
						
						if(!is_array($v))
						{
						
								$repl = array ();
								$v = mysql_escape_string ( $v );
								$repl [] = "`$item`='$v'";
								$repl [] = "`id`='{$this->id}'";
								$query = "INSERT  INTO " . $this->table [$type][$item] . " SET " . implode ( ',', $repl );
								$this->db->query ( $query );
								
						}else
						{
							$repl=array();
											foreach ($v as $kx=>$datas)
											{
															
																$datas = mysql_escape_string ( $datas );
																$repl [] = "`$kx`='$datas'";
															
											}				
											
											$repl [] = "`id`='{$this->id}'";
											$query = "INSERT  INTO " . $this->table [$type][$item] . " SET " . implode ( ',', $repl );
											$this->db->query ( $query );
							
											
						   
					}
					}
					
					
					
					
					//$query = "REPLACE  INTO " . $this->table [$type][$item] . " SET " . implode ( ',', $repl );
					
					//$this->db->query ( $query );
				}
				;
			
			}
		}
		$this->_saveresult = true;
	}
	public function ValidatePassword($key, $item,$data = null) {
		$data = $this->_FORM_DATA ['main'] [$key];
		$return = 0;
		
		if ($this->id && ! $data) {
			//			echo "NO-pass-";
			$return = 0;
		} elseif ($this->id && ($data != $this->post ['re_password'])) {
			//			echo "__ERROR_PASSWORD_MISMATCH__";
			$this->items [$key] ['_ERRORS'] [] = "__ERROR_PASSWORD_MISMATCH__";
			$return ++;
		} elseif (($data == $this->post ['re_password'])) {
			
			$validator = $item ['FILTER_VAR'] ['FILTER'];
			$OPTIONS = isset ( $item ['FILTER_VAR'] ['OPTIONS'] ) ? $item ['FILTER_VAR'] ['OPTIONS'] : array ();
			$result = filter_var ( $data, $validator, $OPTIONS );
			
			if ($result == '__FALSE__')
				$result = false;
			
			if ($result == false) {
				$return ++;
				$this->items [$key] ['_ERRORS'] [] = "__ERROR_{$validator}__" . implode ( "_", $OPTIONS );
			}
			
			$this->insert ['main'] [$key] = md5 ( $result );
		}
		return $return;
	}
	public function ValidatePid($key, $item,$data = null) {
		$data = $this->_FORM_DATA ['main'] [$key];
		
		$return = 0;
		
		if ($this->id && ($this->id == $data)) {
			$this->items [$key] ['_ERRORS'] [] = "__UNLEGAL_OPERATION__";
			$return = 1;
		}
		$this->insert ['main'] [$key] = $data;
		return $return;
	}
	public function isUnique($key, $item) {
		$data = $this->_FORM_DATA ['main'] [$key];
		$id = $this->id ? $this->id : - 1;
		$exist = $this->db->getRow ( $this->table ['main'], 'count(*) as q', "id !=$id AND `$key` ='$data' " );
		if ($exist ['q']) {
			$this->items [$key] ['_ERRORS'] [] = "FIELD_UNIQUE_ERROR";
			$return = 1;
		}
		
		$this->insert ['main'] [$key] = $data;
		return $return;
	
	}
	public function saveUpload() {
		
		$uploadFiled = $this->post ['upload-filed'];
		$data = $this->files [$uploadFiled];
		$settings = $this->items [$uploadFiled];
		
		if (method_exists ( $this, $settings ['type'] )) {
			$act = $settings ['type'];
			$filename = $this->$act ( $data, $settings );
			if ($filename) {
				if ($settings ['ml']) {
					$table = $this->table ['ml'];
					$q = "UPDATE `$table` SET `$uploadFiled`='$filename' WHERE `id`='{$this->id}' ";
				} elseif ($settings ['rel']) {
					$table = $this->table ['rel'] [$uploadFiled];
					$q = "REPLACE INTO `$table` SET `$uploadFiled`='$filename', `id`='{$this->id}' ";
				} else {
					$table = $this->table ['main'];
					$q = "UPDATE `$table` SET `$uploadFiled`='$filename' WHERE `id`='{$this->id}' ";
				}
				
				$this->db->query ( $q );
				return true;
			}
			return false;
		}
		return false;
	
	}
	public function fileImage($data, $settings) {
		$uploadFiled = $this->post ['upload-filed'];
		$data = $this->files [$uploadFiled];
		$settings = $this->items [$uploadFiled];
		
		if ($data ['error'] == UPLOAD_ERR_OK) {
			$curModule = $this->curModule ['name'];
			$location = ROOT_DIR . "/img/$curModule/";
			$locationTmp = ROOT_DIR . "/img/tmp/";
			
			$Imagetypes = array ('image/gif' => IMAGETYPE_GIF, 'image/jpeg' => IMAGETYPE_JPEG, 'image/pjpeg' => IMAGETYPE_JPEG, 'image/png' => IMAGETYPE_PNG, 'image/x-png' => IMAGETYPE_PNG );
			
			if (! key_exists ( $data ['type'], $Imagetypes )) {
				
				$this->items [$uploadFiled] ['_ERROR'] [] = 'WRONG_FILE_FORMAT';
				return false;
			}
			if (! is_dir ( $location )) {
				mkdir ( $location, 0777 );
				chmod ( $location, 0777 );
			}
			
			if (! is_dir ( $locationTmp )) {
				mkdir ( $locationTmp, 0777 );
				chmod ( $locationTmp, 0777 );
			}
			
			$a = move_uploaded_file ( $data ['tmp_name'], $locationTmp . $data ['name'] );
			
			$tempFileLoaction = $locationTmp . $data ['name'];
			$info = getimagesize ( $locationTmp . $data ['name'] );
			
			$Imagetype = $Imagetypes [$info ['mime']];
			$ext = image_type_to_extension ( $Imagetype );
			
			$name = str_replace ( '.', '-', microtime ( 1 ) );
			$name = $name . $ext;
			
			if (isset ( $settings ['resize'] )) {
				
				foreach ( $settings ['resize'] as $folder => $size ) {
					
					$upLocation = $location . $folder . "/";
					if (! is_dir ( $upLocation )) {
						
						mkdir ( $upLocation, 0777 );
						chmod ( $upLocation, 0777 );
					
					}
					
					base::imageResize ( $info, $size, $tempFileLoaction, $upLocation . $name );
				}
				unlink ( $tempFileLoaction );
				return $name;
			} elseif (isset ( $settings ['lessThan'] )) {
				$lessThan = $settings ['lessThan'] ['size'];
				$folder = $settings ['lessThan'] ['folder'];
				$upLocation = $location . $folder . "/";
				
				$height = $info [1];
				$width = $info [0];
				$maxSide = max ( $width, $height );
				
				if ($maxSide <= $lessThan) {
					if (! is_dir ( $upLocation )) {
						mkdir ( $upLocation, 0777 );
						chdir ( $upLocation, 0777 );
					}
					
					copy ( $locationTmp . $data ['name'], $upLocation . $name );
					unlink ( $locationTmp . $data ['name'] );
					return $name;
				} else {
					$this->items [$uploadFiled] ['_ERROR'] [] = "size is not valid $lessThan ($width x $height )";
					unlink ( $locationTmp . $data ['name'] );
					return false;
				}
			} elseif (isset ( $settings ['fixed'] )) {
				$lessThanWidth = isset ( $settings ['fixed'] ['width'] ) ? $settings ['fixed'] ['width'] : 'NOVALUE';
				$lessThanHeight = isset ( $settings ['fixed'] ['height'] ) ? $settings ['fixed'] ['height'] : 'NOVALUE';
				$folder = $settings ['fixed'] ['folder'];
				$upLocation = $location . $folder . "/";
				
				$height = $info [1];
				$width = $info [0];
				
				$maxSide = max ( $width, $height );
				
				if (($width == $lessThanWidth && $height == $lessThanHeight) || ($width == $lessThanWidth && 'NOVALUE' == $lessThanHeight) || ($height == $lessThanHeight && 'NOVALUE' == $lessThanWidth)) {
					if (! is_dir ( $upLocation )) {
						mkdir ( $upLocation, 0777 );
						chdir ( $upLocation, 0777 );
					}
					
					copy ( $locationTmp . $data ['name'], $upLocation . $name );
					unlink ( $locationTmp . $data ['name'] );
					return $name;
				} else {
					$this->items [$uploadFiled] ['_ERROR'] [] = "size is not valid $lessThanWidth x $lessThanHeight ($width x $height )";
					unlink ( $locationTmp . $data ['name'] );
					return false;
				}
			}
		
		} else {
			$this->items [$uploadFiled] ['_ERROR'] [] = $data ['error'];
			return false;
		}
	}
	public function deleteFiled() {
		
		$settings = $this->items [$this->post ['field']];
		
		if (isset ( $settings ['rel'] )) {
			$table = $this->table ['rel'] [$this->post ['field']];
			
			$query = " DELETE FROM $table WHERE `{$this->post['field']}`='{$this->post[$this->post['field']]}' AND id={$this->post['id']}";
		} elseif (isset ( $settings ['ml'] ) && $settings ['ml']) {
			$table = $this->table ['ml'];
			$query = " UPDATE $table SET `{$this->post['field']}`=NULL WHERE  id={$this->post['id']}";
		
		} else {
			$table = $this->table ['main'];
			
			$query = " UPDATE $table SET `{$this->post['field']}`=NULL WHERE  id={$this->post['id']}";
		
		}
		
		$this->db->query ( $query );
		
	/*
		 	[field] => image
    		[id] => 1
    		[image] => 1269517778-13.jpeg

		*/
	}
	public function savePosition(db $db, $positionsArray) {
		//array_unshift ( $positionsArray, 0 );
		$qs = array();

		foreach ( $positionsArray as $pos => $id ) {
			$query = " UPDATE `{$this->table['main']}` SET position ={$pos}  WHERE id='{$id}'";
		$qs[] =$query ;	
			$db->query ( $query );
			
		}
		
	
	}
	public function getJsongetOptions() {
		
		/*
			 [action] => getJson
		     [function] => getOptions
             [viewAjax] => 1
             [xTable] => brandmodel
             [xKey] => id
             [xLabel] => label
             [xWhere] => pid
             [value] => 4

			
			*/
		if($this->get ['xTable']!= 'brandmodel')
		{
		$return = $this->db->getOptions ( $this->get ['xTable'], $this->get ['xKey'], $this->get ['xLabel'], $this->get ['xML'], "{$this->get['xWhere']}={$this->get['value']}" );
		
		
		return $return;
		}
		else
		{
			$return = $this->db->getTree($this->get ['xTable'],"id,pid,{$this->get ['xKey']} as xKey, {$this->get ['xLabel']} as  xLabel");
			
			$returnX= array("tree"=>1,'options'=>$return,'pid'=>$this->get['value']);
//			file_put_contents('bmw',print_r($returnX,1));
			return $returnX;
		}
		
	}
	public function getJsondeleteCookie() {
		
		if (isset ( $_COOKIE [$this->get ['cname']] )) {
			
			$thisCookieS = $_COOKIE [$this->get ['cname']];
			$thisCookieS = stripslashes ( $thisCookieS );
			$thisCookie = json_decode ( $thisCookieS );
			
			if ($this->get ['eid'] > 0) {
				
				$var = intval ( $this->get ['eid'] );
				
				unset ( $thisCookie->$var );
				
				setcookie ( $this->get ['cname'], json_encode ( $thisCookie ), time () + 5 * 60 * 60 * 60 );
			} else {
				$var = 0;
				$thisCookie = array ();
				setcookie ( $this->get ['cname'], json_encode ( $thisCookie ), time () - 5 * 60 * 60 * 60 );
			}
			
			return array ($var, $thisCookie );
			;
		
		}
	}
	public function deleteAll() {
		
		$delId = $this->id;
		$ids = array ();
		if (isset ( $this->pid )) {
			$this->db->getAllSubs ( $this->table ['main'], $this->id, $ids );
		
		}
		
		$ids [] = $delId;
		foreach ( $ids as $id ) {
			$this->delteRecord ( $id );
		}
	
	}
	private function delteRecord($delId) {
		$unlikingResurces = array ();
		
		if (! empty ( $this->externalResurces )) {
			$curModule = $this->curModule ['name'];
			foreach ( $this->externalResurces as $resName => $options ) {
				if (isset ( $options ['multiple'] ) && $options ['multiple']) {
					$all = $this->db->getArray ( $this->table ['rel'], $resName, "id=$delId" );
					
					foreach ( $all as $removeables ) {
						$removeable = $removeables [$resName];
						if (isset ( $options ['resize'] )) {
							foreach ( $options ['resize'] as $folder => $size ) {
								$unlikingResurces [] = $curModule . "/" . $folder . "/" . $removeable;
							}
						}
						if (isset ( $options ['fixed'] )) {
							$folder = $options ['fixed'] ['folder'];
							$unlikingResurces [] = $curModule . "/" . $folder . "/" . $removeable;
						
						}
						if (isset ( $options ['lessThan'] )) {
							$folder = $options ['lessThan'] ['folder'];
							$unlikingResurces [] = $curModule . "/" . $folder . "/" . $removeable;
						
						}
					
					}
				} else {
					
					$removeable = $this->db->getRow ( $this->table ['main'], $resName, "id=$delId" );
					
					$removeable = $removeable [$resName];
					if (isset ( $options ['resize'] )) {
						foreach ( $options ['resize'] as $folder => $size ) {
							$unlikingResurces [] = $curModule . "/" . $folder . "/" . $removeable;
						}
					}
					if (isset ( $options ['fixed'] )) {
						$folder = $options ['fixed'] ['folder'];
						$unlikingResurces [] = $curModule . "/" . $folder . "/" . $removeable;
					
					}
					if (isset ( $options ['lessThan'] )) {
						$folder = $options ['lessThan'] ['folder'];
						$unlikingResurces [] = $curModule . "/" . $folder . "/" . $removeable;
					
					}
				
				}
			}
		
		}
		
		foreach ( $this->table as $tbl ) {
			if(!is_array($tbl))
			
			$query [] = "DELETE FROM $tbl WHERE id={$delId}";
			else
			{
				foreach ($tbl as $tabx)
				{
					$query [] = "DELETE FROM $tabx WHERE id={$delId}";
				}
			}
		
		}
		
		foreach ( $query as $q ) {
			$this->db->query ( $q );
		}
		
		
		
		foreach ( $unlikingResurces as $res ) {
			if ($res)
				@unlink ( ROOT_DIR . "/img/$res" );
		}
	
	}
	public function ValidateFileImage($key, $item,$data = null)
	{
		
		
		if(isset($item['multiple']) )
		{
			
			
			foreach($data as $index=>$image)
			{
				$this->insert ['rel'] [$key][$index]=$this->_FORM_DATA ['rel'] [$key][$index] = $this->processImage($image,$item,$key);
			}
		}else
		{
			$data = $this->_FORM_DATA ['main'] [$key];
			
			$this->insert ['main'] [$key]=$this->_FORM_DATA ['main'] [$key] = $this->processImage($data,$item,$key);
		}
	}
	public function processImage($file,$settings,$key)
	{
		
		$path =dirname($file);
		
		
	    if($path == '.')
		{
			return $file;
		}
		$path = "..".$path;
		
		if($file && file_exists("..".$file))
		{
		
		
		$info = getimagesize(ROOT_DIR.$file);
		$module =$this->curModule['name'];
		$uploadSourceDir= ROOT_DIR."/img/$module/";
		
//		file_put_contents($key.$module.microtime(1).".TXT",$uploadSourceDir);
		if(!is_dir($uploadSourceDir)){
		mkdir($uploadSourceDir,07777);
		chmod($uploadSourceDir,0777);
		}
		
		$name = str_replace( ".",'-',microtime(1));
		
		
		if(isset($settings['resize']))
		{
			foreach ($settings['resize'] as $folder=>$size)
			{
					
					
				base::resizeAndCopy(ROOT_DIR.$file,$size,$name,$uploadSourceDir.$folder);
			}
		}
		
		if(isset($settings['fixed']))
		{
			
			$width  = $settings['fixed']['width'];
			$height = $settings['fixed']['height'];
			$folder = $settings['fixed']['folder'];
			
//			$size = $settings['lessThan']['size'];
			$maxSide = max($info[0],$info[1]);
			
			if($info[0] == $width && $height == $info[1]  )
			{
				
				if(!is_dir($uploadSourceDir.$folder)){
					  
					   mkdir($uploadSourceDir.$folder,07777,true);
					   chmod($uploadSourceDir.$folder,0777);
					}
					
				copy(ROOT_DIR.$file,$uploadSourceDir.$folder."/".$name.image_type_to_extension($info[2]));
			}else
			{
				$this->items [$key] ['_ERRORS'] [] = "FILE_SIZE_ERROR ($width x $height)";
				return false;
			}
		}
	    if(isset($settings['lessThan']))
		{
			$folder = $settings['lessThan']['folder'];
			$size = $settings['lessThan']['size'];
			$maxSide = max($info[0],$info[1]);
			
			if($maxSide <= $size )
			{
				
				if(!is_dir($uploadSourceDir.$folder)){
					  
					   mkdir($uploadSourceDir.$folder,07777,true);
					   chmod($uploadSourceDir.$folder,0777);
					}
					
				copy(ROOT_DIR.$file,$uploadSourceDir.$folder."/".$name.image_type_to_extension($info[2]));
			}else
			{
				$this->items [$key] ['_ERRORS'] [] = "FILE_SIZE_ERROR";
				return false;
			}
		}
		return $name.image_type_to_extension($info[2]); 
		
		}else{
			return '';
		}
		
		
		
		
		
	}
	public function ValidateDateTimepicker($key, $item, $data = null) {
		$data = isset ( $this->_FORM_DATA ['main'] [$key] ) ? $this->_FORM_DATA ['main'] [$key] : null;
		if (is_array ( $data ))
			$data = checkTimeDateStr ( $data );
		else
			$data = isset ( $item ['default'] ) ? $item ['default'] : date ( 'Y-m-d H:i:s' );
		
		$this->insert ['main'] [$key] = $this->_FORM_DATA ['main'] [$key] = $data;
	
	}

}

?>