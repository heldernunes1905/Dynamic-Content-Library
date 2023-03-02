<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load the model  
		$this->load->model('login_model');
		$this->load->model('admin_model');
		$this->load->library('unit_test');

	}

	public function index()
	{

		$this->load->view('login/login_view');
	}

	public function profile()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
		$data['contents'] = $this->admin_model->getProfileList($profileId);

		$data['likecontent'] = $this->admin_model->getStaffLike($profileId,0,1);
		$data['likegenre'] = $this->admin_model->getStaffLike($profileId,0,2);
		$data['likecharacters'] = $this->admin_model->getStaffLike($profileId,0,3);
		$data['likestudios'] = $this->admin_model->getStaffLike($profileId,0,4);

		//change values on these to show correct staff type
		$data['likeproducer'] = $this->admin_model->getStaffLike($profileId,1,5);
		$data['likewriter'] = $this->admin_model->getStaffLike($profileId,2,5);
		$data['likeactor'] = $this->admin_model->getStaffLike($profileId,3,5);

		//comments

		//following/follower
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);


		$data['personalcomment'] = array();

		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['personalcomment'] = $this->admin_model->personalcommentprofile($profileId,$user_id);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
		}

		$data['commentprofile'] = $this->admin_model->getCommentsProfile($profileId,$data['personalcomment']);


		$this->load->view('login/profile',$data);
	}

	public function following()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');

		//following/follower
		$data['follows'] = $this->admin_model->getFollows($profileId,0);

		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['rating'] = $this->admin_model->getprofileRating($profileId);
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);

		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
		}
		$this->load->view('login/follows',$data);
	}

	public function follower()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');

		//following/follower
		$data['follows'] = $this->admin_model->getFollows($profileId,1);

		$data['contents'] = $this->admin_model->getProfileList($profileId);
		$data['rating'] = $this->admin_model->getprofileRating($profileId);
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);

		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
		}
		$this->load->view('login/follows',$data);
	}

	public function comment()
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

		$data['usercomments'] = $this->admin_model->getUserComments($profileId);

		
		$this->load->view('login/usercomments',$data);
	}


	public function profilelist()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');
		$listId = str_replace("/CodeIgniter-3.1.10/index.php/profile/$profileId/list/","",$uri);
		$data['contentslist'] = $this->admin_model->getListContent($profileId,$listId);
		$data['useraddlist'] = array();
			foreach($data['contentslist'] as $id){
				$userlistexists = $this->admin_model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],0);
				array_push($data['useraddlist'],$userlistexists);
		}
		
		$data['liststate'] = $this->admin_model->getListState($listId);
		//following/follower
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);
		$data['contents'] = $this->admin_model->getProfileList($profileId);


		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
		}
		$this->load->view('list/profilelist',$data);
	}

	// Show registration page
	public function user_registration_show()
	{
		$this->load->view('login/registration_form');
	}


	// Validate and store registration data in database
	public function new_user_registration()
	{
		//test to see if email was inserted
		/*$test = $this->input->post('email_value');
		$expected_result = 'a';
		$test_name = 'Check email was inserted';
		echo $this->unit->run($test, $expected_result, $test_name);
		 */

		
		//test to see if password was inserted
		/*$test = $this->input->post('password');
		$expected_result = '';
		$test_name = 'Check email was inserted';
		echo $this->unit->run($test, $expected_result, $test_name);
		*/

		//test to see if user inserted correct data to form
		/*$test = $this->input->post('email_value');
		$expected_result = 'a@a.com';
		$test_name = 'check user inserted correct data to form';
		echo $this->unit->run($test, $expected_result, $test_name);*/
		
		
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', 'LastName', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login/registration_form');
		} else {
			$data = array(
				'email' => $this->input->post('email_value'),
				'password' => $this->input->post('password'),
				'username' => $this->input->post('username'),
				'first_name' => $this->input->post('firstname'),
				'last_name' => $this->input->post('lastname'),
				'birthday' => 'birthday',
				'gender' => 'gender',
				'bio' => 'vio',
				'avatar' => 'avatar',
				'profile_banner' => 'profile_banner',
				'following' => 'following',
				'profile_state' => 'profile_state',
				'permission' => '1'
			);
			$result = $this->login_model->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('login/login_view', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('login/registration_form', $data);
			}

			
		}
		
	}
	// Check for user login process
	public function user_login_process()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if (isset($this->session->userdata['logged_in'])) {
				$this->load->view('login/admin_page');
			} else {

				$this->load->view('login/login_view');
			}
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$result = $this->login_model->login($data);
			if ($result == TRUE) {

				$username = $this->input->post('username');
				$result = $this->login_model->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'user_id' => $result[0]->user_id,
						'username' => $result[0]->username,
						'email' => $result[0]->email,
						'first_name' => $result[0]->first_name,
						'last_name' => $result[0]->last_name,
						'birthday' => $result[0]->birthday,
						'gender' => $result[0]->gender,
						'bio' => $result[0]->bio,
						'avatar' => $result[0]->avatar,
						'profile_banner' => $result[0]->profile_banner,
						'following' => $result[0]->following,
						'profile_state' => $result[0]->profile_state,
						'permission' => $result[0]->permission

					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$permissions = $this->login_model->getpermissions();
					if ($permissions[0]->permission == 1) {
						redirect($_SERVER['HTTP_REFERER']);					
					} else {
						redirect($_SERVER['HTTP_REFERER']);						

					}
				}
			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login/profile', $data);
			}
		}
	}

	// Logout from admin page
	public function logout()
	{

		// Removing session data
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		redirect('/Welcome/index');
		
	}
}
