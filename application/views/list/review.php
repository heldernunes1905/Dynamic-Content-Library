<?php

$this->load->view('header/top');
if (isset($this->session->userdata['logged_in'])) {
  $user_id = ($this->session->userdata['logged_in']['user_id']);
  $permissions = ($this->session->userdata['logged_in']['permission']);

}else{
  $user_id= 0;
  $permissions = 2;
}
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script>

</script>
<style>

  .comment_style{
    border: 1px solid grey;
  }

  #myImg {
    border-radius: 5px;
    width:100%;
    height:400px;
  }

 
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  } 

  @keyframes zoom {
    from {
      transform: scale(0)
    }

    to {
      transform: scale(1)
    }
  }

  .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }

  @media only screen and (max-width: 700px) {
    .modal-content {
      width: 100%;
    }
  }

  /* Base setup */
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

/* Ratings widget */
.rate {
    display: inline-block;
    border: 0;
}
/* Hide radio */
.rate > input {
    display: none;
}
/* Order correctly by floating highest to the right */
.rate > label {
    float: right;
}
/* The star of the show */
.rate > label:before {
    display: inline-block;
    font-size: 2rem;
    padding: .3rem .2rem;
    margin: 0;
    cursor: pointer;
    font-family: FontAwesome;
    content: "\f005 "; /* full star */
}

