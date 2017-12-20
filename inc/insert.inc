<?

function  insert_getInput($paramas,&$smaty)
{
	
	$name = $paramas['_name'];
	$id = $paramas['_name'];
	if(isset($paramas['ml']))
	{
		//ml-{$_label}-{$item.id}
		$id = "ml-{$name}-{$paramas['ml']}";
		$name ="ML{$name}[{$paramas['ml']}]";
			
	}
	
	$value=$paramas['value'];
	$value = mysql_escape_string($value);
	$value=TranslateStr($value);
	
	$return= '<input 
	type="'.$paramas['type'].'" 
	id="'.$id.'" 
	name="'.$name.'"  '.($paramas['type'] == "checkbox" ?  'value="1"':''). 
			($paramas['type'] == "checkbox" && $paramas['value'] ? 'checked="checked"':'' ).
	( $_setup.type != "checkbox" ?  ' value="'.$value.'"':'').'\' />';
	
	
	return $return;
}
function insert_getDayDurationList() {
	global $db, $smarty, $lng_id, $lng, $_URL;
	
	$query = "	SELECT * FROM `day_duration`";
	
	$res = $db->request ( $query, __FILE__, __LINE__ );
	
	$retArr = array ();
	while ( $row = mysql_fetch_array ( $res ) ) {
		$retArr [] = $row;
	}
	
	return $retArr;
}



function insert_CategoriesTitles($params)
{
	$db = db::getInstance();
    $lng_id = Request::$currentLang['id'];
    $selectString = "
	SELECT 
	`use_category`.`use_category_id` as `id`  ,
	`use_category_description`.`use_category_name` as `title` 
	
	FROM `use_category` LEFT JOIN  `use_category_description` USING(`use_category_id`) 
	WHERE `use_category_description`.`use_category_language_id` = '$lng_id'
	";
    
    
	
	
	$useCategoriesTitles = $db->queryFetch ( $selectString );
   
    

	$stringBuffer = "";
				foreach ( $useCategoriesTitles as $useCat ) {
					$stringBuffer .= "<option value='" . $useCat ['id'] . "' >" . $useCat ['title'] . "</option>";
				}
				return  $stringBuffer;
}


function insert_countCategoriesTitles($params)
{
	$db = db::getInstance();
    $lng_id = Request::$currentLang['id'];
	$selectString = "
	SELECT 
	`driver_count_category`.`driver_count_category_id` as `id`  ,
	`driver_count_category_description`.`driver_count_category_name` as `title` 
	
	FROM `driver_count_category` LEFT JOIN  `driver_count_category_description` USING(`driver_count_category_id`) 
	WHERE `driver_count_category_description`.`driver_count_category_language_id` = '$lng_id'
	";
	$countCategoriesTitles = $db->queryFetch ( $selectString );
	
	$stringBuffer = "";
			foreach ( $countCategoriesTitles as $countCat ) {
				$stringBuffer .= "<option value='" . $countCat ['id'] . "' >" . $countCat ['title'] . "</option>";
			}
			return $stringBuffer;
}

function insert_getAllCoeficentByDuration( $params )
{
	$db = db::getInstance();
    $lng_id = Request::$currentLang['id'];
	$selectString = "
	SELECT 
	`coefficient_by_duration`.`coefficient_by_duration_coefficient` as `id`  ,
	`coefficient_by_duration_description`.`coefficient_by_duration_name` as `title` 
	
	FROM `coefficient_by_duration` LEFT JOIN  `coefficient_by_duration_description` USING(`coefficient_by_duration_id`) 
	WHERE `coefficient_by_duration_description`.`coefficient_by_duration_language_id` = '$lng_id' 
	";
	$coeficents = $db->queryFetch ( $selectString );
	
	$stringBuffer = "";
			foreach ( $coeficents as $title ) {
				$stringBuffer .= "<option value='" . $title ['id'] . "' >" . $title ['title'] . "</option>";
			}
 	return $stringBuffer;
			 
}

