<?php
$uri = $_SERVER['REQUEST_URI']; 
$user_id_prof = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
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

?>

<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>others/css/menu.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>

<body>
   <?php 
   $uri = $_SERVER['REQUEST_URI']; 
   $profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
   $profileId = strtok($profileId, '/');
   
   
   
   if($user_id_prof != $user_id){
      if($followprofile == 0){
        ?><button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $user_id_prof?>"'>Follow</button><br><?php

      }else if($followprofile == $user_id_prof){
        ?> <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $user_id_prof?>"'>Unfollow</button><br><?php

      }
   }

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
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/list/<?= $content->list_id ?>"  ><?php echo $content->title?></a>
                <?php 
                if(1==1){//if the image list is empty it means the user never changed so it uses the first item from the list as a background one
                    echo "List Image: ".$content->images.'<br><br>';

                }else{
                    echo "List Image: ".$content->image.'<br><br>';

                }
            }else if($content->list_public == 1){
              ?>
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/list/<?= $content->list_id ?>"  ><?php echo $content->title?></a>
                
                <?php 
                if(1==1){//if the image list is empty it means the user never changed so it uses the first item from the list as a background one
                    echo "List Image: ".$content->images.'<br><br>';

                }else{
                    echo "List Image: ".$content->image.'<br><br>';

                }
            }
        }
        
        ?>
        <?php
    }
    }
   ?>



   
</body>
</html>