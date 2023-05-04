	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (isset($this->session->userdata['logged_in'])) {
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$username = ($this->session->userdata['logged_in']['username']);
		$email = ($this->session->userdata['logged_in']['email']);
		$first = ($this->session->userdata['logged_in']['first_name']);
		$last = ($this->session->userdata['logged_in']['last_name']);
		$permission = ($this->session->userdata['logged_in']['permission']);
		$this->load->view('login/admin_stuff/adminpanel');

	}
	//Light mode 
	?><!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://kit.fontawesome.com/4701289b74.js" crossorigin="anonymous"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url(); ?>others/css/menu.css"><!-- CSS menu -->
	<script src="<?php echo base_url(); ?>others/js/comment.js"></script>

		<title>Online Catalogue</title>
		
	

	</head>
	<body>
		<div class="topnav" id="myTopnav">
			<a href="<?=base_url()?>" class="" id="home">Home</a>
			<div class="dropdown">
				<button class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/movie';">Movie list</button>
				<div class="dropdown-content">
					<a href="<?=base_url()?>index.php/new_movie">Newly Released Movie</a>
					<a href="<?=base_url()?>index.php/upcoming_movie">Upcoming Movie</a>
					<a href="<?=base_url()?>index.php/higher_movie">Highest Rated Movie</a>
					<a href="<?=base_url()?>index.php/recommended_movie">Recommended Movies</a>
					<a href="<?=base_url()?>index.php/browse_all_movie">Browse All Movies</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/show';">Tv Show List</button>
				<div class="dropdown-content">
					<a href="<?=base_url()?>index.php/new_show">Newly Released Shows</a>
					<a href="<?=base_url()?>index.php/upcoming_show">Upcoming Shows</a>
					<a href="<?=base_url()?>index.php/higher_show">Highest Rated Shows</a>
					<a href="<?=base_url()?>index.php/recommended_show">Recommended Shows</a>
					<a href="<?=base_url()?>index.php/browse_all_show">Browse All Shows</a>

				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/game';">Game list</button>
				<div class="dropdown-content">
					<a href="<?=base_url()?>index.php/new_game">Newly Released Games</a>
					<a href="<?=base_url()?>index.php/upcoming_game">Upcoming Games</a>
					<a href="<?=base_url()?>index.php/higher_game">Highest Rated Games</a>
					<a href="<?=base_url()?>index.php/recommended_game">Recommended Games</a>
					<a href="<?=base_url()?>index.php/browse_all_game">Browse All Games</a>

				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/book';">Book list</button>
				<div class="dropdown-content">
					<a href="<?=base_url()?>index.php/new_book">Newly Released Books</a>
					<a href="<?=base_url()?>index.php/upcoming_book">Upcoming Books</a>
					<a href="<?=base_url()?>index.php/higher_book">Highest Rated Books</a>
					<a href="<?=base_url()?>index.php/recommended_book">Recommended Books</a>
					<a href="<?=base_url()?>index.php/browse_all_book">Browse All Books</a>
				</div>
			</div>
			
			<a class="dropbtn"href="<?=base_url()?>index.php/forum" class="" id="forum">Forum</a>
			
			<?php
				
				if($this->session->userdata('logged_in')){ ?>
					<div class="dropdown right">
						<button  class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/profile/<?= $user_id ?>';" id="login">Profile</button>
						<div class="dropdown-content">
							<a href="<?= base_url() ?>index.php/profile/<?= $user_id ?>/movielist">Your movies</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url() ?>index.php/profile/<?= $user_id ?>/showlist">Your shows</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url() ?>index.php/profile/<?= $user_id ?>/booklist">Your books</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url() ?>index.php/profile/<?= $user_id ?>/gamelist">Your games</a>
							<div class="dropdown-divider"></div>
							<a href='<?=base_url()?>index.php/supportform'>See your forms</a>
							<div class="dropdown-divider"></div>
							<?php if($permission == 0){?>
								<a style="cursor:pointer; color:white" onclick="openNav()">Admin Panel</a>
								<div class="dropdown-divider"></div>
							<?php }?>
							<a id="logout" class="dropdown-item" href="<?= base_url() ?>index.php/logout">Logout</a>
						</div>
					</div>
					
					<?php if(empty($notification)){?>
						<i class="fa fa-bell-o fa-2x" style="float:right" aria-hidden="true" data-toggle="modal" data-target="#myModalNotifications"></i>
					<?php }else{?>
						<i class="fa fa-bell fa-2x" style="float:right" aria-hidden="true" data-toggle="modal" data-target="#myModalNotifications"></i>

					<?php }?>



				<?php }else{?>
					<a style="float:right" href="#" id="login" data-toggle="modal" data-target="#myModal">Login</a>
				<?php }
			?>
			
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
			
			

					<input  type="text" id="input-1-top" name="input-1-top" placeholder="ID of first search" style="display:none">
					<select class="search-container-top" style="float:right;height: 25px;border-color: #1F1F1F;" id="select-array-top" name="select-array-top">
						<option value="movie">Movie</option>
						<option value="show">Show</option>
						<option value="game">Game</option>
						<option value="book">Book</option>
						<option value="staff">Staff</option>
						<option value="character">Character</option>
						<option value="users">User</option>

                  	</select>
					<div class="search-container search-container-top" id="" style="float:right;height: 25px">
						<input style="background-color : #1F1F1F;" type="text" id="search-bar-1-top" name="search-bar-1-top" placeholder="Search...">
						<div class="search-results" id="search-results-1-top" style="display:none;background-color : #1F1F1F">
							<div class="search-results-container" id="search-results-container-1-top"></div>
						</div>
					</div>
		</div>
		<?php 
		$uri = $_SERVER['REQUEST_URI']; 

		/*if(basename($uri) == "CodeIgniter-3.1.10"){?>
			<img src="uploads/home.png" width=100% height= 50px></img>
		<?php }else if(basename($uri) == "movie"){?>
			<img src="../uploads/download.png" width=100% height= 100px></img>

		<?php }else if(basename($uri) == "show"){?>
			<img src="../uploads/download.png" width=100% height= 100px></img>

		<?php }else if(basename($uri) == "book"){?>
			<img src="../uploads/download.png" width=100% height= 100px></img>

		<?php }else if(basename($uri) == "game"){?>
			<img src="../uploads/download.png" width=100% height= 100px></img>

		<?php }else if(basename($uri) == "forum"){?>
			<img src="../uploads/download.png" width=100% height= 100px></img>

		<?php }else if(strpos($uri, 'forum') && basename($uri) == "public" && !preg_match("/\/(\d+)\/public$/", $uri)){?>
			<img src="../../uploads/download.png" width=100% height= 100px></img>

		<?php }else if(strpos($uri, 'forum') && basename($uri) == "private" && !preg_match("/\/(\d+)\/private$/", $uri)){?>
			<img src="../../uploads/download.png" width=100% height= 100px></img>

		<?php }*/?>

		 <!-- Modal -->
		 <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login Form</h4>
        </div>
        <div class="modal-body">
		<?php echo form_open('login_enter'); ?>
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
                echo $error_message;
            }
            echo validation_errors();
            echo "</div>";
            ?>
            <label>UserName :</label>
            <input type="text" name="username" id="name" placeholder="username" /><br /><br />
            <label>Password :</label>
            <input type="password" name="password" id="password" placeholder="**********" /><br /><br />
            <input type="submit" value=" Login " name="submit" /><br />
            <a href="<?php echo base_url() ?>index.php/register">To SignUp Click Here</a>
            
            <?php echo form_close(); ?>
            <br />
            <script>
                function myFunction() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                }
            </script>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

   <!-- Modal -->
   <div class="modal fade" id="myModalNotifications" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<h4 class="modal-title"><a href="<?= base_url() ?>index.php/notification/<?= $user_id?>">SEE ALL NOTIFICATION</a></h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		<div class="container-fluid no-padding">
  <div class="row">
    <div class="col-sm-12" >
      <div class="row">

      <?php foreach($notification as $not){?>

        <div class="col-sm-10" >

        <?php echo $not->title.': ';?>

        <?php  echo $not->text.'</br>'?>
		<?php echo date("d-m-Y H:i:s", strtotime($not->date)) ?>
       </div>
       

        <div class="col-sm-2" >

          <i class="remove fas fa-user-times" onclick="deletenot(<?php echo $not->notification_id;?>)">REMOVE</i><br>
          </div>

        <?php } ?>
      
    
      </div>

    </div>
  </div>
