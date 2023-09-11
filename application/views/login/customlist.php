<?php
$uri = $_SERVER['REQUEST_URI']; 
$user_id_prof = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
$user_id_prof = strtok($user_id_prof,"/");

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
      <div class="col-sm-7"  >
    </div>
    <?php if(isset($this->session->userdata['logged_in']) && $user_id==$user_id_prof){?>

    <div class="col-sm-3"  >
    <p data-target='#modaladdlist' data-toggle='modal' alt='banner' width='10%' >Add list</p><br>

    </div>
    <?php }?>

    <div class="col-sm-1" ></div>
</div>
</div>

   <?php 
   $uri = $_SERVER['REQUEST_URI']; 
   $profileId = str_replace("/Dynamic-Content-Library-main/index.php/profile/","",$uri);
   $profileId = strtok($profileId, '/');
   ?>

<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <?php
   

   if(!empty($state[0])){
    if($user_id_prof == $user_id){
      $state[0]->profile_state = 1;
    }
    if($state[0]->profile_state == 0){
    }else{
        ?>

        <?php
        foreach($contents as $content){ 
            if($user_id_prof == $user_id){
            ?>
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/list/<?= $content->list_id ?>"  ><?php echo $content->title?>
                <?php 
                if(empty($content->image)){//if the image list is empty it means the user never changed so it uses the first item from the list as a background one
                    echo "<img src='../../../../uploads/".$content->images."'class='myImages'id='myImg' alt='List_image' width='10%' ><br>";

                }else{
                    echo "<img src='../../../../uploads/".$content->image."'class='myImages'id='myImg' alt='List_image' width='10%' ><br>";
                }?>
                  </a>
                <?php

            }else if($content->list_public == 1){
              ?>
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/list/<?= $content->list_id ?>"  ><?php echo $content->title?><
                
                <?php 
                if(empty($content->image)){//if the image list is empty it means the user never changed so it uses the first item from the list as a background one
                    echo "<img src='../../../../uploads/".$content->images."'class='myImages'id='myImg' alt='List_image' width='10%' ><br>";
                }else{
                    echo "<img src='../../../../uploads/".$content->image."'class='myImages'id='myImg' alt='List_image' width='10%' ><br>";

                }
                ?>
                  </a>
                <?php
            }
        }
        
        ?>
        <?php
    }
    }
   ?>
    </div>

    <div class="col-sm-1" ></div>
</div>
</div>
   



<div class="modal" id="modaladdlist" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
            echo "<div class='error_msg'>";
            echo validation_errors();
            echo "</div>";
            echo form_open_multipart('newcustomlist/'.$user_id);
            echo form_label('Title : ');
            echo "<br/>";

            echo form_input('title');
            echo "<div class='error_msg'>";
            if (isset($message_display)) {
                echo $message_display;
            }
            echo "</div>";
            echo "<br/>";
            echo form_label('Image : ');
            echo "<br/>";
            ?>
            <input type="file" name="image" size="20" />
            <?php
            echo "<br/>";
            echo "<br/>";
            echo form_label('Privacy : ');
           ?>
          <select id="list_publicy" name="list_public">
              <option value="0">Private</option>
              <option value="1">Public</option>
             
            </select>
            <?php
            echo "<br/>";
            echo form_submit('submit', 'Create List');
            echo form_close();
            ?>
      </div>
    </div>
</div>
</div>
<?php
}
}
$this->load->view('header/bottom');
?>