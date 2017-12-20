<?
class FeCalculators extends front {
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
        
        
        
        $this->headScripts [] = "/scripts/jquery.uniform.js";
        $this->headStyleSheets [] = "/css/uniform.default.css";
        $this->headScripts [] = "/scripts/calc.js";
        
        
        $path = $this->path_params;
		$action = end ( $path );
		$callBack = base::toMethodName ( $action, '', 'action' );
        
        
		$this->mainTpl = 'calculators/body.tpl.html';
		
        if (method_exists ( $this, $callBack )) {
			return $this->$callBack ();
    		} else {
    			
    		  $this->ViewAction();
    		}
            
            
            
         
            
        
       	}
        
public function CalculatorsAction()
  {
    $db = db::getInstance();
    $this->calculators = $db->getArray("calculators","*","`active` AND `lng_id` = '{$this->defLng['id']}'","","`position` ASC");
    $redirect = $this->calculators[0]['alias'];
   
    base::redirect ( HelperFunction::link ( array ('calculators', "{$redirect}" ) ) );


}
 public function EcoAction()
 {
            $db = db::getInstance();
            $calcType = $db->escape(end($this->path_params));
            $this->calculators = $db->getArray("calculators","*","`active` AND `lng_id` = '{$this->defLng['id']}'","","`position` ASC");
            $this->calculator = $db->getRow('calculators','id,title,content',"`alias` = '{$calcType}' AND `lng_id` = {$this->defLng['id']}",'','','');
            $calculatorID = $this->calculator['id'];
            $this->pay = $db->getArray('transport_type','*',"`lng_id` = {$this->defLng['id']} AND `calculator` = '{$calculatorID}'",'','','');
            
            $this->k_cent = $db->getArray('k_cent','*',"`lng_id` = {$this->defLng['id']} AND `calculator` = '{$calculatorID}'",'','position','');
            
            
            $this->contentTpl = 'calculators/eco-calc.tpl.html';
            
       
 }
  public function PropertyAction()
 {
            $db = db::getInstance();
            $this->calculators = $db->getArray("calculators","*","`active` AND `lng_id` = '{$this->defLng['id']}'","","`position` ASC");
            $calcType = $db->escape(end($this->path_params));  
            $this->calculator = $db->getRow('calculators','id,title,content',"`alias` = '{$calcType}' AND `lng_id` = {$this->defLng['id']} ",'','','');
            $calculatorID = $this->calculator['id'];
            $this->transType = $db->getArray('transport_type','*',"`lng_id` = {$this->defLng['id']} AND `calculator` = '{$calculatorID}'",'','','');
            $this->contentTpl = 'calculators/property-calc.tpl.html';
            
        
            
       
 }
  public function TechAction()
 {
            $db = db::getInstance();
            $this->calculators = $db->getArray("calculators","*","`active` AND `lng_id` = '{$this->defLng['id']}'","","`position` ASC");
            $calcType = $db->escape(end($this->path_params));  
            $this->calculator = $db->getRow('calculators','id,title,content',"`alias` = '{$calcType}' AND `lng_id` = {$this->defLng['id']} ",'','','');
            $calculatorID = $this->calculator['id'];
            $this->transType = $db->getArray('transport_type','*',"`lng_id` = {$this->defLng['id']} AND `calculator` = '{$calculatorID}'",'','','');
            
            $this->contentTpl = 'calculators/tech.tpl.html';
            

            
       
 }
   public function AppaAction()
 {
            $db = db::getInstance();
            $this->calculators = $db->getArray("calculators","*","`active` AND `lng_id` = '{$this->defLng['id']}'","","`position` ASC");
            $calcType = $db->escape(end($this->path_params));  
            $this->calculator = $db->getRow('calculators','id,title,content',"`alias` = '{$calcType}' AND `lng_id` = {$this->defLng['id']} ",'','','');
            $calculatorID = $this->calculator['id'];
            $this->transType = $db->getArray('transport_type','*',"`lng_id` = {$this->defLng['id']} AND `calculator` = '{$calculatorID}'",'','','');
            
            
            $selectString = "SELECT * FROM `use_category` ";
            $useCategoriesTitles = $db->queryFetch ( $selectString );
            
            $selectString = "SELECT * FROM `driver_count_category` ";
            $countCategoriesTitles = $db->queryFetch ( $selectString );
            
            $selectString = "SELECT * FROM `passenger_power_category` ";
            $powerCategoriesTitles = $db->queryFetch ( $selectString );


            
            
            
            $this->contentTpl = 'calculators/appa.tpl.html';
            

            
       
 }
        

