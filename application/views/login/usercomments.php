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
           if($state[0]->profile_state == 1){

                   echo "COMMENT ON USER PROFILE<br>";

        foreach($usercomments as $uc){
            
            if($uc->profile_type == 1 ){ ?> 
                <a href="<?= base_url() ?>index.php/profile/<?= $uc->profile_id ?>"> <?php
                echo "TITLE: ".$uc->comment_title.'<br>';
                echo "COMMENT: ".$uc->comment.'<br>';
                echo "DATE: ".$uc->date.'<br><br>';
                ?>
                </a><?php
            }
        }
        echo "COMMENT ON STAFF PROFILE<br>";

        foreach($usercomments as $uc){
            if($uc->profile_type == 2 ){?> 
                <a href="<?= base_url() ?>index.php/staff/<?= $uc->profile_id ?>"> <?php
                echo "TITLE: ".$uc->comment_title.'<br>';
                echo "COMMENT: ".$uc->comment.'<br>';
                echo "DATE: ".$uc->date.'<br><br>';
                ?>
                </a><?php
            }
        }
        echo "COMMENT ON CHARACTER PROFILE<br>";

        foreach($usercomments as $uc){
            if($uc->profile_type == 3 ){?> 
                <a href="<?= base_url() ?>index.php/characters/<?= $uc->profile_id ?>"> <?php
                echo "TITLE: ".$uc->comment_title.'<br>';
                echo "COMMENT: ".$uc->comment.'<br>';
                echo "DATE: ".$uc->date.'<br><br>';
                ?>
                </a><?php
            }
           
        }
    }
        
    ?>
</body>

</html>