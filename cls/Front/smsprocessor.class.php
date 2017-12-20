<?

/*
[msisdn] => 123456789
[service-number] => 7003
[operator] => Armentel
[text] => car tc001
[date] => 2010-09-09%2018%3A33%3A59

$root['items']['featured']    		        			= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['highlight']    		        			= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['isnew']    		        			    = array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);
$root['items']['inright']    		        			= array( 'control'=>"input" ,'type'=>'checkbox','default'=>0);

*/


class  smsprocessor
{
	
	private $dbResult;
	private $ips;
	private $errors;
	private $get;
	private $post;
	private $server;
	private $numbers;
	private $emails;
	private $REMOTE_ADDR;

	private $msisdn;
	private $service_number;
	private $operator;
	private $text;
	private $date;
	private $offerID;
	private $query;


	public  function __construct($debug = 0)
	{


		$configFile =ROOT_DIR.'/config/config.ini';
		$smsFile =ROOT_DIR.'/config/sms.ini';
		$ini = parse_ini_file($configFile,true);
		$smsini = parse_ini_file($smsFile,true);
		
		
		$db = new db($ini['db']);
		$this->errors = array();


		$this->get = $_GET;
		$this->post = $_POST;
		$this->server = $_SERVER;


		$this->numbers   =    $smsini['numbers'];
		$this->ips       =    $smsini['ip'];
		$this->emails    =    $smsini['emails'];
		$this->error_message      =    $smsini['error_message'];
		$this->sucses_message     =   $smsini['sucses_message'];


		$this->validate($debug);

		if(empty($this->errors) )
		{
			$this->run($db);
		}
		$this->sendmail();
		$this->dump();
	}
	public  function __destruct(){}

	
	
	private function query($params)
	{
		$this->query = " UPDATE offers SET $params, `filed_srtat_date`=NOW(), `filed_end_date`=DATE_ADD(NOW(),INTERVAL 31 DAY)  WHERE `id`='{$this->offerID}'";
	}
	private function run(db &$db)
	{
		$text = $this->text;
		$text = strtolower($text);
		$text = preg_replace('/car tc(.*?)/iu','$1',$text);
		$text = intval($text);
		$this->offerID = $text;

		if(!$this->offerID)
		{
			$this->error('offerID',$this->text);
			return ;
		}


		$action = $this->numbers[$this->service_number];

		if($action)
		{
			
			
			$this->query($action);
			$this->dbResult = $db->query($this->query);
			
			
		}else
		{
			$this->error('function',"#$function# not found");
		}


	}
	private function validate($debug)
	{
		$REMOTE_ADDR = $this->server['REMOTE_ADDR'];
		if(!$debug)
		{
		$this->REMOTE_ADDR = $REMOTE_ADDR;
		if(!in_array($REMOTE_ADDR,$this->ips ) )
		{
			$this->error('ip',$REMOTE_ADDR);
		}
		
		}

		/*service-number*/
		if(!isset($this->get['service-number']))
		{
			$this->error('number','number no exist');
		}elseif(!key_exists($this->get['service-number'],$this->numbers))
		{
			$this->error('number',$this->get['service-number']);
		}else
		{
			$this->service_number = $this->get['service-number'];
		}
		/*service-number*/


		/*operator*/
		if(!isset($this->get['operator']))
		{
			$this->error('operator','operator not set');
		}else
		{
			$this->operator = $this->get['operator-number'];
		}
		/*operator*/


		/*msisdn*/
		if(!isset($this->get['msisdn']))
		{
			$this->error('msisdn','msisdn not set');
		}else
		{
			$this->msisdn = $this->get['msisdn'];
		}
		/*msisdn*/


		/*text*/
		if(!isset($this->get['text']))
		{
			$this->error('text','text not set');
		}else
		{
			$this->text = $this->get['text'];
		}
		/*text*/



		/*date*/
		if(!isset($this->get['date']))
		{
			$this->error('date','date not set');
		}else
		{
			$this->date = $this->get['date'];
		}
		/*date*/


	}
	private function error($error,$value)
	{
		$this->errors[] =array( $error,$value);
	}
	private function sendmail()
	{
		/*
			private $msisdn;
	private $service_number;
	private $operator;
	private $text;
	private $date;
	private $offerID;*/
		
		
		$message['msisdn'] =$this->msisdn;  
		$message['service_number'] =$this->service_number;  
		$message['text'] =$this->text;  
		$message['date'] =$this->date;  
		$message['offerID'] =$this->offerID;  
		$message['REMOTE_ADDR'] =$this->REMOTE_ADDR;  
		
		$messageBody = array();
		foreach ($message as $key=>$value)
		{
			$messageBody[] = "$key\t$value\n" 	;
		}
		
		$messagetext = implode("\n",$messageBody);
		$messagetext.= "ERRORS\n\t".print_r($this->errors,1);
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/plain; charset=utf-8  \r\n";
		// Additional headers
		$headers .= "From: Topcars SMS <topcars@topcars.am> \r\n\r\n";
		foreach ($this->emails as $to=>$mail)
		{
				mail($mail,'TOPCARS SMS',$messagetext,$headers);
				
		}
	}
	
	private function dump()
	{
		
		$logFolder = ROOT_DIR.'/nikitalog';
		$logFolder .= '/'.$this->service_number;
		
		if(!is_dir($logFolder))
		{
			mkdir($logFolder,0777);
			chmod($logFolder,0777);
		}
		
		$logFolder .= '/'.date('d-m-Y')."/";

		if(!is_dir($logFolder))
		{
			mkdir($logFolder,0777);
			chmod($logFolder,0777);
		}
		
		$filename =$this->msisdn.date('H-i-s').'.log';
		
		
		file_put_contents($logFolder.$filename,print_r($this,1));
		
		
		
		
	}
	public function __toString()
	{
		
		if(!empty($this->errors))
		{	
			return $this->error_message;
		}else
		{
			return $this->sucses_message;
		}
	}
}
?>