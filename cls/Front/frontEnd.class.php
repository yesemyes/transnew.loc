<?
class frontEnd {
	public $mainTpl;
	public $smarty;
	public $config;
	public $header;
	public $top;
	public $body;
	public $footer;
	public $menu;
	public $db;
	public $currentPage;
	public $defLng;
	public $displayTpl;
	public $_Headers;
	function __construct() {
		
		$this->_Headers = array ();
		$t1 = microtime ( 1 );
		$this->readConfig ();
		$request = new Request ();
		
		foreach ( $request->request as $key => $val ) {
			$this->$key = $val;
		}
		$x = get_object_vars ( $this );
		if (! $this->module)
			$this->module = "home";
		
		$db = db::getInstance ();
		
		$this->config = $db->getOptions ( 'config', 'name', 'value' );
		$this->languages = $db->getArray ( 'languages', '*', 'active', '', 'position', '', 'code' );
		
		$this->defLng = $this->languages [$this->lng];
		
		$path_params = $this->path_params;
		$path_params = array_reverse ( $path_params );
		
        
                        
        $cuurAlias = $db->escape(end($this->path_params));
        
        
        
        if($this->path_params[1] === 'cars')
        {
            $this->current = $db->getRow("offers","*","`active` = 1 AND `name` = '$cuurAlias'");
            $carBrand = $this->current['filed_car_brand'];
            $carModel = $this->current['filed_car_brand_model'];
            
            $model = $db->getRow("brandmodel","label","`active` AND `id` = '{$carModel}'");
            $brand = $db->getRow("brandmodel","label","`active` AND `id` = '{$carBrand}'");
            
            
            $this->current['filed_car_brand'] = $brand['label'];
            $this->current['filed_car_brand_model'] = $model['label'];
            $this->current['title'] = ("{$this->current['filed_car_brand']}" . ' ' . "{$this->current['filed_car_brand_model']}" );
            
            
        } 
        else
        {
            $this->current = $db->getRow("news","*","`active` = 1 AND `alias` = '$cuurAlias' AND `lng_id` = '{$this->defLng['id']}'");
        }  
        
                    
                        
		$this->mainTpl = "default/body.tpl.html";
		$this->displayTpl = "index.tpl.html";
		
		
		foreach ( $path_params as $path ) {
			
			
			$path = $db->escape($path);
			$this->currentPage = $db->getRow ( 'menu', '*', " `lng_id` = '{$this->defLng ['id']}'  AND alias='{$path}'" );
           
            

			if (! empty ( $this->currentPage )) {
				if ($this->currentPage ['active'])
					
					break;
				else {
					
					return $this->errorPage();
				}
			}
		}
		
		if (empty ( $this->currentPage )) {
			
			return $this->errorPage();
		
		}
		
		$this->__checkLogin ();
		
		if (isset ( $this->get ['external'] ) && $this->get ['external']) {
			$this->displayTpl = $this->get ['itpl'];
		}
		$t2 = microtime ( 1 );
	
	}
	
	private function readConfig() {
		$this->config = parse_ini_file ( ROOT_DIR . '/config/config.ini', true );
	}
	
	public function mklink() {
		foreach ( $this->menu as $type => $menus ) {
			foreach ( $menus as $pid => $elems ) {
				foreach ( $elems as $key => $elem ) {
					if ($this->defLng ['default']) {
						$elem ['url'] = "/" . $elem ['alias'];
					} else {
						$elem ['url'] = "/" . $this->defLng ['code'] . "/" . $elem ['alias'];
					}
					$this->menu [$type] [$pid] [$key] = $elem;
				}
			}
		}
	}
	public function display() {
		$this->display ( $this->mainTpl );
	}
	
