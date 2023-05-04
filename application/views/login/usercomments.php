<?php

$uri = $_SERVER['REQUEST_URI']; 
$profile_id = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
$profile_id = strtok($profile_id, '/');
if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
    $this->load->view('login/insideheader/header');

} else {
    $this->load->view('login/insideheader/headernotlog');
    $user_id = 0;
}
if(!empty($checkuserblocked)|| !isset($this->session->userdata['logged_in'])){
  $checkuserblocked = array();
if(($key = array_search($user_id, $checkuserblocked)) !== false){
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
              
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profile_id ?>/comments/1">USER</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profile_id ?>/comments/2">STAFF</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profile_id ?>/comments/3">CHARACTER</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profile_id ?>/comments/4">FORUMS</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          
        </ul>
      </div>
      </nav>
    </div>

    <div class="col-sm-1" ></div>
</div>
</div>


<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >

      <?php 
        if($state[0]->profile_state == 1){


        foreach($usercomments as $uc){
            
            if($uc->profile_type == 1 ){                    echo "<br><p>COMMENT ON USER PROFILE</p>";
                ?> 
                <div class="row">
                <div class="col-sm-10"  >

                <a href="<?= base_url() ?>index.php/profile/<?= $uc->profile_id ?>"> <?php
                echo "TITLE: ".$uc->comment_title.'<br>';
                echo "COMMENT: ".$uc->comment.'<br>';
                echo "DATE: ".date("d-m-Y", strtotime($uc->date)).'<br><br>';
                ?>
                </a>
                </div>

                <?php if(isset($this->session->userdata['logged_in']) && $user_id==$profile_id){?>

                <div class="col-sm-2"  >
                    <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $uc->comment_id?>'>Remove Comment</button>
                </div>
                <?php  } ?>
                </div>

                <?php
            }else if($uc->profile_type == 2 ){        echo "<br><p>COMMENT ON STAFF PROFILE</p>";
                ?> 
                <div class="row">
                <div class="col-sm-10"  >
                <a href="<?= base_url() ?>index.php/staff/<?= $uc->profile_id ?>"> <?php
                echo "TITLE: ".$uc->comment_title.'<br>';
                echo "COMMENT: ".$uc->comment.'<br>';
                echo "DATE: ".$uc->date.'<br><br>';
                ?>
                </a>
                </div>
                <?php if(isset($this->session->userdata['logged_in']) && $user_id==$profile_id){?>

                <div class="col-sm-2"  >
                    <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $uc->comment_id?>)'>Remove Comment</button>
                </div>
                <?php  } ?>
                </div>

                <?php
            }else if($uc->profile_type == 3 ){        echo "<br><p>COMMENT ON CHARACTER PROFILE</p>";
                ?> 
                <div class="row" >
                <div class="col-sm-10" >
                <a href="<?= base_url() ?>index.php/characters/<?= $uc->profile_id ?>"> <?php
                echo "TITLE: ".$uc->comment_title.'<br>';
                echo "COMMENT: ".$uc->comment.'<br>';
                echo "DATE: ".$uc->date.'<br><br>';
                ?>
                </a>
                </div>
                <?php if(isset($this->session->userdata['logged_in']) && $user_id==$profile_id){?>

                    <div class="col-sm-2"  >
                    <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $uc->comment_id?>)'>Remove Comment</button>
                    </div>
                    <?php  } ?>
                </div>

                <?php
            }else if($uc->profile_type == 4 ){
                ?> 
                <div class="row" >
                <div class="col-sm-10" >
                <a href="<?= base_url() ?>index.php/forum/thread/<?= $uc->profile_id ?>"> <?php
                echo "TITLE: ".$uc->comment_title.'<br>';
                echo "COMMENT: ".$uc->comment.'<br>';
                echo "DATE: ".$uc->date.'<br><br>';
                ?>
                </a>
                </div>
                <?php if(isset($this->session->userdata['logged_in']) && $user_id==$profile_id){?>

                    <div class="col-sm-2"  >
                    <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $uc->comment_id?>)'>Remove Comment</button>
                    </div>
                    <?php  } ?>
                </div>

                <?php

            }
           
        }
    }
        
    ?>
    </div>

    <div class="col-sm-1" ></div>
</div>
</div>


<script>
function confirmRemoveComment(commentId) {
    var response = confirm("Do you want to remove comment:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removeusercomment/" + commentId
    }
}
</script>

<?php
}
}
$this->load->view('header/bottom');
?>