<?
class feBrand extends front 
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
		$this->mainTpl = 'brand/middle.tpl.html';
		$this->contentTpl='brand/allbrands.tpl.html';
		
		if(count($path_params) == 2  || (count($path_params) == 3 && $path_params[2] == 'all'))
		{
			$this->getAllBrands(1);
			
		}elseif (count($path_params) == 3)
		{
			$this->brand = $path_params[2];
			$this->getCurentBrand(0,0);
			
		}elseif (count($path_params) == 4 && $path_params[3] =='more')
		{
			$this->brand = $path_params[2];
			$this->getCurentBrand(1,0);
			
		}elseif (count($path_params) == 4 && $path_params[3] =='more-models')
		{
			$this->brand = $path_params[2];
			$this->getCurentBrand(0,1);
		}
		elseif (count($path_params) == 4 )
		{
			$this->brand = $path_params[2];
			$this->Brandmodel = $path_params[3];
			$this->getCurentBrand();
			$this->getCurentModel();
		}
		elseif (count($path_params) == 5)
		{
			$this->brand = $path_params[2];
			$this->Brandsmodel = $path_params[3];
			$this->Brandmodel = $path_params[4];
			$this->getCurentBrand();
			$this->getCurentsModel();
			$this->getCurentModel();
		}
		
	
	}
	
	public function getCurentBrand($more=0,$mode_models = 0)
	{
		$db = db::getInstance();
		$this->buildAdSearchWhere();
		$CurentBrand = $db->getRow('brandmodel','*','lng_id='.$this->defLng['id']." AND `active`  AND alias='{$this->brand}'",'',' position ');
		
		if(empty($CurentBrand))
		{
			return $this->errorPage();
		
		}
		$this->CurentBrand = $CurentBrand;
		
		if($mode_models)
		{
			$this->viewAllModels = 1;
			$mode_models_cond = " ";
		}else
		{
			$this->viewAllModels = 0;
			$mode_models_cond = " AND home ";
			
			
			$qty = $db->getRow('brandmodel','count(*) as qty','pid='.$this->CurentBrand['id'] ." AND ! home");
			
			$this->moreViewQty = isset($qty['qty']) ? $qty['qty']:0;
			
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
		
		
		$this->brandModels =$db->queryFetch($query);
		
		if($more)
		       $this->contentTpl = 'brand/curentbrand-more.tpl.html';
		else
		    $this->contentTpl = 'brand/curentbrand.tpl.html';
		    
		
		    
		foreach ($this->brandModels as $i=>$model)
		{
			$query = "  SELECT brandmodel.* ,brandmodel_ml.`short` ,brandmodel_ml.`full`,COUNT(offers.id) as offerscount 
						FROM brandmodel LEFT JOIN brandmodel_ml ON(brandmodel_ml.id=brandmodel.id) 
						LEFT JOIN offers ON (brandmodel .id=filed_car_brand_model) 
						WHERE  brandmodel.active 
						      AND 
						      brandmodel_ml.lng_id = {$this->defLng['id']} AND pid={$model['id']}
						      
						      
		
						GROUP BY brandmodel.id  
						ORDER BY `position`
						 ";
			
			$subs = $db->queryFetch($query);
			if(!empty($subs))
			{
				$this->brandModels[$i]['sub'] = $subs;
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
		
		
		$this->brandOldModels =$db->queryFetch($query);
		
		
		foreach ($this->brandOldModels as $i=>$model)
		{
			$query = "  SELECT brandmodel.* ,brandmodel_ml.`short` ,brandmodel_ml.`full`,COUNT(offers.id) as offerscount 
						FROM brandmodel LEFT JOIN brandmodel_ml ON(brandmodel_ml.id=brandmodel.id) 
						LEFT JOIN offers ON (brandmodel .id=filed_car_brand_model) 
						WHERE  brandmodel.active 
						      AND 
						      brandmodel_ml.lng_id = {$this->defLng['id']} AND pid={$model['id']}
						      
						      
		
						GROUP BY brandmodel.id   ";
			
			
			if($model['label'] == 'Other')
			{
				
				$trans = array('term'=>'other_model');
				$this->brandOldModels[$i]['label'] =HelperFunction::trans($trans);
				
			}
			
			$subs = $db->queryFetch($query);
			if(!empty($subs))
			{
				$this->brandOldModels[$i]['sub'] = $subs;
			}
			
		} 
		
		
	    $this->currentPage['title'] =$this->CurentBrand['label']."  ".$this->config['defaultTitle'];			
		

	}	
	public function getCurentModel()
	{
		
		
		$this->headStyleSheets [] = "/css/getCurentModel.css";
		$this->headStyleSheets [] = "/css/jquery.fancybox-1.3.4.css";
		$this->headScripts [] = "/scripts/jquery.fancybox-1.3.4.js";
		$this->headScripts [] = "/scripts/getCurentModel.js";
		
		
		$db = db::getInstance();
		if(!isset($this->CurentSmodel))
			$CurentModel = $db->getRow('brandmodel','*','lng_id='.$this->defLng['id']." AND `active` AND pid={$this->CurentBrand['id']}  AND alias='{$this->Brandmodel}'",'','position');
		else 
			$CurentModel = $db->getRow('brandmodel','*','lng_id='.$this->defLng['id']." AND `active` AND pid={$this->CurentSmodel['id']}  AND alias='{$this->Brandmodel}'",'','position');
		
		if(empty($CurentModel)){
		
			return $this->errorPage();
		}
		
		
		$this->CurentModel = $CurentModel;
		
		$CurentModelGalery = $db->getArray('brandmodel_galery_rel','*',"  id={$this->CurentModel['id']}",'','');
		$this->CurentModelGalery = $CurentModelGalery;
		
		$this->contentTpl = 'brand/curentmodel.tpl.html';
		$this->currentPage['title'] =$this->CurentBrand['label'].' '.$this->CurentModel['label'].' ' ."  ".$this->config['defaultTitle'];	

		
	}
	public function getCurentSmodel()
	{
		
		$db = db::getInstance();
		$CurentSmodel = $db->getRow('brandmodel','*','lng_id='.$this->defLng['id']." AND `active` AND pid={$this->CurentBrand['id']}  AND alias='{$this->Brandsmodel}'",'','position');
		
		if(empty($CurentSmodel))
		
			return $this->errorPage();
		
		
		$this->CurentSmodel = $CurentSmodel;
		
		$CurentSmodelGalery = $db->getArray('brandmodel_galery_rel','*',"  id={$this->CurentSmodel['id']}",'','');
		$this->CurentSmodelGalery = $CurentSmodelGalery;
		
		$this->contentTpl = 'brand/curentmodel.tpl.html';
		
		$this->currentPage['title'] =$this->CurentSmodel['label']." - ".$this->currentPage['title'];			
		
	}
	
}
?>