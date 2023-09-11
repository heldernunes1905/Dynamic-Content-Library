<?php
  $this->load->view('header/top');
  if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
  }else{
    $user_id= 0;
  }
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {
  opacity: 0.7;
}

</style>
<script>
document.getElementById("full").className = "active";
</script>
	<br><br>
  <?php
    $uri = $_SERVER['REQUEST_URI']; 
    $characterId = str_replace("/Dynamic-Content-Library-main/index.php/characters/","",$uri);
    $characterId = strtok($characterId, '/');

    $charurl = "/Dynamic-Content-Library-main/index.php/characters/$characterId";
    $reviewurl = $charurl."/review";
  ?>
  
  <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <?php
        foreach($contents as $content){
          echo "<h1>$content->first_name ".$content->last_name.'</h1><br />';
        } ?>
    </div>
    <div class="col-sm-1" >
    
      </div>
  </div>
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
  <div class="collapse navbar-collapse" id="navbarNav" style=" border: 1px solid grey;"><!-- style="background-color: yellow;"-->
    <ul class="navbar-nav">
    <li class="nav-item">
      <a href="<?= $charurl?>" class="nav-link"  style="color:white;">Character</a>
    </li>
    <li class="nav-item">
      <a href="<?= $reviewurl?>" class="nav-link"  style="color:white;">Comments</a>
    </li>
    </ul>
  </div>
  </nav>
    </div>
    <div class="col-sm-1" >
    
      </div>
  </div>

</div>


<div class="container-fluid no-padding" style="color:white;">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <div class="row">
      <div class="col-sm-2"  >
      <?php
        foreach($contents as $content){

          echo "<img src='../../uploads/$content->pictures'class='myImages'id='myImg' alt='$content->first_name' width='100%' >".'<br/></div>';
          ?>
          <div class="col-sm-10"  ><?php
            echo $content->description.'<br />';
            echo "Birthday: ", date("d-m-Y", strtotime($content->birthday)).'<br />' ;
          ?></div>
          <?php
          
     }?>
    
       
      <?php if(isset($this->session->userdata['logged_in'])){?>

      <?php
      
      if(is_null($checkpreferencesdislike) && is_null($checkpreferenceslike)){
        ?>
        <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcharacter/<?= $content->character_id ?>"'></i>
        <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcharacter/<?= $content->character_id ?>"' ></i>
        <?php
      }else if(!is_null($checkpreferencesdislike) && !is_null($checkpreferenceslike)){
        if (($key = array_search($content->character_id, $checkpreferenceslike)) !== false){ ?>
          <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcharacter/<?= $content->character_id ?>"'></i>
        <?php }else if (($key = array_search($content->character_id, $checkpreferencesdislike)) !== false){ ?>
            <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcharacter/<?= $content->character_id ?>"' ></i>
          <?php }else{
          ?>
          <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcharacter/<?= $content->character_id ?>"'></i>
          <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcharacter/<?= $content->character_id ?>"' ></i>
          <?php
        }
        }else{
        if(!is_null($checkpreferenceslike) ){
          if (($key = array_search($content->character_id, $checkpreferenceslike)) !== false){ ?>
            <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcharacter/<?= $content->character_id ?>"'></i>
          <?php }else{
            ?>
            <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcharacter/<?= $content->character_id ?>"'></i>
            <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcharacter/<?= $content->character_id ?>"' ></i>
            <?php
          }
        }else if(!is_null($checkpreferencesdislike)){
          if (($key = array_search($content->character_id, $checkpreferencesdislike)) !== false){ ?>
            <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcharacter/<?= $content->character_id ?>"' ></i>
          <?php }else{
            ?>
            <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcharacter/<?= $content->character_id ?>"'></i>
            <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcharacter/<?= $content->character_id ?>"' ></i>
            <?php
          }
        }
        
      }?>
 
<?php }?>
        </div>
    </div>
    <div class="col-sm-1" >
      
      </div>
  </div>
      </div>
  

      <br><br><br><br><br><br>


