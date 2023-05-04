<?php

defined('BASEPATH') or exit('No direct script access allowed');
if (isset($this->session->userdata['logged_in'])) {
  $user_id = ($this->session->userdata['logged_in']['user_id']);
  $username = ($this->session->userdata['logged_in']['username']);
  $email = ($this->session->userdata['logged_in']['email']);
  $first = ($this->session->userdata['logged_in']['first_name']);
  $last = ($this->session->userdata['logged_in']['last_name']);
  $iduser = ($this->session->userdata['logged_in']['user_id']);
  $permission = ($this->session->userdata['logged_in']['permission']);
}else{
  
}
$uri = $_SERVER['REQUEST_URI']; 
$user_id_prof = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
$user_id_prof = strtok($user_id_prof, '/');

$profileId = strtok($user_id_prof, '/');
if($profileId == "CodeIgniter-3.1.10"){
  $profileId = $user_id;
}



$this->load->view('header/top');

?>

<style>
 /* relevant styles */
.img__wrap {
  position: relative;
  height: fit-content;
  width: fit-content;
  max-width: 100%;
}

#banner{
  width: 100%;
}

.img__description_layer {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(36, 62, 206, 0.6);
  color: #fff;
  visibility: hidden;
  opacity: 0;
  display: flex;
  align-items: center;
  justify-content: center;

  /* transition effect. not necessary */
  transition: opacity .2s, visibility .2s;
}

.img__wrap:hover .img__description_layer {
  visibility: visible;
  opacity: 1;
}

.img__description {
  transition: .2s;
  transform: translateY(1em);
}

.img__wrap:hover .img__description {
  transform: translateY(0);
}


 
  .search-container {
  position: relative;
  display: inline-block;
}

.search-input {
  padding: 8px 16px;
  font-size: 16px;
  border-radius: 4px;
  border: 1px solid #ccc;
  width: 250px;
  margin-bottom: 16px;
}

.search-results {
  position: absolute;
  z-index: 1;
  width: 250px;
  height: 120px;
  max-height: 200px;
  overflow-y: auto;
  background-color: #fff;
  border: 1px solid #ccc;
  border-top: none;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}

.search-results div {
  padding: 8px 16px;
  cursor: pointer;
}

.search-results div:hover {
  background-color: #f2f2f2;
}

.search-results div.result-highlight {
  background-color: #ddd;
}

.search-results-container-2 {
  top: 44px;
}

.search-results-container-1 {
  top: 44px;
}
</style>
<script>

function confirmActionListpublic(public) {
    var response = confirm("Are you sure?");
    if (response) {
      if(public == 0){
        window.location="<?= base_url() ?>index.php/publicprofile/<?= $user_id?>"
      }else{
        window.location="<?= base_url() ?>index.php/privateprofile/<?= $user_id?>"

      }
    }
  }
</script>


<br><br>
  <?php 

    //see if its in user page
    /*$test = $_SERVER['REQUEST_URI'];
    $expected_result = '/CodeIgniter-3.1.10/index.php/login_enter';
    $test_name = 'check to see if user page';
    echo $this->unit->run($test, $expected_result, $test_name);*/
    ?>

