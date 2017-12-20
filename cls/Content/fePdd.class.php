<?php
class fePdd extends front {
	
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
		$this->headStyleSheets [] = "/css/pdd_style.css";
		$this->headStyleSheets [] = "/css/jquery.ui.tooltip.css";
		$this->headStyleSheets [] = "/css/jquery.jscrollpane.css";
		$this->mainTpl = 'default/body.tpl.html';
		$this->headStyleSheets [] = "/css/jquery.fancybox-1.3.4.css";
		$this->headScripts [] = "/scripts/jquery.fancybox-1.3.4.js";
		$this->headScripts [] = "/scripts/jquery.mousewheel.js";
		$this->headScripts [] = "/scripts/jquery.jscrollpane.js";
		$this->headScripts [] = "/scripts/pdd-init.js";
		
		$path = $this->path_params;
		$action = end ( $path );
		$callBack = base::toMethodName ( $action, '', 'action' );
		$this->mainTpl = 'pdd/body.tpl.html';
		if (method_exists ( $this, $callBack )) {
			return $this->$callBack ();
		} else {
			
			if (Request::$xRequestedWith) {
				die ( $callBack );
			}
		}
	}
	
	private function showTimeoutAction() {
		$this->displayTpl = 'pdd/showTimeoutAction.tpl.html';
	}
	private function TicketsOnTheTopicsAction() {
		
		$db = db::getInstance ();
		$this->pddticketcategory = $db->getArray ( "pddticketcategory", "*", "`active`='1' AND `lng_id`='{$this->defLng['id']}'" );
		
		$this->mainTpl = 'pdd/ticketsonthetopicsaction.tpl.html';
	}
	private function showResultAction() {
		
		$db = db::getInstance ();
		$answers = $this->post ['answers'];
		$client_answers = $this->post ['client_answers'];
        if($answers)
        {
            $answersIds = array_keys ( $answers );
        }
		
        
         if(empty($answersIds))
        {
            $answersIds = array(-1);
        }
		$tickets = implode ( ',', $answersIds );
        
       
		$this->questions = $db->getArray ( 'pddticket', '*', "`id` IN ($tickets)  AND `lng_id`='{$this->defLng['id']}'" );
		$this->answers = $answers;
		$this->imageType = $this->post ['imageType'];
		
		
		$duration = $this->post ['duration'] / 1000;
		
		$this->duration = array ("min" => round ( $duration / 60 ), "sec" => $duration % 60 );
		if($answers)
		$this->count_values = array_count_values ( $answers );
		
		foreach ( $this->questions as &$question ) {
			$question ['status'] = $this->answers [$question ['id']];
			$question ['client_answer'] = $client_answers [$question ['id']];
		}
		
		if (isset ( $this->post ['mode'] )) {
			$_SESSION ['marathon_results'] = $this->questions;
			if ($this->post ['mode'] == 'marathon') {
				$this->saveBtn = true;
			}
		}
		$this->displayTpl = 'pdd/showResultAction.tpl.html';
	}
	private function testExamAction() {
	   
		 
		$db = db::getInstance ();
		$ticket = intval ( $this->post ['ticket'] );
		$answer = ($this->post ['answer'] [$ticket]);
		$ticckedData = $db->getRow ( 'pddticket', '*', "`id`='{$ticket}'  AND `lng_id`='{$this->defLng['id']}'" );
		
		$resp = array ('status' => $ticckedData ['correct_answer'] == $answer ? 'true' : 'wrong', 'ticket' => $ticket, 'answer' => $answer );
		if (isset ( $this->post ['showHint'] )) {
			$resp ['hint_for_correct_answer'] = stripslashes( $ticckedData ['hint_for_correct_answer']);
			$resp ['correct_answer'] = $ticckedData ['correct_answer'];
		}
		die ( json_encode ( $resp ) );
	}
	private function marathonAction() 
	{
		$db = db::getInstance ();
		
		$this->headScripts [] = "/scripts/pdd-marathon.js";
		$this->mainTpl = 'pdd/marathon.tpl.html';
		$page =   isset($this->pages['marathon']) ? $this->pages['marathon']:1;
		$limit = 5;
		$offset = ($page-1)*$limit;
		if ($this->query ['category']) {
			$group = intval ( $this->query ['category'] );
			$quetions = $db->getArray ( 'pddticket', '*', "`active`='1'  AND `lng_id`='{$this->defLng['id']}' AND `group`='{$group}'", "`id` ASC" ,'',"$offset ,$limit");
			$found = db::$_found_rows;
			
		} else {
			$quetions = $db->getArray ( 'pddticket', '*', "`active`='1'  AND `lng_id`='{$this->defLng['id']}'", '', '' ,"$offset ,$limit");
			$found = db::$_found_rows;
			mt_srand ( microtime ( 1 ) );
			shuffle ( $quetions );
		}
		 
		$this->indexis = array ('answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_e' );
		$loadLink = false;
		
		if((($page * $limit) <  $found  )   )
		{
		
		 
			$loadLink = HelperFunction::link(array('pdd',"marathon-".($page+1)));
			if($this->query ['category'])
			{
				$loadLink  = $loadLink .'?category='.$this->query ['category'];
			}
			 
		}
		$this->loadLink = $loadLink;
		$this->quetions = $quetions;
		
		if (Request::$xRequestedWith) 
		{
			$result = new stdClass();
			$result->offset = ($page-1)*$limit+1;
			$result->loadLink = $loadLink;
			$result->quetions = $quetions;
			global $smarty ;
			$smarty->assign('this',$this);
			$offset = $result->offset;
			foreach($result->quetions as &$question)
			{
				$assign = array("showHint"=>"show",'ticket'=>$question,"question_number"=>++$offset,"numberoff"=>1);
				$smarty->assign($assign);
				$question['html']= stripslashes( $smarty->fetch("pdd/question.tpl"));
				
			}
			die(json_encode($result));
		}
		
	
	}
	private function toPassTheExamAction() {
		
		if (Request::$xRequestedWith) {
			
			$this->displayTpl = 'pdd/exam-body.tpl.html';
			return;
		}
		$this->indexis = array ('answer_a', 'answer_b', 'answer_c', 'answer_d', 'answer_e' );
		$db = db::getInstance ();
		if (isset ( $this->query ['test'] )) {
			$this->new_navig=array();
			$this->headScripts [] = "/scripts/pdd-exam.js";
			$this->mainTpl = 'pdd/exam.html';
			$testId = intval ( $this->query ['test'] );
			$this->test = $db->getRow ( 'pddtest', '*', "`active`='1' AND `id`={$testId} AND `lng_id`='{$this->defLng['id']}'" );
			
			$this->new_navig['label']  = $this->test['title'];
			
			$quetionsRel = $db->getOptions ( 'pddtest_tickets_rel', 'tickets', 'id', 0, "`id`='{$this->test['id']}'" );
			$quetionsRel = array_keys ( $quetionsRel );
			
			foreach ( $quetionsRel as $index => $quetion ) {
				$this->test ['quetions'] [$index] = $db->getRow ( 'pddticket', '*', "`active`='1' AND `id`='{$quetion}' AND `lng_id`='{$this->defLng['id']}'" );
			}
		
		} else {
			
			$this->tests = $db->getArray ( 'pddtest', '*', "`active`='1' AND `lng_id`='{$this->defLng['id']}'" );
			$this->mainTpl = 'pdd/tests.tpl.html';
		
		}
	}
	public function viewNoticeAction() {
		$db = db::getInstance ();
		$ticketID = $this->query ['id'];
		
		$this->question = $db->getRow ( 'pddticket', '*', "`id` ='{$ticketID}'  AND `lng_id`='{$this->defLng['id']}'" );
		$this->question ['status'] = $this->query ['status'];
		$this->question ['client_answer'] = $this->query ['client_answer'];
		$this->displayTpl = 'pdd/viewNoticeAction.tpl.html';
	}
}