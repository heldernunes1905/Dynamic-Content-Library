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
    foreach($rating as $rate){ ?>
      <a href="<?= base_url() ?>index.php/display/<?= $rate->contentId ?>">

        <?php 
        if(1==1){//if the image list is empty it means the user never changed so it uses the first item from the list as a background one
            echo "List Image: ".$rate->images.'<br>';
            echo "Content Title: ".$rate->title.'<br>';
            echo "User rating: ".$rate->user_rating.'<br>';
            echo "User rating explanation: ".$rate->userdescription.'<br>';
            echo "User description: ".$rate->description.'<br><br>';

        }else{
            echo "List Image: ".$rate->image.'<br>';
            echo "Content Title: ".$rate->title.'<br>';
            echo "User rating: ".$rate->user_rating.'<br>';
            echo "User rating explanation: ".$rate->userdescription.'<br>';
            echo "User description: ".$rate->description.'<br><br>';

        }
    }
    }
   ?>
</body>

</html>