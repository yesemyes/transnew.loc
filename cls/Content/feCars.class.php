<?php
class feCars extends front {
	function __construct($init) {
		/*
		 * ************************** ************************** *Path Params
		 * Varibles *[0] lng *[1] cars *[2][user|*] *****[2] [user] *********[3]
		 * login *********[4] brandalias *********[5] modelalias *********[6]
		 * offerID *[2] [:barmdalias] *********[3][:modelalias] [2] =>''
		 * *******query[search-order-params] **************************
		 */
		
		$vars = get_object_vars ( $init );
		foreach ( $vars as $key => $value ) {
			$this->{$key} = $value;
		}
		
		$this->headStyleSheets [] = "/css/offers-list.css";
		$this->headStyleSheets [] = "/css/pdd_style.css";
	
		$this->headScripts [] = "/scripts/offer.list.js";
		$this->mainTpl = 'cars/body.tpl.html';
		

		if($_COOKIE['___trans_info_saved_items'])
		{
			$selected = json_decode(stripcslashes($_COOKIE['___trans_info_saved_items']));
			//die("<pre>".print_r($selected));
			
			foreach ($selected as $value)
			{
				$this->selected[] = $value->id;
			}
			
		}

		if (count ( $this->path_params ) > 2) {
			if ($this->path_params [2] == 'user') {
				$this->viewUserOffers ();
			} else {
				$this->viewOffersByBrand ();
			}
		
		} elseif ((count ( $this->path_params ) == 2)) {
			$this->viewAllOffers ();
		} else {
			$this->redirect ( $this->_mklink ( 'error', 404 ) );
		}
if (isset ( $this->get ['action'] )) {
			$_method = $this->get ['action'];
			$_method = ucfirst ( $_method );
			$_method = "make{$_method}";
			
			if (method_exists ( $this, $_method )) {
				
				$this->$_method ();
			} else {
				die ( $_method );
			}
		}
	}
	