</div>
</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	

		
	<?php 


	//check if redirected to the homepage
	/*$test = $_SERVER['REQUEST_URI'];
	$expected_result = '/CodeIgniter-3.1.10/';
	$test_name = 'Check correct home page';
	echo $this->unit->run($test, $expected_result, $test_name);*/

	//check if redirected to the allmovies page
	/*$test = $_SERVER['REQUEST_URI'];
	$expected_result = '/CodeIgniter-3.1.10/index.php/movie';
	$test_name = 'Check correct movie page';
	echo $this->unit->run($test, $expected_result, $test_name);*/

	//check if redirected to the shows page
	/*$test = $_SERVER['REQUEST_URI'];
	$expected_result = '/CodeIgniter-3.1.10/index.php/show';
	$test_name = 'Check correct movie page';
	echo $this->unit->run($test, $expected_result, $test_name);*/

	//check if redirected to the games page
	/*$test = $_SERVER['REQUEST_URI'];
	$expected_result = '/CodeIgniter-3.1.10/index.php/game';
	$test_name = 'Check correct movie page';
	echo $this->unit->run($test, $expected_result, $test_name);*/

	//check if redirected to the books page
	/*$test = $_SERVER['REQUEST_URI'];
	$expected_result = '/CodeIgniter-3.1.10/index.php/book';
	$test_name = 'Check correct movie page';
	echo $this->unit->run($test, $expected_result, $test_name);*/

	//check if redirected to the login
	/*$test = $_SERVER['REQUEST_URI'];
	$expected_result = '/CodeIgniter-3.1.10/index.php/login';
	$test_name = 'Check correct login page';
	echo $this->unit->run($test, $expected_result, $test_name);*/

	//check if redirected to the register
	/*$test = $_SERVER['REQUEST_URI'];
	$expected_result = '/CodeIgniter-3.1.10/index.php/register';
	$test_name = 'Check correct register page';
	echo $this->unit->run($test, $expected_result, $test_name);*/

	//check if redirected to logout
	/*$test = $_SERVER['REQUEST_URI'];
	$expected_result = '/CodeIgniter-3.1.10/index.php/logout';
	$test_name = 'Check correct logout page';
	echo $this->unit->run($test, $expected_result, $test_name);*/

	//check if redirected to the profile
	/*
	$test = $_SERVER['REQUEST_URI'];
	$expected_result = '/CodeIgniter-3.1.10/index.php/forum';
	$test_name = 'Check correct profile page';
	echo $this->unit->run($test, $expected_result, $test_name);*/
		
	?>