public function ViewAction()
        {
            
            $db = db::getInstance();
            $alias = $db->escape(end($this->path_params));
            $this->curr = $db->getRow("menu","*","`active` = '1' AND `lng_id` = '{$this->defLng['id']}' AND `alias` = '{$alias}'");
            
            if(!$this->curr)
            {
                $this->errorPage();
            }
            else
            {
                
                $this->mainTpl = 'default/body.tpl.html';
            }
        }
        
        
        public function AppaPriceAction()
{
    $db = db::getInstance();
        $driversCountId =  (!isset($this->post["driverInfo"]))  ? -1 : $this->post["driverInfo"];
        $passengerPowerCategoryId =  (!isset($this->post["motorPower"]))  ? -1 : $this->post["motorPower"];
        $useCategoryId =  (!isset($this->post["useType"]))  ? -1 : $this->post["useType"];
        $carType =  (!isset($this->post["carType"]))  ? die('You must select type !!!') : $this->post["carType"];
        
        
        $isTrailer =(!isset($this->post["trailer"]))  ?  1 : $this->post["trailer"]; 
        
        $coeficent =  (!isset($this->post["coef"]))  ? 1 : $this->post["coef"];
      
      
        if($carType==1)
        {
        	$selectString="SELECT `passenger_price_price` as `price`
        					FROM `passenger_price`
        					WHERE `passenger_price_use_category_id` =$useCategoryId
        					  AND `passenger_price_driver_count_category` =$driversCountId
        					  AND `passenger_price_passenger_power_category_id` =$passengerPowerCategoryId
        					  AND  `passenger_price_trailer`=$isTrailer
        					  ";
        					
        	$price= $db->queryFetchOne ( $selectString );
            $price=$price['price'];
            
            
        }
        if( $carType==2 )
        {
         
         
        	$selectString="SELECT `truck_price_price` as `price`
        					FROM `truck_price`
        					WHERE `truck_price_driver_count_category` = $driversCountId
        					  AND `truck_price_truck_power_category_id` = $passengerPowerCategoryId 
        	 				  AND `truck_price_trailer` = $isTrailer ";
        	$price= $db->queryFetchOne ( $selectString );
        	$price=$price['price'];
            	
        }
        if( $carType==3 )
        {
         
        	$selectString="SELECT `bus_price_price` as `price`
        				   FROM `bus_price`
        				  WHERE `bus_price_driver_count_category` =$driversCountId";
        	
        	$price= $db->queryFetchOne ( $selectString );
        	$price=$price['price'];	
            
        }
        if( $carType==4 )
        {
        	$selectString="SELECT `moto_price_price` as `price`
        					FROM  `moto_price`
        					WHERE `moto_price_use_category_id` =$useCategoryId
        					  AND `moto_price_driver_count_category` =$driversCountId";
        	
        	$price= $db->queryFetchOne ( $selectString );
        	$price=$price['price'];	
        }
        if( $carType==5 )
        {
        	$selectString="SELECT `other_price_price` as `price`
        					FROM `other_price`
        					WHERE `other_price_use_category_id` =$useCategoryId
        					  AND `other_price_driver_count_category` =$driversCountId
        					  AND `other_price_trailer` =$isTrailer
        					  ";
        	
        	$price= $db->queryFetchOne ( $selectString );
        	$price=$price['price'];	
        }
        
         $price= $price*$coeficent;
        //echo $price;
        die(json_encode($price));
         
       
        
        
        
        
        }



}
?>