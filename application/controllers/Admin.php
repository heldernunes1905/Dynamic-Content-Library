<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load the model  
		$this->load->model('admin_model');
		$this->load->model('model');
		$this->load->helper('date');

	}

	//add user view, gets all the user info from the table users
	public function add_user()
	{
		
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 0) {
			redirect(base_url());
		}
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/add_user',$data);
	}

	//add staff view, gets all the user info from the table staff

	public function add_staff()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('login/admin_stuff/add_staff',$data);
	}

	//add char view, gets all the user info from the table char
	public function add_characters()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();


		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/add_characters',$data);
	}

	//add genre view, gets all the user info from the table genre
	public function add_genre()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('login/admin_stuff/add_genre',$data);
	}

	//add stud view, gets all the user info from the table stud
	public function add_studio()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();


		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/add_studio',$data);
	}

	//add notif view, gets all the user info from the table notif
	public function add_notification()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();


		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/add_notification',$data);
	}

	//make notification, only admins can make notifs, and they get sent to the user selected
	public function add_not_db()
	{		
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
			$data['follow'] = $this->admin_model->getFollow($user_id);
			$data['state'] = $this->admin_model->getProfileState($user_id);
			$data['users'] = $this->admin_model->getUsers();


			$upload_data = array(
				'title' => $this->input->post('title'),
				'image' => "notif.jpg",
				'date' => date('Y-m-d H:i:s'),
				'text' => $this->input->post('text'),
				'user_id' => $this->input->post('user_id'),
				'status' => 1
			);


			$result = $this->admin_model->add_not_db($upload_data);

			if ($result == TRUE) {
				
				$data['message_display'] = 'Notification Created!';
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$data['message_display'] = 'Studio with that name already exist!';
				redirect($_SERVER['HTTP_REFERER']);
			}
	
	}
	
	//edit notif
	public function mod_not()
	{
		$data = array(
			'notification_id' => $this->input->post('notification_id'),
			'title' => $this->input->post('title'),
			'text' => $this->input->post('text'),
			'date' => date('Y-m-d H:i:s')
		);
		
		$result = $this->admin_model->edit_not($data);

		header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_notification");
		/*if ($result == TRUE) {
			$data['message_display'] = 'Registration Successfully !';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		} else {
			$data['message_display'] = 'Username already exist!';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		}*/
	}
	
	//remove user
	public function remove_user()
	{
		$id = $this->input->post('userid');
		$data = $this->admin_model->remove_user($id);
	}

	//remove staff
	public function remove_staff()
	{
		$id = $this->input->post('staff_id');
		$data = $this->admin_model->remove_staff($id);
	}

	//remove  char
	public function remove_character()
	{
		$id = $this->input->post('character_id');
		$data = $this->admin_model->remove_character($id);
	}

	//remove genre
	public function remove_genre()
	{
		$id = $this->input->post('genre_id');
		$data = $this->admin_model->remove_genre($id);
	}

	//remove studio
	public function remove_studio()
	{
		$id = $this->input->post('studio_id');
		$data = $this->admin_model->remove_studio($id);
	}

	//remove content
	public function remove_img()
	{
		$id = $this->input->post('contentId');
		$data = $this->admin_model->remove_img($id);
	}
	//change info on a user
	public function mod_user()
	{
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'username' => base64_encode($this->input->post('username')),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email' => $this->input->post('user_email'),
			'password' => base64_encode($this->input->post('password')),
			'permission' => $this->input->post('permission')
		);
		$result = $this->admin_model->edit_user($data);
		header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_user");
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

	//change staff info
	public function mod_staff()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('staffimage')) {
			$data = array('upload_data' => $this->upload->data());
				$data = array(
				'staff_id' => $this->input->post('staff_id'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'links' => $this->input->post('links'),
				'staff_type' => $this->input->post('staff_type'),
			);
		}else{
				$data = array('upload_data' => $this->upload->data());
				$data = array(
				'staff_id' => $this->input->post('staff_id'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'pictures' => $data["upload_data"]['file_name'],
				'links' => $this->input->post('links'),
				'staff_type' => $this->input->post('staff_type'),

			);
		}
		
		$result = $this->admin_model->edit_staff($data);
		header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_staff");
		/*if ($result == TRUE) {
			$data['message_display'] = 'Registration Successfully !';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		} else {
			$data['message_display'] = 'Username already exist!';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		}*/
	}


	//change char info
	public function mod_character()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('characterimage')) {
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'character_id' => $this->input->post('character_id'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),

			);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'character_id' => $this->input->post('character_id'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'pictures' => $data["upload_data"]['file_name']

			);
		}	
		
		$result = $this->admin_model->edit_character($data);
		header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_characters");
		/*if ($result == TRUE) {
			$data['message_display'] = 'Registration Successfully !';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		} else {
			$data['message_display'] = 'Username already exist!';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		}*/
	}


	//change genre info
	public function mod_genre()
	{
		$data = array(
			'genre_id' => $this->input->post('genre_id'),
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description')

		);
		
		$result = $this->admin_model->edit_genre($data);

		redirect($_SERVER['HTTP_REFERER']);
		/*if ($result == TRUE) {
			$data['message_display'] = 'Registration Successfully !';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		} else {
			$data['message_display'] = 'Username already exist!';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		}*/
	}

	//change studio info
	public function mod_studio()
	{
		$data = array(
			'studio_id' => $this->input->post('studio_id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'date_created' => $this->input->post('date_created'),
			'description' => $this->input->post('description'),
		);
		
		$result = $this->admin_model->edit_studio($data);

		redirect($_SERVER['HTTP_REFERER']);
		/*if ($result == TRUE) {
			$data['message_display'] = 'Registration Successfully !';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		} else {
			$data['message_display'] = 'Username already exist!';
			$data['users'] = $this->admin_model->getUsers();
			//$this->load->view('login/admin_stuff/add_user', $data);
		}*/
	}


	//add user to database using data inputted in form
	public function add_user_db()
	{


		$this->form_validation->set_rules('firstname', 'First name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
				$data['moviegetlist'] = $this->model->getAllMovieList();
				$data['showgetlist'] = $this->model->getAllShowList();
				$data['bookgetlist'] = $this->model->getAllBookList();
				$data['gamegetlist'] = $this->model->getAllGameList();
				$data['staffgetlist'] = $this->model->getAllStaffList();
				$data['charactergetlist'] = $this->model->getAllCharacterList();
				$data['usergetlist'] = $this->model->getAllUserList();
				$this->load->view('login/admin_stuff/add_user', $data);
		} else {

			if( $this->input->post('gender') == "other"){
				$gender =  $this->input->post('genderother');

			}else{
				$gender =  $this->input->post('gender');
			}



			$data = array(
				'email' => $this->input->post('email_value'),
				'password' => base64_encode($this->input->post('password')),
				'username' => base64_encode($this->input->post('username')),
				'first_name' => $this->input->post('firstname'),
				'last_name' => $this->input->post('lastname'),
				'birthday' => $this->input->post('birthday'),
				'gender' => $gender,
				'bio' => $this->input->post('bio'),
				'avatar' => 'default_avatar',
				'profile_banner' => 'default_banner',
				'following' => 'following',
				'profile_state' => '1',
				'permission' => $this->input->post('permissions'),
				'user_id' => $this->input->post('user_id')

			);
			$result = $this->admin_model->registration_insert($data);
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
			$data['follow'] = $this->admin_model->getFollow($user_id);
			$data['state'] = $this->admin_model->getProfileState($user_id);
			$data['users'] = $this->admin_model->getUsers();
			if ($result == TRUE) {
				$data['moviegetlist'] = $this->model->getAllMovieList();
				$data['showgetlist'] = $this->model->getAllShowList();
				$data['bookgetlist'] = $this->model->getAllBookList();
				$data['gamegetlist'] = $this->model->getAllGameList();
				$data['staffgetlist'] = $this->model->getAllStaffList();
				$data['charactergetlist'] = $this->model->getAllCharacterList();
				$data['usergetlist'] = $this->model->getAllUserList();
				$data['message_display'] = 'Registration Successfully !';
				$data['users'] = $this->admin_model->getUsers();
				$this->load->view('login/admin_stuff/add_user', $data);
			} else {
				$data['moviegetlist'] = $this->model->getAllMovieList();
				$data['showgetlist'] = $this->model->getAllShowList();
				$data['bookgetlist'] = $this->model->getAllBookList();
				$data['gamegetlist'] = $this->model->getAllGameList();
				$data['staffgetlist'] = $this->model->getAllStaffList();
				$data['charactergetlist'] = $this->model->getAllCharacterList();
				$data['usergetlist'] = $this->model->getAllUserList();
				$data['message_display'] = 'Username already exist!';
				$data['users'] = $this->admin_model->getUsers();
				$this->load->view('login/admin_stuff/add_user', $data);
			}
		}
	}

	//add staff to database using data inputted in form
	public function add_staff_db(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg|PNG';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		
		


		if (!$this->upload->do_upload('pictures')) {
			$error = array('error' => $this->upload->display_errors());
			$upload_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'pictures' => 'default.jpg',
				'links' => $this->input->post('links'),
				'description' => $this->input->post('desc'),
				'staff_type' =>	$this->input->post('staff_type')
			);
			$this->admin_model->add_staff($upload_data);

			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$data = array('upload_data' => $this->upload->data());
			$upload_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'pictures' => $data["upload_data"]['file_name'],
				'links' => $this->input->post('links'),
				'description' => $this->input->post('desc'),
				'staff_type' =>	$this->input->post('staff_type')
			);
			$this->admin_model->add_staff($upload_data);
			redirect($_SERVER['HTTP_REFERER']);

		}

	}

	//add char to database using data inputted in form
	public function add_characters_db(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg|PNG';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);

		
		
		if (!$this->upload->do_upload('pictures')) {
			$error = array('error' => $this->upload->display_errors());
			$upload_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'description' => $this->input->post('desc'),

				'pictures' => 'default.jpg'
			);
			$this->admin_model->add_characters($upload_data);
			redirect($_SERVER['HTTP_REFERER']);
			
		} else {
			$data = array('upload_data' => $this->upload->data());

			$upload_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'description' => $this->input->post('desc'),

				'pictures' => $data["upload_data"]['file_name']
			);
			$this->admin_model->add_characters($upload_data);
			redirect($_SERVER['HTTP_REFERER']);

		}

	}

	//add studio to database using data inputted in form
	public function add_studio_db(){
		
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
			$data['follow'] = $this->admin_model->getFollow($user_id);
			$data['state'] = $this->admin_model->getProfileState($user_id);
			$data['users'] = $this->admin_model->getUsers();

			$upload_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'date_created' => $this->input->post('date_created'),
				'description' => $this->input->post('description')
			);

			$result = $this->admin_model->add_studio($upload_data);

			if ($result == TRUE) {
				$data['message_display'] = 'Studio Created!';
				$this->load->view('login/admin_stuff/add_studio',$data);
			} else {
				$data['message_display'] = 'Studio with that name already exist!';
				$this->load->view('login/admin_stuff/add_studio',$data);
			}
	}

	//add genre to database using data inputted in form
	public function add_genre_db(){
		
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();

		$upload_data = array(
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description')
		);

		$result = $this->admin_model->add_genre($upload_data);

		if ($result == TRUE) {
			$data['message_display'] = 'Genre Created!';
			$this->load->view('login/admin_stuff/add_genre',$data);
		} else {
			$data['message_display'] = 'Genre with that name already exist!';
			$this->load->view('login/admin_stuff/add_genre',$data);
		}
}


	//add custom list to database using data inputted in form
	public function newcustomlist()
	{

		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg|PNG';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('image')) {
			if(empty($this->input->post('content_id'))){
				$data = array(
					'title' => $this->input->post('title'),
					'image' => "default.jpg",
					'list_public' => $this->input->post('list_public'),
					'user_id' => $this->session->userdata['logged_in']['user_id'],
					'list_type' => 5
				);
			}else{
				$data = array(
					'title' => $this->input->post('title'),
					'image' => "default.jpg",
					'list_public' => $this->input->post('list_public'),
					'user_id' => $this->session->userdata['logged_in']['user_id'],
					'content_id' => $this->input->post('content_id'),
					'list_type' => 5
				);
			}
			$result = $this->admin_model->add_list($data);

			redirect($_SERVER['HTTP_REFERER']);
			
		} else {
			$data = array('upload_data' => $this->upload->data());

			if(empty($this->input->post('content_id'))){
				$data = array(
					'title' => $this->input->post('title'),
					'image' => $data["upload_data"]['file_name'],
					'list_public' => $this->input->post('list_public'),
					'user_id' => $this->session->userdata['logged_in']['user_id'],
					'list_type' => 5
				);
			}else{
				$data = array(
					'title' => $this->input->post('title'),
					'image' => $data["upload_data"]['file_name'],
					'list_public' => $this->input->post('list_public'),
					'user_id' => $this->session->userdata['logged_in']['user_id'],
					'content_id' => $this->input->post('content_id'),
					'list_type' => 5
				);
			}

			
			$result = $this->admin_model->add_list($data);
	
			redirect($_SERVER['HTTP_REFERER']);
		}
		

	}

	//edit content using inputted data
	public function mod_img()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('contentimage')) {
			$data = array('upload_data' => $this->upload->data());

			$studio_id = $this->admin_model->getStudioId($this->input->post('studio_id'));
			$data_upload = array(
				'title' => $this->input->post('title'),
				'content_type' => $this->input->post('content_type'),
				'description' => $this->input->post('description'),
				'rating' => $this->input->post('rating'),
				'release_date' => $this->input->post('release_date'),
				'ranking' => $this->input->post('ranking'),
				'studio_id' => $studio_id[0]->studio_id,
				'links' => $this->input->post('links'),
				'contentId' => $this->input->post('contentId'),
				'duration' =>	$this->input->post('duration'),
				'ep_number' =>	$this->input->post('ep_number')
				
			);
		}else{
			$data = array('upload_data' => $this->upload->data());

			$studio_id = $this->admin_model->getStudioId($this->input->post('studio_id'));
			$data_upload = array(
				'title' => $this->input->post('title'),
				'content_type' => $this->input->post('content_type'),
				'description' => $this->input->post('description'),
				'rating' => $this->input->post('rating'),
				'release_date' => $this->input->post('release_date'),
				'ranking' => $this->input->post('ranking'),
				'studio_id' => $studio_id[0]->studio_id,
				'links' => $this->input->post('links'),
				'images' => $data["upload_data"]['file_name'],
				'contentId' => $this->input->post('contentId'),
				'duration' =>	$this->input->post('duration'),
				'ep_number' =>	$this->input->post('ep_number')
				
			);
		}
		$result = $this->admin_model->edit_image($data_upload);
		header("Location: http://localhost/Dynamic-Content-Library-main/index.php/edit_image");
	}


	//data on the user logged in
	public function update_user()
	{

		if ($this->input->post('permission') == 0) {
			$data = array(
				'email' => $this->input->post('user_email'),
				'password' => base64_encode($this->input->post('password')),
				'username' => base64_encode($this->input->post('username')),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'gender' => $this->input->post('gender'),
				'bio' => $this->input->post('bio'),
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
				'password' => base64_encode($this->input->post('password')),
				'username' => base64_encode($this->input->post('username')),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'birthday' => $this->input->post('birthday'),
				'gender' => $this->input->post('gender'),
				'bio' => $this->input->post('bio'),
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



	//edit user page
	public function edit_user()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/edit_user', $data);
	}

	//edit staff view page
	public function edit_staff()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['staffs'] = $this->admin_model->getAllStaff();

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/edit_staff', $data);
	}

	//edit char view page
	public function edit_characters()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['characters'] = $this->admin_model->getAllCharacter();

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/edit_character', $data);
	}


	//edit genre view page
	public function edit_genre()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['genre'] = $this->admin_model->getAllGenre();

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/edit_genre', $data);
	}


	//edit studio view page
	public function edit_studio()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['studio'] = $this->admin_model->getAllstudio();

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/edit_studio', $data);
	}


	//update content to user list
	public function addToList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/additemlist/","",$uri);
		$profileId = strtok($profileId, '/');
		$contentId = str_replace("/Dynamic-Content-Library-main/index.php/additemlist/$profileId/","",$uri);

		$this->admin_model->updateUserList($profileId,$contentId,0);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove comment from user from profile/staff/character
	public function removeusercomment(){
		$uri = $_SERVER['REQUEST_URI']; 
		$commentId = str_replace("/Dynamic-Content-Library-main/index.php/removeusercomment/","",$uri);
		$commentId = strtok($commentId, '/');

		$this->admin_model->removeusercomment($commentId);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove recom left by user
	public function removeuserrecommendation(){
		$uri = $_SERVER['REQUEST_URI']; 
		$recId = str_replace("/Dynamic-Content-Library-main/index.php/removeuserrecommendation/","",$uri);
		$recId = strtok($recId, '/');

		$this->admin_model->removeuserrecommendation($recId);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//add user recommendation
	public function addrecom()
	{
		$data = array(
			'user_id' => $this->session->userdata['logged_in']['user_id'],
			'select-array' => $this->input->post('select-array'),
			'content_id_chose' => $this->input->post('input-1'),
			'content_id_chose_recommended' => $this->input->post('input-2'),
			'description' => $this->input->post('description'),
			'date' => date('Y-m-d H:i:s')
			);
		var_dump($data);
	}

	//remove content from custom list
	public function removeitemlist()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/removeitemlist/","",$uri);
		$profileId = strtok($profileId, '/');
		$contentId = str_replace("/Dynamic-Content-Library-main/index.php/removeitemlist/$profileId/","",$uri);

		$this->admin_model->updateUserList($profileId,$contentId,1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove from userlist
	public function removeFromList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$listId = str_replace("/Dynamic-Content-Library-main/index.php/removefromlist/","",$uri);
		$listId = strtok($listId, '/');
		$contentId = str_replace("/Dynamic-Content-Library-main/index.php/removefromlist/$listId/","",$uri);

		$this->admin_model->removeFromList($listId,$contentId);
		redirect($_SERVER['HTTP_REFERER']);

	}

	//follow user
	public function follow()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/follow/","",$uri);
		$profileId = strtok($profileId, '/');

		$this->admin_model->followUser($profileId,$this->session->userdata['logged_in']['user_id']);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//unfollow user
	public function unfollow()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/unfollow/","",$uri);
		$profileId = strtok($profileId, '/');

		$this->admin_model->unfollowUser($profileId,$this->session->userdata['logged_in']['user_id']);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//block user, blocked user cannot view profile
	public function block()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/block/","",$uri);
		$profileId = strtok($profileId, '/');

		$this->admin_model->blockUser($profileId,$this->session->userdata['logged_in']['user_id']);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//unblock user
	public function unblock()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/unblock/","",$uri);
		$profileId = strtok($profileId, '/');

		$this->admin_model->unblockUser($profileId,$this->session->userdata['logged_in']['user_id']);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//delete custom list
	public function deleteList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$listId = str_replace("/Dynamic-Content-Library-main/index.php/deletelist","",$uri);
		$listId = strtok($listId, '/');

		$this->admin_model->deleteList($listId);

		redirect(base_url()."index.php/profile/".$this->session->userdata['logged_in']['user_id']);
	}

	//make custom list public
	public function publicList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$listId = str_replace("/Dynamic-Content-Library-main/index.php/publiclist/","",$uri);

		$this->admin_model->privateList($listId,0);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//make custom list private, only owner can view it
	public function privateList()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$listId = str_replace("/Dynamic-Content-Library-main/index.php/privatelist/","",$uri);

		$this->admin_model->privateList($listId,1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//make profile public
	public function publicprofile()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/publicprofile/","",$uri);

		$this->admin_model->privateprofile($profileId,0);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//make profile private, noone can accessit
	public function privateprofile()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/privateprofile/","",$uri);

		$this->admin_model->privateprofile($profileId,1);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//get watchlist for user
	public function allListUser()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');

		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}


		//verify the watchlist selected
		if($uri == "/Dynamic-Content-Library-main/index.php/profile/$profileId/movielist"){
			$type = 1;
		}else if($uri == "/Dynamic-Content-Library-main/index.php/profile/$profileId/showlist"){
			$type = 2;
		}else if($uri == "/Dynamic-Content-Library-main/index.php/profile/$profileId/booklist"){
			$type = 3;
		}else if($uri == "/Dynamic-Content-Library-main/index.php/profile/$profileId/gamelist"){
			$type = 4;
		}
		$state = str_replace("/Dynamic-Content-Library-main/index.php/profile/$profileId/","",$uri);
		$ter = strtok($state, '/');
		$state = str_replace("/Dynamic-Content-Library-main/index.php/profile/$profileId/$ter/","",$uri);
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

		//verify the state of the list selected

		if($uri == "/Dynamic-Content-Library-main/index.php/profile/$profileId/$ter/1"){
			$state = 1;
		}else if($uri == "/Dynamic-Content-Library-main/index.php/profile/$profileId/$ter/2"){
			$state = 2;
		}else if($uri == "/Dynamic-Content-Library-main/index.php/profile/$profileId/$ter/3"){
			$state = 3;
		}else if($uri == "/Dynamic-Content-Library-main/index.php/profile/$profileId/$ter/4"){
			$state = 4;
		}


		if($state == "/Dynamic-Content-Library-main/index.php/profile/$profileId/movielist"){
			$state = 0;
		}

		//contentlist
		$data['contentslist'] = $this->admin_model->getProfileContentList($profileId,$type,$state);
		if(!empty($data['contentslist'])){
			$data['useraddlist'] = array();
			foreach($data['contentslist'] as $id){
				$userlistexists = $this->admin_model->getuserlist($id[0]->contentId,$profileId,$type);

				array_push($data['useraddlist'],$userlistexists);
			}
		}


		//header stuff
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);


		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
			$data['checkpreferenceslike'] = $this->model->getPreferencesLikeContent($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislikeContent($this->session->userdata['logged_in']['user_id']);
			$data['checkblockeduser'] = $this->admin_model->getBlockedUser($this->session->userdata['logged_in']['user_id']);
			$data['checkuserblocked'] = $this->admin_model->getcheckuserblocked($profileId);



		}

		//topnav search 
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

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

			$data = array('upload_data' => $this->upload->data());
			$studio_id = $this->admin_model->getStudioId($this->input->post('studio_id'));

			$upload_data = array(
				'title' => $this->input->post('title'),
				'content_type' => $this->input->post('content_type'),
				'description' => $this->input->post('description'),
				'rating' => $this->input->post('rating'),
				'release_date' => $this->input->post('release_date'),
				'ranking' => $this->input->post('ranking'),
				'studio_id' => $studio_id[0]->studio_id,
				'links' => $this->input->post('links'),
				'images' => "default.jpg",
				'altImg' =>	$this->input->post('title'),
				'duration' =>	$this->input->post('duration'),
				'ep_number' =>	$this->input->post('ep_number')
				/*'altImg' => $data["upload_data"]['file_name'],
				'imgPath' => $data["upload_data"]['file_name'],
				'imgdescricao' => $this->input->post('desc'),*/
			);
			$this->admin_model->add_image($upload_data);
			
		} else {
			$data = array('upload_data' => $this->upload->data());
			$studio_id = $this->admin_model->getStudioId($this->input->post('studio_id'));

			$upload_data = array(
				'title' => $this->input->post('title'),
				'content_type' => $this->input->post('content_type'),
				'description' => $this->input->post('description'),
				'rating' => $this->input->post('rating'),
				'release_date' => $this->input->post('release_date'),
				'ranking' => $this->input->post('ranking'),
				'studio_id' => $studio_id[0]->studio_id,
				'links' => $this->input->post('links'),
				'images' => $data["upload_data"]['file_name'],
				'altImg' =>	$this->input->post('title'),
				'duration' =>	$this->input->post('duration'),
				'ep_number' =>	$this->input->post('ep_number')


				/*'altImg' => $data["upload_data"]['file_name'],
				'imgPath' => $data["upload_data"]['file_name'],
				'imgdescricao' => $this->input->post('desc'),*/
			);

			
			$this->admin_model->add_image($upload_data);

		}
		$upload_data_staff = array(
			'title' => $this->input->post('title'),
			'content_type' => $this->input->post('content_type'),
			'description' => $this->input->post('description'),
			'rating' => $this->input->post('rating'),
			'release_date' => $this->input->post('release_date'),
			'duration' =>	$this->input->post('duration'),
			'ep_number' =>	$this->input->post('ep_number'),
			'genres' =>	$this->input->post('genres'),
			'characters' =>	$this->input->post('characters'),
			'staff' =>	$this->input->post('staff')
		);

		$this->admin_model->add_staff_char_content($upload_data_staff);
		redirect($_SERVER['HTTP_REFERER']);

	}

	//change profile avatar
	public function upload_new_image()
	{

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg|PNG';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('avatar')) {
			$error = array('error' => $this->upload->display_errors());
			redirect($_SERVER['HTTP_REFERER']);
			
		} else {
			$data = array('upload_data' => $this->upload->data());

			$user_id = str_replace("/Dynamic-Content-Library-main/index.php/upload_new_avatar/","",$_SERVER['REQUEST_URI']);
			$avatar = $data["upload_data"]['file_name'];
			$this->admin_model->change_avatar($user_id,$avatar);
			redirect($_SERVER['HTTP_REFERER']);
		}

	}

	//change profile banner
	public function upload_new_banner()
	{

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png|webp|jpeg|PNG';
		$config['max_size']             = 3000;
		$config['max_width']            = 1920;
		$config['max_height']           = 1080;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload('avatar')) {
			$error = array('error' => $this->upload->display_errors());
			redirect($_SERVER['HTTP_REFERER']);
			
		} else {
			$data = array('upload_data' => $this->upload->data());

			$user_id = str_replace("/Dynamic-Content-Library-main/index.php/upload_new_banner/","",$_SERVER['REQUEST_URI']);
			$banner = $data["upload_data"]['file_name'];
			$this->admin_model->change_banner($user_id,$banner);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	//add content form page
	public function add_image()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();
		$data['studios'] = $this->admin_model->getSudios();


		$data['genre'] = $this->admin_model->getGenres();
		$data['staff'] = $this->admin_model->getStaff();
		$data['character'] = $this->admin_model->getCharacter();


		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/add_image',$data);
	}


	public function my_image()
	{
		$id = intval($_GET['id']);
		$data['sticks'] = $this->admin_model->getownimg($id);
		$this->load->view('login/admin_stuff/my_image', $data);
	}


	//edit content view page
	public function edit_image()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		$data['sticks'] = $this->admin_model->getimg();
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$data['followprofile'] = $this->admin_model->followprofile($user_id,$user_id);
		$data['follow'] = $this->admin_model->getFollow($user_id);
		$data['state'] = $this->admin_model->getProfileState($user_id);
		$data['users'] = $this->admin_model->getUsers();
		$data['studios'] = $this->admin_model->getSudios();

		

		$data['genre'] = $this->admin_model->getGenres();
		$data['staff'] = $this->admin_model->getStaff();
		$data['character'] = $this->admin_model->getCharacter();


		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('login/admin_stuff/edit_image', $data);
	}

	//allow user to change their info
	public function admin_info()
	{

		if (!isset($this->session->userdata['logged_in'])) {
			redirect(base_url());
		}

		$profileId = $this->session->userdata['logged_in']['user_id'];
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['followprofile'] = array();

		
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		$data['checkuserblocked'] = $this->admin_model->getcheckuserblocked($profileId);


		$this->load->view('login/admin_stuff/admin_info',$data);
	}

	//notifications editing page
	public function notifications()
	{
		if (!isset($this->session->userdata['logged_in']) || $this->session->userdata['logged_in']['permission'] == 1) {
			redirect(base_url());
		}
		
		$profileId = $this->session->userdata['logged_in']['user_id'];
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['notification'] = $this->admin_model->getallnotification($profileId);
		$data['followprofile'] = array();

		
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/admin_stuff/notifications',$data);
	}

	//see support tickets sent
	public function supportform()
	{
		$data['forms'] = $this->admin_model->getsupportforms();
		$profileId = $this->session->userdata['logged_in']['user_id'];
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['supporttickets'] = $this->admin_model->getSupportTickets($profileId);
		$data['checkuserblocked'] = $this->admin_model->getcheckuserblocked($profileId);

		$data['followprofile'] = array();

		$this->load->view('login/support',$data);
	}

	//support form page
	public function forms()
	{
		$data['forms'] = $this->admin_model->getsupportforms();
		$profileId = $this->session->userdata['logged_in']['user_id'];
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['supporttickets'] = $this->admin_model->getAllsupport();
		$data['followprofile'] = array();

		
		$this->load->view('login/support',$data);
	}

	//support form users sent
	public function supportformuser()
	{


		$profileId = $this->session->userdata['logged_in']['user_id'];
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['followprofile'] = array();
		$data['notification'] = $this->admin_model->getNotification($this->session->userdata['logged_in']['user_id']);


		$this->load->view('login/supportform',$data);
	}

	//create support ticket from info uploaded
	public function addSupportTicket()
	{
		$profileId = $this->session->userdata['logged_in']['user_id'];

		$support_ticket = array(
			'user_id' => $profileId,
			'type' => $this->input->post('type'),
			'content_type' => $this->input->post('content_type'),
			'title' => $this->input->post('title'),
			'text' => $this->input->post('text'),
			'link' => $this->input->post('link'),
			'date' => date('Y-m-d H:i:s'),
			'status' => 1
		);
		$result = $this->admin_model->sendsupportticket($support_ticket);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove ticket
	public function removeTicket(){
		$uri = $_SERVER['REQUEST_URI']; 
		$ticketId = str_replace("/Dynamic-Content-Library-main/index.php/removeTicket/","",$uri);
		$ticketId = strtok($ticketId, '/');
		

		$this->admin_model->removeTicket($ticketId);

		redirect($_SERVER['HTTP_REFERER']);
	}


	//report user, only another user can do this, it basically sends a ticket with prefilled fields
	public function report()
	{

		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/report/","",$uri);

		$support_ticket = array(
			'user_id' => $this->session->userdata['logged_in']['user_id'],
			'type' => 3,
			'content_type' => $this->input->post('content_type'),
			'title' => $this->input->post('title'),
			'text' => $this->input->post('text'),
			'link' => 'http://localhost/Dynamic-Content-Library-main/index.php/profile/'.$profileId,
			'date' => date('Y-m-d H:i:s'),
			'status' => 1
		);
		var_dump($support_ticket);
		$result = $this->admin_model->sendsupportticket($support_ticket);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//delete support ticket
	public function deleteTicket(){
		$uri = $_SERVER['REQUEST_URI']; 
		$ticketId = str_replace("/Dynamic-Content-Library-main/index.php/deleteTicket/","",$uri);
		$ticketId = strtok($ticketId, '/');
		

		$this->admin_model->deleteTicket($ticketId);

		redirect($_SERVER['HTTP_REFERER']);
	}


	//recoms by user
	public function rating()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');

		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}

		
		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['rating'] = $this->admin_model->getprofileRating($profileId);
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);

		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
			$data['checkpreferenceslike'] = $this->admin_model->getPreferencesLikeUser($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->admin_model->getPreferencesDislikeUser($this->session->userdata['logged_in']['user_id']);
			$data['checkblockeduser'] = $this->admin_model->getBlockedUser($this->session->userdata['logged_in']['user_id']);
			$data['checkuserblocked'] = $this->admin_model->getcheckuserblocked($profileId);
		}


		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		$this->load->view('login/rating', $data);
	}

	//custom list page, just shows the list of custom list user made
	public function customlist()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');
		//following/follower
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);

		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}


		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
			$data['checkpreferenceslike'] = $this->admin_model->getPreferencesLikeUser($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->admin_model->getPreferencesDislikeUser($this->session->userdata['logged_in']['user_id']);
			$data['checkblockeduser'] = $this->admin_model->getBlockedUser($this->session->userdata['logged_in']['user_id']);
			$data['checkuserblocked'] = $this->admin_model->getcheckuserblocked($profileId);

		}else{
			$data['followprofile'] = array();
		}
		
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		
		$this->load->view('login/customlist', $data);
	}

	//add comment to profile after filling out form
	public function addusercommentprofile(){
		$review = $_GET['comment'];
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/addusercommentprofile/","",$uri);
		$profileId = strtok($profileId, '/');
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/addusercommentprofile/$profileId/userid/","",$uri);
		$user_id = strtok($user_id, '?');


		$this->admin_model->addprofilecomment($user_id,$profileId,$review);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove comment from profile of a nother user
	public function removesprofilecomment(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/removesprofilecomment/","",$uri);
		$user_id = strtok($user_id, '/');
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/removesprofilecomment/$user_id/","",$uri);
		$this->admin_model->addprofilecomment($user_id,$profileId,"fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec");
		redirect($_SERVER['HTTP_REFERER']);
	}


	//recom page in another user
	public function recommendations()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');

		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}

		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['rating'] = $this->admin_model->getprofileRating($profileId);
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);

		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
			$data['checkpreferenceslike'] = $this->admin_model->getPreferencesLikeUser($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->admin_model->getPreferencesDislikeUser($this->session->userdata['logged_in']['user_id']);
			$data['checkblockeduser'] = $this->admin_model->getBlockedUser($this->session->userdata['logged_in']['user_id']);
			$data['checkuserblocked'] = $this->admin_model->getcheckuserblocked($profileId);

		}

		$data['userrecommendation'] = $this->admin_model->getUserRecom($profileId);
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		
		$this->load->view('login/userrecommendation',$data);
	}


	
	public function adminpanel(){
		$this->load->view('login/admin_stuff/adminpanel');
	}
}
