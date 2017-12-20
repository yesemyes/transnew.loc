<?php
class breandPathBuilder {
	
	
	function __construct()
	{
		$db = db::getInstance ();
		$brand = $db->getRow ( 'menu', '*', "`alias` LIKE 'brand'" );
		print_r ( $brand );
		$tree = $db->getTree ( 'brandmodel', 'id,pid,label,alias', '' );
		$this->dropSubs('menu',$brand ['id']);
		$this->processBrands ( $tree, 0, $brand ['id'] );
		
	}
	function addAsSub($label, $alias, $pid) {
		
		$db = db::getInstance ();
		// echo "$label,$alias,$pid<br/>";
		$label = $db->escape ( $label );
		$query = "REPLACE INTO `menu`(`id`, `pid`, `active`, `topmenu`, `bottommenu`, `alias`, `position`, `private`, `noindex`) 
	VALUES (null,$pid,1,0,0,'$alias',10,0,0)";
		$res = $db->query ( $query );
		if (! $res) {
			die ( 'Error' );
		}
		
		$insertId = $db->insert_id;
		if ($insertId) {
			$qml = "REPLACE INTO `menu_ml`(`id`, `lng_id`, `label`, `description`, `keyword`, `content`, `title`) 
	      VALUES ($insertId,5,'$label','$label','$label','$label','$label')";
			
			$Res = $db->query ( $qml );
			
			if (! $Res) {
				die ( 'Error' );
			}
			$qml = "REPLACE INTO `menu_ml`(`id`, `lng_id`, `label`, `description`, `keyword`, `content`, `title`)
	VALUES ($insertId,7,'$label','$label','$label','$label','$label')";
			
			$db->query ( $qml );
			if (! $Res) {
				die ( 'Error' );
			}
		}
		
		
//		$db->query("INSERT IGNORE INTO `s1_ads_menu_rel`(`id`, `menu`) SELECT `s1_ads`.id,  `s1_menu`.id FROM `s1_ads` ,`s1_menu` ");


		return $insertId;
	}
	
	function dropSubs($table, $id) {
		$db = db::getInstance ();
		$return = array ();
		
		$db->getAllSubs ( $table, $id, $return );
		foreach ( $return as $id ) {
			$q = "DELETE  FROM `$table` WHERE `id`=$id";
			$db->query ( $q );
			$qml = "DELETE  FROM `{$table}_ml` WHERE `id`=$id";
			$db->query ( $qml );
		}
	}
	function processBrands($tree, $b_pid, $brand) {
		foreach ( $tree [$b_pid] as $item ) {
			$pid = $this->addAsSub ( $item ['label'], $item ['alias'], $brand );
			
			if (! empty ( $tree [$item ['id']] )) {
				$this->processBrands ( $tree, $item ['id'], $pid );
			}
		}
	}
}
?>