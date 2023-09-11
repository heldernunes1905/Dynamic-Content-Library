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
		$this->load->model('model');
		$this->load->library('unit_test');
		$this->load->helper('date');

	}

	public function index()
	{

		$this->load->view('login/login_view');
	}

	//get all info related to profile
	public function profile()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$data['contents'] = $this->admin_model->getProfileList($profileId);

		

		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}


		//following/follower
		$data['follow'] = $this->admin_model->getFollow($profileId);
		$data['state'] = $this->admin_model->getProfileState($profileId);


		$data['personalcomment'] = array();

		//logged in cahn follow, leave comment, block and like/dislike user
		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['personalcomment'] = $this->admin_model->personalcommentprofile($profileId,$user_id);
			$data['followprofile'] = $this->admin_model->followprofile($user_id,$profileId);
			$data['checkpreferenceslike'] = $this->admin_model->getPreferencesLikeUser($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->admin_model->getPreferencesDislikeUser($this->session->userdata['logged_in']['user_id']);
			$data['checkblockeduser'] = $this->admin_model->getBlockedUser($this->session->userdata['logged_in']['user_id']);
			$data['checkuserblocked'] = $this->admin_model->getcheckuserblocked($profileId);

			//var_dump($data['checkpreferenceslike']);
		}

		$data['commentprofile'] = $this->admin_model->getCommentsProfile($profileId,$data['personalcomment']);
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('login/profile',$data);
	}


	//get following list in a particular profile
	public function following()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
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
		
		$this->load->view('login/follows',$data);
	}

	//list of followers
	public function follower()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
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
		$this->load->view('login/follows',$data);
	}

	//comments left by a user
	public function comment()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');
		$type = str_replace("/Dynamic-Content-Library-main/index.php/profile/$profileId/comments/","",$uri);

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

		if($type == 4){
			$data['usercomments'] = $this->admin_model->getUserCommentForum($profileId,$type);
		}else{
			$data['usercomments'] = $this->admin_model->getUserComments($profileId,$type);

		}
		
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		
		$this->load->view('login/usercomments',$data);
	}


	//liksed list
	public function liked()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');

		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}

		$data['likecontent'] = $this->admin_model->getStaffLike($profileId,0,1);
		$data['likegenre'] = $this->admin_model->getStaffLike($profileId,0,2);
		$data['likecharacters'] = $this->admin_model->getStaffLike($profileId,0,3);
		$data['likestudios'] = $this->admin_model->getStaffLike($profileId,0,4);

		//change values on these to show correct staff type
		$data['likeproducer'] = $this->admin_model->getStaffLike($profileId,1,5);
		$data['likewriter'] = $this->admin_model->getStaffLike($profileId,2,5);
		$data['likeactor'] = $this->admin_model->getStaffLike($profileId,3,5);

		//UserLike
		$data['likeuser'] = $this->admin_model->getStaffLike($profileId,0,6);

		//following/follower
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

		$this->load->view('login/liked',$data);
	}

	//navbar in liked list
	public function likednumber()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');
		$searchtype = str_replace("/Dynamic-Content-Library-main/index.php/profile/$profileId/liked/","",$uri);
		$searchtype = strtok($searchtype, '/');
		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}

		if($searchtype == 1){
			$data['likecontent'] = $this->admin_model->getStaffLike($profileId,0,1);

		}else if($searchtype == 2){
			$data['likegenre'] = $this->admin_model->getStaffLike($profileId,0,2);

		}else if($searchtype == 3){
			$data['likecharacters'] = $this->admin_model->getStaffLike($profileId,0,3);

		}else if($searchtype == 4){
			$data['likestudios'] = $this->admin_model->getStaffLike($profileId,0,4);

		}else if($searchtype == 5){
			$data['likeproducer'] = $this->admin_model->getStaffLike($profileId,1,5);

		}else if($searchtype == 6){
			$data['likewriter'] = $this->admin_model->getStaffLike($profileId,2,5);

		}else if($searchtype == 7){
			$data['likeactor'] = $this->admin_model->getStaffLike($profileId,3,5);

		}else if($searchtype == 8){
			$data['likeuser'] = $this->admin_model->getStaffLike($profileId,0,6);

		}

		//following/follower
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

		$this->load->view('login/liked',$data);
	}


	//disliked list
	public function disliked()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');

		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}
		
		$data['likecontent'] = $this->admin_model->getStaffDislike($profileId,0,1);
		$data['likegenre'] = $this->admin_model->getStaffDislike($profileId,0,2);
		$data['likecharacters'] = $this->admin_model->getStaffDislike($profileId,0,3);
		$data['likestudios'] = $this->admin_model->getStaffDislike($profileId,0,4);

		//change values on these to show correct staff type
		$data['likeproducer'] = $this->admin_model->getStaffDislike($profileId,1,5);
		$data['likewriter'] = $this->admin_model->getStaffDislike($profileId,2,5);
		$data['likeactor'] = $this->admin_model->getStaffDislike($profileId,3,5);


		//UserLike
		$data['likeuser'] = $this->admin_model->getStaffDislike($profileId,0,6);


		//following/follower
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

		$this->load->view('login/disliked',$data);
	}

	//navbar in disliked
	public function dislikednumber()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');
		$searchtype = str_replace("/Dynamic-Content-Library-main/index.php/profile/$profileId/disliked/","",$uri);
		$searchtype = strtok($searchtype, '/');


		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}
		
		if($searchtype == 1){
			$data['likecontent'] = $this->admin_model->getStaffDislike($profileId,0,1);

		}else if($searchtype == 2){
			$data['likegenre'] = $this->admin_model->getStaffDislike($profileId,0,2);

		}else if($searchtype == 3){
			$data['likecharacters'] = $this->admin_model->getStaffDislike($profileId,0,3);

		}else if($searchtype == 4){
			$data['likestudios'] = $this->admin_model->getStaffDislike($profileId,0,4);

		}else if($searchtype == 5){
			$data['likeproducer'] = $this->admin_model->getStaffDislike($profileId,1,5);

		}else if($searchtype == 6){
			$data['likewriter'] = $this->admin_model->getStaffDisLike($profileId,2,5);

		}else if($searchtype == 7){
			$data['likeactor'] = $this->admin_model->getStaffDislike($profileId,3,5);

		}else if($searchtype == 8){
			$data['likeuser'] = $this->admin_model->getStaffDislike($profileId,0,6);

		}

		//following/follower
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

		$this->load->view('login/disliked',$data);
	}

	//watchlist in profile, gets all the content in the list of the user we are viewing
	public function profilelist()
	{
		$uri = $_SERVER['REQUEST_URI']; 
		$profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
		$profileId = strtok($profileId, '/');
		$listId = str_replace("/Dynamic-Content-Library-main/index.php/profile/$profileId/list/","",$uri);
		//check if user exits in database
		$data['existsprofile'] = $this->admin_model->getExistsProfile($profileId);


		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}

		$data['contentslist'] = $this->admin_model->getListContent($profileId,$listId);

		$data['useraddlist'] = array();
		if(!empty($data['contentslist'])){
			foreach($data['contentslist'] as $id){
				$userlistexists = $this->admin_model->getuserlist($id[0]->contentId,$profileId,0);
				array_push($data['useraddlist'],$userlistexists);
			}
		}
			
		
		$data['liststate'] = $this->admin_model->getListState($listId);
		//following/follower
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

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		
		$this->load->view('list/profilelist',$data);
	}

	// Show registration page
	public function user_registration_show()
	{
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		$this->load->view('login/registration_form',$data);
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

		//if something is wrong it sends whats wrong else it continues to validate
		if ($this->form_validation->run() == FALSE) {
				$data['moviegetlist'] = $this->model->getAllMovieList();
				$data['showgetlist'] = $this->model->getAllShowList();
				$data['bookgetlist'] = $this->model->getAllBookList();
				$data['gamegetlist'] = $this->model->getAllGameList();
				$data['staffgetlist'] = $this->model->getAllStaffList();
				$data['charactergetlist'] = $this->model->getAllCharacterList();
				$data['usergetlist'] = $this->model->getAllUserList();
				$this->load->view('login/registration_form', $data);
		} else {

			//check gender select
			if( $this->input->post('gender') == "other"){
				$gender =  $this->input->post('genderother');

			}else{
				$gender =  $this->input->post('gender');
			}

			//create array with all info
			$data = array(
				'email' => $this->input->post('email_value'),
				'password' => base64_encode($this->input->post('password')),
				'username' => base64_encode($this->input->post('username')),
				'first_name' => $this->input->post('firstname'),
				'last_name' => $this->input->post('lastname'),
				'birthday' => $this->input->post('birthday'),
				'gender' => $gender,
				'bio' => $this->input->post('bio'),
				'avatar' => 'default.jpg',
				'profile_banner' => 'default.jpg',
				'following' => 'following',
				'profile_state' => $this->input->post('profile_state'),
				'permission' => '1'
			);


			$result = $this->login_model->registration_insert($data);
			if ($result == TRUE) {
				$data['moviegetlist'] = $this->model->getAllMovieList();
				$data['showgetlist'] = $this->model->getAllShowList();
				$data['bookgetlist'] = $this->model->getAllBookList();
				$data['gamegetlist'] = $this->model->getAllGameList();
				$data['staffgetlist'] = $this->model->getAllStaffList();
				$data['charactergetlist'] = $this->model->getAllCharacterList();
				$data['usergetlist'] = $this->model->getAllUserList();
				$this->load->view('login/registration_form', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$data['moviegetlist'] = $this->model->getAllMovieList();
				$data['showgetlist'] = $this->model->getAllShowList();
				$data['bookgetlist'] = $this->model->getAllBookList();
				$data['gamegetlist'] = $this->model->getAllGameList();
				$data['staffgetlist'] = $this->model->getAllStaffList();
				$data['charactergetlist'] = $this->model->getAllCharacterList();
				$data['usergetlist'] = $this->model->getAllUserList();
				$this->load->view('login/registration_form', $data);
			}

			
		}
		
	}
	// Check for user login process
	public function user_login_process()
	{
		//verify for XSS attack
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		//validates values inputted and then what to do
		if ($this->form_validation->run() == FALSE) {
			if (isset($this->session->userdata['logged_in'])) {
				redirect($_SERVER['HTTP_REFERER']);					
			} else {

				redirect($_SERVER['HTTP_REFERER']);					
			}
		} else {
			//encode the info the user provided
			$data = array(
				'username' => base64_encode($this->input->post('username')),
				'password' => base64_encode($this->input->post('password'))
			);
			//verification
			$result = $this->login_model->login($data);
			if ($result == TRUE) {
				
				$username = base64_encode($this->input->post('username'));
				$result = $this->login_model->read_user_information($username);
				if ($result != false) {

					//create session data
					$session_data = array(
						'user_id' => $result[0]->user_id,
						'username' => base64_decode($result[0]->username),
						'password' => base64_decode($result[0]->password),
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
				redirect($_SERVER['HTTP_REFERER']);					
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
		redirect(base_url());
		
	}



	//like user
	public function likeduser(){
		$uri = $_SERVER['REQUEST_URI']; 
		
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'addlikeduser')){
			$profileId = str_replace("/Dynamic-Content-Library-main/index.php/addlikeduser/","",$uri);
			$profileId = strtok($profileId, '/');
			$this->admin_model->addlikeduser($profileId,$user_id);//add liked user
		}else{
			$profileId = str_replace("/Dynamic-Content-Library-main/index.php/adddislikeduser/","",$uri);
			$profileId = strtok($profileId, '/');//remove from list liked user

			$this->admin_model->adddislikeduser($profileId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function removelikeduser(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'removelikeduser')){

			$profileId = str_replace("/Dynamic-Content-Library-main/index.php/removelikeduser/","",$uri);
			$profileId = strtok($profileId, '/');
			$this->admin_model->removelikeduser($profileId,$user_id);//add user to dislike list
		}else{

			$profileId = str_replace("/Dynamic-Content-Library-main/index.php/removedilikeduser/","",$uri);
			$profileId = strtok($profileId, '/');

			$this->admin_model->removedilikeduser($profileId,$user_id);//remove user from dislike list
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
}
