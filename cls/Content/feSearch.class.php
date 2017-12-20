<?
class feSearch extends front {
	function __construct($init) {
		/*
		***************************
		***************************
		*Path Params  Varibles
		* [0] lng
		* [1] home
		* [2] [message]
		***************************
		***************************
		*/
		$vars = get_object_vars ( $init );
		foreach ( $vars as $key => $value ) {
			$this->{$key} = $value;
		}
		if (isset ( $this->get ['method'] )) {
			$_method = $this->get ['method'];
			$_method = ucfirst ( $_method );
			$_method = "validate{$_method}";
			
			if (method_exists ( $this, $_method )) {
				
				$this->$_method ();
			}
		}
	
	}
	
	public function validateViewresult() {
		$this->mainTpl = 'search/body.tpl.html';
		$f = $this->get ['search'];
		$this->currentPage ['title'] = $f . "  " . $this->currentPage ['title'];
	}
	
	public function validateGetBrandname() {
		
		$f = $this->get ['term'];
		
		$f = mb_strtolower ( $f );
		
		$f = explode ( " ", $f );
		$s = implode ( "%", $f );
		$s = "'%$s%'";
		
		$query = "SELECT
							model.id as id,  
							CONCAT(brand.label,' ',model.label) as label,
							CONCAT(brand.label,' ',model.label) as value
							
							
							
							
		          FROM   
		          `brandmodel` as `model` 
		          LEFT JOIN `brandmodel` as `brand` ON (`model`.pid= `brand`.id )
		          
		          LEFT  JOIN brandmodel_ml ON (model.`id`=brandmodel_ml.id) 
		          LEFT  JOIN brandmodel_ml as  brand_ml ON (brand.`id`=brand_ml.id) 
		          WHERE 
		          	brand_ml.lng_id={$this->defLng['id']}
		          AND brandmodel_ml.lng_id={$this->defLng['id']} 
		          AND (CONCAT(`brand`.`label`,' ',model.label) LIKE $s) OR (CONCAT(`brand`.`label`,' ',model.label) LIKE $s)
		          GROUP BY model.id  
		          ";
		$result = $this->db->queryFetch ( $query );
		
		die ( json_encode ( $result ) );
	}
	
