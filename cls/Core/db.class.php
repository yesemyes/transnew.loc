<?
class db extends mysqli {
	private $link;
	public $tbl_prefix;
	public $tables;
	public static $_found_rows;
	private static $instance;
	private static $_link;
	function __construct($dbConnect = null) 
	{
		
		parent::init ();
		if (! parent::options ( MYSQLI_INIT_COMMAND, 'SET NAMES UTF8;' )) {
			die ( 'Setting MYSQLI_INIT_COMMAND failed' );
		}
		
		if ($dbConnect == null) {
			$config = parse_ini_file ( ROOT_DIR . '/config/config.ini', true );
			
			$dbConnect = $config ['db'];
			 
		}
		
		self::$_found_rows = 0;
		$this->tbl_prefix = $dbConnect ['tbl_prefix'];
		
		if (! parent::options ( MYSQLI_OPT_CONNECT_TIMEOUT, 5 )) {
			die ( 'Setting MYSQLI_OPT_CONNECT_TIMEOUT failed' );
		}
		
		if (! parent::real_connect ( $dbConnect ['host'], $dbConnect ['user'], $dbConnect ['pswd'], $dbConnect ['dbName'] )) {
			die ( 'Connect Error (' . mysqli_connect_errno () . ') ' . mysqli_connect_error () );
		}
		
		$this->loadSchem ();
		self::$_found_rows = 0;
		
		self::$instance = $this;
	
	}
	public function escape($str) {
		return $this->real_escape_string ( $str );
	}
	public function __destruct() {
		
		$this->close ();
	
	}
	/**
	 *@return  MySQLi_Result | boolean
	 */
	
	public function query($q) {
		try {
			$t1 = microtime ( 1 );
			if (($stmt = parent::query ( $q )) != false) {
				
				$t2 = microtime ( 1 );
				if (($t2 - $t1) > 1)
					$this->_error ( $q, 777, $t2 - $t1 );
				
				return $stmt;
			} else {
				throw new Exception ( "{$this->errorno}, {$this->error}" );
			}
		} catch ( Exception $e ) {
			$this->_error ( $q, $this->errorno, $this->error );
			return false;
		}
	}
	