	public function errorPage()
	{
		$db = db::getInstance ();
		header("Status: 404 Not Found");
		$this->currentPage = $db->getRow ( 'menu', '*', 'lng_id = ' . $this->defLng ['id'] . " AND `alias`='404'" );
		
		$pa = debug_backtrace(0);
		file_put_contents(ROOT_DIR.'/error_log/last-404.log',print_r($pa,1));
		
		if(Request::$xRequestedWith)
		{
			exit(1);
		}
				
	}
	public function newsAddCategorys() {
		$db = db::getInstance ();
		$NewsCategorys = $db->getArray ( 'newscategory', '*', 'lng_id=' . $this->defLng ['id'] . ' AND `active` ', '', ' position ' );
		foreach ( $this->menu ['top'] as $pl => $place ) {
			foreach ( $place [0] as $id => $item ) {
				
				if ($item ['alias'] == 'news') {
					
					$this->menu ['top'] [$pl] [$item ['id']] = $NewsCategorys;
				
				}
			}
		}
	}
	public function LoadText($alias, $all = 0) 
	{
		$db = db::getInstance ();
		if ($all) 
		{
			$return=$db->getArray ( 'text', '*', "alias='$alias'", '', '', '', 'lng_id' );
			
			$lnags = $db->getOptions('languages','id','id',0,"`active`='1' ",'',"`position` ASC");
			
			foreach($lnags as $lngId=>&$data)
			{
				$data =$return[$lngId] ;
			}
			
			return $lnags;
			
		} 
		else 
		{
			
			return $db->getRow ( 'text', '*', "alias='$alias' AND lng_id={$this->defLng['id']}", '', '`lng_id`', '', 'lng_id' );
		}
	
	}
	
	function __checkLogin() {
		$db = db::getInstance ();
		if (isset ( $_SESSION ['siteusers'] )) {
			$db->query ( "UPDATE siteusers SET lastactivity =NOW() WHERE id={$_SESSION['siteusers']['id']} " );
		
		}
		if ($this->currentPage ['private'] && ! $_SESSION ['siteusers']) 
		{
		  
			base::redirect ( HelperFunction::link ( array ('users', 'login' ) ) );
			
		
		}
	}
	function viewHeaders() {
		foreach ( $this->_Headers as $header ) {
			
			header ( $header );
		}
	}
	
	function getPageAds() {
		
		
		if(! isset($this->currentPage['id']))
		{
			return false;
		}
		$db = db::getInstance ();
		$query = " SELECT `adsgroup`.* 
		           FROM adsgroup 
		           WHERE `adsgroup`.active = 1
		         ";
		
		$adsgroups = $db->queryFetch ( $query );
		
		$return = array ();
		foreach ( $adsgroups as $group ) 
		{
			$query = " SELECT ads.*,ads_ml.title ,ads_ml.description 
			           FROM ads 
			           INNER JOIN ads_ml ON (ads.id =ads_ml.id )
			           WHERE 
			           `ads`.`group`={$group['id']}
                       AND `ads`.`active`
			           AND (max_view_qty=0 OR max_view_qty > views_qty )
			           AND ( NOW() BETWEEN srtat_date  AND   	end_date)
			           AND ads_ml.lng_id = '{$this->defLng['id']}'";
			
			
			
			$ads = $db->queryFetch ( $query );
			
			
			if ($group ['count_ads_in_group'] > 1 && count($ads) > $group ['count_ads_in_group']) 
			{
				$ads = array_slice($ads,0,$group ['count_ads_in_group']);
			}
			elseif($group ['count_ads_in_group']  ==  1 && count($ads) > $group ['count_ads_in_group'])
			{
				shuffle($ads);
				$ads = array_slice($ads,0,$group ['count_ads_in_group']);
			}
			
			foreach ( $ads as $ad ) 
			{
				$adImage = strlen ( $ad ['image'] ) ? "img/ads/thumb/{$ad['image']}" : null;
				$adImage = $adImage && file_exists ( $adImage ) ? $adImage : false;
				if ($adImage)
					$return [$group ['alias']] [] = array ("type" => 'img', 'title' => $ad ['title'], 'file' => "/" . $adImage, 'href' => $ad ['href'], 'id' => $ad ['id'] );
				else
					$return [$group ['alias']] [] = array ("type" => 'html', 'title' => $ad ['title'], 'description' => $ad ['description'], 'href' => $ad ['href'], 'id' => $ad ['id'] );
			
			}
		}
		 
		return $return;
	
	}
	
	function updateAdsViews($adsID) {
		$db = db::getInstance ();
		//$query = " UPDATE ads SET  `views_qty`=`views_qty`+1 WHERE id='$adsID'";
       $query = "INSERT INTO `view_count` SET `id` = $adsID,`view_count` = 1 ON DUPLICATE KEY UPDATE `view_count` = `view_count` + 1,`type`='ads'";
		$db->query ( $query );
	}
}
?>