	public function searchInNews() {
		
		$f = $this->get ['search'];
		
		$query = "SELECT `news`.`id`,
						  `news_ml`.small as short,
		                 `news`.`active`,
		                 `news`.`image` as image,
		                 `news`.`last`,`news`.`alias`,`news`.`position`,`news`.`date`,`news`.`newscategory`,
		                 `news`.`image_last`,`news_ml`.`lng_id`,`news_ml`.`content`,`news_ml`.`title`,`news_ml`.`subtitle`,`newscategory`.`alias` as nc 
		          FROM `news` 
		          LEFT JOIN news_ml USING (`id`) 
		          LEFT JOIN newscategory ON (`newscategory`=`newscategory`.`id`) 
		          WHERE lng_id={$this->defLng['id']} AND ( `content` LIKE '%$f%' OR `title` LIKE '%$f%' OR `subtitle` LIKE '%$f%' OR `small` LIKE '%$f%') 
				  ORDER BY `date` DESC
				  ";
		
		$result = $this->db->queryFetch ( $query );
		
		foreach ( $result as $k => $row ) {
			$result [$k] ['_link'] = $this->_mklink ( 'news', $row ['nc'], $row ['alias'] );
			$result [$k] ['image'] = "/img/news/image/{$row['image']}";
		}
		
		return $result;
	}
	public function searchInOffers() {
		
		
		$f = $this->get ['search'];
		
		$f = mb_strtolower ( $f );
		
		$f = explode ( " ", $f );
		$s = implode ( "%", $f );
		$s = "'%$s%'";
		
		
		$bm =$this->searchInBarndsAndModel();
		$ids[] = -1;
		$models[]=-1;
		foreach($bm as $item)
		{
			$ids[] = $item['id'];
			$models[$item['id']] = $item['id'];
		}
	
		$inwhere = implode(",",$ids);
		
		$query = "SELECT offers.* ,siteusers.login as `login`,
					brand.alias as brandalias,model.alias as modelalias,
					brand.label as lbrand,model.label as model
					FROM offers
		          LEFT JOIN `siteusers`  ON (`offers`.siteuser =siteusers.id )
		          LEFT JOIN `brandmodel` as brand  ON (`offers`.`filed_car_brand` = `brand`.id )
		          LEFT JOIN `brandmodel` as model  ON (`offers`.`filed_car_brand_model` = `model`.id )
		          WHERE (filed_car_brand IN ($inwhere) OR filed_car_brand_model IN ($inwhere)) OR (`description` LIKE  $s )
				  ORDER BY `filed_srtat_date` DESC
				  ";
		
		$result = $this->db->queryFetch ( $query );
		
		//print_r($result);
		foreach ( $result as $k => $row )
		{
			$result [$k] ['_link'] = $this->_mklink('cars','user',$row['autor'],$row['bbrand'],$row['bmodel'],IdMaker($row['id']));
			$result [$k] ['title'] = $row['lbrand']." ". $row['lmodel']." ";
			if ($row ['filed_main_image']) {
				
				$path = "img/brandmodel/image/{$row['filed_main_image']}";
				
				if (file_exists ( $path )) {
					$result [$k] ['image'] = "/$path";
				
				} else {
					$result [$k] ['image'] = null;
				}
			}
		}
		return $result;
	}
	public function searchInBarndsAndModel() {
		
		$f = $this->get ['search'];
		
		$f = mb_strtolower ( $f );
		
		$f = explode ( " ", $f );
		$s = implode ( "%", $f );
		$s = "'%$s%'";
		
		$query = "SELECT
							`model`.`id`,  
							`model`.`image` as image,
							`brand`.`image` as pimage,
							`model`.`alias` as alias,
							CONCAT(`brand`.`label`,' ',`model`.`label`) as title,
							`brand`.`label` as `brand`,
							`model`.`pid` as `pid`,
						   `brand`.alias as palias,
						   `brandmodel_ml`.`short` as `short`,
						   `brand_ml`.`short` as  `brand_short`,
						   `brandmodel_ml`.`short` as `full`,
						   `brand_ml`.`full` as  `brand_full`
							
		          FROM   
		          `brandmodel` as `model` 
		          LEFT JOIN `brandmodel` as `brand` ON (`model`.pid= `brand`.id )
		          
		          LEFT  JOIN brandmodel_ml ON (model.`id`=brandmodel_ml.id) 
		          LEFT  JOIN brandmodel_ml as  brand_ml ON (brand.`id`=brand_ml.id) 
		          WHERE 
		          brand_ml.lng_id={$this->defLng['id']} 
		          AND brandmodel_ml.lng_id={$this->defLng['id']}
		          AND (CONCAT(`brand`.`label`,' ',model.label) LIKE $s 
		              OR CONCAT(`brand`.`label`,' ',model.label) LIKE $s
		              OR `brand`.`label` LIKE $s
		              )
		              
		              
		          GROUP BY model.id, brand.id 
		          ORDER BY model.id, model.pid
		          ";
		$result = $this->db->queryFetch ( $query );
		
		foreach ( $result as $k => $row ) {
			if ($row ['pid'])
				$result [$k] ['_link'] = $this->_mklink ( 'brand', $row ['palias'], $row ['alias'] );
			else
				$result [$k] ['_link'] = $this->_mklink ( 'brand', $row ['alias'] );
			
			if ($row ['image']) {
				
				$path = "img/brandmodel/image/{$row['image']}";
				
				if (file_exists ( $path )) {
					$result [$k] ['image'] = "/$path";
				
				} else {
					$result [$k] ['image'] = null;
				}
			}
			
			if (! $row ['image'] && $row ['pimage']) {
				$path = "img/brandmodel/image/{$row['pimage']}";
				if (file_exists ( $path )) {
					$result [$k] ['image'] = "/$path";
				
				} else {
					$result [$k] ['image'] = null;
				}
			}
		
		}
		
		return $result;
	}

}
?>