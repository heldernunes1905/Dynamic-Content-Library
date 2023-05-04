<?php
defined('BASEPATH') or exit('No direct script access allowed');
$permission = 0;
$uri = $_SERVER['REQUEST_URI']; 
$user_id_prof = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
$profileId = strtok($user_id_prof, '/');
$user_id = $profileId;

$this->load->view('header/top');

?>

  <?php 
    
    //see if its in user page
    /*$test = $_SERVER['REQUEST_URI'];
    $expected_result = '/CodeIgniter-3.1.10/index.php/login_enter';
    $test_name = 'check to see if user page';
    echo $this->unit->run($test, $expected_result, $test_name);*/
    ?>
<div class="container-fluid no-padding"></div>

<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <?php 
      $lastslashurl = substr($uri, strrpos($uri, '/'));
      $listtype = substr($lastslashurl, -1);
    foreach($state as $prof){
      if(empty($contents[0])){
        $listId=0;
      }else{
        if(empty($contentslist)){
          $listId = $contents[0]->list_id;
        }else{
          $listId = $contentslist[0][0]->list_id;

        }      }
      if($lastslashurl == '/' || $lastslashurl == "/".$listId){
        ?>
        <div class="img__wrap" data-target='#Modalbanner' data-toggle='modal' id="banner"><?php
          echo "<img src='../../../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="img__wrap" data-target='#Modal4' data-toggle='modal'><?php
              echo "<img src='../../../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username)
.'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){
                if($followprofile == 0){
                  ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
            
                }else if($followprofile == $user_id_prof){
                  ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                }
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
      }else if($lastslashurl == "/$profileId" && $profileId != $listtype){ 
        ?>
        <div class="img__wrap" data-target='#Modalbanner' data-toggle='modal' id="banner"><?php
          echo "<img src='../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="img__wrap" data-target='#Modal4' data-toggle='modal'><?php
              echo "<img src='../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username)
.'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){
                if($followprofile == 0){
                  ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
            
                }else if($followprofile == $user_id_prof){
                  ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                }
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
        <div class="img__wrap" data-target='#Modalbanner' data-toggle='modal' id="banner"><?php
          echo "<img src='../../../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="img__wrap" data-target='#Modal4' data-toggle='modal'><?php
              echo "<img src='../../../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username)
.'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){
                
                if($followprofile == 0){
                  ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
            
                }else if($followprofile == $user_id_prof){
                  ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                }
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
        <div class="img__wrap" data-target='#Modalbanner' data-toggle='modal' id="banner"><?php
          echo "<img src='../../../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="img__wrap" data-target='#Modal4' data-toggle='modal'><?php
              echo "<img src='../../../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username)
.'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){
                
                if($followprofile == 0){
                  ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
            
                }else if($followprofile == $user_id_prof){
                  ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                }
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
        <div class="img__wrap" data-target='#Modalbanner' data-toggle='modal' id="banner"><?php
          echo "<img src='../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="img__wrap" data-target='#Modal4' data-toggle='modal'><?php
              echo "<img src='../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username)
.'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){
                
                if($followprofile == 0){
                  ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
            
                }else if($followprofile == $user_id_prof){
                  ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                }
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
        <div class="img__wrap" data-target='#Modalbanner' data-toggle='modal' id="banner"><?php
          echo "<img src='../../../uploads/$prof->profile_banner'  class='img__img'  alt='banner' height='200px' width='100%'><br>";
          ?><div class="img__description_layer">
             </div>
           </div>
           <div class="row">
            <div class="col-sm-2" >
              <div class="img__wrap" data-target='#Modal4' data-toggle='modal'><?php
              echo "<img src='../../../uploads/$prof->avatar'class='img__img'  alt='profile' width='100px' ><br>";
              ?><div class="img__description_layer">
                </div>
              </div>              
            </div>
            <div class="col-sm-7" style="color:white;"><?php
                echo "Username: ".base64_decode($prof->username)
.'<br>';
                echo "Gender: ".$prof->gender.'<br>';
                
                echo "Bio: ".$prof->bio.'<br>';
            ?></div>
            <div class="col-sm-1"><?php
              if($profileId != $user_id){
                
                if($followprofile == 0){
                  ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php
                }else if($followprofile == $user_id_prof){ 
                  ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php
                }
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
?>
 
    </div>
    <div class="col-sm-1" >
      
      </div>
  </div>
  </div>

   <?php

if(!empty($state[0])){
  if($state[0]->profile_state == 0){
      echo "<h1>You cannot view this profile</h1>";
  }else{
    
      ?>    
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
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/liked">Liked</a><br><br>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/disliked">Disliked</a><br><br>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/comments/1">COMMENTS</a><br><br>
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
  </div>

      <?php
      }
    }
      ?>


