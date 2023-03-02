<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load the model  
		$this->load->model('admin_model');
	}

	public function add_user()
	{
		$this->load->view('login/admin_stuff/add_user');
	}
	
	public function remove_user()
	{
		$id = $this->input->post('userid');
		$data = $this->admin_model->remove_user($id);
	}
	public function remove_img()
	{
		$id = $this->input->post('contentId');
		$data = $this->admin_model->remove_img($id);
	}
	//change info on a user
	public function mod_user()
	{
		$data = array(
			
			'username' => $this->input->post('user_name'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('user_email'),
			'password' => $this->input->post('user_password'),
			'permission' => $this->input->post('permissions'),
			'user_id' => $this->input->post('user_id')
		);
		$result = $this->admin_model->edit_user($data);

		header("Location: http://localhost/CodeIgniter-3.1.10/index.php/edit_user");
		if ($result == TRUE) {
			$data['message_display'] = 'Registration Successfully !';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		} else {
			$data['message_display'] = 'Username already exist!';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		}
	}

	public function add_user_db()
	{
		$data = array(
			
			'username' => $this->input->post('username'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('user_email'),
			'password' => $this->input->post('user_password'),
			'permission' => $this->input->post('permissions'),
			'user_id' => $this->input->post('user_id')
		);
		$result = $this->admin_model->registration_insert($data);

		header("Location: http://localhost/CodeIgniter-3.1.10/index.php/edit_user");
		if ($result == TRUE) {
			$data['message_display'] = 'Registration Successfully !';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		} else {
			$data['message_display'] = 'Username already exist!';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		}
	}

	public function mod_img()
	{

		$data = array(
			'title' => $this->input->post('title'),
			'content_type' => $this->input->post('content_type'),
			'description' => $this->input->post('description'),
			'rating' => $this->input->post('rating'),
			'release_date' => $this->input->post('release_date'),
			'ranking' => $this->input->post('ranking'),
			'studio_id' => $this->input->post('studio_id'),
			'links' => $this->input->post('links'),
			'contentId' => $this->input->post('contentId')
			
		);
		$result = $this->admin_model->edit_image($data);

		header("Location: http://localhost/CodeIgniter-3.1.10/index.php/edit_image");
		if ($result == TRUE) {
			$data['message_display'] = 'Registration Successfully !';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		} else {
			$data['message_display'] = 'Username already exist!';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		}
	}
	//data on the user logged in
	public function update_user()
	{

		if ($this->input->post('permission') == 0) {
			$data = array(
				'email' => $this->input->post('user_email'),
				'password' => $this->input->post('password'),
				'username' => $this->input->post('username'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'gender' => $this->input->post('gender'),
				'bio' => $this->input->post('bio'),
				'avatar' => $this->input->post('avatar'),
				'profile_banner' => $this->input->post('profile_banner'),
				'profile_state' => $this->input->post('profile_state'),
				'user_id' => $this->input->post('user_id'),
				'permission' => 0
			);
			$result = $this->admin_model->edit_user($data);
			// Add user data in session
			if ($result == 2) {
				$data['message_display'] = 'Registration Successfully !';
				$session_data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'email' => $this->input->post('user_email'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'user_id' => $this->input->post('user_id'),
					'permission' => $this->input->post('permission'),
					'birthday' => $this->input->post('birthday'),
					'gender' => $this->input->post('gender'),
					'bio' => $this->input->post('bio'),
					'avatar' => $this->input->post('avatar'),
					'profile_banner' => $this->input->post('profile_banner'),
					'profile_state' => $this->input->post('profile_state'),
					'permission' => 0
				);
				$this->session->set_userdata('logged_in', $session_data);
				redirect($_SERVER['HTTP_REFERER']);
				//$this->load->view('login/admin_stuff/add_user', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$data['users'] = $this->admin_model->getUsers();
				redirect($_SERVER['HTTP_REFERER']);
				//$this->load->view('login/admin_stuff/add_user', $data);
			}


		} else {
			
			$data = array(
				'email' => $this->input->post('user_email'),
				'password' => $this->input->post('password'),
				'username' => $this->input->post('username'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'gender' => $this->input->post('gender'),
				'bio' => $this->input->post('bio'),
				'avatar' => $this->input->post('avatar'),
				'profile_banner' => $this->input->post('profile_banner'),
				'profile_state' => $this->input->post('profile_state'),
				'user_id' => $this->input->post('user_id'),
				'permission' => 1
			);
			$result = $this->admin_model->edit_user($data);

			if ($result == 2) {
				$data['message_display'] = 'Registration Successfully !';
				$session_data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'email' => $this->input->post('user_email'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'user_id' => $this->input->post('user_id'),
					'permission' => $this->input->post('permission'),
					'birthday' => $this->input->post('birthday'),
					'gender' => $this->input->post('gender'),
					'bio' => $this->input->post('bio'),
					'avatar' => $this->input->post('avatar'),
					'profile_banner' => $this->input->post('profile_banner'),
					'profile_state' => $this->input->post('profile_state'),
					'permission' => 1
				);
				redirect($_SERVER['HTTP_REFERER']);
				//$this->load->view('login/admin_stuff/add_user', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$data['users'] = $this->admin_model->getUsers();
				redirect($_SERVER['HTTP_REFERER']);
				//$this->load->view('login/admin_stuff/add_user', $data);
			}
		}
	}

	public function admindetails()
	{
		// POST data
		$postData = $this->input->post();
		// get data
		$data = $this->admin_model->getUserDetails($postData);

		echo json_encode($data);
	}
	public function imgDetails()
	{
		// POST data
		$postData = $this->input->post();
		// get data
		$data = $this->admin_model->getimgDetails($postData);
		
		echo json_encode($data);
	}

	public function userDetails()
	{
		// POST data
		$postData = $this->input->post();
		// get data
		$data = $this->admin_model->getUserDetails($postData);

		echo json_encode($data);
	}

	public function edit_user()
	{
		
		$data['users'] = $this->admin_model->getUsers();
		$this->load->view('login/admin_stuff/edit_user', $data);
	}

	public function addToList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/additemlist/","",$uri);
		$profileId = strtok($profileId, '/');
		$contentId = str_replace("/CodeIgniter-3.1.10/index.php/additemlist/$profileId/","",$uri);

		$this->admin_model->updateUserList($profileId,$contentId,0);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function removeitemlist()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/removeitemlist/","",$uri);
		$profileId = strtok($profileId, '/');
		$contentId = str_replace("/CodeIgniter-3.1.10/index.php/removeitemlist/$profileId/","",$uri);

		$this->admin_model->updateUserList($profileId,$contentId,1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function removeFromList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$listId = str_replace("/CodeIgniter-3.1.10/index.php/removefromlist/","",$uri);
		$listId = strtok($listId, '/');
		$contentId = str_replace("/CodeIgniter-3.1.10/index.php/removefromlist/$listId/","",$uri);

		$this->admin_model->removeFromList($listId,$contentId);
		redirect($_SERVER['HTTP_REFERER']);

	}

	public function follow()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/follow/","",$uri);
		$profileId = strtok($profileId, '/');

		$this->admin_model->followUser($profileId,$this->session->userdata['logged_in']['user_id']);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function unfollow()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/unfollow/","",$uri);
		$profileId = strtok($profileId, '/');

		$this->admin_model->unfollowUser($profileId,$this->session->userdata['logged_in']['user_id']);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function deleteList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$listId = str_replace("/CodeIgniter-3.1.10/index.php/deletelist","",$uri);
		$listId = strtok($listId, '/');

		$this->admin_model->deleteList($listId);

		redirect(base_url()."index.php/profile/".$this->session->userdata['logged_in']['user_id']);
	}

	public function publicList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$listId = str_replace("/CodeIgniter-3.1.10/index.php/publiclist/","",$uri);

		$this->admin_model->privateList($listId,0);

		redirect($_SERVER['HTTP_REFERER']);
	}

	
	public function privateList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$listId = str_replace("/CodeIgniter-3.1.10/index.php/privatelist/","",$uri);

		$this->admin_model->privateList($listId,1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function publicprofile()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/publicprofile/","",$uri);

		$this->admin_model->privateprofile($profileId,0);

		redirect($_SERVER['HTTP_REFERER']);
	}

	
	public function privateprofile()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/privateprofile/","",$uri);

		$this->admin_model->privateprofile($profileId,1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	public function allListUser()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');

		if($uri == "/CodeIgniter-3.1.10/index.php/profile/$profileId/movielist"){
			$type = 1;
		}else if($uri == "/CodeIgniter-3.1.10/index.php/profile/$profileId/showlist"){
			$type = 2;
		}else if($uri == "/CodeIgniter-3.1.10/index.php/profile/$profileId/booklist"){
			$type = 3;
		}else if($uri == "/CodeIgniter-3.1.10/index.php/profile/$profileId/gamelist"){
			$type = 4;
		}
		$state = str_replace("/CodeIgniter-3.1.10/index.php/profile/$profileId/","",$uri);
		$ter = strtok($state, '/');
		$state = str_replace("/CodeIgniter-3.1.10/index.php/profile/$profileId/$ter/","",$uri);

		switch($ter){
			case "movielist":
				$type = 1;
				break;
			case "showlist":
				$type = 2;
				break;
			case "booklist":
				$type = 3;
				break;
			case "gamelist":
				$type = 4;
				break;
		}

		if($uri == "/CodeIgniter-3.1.10/index.php/profile/$profileId/$ter/1"){
			$state = 1;
		}else if($uri == "/CodeIgniter-3.1.10/index.php/profile/$profileId/$ter/2"){
			$state = 2;
		}else if($uri == "/CodeIgniter-3.1.10/index.php/profile/$profileId/$ter/3"){
			$state = 3;
		}else if($uri == "/CodeIgniter-3.1.10/index.php/profile/$profileId/$ter/4"){
			$state = 4;
		}


		if($state == "/CodeIgniter-3.1.10/index.php/profile/$profileId/movielist"){
			$state = 0;
		}
		$data['contentslist'] = $this->admin_model->getProfileContentList($profileId,$type,$state);
		if(!empty($data['contentslist'])){
			$data['useraddlist'] = array();
			foreach($data['contentslist'] as $id){
				$userlistexists = $this->admin_model->getuserlist($id[0]->contentId,$profileId,0);
				array_push($data['useraddlist'],$userlistexists);
			}
		}

		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);


		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
		}

		$this->load->view('login/usercontentlist',$data);

	}

	//make a user through the admin panel
	public function admin_user_registration()
	{

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/admin_stuff/add_user');
		} else {
			$data = array(
				'user_name' => $this->input->post('username'),
				'first_name' => $this->input->post('first'),
				'last_name' => $this->input->post('last'),
				'user_email' => $this->input->post('email_value'),
				'user_password' => $this->input->post('password'),
				'permissions' => $this->input->post('number_value')
			);
			$result = $this->admin_model->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('login/admin_stuff/add_user', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('login/admin_stuff/add_user', $data);
			}
		}
	}
	//uploading img
	public function do_upload()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('userfile')) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('login/admin_stuff/add_image', $error);
			
		} else {
			$data = array('upload_data' => $this->upload->data());

			$upload_data = array(
				'title' => $this->input->post('title'),
				'content_type' => $this->input->post('content_type'),
				'description' => $this->input->post('description'),
				'rating' => $this->input->post('rating'),
				'release_date' => $this->input->post('release_date'),
				'ranking' => $this->input->post('ranking'),
				'studio_id' => $this->input->post('studio_id'),
				'links' => $this->input->post('links'),
				'images' => $data["upload_data"]['file_name'],
				'altImg' =>	$this->input->post('title')
				/*'altImg' => $data["upload_data"]['file_name'],
				'imgPath' => $data["upload_data"]['file_name'],
				'imgdescricao' => $this->input->post('desc'),*/
			);
			$this->admin_model->add_image($upload_data);
			$this->load->view('login/admin_stuff/edit_image',$data);
		}
	}

	public function upload_new_image()
	{

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('avatar')) {
			$error = array('error' => $this->upload->display_errors());
			redirect($_SERVER['HTTP_REFERER']);
			
		} else {
			$data = array('upload_data' => $this->upload->data());

			$user_id = str_replace("/CodeIgniter-3.1.10/index.php/upload_new_image/","",$_SERVER['REQUEST_URI']);
			$avatar = $data["upload_data"]['file_name'];
			$this->admin_model->change_avatar($user_id,$avatar);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function upload_new_banner()
	{

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('avatar')) {
			$error = array('error' => $this->upload->display_errors());
			//redirect($_SERVER['HTTP_REFERER']);
			
		} else {
			$data = array('upload_data' => $this->upload->data());

			$user_id = str_replace("/CodeIgniter-3.1.10/index.php/upload_new_banner/","",$_SERVER['REQUEST_URI']);
			$banner = $data["upload_data"]['file_name'];
			$this->admin_model->change_banner($user_id,$banner);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function add_image()
	{
		$this->load->view('login/admin_stuff/add_image');
	}
	public function my_image()
	{
		$id = intval($_GET['id']);
		$data['sticks'] = $this->admin_model->getownimg($id);
		$this->load->view('login/admin_stuff/my_image', $data);
	}
	public function edit_image()
	{
		$data['sticks'] = $this->admin_model->getimg();
		$this->load->view('login/admin_stuff/edit_image', $data);
	}
	public function admin_info()
	{
		$profileId = $this->session->userdata['logged_in']['user_id'];
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['followprofile'] = array();

		$this->load->view('login/admin_stuff/admin_info',$data);
	}
	public function notifications()
	{
		$profileId = $this->session->userdata['logged_in']['user_id'];
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['notification'] = $this->admin_model->getallnotification($profileId);
		$data['followprofile'] = array();

		$this->load->view('login/admin_stuff/notifications',$data);
	}

	public function supportform()
	{
		$data['forms'] = $this->admin_model->getsupportforms();
		//$this->load->view('login/admin_stuff/notifications');
	}

	public function rating()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');
		
		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['rating'] = $this->admin_model->getprofileRating($profileId);
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);

		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
		}

		$this->load->view('login/rating', $data);
	}

	public function customlist()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');
		//following/follower
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);


		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
		}else{
			$data['followprofile'] = array();
		}

		$this->load->view('login/customlist', $data);
	}

	public function addusercommentprofile(){
		$review = $_GET['comment'];
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/addusercommentprofile/","",$uri);
		$profileId = strtok($profileId, '/');
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/addusercommentprofile/$profileId/userid/","",$uri);
		$user_id = strtok($user_id, '?');


		$this->admin_model->addprofilecomment($user_id,$profileId,$review);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function removesprofilecomment(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/CodeIgniter-3.1.10/index.php/removesprofilecomment/","",$uri);
		$user_id = strtok($user_id, '/');
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/removesprofilecomment/$user_id/","",$uri);
		$this->admin_model->addprofilecomment($user_id,$profileId,"fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec");
		redirect($_SERVER['HTTP_REFERER']);
	}

}