<script>
function deletenot(not_id){
	var response = confirm("Do you want to remove Notification:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removenotif/" + not_id
    }
}
function deleteallnot(userId){
	var response = confirm("Do you want to remove Notification:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removenotifuser/" + userId
    }
}





const movie = [
	<?php foreach($moviegetlist as $movie){ ?>
    {id: <?php echo $movie->contentId; ?>, name: <?php echo "\"$movie->title\""; ?>},
  <?php }?>
];

const show = [
	<?php foreach($showgetlist as $show){ ?>
    {id: <?php echo $show->contentId; ?>, name: <?php echo "\"$show->title\""; ?>},
  <?php }?>


];

const game = [
	<?php foreach($gamegetlist as $game){ ?>
    {id: <?php echo $game->contentId; ?>, name: <?php echo "\"$game->title\""; ?>},
  <?php }?>


];

const book = [
	<?php foreach($bookgetlist as $book){ ?>
    {id: <?php echo $book->contentId; ?>, name: <?php echo "\"$book->title\""; ?>},
  <?php }?>


];

const staff = [
	<?php foreach($staffgetlist as $gen){ ?>
		{id: <?php echo $gen->staff_id; ?>, name: <?php echo "\"$gen->first_name $gen->last_name\""; ?>},
  <?php }?>


];


const users = [
	<?php foreach($usergetlist as $gen){ 
		$usernamesearch = base64_decode($gen->username)?>
		
    {id: <?php echo $gen->user_id; ?>, name: <?php echo "\"$usernamesearch\""; ?>},
  <?php }?>


];


