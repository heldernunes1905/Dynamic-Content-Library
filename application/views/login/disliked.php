<?php
 $uri = $_SERVER['REQUEST_URI']; 
 $user_id_prof = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
 $user_id_prof = strtok($user_id_prof, '/');

if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
   
    $this->load->view('login/insideheader/header');
}else{
  $this->load->view('login/insideheader/headernotlog');
  $user_id = $user_id_prof;
}

if(!empty($checkuserblocked)|| !isset($this->session->userdata['logged_in'])){
  $checkuserblocked = array();

if(($key = array_search($user_id, $checkuserblocked)) !== false || $state[0]->profile_state == 0){
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
              <a href="<?= base_url() ?>index.php/profile/<?= $user_id_prof ?>/disliked">All</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $user_id_prof ?>/disliked/1">Content</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $user_id_prof ?>/disliked/2">Genre</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $user_id_prof ?>/disliked/3">Character</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $user_id_prof ?>/disliked/4">Studio</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $user_id_prof ?>/disliked/5">Producer</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $user_id_prof ?>/disliked/6">Writer</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $user_id_prof ?>/disliked/7">Actor</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $user_id_prof ?>/disliked/8">User</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </ul>
      </div>
      </nav>
    </div>

    <div class="col-sm-1" >
      </div>
  </div>
  </div>


          <div class="container-fluid no-padding">
            <div class="row">
              <div class="col-sm-1" >
              </div>
              <div class="col-sm-10"  >
              <?php if(!empty($likecontent)){
                  //liked content from user
                  foreach($likecontent as $likedc){ ?>
                    <a href="<?= base_url() ?>index.php/display/<?= $likedc[0]->contentId ?>">

                    <?php
                    echo "Content Title: ".$likedc[0]->title.'<br>';
                    echo "Content Image: ".$likedc[0]->images.'<br><br>';?> </a> <?php
                  }
                } 
                ?>
            </div>
            <div class="col-sm-1" >
              
              </div>
            </div>
          </div>

   
   
        
        <div class="container-fluid no-padding">
            <div class="row">
              <div class="col-sm-1" >
              </div>
              <div class="col-sm-10"  >
              <?php if(!empty($likecharacters)){
                  //liked content from user
                  foreach($likecharacters as $likedc){ 
            ?>
            <a href="<?= base_url() ?>index.php/characters/<?= $likedc[0]->character_id ?>">


                    <?php
                    echo "Character Name: ".$likedc[0]->first_name.' '.$likedc[0]->last_name.'<br>';
                    echo "Character Image: ".$likedc[0]->pictures.'<br><br>';?> </a> <?php
                  }
                } 
                ?>
            </div>
            <div class="col-sm-1" >
              
              </div>
            </div>
          </div>




          <div class="container-fluid no-padding">
            <div class="row">
              <div class="col-sm-1" >
              </div>
              <div class="col-sm-10"  >
              <?php  //liked studios from user
                    if(!empty($likestudios)){

                    foreach($likestudios as $likeds){ 
                        ?>
                    <a href="<?= base_url() ?>index.php/studio/<?= $likeds[0]->studio_id ?>">

                        <?php
                        echo "Studio Description: ".$likeds[0]->description.'<br>';
                        echo "Date Created: ".$likeds[0]->date_created.'<br>';

                        echo "Studio first name: ".$likeds[0]->first_name.'<br>';
                        echo "Studio last name: ".$likeds[0]->last_name.'<br><br>'; ?> </a> <?php
                    }
                  }
                ?>
            </div>
            <div class="col-sm-1" >
              
              </div>
            </div>
          </div>
    
       
          <div class="container-fluid no-padding">
            <div class="row">
              <div class="col-sm-1" >
              </div>
              <div class="col-sm-10"  >
              <?php  //liked studios from user
                    
                      if(!empty($likeproducer)){

                        //liked producer from user
                        foreach($likeproducer as $likedp){
                            ?>
                            <a href="<?= base_url() ?>index.php/staff/<?= $likedp[0]->staff_id ?>">

                            <?php
                            echo "Producer Picture: ".$likedp[0]->pictures.'<br>';

                            echo "Producer first name: ".$likedp[0]->first_name.' ';
                            echo $likedp[0]->last_name.'<br><br>';?> </a> <?php
                        }
                    }
                ?>
            </div>
            <div class="col-sm-1" >
              
              </div>
            </div>
          </div>

          <div class="container-fluid no-padding">
            <div class="row">
              <div class="col-sm-1" >
              </div>
              <div class="col-sm-10"  >
              <?php  //liked studios from user
                    
                    if(!empty($likewriter[0])){
                      //liked writer from user

                      foreach($likewriter as $likedw){ 

                          ?>
                          <a href="<?= base_url() ?>index.php/staff/<?= $likedw[0]->staff_id ?>">
          
                          <?php
                          echo "Writer Pictures: ".$likedw[0]->pictures.'<br>';
          
                          echo "Writer first name: ".$likedw[0]->first_name.' ';
                          echo $likedw[0]->last_name.'<br><br>';?> </a> <?php
                      }
                  }
                ?>
            </div>
            <div class="col-sm-1" >
              
              </div>
            </div>
          </div>


        

        <div class="container-fluid no-padding">
            <div class="row">
              <div class="col-sm-1" >
              </div>
              <div class="col-sm-10"  >
              <?php  //liked studios from user
                    
              if(!empty($likeactor[0])){
                //liked actors from user
                foreach($likeactor as $likeda){ 
                    ?>
                    <a href="<?= base_url() ?>index.php/staff/<?= $likeda[0]->staff_id ?>">
    
                    <?php
                    echo "Actor Description: ".$likeda[0]->pictures.'<br>';
                    
                    echo "Actor first name: ".$likeda[0]->first_name.' ';
                    echo $likeda[0]->last_name.'<br><br>';?> </a> <?php
                }
            }
                ?>
            </div>
            <div class="col-sm-1" >
              
              </div>
            </div>
          </div>
         

          <div class="container-fluid no-padding">
            <div class="row">
              <div class="col-sm-1" >
              </div>
              <div class="col-sm-10"  >
              <?php  //liked studios from user
                    
              if(!empty($likeuser)){
                //liked actors from user
                foreach($likeuser as $likeda){ 
                    ?>
                    <a href="<?= base_url() ?>index.php/profile/<?= $likeda[0]->user_id ?>">
    
                    <?php
                    echo "Username: ".base64_decode($likeda[0]->username).'<br>';
                    
                    echo "User image: ".$likeda[0]->avatar.' ';
                    echo $likeda[0]->last_name.'<br><br>';?> </a> <?php
                }
            }
                ?>
            </div>
            <div class="col-sm-1" >
              
              </div>
            </div>
          </div>

<?php
}
}
$this->load->view('header/bottom');
?>