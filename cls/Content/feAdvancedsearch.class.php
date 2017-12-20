<?
class feAdvancedsearch extends front {
	function __construct($init) {
		/*
		***************************
		***************************
		*Path Params  Varibles
		* [0] lng
		* [1] home
		***************************
		***************************
		*/
		$vars = get_object_vars ( $init );
		foreach ( $vars as $key => $value ) {
			$this->{$key} = $value;
		}
		
		if (isset ( $this->get ['search'] )) {
			$url = array ();
			//file_put_contents('xxx',print_r($this->get,1));

			foreach ( $this->get as $key => $value ) {
				if ($key == 'kayficent')
					continue;
				
				if (is_array ( $value )) {
					if ($key == 'filed_milage') {
						foreach ( $value as $kX => $vC ) {
							$value [$kX] = $vC * $this->get ['kayficent'];
						}
					}
//					$value = array_unique ( $value );
					
					foreach ( $value as $k => $v ) {
						if ($v)
							$url [$key] [$k] = $v;
					}
				} else {
					if ($value)
						$url [$key] = $value;
				}
			}
			

			$urlTail = http_build_query ( $url );
			
			$link = HelperFunction::link(array('cars'));
			$link = $link . "?" . $urlTail;
			
			base::redirect ( $link );
		}elseif(!Request::$xRequestedWith )
		{
			if(isset($_SERVER['HTTP_REFERER']))
			{
				
				$HTTP_REFERER_URI = parse_url($_SERVER['HTTP_REFERER']);
				if(isset($HTTP_REFERER_URI['query']))
				{
					$query = "?".$HTTP_REFERER_URI['query'].'&open_dialog';
					
				}else
				{
					$query = "?&open_dialog";
				}
				if($HTTP_REFERER_URI['host'] != $_SERVER['HTTP_HOST'])
				{
					$redirectLink = HelperFunction::link(array('home'));
					
				}elseif($HTTP_REFERER_URI['path'] != '/advancedsearch.html')
				{
					$redirectLink =$HTTP_REFERER_URI['path'];
				}else
				{
					$redirectLink = HelperFunction::link(array('home'));
				}
				
				base::redirect($redirectLink.$query);
			}		
		}
		$this->contentTpl = 'advancedsearch/form.tpl.html';
		$this->mainTpl = 'advancedsearch/body.tpl.html';
		
		if (isset ( $this->get ['method'] )) 
		{
			$_method = $this->get ['method'];
			$_method = ucfirst ( $_method );
			$_method = "validate{$_method}";
			
			if (method_exists ( $this, $_method )) {
				
				$this->$_method ();
			}
		}
		
		if(Request::$xRequestedWith )
		{
			$this->displayTpl = $this->contentTpl;
		}
		
	}
	
	function validateViewLoanCalc() {
		$this->contentTpl = '';
		$this->displayTpl = 'advancedsearch/loan.tpl.html';
	
	}
}
?>