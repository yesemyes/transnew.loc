<?
class feHome extends front {
public $NewsCategorys;	
	function __construct($init) {
		
		/*
		 * ************************** ************************** Path Params
		 * Varibles [0] lng [1] home [2] [home sub] **************************
		 * **************************
		 */
		
		$vars = get_object_vars ( $init );
		foreach ( $vars as $key => $value ) {
			$this->{$key} = $value;
		}
		// $this->headStyleSheets [] = "/css/carousel.css";
		$this->headScripts [] = "/scripts/jcarousellite_1.0.1c4.js";
		$path_params = $this->path_params;
		$this->topOffers = $this->getRigthOffers ();
		
		if (count ( $path_params ) > 3) {
			return $this->errorPage ();
		}
		$this->mainTpl = 'home/body.tpl.html';
		if (isset ( $path_params [2] )) {
			$action = base::toMethodName ( $path_params [2], 'action' );
			if (method_exists ( $this, $action )) {
				$this->$action ();
			} else {
				echo $action;
			}
		}
		
		if ($this->method == 'POST' && isset ( $this->query ['action'] )) {
			$action = $this->query ['action'];
			$action = strtolower ( $action );
			$action = ucfirst ( $action );
			$function = "get$action";
			
			if (method_exists ( $this, $function )) {
				
				$this->$function ();
			
			}
		}
		
		if (isset ( $this->get ['method'] )) {
			$_method = $this->get ['method'];
			$_method = ucfirst ( $_method );
			$_method = "validate{$_method}";
			
			if (method_exists ( $this, $_method )) {
				
				$this->$_method ();
			} else {
				die ( $_method );
			}
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
	
	
	public function actionPoolVoting() {
		
		$pool_question = $this->post ['pool_question'];
		
		$hash = $_SERVER ['REMOTE_ADDR'] . $_SERVER ['HTTP_USER_AGENT'] . date ( 'Y' );
		$hash = md5 ( $hash );
		$now = date ( 'Y-m-d H:i:s' );
		$db = db::getInstance ();
		$query = "INSERT IGNORE INTO `pool_voting`(`pool_id`, `question_id`, `date`, `hash`) VALUES (?,?,?,?)";
		$affected_rows = 0;
		if (($stmt = $db->prepare ( $query )) != false) {
			foreach ( $pool_question as $poolId => $question ) {
				$stmt->bind_param ( 'iiss', $poolId, $question, $now, $hash );
				$exec = $stmt->execute ();
				$affected_rows += $stmt->affected_rows;
				setcookie ( "pool_{$poolId}", $hash, time () + 24 * 365 * 60 * 60, '/' );
			}
			$stmt->close ();
		}
		
		
		$query = "UPDATE `pool_questions_rel`,
		(SELECT  `pool_id` ,  `question_id` , COUNT(  `pool_id` ) as `votes` 
		FROM  `pool_voting` 
		GROUP BY  `pool_id` ,  `question_id` ) as `results` 

		SET `pool_questions_rel`.`votes` = `results`.`votes`
		WHERE `pool_questions_rel`.`id`= ? AND `questions`=`results`. `question_id`";
				
		
		if (($stmt = $db->prepare ( $query )) != false) 
		{
			$stmt->bind_param ( 'i', $poolId);
			$exec = $stmt->execute ();
			$stmt->close ();
		}	
		
		
		$this->displayTpl = "default/pool-reults.tpl.html";
	
	}
	public function actionAdvSearch() {
		$this->displayTpl = 'default/adv-search-popup.tpl.html';
	}
	public function getLastNews() {
		$db = db::getInstance ();
		$query = " SELECT     `news`.* ,
		                      `menu`.`alias` as `catalias`,
		                       `news_ml`.`title`,
		                       `news`.`image`
		           FROM `news` 
		           LEFT JOIN news_ml USING (id)
		           LEFT JOIN menu ON (news.newscategory = menu.id)
		           WHERE lng_id=" . $this->defLng ['id'] . " AND `news`.last AND `news`.`active` = '1'  AND `news`.`image` 
		           ORDER BY `news`.`date` DESC , `news`.id DESC LIMIT 0," . $this->config ['lastNewsQty'];
		
		$lastNews = $db->queryFetch ( $query );
		$return = array ();
		
		foreach ( $lastNews as &$last ) {
			
			$location = "img/news/last/{$last['image_last']}";
			
			if (file_exists ( $location )) {
			 
				$last ['image_last'] = $location;
				$return [] = $last;
			}
		}
		return $return;
	
	}
	
	public function getNewsCategorys() {
		$db = db::getInstance ();
		$newsPage = $db->getRow ( 'menu', "*", "`alias` LIKE 'news'" );
		$this->newsPagePid = $newsPage ['id'];
		$this->NewsCategorys = $db->getArray ( 'menu', '*', "`lng_id`='{$this->defLng ['id']}'  AND `active`  AND `pid`=$this->newsPagePid", '', ' position ' );
        
	
	}
    
    public function getAllnews() {
        $db = db::getInstance ();
        $query = " SELECT        `news`.alias ,
		 						 `news`.date ,
                                 `menu`.`alias` as `catalias`,
		                         `news_ml`.`title`,
		                         `news_ml`.`subtitle`,
		                         `news`.`image_last`,
		                         `news`.`image`,
		                         `news_ml`.`small`
		           FROM `news` 
		           LEFT JOIN news_ml USING (id)
                    LEFT JOIN menu ON (news.newscategory = menu.id)
		           WHERE lng_id=" . $this->defLng ['id'] . " AND `news`.`active` = '1' AND `title` != ''
		           ORDER BY `news`.`date` DESC , `news`.position ASC 
		          ";
                  
                  
                  $Allnews ['noEffect'] = $db->queryFetch ( $query . "LIMIT 0,8" );
		          $this->Allnews = $Allnews;
                 
                  global $smarty;
            		$smarty->assign_by_ref ( 'this', $this );
            		$smarty->display ( 'home/TabsContent.tpl', md5 ( $_SERVER ['REQUEST_URI'] ) );
            		die ();
        
    }
	
	public function getCatnews() {
		
        
            $db = db::getInstance ();
            $this->CurrentCategory = $db->getRow ( 'newscategory', '*', 'lng_id=' . $this->defLng ['id'] . ' AND `active` AND id=' . $this->query ['catId'], '' );
          
		$query = " SELECT        `news`.alias ,
		 						 `news`.date ,
		                         `menu`.`alias` as `catalias`,
		                         `news_ml`.`title`,
		                         `news_ml`.`subtitle`,
		                         `news`.`image_last`,
		                         `news`.`image`,
		                         `news_ml`.`small`
		           FROM `news` 
		           LEFT JOIN news_ml USING (id)
		           LEFT JOIN menu ON (news.newscategory = menu.id)
		           WHERE lng_id=" . $this->defLng ['id'] . " AND `news`.`active` AND newscategory='{$this->query['catId']}' AND `title` != ''
		           ORDER BY `news`.`date` DESC , `news`.position ASC 
		          ";
		
		$catNews ['noEffect'] = $db->queryFetch ( $query . "LIMIT 0,8" );
		$this->catNews = $catNews;
             
		global $smarty;
		$smarty->assign_by_ref ( 'this', $this );
		$smarty->display ( 'home/TabsContent.tpl', md5 ( $_SERVER ['REQUEST_URI'] ) );
		die ();
        
	
	}

}
