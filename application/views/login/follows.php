<?php
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
        $finalword = str_replace("/CodeIgniter-3.1.10/index.php/profile/$profileId/","",$uri);
        if($state[0]->profile_state == 1){
        if($finalword == "following/"){
            if(!empty($follows[0])){
                foreach($follows as $f){?>
                    <a href="<?= base_url() ?>index.php/profile/<?= $f[0]->user_id ?>">
                        <?php echo $f[0]->avatar; 
                        echo $f[0]->user_id; 
                        echo $f[0]->username; ?>
                    </a><br>
                    <?php if($user_id != 0){?>
                    <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $f[0]->user_id?>"'>Unfollow</button><br>
                    <?php } ?>
                <?php }
            }else{
                echo "YOU DONT FOLLOW ANYONE CURRENTLY";
             }
        }else{
            if(!empty($follows[0])){
                foreach($follows as $f){?>
                    <a href="<?= base_url() ?>index.php/profile/<?= $f[0]->user_id ?>">
                    <?php echo $f[0]->avatar; 
                    echo $f[0]->user_id; 
                    echo $f[0]->username; ?>
                    </a><br>
                    <?php if($user_id != 0){?>
                    <?php if(!empty($f[0]->following)){?>
                        <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/unfollow/<?= $f[0]->user_id?>"'>Unfollow</button><br>
                    <?php }else{ ?>
                        <button type="button" class="btn btn-success"onclick='window.location="<?= base_url() ?>index.php/follow/<?= $f[0]->user_id?>"'>Follow</button><br>

                    <?php }?>
                    <?php } ?>

         <?php } 
         }
        }
    }
    ?>
</body>

</html>