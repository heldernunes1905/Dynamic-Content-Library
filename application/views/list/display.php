<?php

$this->load->view('header/top');
if (isset($this->session->userdata['logged_in'])) {
  $user_id = ($this->session->userdata['logged_in']['user_id']);
}else{
  $user_id= 0;
}
defined('BASEPATH') or exit('No direct script access allowed');
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

h1 {
    font-size: 2em; 
    margin-bottom: .5rem;
}

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
<br />
<?php
foreach ($contents as $content) {
  echo "<img src='../../uploads/$content->images'class='myImages'id='myImg' alt='$content->title' width='10%' >" . '<br/>';
  echo "Content Id: $content->contentId" . '<br />';
  echo "Title: $content->title" . '<br />';
  echo "Content Type: $content->content_type" . '<br />';
  echo "Description: $content->description" . '<br />';
  echo "Rating: $content->rating" . '<br />';
  echo "Release Date: ", date("d-m-Y", strtotime($content->release_date)) . '<br />';
  echo "Ranking: $content->ranking" . '<br />'; ?>
  <a href="<?= base_url() ?>index.php/display/<?= $content->contentId ?>/characters">Characters <br></a>
  <a href="<?= base_url() ?>index.php/display/<?= $content->contentId ?>/staff">Staff <br></a>
  <?php
  echo "Studio Name: "; ?>
  <a href="<?= base_url() ?>index.php/studio/<?= $content->studio_id ?>"><?php echo $content->first_name . " " . $content->last_name . '<br />' ?></a>
  <?php echo "Links: $content->links" . '<br />';
}

echo "Genres:";
foreach ($genres as $genre) { ?>
  <a href="<?= base_url() ?>index.php/display/genre/<?= $genre[0]->name ?>"><?php echo $genre[0]->name ?></a><br>
<?php }

if (!empty($useraddlist)) {
  foreach ($useraddlist as $addlist) {
    if ($content->contentId == $addlist[0]) {
      switch ($addlist[1]) {
        case 0:
          echo "No list" . '<br>';
          break;
        case 1:
          echo "watched" . '<br>';
          break;
        case 2:
          echo "want to watch" . '<br>';
          break;
        case 3:
          echo "stalled" . '<br>';
          break;
        case 4:
          echo "dropped" . '<br>';
          break;
      }
    }
  }
}

//THIS IS FOR THE POPUP THAT WHEN USER WANTS TO ADD TO A CUSTOM LIST, SECOND WILL SHOW THE LISTS IT ALREADY BELONGS TO
//FIRST WILL SHOW THE LIST THAT IT DOESNT BELONG TO
if (!empty($allist) ) {
  foreach ($allist as $list) {
    echo $list->image;
    echo $list->title;
    ?>
    <button type="button" class="btn btn-success"
      onclick='window.location="<?= base_url() ?>index.php/additemlist/<?= $list->list_id . "/" . $contents[0]->contentId ?>"'>Add to list</button>
    <br>
    <?php
  }
}
if(!empty($usercustomlistadd)){
  echo "<br>Lists it already Belongs to: <br>";
  foreach ($usercustomlistadd as $customlistuserexists) {
    echo $customlistuserexists->image;
    echo $customlistuserexists->title . '<br>';
    ?>
    <button type="button" class="btn btn-success"
      onclick='window.location="<?= base_url() ?>index.php/removeitemlist/<?= $customlistuserexists->list_id . "/" . $contents[0]->contentId ?>"'>Remove from list</button>
    <br>
    <?php
  }
}