<div class="container-fluid no-padding">
  <div id="my-row" class="row">
    <div class="col-sm-1" ></div>
    <div class="col-sm-10"  >
    
    <?php 
   $lastslashurl = substr($uri, strrpos($uri, '/'));
   $listtype = substr($lastslashurl, -1);
   if($user_id == $profileId){
    foreach($state as $prof){
        if(empty($contents[0])){
          $listId=0;
        }else{
          if(empty($contentslist[0][0]->list_id)){
            $listId = $contents[0]->list_id;
          }else{
            $listId = $contentslist[0][0]->list_id;
          }
          
        }
          
        if(basename($uri) == "supportform"  && substr($uri, -1) == "/"){?>
         <div class="img__wrap banner_wrap" data-target='#Modalbanner' data-toggle='modal' id="banner" data-banner="<?php echo "../../uploads/$prof->profile_banner" ?>"><?php
          echo "<img src='../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             <p class="img__description">Edit Banner</p>
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
            <div class="img__wrap profile_wrap" data-target='#Modal4' data-toggle='modal' data-profimg="<?php echo "../../uploads/$prof->avatar" ?>"><?php
              echo "<img src='../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                <p class="img__description">Edit Profile</p>
                </div>
              </div>              
            </div>
            <div class="col-sm-6" style="color:white;">
            
              <?php echo "Username: ".base64_decode($prof->username).'   '; ?>
              <i class="fa fa-pencil " aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/user_info"'></i><br>
              <?php echo "Gender: ".$prof->gender.'<br>';
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-2"><?php
              if($profileId == $user_id){
                if($state[0]->profile_state == 0){?>
                  <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Public</button><br>
                <?php }else{?>
                <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Private</button><br>
                <?php } 
              }
            ?></div>
             <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
          <?php
    
        }else if(basename($uri) == "supportform"){
          ?>
         <div class="img__wrap banner_wrap" data-target='#Modalbanner' data-toggle='modal' id="banner" data-banner="<?php echo "../uploads/$prof->profile_banner" ?>"><?php
           echo "<img src='../uploads/$prof->profile_banner'class='img__img' alt='banner' height='200px' width='100%' ><br>";
           ?><div class="img__description_layer">
              <p class="img__description">Edit Banner</p>
              </div>
            </div>
           <div class="row">
            <div class="col-sm-2" >
            <div class="img__wrap profile_wrap" data-target='#Modal4' data-toggle='modal' data-profimg="<?php echo "../uploads/$prof->avatar" ?>"><?php
              echo "<img src='../uploads/$prof->avatar'class='img__img' width='100px'><br>";
              ?><div class="img__description_layer">
                <p class="img__description">Edit Profile</p>
                </div>
              </div>           
            </div>
            <div class="col-sm-6" style="color:white;">
            <?php echo "Username: ".base64_decode($prof->username).'   '; ?>
							  <i class="fa fa-pencil " aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/user_info"'></i><br>

              <?php echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-2"><?php
              if($profileId == $user_id){
                if($state[0]->profile_state == 0){?>
                  <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Public</button><br>
                <?php }else{?>
                <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Private</button><br>
                <?php } 
              }
            ?></div>
             <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>
          </div>
          
         <?php
          
        }else if($lastslashurl == '/' || $lastslashurl == "/".$listId){
          ?>
         <div class="img__wrap banner_wrap" data-target='#Modalbanner' data-toggle='modal' id="banner" data-banner="<?php echo "../../../../uploads/$prof->profile_banner" ?>"><?php
           echo "<img src='../../../../uploads/$prof->profile_banner'class='img__img' alt='banner' height='200px' width='100%' ><br>";
           ?><div class="img__description_layer">
              <p class="img__description">Edit Banner</p>
              </div>
            </div>
           <div class="row">
            <div class="col-sm-2" >
            <div class="img__wrap profile_wrap" data-target='#Modal4' data-toggle='modal' data-profimg="<?php echo "../../../../uploads/$prof->avatar" ?>"><?php
              echo "<img src='../../../../uploads/$prof->avatar'class='img__img' width='100px'><br>";
              ?><div class="img__description_layer">
                <p class="img__description">Edit Profile</p>
                </div>
              </div>           
            </div>
            <div class="col-sm-6" style="color:white;">              <?php echo "Username: ".base64_decode($prof->username).'   '; ?>

							  <i class="fa fa-pencil " aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/user_info"'></i><br>

              <?php echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-2"><?php
              if($profileId == $user_id){
                if($state[0]->profile_state == 0){?>
                  <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Public</button><br>
                <?php }else{?>
                <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Private</button><br>
                <?php } 
              }
            ?></div>
             <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>
          </div>
          
         <?php
          
        }else if($lastslashurl == "/$profileId" && $profileId != $listtype){ ?> 
         <div class="img__wrap banner_wrap" data-target='#Modalbanner' data-toggle='modal' id="banner" data-banner="<?php echo "../../uploads/$prof->profile_banner" ?>"><?php
          echo "<img src='../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             <p class="img__description">Edit Banner</p>
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="img__wrap profile_wrap" data-target='#Modal4' data-toggle='modal' data-profimg="<?php echo "../../uploads/$prof->avatar" ?>"><?php
              echo "<img src='../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                <p class="img__description">Edit Profile</p>
                </div>
              </div>              
            </div>
            <div class="col-sm-6" style="color:white;">
            <?php echo "Username: ".base64_decode($prof->username).'   '; ?>

							  <i class="fa fa-pencil " aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/user_info"'></i><br>

              <?php echo "Gender: ".$prof->gender.'<br>';
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-2"><?php
              if($profileId == $user_id){
                if($state[0]->profile_state == 0){?>
                  <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Public</button><br>
                <?php }else{?>
                <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Private</button><br>
                <?php } 
              }
            ?></div>
             <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
         <?php
        }else if($lastslashurl == "/$listtype" && $profileId != $listtype){ 
          ?>
         <div class="img__wrap banner_wrap" data-target='#Modalbanner' data-toggle='modal' id="banner" data-banner="<?php echo "../../../../uploads/$prof->profile_banner" ?>"><?php
           echo "<img src='../../../../uploads/$prof->profile_banner'class='img__img' alt='banner' height='200px' width='100%' ><br>";
           ?><div class="img__description_layer">
              <p class="img__description">Edit Banner</p>
              </div>
            </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="img__wrap profile_wrap" data-target='#Modal4' data-toggle='modal' data-profimg="<?php echo "../../../../uploads/$prof->avatar" ?>"><?php
              echo "<img src='../../../../uploads/$prof->avatar'class='img__img' width='100px'><br>";
              ?><div class="img__description_layer">
                <p class="img__description">Edit Profile</p>
                </div>
              </div>           
            </div>
            <div class="col-sm-6" style="color:white;">
            <?php echo "Username: ".base64_decode($prof->username).'   '; ?>

							  <i class="fa fa-pencil " aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/user_info"'></i><br>

              <?php echo "Gender: ".$prof->gender.'<br>';
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-2"><?php
              if($profileId == $user_id){
                if($state[0]->profile_state == 0){?>
                  <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Public</button><br>
                <?php }else{?>
                <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Private</button><br>
                <?php } 
              }
            ?></div>
             <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>
          </div>
          <?php
         
        }else if($lastslashurl == "/$listtype" && $profileId == $listtype && $uri != "/CodeIgniter-3.1.10/index.php/profile/$profileId"){
          ?>

<div class="img__wrap banner_wrap" data-target='#Modalbanner' data-toggle='modal' id="banner" data-banner="<?php echo "../../../../uploads/$prof->profile_banner" ?>"><?php
           echo "<img src='../../../../uploads/$prof->profile_banner'class='img__img' alt='banner' height='200px' width='100%' ><br>";
           ?><div class="img__description_layer">
              <p class="img__description">Edit Banner</p>
              </div>
            </div>
           <div class="row">
            <div class="col-sm-2" >
            <div class="img__wrap profile_wrap" data-target='#Modal4' data-toggle='modal' data-profimg="<?php echo "../../../../uploads/$prof->avatar" ?>"><?php
              echo "<img src='../../../../uploads/$prof->avatar'class='img__img' width='100px'><br>";
              ?><div class="img__description_layer">
                <p class="img__description">Edit Profile</p>
                </div>
              </div>           
            </div>
            <div class="col-sm-6" style="color:white;">              <?php echo "Username: ".base64_decode($prof->username).'   '; ?>

							  <i class="fa fa-pencil " aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/user_info"'></i><br>

              <?php echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-2"><?php
              if($profileId == $user_id){
                if($state[0]->profile_state == 0){?>
                  <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Public</button><br>
                <?php }else{?>
                <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Private</button><br>
                <?php } 
              }
            ?></div>
             <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>
          </div>
          
          <?php
        }else if($lastslashurl == "/$profileId"){ 
         ?>
         <div class="img__wrap banner_wrap" data-target='#Modalbanner' data-toggle='modal' id="banner" data-banner="<?php echo "../../uploads/$prof->profile_banner" ?>"><?php
          echo "<img src='../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             <p class="img__description">Edit Banner</p>
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="img__wrap profile_wrap" data-target='#Modal4' data-toggle='modal' data-profimg="<?php echo "../../uploads/$prof->avatar" ?>"><?php
              echo "<img src='../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                <p class="img__description">Edit Profile</p>
                </div>
              </div>              
            </div>
            <div class="col-sm-6" style="color:white;">              <?php echo "Username: ".base64_decode($prof->username).'   '; ?>

							  <i class="fa fa-pencil " aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/user_info"'></i><br>

              <?php echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-2"><?php
              if($profileId == $user_id){
                if($state[0]->profile_state == 0){?>
                  <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Public</button><br>
                <?php }else{?>
                <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Private</button><br>
                <?php } 
              }
            ?></div>
             <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
         <?php

        }else if(basename($uri) == "add_user" || basename($uri) == "edit_user" || basename($uri) == "add_image" || basename($uri) == "edit_image" || basename($uri) == "add_staff" || basename($uri) == "edit_staff" || basename($uri) == "add_characters" || basename($uri) == "edit_characters" || basename($uri) == "add_genre" || basename($uri) == "edit_genre" || basename($uri) == "add_studio" || basename($uri) == "edit_studio" || basename($uri) == "user_info" || basename($uri) == "add_notification" || basename($uri) == "edit_notification"  ){ ?>
         <div class="img__wrap banner_wrap" data-target='#Modalbanner' data-toggle='modal' id="banner" data-banner="<?php echo "../uploads/$prof->profile_banner" ?>"><?php
          echo "<img src='../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             <p class="img__description">Edit Banner</p>
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
            <div class="img__wrap profile_wrap" data-target='#Modal4' data-toggle='modal' data-profimg="<?php echo "../uploads/$prof->avatar" ?>"><?php
              echo "<img src='../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                <p class="img__description">Edit Profile</p>
                </div>
              </div>              
            </div>
            <div class="col-sm-6" style="color:white;">              <?php echo "Username: ".base64_decode($prof->username).'   '; ?>

							  <i class="fa fa-pencil " aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/user_info"'></i><br>

              <?php echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-2"><?php
              if($profileId == $user_id){
                if($state[0]->profile_state == 0){?>
                  <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Public</button><br>
                <?php }else{?>
                <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Private</button><br>
                <?php } 
              }
            ?></div>
             <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
          <?php
    
        }else{ 
          ?>
         <div class="img__wrap banner_wrap" data-target='#Modalbanner' data-toggle='modal' id="banner" data-banner="<?php echo "../../../uploads/$prof->profile_banner" ?>"><?php
          echo "<img src='../../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             <p class="img__description">Edit Banner</p>
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
            <div class="img__wrap profile_wrap" data-target='#Modal4' data-toggle='modal' data-profimg="<?php echo "../../../uploads/$prof->avatar" ?>"><?php
              echo "<img src='../../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                <p class="img__description">Edit Profile</p>
                </div>
              </div>              
            </div>
            <div class="col-sm-6" style="color:white;">              <?php echo "Username: ".base64_decode($prof->username).'   '; ?>

							  <i class="fa fa-pencil " aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/user_info"'></i><br>

              <?php echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-2"><?php
              if($profileId == $user_id){
                if($state[0]->profile_state == 0){?>
                  <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Public</button><br>
                <?php }else{?>
                <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $state[0]->profile_state?>)'>Make Private</button><br>
                <?php } 
              }
            ?></div>
             <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
          <?php
        }

    }








   }else{
    foreach($state as $prof){
      if(empty($contents[0])){
        $listId=0;
      }else{
        $listId = $contents[0]->list_id;
      }

      if($lastslashurl == '/' || $lastslashurl == "/".$listId){
        ?>
        <div class="" id="banner"><?php
          echo "<img src='../../../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class=""><?php
              echo "<img src='../../../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username).'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){

                
                if (isset($this->session->userdata['logged_in'])) {
                  
                  if (($key = array_search($profileId, $checkpreferenceslike)) !== false){ ?>
                  <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikeduser/<?= $profileId ?>"'></i>
                  <?php }else if (($key = array_search($profileId, $checkpreferencesdislike)) !== false){ ?>
                  <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikeduser/<?= $profileId ?>"' ></i>
                  <?php }else{ ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikeduser/<?= $profileId ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikeduser/<?= $profileId ?>"' ></i>
                  <?php }
                  
                  if (($key = array_search($profileId, $checkblockeduser)) !== false){ ?>
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unblock/<?= $user_id_prof?>"'>Unblock User</button><br>
                  <?php }else{
                    if($followprofile == 0){
                    ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
                  
                    }else if($followprofile == $user_id_prof){
                    ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                    }
                    ?>
                    
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/block/<?= $user_id_prof?>"'>Block User</button><br>
                
                  <?php }?> 
                
                <?php }
                
                echo "<p class='myImages'id='banner' data-target='#ModalReport' data-toggle='modal' alt='banner' width='10%' >Report</p><br>";
                }              

            ?>

          
            </div>
            <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
        <?php
      }else if($lastslashurl == "/$profileId" && $profileId != $listtype){ 
        ?>
        <div class=""  id="banner"><?php
          echo "<img src='../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="" ><?php
              echo "<img src='../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username).'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){
                if (isset($this->session->userdata['logged_in'])) {
                  if (($key = array_search($profileId, $checkpreferenceslike)) !== false){ ?>
                    <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikeduser/<?= $profileId ?>"'></i>
                  <?php }else if (($key = array_search($profileId, $checkpreferencesdislike)) !== false){ ?>
                    <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikeduser/<?= $profileId ?>"' ></i>
                  <?php }else{ ?>
                    <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikeduser/<?= $profileId ?>"'></i>
                    <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikeduser/<?= $profileId ?>"' ></i>
                    <?php }
                    
                    if (($key = array_search($profileId, $checkblockeduser)) !== false){ ?>
                      <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unblock/<?= $user_id_prof?>"'>Unblock User</button><br>
                    <?php }else{
                      if($followprofile == 0){
                        ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
                  
                      }else if($followprofile == $user_id_prof){
                        ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                      }
                      ?>
                      
                      <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/block/<?= $user_id_prof?>"'>Block User</button><br>

                    <?php }?> 
              
              <?php }
                
                echo "<p class='myImages'id='banner' data-target='#ModalReport' data-toggle='modal' alt='banner' width='10%' >Report</p><br>";
              }            

            ?></div>
            <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
        <?php
      }else if($lastslashurl == "/$listtype" && $profileId != $listtype){ 
        ?>
        <div class="" id="banner"><?php
          echo "<img src='../../../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class=""><?php
              echo "<img src='../../../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username).'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){

                
                if (isset($this->session->userdata['logged_in'])) {
                  
                  if (($key = array_search($profileId, $checkpreferenceslike)) !== false){ ?>
                  <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikeduser/<?= $profileId ?>"'></i>
                  <?php }else if (($key = array_search($profileId, $checkpreferencesdislike)) !== false){ ?>
                  <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikeduser/<?= $profileId ?>"' ></i>
                  <?php }else{ ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikeduser/<?= $profileId ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikeduser/<?= $profileId ?>"' ></i>
                  <?php }
                  
                  if (($key = array_search($profileId, $checkblockeduser)) !== false){ ?>
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unblock/<?= $user_id_prof?>"'>Unblock User</button><br>
                  <?php }else{
                    if($followprofile == 0){
                    ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
                  
                    }else if($followprofile == $user_id_prof){
                    ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                    }
                    ?>
                    
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/block/<?= $user_id_prof?>"'>Block User</button><br>
                
                  <?php }?> 
                
                <?php }
                
                echo "<p class='myImages'id='banner' data-target='#ModalReport' data-toggle='modal' alt='banner' width='10%' >Report</p><br>";
                }               

            ?></div>
            <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
        <?php
      }else if($lastslashurl == "/$listtype" && $profileId == $listtype && $uri != "/CodeIgniter-3.1.10/index.php/profile/$profileId"){
        ?>
        <div class="" id="banner"><?php
          echo "<img src='../../../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="" ><?php
              echo "<img src='../../../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username).'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){

                
                if (isset($this->session->userdata['logged_in'])) {
                  
                  if (($key = array_search($profileId, $checkpreferenceslike)) !== false){ ?>
                  <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikeduser/<?= $profileId ?>"'></i>
                  <?php }else if (($key = array_search($profileId, $checkpreferencesdislike)) !== false){ ?>
                  <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikeduser/<?= $profileId ?>"' ></i>
                  <?php }else{ ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikeduser/<?= $profileId ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikeduser/<?= $profileId ?>"' ></i>
                  <?php }
                  
                  if (($key = array_search($profileId, $checkblockeduser)) !== false){ ?>
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unblock/<?= $user_id_prof?>"'>Unblock User</button><br>
                  <?php }else{
                    if($followprofile == 0){
                    ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
                  
                    }else if($followprofile == $user_id_prof){
                    ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                    }
                    ?>
                    
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/block/<?= $user_id_prof?>"'>Block User</button><br>
                
                  <?php }?> 
                
                <?php }
                
                echo "<p class='myImages'id='banner' data-target='#ModalReport' data-toggle='modal' alt='banner' width='10%' >Report</p><br>";
                }               

            ?></div>
            <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
        <?php
      }else if($lastslashurl == "/$profileId"){ 
        ?>
        <div class="" id="banner"><?php
          echo "<img src='../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class=""><?php
              echo "<img src='../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username).'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){

                
                if (isset($this->session->userdata['logged_in'])) {
                  
                  if (($key = array_search($profileId, $checkpreferenceslike)) !== false){ ?>
                  <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikeduser/<?= $profileId ?>"'></i>
                  <?php }else if (($key = array_search($profileId, $checkpreferencesdislike)) !== false){ ?>
                  <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikeduser/<?= $profileId ?>"' ></i>
                  <?php }else{ ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikeduser/<?= $profileId ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikeduser/<?= $profileId ?>"' ></i>
                  <?php }
                  
                  if (($key = array_search($profileId, $checkblockeduser)) !== false){ ?>
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unblock/<?= $user_id_prof?>"'>Unblock User</button><br>
                  <?php }else{
                    if($followprofile == 0){
                    ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
                  
                    }else if($followprofile == $user_id_prof){
                    ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                    }
                    ?>
                    
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/block/<?= $user_id_prof?>"'>Block User</button><br>
                
                  <?php }?> 
                
                <?php }
                
                echo "<p class='myImages'id='banner' data-target='#ModalReport' data-toggle='modal' alt='banner' width='10%' >Report</p><br>";
                }               

            ?></div>
            <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
        <?php
      }else{   
        ?>
        <div class=""  id="banner"><?php
          echo "<img src='../../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class=""><?php
              echo "<img src='../../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username).'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){

                
                if (isset($this->session->userdata['logged_in'])) {
                  
                  if (($key = array_search($profileId, $checkpreferenceslike)) !== false){ ?>
                  <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikeduser/<?= $profileId ?>"'></i>
                  <?php }else if (($key = array_search($profileId, $checkpreferencesdislike)) !== false){ ?>
                  <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikeduser/<?= $profileId ?>"' ></i>
                  <?php }else{ ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikeduser/<?= $profileId ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikeduser/<?= $profileId ?>"' ></i>
                  <?php }
                  
                  if (($key = array_search($profileId, $checkblockeduser)) !== false){ ?>
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unblock/<?= $user_id_prof?>"'>Unblock User</button><br>
                  <?php }else{
                    if($followprofile == 0){
                    ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
                  
                    }else if($followprofile == $user_id_prof){
                    ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                    }
                    ?>
                    
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/block/<?= $user_id_prof?>"'>Block User</button><br>
                
                  <?php }?> 
                
                <?php }
                
                echo "<p class='myImages'id='banner' data-target='#ModalReport' data-toggle='modal' alt='banner' width='10%' >Report</p><br>";
                }                

            ?></div>
            <div class="col-sm-2">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/following/">Following: <?php echo $follow[0]?></a><br>
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/followers/">Followers: <?php echo $follow[1]?></a><br><br>
            </div>
            <div class="col-sm-1">
            </div>

          </div>
        <?php
      }
      
    }
   }

