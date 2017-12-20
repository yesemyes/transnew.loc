<?
class feInformation extends front 
{
	
	function __construct($init)
	{
		/**
		***************************
		***************************
		** Path Params  Varibles
		** [0] lng
		** [1] brand
		** [2] [all,:barnd alias]
		** [3] [:model alias]
		***************************
		***************************
		**/
		
        
        
		$db = db::getInstance();
        
        
        
		$vars = get_object_vars($init);
		foreach ($vars as $key=>$value)
		{
			$this->{$key} = $value;
		}
		$path_params = $this->path_params;
        $this->mainTpl = 'technical/body.tpl.html';
        $this->contentTpl = 'technical/main.tpl.html';
        $this->headStyleSheets []['custom'] = "";
        $this->headStyleSheets []['combo'] = "";
        //unset($this->headStyleSheets['combo']);
		$this->headScripts [] = "https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false";
		$this->headStyleSheets [] = "/css/jquery.fancybox-1.3.4.css";
		$this->headScripts [] = "/scripts/jquery.fancybox-1.3.4.js";
           $this->headStyleSheets [] = "/css/gallery.css";
			$this->headScripts [] = "/scripts/gallery.js";
            
		//$this->headScripts [] = "/scripts/cameras.js";
        
        $this->headScripts [] = "/scripts/technical.js";
		
        
        //$this->technical =$db->getArray('technicalinspection', '*', "`lng_id` = '{$defLng['id']}' AND `active` ");
        if(isset($this->path_params[3]))
        {
            $action= "get".$this->path_params[3];
                       
        }
        else if(isset($this->path_params[2]) && !isset($this->path_params[3]))
        {
            
            
            $action= "getIndex";
                       
        }
        else if(isset($this->path_params[1]) && !isset($this->path_params[2]))
        {
            
            $action = "getInform";
            
                       
        }

        
       if(method_exists($this,$action)){
            $this->$action();
            
       }
       else{
            $this->errorPage();
       }
        
       
	
	}
    
 public function getInform()
{
    $this->mainTpl = 'default/body.tpl.html';
}   

public function getIndex()
{
        $db = db::getInstance();
       $this->citys = $db->getArray('regions','*','lng_id = ' . $this->defLng ['id'] . " AND `active` AND `pid` = 0 ",'','');
           
            foreach($this->citys as &$r)
            {
                
                $r['sub_region'] = $db->getArray('regions','*','lng_id = ' . $this->defLng ['id'] . " AND `pid` = '{$r['id']}'",'value','position');
                
            }
            
}    
   public function getAccordionContent()
    {
        global $smarty;
        $db = db::getInstance();
  
	
     
        
        $regionId = $this->post['id'];
        
        $this->technical = $db->getArray( 'technicalinspection', '*', " `lng_id` = '{$this->defLng ['id']}' AND `region` = '{$regionId}' AND `active` ", '', '' );
        $conten = $this->technical;
     
       
         foreach($conten as $k=>$v)
        {
           
             $this->technical[$k]['images'] = $db->getArray('technicalinspection_images_rel','*',"`id` = '{$v['id']}'",'','');
             //$region = $db->getArray('regions','*',"`id` = '{$v['region']}'",'','');
            /*
             foreach($region as $k)
             {
                $v['region'] = $db->getArray('regions','*',"`id` = '{$k['pid']}'",'','');
                foreach($v['region'] as $s)
                {
                    $s['region_sub'] = $db->getArray('regions','*',"`pid` = '{$s['id']}'",'','');
                }
             }*/
             
            
    }

   
        $data= array();
        
        $smarty->assign('this',$this);
        $data['content'] = $smarty->fetch("technical/tabinner.tpl.html");
        $data['info'] = $this->technical;
        
        
        die(json_encode($data));
    
       
	
}
	

	
}
?>