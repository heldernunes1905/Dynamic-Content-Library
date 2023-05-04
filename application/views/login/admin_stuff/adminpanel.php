<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
} else {
    header("location: login");
}

?>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.sidenav ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.sidenav li {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav li:hover {
  color: #f1f1f1;
}

.dropdown-menu li {
  padding: 0;
  margin: 0;
}

.dropdown-menu li a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.dropdown-menu li a:hover {
  color: #f1f1f1;
}


</style>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a class="dropdown-item" href="<?= base_url() ?>index.php">HOME</a>
  <div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/add_user">Add Users</a></li>
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/edit_user">Edit/Delete User Info</a></li>
    </ul>
  </div>
  <div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Content</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/add_image">Add Content</a></li>
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/edit_image">Edit/Delete Content</a></li>
    </ul>
  </div>
  <div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Staff</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/add_staff">Add Staff</a></li>
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/edit_staff">Edit/Delete Staff</a></li>
    </ul>
  </div>
  <div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Characters</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/add_characters">Add Characters</a></li>
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/edit_characters">Edit/Delete Characters</a></li>
    </ul>
  </div>
  <div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Genre</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/add_genre">Add Genre</a></li>
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/edit_genre">Edit/Delete Genre</a></li>
    </ul>
  </div>
  <div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Studio</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/add_studio">Add Studio</a></li>
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/edit_studio">Edit/Delete Studio</a></li>
    </ul>
  </div>
  <div class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Notification</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/add_notification">Add Notification</a></li>
      <li><a class="dropdown-item" href="<?= base_url() ?>index.php/edit_notification">Edit/Delete Notification</a></li>
    </ul>
  </div>

  
</div>



  </div>



<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   