	public function viewUserOffers() {
		
		$where = array ();
		$db = db::getInstance ();
		
        
        if(Request::$xRequestedWith)
		{
		  if (isset ( $this->path_params [3] )) {
			
			$this->offerUserLogin = $db->escape ( trim ( ($this->path_params [3]) ) );
			$where [] = " `siteusers`.`login` = '{$this->offerUserLogin}'";
			$this->mainTpl = 'cars/body-left.tpl.html';
			$this->contentTpl = "cars/offerList.tpl.html";
		}
        if (isset ( $this->path_params [4] )) {
			$this->offerBrand = $db->escape ( $this->path_params [4] );
			$where [] = " `brand`.`alias` = '{$this->offerBrand}'";
			$this->mainTpl = 'cars/body-left.tpl.html';
			$this->contentTpl = "cars/offerList.tpl.html";
		
		} 
			
			
		}
        else
        {
           if (isset ( $this->path_params [3] )) {
			$this->offerBrand = $db->escape ( $this->path_params [3] );
			$where [] = " `brand`.`alias` = '{$this->offerBrand}'";
			$this->mainTpl = 'cars/body-left.tpl.html';
			$this->contentTpl = "cars/offerList.tpl.html";
		
		} 
        
                                
		/*if (isset ( $this->path_params [3] )) {
			
			$this->offerUserLogin = $db->escape ( trim ( ($this->path_params [3]) ) );
			$where [] = " `siteusers`.`login` = '{$this->offerUserLogin}'";
			$this->mainTpl = 'cars/body-left.tpl.html';
			$this->contentTpl = "cars/offerList.tpl.html";
		}*/
		
		
		
		if (isset ( $this->path_params [4] )) {
			$this->offerModel = $db->escape ( $this->path_params [4] );
			$where [] = " `model`.`alias` = '{$this->offerModel}'";
			$this->mainTpl = 'cars/body-left.tpl.html';
			$this->contentTpl = "cars/offerList.tpl.html";
		
		}
		}
		if (isset ( $this->path_params [5] )) {
			
			$this->headStyleSheets [] = "/css/gallery.css";
			$this->headStyleSheets [] = "/css/user.offer.css";
			
			$this->headScripts [] = "/scripts/jquery.mousewheel-3.0.4.pack.js";
			$this->headScripts [] = "/scripts/jquery.easing-1.3.pack.js";
			$this->headScripts [] = "/scripts/gallery.js";
			$this->headScripts [] = "/scripts/user.offer.js";
			$this->mainTpl = 'cars/body.tpl.html';
			$this->contentTpl = "cars/user.offer.tpl.html";
			$this->offerID = $this->path_params [5];
			$this->offerID = str_replace ( "TI", '', $this->offerID );
			$this->offerID = intval ( $this->offerID );
			$where [] = " `offers`.`id` = '{$this->offerID}'";
           
           if($this->offerID){
            $offerSiteuser = $db->getRow("offers","siteuser","`active` = '1' AND `id` = '{$this->offerID}'");
            $offerSiteuser = $offerSiteuser['siteuser'];
            
            $siteuser = $db->getRow("siteusers","login","`id` = '{$offerSiteuser}'");
            $siteuser = $siteuser['login'];
			$where [] = " `siteusers`.`id` = '{$offerSiteuser}'";
            }
           
           
            $view_counts = $db->query("INSERT INTO `view_count` SET `id` = '{$this->offerID}',`view_count` = 1 ON DUPLICATE KEY UPDATE `view_count` = `view_count` + 1,`type` = 'offer'");
		
		}
		global $smarty;
		
		$smarty->assign ( '_where', $where );
		$limit = 7;
		$pageIndex = end($this->path_params);
		$page = isset($this->pages[$pageIndex]) ? $this->pages[$pageIndex]:1;
		$page = intval($page)  < 1 ? 1:intval($page) ;
		$order = null;
		if(isset($this->query['order_by']))
		{
			$order =  $this->query['order_by']." ".strtoupper($this->query['direction']);
			
		}
		$this->_offers = $this->getOffers ( $where,$order,$limit,$page );
        $this->statesList = $db->getArray("states","*","`active`='1' AND `lng_id` = '{$this->defLng['id']}'","","","","id");
        
		$this->currentPage ['title'] = $this->dictonary ['brandmodel'] [$this->_offers ['found'] [0] ['filed_car_brand']] . " " . $this->dictonary ['brandmodel'] [$this->_offers ['found'] [0] ['filed_car_brand_model']] . " " . $this->_offers ['found'] [0] ['filed_release_date_year'] . " " . $this->config ['defaultTitle'];
        
        if(Request::$xRequestedWith)
        {
            $this->displayTpl = 	$this->contentTpl;
        }
		
    }
	public function getCurentBrand($brand, $more = 0, $mode_models = 0) {
		$db = db::getInstance ();
		$this->buildAdSearchWhere ();
		$CurentBrand = $db->getRow ( 'brandmodel', '*', 'lng_id=' . $this->defLng ['id'] . " AND `active`  AND alias='{$brand}'", '', ' position ' );
		
		if (empty ( $CurentBrand )) {
			return $this->errorPage ();
		
		}
		$this->CurentBrand = $CurentBrand;
		
		if ($mode_models) {
			$this->viewAllModels = 1;
			$mode_models_cond = " ";
		} else {
			$this->viewAllModels = 0;
			$mode_models_cond = " AND home ";
			
			$qty = $db->getRow ( 'brandmodel', 'count(*) as qty', 'pid=' . $this->CurentBrand ['id'] . " AND ! home" );
			
			$this->moreViewQty = isset ( $qty ['qty'] ) ? $qty ['qty'] : 0;
		
		}
		
		$query = " SELECT    brandmodel.* ,brandmodel_ml.`short` ,brandmodel_ml.`full`,COUNT(offers.id) as offerscount
		FROM brandmodel LEFT JOIN brandmodel_ml ON(brandmodel_ml.id=brandmodel.id)
		LEFT JOIN offers ON ( brandmodel.id=filed_car_brand_model )
		WHERE  brandmodel.active
		AND
		brandmodel_ml.lng_id = {$this->defLng['id']} AND pid={$this->CurentBrand['id']}
	
		$mode_models_cond
	
		GROUP BY brandmodel.id
		ORDER BY `position`  ";
		
		$this->brandModels = $db->queryFetch ( $query );
		
		if ($more)
			$this->contentTpl = 'brand/curentbrand-more.tpl.html';
		else
			$this->contentTpl = 'brand/curentbrand.tpl.html';
		
		foreach ( $this->brandModels as $i => $model ) {
			$query = "  SELECT brandmodel.* ,brandmodel_ml.`short` ,brandmodel_ml.`full`,COUNT(offers.id) as offerscount
			FROM brandmodel LEFT JOIN brandmodel_ml ON(brandmodel_ml.id=brandmodel.id)
			LEFT JOIN offers ON (brandmodel .id=filed_car_brand_model)
			WHERE  brandmodel.active
			AND
			brandmodel_ml.lng_id = {$this->defLng['id']} AND pid={$model['id']}
	
	
	
			GROUP BY brandmodel.id
			ORDER BY `position`
			";
			
			$subs = $db->queryFetch ( $query );
			if (! empty ( $subs )) {
				$this->brandModels [$i] ['sub'] = $subs;
			}
		
		}
		
		$query = " SELECT    brandmodel.* ,brandmodel_ml.`short` ,brandmodel_ml.`full`,COUNT(offers.id) as offerscount
		FROM brandmodel LEFT JOIN brandmodel_ml ON(brandmodel_ml.id=brandmodel.id)
			LEFT JOIN offers ON ( brandmodel.id=filed_car_brand_model )
					WHERE  brandmodel.active
					AND
					brandmodel_ml.lng_id = {$this->defLng['id']} AND pid={$this->CurentBrand['id']}
	
					AND   home = 0
	
					GROUP BY brandmodel.id
					ORDER BY label = 'Other', `brandmodel`.`label`  ";
		
		$this->brandOldModels = $db->queryFetch ( $query );
		
		foreach ( $this->brandOldModels as $i => $model ) {
			$query = "  SELECT brandmodel.* ,brandmodel_ml.`short` ,brandmodel_ml.`full`,COUNT(offers.id) as offerscount
					FROM brandmodel LEFT JOIN brandmodel_ml ON(brandmodel_ml.id=brandmodel.id)
					LEFT JOIN offers ON (brandmodel .id=filed_car_brand_model)
					WHERE  brandmodel.active
					AND
					brandmodel_ml.lng_id = {$this->defLng['id']} AND pid={$model['id']}
	
	
	
					GROUP BY brandmodel.id   ";
			
			if ($model ['label'] == 'Other') {
				
				$trans = array ('term' => 'other_model' );
				$this->brandOldModels [$i] ['label'] = HelperFunction::trans ( $trans );
			
			}
			
			$subs = $db->queryFetch ( $query );
			if (! empty ( $subs )) {
				$this->brandOldModels [$i] ['sub'] = $subs;
			}
		
		}
		
		$this->currentPage ['title'] = $this->CurentBrand ['label'] . "  " . $this->config ['defaultTitle'];
	
	}
	public function viewOffersByBrand() {
		$db = db::getInstance ();
		
		if (isset ( $this->path_params [2] )) {
			$this->offerBrand = $this->path_params [2];
			$this->offerBrand = $db->escape ( $this->offerBrand );
			
			$where [] = " `brand`.`alias` = '{$this->offerBrand}'";
		}
		
		if (isset ( $this->path_params [3] )) {
			$this->offerModel = $this->path_params [3];
			$where [] = " `model`.`alias` = '{$this->offerModel}'";
		}
		
		$this->getCurentBrand ( $this->offerBrand );
		
		$this->contentTpl = "cars/thisbarndmodels.tpl.html";
		global $smarty;
		
		$limit = 10;
		$pageIndex = end($this->path_params);
		$page = isset($this->pages[$pageIndex]) ? $this->pages[$pageIndex]:1;
		$page = intval($page)  < 1 ? 1:intval($page) ;
		$order = null;
		if(isset($this->query['order_by']))
		{
			$order =  $this->query['order_by']." ".strtoupper($this->query['direction']);
			
		}
		
		
		$this->_offers = $this->getOffers ( $where,$order,$limit,$page );
		$smarty->assign ( '_where', $where );
	}
	public function viewAllOffers() {
		global $smarty;
		$this->buildAdSearchWhere ();
		$_where = $smarty->get_template_vars ( '_where' );
        
       

        
		if($smarty->get_template_vars ( '_order' ))
        {
            $_order = $smarty->get_template_vars ( '_order' );    
        }
        else
        {
            $_order = 'position ASC';
        }
		
		
		$_limit = 20;
		$end = end ( $this->path_params );
		$page = isset ( $this->pages [$end] ) ? intval ( $this->pages [$end] ) : 1;
		$page = $page < 1 ? 1 : $page;
		
        
       
	
    	$this->_offers = $this->getOffers ( $_where, $_order, $_limit, $page );
		
        
		$this->getAllBrands ( true );
        
        
		if (isset ( $this->query ['search'] )) {
			$this->mainTpl = 'cars/body-left.tpl.html';
			$this->contentTpl = "cars/offerList.tpl.html";
		} else {
			$this->contentTpl = "cars/allbrands.tpl.html";
		}
	}

}
?>