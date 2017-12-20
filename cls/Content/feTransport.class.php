<?
class feTransport extends front {
	function __construct($init) {

		/*
		 * ************************** ************************** Path Params
		 * Varibles [0] lng [1] home [2] [message] **************************
		 * **************************
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
				
				return $this->$_method ();
			}else
            {
                
            }
		}
        
        
		if ($this->method == 'POST' && isset ( $this->query ['action'] )) {
			$action = $this->query ['action'];
			$action = strtolower ( $action );
			$action = ucfirst ( $action );
			
			$function = "view$action";
			if (method_exists ( $this, $function )) {
				
				return $this->$function ();
			
			} else {
				die ( $function );
			}
		}elseif (isset ( $this->path_params [2] )) {
			$action = $this->path_params [2];
			
			$callBack = base::toMethodName ( $action, '', 'action' );
			
			if (method_exists ( $this, $callBack )) {
				$this->$callBack ();
			} else {
				$this->indexAction ();
			}
		} else {
			$this->indexAction ();
		}
	
	}
	public function validateLoadSubCategory()
    {
       
         $result = array();
         $catId = $this->query['category'];
         
         if(isset( $this->dictonary ['servicescategory'] [$catId ]))
         {
            
            $result =  $this->dictonary ['servicescategory'] [$catId ]['subs'];
         }
         
         die(json_encode($result));
    }
	public function    addServiceSuccessAction() {
		$this->currentPage ['label'] = HelperFunction::trans ( array ('term' => 'service_add_Success' ) );
		$this->currentPage ['content'] = HelperFunction::trans ( array ('term' => 'service_add_Success_aded' ) );
	}
	public function addServiceAction() {
		$db = db::getInstance ();
        $this->headStyleSheets [] = "/css/pdd_style.css";
        $this->headStyleSheets [] = "/css/user.offer.css";
        $this->headScripts [] = "/scripts/jquery.uniform.js";
         $this->headStyleSheets [] = "/css/uniform.default.css";
		$this->headScripts [] = "/scripts/jquery.validate.js";
		$this->headScripts [] = "/scripts/add-form.js";
        $this->headScripts [] = "/scripts/add-form.tpl.js";
		$this->headScripts [] = HelperFunction::link ( array ('home' ) ) . "?external=1&amp;itpl=services/add-form.tpl.js";
		$this->mainTpl = 'services/add-form.tpl.html';
		if ($this->method == 'POST') {
			
			try {
				$errors = array ();
				$data = $this->post ['company'];
				foreach($data as &$item)
				{
					$item = trim($item);
				}
				if ($data ['phone'] == '') {
					$errors ['phone'] = HelperFunction::trans ( array ('term' => 'person_phone_mandatory' ) );
				}
				
// 				if ($data ['person_phone'] === '') {
// 					$errors ['person_phone'] = HelperFunction::trans ( array ('term' => 'person_phone_mandatory' ) );
// 				}
// 				if ($data ['person_email'] == '') {
// 					$errors ['person_email'] = HelperFunction::trans ( array ('term' => 'person_email_mandatory' ) );
// 				} elseif (! filter_var ( $data ['person_email'], FILTER_VALIDATE_EMAIL )) {
// 					$errors ['person_email'] = HelperFunction::trans ( array ('term' => 'person_email_format' ) );
// 				}
				if ($data ['title'] == '') {
					$errors ['title'] = HelperFunction::trans ( array ('term' => 'company_title_mandatory' ) );
				}
				if ($data ['addres'] == '') {
					$errors ['addres'] = HelperFunction::trans ( array ('term' => 'company_adress_mandatory' ) );
				}
				
				/*if ($data ['email'] == '') {
					$errors ['email'] = HelperFunction::trans ( array ('term' => 'company_email_mandatory' ) );
				}*/ if (($data ['email'] != '') && ! filter_var ( $data ['email'], FILTER_VALIDATE_EMAIL )) {
					$errors ['person_email'] = HelperFunction::trans ( array ('term' => 'company_email_format' ) );
				}
				
				if (! empty ( $errors )) {
					throw new Exception ( "VALIDATION_ERROR" );
				}
				
				$query = "INSERT INTO `services`(`id`, `active`,  `alias`, `position`, `date`, `servicescategory`,`sub_servicescategory`,`email`, `phone`,`phone1`, `url`, `person_phone`, `person_name`, `person_email`) 
				                       VALUES (null,'0',?,10,?,?,?,?,?,?,?,?,?,?)
					 			
							 ";
				$query_ml = "INSERT INTO `services_ml`(`id`, `lng_id`, `addres`, `description`, `title`) 
				          VALUES (?,5,?,?,?),(?,7,?,?,?),(?,9,?,?,?)";
				
				$alias = $addres = $description = $title = $date = $servicescategory = $sub_servicescategory = $email = $phone = $phone1 = $url = $person_phone = $person_name = $person_email = null;
				
				$alias = convertUrl ( $data ['title'] );
				$randomAlias = uniqid ( $alias, true );
				$addres = $data ['addres'];
				$description = $data ['description'];
				$title = $data ['title'];
				$date = date ( 'Y-m-d H:i:s' );
				$servicescategory = $data ['servicescategory'];
                $sub_servicescategory = $data ['sub_servicescategory'];
				$phone = $data ['phone'];
                $phone1 = $data ['phone1'];
				$email = $data ['email'];
				$url = $data ['url'];
				$person_phone = "";
				$person_name = " ";
				$person_email = " ";
				if(! Request::$xRequestedWith)
				{
				    
					$stmt = $db->stmt_init ();
					if ($stmt->prepare ( $query )) 
					{
						$stmt->bind_param ( 'ssiisssssss', $randomAlias, $date, $servicescategory,$sub_servicescategory, $email, $phone, $phone1, $url, $person_phone, $person_name, $person_email );
						$execute = $stmt->execute ();
						if ($execute) 
						{
							$id = $stmt->insert_id;
							if ($stmt->prepare ( $query_ml )) 
							{
								$stmt->bind_param ( 'isssisssisss', $id, $addres, $description, $title, $id, $addres, $description, $title, $id, $addres, $description, $title );
								
								$execute = $stmt->execute ();
								if (! $execute) {
									throw new Exception ( "Error Exec " . __LINE__ );
								}
							
							} else {
								throw new Exception ( "Error Exec " . __LINE__ );
							}
						} else {
							throw new Exception ( "Error Exec " . __LINE__ );
						}
						$stmt->close ();
						
						
						/*IMage Processing */
									require_once (ROOT_DIR . '/ini/services.php');
                                    
			
									$sizes = $root ['items'] ["image"] ['resize'];
                                    $main = $this->post['main'] ;
                                    $images = isset ( $this->post ['rel'] ['images'] ) ? $this->post ['rel'] ['images'] : array ();
                                    if ($main ['filed_main_image']) {
										
										$basname = basename ( $main ['filed_main_image'] );
										
										$img = $main ['filed_main_image'];
										if (strstr ( $basname, 'tmp-' )) {
											$output = microtime ( 1 ) . ($key + 1) . mt_rand ( 1000, 9999 );
											$output = str_replace ( ".", "-", $output );
											$img = str_replace ( 'small-', '', $img );
											foreach ( $sizes as $folder => $size ) {
												
												$newFile = base::resizeAndcopy ( $img, $size, $output, "img/services/" . $folder );
											     
											}
											
											$main ['filed_main_image'] = $output . base::getExtension ( $img );
										} else {
											$main ['filed_main_image'] = $basname;
										}
									} else {
										$main ['filed_main_image'] = '';
									}
									
									if (! empty ( $images )) {
										
										foreach ( $images as $key => $img ) {
											$output = microtime ( 1 ) . ($key + 1) . mt_rand ( 1000, 9999 );
											$output = str_replace ( ".", "-", $output );
											
											$basname = basename ( $img );
											$folder = dirname ( $img );
											$bigImage = $folder . "/" . str_replace ( 'small-', '', $basname );
											
											foreach ( $sizes as $folder => $size ) {
												
												$newFile = base::resizeAndcopy ( $bigImage, $size, $output, "img/services/" . $folder );
											
											}
                                            
											$rel ['images'] [] = $output . base::getExtension ( $img );
                                            //$images = isset ( $this->post ['rel'] ['image'] ) ? $this->post ['rel'] ['images'] : array ();
										}
									
									}
                                    
                                    foreach($rel ['images'] as $val)
                                    {
                                        $qu = "INSERT INTO services_images_rel (`id`,`images`) VALUES ('{$id}','{$val}')";
                                        $db->query($qu);
                                    
                                    }
                                    
                                    
                                 
                                    $q = "UPDATE services SET `image` = '{$main ['filed_main_image']}' WHERE `id`='{$id}'";
                                    $db->query($q);
                                    
                                    
                                    
                                    
                                    /*logo*/
                                    $sizes = $root ['items'] ["image"] ['resize'];
                                    $main = $this->post['main'];
                                    if ($main ['logo']) {
										
										$basname = basename ( $main ['logo'] );
										
										$img = $main ['logo'];
										if (strstr ( $basname, 'tmp-' )) {
											$output = microtime ( 1 ) . ($key + 1) . mt_rand ( 1000, 9999 );
											$output = str_replace ( ".", "-", $output );
											$img = str_replace ( 'small-', '', $img );
											foreach ( $sizes as $folder => $size ) {
												
												$newFile = base::resizeAndcopy ( $img, $size, $output, "img/services/" . $folder );
											
											}
											
											$main ['logo'] = $output . base::getExtension ( $img );
										} else {
											$main ['logo'] = $basname;
										}
									} else {
										$main ['logo'] = '';
									}
									
									
                                    
                                    //INSERT INTO services (column1, column2, column3,...) values( value1, value2, value3,...)
                                 
                                    $d = "UPDATE services SET `logo` = '{$main['logo']}' WHERE `id`='{$id}'";
                                    $db->query($d);
                                    
						/*Image Processing*/
						base::redirect ( HelperFunction::link ( array ('transport', 'add-service-success' ) ) );
					
					} else {
						throw new Exception ( "Error Exec " . __LINE__ );
					}
				
				}
			
			} catch ( Exception $e ) {
				
				
				 
               	 $this->errors = $errors;
			}
			if(Request::$xRequestedWith)
			{
			   
				$respons = new stdClass();
				if(isset($this->errors))
				{
					$respons->status = "ERROR";
					$respons->errors = $this->errors;
					$respons->data = $data;
                     
				}else
				{
				    global $smarty;
					$respons->status = "OK";
                    $respons->html = $this->validatePreview();
                    //$respons->message = $smarty->fetch('services/add-services-tabs/view.tpl.html');
                
				}
				
				die(json_encode($respons));
			}
		}
	
	}
	public function indexAction() {
		$where [] = "`active`='1'";
		$where [] = "`lng_id`='{$this->defLng['id']}'";
		$db = db::getInstance ();
		
		$action = end ( $this->path_params );
		if ($this->path_params [2] == 'search') {
			
			$term = $this->query ['term'];
			$term = $db->escape ( $term );
			$term = trim ( $term );
			$where [] = "(
			`addres` LIKE '%$term%' 
			OR `description` LIKE '%$term%' 
			OR `title` LIKE '%$term%' 
			)
			";
		
		} elseif (isset ( $this->path_params [2] )) {
			$catAlias = $db->escape ( $this->path_params [2] );
			$cat = $db->getRow ( 'menu', "*", "`alias`='$catAlias'" );
            if(isset( $this->dictonary ['servicescategory'] [$cat ['id']])){
            $this->selectidCategory  = $this->dictonary ['servicescategory'] [$cat ['id']];
           }
           else
           {
            $this->selectidCategory  = $this->dictonary ['servicescategory'] [$cat ['pid']];
           }
           
           
           
			if (empty ( $cat )) {
				return $this->errorPage ();
			
			} else {
				$where [] = "(`servicescategory`='{$cat['id']}' or `sub_servicescategory`='{$cat['id']}')";
			}
		
		}
		
		$limit = $this->config ['fe_paging_per_page'];
		
		$page = isset ( $this->pages [$action] ) ? intval ( $this->pages [$action] ) : 1;
		$page = $page > 1 ? $page : 1;
		$offset = ($page - 1) * $limit;
        
                        
		if (isset ( $this->path_params [3] )) {
		    		  
			$fimAlias = $db->real_escape_string ( $this->path_params [3] );
			$where [] = "`alias`='$fimAlias'";
            
            $this->headStyleSheets [] = "/css/gallery.css";
			$this->headStyleSheets [] = "/css/user.offer.css";
			
			
			$this->headScripts [] = "/scripts/gallery.js";
			$this->headScripts [] = "/scripts/services.js";
			
			$condition = implode ( " AND ", $where );
			$catalog = $db->getRow ( "services", "*", $condition, '', "`position` ASC", "$offset,$limit" );
            $gallery = $db->getArray('services_images_rel','*',"`id` = '{$catalog['id']}'");
			$siteuser = $db->getRow('siteusers','*',"`id` = '{$catalog['customer']}'");
			$catalog['siteuser'] = $siteuser;
            $catalog['images'] = $gallery; 
            
            
			
			if (empty ( $catalog )) {
				return $this->errorPage ();
			}
			
			global $smarty;
			$servicescategory = $this->dictonary ['servicescategory'] [$catalog ['servicescategory']];
			
          
             /////////!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!///////////////////////              
			if($tpl_file = 'services/item_' . $servicescategory ['alias'] . '.tpl.html')
            {            
		
			if (! $smarty->template_exists ( $tpl_file )) {
				$tpl_file = 'services/item_car-showrooms.tpl.html';
			}
            }
              
            /////////!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!///////////////////////                                       
			if ($catalog ['customer']) {
				$customer = $catalog ['customer'];
				$brands = $db->getArray ( 'offers', 'filed_car_brand as `brand_id`, count(filed_car_brand) as `offers_qty`', "`siteuser`=$customer AND `active`=1", "`filed_car_brand`" );
				
				foreach ( $brands as &$brand ) {
					$brand = array_merge ( $brand, $this->dictonary ['brand_icons'] [$brand ['brand_id']] );
				}
				
				$catalog ['brands'] = $brands;
			
			}
			$this->catalog = $catalog;
            $this->mainTpl = $tpl_file;
            $this->headScripts [] = "https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false";
			$this->headScripts [] = "/scripts/carShowrooms.js";
            $this->headScripts [] = "/scripts/offer.list.js";
            
			$this->headStyleSheets [] = "/css/offers-list.css";
			$this->headStyleSheets [] = "/css/pdd_style.css";
		
		} else {
		
			$condition = implode ( " AND ", $where );
			$catalog = $db->getArray ( "services", "*", $condition, '', "`position` ASC", "$offset,$limit" );
            
            $this->mainTpl = 'services/body.tpl.html';
		}
		$this->catalog = $catalog;
        $this->catalogFound = db::$_found_rows;
		$this->catalogPage = $page;
		$this->catalogLimit = $limit;
		/*
		 * $this->currentPage =$page;
		 */
	
	}
	public function validatePreview() 
	{
		
		$this->catalog = $this->post['company'];
		$this->catalog['image'] ='../../../'.$this->post['main']['filed_main_image'];
		$this->catalogFound =1;
		$tpl_file = 'services/item.tpl.html';
		global  $smarty ;
		$smarty->assign('this',$this);
		$tpl = $smarty->fetch($tpl_file);
		
		return $tpl;
		
	}
	public function viewDisplaythisimage()
	{
		
	}
	public function viewUploadfile() {
		$Imagetypes = array ('image/gif' => IMAGETYPE_GIF, 'image/jpeg' => IMAGETYPE_JPEG, 'image/pjpeg' => IMAGETYPE_JPEG, 'image/png' => IMAGETYPE_PNG );
		$this->upladError = '';
		$files = $this->files ['upload_file'];
		
		if ($files ['error'] != UPLOAD_ERR_OK) {
			$this->upladError = $files ['error'];
			return;
		
		}
		
		if (! key_exists ( $files ['type'], $Imagetypes )) {
			$this->upladError = 'FILE_TYPE_ERROR' . $files ['type'] . "XXX";
			return;
		}
		
		if (! $this->upladError) {
			$ext = image_type_to_extension ( $Imagetypes [$files ['type']] );
			$name = str_replace ( ".", '-', microtime ( 1 ) );
			$tname = 'small-tmp-' . $name;
			$name = 'tmp-' . $name . $ext;
			move_uploaded_file ( $files ['tmp_name'], "img/tmp/" . $name );
			
			base::resizeAndcopy ( "img/tmp/" . $name, 110, $tname, 'img/tmp/' );
			$this->uploadedFile = "img/tmp/" . $tname . $ext;
		
		}
	}
}
?>