<?
class feNews extends front {
	public $allNews;
	public $feed;
	public $CurrentNews;
	public $CurrnetCategoryNews;
	public $CurrnetCategory;
	public $LastNews;
	public $newsCategoryAlias;
	public $newsAlias;
	public $NewsCategorys;
	public $page;
	function __construct($init) {
		/*
		 * ************************** ************************** Path Params
		 * Varibles [0] lng [1] news [2] [newsCategory] [3] [alias]
		 * ************************** **************************
		 */
		
		$vars = get_object_vars ( $init );
		foreach ( $vars as $key => $value ) {
			$this->{$key} = $value;
		}
		$db = db::getInstance();
		$this->currentPage = $db->getRow ( 'menu', '*', " `lng_id` = '{$this->defLng ['id']}'  AND `alias`='news'" );
		$path_params = $this->path_params;
		$db = db::getInstance();
		$this->newsCategoryAlias = null;
		$this->newsAlias = null;
		
		$newsPage =$db->getRow('menu',"*","`alias` LIKE 'news'");
		$this->newsPagePid = $newsPage['id'];
		$this->headStyleSheets [] = "/css/news.css";
		
		$pagingIndex = $path_params [count ( $path_params ) - 1];
		
		$page = isset ( $this->pages [$pagingIndex] ) ? $this->pages [$pagingIndex] : 1;
		$limit = 20;
		$this->page = $page;
		$this->limit = $limit;
		$this->limit_str = ($this->page - 1) * $this->limit . ", " . $this->limit;
		
		if (count ( $path_params ) >= 3) {
			$this->newsCategoryAlias = $path_params [2];
            
		}
		
		if (count ( $path_params ) == 4) 
		{
			$this->newsAlias = $db->escape($path_params [3]);
		
		}
		
		if (count ( $path_params ) > 4)
			return $this->errorPage();
		
		if ($this->newsCategoryAlias)
			$this->getCurrnetCategory ();
		
		if ($this->newsCategoryAlias)
			$this->getCurrnetCategoryNews ();
		else
			$this->getLastNews ();
		
		if ($this->newsAlias)
			$this->getCurrnetNews ();
		
		$this->getNewsCategorys ();
		$this->mainTpl = 'news/body.tpl.html';
	}
	
	public function getCurrnetNews() 
	{
		
		$db = db::getInstance();
		
        
        $this->CurrnetNews = $db->getRow ( 'news', '*', "lng_id='{$this->defLng['id']}' AND  `active` AND  `alias`='{$this->newsAlias}'", '');
		
		$this->contentTpl = "news/CurrnetNews.tpl.html";
        	if($this->CurrnetNews['date'])
        {
            $date = $db->escape($this->CurrnetNews['date']);
            
            $time = date('Hi',strtotime($date));
            $dated = date('d.m.Y',strtotime($date));
            
            if($time === '0000')
            {
               $this->CurrnetNews['date'] =  $dated;
            }
            else
            {
                $this->CurrnetNews['date'] =  date('d.m.Y H:i',strtotime($date));;
            }
        
          
        }
        
        $currId = $this->CurrnetNews['id'];
       
            $this->CurrnetNews['images'] = $db->getArray("news_images_rel","images","`id` = '{$currId}'");
        
        
        
        
        
        if(!$this->CurrnetNews['content'] && !$this->CurrnetNews['youtube'])
        {
            base::redirect ( HelperFunction::link ( array ('news') ) );
        }
		$this->currentPage = $db->getRow ( 'menu', '*', " `lng_id` = '{$this->defLng ['id']}'  AND id='{$this->CurrnetNews['newscategory']}'" );
		if (empty ( $this->CurrnetNews ))
		{
			return $this->errorPage();
		}
		$this->currentPage ['title'] = $this->CurrnetNews ['title'] . " - " . $this->currentPage ['title'];
        $this->newsID=$this->CurrnetNews['id'];
        
        $view_counts = $db->query("INSERT INTO `view_count` SET `id` = '{$this->newsID}',`view_count` = 1 ON DUPLICATE KEY UPDATE `view_count` = `view_count` + 1,`type` = 'news'");  
	}
	public function getCurrnetCategoryNews() {
		$db = db::getInstance();
		$this->CurrnetCategoryNews = $db->getArray ( 'news', '*', "lng_id='{$this->defLng['id']}' AND  `active` AND `title` != ''
   	                                                         AND  `newscategory`  ='{$this->CurrnetCategory['id']}'", '', '`date` DESC, `id` DESC ', $this->limit_str );
		$this->news_found_rows = db::$_found_rows;
		
		$this->contentTpl = "news/NewsFeed.tpl.html";
		$this->feed = $this->CurrnetCategoryNews;
		$this->currentPage ['title'] = $this->CurrnetCategory ['name'] . '  ' . $this->currentPage ['title'];
	}
	public function getLastNews() {
		$db = db::getInstance();
		$this->contentTpl = "news/NewsFeed.tpl.html";
		
		$pagingIndex = $this->path_params [count ( 'path_params' ) - 1];
		$this->limit_str;
		$this->LastNews = $db->getArray ( 'news', '*', "lng_id='{$this->defLng['id']}' AND `title` != ''  AND  `active` ", '', 'date desc , id DESC', $this->limit_str );
        foreach ($this->LastNews as $k => &$v)
        {
            
            $date = $db->escape($v['date']);
            
            $time = date('Hi',strtotime($date));
            $dated = date('d.m.Y',strtotime($date));
            
            if($time === '0000')
            {
               $v['date'] =  $dated;
            }
            else
            {
                $v['date'] =  date('d.m.Y H:i',strtotime($date));;
            }
        }
        unset($v);
		$this->feed = $this->LastNews;
		
		$this->news_found_rows = db::$_found_rows;
		// print_r($this->found_rows);
	}
	public function getCurrnetCategory() 
	{
		$db = db::getInstance ();
		$this->CurrnetCategory = $db->getRow ( 'menu', '*', "lng_id='{$this->defLng['id']}' AND `active` AND `alias`='{$this->newsCategoryAlias}' AND `pid`='{$this->newsPagePid}'", '' );
		if (empty ( $this->CurrnetCategory ))
			return $this->errorPage();
	
	}
	public function getNewsCategorys() 
	{
		$db = db::getInstance ();
		$this->NewsCategorys = $db->getArray ( 'menu', '*', 'lng_id=' . $this->defLng ['id'] . ' AND `active` AND '."`pid`='{$this->newsPagePid}'" , '', ' position ', '', 'id' );
		
	
		 
	}
}
?>