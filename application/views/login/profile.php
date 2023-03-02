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
   

   
        /*if(!empty($likecontent)){
          //liked content from user
          foreach($likecontent as $likedc){ 
            ?>
            <a href="<?= base_url() ?>index.php/display/<?= $likedc[0]->contentId ?>">

            <?php
            echo "Content Title: ".$likedc[0]->title.'<br>';
            echo "Content Image: ".$likedc[0]->images.'<br><br>';
          }
        }
        
        if(!empty($likegenre)){
          //liked genre from user
          foreach($likegenre as $likedg){ 
              ?>
              <a href="<?= base_url() ?>index.php/display/genre/<?= $likedg[0]->name ?>">

              <?php
              echo "Genre name: ".$likedg[0]->name.'<br>';
              echo "Genre description: ".$likedg[0]->description.'<br><br>';
          }
        } 
        
        if(!empty($likecharacters)){

        //liked characters from user
        foreach($likecharacters as $likedc){ 
            ?>
            <a href="<?= base_url() ?>index.php/characters/<?= $likedc[0]->character_id ?>">

            <?php
            echo "Character pic: ".$likedc[0]->pictures.'<br>';
            echo "Character first name: ".$likedc[0]->first_name.'<br>';
            echo "Character last name: ".$likedc[0]->last_name.'<br><br>';
        }
        }

        //liked studios from user
        if(!empty($likestudios)){

        foreach($likestudios as $likeds){ 
            ?>
        <a href="<?= base_url() ?>index.php/studio/<?= $likeds[0]->studio_id ?>">

            <?php
            echo "Studio Description: ".$likeds[0]->description.'<br>';
            echo "Date Created: ".$likeds[0]->date_created.'<br>';

            echo "Studio first name: ".$likeds[0]->first_name.'<br>';
            echo "Studio last name: ".$likeds[0]->last_name.'<br><br>';
        }
      }
        
        if(!empty($likeproducer)){

            //liked producer from user
            foreach($likeproducer as $likedp){
                ?>
                <a href="<?= base_url() ?>index.php/staff/<?= $likedp[0]->staff_id ?>">

                <?php
                echo "Producer Picture: ".$likedp[0]->pictures.'<br>';

                echo "Producer first name: ".$likedp[0]->first_name.'<br>';
                echo "Producer last name: ".$likedp[0]->last_name.'<br><br>';
            }
        }
        if(!empty($likewriter)){

            //liked writer from user
            foreach($likewriter as $likedw){ 
                ?>
                <a href="<?= base_url() ?>index.php/staff/<?= $likedw[0]->staff_id ?>">

                <?php
                echo "Writer Pictures: ".$likedw[0]->pictures.'<br>';

                echo "Writer first name: ".$likedw[0]->first_name.'<br>';
                echo "Writer last name: ".$likedw[0]->last_name.'<br><br>';
            }
        }
        if(!empty($likeactor)){
            //liked actors from user
            foreach($likeactor as $likeda){ 
                ?>
                <a href="<?= base_url() ?>index.php/staff/<?= $likeda[0]->staff_id ?>">

                <?php
                echo "Actor Description: ".$likeda[0]->pictures.'<br>';
                
                echo "Actor first name: ".$likeda[0]->first_name.'<br>';
                echo "Actor last name: ".$likeda[0]->last_name.'<br><br>';
            }
        }*/
        
        ?>
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

        if($state[0]->profile_state == 1){
        echo "COMMENTS<br>";

        foreach($personalcomment as $cp){
            ?> <a href="<?= base_url() ?>index.php/profile/<?= $cp->user_id ?>"> <?php
            echo "Avatar: ".$cp->avatar.'<br>';
            echo "User: ".$cp->username.'<br>';
            echo "Date: ".$cp->date.'<br>';
            ?>
            </a>
              <p id = "<?php echo $cp->comment_id; ?>"><?php echo "User Comment: " . $cp->comment;?></p>
                
            <?php
            if(isset($this->session->userdata['logged_in'])){
            if(!empty($cp)){
              if($cp->user_id == $user_id){?>
                <button type="button" class="btn btn-success" onclick='editComment(<?php echo $cp->comment_id;?>)'>Edit Comment</button>
                <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $user_id_prof?>,"<?php echo $user_id?>")'>Remove Comment</button><br>
              <?php }
            }
            }
          } 
        
        foreach($commentprofile as $cp){
            ?> <a href="<?= base_url() ?>index.php/profile/<?= $cp->user_id ?>"> <?php
            echo "Avatar: ".$cp->avatar.'<br>';
            echo "User: ".$cp->username.'<br>';
            echo "Date: ".$cp->date.'<br>';
            ?>
            </a>
              <p id = "<?php echo $cp->comment_id; ?>"><?php echo "User Comment: " . $cp->comment;?></p>
                
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
          } 
        }
    
   ?>
</body>
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
</html>