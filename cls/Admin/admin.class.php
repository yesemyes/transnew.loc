<?
class admin extends base {
	public $request;
	public $be_menu;
	public $languages;
	public $defLng;
	public $curModule;
	public $smarty;
	
	function __construct(Request $request) {
		
		parent::__construct ( $request->request );
		$db = db::getInstance ();
		
		$this->request = $request->request;
		$smarty = $GLOBALS ['smarty'];
		$smarty->assign ( 'lngdata', base::$lngdata );
		$this->smarty = $smarty;
		$this->curModule = array_pop ( $request->request ['path_params'] );
		
		$curModule = $this->curModule;
		
		$this->languages_id = $db->getArray ( 'languages', '*', ' active ', '', '', '', 'id' );
		$this->languages = $db->getArray ( 'languages', '*', 'active', '', '`position` ASC', '', 'code' );
		$this->defLng = $this->languages ['am'];
		
		$this->request ['lng_id'] = $this->defLng ['id'];
		$smarty->template_dir .= '/admin';
		$this->_config = $db->getOptions ( 'config', 'name', 'value' );
		
		if ($this->AuthAction ()) {
			
			$aviableForView = $_SESSION ['be_user'] ['access'] ['VIEW'];
			$ids = implode ( ",", $aviableForView );
			
			if ($_SESSION ['be_user'] ['group'] > 0) {
				
				$this->be_menu = $db->getTree ( 'bemenu', '*', 'lng_id = ' . $this->defLng ['id'] . " AND id in ($ids)", '', '  `position` ASC' );
			} else {
				$this->be_menu = $db->getTree ( 'bemenu', '*', 'lng_id = ' . $this->defLng ['id'] . "  ", '', '  `position` ASC' );
			}
			
			$this->curModule = $db->getRow ( 'bemenu', '*', "`bemenu`.`name`='{$this->curModule}' AND `bemenu_ml`.`lng_id`=" . $this->defLng ['id'] );
			
			if (isset ( $this->curModule ['name'] )) {
				$module = strtolower ( @$this->curModule ['name'] );
			} else {
				$module = '__NO_MODULE__';
			}
			$module_file = ROOT_DIR . "/ini/{$module}.php";
			
			if (file_exists ( $module_file )) {
				
				if (class_exists ( $curModule ) && $curModule != __CLASS__) {
					$this->form = new $curModule ( $module_file, $this, $db );
				
				} else {
					$this->form = new form ( $module_file, $this, $db );
				}
			
			} elseif (class_exists ( $curModule ) && $curModule != __CLASS__) {
				
				$this->form = new $curModule ( $this, $db );
			} elseif (method_exists ( $this, $curModule )) {
				$this->$curModule ( $db, $smarty );
			
			} elseif (! class_exists ( $curModule ) && $curModule != __CLASS__) {
				header ( "Status: 404 Not Found" );
			}
			
			$smarty->register_object ( 'DbObject', $db );
		
		}
		
		$smarty->assign_by_ref ( 'this', $this );
		$smarty->assign ( 'PANEL_BASE', '/admin/' );
		
		if ((isset ( $_SERVER ['HTTP_X_REQUESTED_WITH'] ) && $_SERVER ['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') && isset ( $this->request ['query'] ['viewAjax'] )) {
			foreach ( $this->request ['query'] as $k => $q ) {
				$smarty->assign ( $k, $q );
			}
			$path = realpath($smarty->template_dir.'/'.$this->request['query']['tpl']);
			// if(! strstr($path,$smarty->template_dir))
			// {
				// header("HTTP/1.0 404 Not Found");
				// header("Connection: Close");
				// die();
			// }
			$smarty->display ( $this->request ['query'] ['tpl'] );
		
		} elseif (isset ( $this->request ['query'] ['external'] )) {
			if ($this->request ['query'] ['external'] == 'langdata.js.tpl') {
				header ( 'Content-type: application/javascript' );
			}
			
			$path = realpath($smarty->template_dir.'/'.$this->request['query']['external']);
			// if(! strstr($path,$smarty->template_dir))
			// {
				// header("HTTP/1.0 404 Not Found");
				// header("Connection: Close");
				// die();
			// }
			$smarty->display ( $this->request ['query'] ['external'] );
			 
		} else {
			
			$smarty->display ( 'index.tpl' );
		}
	}
	
	function AuthAction() {
		global $smarty;
		$db = db::getInstance ();
		
		if (! isset ( $_SESSION ['be_user'] )) {
			
			$row = array ();
			
			if ($this->request ['method'] == 'POST') {
				
				$be_login = $this->request ['post'] ['be_login'];
				$be_password = $this->request ['post'] ['be_password'];
				$be_login = $db->escape ( $be_login );
				$be_password = $db->escape ( $be_password );
				$be_password = md5 ( $be_password );
				
				$row = $db->getRow ( 'users', '`id` ,`name` ,`login`, `group`,`last_login_time`,`last_login_ip`', "`login`='$be_login' AND `password`='$be_password'" );
				
				if (empty ( $row )) {
					$smarty->assign ( '_errors', '1' );
				} else {
					$update_query [] = "`last_login_time`=NOW()";
					$update_query [] = "`last_login_ip`='" . ip2long ( $_SERVER ['REMOTE_ADDR'] ) . "'";
					$update_data = implode ( ",", $update_query );
					$query = "UPDATE users SET $update_data WHERE id={$row['id']}";
					$db->query ( $query );
				}
			
			}
			
			if (empty ( $row )) {
				
				$smarty->assign ( 'main_module', 'login.tpl' );
				return false;
			} else {
				$smarty->assign ( 'main_module', 'login-sucsess.tpl' );
				$smarty->assign ( 'main_module_data', $row );
				$access = $db->queryFetch ( "SELECT * FROM `users-groups-access` WHERE group_id={$row['group']}" );
				$privacyArray = array ();
				foreach ( $access as $item ) {
					$privacyArray [$item ['action']] [] = $item ['be_menu_id'];
				}
				if ($row ['group'] == 0) {
					$this->be_menu = $db->getTree ( 'bemenu', '*', 'lng_id = ' . $this->defLng ['id'] . "  ", '', '  `position` ASC' );
					foreach ( $this->be_menu as $mm ) {
						foreach ( $mm as $m ) {
							$privacyArray ['EDIT'] [] = $m ['id'];
							$privacyArray ['VIEW'] [] = $m ['id'];
							$privacyArray ['DELETE'] [] = $m ['id'];
							$privacyArray ['ADD'] [] = $m ['id'];
						}
					}
				}
				$row ['access'] = $privacyArray;
				$_SESSION ['be_user'] = $row;
				return true;
			}
		} else {
			$smarty->assign ( 'main_module', 'main.tpl' );
			return true;
		}
	
	}
	function __toString() {
		return print_r ( $this, 1 );
	}
	function logout() {
		
		session_unset ( 'be_user' );
		$this->redirect ( '/admin/login' );
	
	}
	function getUser($db, Smarty $smarty) {
		$smarty->assign ( 'json_encode_data', $_SESSION ['be_user'] );
	}
	
	function getSessionLife($db, Smarty $smarty) {
		$session_gc_maxlifetime = ini_get ( 'session.gc_maxlifetime' );
		$smarty->assign ( 'json_encode_data', $session_gc_maxlifetime );
	}
}
?>
