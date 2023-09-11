<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Welcome extends CI_Controller {
	public function __construct(){
        parent::__construct();
         //load the model  
         $this->load->model('model'); 
		 $this->load->model('admin_model'); 

		 $this->load->library('unit_test');
		 $this->load->helper('date');


    }


	public function index(){
		
		//get notif
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}

		//get userrec
		$data['userrecommendation'] = $this->model->getUserRecom();

		//get contents
		$data['contents'] = $this->model->getContentsShow();

		$data['newmoviecontent'] = $this->model->getNewContentListShow("movie");
		$data['newshowcontent'] = $this->model->getNewContentListShow("show");
		$data['newbookcontent'] = $this->model->getNewContentListShow("book");
		$data['newgamecontent'] = $this->model->getNewContentListShow("game");


		//searchbar
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('list/first_list',$data);
	}

	public function recommendations(){

		//get notif
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}

		//getuser rec
		$data['userrecommendation'] = $this->model->getUserRecomAll();


		//searchbar
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		
		$this->load->view('list/recommendations',$data);

	}
	public function content(){

		//get type of content being viewd to them get stuff related to it
		
		$uri = $_SERVER['REQUEST_URI']; 
		$type = str_replace("/Dynamic-Content-Library-main/index.php/","",$uri);
		$type = strtok($type, '/');

		if($type == "movie"){
			$data['newReleases'] = $this->model->getContentListNewShow($type);
			$data['upcoming'] = $this->model->getContentListUpcomingShow($type);
			$data['highest'] = $this->model->getContentListHigherRatedShow($type);
			$data['roulette'] = $this->model->getContentListRoulette($type);

		}else if($type == "show"){
			$data['newReleases'] = $this->model->getContentListNewShow($type);
			$data['upcoming'] = $this->model->getContentListUpcomingShow($type);
			$data['highest'] = $this->model->getContentListHigherRatedShow($type);
			$data['roulette'] = $this->model->getContentListRoulette($type);


		}else if($type == "game"){
			$data['newReleases'] = $this->model->getContentListNewShow($type);
			$data['upcoming'] = $this->model->getContentListUpcomingShow($type);
			$data['highest'] = $this->model->getContentListHigherRatedShow($type);
			$data['roulette'] = $this->model->getContentListRoulette($type);


		}else if($type == "book"){
			$data['newReleases'] = $this->model->getContentListNewShow($type);
			$data['upcoming'] = $this->model->getContentListUpcomingShow($type);
			$data['highest'] = $this->model->getContentListHigherRatedShow($type);
			$data['roulette'] = $this->model->getContentListRoulette($type);

		}

		//if logged in get notifs of user
		if (isset($this->session->userdata['logged_in'])) {

		$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}
		$data['userrecommendation'] = $this->model->getUserRecomContent($type);
		$data['type'] = $type;

		//searchbar
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('list/content_list',$data);
	}

	public function content_all_list(){

		//get the type of content being viewed and then get all the content for that one type
		$uri = $_SERVER['REQUEST_URI']; 
		$type_content = str_replace("/Dynamic-Content-Library-main/index.php/","",$uri);
		$type_content = strtok($type_content, '/');


		//newest list of content clicked
		if($type_content == "new_movie"){
			$type = "movie";
			$data['contents'] = $this->model->getContentListNew($type);

		}else if($type_content == "new_show"){
			$type = "show";
			$data['contents'] = $this->model->getContentListNew($type);


		}else if($type_content == "new_game"){
			$type = "game";
			$data['contents'] = $this->model->getContentListNew($type);


		}else if($type_content == "new_book"){
			$type = "book";
			$data['contents'] = $this->model->getContentListNew($type);

		}

		//upcoming list of what clicked
		if($type_content == "upcoming_movie"){
			$type = "movie";
			$data['contents'] = $this->model->getContentListUpcoming($type);

		}else if($type_content == "upcoming_show"){
			$type = "show";
			$data['contents'] = $this->model->getContentListUpcoming($type);


		}else if($type_content == "upcoming_game"){
			$type = "game";
			$data['contents'] = $this->model->getContentListUpcoming($type);


		}else if($type_content == "upcoming_book"){
			$type = "book";
			$data['contents'] = $this->model->getContentListUpcoming($type);

		}


		//get highest rated list
		if($type_content == "higher_movie"){
			$type = "movie";
			$data['contents'] = $this->model->getContentListHigherRated($type);

		}else if($type_content == "higher_show"){
			$type = "show";
			$data['contents'] = $this->model->getContentListHigherRated($type);

		}else if($type_content == "higher_game"){
			$type = "game";
			$data['contents'] = $this->model->getContentListHigherRated($type);

		}else if($type_content == "higher_book"){
			$type = "book";
			$data['contents'] = $this->model->getContentListHigherRated($type);
		}



		//stuff related all contnet
		if($type_content == "browse_all_movie"){
			$type = "movie";
			$data['contents'] = $this->model->getContentList($type);

		}else if($type_content == "browse_all_show"){
			$type = "show";
			$data['contents'] = $this->model->getContentList($type);


		}else if($type_content == "browse_all_game"){
			$type = "game";
			$data['contents'] = $this->model->getContentList($type);


		}else if($type_content == "browse_all_book"){
			$type = "book";
			$data['contents'] = $this->model->getContentList($type);

		}


		//if logged in get notif, if content belongs to list and liked/dislike
		if (isset($this->session->userdata['logged_in'])) {
			$data['useraddlist'] = array();
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

			foreach($data['contents'] as $id){
				$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],1);
				array_push($data['useraddlist'],$userlistexists);
			}
			$data['checkpreferenceslike'] = $this->model->getPreferencesLikeContent($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislikeContent($this->session->userdata['logged_in']['user_id']);
		} 

		//searchbar
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('list/all_list',$data);
	}


	public function recommended_content(){
		
		//get notif
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}

		//get from url word to specify type of cntent being viewd
		$uri = $_SERVER['REQUEST_URI']; 
		$type_content = str_replace("/Dynamic-Content-Library-main/index.php/","",$uri);
		$type_content = strtok($type_content, '/');

		if($type_content == "recommended_movie"){
			$type = "movie";
		}else if($type_content == "recommended_show"){
			$type = "show";

		}else if($type_content == "recommended_game"){
			$type = "game";

		}else if($type_content == "recommended_book"){
			$type = "book";
		}

		//get recom to type being viewed
		$data['userrecommendation'] = $this->model->getUserRecomAllList($type);



		//search bar
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		
		$this->load->view('list/recommendations',$data);

	}


	public function browse_all_content(){

		//get from url content being viewed
		$uri = $_SERVER['REQUEST_URI']; 
		$type_content = str_replace("/Dynamic-Content-Library-main/index.php/","",$uri);
		$type_content = strtok($type_content, '/');

		
		//if logged in get notif, lists and if user liked/dislikes content
		if (isset($this->session->userdata['logged_in'])) {
			$data['useraddlist'] = array();
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

			foreach($data['contents'] as $id){
				$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],1);
				array_push($data['useraddlist'],$userlistexists);
			}
			$data['checkpreferenceslike'] = $this->model->getPreferencesLikeContent($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislikeContent($this->session->userdata['logged_in']['user_id']);
		} 

		//searchbar

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('list/all_list',$data);
	}

	
	
	


	public function studio(){

		//list of content in a particular studio
		$uri = $_SERVER['REQUEST_URI']; 
		$genre = str_replace("/Dynamic-Content-Library-main/index.php/studio/","",$uri);
		$remove = str_replace("%20"," ",$genre);
		$data['contents'] = $this->model->getStudioContentList($remove);

		//logged in gets notif and able to like/dislike content or modify list
		if (isset($this->session->userdata['logged_in'])) {
			$data['useraddlist'] = array();
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferenceslike'] = $this->model->getPreferencesLikeStudio($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislikeStudio($this->session->userdata['logged_in']['user_id']);
				foreach($data['contents'] as $id){
						$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],5);
						array_push($data['useraddlist'],$userlistexists);
					
					
				}
			}

		//studio info
		$data['studiostuff'] = $this->model->getStudioContentStuff($remove);

		$this->load->view('list/all_list',$data);
	}

	public function studioall(){
		//get list of all studios
		$data['studio'] = $this->admin_model->getAllstudio();
		$this->load->view('list/stud_list', $data);

	}

	public function genreall(){

		//list of all genres
		$data['genre'] = $this->admin_model->getAllGenre();
		$this->load->view('list/gen_list', $data);

	}


	public function genre(){

		//get genre being viewed
		$uri = $_SERVER['REQUEST_URI']; 
		$genre = str_replace("/Dynamic-Content-Library-main/index.php/genre/","",$uri);
		$remove = str_replace("%20"," ",$genre);

		//get info from genre
		$data['contents'] = $this->model->getgenreInfo($remove);

		//logged user can like/dislike genre and content and add content to list
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferenceslike'] = $this->model->getPreferencesLikeGenre($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislikeGenre($this->session->userdata['logged_in']['user_id']);
			$data['useraddlist'] = array();
				foreach($data['contents'] as $id){
					$userlistexists = $this->model->getuserlist($id[0]->contentId,$this->session->userdata['logged_in']['user_id'],0);
					array_push($data['useraddlist'],$userlistexists);
				}
			}
		
			//genre info
			$data['genrestuff'] = $this->model->getGenreContentStuff($remove);

		$this->load->view('list/all_list',$data);
	}

	public function display(){

		//using id get info about content being viewd and the genre
		$uri = $_SERVER['REQUEST_URI']; 
		$id = str_replace("/Dynamic-Content-Library-main/index.php/display/","",$uri);
		$data['contents'] = $this->model->getdisplayinfo($id);
		$data['genres'] = $this->model->getdisplaygenre($id);

		//check if user exits in database
		$data['existsprofile'] = $this->model->getExistsProfileD($id);

		//if doesnt exist get redidrected to homepage
		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}

		//get content type based on id
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

		//stuff related to logged in, rates, notif, add to customlist, watchlist, update watchlist episode number, and likes
		if (isset($this->session->userdata['logged_in'])) {
			$data['personalrating'] = $this->model->getpersonalrating($id,$this->session->userdata['logged_in']['user_id']);
			
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

			$data['userratingpersonal'] = $this->model->getdisplayuserratingpersonal($id,$this->session->userdata['logged_in']['user_id']);

			$userlistexists = $this->model->getuserlist($id,$this->session->userdata['logged_in']['user_id'],$type);
			$data['usercustomlistadd'] = $this->model->usercustomlistadd($id,$this->session->userdata['logged_in']['user_id'],5);
			
			$data['allist'] = $this->model->allist($id,$this->session->userdata['logged_in']['user_id'],5,$data['usercustomlistadd']);
			array_push($data['useraddlist'],$userlistexists);

			$data['checkpreferenceslike'] = $this->model->getPreferencesLikeContent($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislikeContent($this->session->userdata['logged_in']['user_id']);

			$data['userwatchnumber'] = $this->model->getUserWatchep_number($this->session->userdata['logged_in']['user_id'],$data['contents'][0]->contentId);

		}

		//get logged user rating
		$data['userratingtop'] = $this->model->getdisplayuserratingtop($id,$data['userratingpersonal']);

		//all rating
		$data['allrating'] = $this->model->getalldisplayrating($id);

		//stats, thingy that shows on the right
		$data['statscontent'] = $this->model->getStatsinside($id,$type);


		//search bar
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		$this->load->view('list/display',$data);
	}

	public function staff(){
		//get staff belonging to a particular piece of content
		$uri = $_SERVER['REQUEST_URI']; 
		$ct_staff = str_replace("/Dynamic-Content-Library-main/index.php/display/","",$uri);
		$contentId = strtok($ct_staff, '/');
		$data['contents'] = $this->model->getStaffmembers($contentId);

		$data['contentinfo'] = $this->model->getdisplayinfo($contentId);
		
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferenceslike'] = $this->model->getPreferencesLikeS($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislikeS($this->session->userdata['logged_in']['user_id']);
		}

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		//$data['contents'] = $this->model->getdisplayinfo($contentId); //If I want to display content info in staff page I use this method
		$this->load->view('list/staff',$data);
	}

	public function review(){

		//comment page from content
		$uri = $_SERVER['REQUEST_URI']; 
		$id = str_replace("/Dynamic-Content-Library-main/index.php/display/","",$uri);
		$id = strtok($id, '/');

		$data['contentinfo'] = $this->model->getdisplayinfo($id);
		$data['useraddlist'] = array();
		$data['usercustomlistadd'] = array();
		$data['allist'] = array();
		$data['userratingpersonal'] = array();
		if (isset($this->session->userdata['logged_in'])) {
			$data['personalrating'] = $this->model->getpersonalrating($id,$this->session->userdata['logged_in']['user_id']);
			
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

			$data['userratingpersonal'] = $this->model->getdisplayuserratingpersonal($id,$this->session->userdata['logged_in']['user_id']);

		}

		$data['userratingall'] = $this->model->getdisplayuserrating($id,$data['userratingpersonal']);
		$data['allrating'] = $this->model->getalldisplayrating($id);


		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		$this->load->view('list/review',$data);
	}


	public function charactersreview(){

		//comment page in characters page
		$uri = $_SERVER['REQUEST_URI']; 
		$characterId = str_replace("/Dynamic-Content-Library-main/index.php/characters/","",$uri);
		$characterId = strtok($characterId, '/');
		$data['contents'] = $this->model->getCharacterInfo($characterId);//get character info
		$data['chars'] = $this->model->getStaffcharmembers($characterId);//staff that played that character
		$data['personalcomment'] = array();

		//logged in can leave comment 
		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['personalcomment'] = $this->model->personalcommentst($characterId,$user_id,3);
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}

		//get all comments in char
		$data['comments'] = $this->model->getCharComments($characterId,$data['personalcomment']);

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('list/people_review',$data);

	}

	public function staffreview(){
		//staff comment page
		$uri = $_SERVER['REQUEST_URI']; 
		$staffId = str_replace("/Dynamic-Content-Library-main/index.php/staff/","",$uri);
		$staffId = strtok($staffId, '/');


		$data['contents'] = $this->model->getStaffInfo($staffId);//staff info
		$data['chars'] = $this->model->getcharbystaffmembers($staffId);//character they played

		$data['personalcomment'] = array();

		//logged in can leave their comment
		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['personalcomment'] = $this->model->personalcommentst($staffId,$user_id,2);
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);

		}
		//all other comments
		$data['comments'] = $this->model->getStaffComments($staffId,$data['personalcomment']);

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('list/staff_review',$data);

	}

	public function ratinguserchange(){
		//changing rating on a content, getting user id, content and the rating and then using those
		//3 parameters update in the databe
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/ratinguserchange/","",$uri);
		$user_id = strtok($user_id, '/');
		$contentId = str_replace("/Dynamic-Content-Library-main/index.php/ratinguserchange/$user_id/content/","",$uri);
		$contentId = strtok($contentId, '/');
		$rating = str_replace("/Dynamic-Content-Library-main/index.php/ratinguserchange/$user_id/content/$contentId/rating/","",$uri);

		$this->model->changerating($user_id,$contentId,$rating);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function removerating(){
		//get user and contentid from the url and update rating to 0 by "removing it"
		//done this way bc review text shares same table so instead of deleting comment just changes value
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/removerating/","",$uri);
		$user_id = strtok($user_id, '/');
		$contentId = str_replace("/Dynamic-Content-Library-main/index.php/removerating/$user_id/","",$uri);

		$this->model->changerating($user_id,$contentId,0);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function addcommentContent(){
		//add comment from a user in a particualr content
		$review = $_GET['comment'];
		$title = $_GET['title'];
		$uri = $_SERVER['REQUEST_URI']; 
		$contentId = str_replace("/Dynamic-Content-Library-main/index.php/addcontentcomment/","",$uri);
		$contentId = strtok($contentId, '/');
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/addcontentcomment/$contentId/userid/","",$uri);
		$user_id = strtok($user_id, '?');

		$this->model->addcommentContent($user_id,$contentId,$review,$title);
		redirect($_SERVER['HTTP_REFERER']);

	}

	//addd and remove from watchlist using content and user ids
	public function addwatchlist(){
		
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/addwatchlist/","",$uri);
		$user_id = strtok($user_id, '/');
		$contentId = str_replace("/Dynamic-Content-Library-main/index.php/addwatchlist/$user_id/","",$uri);
		$contentId = strtok($contentId, '/');
		$watchlist = str_replace("/Dynamic-Content-Library-main/index.php/addwatchlist/$user_id/$contentId/","",$uri);
		$watchlist = strtok($watchlist, '/');

		if($watchlist == 0){
			$this->model->removewatchlist($user_id,$contentId);
		}else{
			$this->model->addwatchlist($user_id,$contentId,$watchlist);
		}
		redirect($_SERVER['HTTP_REFERER']);

	}

	//add watched episodes by a user to a specific content, info gets passed on url
	public function addwatchedepisodes(){
		
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/addwatchedepisodes/","",$uri);
		$user_id = strtok($user_id, '/');
		$contentId = str_replace("/Dynamic-Content-Library-main/index.php/addwatchedepisodes/$user_id/","",$uri);
		$contentId = strtok($contentId, '/');
		$episodes = str_replace("/Dynamic-Content-Library-main/index.php/addwatchedepisodes/$user_id/$contentId/","",$uri);
		$episodes = strtok($episodes, '/');

		
		if($episodes == 0){
			$this->model->removewatchlistep($user_id,$contentId);
		}else{
			$this->model->addwatchlistep($user_id,$contentId,$episodes);
		}
		redirect($_SERVER['HTTP_REFERER']);

	}

	//"remove" comment on content, all this does is leave it blank on the database or it gets
	//the long string is something random that makes zero sense
	//if a user somehow manages to copy it they will delete the comment instead of updating
	//everything besides that string will update comment
	public function removecommentcontent(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/removecommentcontent/","",$uri);
		$user_id = strtok($user_id, '/');
		$contentId = str_replace("/Dynamic-Content-Library-main/index.php/removecommentcontent/$user_id/","",$uri);

		$this->model->addcommentContent($user_id,$contentId,"fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec",0);
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//add comment to character
	public function addcharactercontent(){
		$review = $_GET['comment'];
		$title = $_GET['title'];

		$uri = $_SERVER['REQUEST_URI']; 
		$characterId = str_replace("/Dynamic-Content-Library-main/index.php/addcharactercontent/","",$uri);
		$characterId = strtok($characterId, '/');
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/addcharactercontent/$characterId/userid/","",$uri);
		$user_id = strtok($user_id, '?');

		$this->model->addcharacterContent($user_id,$characterId,$review,$title);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//"remove" comment on char, all this does is leave it blank on the database or it gets
	//the long string is something random that makes zero sense
	//if a user somehow manages to copy it they will delete the comment instead of updating
	//everything besides that string will update comment
	public function removecharactercontent(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/removecharactercontent/","",$uri);
		$user_id = strtok($user_id, '/');
		$characterId = str_replace("/Dynamic-Content-Library-main/index.php/removecharactercontent/$user_id/","",$uri);

		$this->model->addcharacterContent($user_id,$characterId,"fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec","fasf");
		redirect($_SERVER['HTTP_REFERER']);
	}

	//add comment on staff, parameters get passed on url
	public function addstaffcontent(){
		$review = $_GET['comment'];
		$title = $_GET['title'];
		$uri = $_SERVER['REQUEST_URI']; 
		$staffId = str_replace("/Dynamic-Content-Library-main/index.php/addstaffcontent/","",$uri);
		$staffId = strtok($staffId, '/');
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/addstaffcontent/$staffId/userid/","",$uri);
		$user_id = strtok($user_id, '?');

		$this->model->addstaffcontent($user_id,$staffId,$review,$title);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//"remove" comment on staff, all this does is leave it blank on the database or it gets
	//the long string is something random that makes zero sense
	//if a user somehow manages to copy it they will delete the comment instead of updating
	//everything besides that string will update comment
	public function removestaffcontent(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/removestaffcontent/","",$uri);
		$user_id = strtok($user_id, '/');
		$staffId = str_replace("/Dynamic-Content-Library-main/index.php/removestaffcontent/$user_id/","",$uri);

		$this->model->addstaffcontent($user_id,$staffId,"fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec","hbuikasf");
		redirect($_SERVER['HTTP_REFERER']);
	}


	//show staff page
	public function staffshow(){
		$uri = $_SERVER['REQUEST_URI']; 
		$staffId = str_replace("/Dynamic-Content-Library-main/index.php/staff/","",$uri);

		//get staff info and characters they played
		$data['contents'] = $this->model->getStaffInfo($staffId);
		$data['chars'] = $this->model->getcharbystaffmembers($staffId);

		//check if user exits in database
		$data['existsprofile'] = $this->model->getExistsProfileS($staffId);

		//no exist, user goes to homepage
		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}
		$data['personalcomment'] = array();
		if (isset($this->session->userdata['logged_in'])) {
			//get comment user left also allow to like/dislike
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['personalcomment'] = $this->model->personalcommentst($staffId,$user_id,2);
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferenceslike'] = $this->model->getPreferencesLikeS($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislikeS($this->session->userdata['logged_in']['user_id']);
		}
		//get all comments
		$data['comments'] = $this->model->getStaffComments($staffId,$data['personalcomment']);

		//saerch bar
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		$this->load->view('list/staffshow',$data);

		//$data['contents'] = $this->model->getdisplayinfo($contentId); If I want to display content info in staff page I use this method
	}

	//get charactes in a content
	public function characters(){
		$uri = $_SERVER['REQUEST_URI']; 
		$ct_staff = str_replace("/Dynamic-Content-Library-main/index.php/display/","",$uri);
		$contentId = strtok($ct_staff, '/');
		//char info
		$data['contents'] = $this->model->getCharacters($contentId);
		$data['contentinfo'] = $this->model->getdisplayinfo($contentId);

		if (isset($this->session->userdata['logged_in'])) {
			//user can like/dislike comment
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferenceslike'] = $this->model->getPreferencesLike($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislike($this->session->userdata['logged_in']['user_id']);
	
		}
		/*$data['staff'] = $this->model->getStaffmembers($contentId);
		$data['staffchar'] = $this->model->getStaffCharacter($data); Show character that a staff member plays but not working currently*/

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();


		//$data['contents'] = $this->model->getdisplayinfo($contentId); //If I want to display content info in staff page I use this method

		$this->load->view('list/characters',$data);

	}

	//notification page, gets notifs for logged in user
	public function notification(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/notification/","",$uri);
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}

		
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		
		$this->load->view('list/notification',$data);
	}

	//remove one notif that the user selected
	public function removenotif(){
		$uri = $_SERVER['REQUEST_URI']; 
		$not_id = str_replace("/Dynamic-Content-Library-main/index.php/removenotif/","",$uri);
		$this->model->removenotif($not_id);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove all notif from a user
	public function removenotifuser(){
		$uri = $_SERVER['REQUEST_URI']; 
		$not_id = str_replace("/Dynamic-Content-Library-main/index.php/removenotifuser/","",$uri);
		$this->model->removenotifuser($not_id);

		redirect($_SERVER['HTTP_REFERER']);
	}

	//character show page, shows all info related to them, user can like/dislike and leave comment there
	public function charactersshow(){
		$uri = $_SERVER['REQUEST_URI']; 
		$characterId = str_replace("/Dynamic-Content-Library-main/index.php/characters/","",$uri);
		$data['contents'] = $this->model->getCharacterInfo($characterId);
		$data['chars'] = $this->model->getStaffcharmembers($characterId);
		$data['personalcomment'] = array();

		//check if user exits in database
		$data['existsprofile'] = $this->model->getExistsProfileC($characterId);

		if($data['existsprofile'] == 0) {
			redirect(base_url());
		}

		if (isset($this->session->userdata['logged_in'])) {
			$user_id = ($this->session->userdata['logged_in']['user_id']);
			$data['personalcomment'] = $this->model->personalcommentst($characterId,$user_id,3);
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferenceslike'] = $this->model->getPreferencesLike($this->session->userdata['logged_in']['user_id']);
			$data['checkpreferencesdislike'] = $this->model->getPreferencesDislike($this->session->userdata['logged_in']['user_id']);
			
		}
		$data['comments'] = $this->model->getCharComments($characterId,$data['personalcomment']);
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		
		$this->load->view('list/charactershow',$data);

		//$data['contents'] = $this->model->getdisplayinfo($contentId); If I want to display content info in staff page I use this method
	}


	//main page of forum
	public function forum(){
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}
		$uri = $_SERVER['REQUEST_URI']; 
		if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['permission'] == 0) {
			//admins have the option to see private forums if they want, they can see all, private only or publi only
			if(basename($uri) == 'private'){
				$data['forum_title'] = $this->model->getForumMainsAdmin("private");
			}else if(basename($uri) == 'public'){
				$data['forum_title'] = $this->model->getForumMainsAdmin("public");
			}else{
				$data['forum_title'] = $this->model->getForumMainsAdmin("all");
			}
		}else{
			//if user is not admin they only see public
			$data['forum_title'] = $this->model->getForumMains();

		}

		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('list/forum',$data);
	}

	//admins are able to add forums
	public function addforum(){
	
		$description = $_GET['description'];
		$title = $_GET['title'];
		$public = $_GET['public'];
		$date = date('Y-m-d H:i:s');

		$this->model->addforum($title,$description,$public,$date);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//edit forum based on info admin uses
	public function modforum(){
	
		$uri = $_SERVER['REQUEST_URI']; 


		if(strpos($uri,'deleteforum') !== false){
			$forum_id = $this->input->post('thread_id');
			$this->model->deleteforum($forum_id);
		}else if(strpos($uri,'modforum') !== false){
	
			$forum_id = $this->input->post('thread_id_mod');
			$description = $this->input->post('description_mod_thread');
			$title = $this->input->post('title_mod_thread');
			$public = $this->input->post('public_edit');
			$date = date('Y-m-d H:i:s');

			$this->model->modforum($title,$description,$public,$date,$forum_id);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}



	//thread is the inside part of the forum like forum->thread->comments
	//works the same as forum, its a subcategory of a category thats better explained
	public function thread(){
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}

		$uri = $_SERVER['REQUEST_URI']; 
		$forum_id = str_replace("/Dynamic-Content-Library-main/index.php/forum/","",$uri);
		$forum_id = strtok($forum_id, '/');

		if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['permission'] == 0) {
			if(basename($uri) == 'private'){
				$data['thread'] = $this->model->getThreadMainAdmin($forum_id,"private");
			}else if(basename($uri) == 'public'){
				$data['thread'] = $this->model->getThreadMainAdmin($forum_id,"public");
			}else{
				$data['thread'] = $this->model->getThreadMainAdmin($forum_id,"all");
			}
		}else{
			$data['threadinsisdepublic'] = $this->model->getPublicThread($forum_id);

			if(empty($data['threadinsisdepublic'])){
				header("location:".base_url()."index.php/forum");

			}else{
				$data['thread'] = $this->model->getThreadMain($forum_id,"public");

			}
		}
		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();

		$this->load->view('list/thread',$data);
	}

	//admin adds thread
	public function addthread(){
	
		$uri = $_SERVER['REQUEST_URI']; 
		$forum_id = str_replace("/Dynamic-Content-Library-main/index.php/addthread/","",$uri);
		$forum_id = strtok($forum_id, '/');

		$description = $_GET['description'];
		$title = $_GET['title'];
		$public = $_GET['public'];
		$date = date('Y-m-d H:i:s');

		$this->model->addthread($title,$description,$public,$date,$forum_id);
		redirect($_SERVER['HTTP_REFERER']);
	}

	//admin edits thread or deletes it
	public function modthread(){
	
	
		$uri = $_SERVER['REQUEST_URI']; 

		if(strpos($uri,'deletethread') !== false){
			$thread_id = $this->input->post('thread_id');
			$this->model->deletethread($thread_id);
		}else if(strpos($uri,'modthread') !== false){
	
			$thread_id = $this->input->post('thread_id_mod');
			$description = $this->input->post('description_mod_thread');
			$title = $this->input->post('title_mod_thread');
			$public = $this->input->post('public_edit');
			$date = date('Y-m-d H:i:s');

			$this->model->modThread($title,$description,$public,$date,$thread_id);
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	//modify thread
	public function modifythread(){
	
		$uri = $_SERVER['REQUEST_URI']; 
		$forum_id = str_replace("/Dynamic-Content-Library-main/index.php/addthread/","",$uri);
		$forum_id = strtok($forum_id, '/');

		$description = $_GET['description'];
		$title = $_GET['title'];
		$public = $_GET['public'];
		$date = date('Y-m-d H:i:s');

		$this->model->addthread($title,$description,$public,$date,$forum_id);
		redirect($_SERVER['HTTP_REFERER']);
	}



	//this si the comments part of the threead, gets all comments on it and if not public and user not admin 
	//get sent to homepage
	public function threadinside(){
		if (isset($this->session->userdata['logged_in'])) {
			$data['notification'] = $this->model->getNotification($this->session->userdata['logged_in']['user_id']);
		}

		$uri = $_SERVER['REQUEST_URI']; 
		$thread_id = str_replace("/Dynamic-Content-Library-main/index.php/forum/thread/","",$uri);
		$thread_id = strtok($thread_id, '/');

		$data['threadinsidename'] = $this->model->getThreadInsideName($thread_id);

		if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['permission'] == 0) {
			$data['threadinside'] = $this->model->getThreadInsideAdmin($thread_id);

		}else{
			$data['threadinsidepublic'] = $this->model->getPublicThreadInside($thread_id);

			if(empty($data['threadinsidepublic'])){
				header("location:".base_url()."index.php/forum");

			}else{
				$data['threadinside'] = $this->model->getThreadInside($thread_id);
			}

		}

		if (isset($this->session->userdata['logged_in'])){
			$data['personalcomment'] = $this->model->getThreadPersonalComment($thread_id,$this->session->userdata['logged_in']['user_id']);
		}


		$data['moviegetlist'] = $this->model->getAllMovieList();
		$data['showgetlist'] = $this->model->getAllShowList();
		$data['bookgetlist'] = $this->model->getAllBookList();
		$data['gamegetlist'] = $this->model->getAllGameList();
		$data['staffgetlist'] = $this->model->getAllStaffList();
		$data['charactergetlist'] = $this->model->getAllCharacterList();
		$data['usergetlist'] = $this->model->getAllUserList();
		$this->load->view('list/threadinside',$data);
	}

	//add comment to a thread
	public function addthreadcomment(){
		

		$comment = $_GET['comment'];
		$uri = $_SERVER['REQUEST_URI']; 
		$thread_id = str_replace("/Dynamic-Content-Library-main/index.php/addthreadcomment/","",$uri);
		$thread_id = strtok($thread_id, '?');
		$user_id = $this->session->userdata['logged_in']['user_id'];
		$date = date('Y-m-d H:i:s');
		$this->model->addthreadcomment($user_id,$comment,$thread_id,$date);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//remove comment on thread
	public function removecommentforum(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = str_replace("/Dynamic-Content-Library-main/index.php/removecommentforum/","",$uri);
		$user_id = strtok($user_id, '/');
		$comment_id = str_replace("/Dynamic-Content-Library-main/index.php/removecommentforum/$user_id/","",$uri);

		$this->model->addthreadcomment($user_id,"fwhyalhiçufoijj3qop9e4u018rhoirFHUAUIFLfkfkuNKUWKNUewcuknec",$comment_id,0);
		
		redirect($_SERVER['HTTP_REFERER']);
	}


	//like a character
	public function likedcharacter(){
		$uri = $_SERVER['REQUEST_URI']; 
		
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'addlikedcharacter')){
			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/addlikedcharacter/","",$uri);
		$characterId = strtok($characterId, '/');
			$this->model->addcharacterliked($characterId,$user_id);
		}else{
			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/adddislikedcharacter/","",$uri);
			$characterId = strtok($characterId, '/');

			$this->model->addcharacterdisliked($characterId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove liked character from list
	public function removelikedcharacter(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = $this->session->userdata['logged_in']['user_id'];

		echo basename($uri);
		if(strpos($uri, 'removelikedcharacter')){

			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/removelikedcharacter/","",$uri);
			$characterId = strtok($characterId, '/');
			$this->model->removelikedcharacter($characterId,$user_id);
		}else{

			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/removedilikedcharacter/","",$uri);
			$characterId = strtok($characterId, '/');

			$this->model->removedilikedcharacter($characterId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//like staff

	public function likedstaff(){
		$uri = $_SERVER['REQUEST_URI']; 
		
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'addlikedstaff')){
			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/addlikedstaff/","",$uri);
			$characterId = strtok($characterId, '/');
			$this->model->addstaffliked($characterId,$user_id);
		}else{
			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/adddislikedstaff/","",$uri);
			$characterId = strtok($characterId, '/');

			$this->model->addstaffdisliked($characterId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove liked staff from list
	public function removelikedstaff(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'removelikedstaff')){

			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/removelikedstaff/","",$uri);
			$characterId = strtok($characterId, '/');
			$this->model->removelikedstaff($characterId,$user_id);
		}else{
			
			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/removedilikedstaff/","",$uri);
			$characterId = strtok($characterId, '/');

			$this->model->removedilikedstaff($characterId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//like content
	public function likedcontent(){
		$uri = $_SERVER['REQUEST_URI']; 
		
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'addlikedcontent')){
			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/addlikedcontent/","",$uri);
		$characterId = strtok($characterId, '/');
			$this->model->addlikedcontent($characterId,$user_id);
		}else{
			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/adddislikedcontent/","",$uri);
			$characterId = strtok($characterId, '/');

			$this->model->adddislikedcontent($characterId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove from list content liked
	public function removelikedcontent(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = $this->session->userdata['logged_in']['user_id'];

		echo basename($uri);
		if(strpos($uri, 'removelikedcontent')){

			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/removelikedcontent/","",$uri);
			$characterId = strtok($characterId, '/');
			$this->model->removelikedcontent($characterId,$user_id);
		}else{

			$characterId = str_replace("/Dynamic-Content-Library-main/index.php/removedilikedcontent/","",$uri);
			$characterId = strtok($characterId, '/');

			$this->model->removedilikedcontent($characterId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}


	//like studio
	public function likedstudio(){
		$uri = $_SERVER['REQUEST_URI']; 
		
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'addlikedstudio')){
			$studioId = str_replace("/Dynamic-Content-Library-main/index.php/addlikedstudio/","",$uri);
			$studioId = strtok($studioId, '/');
			$this->model->addlikedstudio($studioId,$user_id);
		}else{
			$studioId = str_replace("/Dynamic-Content-Library-main/index.php/adddislikedstudio/","",$uri);
			$studioId = strtok($studioId, '/');

			$this->model->adddislikedstudio($studioId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove studio liked
	public function removelikedstudio(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'removelikedstudio')){

			$studioId = str_replace("/Dynamic-Content-Library-main/index.php/removelikedstudio/","",$uri);
			$studioId = strtok($studioId, '/');
			$this->model->removelikedstudio($studioId,$user_id);
		}else{

			$studioId = str_replace("/Dynamic-Content-Library-main/index.php/removedilikedstudio/","",$uri);
			$studioId = strtok($studioId, '/');

			$this->model->removedilikedstudio($studioId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//like genre
	public function likedgenre(){
		$uri = $_SERVER['REQUEST_URI']; 
		
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'addlikedgenre')){
			$genreId = str_replace("/Dynamic-Content-Library-main/index.php/addlikedgenre/","",$uri);
			$genreId = strtok($genreId, '/');
			$this->model->addlikedgenre($genreId,$user_id);
		}else{
			$genreId = str_replace("/Dynamic-Content-Library-main/index.php/adddislikedgenre/","",$uri);
			$genreId = strtok($genreId, '/');

			$this->model->adddislikedgenre($genreId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}

	//remove liked genre
	public function removelikedgenre(){
		$uri = $_SERVER['REQUEST_URI']; 
		$user_id = $this->session->userdata['logged_in']['user_id'];

		if(strpos($uri, 'removelikedgenre')){

			$genreId = str_replace("/Dynamic-Content-Library-main/index.php/removelikedgenre/","",$uri);
			$genreId = strtok($genreId, '/');
			$this->model->removelikedgenre($genreId,$user_id);
		}else{

			$genreId = str_replace("/Dynamic-Content-Library-main/index.php/removedilikedgenre/","",$uri);
			$genreId = strtok($genreId, '/');

			$this->model->removedilikedgenre($genreId,$user_id);
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
