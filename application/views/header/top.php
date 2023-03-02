	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	if (isset($this->session->userdata['logged_in'])) {
		$user_id = ($this->session->userdata['logged_in']['user_id']);
		$username = ($this->session->userdata['logged_in']['username']);
		$email = ($this->session->userdata['logged_in']['email']);
		$first = ($this->session->userdata['logged_in']['first_name']);
		$last = ($this->session->userdata['logged_in']['last_name']);
	}

	?><!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>others/css/menu.css"><!-- CSS menu -->
	<script src="<?php echo base_url(); ?>others/js/comment.js"></script>

		<title>Online Catalogue</title>
		<style>
	.carousel-inner > .item > img,
	.carousel-inner > .item > a > img {
		width: 80%;
		height: 500px !important;
		margin: auto;
	}
	.dropdown {
  float: left;
  position: relative;
	}

	.dropdown .dropbtn {
	font-size: 16px;
	border: none;
	outline: none;
	color: white;
	padding: 14px 16px;
	background-color: inherit;
	font-family: inherit;
	margin: 0;
	}

	.topnav a:hover,
	.dropdown:hover .dropbtn {
	background-color: red;
	}

	.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f9f9f9;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
	z-index: 1;
	}

	.dropdown-content a {
	float: none;
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
	text-align: left;
	}

	.dropdown-content a:hover {
	background-color: #ddd;
	}

	.dropdown:hover .dropdown-content {
	display: block;
	}
	</style>
	</head>
	<body>

		<div class="topnav" id="myTopnav">
			<a href="<?=base_url()?>" class="" id="home">Home</a>
			<div class="dropdown">
				<button class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/movie';">Movie list</button>
				<div class="dropdown-content">
					<a href="#">movie 1</a>
					<a href="#">movie 2</a>
					<a href="#">movie 3</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/show';">Tv Show List</button>
				<div class="dropdown-content">
					<a href="#">show 1</a>
					<a href="#">show 2</a>
					<a href="#">show 3</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/game';">Game list</button>
				<div class="dropdown-content">
					<a href="#">game 1</a>
					<a href="#">game 2</a>
					<a href="#">game 3</a>
				</div>
			</div>
			<div class="dropdown">
				<button class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/book';">Book list</button>
				<div class="dropdown-content">
					<a href="#">book 1</a>
					<a href="#">book 2</a>
					<a href="#">book 3</a>
				</div>
			</div>
			
			<a href="<?=base_url()?>index.php/forum" class="" id="forum">Forum</a>
			
			<?php
				if($this->session->userdata('logged_in')){ ?>
					<div  class="dropdown">
						<button  class="dropbtn" onclick="location.href = '<?=base_url()?>index.php/profile/<?= $user_id ?>';" id="login">Profile</button>
						
						<div class="dropdown-content">
							<a href="#">Profile 1</a>
							<a href="#">Profile 2</a>
							<a href="#">Profile 3</a>
						</div>
					</div>
					<a href="#" id="login" data-toggle="modal" data-target="#myModalNotifications">Notifications</a>

				<?php }else{?>
					<a style="float:right" href="#" id="login" data-toggle="modal" data-target="#myModal">Login</a>
				<?php }
			?>
			
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
		</div>
		 <!-- Modal -->
		 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
		<?php 
			foreach($notification as $not){
				echo "Title: ".$not->title.'<br>';
				echo "Image: ".$not->image.'<br>';
				echo "Text: ".$not->text.'<br>';
				echo "Date: ".$not->date.'<br>';?>
				<i class="remove fas fa-user-times" onclick="deletenot(<?php echo $not->notification_id;?>)">f</i><br>
			<?php }
		?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
		<div class="text">
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
</script>

