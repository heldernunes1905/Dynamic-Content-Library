<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends CI_Controller {
	public function __construct(){
        parent::__construct();
         //load the model  
         $this->load->model('model'); 
		 $this->load->library('unit_test');

    }


	public function index(){
		$data['contents'] = $this->model->getSticksShow();
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}
		$this->load->view('list/first_list',$data);
	}
	public function movie(){
		$type = "movie";
		$data['contents'] = $this->model->getContentList($type);

		if (isset($this->session->userdata['logged_in'])) {
			$data['useraddlist'] = array();
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

			foreach($data['contents'] as $id){
				$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],1);
				array_push($data['useraddlist'],$userlistexists);
			}
		} 

		$this->load->view('list/all_list',$data);
	}
	public function show(){
		$type = "show";
		
		$data['contents'] = $this->model->getContentList($type);
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

		$data['useraddlist'] = array();
			foreach($data['contents'] as $id){
				$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],2);
				array_push($data['useraddlist'],$userlistexists);
			}
		}
		$this->load->view('list/all_list',$data);
	}
	public function game(){
		$type = "game";
		$data['contents'] = $this->model->getContentList($type);
		if (isset($this->session->userdata['logged_in'])) {
		$data['useraddlist'] = array();
		$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

			foreach($data['contents'] as $id){
				$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],3);
				array_push($data['useraddlist'],$userlistexists);
			}
		}
		$this->load->view('list/all_list',$data);
	}
	public function book(){
		$type = "book";
		$data['contents'] = $this->model->getContentList($type);
		if (isset($this->session->userdata['logged_in'])) {
		$data['useraddlist'] = array();
		$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

			foreach($data['contents'] as $id){
				$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],4);
				array_push($data['useraddlist'],$userlistexists);
			}
		}
		$this->load->view('list/all_list',$data);
	}

	public function studio(){
		$uri = $_SERVER['REQUEST_URI']; 
		$genre = str_replace("/CodeIgniter-3.1.10/index.php/studio/","",$uri);
		$remove = str_replace("%20"," ",$genre);
		$data['contents'] = $this->model->getStudioContentList($remove);
		if (isset($this->session->userdata['logged_in'])) {
			$data['useraddlist'] = array();
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

				foreach($data['contents'] as $id){
					$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],5);
					array_push($data['useraddlist'],$userlistexists);
				}
			}
		$this->load->view('list/all_list',$data);
	}

	public function genre(){
		$uri = $_SERVER['REQUEST_URI']; 
		$genre = str_replace("/CodeIgniter-3.1.10/index.php/display/genre/","",$uri);
		$remove = str_replace("%20"," ",$genre);
		$data['contents'] = $this->model->getgenreInfo($remove);
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

			$data['useraddlist'] = array();
				foreach($data['contents'] as $id){
					$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],0);
					array_push($data['useraddlist'],$userlistexists);
				}
			}
		$this->load->view('list/all_list',$data);
	}

	public function display(){
		$uri = $_SERVER['REQUEST_URI']; 
		$id = str_replace("/CodeIgniter-3.1.10/index.php/display/","",$uri);
		$data['contents'] = $this->model->getdisplayinfo($id);
		$data['genres'] = $this->model->getdisplaygenre($id);

		switch($data['contents'][0]->content_type){
			case 'movie':
				$type = 1;
				break;
			case 'show':
				$type = 2;
				break;
			case 'game':
				$type = 3;
				break;
			case 'book':
				$type = 4;
				break;
				
		}
		$data['useraddlist'] = array();
		$data['usercustomlistadd'] = array();
		$data['allist'] = array();
		$data['userratingpersonal'] = array();
		if (isset($this->session->userdata['logged_in'])) {
			$data['personalrating'] = $this->model->getpersonalrating($id,$this->session->userdata['logged_in']['user_id']);
			
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

			$data['userratingpersonal'] = $this->model->getdisplayuserratingpersonal($id,$this->session->userdata['logged_in']['user_id']);

			$userlistexists = $this->model->getuserlist($id,$this->session->userdata['logged_in']['user_id'],$type);
			$data['usercustomlistadd'] = $this->model->usercustomlistadd($id,$this->session->userdata['logged_in']['user_id'],5);
			
			$data['allist'] = $this->model->allist($id,$this->session->userdata['logged_in']['user_id'],5,$data['usercustomlistadd']);
			array_push($data['useraddlist'],$userlistexists);
			
		}

		$data['userratingall'] = $this->model->getdisplayuserrating($id,$data['userratingpersonal']);

		$this->load->view('list/display',$data);
	}

	public function staff(){
		$uri = $_SERVER['REQUEST_URI']; 
		$ct_staff = str_replace("/CodeIgniter-3.1.10/index.php/display/","",$uri);
		$contentId = strtok($ct_staff, '/');
		$data['contents'] = $this->model->getStaffmembers($contentId);
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}
		$this->load->view('list/staff',$data);
		//$data['contents'] = $this->model->getdisplayinfo($contentId); If I want to display content info in staff page I use this method
	}

	public function ratinguserchange(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/ratinguserchange/","",$uri);
		$user_id = strtok($user_id, '/');
		$contentId = str_replace("/CodeIgniter-3.1.10/index.php/ratinguserchange/$user_id/content/","",$uri);
		$contentId = strtok($contentId, '/');
		$rating = str_replace("/CodeIgniter-3.1.10/index.php/ratinguserchange/$user_id/content/$contentId/rating/","",$uri);

		$this->model->changerating($user_id,$contentId,$rating);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function removerating(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/removerating/","",$uri);
		$user_id = strtok($user_id, '/');
		$contentId = str_replace("/CodeIgniter-3.1.10/index.php/removerating/$user_id/","",$uri);

		$this->model->changerating($user_id,$contentId,0);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function addcommentContent(){
		$review = $_GET['comment'];
		$title = $_GET['title'];
		$uri = $_SERVER['REQUEST_URI']; 
		$contentId = str_replace("/CodeIgniter-3.1.10/index.php/addcontentcomment/","",$uri);
		$contentId = strtok($contentId, '/');
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/addcontentcomment/$contentId/userid/","",$uri);
		$user_id = strtok($user_id, '?');

		$this->model->addcommentContent($user_id,$contentId,$review,$title);
		redirect($_SERVER['HTTP_REFERER']);

	}

	public function removecommentcontent(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/removecommentcontent/","",$uri);
		$user_id = strtok($user_id, '/');
		$contentId = str_replace("/CodeIgniter-3.1.10/index.php/removecommentcontent/$user_id/","",$uri);

		$this->model->addcommentContent($user_id,$contentId,"fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec",0);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function addcharactercontent(){
		$review = $_GET['comment'];
		$uri = $_SERVER['REQUEST_URI']; 
		$characterId = str_replace("/CodeIgniter-3.1.10/index.php/addcharactercontent/","",$uri);
		$characterId = strtok($characterId, '/');
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/addcharactercontent/$characterId/userid/","",$uri);
		$user_id = strtok($user_id, '?');

		$this->model->addcharacterContent($user_id,$characterId,$review);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function removecharactercontent(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/removecharactercontent/","",$uri);
		$user_id = strtok($user_id, '/');
		$characterId = str_replace("/CodeIgniter-3.1.10/index.php/removecharactercontent/$user_id/","",$uri);

		$this->model->addcharacterContent($user_id,$characterId,"fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function addstaffcontent(){
		$review = $_GET['comment'];
		$uri = $_SERVER['REQUEST_URI']; 
		$staffId = str_replace("/CodeIgniter-3.1.10/index.php/addstaffcontent/","",$uri);
		$staffId = strtok($staffId, '/');
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/addstaffcontent/$staffId/userid/","",$uri);
		$user_id = strtok($user_id, '?');

		$this->model->addstaffcontent($user_id,$staffId,$review);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function removestaffcontent(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/removestaffcontent/","",$uri);
		$user_id = strtok($user_id, '/');
		$staffId = str_replace("/CodeIgniter-3.1.10/index.php/removestaffcontent/$user_id/","",$uri);

		$this->model->addstaffcontent($user_id,$staffId,"fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec");
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function staffshow(){
		$uri = $_SERVER['REQUEST_URI']; 
		$staffId = str_replace("/CodeIgniter-3.1.10/index.php/staff/","",$uri);
		$data['contents'] = $this->model->getStaffInfo($staffId);
		$data['chars'] = $this->model->getcharbystaffmembers($staffId);

		$data['personalcomment'] = array();
		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['personalcomment'] = $this->model->personalcommentst($staffId,$user_id,2);
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

		}
		$data['comments'] = $this->model->getStaffComments($staffId,$data['personalcomment']);

		$this->load->view('list/staffshow',$data);

		//$data['contents'] = $this->model->getdisplayinfo($contentId); If I want to display content info in staff page I use this method
	}

	public function characters(){
		$uri = $_SERVER['REQUEST_URI']; 
		$ct_staff = str_replace("/CodeIgniter-3.1.10/index.php/display/","",$uri);
		$contentId = strtok($ct_staff, '/');
		$data['contents'] = $this->model->getCharacters($contentId);
		if (isset($this->session->userdata['logged_in'])) {
			
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}
		/*$data['staff'] = $this->model->getStaffmembers($contentId);
		$data['staffchar'] = $this->model->getStaffCharacter($data); Show character that a staff member plays but not working currently*/

		$this->load->view('list/characters',$data);

		//$data['contents'] = $this->model->getdisplayinfo($contentId); If I want to display content info in staff page I use this method
	}

	public function notification(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/notification/","",$uri);
		$data['contents'] = $this->model->getNotification($user_id);

		//$this->load->view('list/notification',$data);
	}

	public function removenotif(){
		$uri = $_SERVER['REQUEST_URI']; 
		$not_id = str_replace("/CodeIgniter-3.1.10/index.php/removenotif/","",$uri);
		$this->model->removenotif($not_id);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function charactersshow(){
		$uri = $_SERVER['REQUEST_URI']; 
		$characterId = str_replace("/CodeIgniter-3.1.10/index.php/characters/","",$uri);
		$data['contents'] = $this->model->getCharacterInfo($characterId);
		$data['chars'] = $this->model->getStaffcharmembers($characterId);
		$data['personalcomment'] = array();

		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['personalcomment'] = $this->model->personalcommentst($characterId,$user_id,3);
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

		}
		$data['comments'] = $this->model->getCharComments($characterId,$data['personalcomment']);
		
		$this->load->view('list/charactershow',$data);

		//$data['contents'] = $this->model->getdisplayinfo($contentId); If I want to display content info in staff page I use this method
	}

	public function forum(){
		//$data['contents'] = $this->model->getBook();
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}
		$this->load->view('list/forum',$data);
	}

	
}
