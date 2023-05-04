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
    $user_id = 0;
    $this->load->view('login/insideheader/headernotlog');
}
if(!empty($checkuserblocked )|| !isset($this->session->userdata['logged_in'])){
    $checkuserblocked = array();
if(($key = array_search($user_id, $checkuserblocked)) !== false){
}else{
?>


<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
        <div class="row">

            <?php 
                if($state[0]->profile_state == 1){
                    foreach($rating as $rate){

                        ?>
                        <?php if(!empty($rate->usertitle) && !empty($rate->userdescription)){ ?>

                        <div class="col-sm-2"  >
                            <a href="<?= base_url() ?>index.php/display/<?= $rate->contentId ?>">
                            <?php echo "<img src='../../../../uploads/".$rate->images."' class='contentImage' id='myImg' width='10%' ><br>";?>
                            </a>
                        </div>
                        <div class="col-sm-7"  >

                            <?php  
                                echo "<p>".$rate->usertitle.'</p>';
                                echo "<p>".$rate->userdescription.'</p>';

                            if($rate->user_rating == 0.00){
                                echo "<p>No rating</p>";
                            }else{
                                echo "<p>rating: ".$rate->user_rating.'</p>';

                            }

                            ?>
                        </div>
                        <?php if(isset($this->session->userdata['logged_in']) && $user_id==$profile_id){?>
                            <div class="col-sm-3"  >
                                <button type="button" class="btn btn-success" onclick='confirmRemoveRating(<?php echo $rate->contentId?>,"<?php echo $user_id?>")'>Remove rating</button>
                                <button type="button" class="btn btn-success" onclick='confirmRemoveComment("<?php echo $rate->contentId?>","<?php echo $user_id?>")'>Remove Comment</button>

                            </div>
                        <?php 
                        }else{?>
                            <div class="col-sm-3"  >
                            
                            </div>
                        <?php }
                        }else if(empty($rate->usertitle) && empty($rate->userdescription) && $rate->user_rating != 0.00){ ?>
                           <div class="col-sm-2"  >
                            <a href="<?= base_url() ?>index.php/display/<?= $rate->contentId ?>">
                            <?php echo "<img src='../../../../uploads/".$rate->images."' class='contentImage' id='myImg' width='10%' ><br>";?>
                            </a>
                        </div>
                        <div class="col-sm-7"  >

                            <?php  

                                echo "<p>No comment</p>";

                                echo "<p> rating: ".$rate->user_rating.'</p>';

                            

                            ?>
                        </div>
                        <?php if(isset($this->session->userdata['logged_in']) && $user_id==$profile_id){?>
                            <div class="col-sm-3"  >
                                <button type="button" class="btn btn-success" onclick='confirmRemoveRating(<?php echo $rate->contentId?>,"<?php echo $user_id?>")'>Remove rating</button>
                                <button type="button" class="btn btn-success" onclick='confirmRemoveComment("<?php echo $rate->contentId?>","<?php echo $user_id?>")'>Remove Comment</button>

                            </div>
                        <?php  
                         }else{?>
                            <div class="col-sm-3"  >
                            
                            </div>
                        <?php }
                    }

                    }
                }
            ?>   
        </div>
    </div>

    <div class="col-sm-1" ></div>
</div>
</div>

<script>
function confirmRemoveRating(contentId,user_id) {
    var response = confirm("Do you want to remove rating:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removerating/<?= $user_id?>/" + contentId
    }
}

function confirmRemoveComment(contentId,user_id) {
    var response = confirm("Do you want to remove rating:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removecommentcontent/<?= $user_id?>/" + contentId
    }
}
</script>
<?php
}
}
$this->load->view('header/bottom');
?>