<?php
 $uri = $_SERVER['REQUEST_URI']; 
 $user_id_prof = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
 
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

?>

   <?php 
   $uri = $_SERVER['REQUEST_URI']; 
   $profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
   $profileId = strtok($profileId, '/'); ?>
   
          <?php /*
        
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
              <?php if(!empty($likecontent)){
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
                    
                    if(!empty($likewriter)){

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
                    
              if(!empty($likeactor)){
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
         */ 
        if(empty($checkuserblocked ) || !isset($this->session->userdata['logged_in'])){

          $checkuserblocked = array();
          if(($key = array_search($user_id, $checkuserblocked)) !== false ){
          }else{
        ?>

<div class="container-fluid no-padding">
            <div class="row">
              <div class="col-sm-1" >
              </div>
              <div class="col-sm-10"  >
              <?php
        
        if($user_id != $user_id_prof){
            if(empty($personalcomment)){
            ?>
            <form id="fromcomment" action="<?= base_url() ?>index.php/addusercommentprofile/<?= $user_id_prof?>/userid/<?= $user_id ?>" method="get">
            <textarea id="comment" name="comment" rows="4" cols="50">Put your comment here</textarea>
            <br>
            <input type="submit" value="Submit">
            </form>
            <?php 
            }else{ ?>
            <form id="fromcomment" action="<?= base_url() ?>index.php/addusercommentprofile/<?= $user_id_prof?>/userid/<?= $user_id ?>" method="get" style="display:none">
            <textarea id="comment" name="comment" rows="4" cols="50">Put your comment here</textarea>
            <br>
            <input type="button" value="Cancel" onclick="canceledit()">
            <input type="submit" value="Submit">
            </form>
        <?php
                    }
                }
        ?>
            </div>
            <div class="col-sm-1" >
              
              </div>
            </div>
          </div>
        
<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >

        <div class="row">

        <?php
        if($state[0]->profile_state == 1){
        foreach($personalcomment as $cp){
            ?>
            <div class="col-sm-8" style="color:white;" >
            <a href="<?= base_url() ?>index.php/profile/<?= $cp->user_id ?>"> <?php
            echo "Avatar: ".$cp->avatar.'<br>';
            echo "User: ".base64_decode($cp->username).'<br>';
            echo "Date: ".$cp->date.'<br>';
            ?>
            </a>
              <p id = "<?php echo $cp->comment_id; ?>"><?php echo "User Comment: " . $cp->comment;?></p>
            </div>
            <div class="col-sm-4" >        
      
            <?php
            if(isset($this->session->userdata['logged_in'])){
            if(!empty($cp)){
              if($cp->user_id == $user_id){?>
                <button type="button" class="btn btn-success" onclick='editComment(<?php echo $cp->comment_id;?>)'>Edit Comment</button>
                <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $user_id_prof?>,"<?php echo $user_id?>")'>Remove Comment</button><br>
              <?php }
            }
            }
            ?></div><?php
          } 
        
        foreach($commentprofile as $cp){
            ?>
                        <div class="col-sm-8"  >

            <a href="<?= base_url() ?>index.php/profile/<?= $cp->user_id ?>"> <?php
            echo "Avatar: ".$cp->avatar.'<br>';
            echo "User: ".$cp->username.'<br>';
            echo "Date: ".$cp->date.'<br>';
            ?>
            </a>
              <p id = "<?php echo $cp->comment_id; ?>"><?php echo "User Comment: " . $cp->comment;?></p>
              </div>
            <div class="col-sm-4" >    
            <?php 
            if(isset($this->session->userdata['logged_in'])){
            if($user_id_prof == $user_id){?>
              <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $user_id_prof?>,"<?php echo $cp->user_id?>")'>Remove Comment</button><br>
            <?php }
            if(!empty($cp)){
              if($cp->user_id == $user_id){?>
                <button type="button" class="btn btn-success" onclick='editComment(<?php echo $cp->comment_id;?>)'>Edit Comment</button>
                <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $user_id_prof?>,"<?php echo $user_id?>")'>Remove Comment</button>
              <?php }
            }
            }
            ?></div><?php

          } 
        }
    
   ?>
      
        


      </div>
        
        </div>

    <div class="col-sm-1" ></div>
</div>
</div>

<?php }?>
<script>
var rateid = 0
var originalParagraph = 0
var textare  = document.getElementById("fromcomment");

function editComment(rating_id) {
  // Get a reference to the form and input elements
  var p = document.getElementById(rating_id);
  rateid=rating_id;
  
  // Save a copy of the p element
  originalParagraph = p.cloneNode(true);
  
  // Set the value of the textarea to the text content of the p element
  textare.value = p.textContent;
  
  // Replace the p element with the textarea element
  p.parentNode.replaceChild(textare, p);
  
  // Show the textarea element
  textare.style.display = "block";
  
  // Store a reference to the original p element for later use
  textare.originalParagraph = originalParagraph;
}

function canceledit(){
// Get a reference to the form and input elements
  var p = document.getElementById(rateid);
  
  $('#comment').val(originalParagraph.textContent);
  // Replace the textarea element with the original p element
  textare.parentNode.replaceChild(originalParagraph, textare);
  
  // Show the original p element
  originalParagraph.style.display = "block";
}

function confirmRemoveComment(profile_id,user_id) {
    var response = confirm("Do you want to remove comment:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removesprofilecomment/"+user_id+"/" + profile_id
    }
}
</script>
<?php
}
$this->load->view('header/bottom');
?>