if (empty($personalrating)) {
  echo "No rating yet<br>";
  $userpersonalrating = 0;
} else {
  echo "PERSONAL RATING: " . $personalrating[0]->user_rating . '<br>';
  $userpersonalrating = $personalrating[0]->user_rating * 2;
}
  if(!empty($user_id)){
?>
<fieldset class="rate">
    <input type="radio" id="rating10" name="rating" value="5" /><label for="rating10" title="5 stars"></label>
    <input type="radio" id="rating9" name="rating" value="4.5" /><label class="half" for="rating9" title="4 1/2 stars"></label>
    <input type="radio" id="rating8" name="rating" value="4" /><label for="rating8" title="4 stars"></label>
    <input type="radio" id="rating7" name="rating" value="3.5" /><label class="half" for="rating7" title="3 1/2 stars"></label>
    <input type="radio" id="rating6" name="rating" value="3" /><label for="rating6" title="3 stars"></label>
    <input type="radio" id="rating5" name="rating" value="2.5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
    <input type="radio" id="rating4" name="rating" value="2" /><label for="rating4" title="2 stars"></label>
    <input type="radio" id="rating3" name="rating" value="1.5" /><label class="half" for="rating3" title="1 1/2 stars"></label>
    <input type="radio" id="rating2" name="rating" value="1" /><label for="rating2" title="1 star"></label>
    <input type="radio" id="rating1" name="rating" value="0.5" /><label class="half" for="rating1" title="1/2 star"></label>

</fieldset>
<button type="button" class="btn btn-success" onclick='confirmRemoveRating(<?php echo $contents[0]->contentId?>,"<?php echo $user_id?>")'>Remove rating</button>

<?php
if(empty($personalrating[0]->userdescription)){
?>
<form id="fromcomment" action="<?= base_url() ?>index.php/addcontentcomment/<?= $contents[0]->contentId?>/userid/<?= $user_id ?>" method="get">
  <textarea id="title" name="title" rows="4" cols="50">title</textarea>
  <textarea id="comment" name="comment" rows="4" cols="50">comment</textarea>
  <br>
  <input type="submit" value="Submit">
</form>
<?php 
}else{ ?>
<form id="fromcomment" action="<?= base_url() ?>index.php/addcontentcomment/<?= $contents[0]->contentId?>/userid/<?= $user_id ?>" method="get" style="display:none">
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
    ?> <a href="<?= base_url() ?>index.php/profile/<?= $rate->user_id ?>"> <?php
    echo "<br/>User Avatar: " . $rate->avatar . '<br>';
    echo "Username: " . $rate->username . '<br>';  ?>
    </a>
    <div id="testing">
    <p id = "<?php echo $rate->personal_rating_id.'title'; ?>"><?php echo "User Title: " . $rate->usertitle;?></p>
    <p id = "<?php echo $rate->personal_rating_id; ?>"><?php echo "User description: " . $rate->userdescription;?></p>
    </div>
    <?php
    echo "User rating: " . $rate->user_rating . '<br>';
    if(!empty($rate)){
      if($rate->user_id == $user_id){?>
        <button type="button" class="btn btn-success" onclick='editComment("<?php echo $rate->personal_rating_id;?>","<?php echo $rate->usertitle;?>","<?php echo $rate->userdescription;?>")'>Edit Comment</button>
        <button type="button" class="btn btn-success" onclick='confirmRemoveComment("<?php echo $contents[0]->contentId?>","<?php echo $user_id?>")'>Remove Comment</button>
      <?php }
    }
  }
  }

foreach ($userratingall as $rate) {
  if($rate->active == 1){
  ?> <a href="<?= base_url() ?>index.php/profile/<?= $rate->user_id ?>"> <?php
    echo "<br/>User Avatar: " . $rate->avatar . '<br>';
    echo "Username: " . $rate->username . '<br>';  ?>
    </a> <?php
  echo "User Title: " . $rate->usertitle . '<br>';
  echo "User description: " . $rate->userdescription . '<br>';
  echo "User rating: " . $rate->user_rating . '<br>';
}
}
?>



<script>


$('input[name=rating]').change(function(){
var value = $( 'input[name=rating]:checked' ).val();
window.location.replace("<?= base_url() ?>index.php/ratinguserchange/<?= $user_id?>/content/<?= $contents[0]->contentId ?>/rating/"+value);
});

$("#rating"+<?php echo $userpersonalrating;?>).prop("checked", true);


function confirmRemoveRating(contentId,user_id) {
    var response = confirm("Do you want to remove rating:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removerating/<?= $user_id?>/" + contentId
    }
}
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