/* Half star trick */
.rate .half:before {
    content: "\f089 "; /* half star no outline */
    position: absolute;
    padding-right: 0;
}
/* Click + hover color */
input:checked ~ label, /* color current and previous stars on checked */
label:hover, label:hover ~ label { color: #73B100;  } /* color previous stars on hover */

/* Hover highlights */
input:checked + label:hover, input:checked ~ label:hover, /* highlight current and previous stars */
input:checked ~ label:hover ~ label, /* highlight previous selected stars for new rating */
label:hover ~ input:checked ~ label /* highlight previous selected stars */ { color: #A6E72D;  } 

</style>
<script>
  document.getElementById("full").className = "active";
</script>
<br><br>

<?php

$uri = $_SERVER['REQUEST_URI']; 
$contentId = str_replace("/Dynamic-Content-Library-main/index.php/display/","",$uri);
$contentId = strtok($contentId, '/');

$contenturl = "/Dynamic-Content-Library-main/index.php/display/$contentId";
$staffurl = $contenturl."/staff";
$charactersurl = $contenturl."/characters";
$reviewurl = $contenturl."/review";

foreach ($contentinfo as $content) { ?>

<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <?php   echo "<h1>$content->title</h1>";?>  
  <nav class="navbar navbar-expand-lg navbar-light" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" style=" border: 1px solid grey;"   ><!-- style="background-color: yellow;"-->
    <ul class="navbar-nav">
    <li class="nav-item">
      <a href="<?= $contenturl?>" class="nav-link"style="color:white;">Content</a>
    </li>
    <li class="nav-item" >
      <a href="<?= $charactersurl?>" class="nav-link"style="color:white;">Characters</a>
    </li>
    <li class="nav-item">
      <a href="<?= $staffurl?>" class="nav-link"style="color:white;">Staff</a>
    </li>
    <li class="nav-item">
      <a href="<?= $reviewurl?>" class="nav-link"style="color:white;">Comments</a>
    </li>
    </ul>
  </div>
  </nav>
    </div>
    <div class="col-sm-1" >
      
      </div>
  </div>
</div>

  <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-2"  >
        <?php echo "<img src='../../../uploads/$content->images'class='myImages' alt='$content->title' width='100%' >" . '<br/>';?>
      </div>
      <div class="col-sm-1" ></div>

      <div class="col-sm-7" >
      <?php
      if(!empty($user_id)){
        ?>
        
        <?php
        if(empty($personalrating[0]->userdescription)){
        
        ?>
        
        <form id="fromcomment" action="<?= base_url() ?>index.php/addcontentcomment/<?= $contentId?>/userid/<?= $user_id ?>" method="get">
          <textarea id="title" name="title" rows="4" cols="50">title</textarea>
          <textarea id="comment" name="comment" rows="4" cols="50">comment</textarea>
          <br>
          <input type="submit" value="Submit">
        </form>
        <?php 
        }else{ ?>
        <form id="fromcomment" action="<?= base_url() ?>index.php/addcontentcomment/<?= $contentId?>/userid/<?= $user_id ?>" method="get" style="display:none">
          <textarea id="title" name="title" rows="4"  cols="50">title</textarea>
          <textarea id="comment" name="comment" rows="4" cols="50">comment</textarea>
            <br>
          <input type="button" value="Cancel" onclick="canceledit()">
          <input type="submit" value="Submit">
        </form>
        <?php }
          }
          foreach ($userratingpersonal as $rate) {
            if($rate->active == 1){
              
            ?> 
            
            <a href="<?= base_url() ?>index.php/profile/<?= $rate->user_id ?>"> <?php
            //echo "<br/>User Avatar: " . $rate->avatar . '<br>';
            echo "Username: " . base64_decode($rate->username) . '<br>';  ?>
            </a>
            <div id="testing">
            <p id = "<?php echo $rate->personal_rating_id.'title'; ?>"><?php echo "User Title: " . $rate->usertitle;?></p>
            <p id = "<?php echo $rate->personal_rating_id; ?>"><?php echo "User description: " . $rate->userdescription;?></p>
            </div>
            <?php
            if(!empty($rate)){
              if($rate->user_id == $user_id){?>
                <button type="button" class="btn btn-success" onclick='editComment("<?php echo $rate->personal_rating_id;?>","<?php echo $rate->usertitle;?>","<?php echo $rate->userdescription;?>")'>Edit Comment</button>
                <button type="button" class="btn btn-success" onclick='confirmRemoveComment("<?php echo $contentId?>","<?php echo $user_id?>")'>Remove Comment</button>
              <?php }
            }
          }
          }
        foreach ($userratingall as $rate) {
          if($rate->active == 1){
          ?> 

            <?php if($permissions == 0 && $rate->user_id != $user_id){?>
              <div class="comment_style">
              <a href="<?= base_url() ?>index.php/profile/<?= $rate->user_id ?>"> <?php
              //echo "<br/>User Avatar: " . $rate->avatar . '<br>';
              echo "Username: " . base64_decode($rate->username) . '<br>';  ?>
              </a> <?php
              echo "<p>User Title: " . $rate->usertitle . '</p>';
              echo "<p>User description: " . $rate->userdescription . '</p>';
              echo "<p>User rating: " . $rate->user_rating . '</p><br>';?>
              <button type="button" class="btn btn-success" onclick='confirmRemoveComment("<?php echo $contentId?>","<?php echo $rate->user_id?>")'>Remove Comment</button>
            </div>
            <br>
            <?php }else{?>
            <div class="comment_style">
              <a href="<?= base_url() ?>index.php/profile/<?= $rate->user_id ?>"> <?php
              //echo "<br/>User Avatar: " . $rate->avatar . '<br>';
              echo "Username: " . base64_decode($rate->username) . '<br>';  ?>
              </a> <?php
              echo "<p>User Title: " . $rate->usertitle . '</p>';
              echo "<p>User description: " . $rate->userdescription . '</p>';
              echo "<p>User rating: " . $rate->user_rating . '</p><br>';?>
            </div>
            <br>
        <?php
        } 
        }
        } ?>
    </div>
    <div class="col-sm-1" >
      
      </div>
  </div>
<?php
}
 


?>



<script>
var rateid = 0
var originalParagraph = 0
var originalTitle = 0

var textare  = document.getElementById("fromcomment");
var comment  = document.getElementById("comment");
var titleform  = document.getElementById("title");
var div = document.getElementById("testing");


function editComment(rating_id,title,description) {
    // Get a reference to the form and input elements
    var p = document.getElementById(rating_id);
    var titledon = document.getElementById(rating_id+'title');
    rateid=rating_id;

  $('#title').val(title);
  $('#comment').val(description);
  
  // Save a copy of the p element
  originalParagraph = p.cloneNode(true);
  originalTitle = titledon.cloneNode(true);

  
  // Replace the p element with the textarea element
  div.parentNode.replaceChild(textare, div);
  
  // Show the textarea element
  textare.style.display = "block";
  
  // Store a reference to the original p element for later use
  textare.originalParagraph = originalParagraph;

 
}

function canceledit(){
// Get a reference to the form and input elements
  var p = document.getElementById(rateid);
  var title = document.getElementById(rateid+'title');

  $('#comment').val(originalParagraph.textContent);
  $('#title').val(originalTitle.textContent);

  // Replace the textarea element with the original p element
  
  textare.parentNode.replaceChild(div, textare);

  
  // Show the original p element
  originalParagraph.style.display = "block";
  originalTitle.style.display = "block";

}

function confirmRemoveComment(contentId,user_id) {
    var response = confirm("Do you want to remove rating:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removecommentcontent/<?= $user_id?>/" + contentId
    }
}
</script>

<?php
$this->load->view('header/bottom');
?>