	private function _execute(&$stmt, $query) {
		$t1 = microtime ( 1 );
		$stmt->execute ();
		$t2 = microtime ( 1 );
		if ($t2 - $t1 > 0.5)
			$this->_error ( $query, 777, $t2 - $t1 );
	}
	private function errorFilname($p) {
		list ( $tail, $time ) = explode ( ' ', microtime () );
		return $p . '-' . date ( 'Y_m_d_H_i_s' ) . '-' . $tail . '.log';
	}
	private function _error($q, $n, $m) {
		
		$APP_STATUS = getenv ( 'APP_STATUS' ) ? getenv ( 'APP_STATUS' ) : 'DEVELOPENT';
		
		if ($APP_STATUS == 'PRODUCTION')
			return;
		$e = debug_backtrace ( 0 );
		
		if ($n == 777) {
			
			if(! is_dir(ROOT_DIR . '/error_log/mysql/timeout/'))
			{
				mkdir(ROOT_DIR . '/error_log/mysql/timeout/',0777,true);
			}
			$fname = ROOT_DIR . '/error_log/mysql/timeout/' . $this->errorFilname ( 't' );
		} else {
			
			if(! is_dir(ROOT_DIR . '/error_log/mysql/error/'))
			{
				mkdir(ROOT_DIR . '/error_log/mysql/error/',0777,true);
			}
			$fname = ROOT_DIR . '/error_log/mysql/error/' . $this->errorFilname ( 'e' );
		}
		
		$error = array ();
		$error [] = "QUERY \n" . $q . "\n===========================\n";
		$error [] = "ERROR NO \t" . $n;
		$error [] = "ERROR MESSAGE / OR DURATION  \n" . $m . "\n===========================\n";
		
		if ($APP_STATUS == 'DEVELOPENT') {
			foreach ( $e as $item ) {
				$error [] = "File => " . $item ['file'] . "\t LINE \t" . $item ['line'];
			}
		}
		$error_str = implode ( "\r\n", $error );
		
		file_put_contents ( $fname, $error_str );
		//		die($error_str);
		return false;
	}
	public function fetch($tres, $mod = 'fetch_assoc') {
		if ($tres) {
			$method = "mysql_$mod";
			
			return $method ( $tres );
		} else {
			return false;
			$this->error ( "{$tres} is not resurce", 5555, "EROR" );
		}
	
	}
	 /**
	 * Return Key value array
	 * @param string $table Table name
	 * @param string $key Key for options
	 * @param srting $value Value for options
	 * @param int  $ml is ml (0 or lannguge id)
	 * @param string $where ( Condition)
	 * @param strig $group ( Group by condition)
	 * @param string $order ( ORder by )
	 * @param string $limit  (Withot limit term)
	 * @return multitype:mixed
	 */
	public function getOptions($table, $key, $value, $ml = 0, $where = '', $group = '', $order = '', $limit = '') {
		
		
		//echo "$table, $key, $value, $ml<br/>";
		
		if ($ml) {
			$from = "`$table` INNER JOIN {$table}_ml ON (`$table`.`id` = `{$table}_ml`.`id` AND `{$table}_ml`.`lng_id`=$ml)";
		} else {
			$from = "`$table`";
		}
		
		if (is_array ( $value )) {
			$_label = array ();
			foreach ( $value as &$v ) 
			{
				$v = "`$v`"; 
			}
			$_abelStr = " CONCAT(" . implode ( ",' ',", $value ) . ") ";
			
			$query = "SELECT `$table`.`$key` as `key`,$_abelStr as `value` FROM  $from ";
		} else {
			
			$query = "SELECT `$table`.`$key` as `key`,`$value` as `value` FROM  $from ";
		}
		if ($where) {
			$query .= " WHERE $where ";
		}
		if ($group) {
			$query .= " GROUP BY  $group ";
		}
		
		if ($order) {
			$query .= " ORDER BY  $order ";
		}
		if ($limit) {
			$query .= " LIMIT  $limit ";
		}
		$query .= ';';
		
		if (($result = $this->query ( $query )) != false) {
			$return = array ();
			
			while ( ($row = $result->fetch_array ( MYSQLI_ASSOC )) != false ) {
				$return [$row ['key']] = $row ['value'];
			}
			$result->close ();
		}
		return $return;
	}
	public function getArray($table, $what = '*', $where = '', $group = '', $order = '', $limit = '', $by = null) {
		
		$return = array ();
		
		self::$_found_rows = 0;
		
		if ($limit) 
		{
			$query = $this->buildQuery ( $table, $what, $where, $group, $order );
			if (($stmt = $this->prepare ( $query )) != false) {
				
				$this->_execute ( $stmt, $query );
				
				/* store result */
				$stmt->store_result ();
				
				//				    printf(" $query \n Number of rows: %d.\n<br/>", $stmt->num_rows);
				self::$_found_rows = $stmt->num_rows;
				/* close statement */
				$stmt->close ();
			}
		
		}
		if($limit == 'all')
		$limit = '';
		$query = $this->buildQuery ( $table, $what, $where, $group, $order, $limit );
		$return = array ();
		
		if (($result = $this->query ( $query )) != false) {
			while ( ($row = $result->fetch_array ( MYSQLI_ASSOC )) != false ) {
				if ($by)
					$return [$row [$by]] = $row;
				else
					$return [] = $row;
			}
			$result->close ();
		}
		
		return $return;
	}
	public function getRow($table, $what = '*', $where = '', $group = '', $order = '', $limit = '', $by = null) {
		
		$return = array ();
		$query = $this->buildQuery ( $table, $what, $where, $group, $order, $limit );
		
		if ($query) {
			
			if (($result = $this->query ( $query )) != false) {
				if (($row = $result->fetch_array ( MYSQLI_ASSOC )) != false) {
					$return = $row;
				}
				$result->close ();
			}
		
		}
		
		return $return;
	}
	public function getTree($table, $what = '*', $where = '', $group = '', $order = '', $limit = '', $curlng = '') {
		
		$return = array ();
		$query = $this->buildQuery ( $table, $what, $where, $group, $order, $limit, $curlng );
		
		if ($query) {
			if (($result = $this->query ( $query )) != false) {
				while ( ($row = $result->fetch_array ( MYSQLI_ASSOC )) != false ) {
					$return [$row ['pid']] [$row ['id']] = $row;
				}
				$result->close ();
			}
		}
		return $return;
	}
	private function buildQuery($table, $what = '*', $where = '', $group = '', $order = '', $limit = '', $curlng = '') 
	{
		$whatTmp = array ();
		$query = null;
		
		if (key_exists ( $table, $this->tables )) {
			
			$from = " `$table` ";
			$mlTable = "{$table}_ml";
			if ($what == '*') {
				
				foreach ( $this->tables [$table] as $t ) {
					$whatTmp [] = "`{$table}`.`$t`";
				}
			}
			
			if (key_exists ( $mlTable, $this->tables )) {
				$from = " `$table` LEFT JOIN $mlTable USING (`id`) ";
				
				if ($what == '*') {
					
					foreach ( $this->tables [$mlTable] as $t ) {
						if ($t != 'id')
							$whatTmp [] = "`{$mlTable}`.`$t`";
					}
				}
				
				if (preg_match ( '/lng_id=(.*?)/', $where ) && $curlng) {
					preg_replace ( '/lng_id=(.*?)/', $curlng, $where );
				} elseif ($curlng) {
					$where .= $where ? " AND " : '' . " lng_id=$curlng";
				}
			
			}
			if ($what == '*') {
				$what = implode ( ",", $whatTmp );
			}
			
			//			if ($limit) {
			//				$what = 'SQL_CALC_FOUND_ROWS ' . $what;
			//			}
			

			$query = array ();
			$query [] = "SELECT $what FROM  $from ";
			
			if ($where) {
				
				$query [] = " WHERE $where ";
			}
			
			if ($group) {
				$query [] = " GROUP BY  $group ";
			}
			
			if ($order) {
				$query [] = " ORDER BY  $order ";
			}
			
			if ($limit) {
				$query [] = " LIMIT   $limit ";
			}
			
			$query = implode ( "\n", $query );
		
		} else {
			$this->_error ( $table, '000001', "$table not exist" );
		}
		
		return $query;
	}
	public function queryFetch($q, $limit = '', $mod = 'fetch_assoc') 
	{
		
		
		if ($limit) 
		{
			$query = $q;
			if (($stmt = $this->prepare ( $query )) != false) 
			{
				
				$this->_execute ( $stmt, $query );
				
				/* store result */
				
				$stmt->store_result ();
				
				//printf(" $query \n Number of rows: %d.\n<br/>", $stmt->num_rows);
				
				self::$_found_rows = $stmt->num_rows;
				
				/* close statement */
				
				$stmt->close ();
			}
		
		}
		
		$q .= $limit;
		$return = array ();
		
		if (($result = $this->query ( $q )) != false) 
		{
			while ( ($row = $result->fetch_array ( MYSQLI_ASSOC )) != false ) 
			{
				$return [] = $row;
			}
			$result->close ();
		}
		return $return;
	}
	public function queryFetchF($q, $field, $mod = 'fetch_assoc', $limit = 0) {
		$return = array ();
		if (($result = $this->query ( $q )) != false) {
			while ( ($row = $result->fetch_array ( MYSQLI_ASSOC )) != false ) {
				$return [$field] [] = $row [$field];
			}
			$result->close ();
		}
		return $return;
	}
	public function queryFetchOne($q, $mod = 'fetch_assoc') {
		if (($result = $this->query ( $q )) != false) {
			if (($row = $result->fetch_array ( MYSQLI_ASSOC )) != false) {
				$return = $row;
			}
			$result->close ();
		}
		return $return;
	}
	public function insertQuery($table, $data) {
		
		$return = false;
		if (key_exists ( $table, $this->tables )) {
			
			foreach ( $data ['main'] as $filed => $value ) {
				$value = mysql_escape_string ( $value );
				$insertQueryArray [] = "`$filed`='$value'";
			
			}
			
			$insertString = implode ( ",", $insertQueryArray );
			$query = " INSERT INTO `$table`  SET $insertString ";
			$insertQueryMLGlobalArray = array ();
			$insert = array ();
			if (isset ( $data ['ml'] ) && key_exists ( "{$table}_ml", $this->tables )) {
				
				$filds ['lng_id'] = 1;
				$filds ['id'] = 1;
				$index = 0;
				$filds = array ();
				$insertQueryMLArray = array ();
				
				foreach ( $data ['ml'] as $filed => $values ) {
					$filds [$filed] = 1;
					foreach ( $values as $lng_id => $lvalue ) {
						$lvalue = mysql_escape_string ( $lvalue );
						$insertQueryMLArray [$lng_id] [$filed] = " '$lvalue' ";
						$insertQueryMLArray [$lng_id] ['lng_id'] = " '$lng_id' ";
						$insertQueryMLArray [$lng_id] ['id'] = " LAST_INSERT_ID() ";
					}
				}
				
				foreach ( $insertQueryMLArray as $lng => $insQ )
					foreach ( $insQ as $f => $v ) {
						$insert [$lng] [] = "`$f`=$v";
					}
			
			}
			
			$filds = array_keys ( $filds );
			$insertQuery = implode ( ",", $insert );
			
			$fieldsTo = array_keys ( $filds );
			$fieldsTo = implode ( "`,`", $filds );
			foreach ( $insert as $ln => $INSf )
				$insertQueryMLGlobalString [] = " INSERT INTO `{$table}_ml` SET " . implode ( ",", $INSf ) . " ;";
				
			//$finalQuery = $query.";\n".$insertQueryMLGlobalString;
			//			file_put_contents('d',print_r($insertQueryMLGlobalString,1));
			

			if ($this->query ( $query )) {
				$return = $this->insert_id;
				if (! empty ( $insertQueryMLGlobalString )) {
					foreach ( $insertQueryMLGlobalString as $qq )
						$this->query ( $qq );
				}
			
			}
		}
		return $return;
	}
	public function foundRows($query) {
		if (($res = $this->query ( $query )) != false) {
			return mysql_num_rows ( $res );
		}
		
		return false;
	}
	public function arrayToWhere($array, $sep = ' AND ') {
		
		
		$return = array ();
	
		foreach ( $array as $field => $value ) {
			$value = $this->escape ( $value );
			$return [] = "`$field`='$value'";
		}
		
		$condition = implode ( $return, $sep );
		return $condition;
	}
	public function getAllSubs($table, $id, &$return) {
		
		if (! in_array ( 'pid', $this->tables [$table] ))
			return;
		$subs = $this->getArray ( $table, '*', "`pid`='$id'" );
		
		foreach ( $subs as $sub ) {
			$return [] = $sub['id'];
			
			$this->getAllSubs ( $table, $sub ['id'], $return );
		}
	
	}
	private function loadDBSchem() 
	{
		$file = ROOT_DIR . "/config/dbschem.xml";
		
		if (! file_exists ( $file ))
			return 0;
		
		$t = fileatime ( $file );
		$now = time ();
		$xml = simplexml_load_file ( $file );
		
		$ttables = array ();
		foreach ( $xml as $node ) {
			$tabel = $node->getName ();
			
			if (! isset ( $ttables [$tabel] )) {
				$ttables [$tabel] = array ();
			}
			foreach ( $node->Field as $filed ) {
				
				$ttables [$tabel] [] = ( string ) $filed;
			}
		}
		;
		
		return array ($now - $t, $ttables );
	
	}
	private function loadSchem() {
		
		$oldSchem = $this->loadDBSchem ();
		
		if ($oldSchem) 
		{
			$this->tables = $oldSchem [1];
			return;
		} 
		else 
		{
			$currentSchem = $this->rebulidSchem();
			 
		}
		
		$this->tables = $currentSchem [1];
	}
	