const character = [
	<?php foreach($charactergetlist as $gen){ ?>
		{id: <?php echo $gen->character_id; ?>, name: <?php echo "\"$gen->first_name $gen->last_name\""; ?>},
  <?php }?>


];



let currentArraytop = movie; // Default array
let currentArray = movie; // Default array


function searchtop(inputId, resultsId, containerId, resultsLabelId) {
  const input = document.getElementById(inputId).value.toLowerCase();
  const filteredItems = currentArraytop.filter(item => item.name.toLowerCase().includes(input));
  displayResultstop(inputId, resultsId, containerId, filteredItems);

  const searchResults = document.getElementById(resultsId);
  if (inputId === 'search-bar-1-top' && input === '') {
    searchResults.style.display = 'none';
    return;
  }
  
  searchResults.style.display = 'block';
}



function displayResultstop(inputId, resultsId, containerId, filteredItems, resultsLabelId) {
  const searchResults = document.getElementById(resultsId);
  const resultsContainer = searchResults.querySelector("#" + containerId);
  resultsContainer.innerHTML = "";
  
  if (filteredItems.length > 0) {
    filteredItems.forEach(item => {
      const div = document.createElement("div");
      div.innerText = item.name;
      div.addEventListener("click", function() {
        document.getElementById(inputId).value = item.name;
        searchResults.style.display = "none";
        // Update corresponding input field with the search bar ID
        if (inputId === "search-bar-1-top") {
			
          document.getElementById("input-1-top").value = item.id;
		  
			if (document.getElementById("select-array-top").value === "users") {
				window.location="<?= base_url() ?>index.php/profile/" + item.id
			}else if(document.getElementById("select-array-top").value === "staff"){
				window.location="<?= base_url() ?>index.php/staff/" + item.id

			}else if(document.getElementById("select-array-top").value === "character"){
				window.location="<?= base_url() ?>index.php/characters/" + item.id

			}else{
				window.location="<?= base_url() ?>index.php/display/" + item.id

			}
			

        } 
      });
      div.addEventListener("mouseenter", function() {
        div.classList.add("result-highlight");
      });
      div.addEventListener("mouseleave", function() {
        div.classList.remove("result-highlight");
      });
      resultsContainer.appendChild(div);
    });
    searchResults.style.display = "block";
  } else {
    searchResults.style.display = "none";
  }
}


document.getElementById("search-bar-1-top").addEventListener("input", function() {
  searchtop("search-bar-1-top", "search-results-1-top", "search-results-container-1-top");
});


let initialSelectedValue = document.getElementById("select-array-top").value;


function handleSelectChangetop() {
  if (document.getElementById("search-bar-1-top").value === "") {
    const selectedValue = this.value;
    if (selectedValue === "movie") {
		currentArraytop = movie;
    } else if (selectedValue === "show") {
		currentArraytop = show;
    }else if (selectedValue === "game") {
		currentArraytop = game;
    }else if (selectedValue === "book") {
		currentArraytop = book;
    }else if (selectedValue === "users") {
		currentArraytop = users;
    }else if (selectedValue === "staff") {
		currentArraytop = staff;
    }else if (selectedValue === "character") {
		currentArraytop = character;
    }
	
    
  } else {
    // Reset select value to current array
    const selectElement = document.getElementById("select-array-top");

	alert(1);

    const currentArrayName = currentArraytop === movie ? "movie" :
	currentArraytop === show ? "show" :
	currentArraytop === game ? "game" :
	currentArraytop === book ? "book" :
	currentArraytop === users ? "users" :
	currentArraytop === staff ? "staff" :
             "character";
    selectElement.value = currentArrayName;
  }
}

document.getElementById("select-array-top").addEventListener("change", function() {
  if (document.getElementById("search-bar-1-top").value === "") {
    handleSelectChangetop.call(this);
  } else {
	this.value = currentArraytop === movie ? "movie" :
	currentArraytop === show ? "show" :
	currentArraytop === game ? "game" :
	currentArraytop === book ? "book" :
	currentArraytop === users ? "users" :
	currentArraytop === staff ? "staff" :
             "character";
  }
});






document.addEventListener("click", function(event) {
  if (!event.target.closest(".search-container")) {
    const searchResults = document.querySelectorAll(".search-results");
    searchResults.forEach(result => {
      result.style.display = "none";
    });
  }
});







</script>