<?php if(!empty($chars)){ ?>


		  <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  style="color:white;">
               
      Played by

      <div class="row">


      <?php 
        foreach($chars as $characters){
            ?>
            <?php if(!empty($characters)){?>
            <div class="col-sm-2"  >

            <a href="<?= base_url() ?>index.php/staff/<?= $characters[0]->staff_id ?>">
            <img src='../../uploads/<?php echo $characters[0]->pictures; ?>' class='myImages' id='myImg' alt='Image' width='100%' ><br/>
            </a>
            </div>
            <div class="col-sm-10"  >
            <?php echo $characters[0]->first_name ." ". $characters[0]->last_name.'<br />'?>
            </div>        
          <?php }
        } ?>
    
        </div>
    </div>
    <div class="col-sm-1" >
    
      </div>
  </div>
</div>
<?php } ?>


<div class="container-fluid no-padding">
  <div id="my-row" class="row">
  <div class="col-sm-1" ></div>
  <div class="col-sm-10" >

    <?php if(!empty($personalcomment) && isset($this->session->userdata['logged_in'])){?>
    <h1>YOUR COMMENT</h1>
  <?php }?>

   <?php

    foreach($personalcomment as $com){
      ?> <a href="<?= base_url() ?>index.php/profile/<?= $com->user_id ?>"> <?php
        //echo "<br/>User Avatar: " . $com->avatar . '<br>';
        echo "Username: " . base64_decode($com->username);  ?>
    </a> 
    <?php
      ?>
        <div id="testing">
        <p id = "<?php echo $com->comment_id.'title'; ?>"><?php echo "User Title: " . $com->comment_title;?></p>

        <p id = "<?php echo $com->comment_id; ?>"><?php echo "User Comment: " . $com->comment;?></p>
        </div>

      <?php
            echo "<p>".date("d-m-Y H:i:s", strtotime($com->date)).'</p><br />';

      if(!empty($com)){
        if($com->user_id == $user_id){?>
          <button type="button" class="btn btn-success" onclick='editComment(<?php echo $com->comment_id;?>,"<?php echo $com->comment_title;?>","<?php echo $com->comment;?>")'>Edit Comment</button>
          <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $contents[0]->character_id; ?>,"<?php echo $user_id; ?>")'>Remove Comment</button>

        <?php }
      }
    }?>
      </div>
       <div class="col-sm-1" >
      
      </div>
  </div>
</div>




    <div class="container-fluid no-padding">
  <div id="my-row" class="row">
  <div class="col-sm-1" ></div>
  <div class="col-sm-9" >
    <?php 
     if(!isset($this->session->userdata['logged_in'])){?>
      <p data-target='#myModal' data-toggle='modal' alt='banner' width='10%' >Leave Comment</p>
    <?php }
    ?>
  <h1>USER COMMENTS</h1>

    <div  class="row">
          <?php foreach($comments as $com){
          ?> 
          <div class="col-sm-4"  >

          <a href="<?= base_url() ?>index.php/profile/<?= $com->user_id ?>"> <?php
            //echo "<br/>User Avatar: " . $com->avatar . '<br>';
            echo "Username: " . base64_decode($com->username);  ?>
          </a> <?php
          echo "<p> $com->comment_title".'</p>';
          echo "<p>".date("d-m-Y H:i:s", strtotime($com->date)).'</p><br />';
          ?>
            <p id = "<?php echo $com->comment_id; ?>"><?php echo "User Comment: " . $com->comment;?></p>
           </div>

          <?php
        } 
        ?>
        
        </div>
        <h1><a href="<?= base_url() ?>index.php/characters/<?= $contents[0]->character_id; ?>/review">SEE ALL COMMENTS</a></h1>
        <?php if(empty($personalcomment) && isset($this->session->userdata['logged_in'])){?>
          <h1 data-target='#modaladdcomment' data-toggle='modal'>LEAVE COMMENT</h1>
        
      <?php }?>
      </div>
       <div class="col-sm-2" >
      
      </div>
  </div>
</div>

