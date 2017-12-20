<?
class feCameras extends front {
	function __construct($init) {
		/*
		 * ************************** ************************** Path Params
		 * Varibles [0] lng [1] home **************************
		 * **************************
		 */
		$vars = get_object_vars ( $init );
		foreach ( $vars as $key => $value ) {
			$this->{$key} = $value;
		}
		$db = db::getInstance ();
		
		if (Request::$xRequestedWith) {
			if ($this->query ['action'] == 'loadCameras') 
			{
				 
				$type = $this->query['type'];
				$city = intval($this->query['city']);
				$street = $this->query['street'];
				$condition [] = "`active`='1'";
				
				$condition [] = "`lng_id`='{$this->defLng['id']}'";
				if($type)
				{
					
					$condition [] = "`camera_type`='{$type}'";
				}
				if($city && $city != 0)
				{
					
					$condition [] = "`city`='{$city}'";
				}
				
				if($street)
				{
					
					$condition [] = "`street`='{$street}'";
				}
				
				$where = implode(" AND ",$condition);
				$cameras = $db->getArray ( 'cameras', '*', $where,'',"`position` ASC" );
				foreach ($cameras as &$camera)
				{
					$camera['camera_type_label'] =HelperFunction::trans(array('term'=>$camera['camera_type'].'_camera'));
				}
				header('Content-Type: application/json');
				die ( json_encode ( $cameras ) );
			}
			
			
			if ($this->query ['action'] == 'loadCities') 
			{
				$tcond = 1;
				$type = $this->query['type'];
				if($type)
				{
					$tcond = "`cameras`.`camera_type`='$type'";
				}
				
				$query ="SELECT 
							`city`.`id`,
							`city_ml`.`value` 
						FROM 
							`city`
							INNER JOIN `city_ml` ON (`city_ml`.`id` = `city`.`id`)
							INNER JOIN `cameras` ON (`cameras`.`city` = `city`.`id`)
						WHERE  
							`city_ml`.`lng_id` = {$this->defLng['id']}
						AND $tcond
						GROUP  BY `city`.`id`
                        ORDER  BY  `city`.`position`";

				$citys = $db->queryFetch ($query);
				header('Content-Type: application/json');
				die ( json_encode ( $citys ) );
			}
			
			if ($this->query ['action'] == 'loadStreet') 
			{
			
				$tcond = 1;
				$type = $db->escape($this->query['type']);
				$city = intval($this->query['city']);
				if($type)
				{
					$tcond .= " AND `cameras`.`camera_type`='$type'";
				}
				
				if($city && $city != 0)
				{
					$tcond .= " AND `cameras`.`city`='{$city}'";
				}
				
				$query = $query ="SELECT 
							`street`.`id`,
							`street_ml`.`value` 
						FROM 
							`street`
							INNER JOIN `street_ml` ON (`street_ml`.`id` = `street`.`id`)
							INNER JOIN `cameras` ON (`cameras`.`street` = `street`.`id`)
						WHERE
                            `cameras`.`active` = '1' AND  
							`street_ml`.`lng_id` = {$this->defLng['id']}
						AND $tcond
						GROUP  BY `street`.`id`
                        ORDER  BY  `street_ml`.`value` ASC";
						
				$streets = $db->queryFetch ($query);		
				header('Content-Type: application/json');
				die ( json_encode ( $streets ) );
			}
		}
		$this->headScripts [] = "https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false";
		$this->headScripts [] = "/scripts/cameras.js";
		$this->citys = $db->getArray ( 'city', '*', "`active`='1' AND `lng_id`={$this->defLng['id']}","`position`" );
		
		$this->mainTpl = 'cameras/body.tpl.html';
	
	}
}
?>