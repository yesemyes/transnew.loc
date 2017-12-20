<?
class front extends frontEnd {
	public $LeftPortfolioItems;
	public $RigthTextItems;
	public $RigthNews;
	public $moduleMethodName;
	public $dictonary;
	public $homeBrands;
	public $instance;
	
	public $headStyleSheets = array ();
	public $headScripts = array ();
	function __construct() {
		
		parent::__construct ();
		$this->headStyleSheets [] = "/css/showcase.css";
		$this->headStyleSheets [] = "/css/style.css";
		$this->headStyleSheets [] = "/css/table_style.css";
		$this->headStyleSheets [] = "/css/nivo-slider.css";

    	
		$this->headStyleSheets [] = "/css/dd.css";
		$this->headStyleSheets [] = "/css/BackToTop.jquery.css";
		
		$this->headStyleSheets [] = "/css/search.css";
		
			
	   $this->headStyleSheets [] = "/css/combo.css";
       $this->headStyleSheets [] = "/css/jquery-ui-1.9.1.custom.css";
	
		
		$this->headStyleSheets [] = "/css/newscarousel.css";
		$this->headStyleSheets [] = "/css/{$this->defLng['code']}.css";
		$this->headStyleSheets [] = "/css/menu/menu.css";
        
		
		$this->headScripts [] = "/scripts/jquery-1.8.2.js";
		$this->headScripts [] = "/scripts/jquery.colorbox-min.js";
		$this->headScripts [] = "/scripts/carousel/jquery.jcarousellite.min.js";
		$this->headScripts [] = "/scripts/carousel/script_jcarousellite.js";
		$this->headScripts [] = "/scripts/searchcontextMenu.js";
		$this->headScripts [] = "/scripts/newscarousel.js";
		$this->headScripts [] = "/scripts/jquery.nivo.slider.js";
		$this->headScripts [] = "/scripts/jquery-ui.js";
		$this->headScripts [] = "/scripts/range-jquery-ui.js";
		$this->headScripts [] = "/scripts/jquery.combobox.js";
		$this->headScripts [] = "/scripts/top-search.js";
		$this->headScripts [] = "/scripts/jquery.dd.js";
		$this->headScripts [] = "/scripts/top-search.js";
		$this->headScripts [] = "/scripts/BackToTop.jquery.js";
		$this->headStyleSheets [] = "/css/jquery.jscrollpane.css";
		$this->headScripts [] = "/scripts/jquery.mousewheel.js";
		$this->headScripts [] = "/scripts/jquery.jscrollpane.js";
		$this->headScripts [] = "/scripts/jquery.lavalamp.js";
        $this->headScripts [] = "/scripts/jquery.aw-showcase.js";
        
		$this->headScripts [] = "/scripts/main.js";
		$this->headScripts [] = "/scripts/script.js";
		
		$this->initAdvSearch ();
		$db = db::getInstance ();
		$this->genDictonarys ();
		$this->menu ['top'] ['left'] = $db->getTree ( 'menu', 'menu.id,pid,label,alias,href', 'lng_id = ' . $this->defLng ['id'] . "    AND topmenu='left' AND active   ", '', '`position` asc' );
		$this->menu ['top'] ['rigth'] = $db->getTree ( 'menu', 'menu.id,pid,label,alias,href', 'lng_id = ' . $this->defLng ['id'] . "    AND topmenu='right' AND active   ", '', '`position` asc' );
		
        
        
		$this->menu ['bottom'] = $db->getTree ( 'menu', 'menu.id,pid,label,alias', 'lng_id = ' . $this->defLng ['id'] . "    AND bottommenu AND active", '', '`position` asc' );
		$this->all_users = $db->getRow('siteusers',"count(`id`) AS qty","`active`='1' AND `lng_id` ='{$this->defLng ['id']}'");
        
        $all_users = "SELECT count(id) as `qty` FROM `siteusers` WHERE `active` = '1'";
        $this->all_users = $db->queryFetchOne($all_users);
        
        
		
		$moduleMethodName = preg_replace ( '/[^a-z0-9_]/', ' ', $this->module );
		$moduleMethodName = ucwords ( $moduleMethodName );
		$moduleMethodName = str_replace ( " ", '', $moduleMethodName );
		$moduleMethodName = "fe$moduleMethodName";
		
		if (class_exists ( $moduleMethodName )) {
			$module = new $moduleMethodName ( $this );
			$this->instance = $module;
		} else {
			$this->instance = $this;
		
		}
	
	}
	public function initAdvSearch() {
		
		$this->headStyleSheets [] = "/css/jquery.multiSelect.css";
		$this->headScripts [] = "/scripts/jquery.multiSelect.js";
		$this->headScripts [] = "/scripts/jquery.validate.js";
		$this->headScripts [] = "/scripts/select.js";
		$this->headScripts [] = "/scripts/initmultiSelect.js";
		$this->headScripts [] = "/scripts/jquery.bgiframe.min.js";
		
		$this->headScripts [] = "/scripts/adv-search.js";
        
	}
	public function getHomeBrands() {
		$db = db::getInstance ();
		$homeBrands = $db->getArray ( 'brandmodel', '*', '`lng_id`=' . $this->defLng ['id'] . ' 
		                                                   AND `active`=1 
														   AND `home`=1 AND 
														   pid= 0', '', 'label', "" );
		
		$this->homeBrands = $homeBrands;
	
	}
	public function getRigthOffers() {
		$db = db::getInstance ();
		$what = "                
								  offers.id as id,
								  offers.name, 
								  offers.filed_main_image, 
								  offers.service_price, 
								  offers.filed_car_brand as brand_id,
				                  brand.label as brand,
				                  offers.filed_car_brand_model as model_id,
				                  model.label as model,
				                  brand.label as brand,
				                  model.alias as model_alias,
				                  brand.alias as brand_alias,
				                  currency.iso as currency,
				                  filed_price as price,
				                  filed_contract, 
				                  filed_release_date_year as year,
				                  siteusers.login as login
				                  
				                  
				                 ";
		$from = " FROM offers
				                  
				        		  INNER JOIN brandmodel    as brand ON ( offers.filed_car_brand       = brand.id )
				                  INNER JOIN brandmodel    as model ON ( offers.filed_car_brand_model = model.id )
				                  LEFT JOIN currency      	ON          (currency.id = `offers`.`filed_currency` )
				                  INNER JOIN siteusers      	ON          (siteusers.id = `offers`.`siteuser` )
				                  
				                  ";
		
		$query = " SELECT $what $from WHERE  `offers`.`active`='1' ORDER BY modify_date DESC LIMIT 0,{$this->config['in_right_qty']}";
		
		return $db->queryFetch ( $query );
	}
	public function getOffers($where = null, $order = null, $limit = null, $page = 1) {
		$db = db::getInstance ();
		$curlng_id = $this->defLng ['id'];
		
		$EUR = $this->config ['EUR_RATE'];
		$USD = $this->config ['USD_RATE'];
		
		if ($where) {
			
            
            if (is_array ( $where )) {
				$condition = implode ( " AND ", $where );
                
                
				if ($condition) {
					$query .= " WHERE $condition ";
				}
			} elseif (is_string ( $where )) {
				$query .= " WHERE $where ";
			}
		
		}
		
	$query1 = " 		SELECT 	 
							count(offers.id) as `qty`
				                  
				        FROM offers
				                  inner JOIN brandmodel    as brand   ON          (`brand`.`id` = `offers`.`filed_car_brand` )
				                  LEFT JOIN brandmodel    as model   ON          (`model`.`id` = `offers`.`filed_car_brand_model` )
				        		  LEFT JOIN siteusers       ON          (`siteusers`.`id` = `offers`.`siteuser` )
				                  LEFT JOIN siteusers_ml    ON          (`siteusers`.`id` = `siteusers_ml`.`id`  AND  `siteusers_ml`.`lng_id`=$curlng_id)  
				        		 
		                  " . $query;
		
		$count = $db->queryFetchOne ( $query1 );
        
		
		/*
		 * siteusers.phone1 as phone1, siteusers.phone2 as phone2,
		 */
		
		$what = "                
								  offers.*,
								  brand.alias as brandalias,
								  model.alias as modelalias,
								  CONCAT( brand.label,' ',model.label) as `brandmodel`,
				                  siteusers.login as login,
				                  siteusers.name  as saler,
				                  siteusers_ml.description as user_description,
				                  siteusers_ml.addres as user_addres
				                  
				                  ";
		
		$query = " 		SELECT 	 
							$what
				                  
				        FROM offers
				                  inner JOIN brandmodel    as brand   ON          (`brand`.`id` = `offers`.`filed_car_brand` )
				                  LEFT JOIN brandmodel    as model   ON          (`model`.`id` = `offers`.`filed_car_brand_model` )
				        		  LEFT JOIN siteusers       ON          (`siteusers`.`id` = `offers`.`siteuser` )
				                  LEFT JOIN siteusers_ml    ON          (`siteusers`.`id` = `siteusers_ml`.`id`  AND  `siteusers_ml`.`lng_id`=$curlng_id)
		                  " . $query;
		
        
		if ($order) {
			if (is_array ( $order )) {
				$conditionOrder = implode ( " , ", $order );
				if ($condition) {
					$query .= " ORDER BY $conditionOrder ";
				}
			} elseif (is_string ( $order )) {
				if ($order == 'filed_price DESC')
					$order = "service_price DESC";
				elseif ($order == 'price ASC')
					$order = "service_price ASC";
				elseif ($order == 'price DESC')
					$order = "service_price DESC";
				elseif ($order == 'year ASC')
					$order = "filed_release_date_year ASC";
				elseif ($order == 'year DESC')
					$order = "filed_release_date_year DESC";
				elseif ($order == 'engine ASC')
					$order = "filed_engine ASC";
				elseif ($order == 'engine DESC')
					$order = "filed_engine DESC";
				elseif ($order == 'milage ASC')
					$order = "filed_milage ASC";
				elseif ($order == 'milage DESC')
					$order = "filed_milage DESC";
				elseif ($order == 'filed_price ASC')
					$order = "service_price ASC";
				 
					
				
				$query .= " ORDER BY $order ";
			}
		}
		if ($limit) {
			$page = $page > 0 ? $page : 1;
			$limitStr = ($page - 1) * $limit . ", " . $limit;
			$query .= " LIMIT $limitStr ";
		
		}
		
		$found = $db->queryFetch ( $query );
        
        
		
		foreach ( $found as &$item ) {
			$gallery = $db->getOptions ( 'offers_image_rel', 'image', 'id', 0, "`id`={$item['id']}" );
			$item ['gallery'] = array_keys ( $gallery );
		
		}
		
		$return = array ('found' => $found, 'total' => $count ['qty'], 'limit' => $limit, 'page' => $page );
		
		return $return;
	
	}
	
	public function getOfferOptions($offer_id) {
		$db = db::getInstance ();
		if (! $offer_id)
			return array ();
		$query = " SELECT 
		                    parent_ml.label as parent_opt,parent.id as id, parent.pid as pid,
		                    options_ml.label as opt
		           FROM   
		           options    INNER JOIN options as parent 
		           									ON (options.pid = parent.id)
		           			  INNER JOIN options_ml  
		           			  						ON (options.id = options_ml.id AND options_ml.lng_id={$this->defLng['id']})
		           			  INNER JOIN options_ml as parent_ml  
		           			  						ON (parent.id = parent_ml.id AND parent_ml.lng_id={$this->defLng['id']})
		                      INNER JOIN offers_filed_options_rel 
		                      						ON (offers_filed_options_rel.filed_options = options.id AND offers_filed_options_rel.id='{$offer_id}')
		           	ORDER BY parent.pid , parent.position,options.position
		           
		           ";
		
		$options = $db->queryFetch ( $query );
		$return = array ();
		
		foreach ( $options as $option ) {
			if (! in_array ( $option ['parent_opt'], $return ))
				$return [$option ['parent_opt']] [] = $option ['opt'];
		}
		
		return $return;
	}
	
	public function getOfferOptionsAll($offer_id) {
		$db = db::getInstance ();
		$query = " SELECT *
		           FROM   
		           offers_filed_options_rel 
		                      						WHERE offers_filed_options_rel.id='{$offer_id}'
		           	
		           
		           ";
		
		$options = $db->queryFetch ( $query );
		
		$return = array ();
		foreach ( $options as $option ) {
			$return [] = $option ['filed_options'];
		
		}
		
		return $return;
	
	}
	public function getOfferImages($offer_id) {
		
		$db = db::getInstance ();
		$query = " SELECT *
		           FROM   
					offers_image_rel
				  WHERE id=	'{$offer_id}'
		           	
		           
		           ";
		
		$options = $db->queryFetch ( $query );
		$root = array ();
		$root ['items'] ["image"] ['resize'] = array ('thumb' => 100, 'small' => 200, 'middle' => 400, 'big' => 800 );
		
		if (isset ( $root ['items'] ['image'] ['resize'] )) {
			$folders = $root ['items'] ['image'] ['resize'];
			$folders = array_keys ( $folders );
			
			$folderLocation = "img/offers/";
			$return = array ();
			
			foreach ( $options as $x => $image ) {
				
				$exist = true;
				foreach ( $folders as $folder ) {
					$imageLOcation = $folderLocation . "$folder/" . $image ['image'];
					
					if (! file_exists ( $imageLOcation )) {
						
						$exist = false;
					} else {
					
					}
				}
				
				if ($exist) {
					
					$return [] = $image;
				}
			
			}
		}
		if (! empty ( $return ))
			return $return;
		else {
			$query = " SELECT brandmodel.image FROM offers LEFT JOIN brandmodel ON (offers.filed_car_brand = brandmodel.id) WHERE offers.id='{$offer_id}'";
			$return = $db->queryFetchOne ( $query );
			return $return ['image'];
		
		}
	}
	
	public function buildAdSearchWhere() {
		$db = db::getInstance ();
		$EUR = $this->config ['EUR_RATE'];
		$USD = $this->config ['USD_RATE'];
		
		$where = array ();
		if (isset ( $this->get ['search'] )) {
			foreach ( $this->get as $key => $value ) {
				if (! in_array ( $key, array ('search', 'action', 'filed_options', 'order_by', 'direction', 'rel', 'filed_car_brand', 'filed_car_brand_model' ) )) {
					if (is_array ( $value ) && (isset ( $value ['from'] ) || $value ['to'])) {
						if (isset ( $value ['from'] )) {
							if ($key == 'price') {
								
								$value ['from'] = intval ( $value ['from'] );
								$priceFrom = $USD *$value ['from']; 
								$where [] = "`service_price`  >=$priceFrom";
							
							} else
								
								$where [] = "`$key` >='{$value['from']}' ";
						}
						
						if (isset ( $value ['to'] )) {
							
							if ($key == 'price') {
								$value ['to'] = intval ( $value ['to'] );
                                if($value ['to'] > 0){
                                    
                                $priceTo = $USD *$value ['to'];     
								$where [] = "`service_price`  <=$priceTo";
                                }
							} else {
								
								$where [] = "`$key` <='{$value['to']}' ";
							}
						}
					
					} elseif (is_array ( $value )) {
						
						$valus = array ();
						foreach ( $value as $v ) {
							if (! is_array ( $v ))
								$valus [] = $v;
							else {
								foreach ( $v as $vs ) {
									$valus [] = $vs;
								}
							}
						
						}
						
						$valueStr = implode ( "','", $valus );
						$where [] = "`$key` IN ('$valueStr') ";
					} 

					else {
						
						if (strrpos ( $value, "," )) {
							$where [] = "`$key` IN ($value) ";
						} else
							$where [] = "`$key` ='$value' ";
					
					}
				} elseif ($key == 'rel') {
					
					foreach ( $value ['filed_options'] as $vals ) {
						if (is_array ( $vals ))
							$vals = array_shift ( $vals );
						
						$filed_options [] = $vals;
					}
					
					$filed_options = implode ( ",", $filed_options );
					
					$query = " SELECT `id` FROM `offers_filed_options_rel` WHERE `filed_options` IN ($filed_options) GROUP BY id ";
					$sites = $db->queryFetch ( $query );
					$xx [] = - 1;
					
					foreach ( $sites as $s ) {
						
						$xx [] = $s ['id'];
					}
					
					if (! empty ( $xx )) {
						$str = implode ( ",", $xx );
						$where [] = "offers.`id` in ($str) ";
					
					}
				
				} elseif ($key == 'order_by') {
					
					global $smarty;
					switch ($this->get ['order_by']) {
						case 'year' :
							$order_by = 'filed_release_date_year';
							break;
						case 'milage' :
							$order_by = 'filed_milage';
							break;
						case 'price' :
							$order_by = 'filed_price';
							break;
						case 'engine' :
							$order_by = 'filed_engine';
							break;
						default :
							$order_by = $this->get ['order_by'];
							
							break;
					}
					$smarty->assign ( '_order', "{$order_by}  {$this->get['direction']}" );
				
				} elseif ($key == 'filed_car_brand') {
					$wt = array ();
					foreach ( $value as $_index => $v ) {
						if ($v) {
							if (isset ( $this->get ['filed_car_brand_model'] [$_index] ) && $this->get ['filed_car_brand_model'] [$_index]) {
								if (strstr ( $this->get ['filed_car_brand_model'] [$_index], ',' )) {
									$wt [] = "(`filed_car_brand`=$v AND `filed_car_brand_model` IN ({$this->get['filed_car_brand_model'][$_index]}) )";
								} else {
									$wt [] = "(`filed_car_brand`=$v AND `filed_car_brand_model` ={$this->get['filed_car_brand_model'][$_index]} )";
								}
							} else {
								$wt [] = "(`filed_car_brand`=$v )";
							}
							
							if (isset ( $this->get ['filed_modification'] [$_index] ) && $this->get ['filed_modification'] [$_index]) {
								$wt [] = "(`filed_modification` LIKE '{$this->get['filed_modification'][$_index]}%' )";
							}
						}
					}
					
					if (! empty ( $wt )) {
						$where [] = "(" . implode ( " OR ", $wt ) . ")";
					}
				}
			}
			global $smarty;
			// print_r( $where);
			$smarty->assign ( '_where', $where );
			
			$Aparams = $this->get;
			$paramArray = array ();
			foreach ( $this->get as $key => $value ) {
				
				$params = $Aparams;
				if (! in_array ( $key, array ('search', 'rel' ) )) 
				{
					
					if (!in_array ( $key, array ('order_by', 'direction' ) )) 
					{
					
					
						$param = new stdClass ();
						$param->key = $key;
						
						if ($key == 'filed_currency') {
							$label = $db->getRow ( 'currency', 'value', "`lng_id`= '{$this->defLng['id']}' AND `id`='{$value}'" );
							$param->label = $label ['value'];
						} else {
							
							$param->label = $this->trans ( $key );
						}
						
						unset ( $params [$key] );
						$param->url = http_build_query ( $params );
						if (is_array ( $value )) {
							
							foreach ( $value as $k => $v ) 
							{
								
								$params = $Aparams;
								$p = new stdClass ();
								$p->key = $k;
								unset ( $params [$key] [$k] );
								$p->url = http_build_query ( $params );
								$getAsSet = array ('filed_modification', 'filed_release_date_year', 'filed_milage', 'filed_engine', 'filed_engine_power', 'price' );
								if (in_array ( $param->key, $getAsSet )) {
									$p->dir = $k;
									$p->label = $v;
								
								} 
								elseif (in_array ( $param->key, array ('filed_car_brand', 'filed_car_brand_model' ) )) 
								{
									if ($param->key == 'filed_car_brand_model') {
										if (! isset ( $paramArray ['filed_car_brand']->subs [$p->key] )) {
											continue;
										}
									}
									$table = 'brandmodel';
									if (strstr ( $v, "," )) {
										$label = $db->getRow ( $table, 'label,pid', "`lng_id`= '{$this->defLng['id']}' AND `id` IN ('{$v}')" );
										$label = $db->getRow ( $table, 'label', "`lng_id`= '{$this->defLng['id']}' AND `id` ='{$label['pid']}'" );
									
									} else
										$label = $db->getRow ( $table, 'label', "`lng_id`= '{$this->defLng['id']}' AND `id`='{$v}'" );
									
									$p->label = $label ['label'];
								
								} else {
									$table = str_replace ( "filed_", "", $param->key );
									$label = $db->getRow ( $table, 'value', "`lng_id`= '{$this->defLng['id']}' AND `id`='{$v}'" );
									$p->label = $label ['value'];
								}
								
								$param->subs [$p->key] = $p;
							
							}
						
						}
						$paramArray [$param->key] = $param;
					}
				}
			}
			global $smarty;
			
			$backLink = $this->get;
			unset ( $backLink ['search'] );
			
			// $this->clearBackLinksArray($paramArray);
			$smarty->assign ( 'changeParrams', $paramArray );
			$smarty->assign ( 'backLink', $backLink );
		
		}
    }
	
	/*
	 * validate Functions
	 */
	public function validateCheckLogin() {
		$db = db::getInstance ();
		$data_login = $this->get ['data_login'];
		$where = "siteusers.login='{$data_login}'";
		if (isset ( $this->get ['id'] ))
			$where .= " AND id != '{$this->get['id']}'";
		
		$row = $db->getRow ( 'siteusers', 'login', $where );
		if (empty ( $row ))
			die ( json_encode ( true ) );
		else
			die ( json_encode ( false ) );
	}
	public function validateCheckEmail() {
		$db = db::getInstance ();
		if(isset( $this->get ['data_email'])){
		$data_login = $this->get ['data_email'];
		}
		elseif(isset($this->get['company']['email']))
		{
			$data_login = $this->get['company']['email'];
		}
		$where = "siteusers.email='{$data_login}'";
		if (isset ( $this->get ['id'] ))
			$where .= " AND id != {$this->get['id']}";
		$row = $db->getRow ( 'siteusers', '*', $where );
		if (count($row)<1)
			{
				die ( json_encode (true) );
			}
		else{
				die ( json_encode (false) );
			}
	}
	public function validateCheckEmailExist() {
		$db = db::getInstance ();
		$data_login = $this->get ['data_email'];
		$row = $db->getRow ( 'siteusers', 'login', "siteusers.email='{$data_login}'" );
		if (empty ( $row ))
			die ( json_encode ( false ) );
		else
			die ( json_encode ( true ) );
	}
	public function validateCheckOldPassword() {
		$old_password = $this->get ['old_password'];
		
		$return = (md5 ( $old_password ) == $_SESSION ['siteusers'] ['password']);
		die ( json_encode ( $return ) );
	
	}
	public function validateGetModels() {
		$db = db::getInstance ();
		
		$pid = $this->get ['pid'];
		
		$models = $db->getArray ( 'brandmodel', "`id`,`pid`,`label`", "`pid`='{$pid}' AND `active` = '1' AND `lng_id`='{$this->defLng['id']}'", "`label` ='Other',label" );
		
		foreach ( $models as $i => $model ) {
			if ($model ['label'] == 'Other') {
				$models [$i] ['label'] = $this->trans ( 'other_model' );
			}
			$subs = $db->getArray ( 'brandmodel', "`id`,`pid`,`label`", "`pid`='{$model['id']}' AND `active` AND `lng_id`='{$this->defLng['id']}'", 'label' );
			if (! empty ( $subs ))
				$models [$i] ['subs'] = $subs;
		}
		
		die ( json_encode ( $models ) );
	
	}
    	public function validateGetStates() {
		$db = db::getInstance ();
		
		$pid = $this->get ['pid'];
		
		$states = $db->getArray ( 'states', '*', "`pid`='{$pid}' AND `active` = '1' AND `lng_id`='{$this->defLng['id']}'",'','position');
		
		foreach ( $states as $i => $state ) {
			$subs = $db->getArray ( 'states', '`id`,`pid`,`value`', "`pid`='{$states['id']}' AND `active` AND `lng_id`='{$this->defLng['id']}'", '','position' );
			if (! empty ( $subs ))
				$states [$i] ['subs'] = $subs;
		}
		
		die ( json_encode ( $states ) );
	
	}
	public function validateCheckCaptcha() {
		$match = $this->get ['captcha'] == $_SESSION ['captcha_keystring'];
		
		die ( json_encode ( $match ) );
	}
	
	/*
	 * validate Functions
	 */
	
	public function getCurrencyRates() {
		
		$db = db::getInstance ();
		$query = " 
		SELECT * 
		FROM (
				SELECT  currency.iso,currency.image,rates.value,currency.position as 	position
				FROM currency 
		        INNER JOIN rates ON (currency.id = rates.currency) 
		        ORDER BY `date` DESC 
		     ) as ordered
		          
       GROUP BY `iso` 
       ORDER BY ordered.position
		           ";
		
		$all = $db->queryFetch ( $query );
		return $all;
	
	}
	public function genDictonarys() {
		
		$db = db::getInstance ();
		
		$dict ['brandmodel'] = $db->getOptions ( 'brandmodel', 'id', 'label', $this->defLng ['id'], 'active' );
		if($dict ['brandmodel'])
        {
            
            
		foreach ( $dict ['brandmodel'] as $i => $bm ) {
			if ($bm == 'Other') {
				$dict ['brandmodel'] [$i] = HelperFunction::trans ( array ('term' => 'other_model' ) );
			}
		}
		}
		$dict ['brand'] = $db->getOptions ( 'brandmodel', 'id', 'label', $this->defLng ['id'], 'active AND pid=0', '', 'label' );
		$dict ['brand_icons'] = $db->getArray ( 'brandmodel', 'id,alias,label,image', "`lng_id`='{$this->defLng ['id']}' AND `active` AND `pid`=0", '', 'label','',"id" );
		$dict ['brandmodel'] = $db->getOptions ( 'brandmodel', 'id', 'label', $this->defLng ['id'], "active='1'", '', 'label' );
		
		$dict ['currency'] = $db->getOptions ( 'currency', 'id', 'iso', $this->defLng ['id'], 'active' );
		$dict ['body'] = $db->getOptions ( 'body', 'id', 'value', $this->defLng ['id'], 'active','','position ASC' );
        
		
		$dict ['body_all'] = $db->getArray ( 'body', 'id,value,image', "`lng_id`='{$this->defLng ['id']}' AND `active`",'position ASC' );
        
		$dict ['bargaining'] = $db->getOptions ( 'bargaining', 'id', 'value', $this->defLng ['id'], 'active', '', 'position' );
		
		$dict ['state'] = $db->getOptions ( 'state', 'id', 'value', $this->defLng ['id'], 'active', '', 'position' );
		$dict ['drive'] = $db->getOptions ( 'drive', 'id', 'value', $this->defLng ['id'], 'active', '', 'position' );
		$dict ['warranty'] = $db->getOptions ( 'warranty', 'id', 'value', $this->defLng ['id'], 'active', '', 'position' );
		$dict ['rudder'] = $db->getOptions ( 'rudder', 'id', 'value', $this->defLng ['id'], 'active', '', 'position' );
		$dict ['color'] = $db->getOptions ( 'color', 'id', 'value', $this->defLng ['id'] );
		$dict ['color_adv'] = $db->getArray ( 'color', '*', "`lng_id`='{$this->defLng ['id']}'", '', 'position', '', 'id' );
        
		$dict ['interchange'] = $db->getOptions ( 'interchange', 'id', 'value', $this->defLng ['id'] );
        $dict ['credit'] = $db->getOptions ( 'credit', 'id', 'value', $this->defLng ['id'] );
        
		$dict ['customs'] = $db->getOptions ( 'customs', 'id', 'value', $this->defLng ['id'] );
		$dict ['gearbox'] = $db->getOptions ( 'gearbox', 'id', 'value', $this->defLng ['id'], 'active', '', 'position' );
		$dict ['fuel'] = $db->getOptions ( 'fuel', 'id', 'value', $this->defLng ['id'], 'active', '', 'position' );
        $dict ['milage_kayficent'] = $db->getOptions ( 'milage_kayficent', 'kayficent', 'value', $this->defLng ['id'], 'active', '', 'position' );
		$newsPage = $db->getRow ( 'menu', "*", "`alias` LIKE 'transport'" );
		$trPid = $newsPage ['id'];
		$servicescategory = $db->getArray ( 'menu', '`id`,`label` as `name`,`alias`', "`lng_id`='{$this->defLng ['id']}' AND `active`='1' AND `pid`='{$trPid}'", '', 'position ASC' ,'',"id");
		
		foreach ( $servicescategory as &$scategory ) {
			
			$found = $db->getRow ( 'services', "count(*) as `qty`", "`active`='1' AND `servicescategory`='{$scategory['id']}' AND `lng_id`='{$this->defLng ['id']}'" );
			$subcategory = $db->getArray ( 'menu', '`id`,`label` as `name`,`alias`', "`lng_id`='{$this->defLng ['id']}' AND `active`='1' AND `pid`='{$scategory['id']}'", '', 'position ASC' ,'',"id");
			$scategory ['qty'] = $found ['qty'];
            $scategory ['subs'] = $subcategory;
		}
		$dict ['servicescategory'] = $servicescategory;
		
		$this->dictonary = $dict;
	
	}
	
/*	public function getPrices($price, $currency_code, $service_price) {
		
		$rate ['USD'] = $this->config ['USD_RATE'];
		$rate ['EUR'] = $this->config ['EUR_RATE'];
		$rate ['AMD'] = 1;
		
		$return [$currency_code] = $price;
		$return ['USD'] = round ( $service_price, 0 );
		
		if ($currency_code == 'USD') {
			$return ['AMD'] = $service_price * $rate ['USD'];
			$return ['EUR'] = round ( $service_price * $rate ['USD'] / $rate ['EUR'], 0 );
		}
		
		if ($currency_code == 'AMD') {
			$return ['EUR'] = round ( $price / $rate ['EUR'], 0 );
		  	
        }
		
		if ($currency_code == 'EUR') {
			$return ['AMD'] = round ( $service_price * $rate ['USD'], 0 );
		    
		}
        
		
		return $return;
	}*/
	
	public function preBuild() {
		
		$StyleSheets = array ();
		foreach ( $this->headStyleSheets as $index => $styleSheet ) {
			$pathinfo = pathinfo ( $styleSheet );
			$StyleSheets [$pathinfo ['filename']] = $styleSheet;
		}
		$this->headStyleSheets = $StyleSheets;
		$headScripts = array ();
		foreach ( $this->headScripts as $index => $scripts ) {
			$pathinfo = pathinfo ( $scripts );
			$headScripts [$pathinfo ['filename']] = $scripts;
		}
		
		$this->headScripts = $headScripts;
	}
	
	public function trans($term) {
		return HelperFunction::trans ( array ('term' => $term ) );
	}
	
	public function getAllBrands($is_usssr = false) {
		$db = db::getInstance ();
		$tmpBrands = $db->getArray ( 'brandmodel', '*', 'lng_id=' . $this->defLng ['id'] . " AND `active` AND pid = 0  ", '', 'label' );
		if ($is_usssr) {
			
			foreach ( $tmpBrands as $brand ) {
				$AllBrands [$brand ['is_usssr']] [$brand ['id']] = $brand;
			}
		} else {
			$tmpBrands = $AllBrands;
		}
		
		$this->AllBrands = $AllBrands;
	
	}
	
	public function getPool() {
		$now = date ( 'Y-m-d H:i:s' );
		
		$db = db::getInstance ();
		$pool = $db->getRow ( 'pool', "*", "`lng_id`={$this->defLng ['id']} AND `active`='1' AND `date_from` <='$now' AND `date_to` >='$now'" );
		if (empty ( $pool )) {
			return false;
		}
		
		$questions = $db->getOptions ( 'pool_questions_rel', 'questions', 'votes', 0, "`id`={$pool['id']}" );
		$totalVotes = 0;
		foreach ( $questions as $questionId => $votes ) {
			$totalVotes += $votes;
			
			$question = $db->getRow ( 'pool_questions', '*', "`lng_id`={$this->defLng ['id']} AND `active`='1' AND  `id`=$questionId" );
			$question ['votes'] = $votes;
			$pool ['questions'] [$questionId] = $question;
		}
		$pool ['totalVotes'] = $totalVotes;
		$pool ['inner_tpl'] = isset ( $_COOKIE ['pool_' . $pool ['id']] ) ? 'default/pool-reults.tpl.html' : 'default/pool-form.tpl.html';
		
		return $pool;
	}
	
	public function makeFilter() 
	{
		global $smarty;
        $db = db::getInstance();
		$this->buildAdSearchWhere ();
		$_where = $smarty->get_template_vars ( '_where' );
        $_order = $smarty->get_template_vars ( '_order' );
		$this->_offers = $this->getOffers ( $_where, $_order );
        
        
        
		$ffilters = array ();
		/*
		$ffilters ['filed_fuel'] = array ();*/
		$ffilters ['filed_price'] = array (
				'0-5000'=>0,
				'5001-10000'=>0,
				'10001-15000'=>0,
				'15001-20000'=>0,
				'20001-'=>0
				
				);
                
        $ffilters ['filed_interchange'] = array ();
        $ffilters ['filed_credit'] = array ();
        $ffilters ['filed_customs'] = array ();
        $ffilters ['filed_drive'] = array ();
		$ffilters ['filed_rudder'] = array ();
		$ffilters ['filed_gearbox'] = array ();
        $ffilters ['filed_body'] = $this->dictonary ['body'];
        foreach ($ffilters ['filed_body'] as $k => $v)
        {
            $ffilters ['filed_body'][$k] = 0;
        }
        
		$ffilters ['filed_milage'] = array (
				'0-50000'=>0,
				'50001-100000'=>0,
				'100001-150000'=>0,
				'150001-200000'=>0,
				'200001-'=>0);
		$ffilters ['filed_release_date_year'] = array ();
		
        
        
		foreach ( $this->_offers ['found'] as $offer ) 
		{
			foreach ( $offer as $f => $v ) {
				
				if (isset ( $ffilters [$f] ) && $v) 
				{
					if ($f == 'filed_price') 
					{
						
						if($v > 0 && $v <= 5000)
						{
							$ffilters [$f] ['0-5000'] ++;
						}
						
						if($v > 5000 && $v <= 10000)
						{
							$ffilters [$f] ['5001-10000'] ++;
						}
						
						if($v > 10000 && $v <= 15000)
						{
							$ffilters [$f] ['10001-15000'] ++;
						}
						if($v > 15000 && $v <= 20000)
						{
							$ffilters [$f] ['15001-20000'] ++;
						}
						
						if($v >  20000)
						{
							$ffilters [$f] ['20001-'] ++;
						}
					
					}elseif ($f == 'filed_milage') 
					{
						if($v > 0 && $v <= 50000)
						{
							$ffilters [$f] ['0-50000'] ++;
						}
						
						if($v > 50000 && $v <= 100000)
						{
							$ffilters [$f] ['50001-100000'] ++;
						}
						
						if($v > 100000 && $v <= 150000)
						{
							$ffilters [$f] ['100001-150000'] ++;
						}
						if($v > 150000 && $v <= 200000)
						{
							$ffilters [$f] ['150001-200000'] ++;
						}
						
						if($v >  200000)
						{
							$ffilters [$f] ['200001-'] ++;
						}
					}
                    elseif ($f == 'filed_body') 
					{
					   if (isset ( $ffilters [$f] [$v] )) {
							$ffilters [$f] [$v] ++;
						}
                    }
                    
					 else {
						if (! isset ( $ffilters [$f] [$v] )) {
							$ffilters [$f] [$v] = 0;
						}
						$ffilters [$f] [$v] ++;
                        
                    }
				}
			}
		}
        
      krsort($ffilters['filed_release_date_year']);
      
        /*
		foreach ( $ffilters ['filed_fuel'] as $fuel => $qty ) {
			$ffilters ['filed_fuel'] [$fuel] = array ('name' => $this->dictonary ['fuel'] [$fuel], 'qty' => $qty );
		}*/
        
        
		foreach ( $ffilters ['filed_rudder'] as $rudder => $qty ) {
			$ffilters ['filed_rudder'] [$rudder] = array ('name' => $this->dictonary ['rudder'] [$rudder], 'qty' => $qty );
		}
        
		foreach ( $ffilters ['filed_gearbox'] as $gearbox => $qty ) {
			$ffilters ['filed_gearbox'] [$gearbox] = array ('name' => $this->dictonary ['gearbox'] [$gearbox], 'qty' => $qty );
		}
        foreach ( $ffilters ['filed_customs'] as $custom => $qty ) {
			$ffilters ['filed_customs'] [$custom] = array ('name' => $this->dictonary ['customs'] [$custom], 'qty' => $qty );
		}
        foreach ( $ffilters ['filed_credit'] as $credit => $qty ) {
			$ffilters ['filed_credit'] [$credit] = array ('name' => $this->dictonary ['credit'] [$credit], 'qty' => $qty );
		}
        foreach ( $ffilters ['filed_interchange'] as $interchange => $qty ) {
			$ffilters ['filed_interchange'] [$interchange] = array ('name' => $this->dictonary ['interchange'] [$interchange], 'qty' => $qty );
		}        
        
        foreach ( $ffilters ['filed_body'] as $body => $qty ) {
            
            if($qty == 0)
            {
               unset ( $ffilters ['filed_body'][$body]); 
            }
            else{
            $ffilters ['filed_body'] [$body] = array ('name' => $this->dictonary ['body'] [$body], 'qty' => $qty );
            }
		}
      
        foreach ( $ffilters ['filed_drive'] as $drive => $qty ) {
			$ffilters ['filed_drive'] [$drive] = array ('name' => $this->dictonary ['drive'] [$drive], 'qty' => $qty );
		}
        /*
        echo "<pre>";        
        print_r($ffilters);
        die;                                
       */
        $this->filters = $ffilters;
		$this->displayTpl = 'cars/resul_filter.tpl.html';
	
	}
}
?>