<?php

$this->load->view('header/top');
if (isset($this->session->userdata['logged_in'])) {
  $user_id = ($this->session->userdata['logged_in']['user_id']);
}else{
  $user_id= 0;
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
    $characterId = str_replace("/CodeIgniter-3.1.10/index.php/characters/","",$uri);
    $characterId = strtok($characterId, '/');

    $charurl = "/CodeIgniter-3.1.10/index.php/characters/$characterId";
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
      <a href="<?= $charurl?>" class="nav-link" style="color:white;">Character</a>
    </li>
    <li class="nav-item">
      <a href="<?= $reviewurl?>" class="nav-link" style="color:white;">Comments</a>
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
      <div class="col-sm-10"  >
      <div class="row">
      <div class="col-sm-2"  >
      <?php
        foreach($contents as $content){

          echo "<img src='../../../uploads/$content->pictures'class='myImages' alt='$content->first_name' width='100%' >".'<br/></div>';
          ?>
          <div class="col-sm-10"  >

        
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
                    echo "<p>Date: ".date("d-m-Y H:i:s", strtotime($com->date)).'</p>';
        
              if(!empty($com)){
                if($com->user_id == $user_id){?>
                  <button type="button" class="btn btn-success" onclick='editComment(<?php echo $com->comment_id;?>,"<?php echo $com->comment_title;?>","<?php echo $com->comment;?>")'>Edit Comment</button>
                  <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $contents[0]->character_id; ?>,"<?php echo $user_id; ?>")'>Remove Comment</button>
        
                <?php }
              }
            }?>
                  <?php foreach($comments as $com){
                  ?> 
                  <div class="comment_style">

                  <a href="<?= base_url() ?>index.php/profile/<?= $com->user_id ?>"> <?php
                    //echo "<br/>User Avatar: " . $com->avatar . '<br>';
                    echo "Username: " . base64_decode($com->username);  ?>
                  </a> <?php
                  echo "<p>$com->comment_title".'</p>';
                  echo "<p>Date".date("d-m-Y H:i:s", strtotime($com->date)).'</p>';
                  ?>
                    <p id = "<?php echo $com->comment_id; ?>"><?php echo "User Comment: " . $com->comment;?></p>
                  </div><bR>
                  <?php
                } 
                ?>
                
                <?php if(empty($personalcomment) && isset($this->session->userdata['logged_in'])){?>
                  <h1 data-target='#modaladdcomment' data-toggle='modal'>LEAVE REVIEW</h1>
                <?php }?>
              </div>
           
          <?php
  
     }?>


        </div>
    </div>
    <div class="col-sm-1" >
      
      </div>
  </div>
      </div>




      <div class="modal" id="modaladdcomment" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" data-target='#modalcreatelist' data-toggle='modal' alt='banner' width='10%' >Create List<br></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
        if(isset($this->session->userdata['logged_in'])){

    if(empty($personalcomment)){
    ?>
    <form id="fromcomment" action="<?= base_url() ?>index.php/addcharactercontent/<?= $contents[0]->character_id?>/userid/<?= $user_id ?>" method="get">
      <textarea id="title" name="title" rows="4" cols="50">title</textarea>
      <textarea id="comment" name="comment" rows="4" cols="50">Put your comment here</textarea>
      <br>
      <input type="submit" value="Submit">
    </form>
    <?php 
    }else{ ?>
    <form id="fromcomment" action="<?= base_url() ?>index.php/addcharactercontent/<?= $contents[0]->character_id?>/userid/<?= $user_id ?>" method="get" style="display:none">
    <textarea id="title" name="title" rows="4" cols="50">title</textarea>

      <textarea id="comment" name="comment" rows="4" cols="50">Put your comment here</textarea>
      <br>
      <input type="button" value="Cancel" onclick="canceledit()">
      <input type="submit" value="Submit">
    </form>
    <?php }
    }?>
      </div>
    </div>
</div>
</div>


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