	public function rebulidSchem()
	{
		
		$query = 'SHOW TABLES';
		$stmt = $this->prepare ( $query );
			
		$this->_execute ( $stmt, $query );
		$tables = array ();
		$row = null;
		$stmt->bind_result ( $row );
			
		while ( $stmt->fetch () ) {
			$tables [$row] = array ();
		}
		$stmt->close ();
			
		$query = "SHOW  COLUMNS FROM  `%s` ";
		foreach ( $tables as $tbl_name => &$item ) {
			$q = sprintf ( $query, $tbl_name );
			$result = null;
			if (($result = $this->query ( $q )) != false) {
				while ( ($row = $result->fetch_array ( MYSQLI_ASSOC )) != false ) {
					$item [] = $row ['Field'];
				}
				$result->close ();
			}
				
		}
			
		$this->arrayToXml ( $tables, ROOT_DIR. '/config/dbschem.xml' );
		$currentSchem = $this->loadDBSchem ();
		$this->tables = $currentSchem [1];
		return $currentSchem ;
	}
	function arrayToXml($array, $filenam) {
		$strim = <<<XML
<schem></schem>
XML;
		
		$xml = new SimpleXMLElement ( $strim );
		$this->_ArrayToXml ( $xml, $array );
		
		$xml->asXML ( $filenam );
	}
	function _ArrayToXml(&$node, $array) {
		foreach ( $array as $key => $value ) {
			if (! is_array ( $value )) {
				if (is_numeric ( $key ))
					$key = "Field";
				$node->addChild ( $key, $value );
			
			} else {
				if (is_numeric ( $key ))
					$key = "Field";
				$nnode = $node->addChild ( $key );
				$this->_ArrayToXml ( $nnode, $value );
			}
		
		}
	}
	public function mkTransactions() {
		$querys = func_get_args ();
		
		$this->query ( "SET AUTOCOMMIT=0" );
		$this->query ( "START TRANSACTION" );
		
		foreach ( $querys as $q ) {
			$result = $this->query ( $q );
			if (! $result) {
				$this->query ( "ROLLBACK" );
				return false;
			}
		}
		$this->query ( "COMMIT" );
		return true;
	
	}
	
	/**
	 *  @return db
	 */
	public  function tabelExists($table)
	{
		if (key_exists ( $table, $this->tables ))
		{
			return true;
		}else
		{
			$this->rebulidSchem();
			if (key_exists ( $table, $this->tables ))
			{
				return true;
			}
			
		}
		return false;
		
	}
	/**
	 * @return db
	 */
	public static function getInstance() {
		
		if (! self::$instance) {
			new self ( );
		}
		
		return self::$instance;
	
	}
}

?>