function insert_powerCategoriesTitles($params)
{
	$db = db::getInstance();
    $lng_id = Request::$currentLang['id'];
	$selectString = "
	SELECT 
	`passenger_power_category`.`passenger_power_category_id` as `id`  ,
	`passenger_power_category_description`.`passenger_power_category_name` as `title` 
	
	FROM `passenger_power_category` LEFT JOIN  `passenger_power_category_description` USING(`passenger_power_category_id`) 
	WHERE `passenger_power_category_description`.`passenger_power_category_language_id` = '$lng_id'
	";
	$powerCategoriesTitles = $db->queryFetch ( $selectString );
	
	$stringBuffer = "";
			foreach ( $powerCategoriesTitles as $powerCat ) {
				$stringBuffer .= "<option value='" . $powerCat ['id'] . "' >" . $powerCat ['title'] . "</option>";
			}
			echo $stringBuffer;
}

function insert_truckPowerCategoriesTitles($params)
{
	$db = db::getInstance();
    $lng_id = Request::$currentLang['id'];
	$selectString = "
	SELECT 
	`truck_power_category`.`truck_power_category_id` as `id`  ,
	`truck_power_category_description`.`truck_power_category_name` as `title` 
	
	FROM `truck_power_category` LEFT JOIN  `truck_power_category_description` USING(`truck_power_category_id`) 
	WHERE `truck_power_category_description`.`truck_power_category_language_id` = '$lng_id'
	";
	$powerCategoriesTitles = $db->queryFetch ( $selectString );
	
	$stringBuffer = "";
			foreach ( $powerCategoriesTitles as $powerCat ) {
				$stringBuffer .= "<option value='" . $powerCat ['id'] . "' >" . $powerCat ['title'] . "</option>";
			}
			echo $stringBuffer;
}


function insert_truckCategories($params)
{
	$db = db::getInstance();
    $lng_id = Request::$currentLang['id'];
	$selectString = "
	SELECT 
	`passenger_power_category`.`passenger_power_category_id` as `id`  ,
	`passenger_power_category_description`.`passenger_power_category_name` as `title` 
	
	FROM `passenger_power_category` LEFT JOIN  `passenger_power_category_description` USING(`passenger_power_category_id`) 
	WHERE `passenger_power_category_description`.`driver_count_category_language_id` = '$lng_id'
	";
	$powerCategoriesTitles = $db->queryFetch ( $selectString );
	
	$stringBuffer = "";
	
			foreach ( $powerCategoriesTitles as $powerCat ) {
				$stringBuffer .= "<option value='" . $powerCat ['id'] . "' >" . $powerCat ['title'] . "</option>";
			}
			echo $stringBuffer;
}

function insert_selectTrailer($params)
{
	global $lng;
    
	$stringBuffer = "";
	
		 
				$stringBuffer .= "<option value='1' >" . 'NO' . "</option>";
				$stringBuffer .= "<option value='2' >" . 'YES' . "</option>";
	return $stringBuffer;	 
} 
function getCarTypeDriverCategories($type) {
	
    
	$db = db::getInstance();
    $lng_id = Request::$currentLang['id'];
	$priceByCarType = "";
	switch ($type) {
		case 2 :
			$priceByCarType = "truck_price";
			break;
		case 3 :
			$priceByCarType = "bus_price";
			break;
		case 4 :
			$priceByCarType = "moto_price";
			break;
		
		case 5 :
			$priceByCarType = "other_price";
			break;
		default :
			return;
	}
	$selectString = "SELECT 
    `use_category`.`use_category_id` as `id`  ,
    `use_category_description`.`use_category_name` as `title`
    FROM `use_category` 
    LEFT JOIN  `use_category_description` ON (`use_category`.`use_category_id` = `use_category_description`.`use_category_id`) 
    LEFT JOIN `$priceByCarType` ON (`use_category`.`use_category_id` = `$priceByCarType`.`$priceByCarType"."_use_category_id`)
    WHERE `use_category_description`.`use_category_language_id` = '$lng_id'
    AND `use_category`.`use_category_id` = `$priceByCarType`.`$priceByCarType"."_use_category_id`
			GROUP BY `use_category`.`use_category_id`
			ORDER BY `use_category`.`use_category_id`";
            
            
	
    
 
    	//echo "-------".$selectString."<br/>";	
	$categories = $db->queryFetch ( $selectString );
    
    
    return $categories;
	//	$price=$price['price'];			
}


function getCoefficientByDurationSelector( $index )
{
	$db = db::getInstance();
    $lng_id = Request::$currentLang['id'];
	
    $selectString = "SELECT * FROM `coefficient_by_duration` ";
	$coefficientsArray = $db->queryFetch ( $selectString );
	
	
}


?>