if(!empty($state[0])){
  
  if($user_id_prof == $user_id){
    $state[0]->profile_state = 1;
  }
  if($uri == "/CodeIgniter-3.1.10/index.php/user_info"){
    $profileId = $user_id;
  }
  if($state[0]->profile_state == 0 && $user_id != $profileId){
      echo "<h1>You cannot view this profile</h1>";
  }else if(($key = array_search($user_id, $checkuserblocked)) !== false){
        echo "<h1> You cannot view this profile </h1>";

  }else{
  ?>    
  
  </div>

    <div class="col-sm-1" ></div>

  </div>
</div>
   
      <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <nav class="navbar navbar-expand-lg navbar-light" >
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="row">
      <div class="collapse navbar-collapse" id="navbarNav" ><!-- style="background-color: yellow;"-->
        <ul class="navbar-nav">
          
              <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist">MOVIES</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
              <li class="nav-item" >
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist">SHOWS</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist">BOOKS</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist">GAMES</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/rating/"  >RATING</a><br>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/customlist/"  >Custom List</a><br>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/comments/1">COMMENTS</a><br><br>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/liked">Liked</a><br><br>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/disliked">Disliked</a><br><br>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/recommendations">RECOMMENDATIONS</a><br><br>
              </li>


        </ul>
      </div>
      </nav>
    </div>
    
    <div class="col-sm-1" >
      
      </div>
  </div>
   
      <?php
      }
    }
  
      ?>


<div class="modal" id="Modal4" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo "<img src='../uploads/".$state[0]->avatar."'class='myImages' id='profielImg' alt='profile' width='100px' height='80px' ><br>"; ?>
      <?php echo form_open_multipart("upload_new_avatar/$user_id");?>
        <input type="file" name="avatar" size="20" />
        <input type="submit" value="upload" />
        </form>
      </div>
  </div>
</div>
</div>

<div class="modal" id="ModalReport" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Report profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open('report/'.$profileId);?>

        <select name='content_type' id="content_type">
            <option value="" disabled selected>Select</option>
            <option value='Offensive'>Offensive</option>
            <option value='Trolling'>Trolling</option>
            <option value='Spam'>Spam</option>
            <option value='Bot'>Bot</option>

        </select>
        <?php
        
        echo form_label('Title: ');
        echo "<br/>";
        echo form_input('title');
        echo "<br/>";
        echo "<br/>";
        
        echo form_label('Text: ');
        echo "<br/>";
        echo form_input('text');
        echo "<br/>";
        echo "<br/>";
        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo 'This field cannot be empty.';
        }
        echo "</div>";
        echo form_submit('submit', 'Send report', 'class="btn btn-primary" style="background-color:#1584ab"');

        echo form_close();?>
        </form>
      </div>
  </div>
</div>
</div>


<div class="modal" id="Modalbanner" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo "<img src='../uploads/".$state[0]->profile_banner."'class='myImages' id='bannerimg' alt='banner' width='100%' height='80px' ><br>"; ?>
        <?php echo form_open_multipart("upload_new_banner/$user_id");?>
            <input type="file" name="avatar" size="20" />
            <input type="submit" value="upload" />
            </form>
      </div>
    </div>
</div>
</div>
</div>


<script>
  $(document).on("click", ".banner_wrap", function () {
      document.getElementById("bannerimg").src=($(this).data('banner'));
  });

  $(document).on("click", ".profile_wrap", function () {
      document.getElementById("profielImg").src=($(this).data('profimg'));
  });
</script>