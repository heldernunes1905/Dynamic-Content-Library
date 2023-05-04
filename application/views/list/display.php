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
  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
    width:100%;
    height:400px;
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
label:hover, label:hover ~ label { color: #fee12b;  } /* color previous stars on hover */

/* Hover highlights */
input:checked + label:hover, input:checked ~ label:hover, /* highlight current and previous stars */
input:checked ~ label:hover ~ label, /* highlight previous selected stars for new rating */
label:hover ~ input:checked ~ label /* highlight previous selected stars */ { color: white;  } 


#my-row {
    width:100%;
    margin:0;
}

#my-row .panel {
    float: none;
    display: table-cell;
    vertical-align: top;
}

.no-padding {
  padding:0!important;
}
</style>
<script>
  document.getElementById("full").className = "active";
</script>

<?php
$uri = $_SERVER['REQUEST_URI']; 
$contentId = str_replace("/CodeIgniter-3.1.10/index.php/display/","",$uri);
$contentId = strtok($contentId, '/');

$contenturl = "/CodeIgniter-3.1.10/index.php/display/$contentId";
$staffurl = $contenturl."/staff";
$charactersurl = $contenturl."/characters";
$reviewurl = $contenturl."/review";

foreach ($contents as $content) { ?>
      <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <?php   echo "<h1>$content->title</h1>";?>

  
  <nav class="navbar navbar-expand-lg navbar-light"  >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav"style=" border: 1px solid grey;"><!-- style="background-color: yellow;"-->
    <ul class="navbar-nav">
    <li class="nav-item">
      <a href="<?= $contenturl?>" class="nav-link" style="color:white;">Content</a>
    </li>
    <li class="nav-item" >
      <a href="<?= $charactersurl?>" class="nav-link" style="color:white;">Characters</a>
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





      <div class="container-fluid no-padding">
  <div id="my-row" class="row">
    <div class="col-sm-1" >
      
    </div>
    <div class="col-sm-2" style="border-right:1px solid black;" >
      <p><?php echo $content->ep_number.' x '. $content->duration.' min';?></p>
    </div>
    <div class="col-sm-2" style="border-right:1px solid black;">
      <p><?php if(!empty($content->studio_id)){
        echo "Studio Name: "; ?>
        <a href="<?= base_url() ?>index.php/studio/<?= $content->studio_id ?>"><?php echo $content->first_name . " " . $content->last_name?></a>
        <?php }else{
          echo "No studio assigned<br>";
        }
        ?>
      </p>
    </div>
    <div class="col-sm-2"style="border-right:1px solid black;">
        <p><?php   echo "Release Date: ", date("d-m-Y", strtotime($content->release_date)) ?></p>
    </div>

    <div class="col-sm-2"style="border-right:1px solid black;">
        <p><?php echo "Rating: $content->rating" . '<br />';
          if(!empty($allrating)){
            $totaldiv = count($allrating);
            $totalnum = 0.00;
            foreach($allrating as $all){
              $totalnum += $all->user_rating;
            }
            echo "Average site rating: ".round($totalnum/$totaldiv,2).'<br>';
          }
        ?></p>
    </div>
    
    <div class="col-sm-2">
        <p><?php echo "Ranking: $content->ranking"; ?></p>
    </div>
    <div class="col-sm-1" >
      
    </div>

  </div>
</div>

<br>
<br>



<div class="container-fluid no-padding">
  <div id="my-row" class="row">
  <div class="col-sm-1" >
      
      </div>
    <div class="col-sm-2"  >
      <?php echo "<img src='../../uploads/$content->images'class='myImages' alt='$content->title' width='100%'>" . '<br/>';?>
    </div>
    <div class="col-sm-6" >
      <?php   echo "<p>$content->description</p>";//Description: $content->description"?>
    <br>
    <hr>
    <?php         
      if(!empty($genres)){
        echo "<p>Genres:";
      }
    ?>
    <?php 
      foreach ($genres as $genre) { 
        if(!empty($genre)){ ?>
        <a href="<?= base_url() ?>index.php/genre/<?= $genre[0]->name ?>" style="border: 1px solid gray;"><?php echo $genre[0]->name ?></a>
      <?php
      }else{
      echo "<p>No genres assigned</p><br>";
    }
    }
    
echo "<hr>";
    
if (!empty($useraddlist)) {
  foreach ($useraddlist as $addlist) {
    if ($content->contentId == $addlist[0]) {
      switch ($addlist[1]) {
        case 0:?>
          
          <select name="list" id="list">
            <option value="0" selected>No list</option>
            <option value="1" >watched</option>
            <option value="2">want to watch</option>
            <option value="3">stalled</option>
            <option value="4">dropped</option>
          </select>
          <?php 
          break;
        case 1:?>
          
          <select name="list" id="list">
            <option value="0" >No list</option>
            <option value="1" selected >watched</option>
            <option value="2">want to watch</option>
            <option value="3">stalled</option>
            <option value="4">dropped</option>
          </select>
          <?php 
          break;
        case 2:
          ?>
          
          <label for="list">choose:</label>
          <select name="list" id="list">
            <option value="0"  >No list</option>
            <option value="1" >watched</option>
            <option value="2" selected >want to watch</option>
            <option value="3">stalled</option>
            <option value="4">dropped</option>
          </select>
          <?php           
          break;
        case 3:
          ?>
          
          <label for="list">choose:</label>
          <select name="list" id="list">
            <option value="0"  >No list</option>
            <option value="1" >watched</option>
            <option value="2"  >want to watch</option>
            <option value="3" selected>stalled</option>
            <option value="4">dropped</option>
          </select>
          <?php           
          break;
        case 4:
          ?>
          
          <label for="list">choose:</label>
          <select name="list" id="list">
            <option value="0" >No list</option>
            <option value="1" >watched</option>
            <option value="2">want to watch</option>
            <option value="3">stalled</option>
            <option value="4"selected >dropped</option>
          </select>
          <?php           
          break;
      }
    }
  }
} 

if(isset($this->session->userdata['logged_in'])){
  if($addlist[1] != 0 ) {?>
    <select name="ep_list" id="ep_list">
    <?php 
    $ep_number = $content->ep_number;
    for ($i = 0; $i <= $ep_number; $i++) {?>
    <?php if($userwatchnumber[0]->ep_amount==$i){?>
    <option value="<?= $i ?>"  selected><?= $i ?></option>
    <?php }else{?>
    <option value="<?= $i ?>"  ><?= $i ?></option>
    
    <?php }?>
    
    <?php ?>
    <?php }?>
    </select>
    <?php }
}



          
            
          
//verify that user is logged in
if(isset($this->session->userdata['logged_in'])){

//if empty turns the personal rating to 0 but if its not empty and instead the user just removed their rating it turns to 0
//if not empty it doubles the user rating because of the id in the input
if (empty($personalrating)) {
  $userpersonalrating = 0;
} else if($personalrating[0]->user_rating == 0.00) {
  $userpersonalrating = 0;
}else{
  $userpersonalrating = $personalrating[0]->user_rating * 2;
}
}
  if(!empty($user_id)){
?>

<?php if($addlist[1] != 0){?>
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



<?php
//if user has a rating show this button
if($userpersonalrating != 0){ ?>
  <button type="button" class="btn btn-success" onclick='confirmRemoveRating(<?php echo $contents[0]->contentId?>,"<?php echo $user_id?>")'>Remove rating</button>

<?php }

}?>

<?php
}

if(isset($this->session->userdata['logged_in'])){

  if (empty($personalrating)) {
    echo "<br><p>No rating yet</p><br>";
    $userpersonalrating = 0;
  } else if($personalrating[0]->user_rating == 0.00) {
    echo "<br><p>No rating yet</p><br>";
    $userpersonalrating = 0;
  }else{
    echo "<p>PERSONAL RATING: " . $personalrating[0]->user_rating . '</p>';
    $userpersonalrating = $personalrating[0]->user_rating * 2;
  }
  }
    ?>
  <?php if(isset($this->session->userdata['logged_in'])){ ?>
    <br><br><p data-target='#modaladdlist' data-toggle='modal' alt='banner' width='10%' >Add list</p>
  <p data-target='#LeaveRecommendation' data-toggle='modal' alt='banner' width='10%' >Recommend</p>
  
  <?php if(isset($this->session->userdata['logged_in'])){?>

<?php
      if(is_null($checkpreferencesdislike) && is_null($checkpreferenceslike)){
        ?>
        <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $contents[0]->contentId ?>"'></i>
        <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $contents[0]->contentId ?>"' ></i>
        <?php
      }else if(!is_null($checkpreferencesdislike) && !is_null($checkpreferenceslike)){
        if (($key = array_search($contents[0]->contentId, $checkpreferenceslike)) !== false){ ?>
          <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcontent/<?= $contents[0]->contentId ?>"'></i>
        <?php }else if (($key = array_search($contents[0]->contentId, $checkpreferencesdislike)) !== false){ ?>
            <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcontent/<?= $contents[0]->contentId ?>"' ></i>
          <?php }else{
          ?>
          <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $contents[0]->contentId ?>"'></i>
          <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $contents[0]->contentId ?>"' ></i>
          <?php
        }
        }else{
        if(!is_null($checkpreferenceslike) ){
          if (($key = array_search($contents[0]->contentId, $checkpreferenceslike)) !== false){ ?>
            <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcontent/<?= $contents[0]->contentId ?>"'></i>
          <?php }else{
            ?>
            <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $contents[0]->contentId ?>"'></i>
            <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $contents[0]->contentId ?>"' ></i>
            <?php
          }
        }else if(!is_null($checkpreferencesdislike)){
          if (($key = array_search($contents[0]->contentId, $checkpreferencesdislike)) !== false){ ?>
            <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcontent/<?= $contents[0]->contentId ?>"' ></i>
          <?php }else{
            ?>
            <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $contents[0]->contentId ?>"'></i>
            <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $contents[0]->contentId ?>"' ></i>
            <?php
          }
        }
        
      }?>
      
 
<?php }?>

  <?php }?>
  </div>
    <div class="col-sm-2">
      <p> STATS</p>

      <?php if($contents[0]->content_type == "movie" || $contents[0]->content_type == "show"){
        echo "<p>Watched: ".$statscontent[0]."</p>"; 
        echo "<p>Want to Watch: ".$statscontent[1]."</p>"; 
      }else if($contents[0]->content_type == "game"){
        echo "<p>Played: ".$statscontent[0]."</p>"; 
        echo "<p>Want to Play: ".$statscontent[1]."</p>"; 
      }else if($contents[0]->content_type == "book"){
        echo "<p>Read: ".$statscontent[0]."</p>"; 
        echo "<p>Want to read: ".$statscontent[1]."</p>"; 
      }
      
       echo "<p>Stalled: ".$statscontent[2]."</p>"; 
       echo "<p>Dropped: ".$statscontent[3]."</p>"; ?>

    </div>
    <div class="col-sm-1" >
      
    </div>
  </div>
  
</div>


<?php
}
  




//THIS IS FOR THE POPUP THAT WHEN USER WANTS TO ADD TO A CUSTOM LIST, SECOND WILL SHOW THE LISTS IT ALREADY BELONGS TO
//FIRST WILL SHOW THE LIST THAT IT DOESNT BELONG TO
?>

<div class="modal" id="modaladdlist" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <h5 class="modal-title" data-target='#modalcreatelist' data-toggle='modal' alt='banner' width='10%' >Create List</h5>
      </div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body">
      <?php
            if (!empty($allist) ) {
              foreach ($allist as $list) {
                //echo $list->image;
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
                //echo $customlistuserexists->image;
                echo $customlistuserexists->title . '<br>';
                ?>
                <button type="button" class="btn btn-success"
                  onclick='window.location="<?= base_url() ?>index.php/removeitemlist/<?= $customlistuserexists->list_id . "/" . $contents[0]->contentId ?>"'>Remove from list</button>
                <br>
                <?php
              }
            }
      ?>
      </div>
    </div>
</div>
</div>


<div class="modal fade" id="LeaveRecommendation" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		    <h4 class="modal-title">LEAVE Recommendation</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        
        
        

          <?php echo form_open_multipart('addrecom');?>
          <div>
            <?php switch($contents[0]->content_type){
                case "movie":?>
                <select id="select-array" name="select-array">
                  <option value="movie" selected>Movie</option>
                  <option value="show">Show</option>
                  <option value="game">Game</option>
						      <option value="book">Book</option>
                </select>
                <?php break; 
              
              case "show":?>
                <select id="select-array" name="select-array">
                  <option value="movie">Movie</option>
                  <option value="show" selected>Show</option>
                  <option value="game">Game</option>
						      <option value="book">Book</option>
                </select>
                <?php break; 

                case "book":?>
                  <select id="select-array" name="select-array">
                    <option value="movie">Movie</option>
                    <option value="show">Show</option>
                    <option value="game">Game</option>
						        <option value="book" selected>Book</option>
                  </select>
                  <?php break; 

                case "game":?>
                  <select id="select-array" name="select-array">
                    <option value="movie">Movie</option>
                    <option value="show">Show</option>
                    <option value="game" selected>Game</option>
						        <option value="book">Book</option>
                  </select>
                  <?php break; 
              
              
            }?>
            
            <input type="text" id="search-bar-1" name="search-bar-1" placeholder="Search...">
            <div class="search-results" id="search-results-1">
              <div class="search-results-container" id="search-results-container-1"></div>
            </div>

            <input type="text" id="search-bar-2"  name="search-bar-2" placeholder="Search..." >
            <div class="search-results" id="search-results-2">
              <div class="search-results-container" id="search-results-container-2"></div>
            </div>
          </div>
          
          <input type="text" id="input-1" name="input-1" placeholder="ID of first search" style="display:none" value="<?php echo $contents[0]->contentId?>">
          <input type="text" id="input-2" name="input-2" placeholder="ID of second search" style="display:none">

        <textarea id="description" name="description" rows="4" cols="50" placeholder="Description..." ></textarea>

        <p id="error-msg" style="display: none; color: red;">Please fill in all fields.</p>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="submit-btn" class="btn btn-primary">Submit</button>

          <?php 
          echo form_close(); ?>
              </div>
      </div>
      
    </div>
  </div>

<div class="modal" id="modalcreatelist" tabindex="-1" role="dialog">
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
            <input type="text" name="content_id" value="<?php echo $contents[0]->contentId?>" style="display:none" />

            <?php
            echo "<br/>";
            echo form_label('Privacy : ');
            ?>
                <select id="list_public" name="list_public">
                  <option value="0" selected>Private</option>
                  <option value="1">Public</option>
                  
                </select>
            <?php

            echo "<br/>";
            echo form_submit('submit', 'Create list');
            echo form_close();
            
      ?>
      </div>
    </div>
</div>
</div>




<div class="modal" id="modaladdcomment" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" data-target='#modalcreatelist' data-toggle='modal' alt='banner' width='10%' >Leave review<br></h5>
        
      </div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body">
      <?php
        if($user_id != 0){
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
          <?php 
            }
        }?>
      </div>
    </div>
</div>
</div>
<hr>


<div class="container-fluid no-padding">
  <div id="my-row" class="row">
  <div class="col-sm-1" ></div>
  <div class="col-sm-10" >
<?php
  foreach ($userratingpersonal as $rate) {
    if($rate->active == 1){
    ?>
    <h1>YOUR REVIEW</h1>

     <a href="<?= base_url() ?>index.php/profile/<?= $rate->user_id ?>"> <?php
    //echo "<br/>User Avatar: " . $rate->avatar . '<br>';
    echo "Username: " . base64_decode($rate->username) . '<br>';  ?>
    </a>
    <div id="testing">
    <p id = "<?php echo $rate->personal_rating_id.'title'; ?>"><?php echo "User Title: " . $rate->usertitle;?></p>
    <p id = "<?php echo $rate->personal_rating_id; ?>"><?php echo "User description: " . $rate->userdescription;?></p>
    </div>
    <?php
    echo "<p>User rating: " . $rate->user_rating . '</p>';
    if(!empty($rate)){
      if($rate->user_id == $user_id){?>
        <button type="button" class="btn btn-success" onclick='editComment("<?php echo $rate->personal_rating_id;?>","<?php echo $rate->usertitle;?>","<?php echo $rate->userdescription;?>")'>Edit Comment</button>
        <button type="button" class="btn btn-success" onclick='confirmRemoveComment("<?php echo $contents[0]->contentId?>","<?php echo $user_id?>")'>Remove Comment</button>
      <?php }
    }
  }
  }
?>
</div>
       <div class="col-sm-1" >
      
      </div>
  </div>
</div>

<hr>

<div class="container-fluid no-padding">
  <div id="my-row" class="row">
  <div class="col-sm-1" ></div>
  <div class="col-sm-9" >
  <h1>USER REVIEWS</h1>

    <div  class="row">

    <?php
    
      foreach ($userratingtop as $rate) {?>
        <div class="col-sm-4"  >
        <?php  if($rate->active == 1){
          ?> <a href="<?= base_url() ?>index.php/profile/<?= $rate->user_id ?>"> <?php
            //echo "<br/>User Avatar: " . $rate->avatar . '<br>';
            echo "Username: " . base64_decode($rate->username) . '<br>';  ?>
            </a><p> <?php
          echo "" . $rate->usertitle . '<br>';
          echo "" . $rate->userdescription . '<br>';
          echo "" . $rate->user_rating . '</p><br>';
        }
        ?> </div><?php
        }
      ?>
      </div>
      <h1><a href="<?= base_url() ?>index.php/display/<?= $content->studio_id ?>/review">SEE ALL REVIEWS</a></h1>
        <?php if(isset($this->session->userdata['logged_in'])){
          
          if(empty($userratingpersonal[0])){
            ?>
              <h1 data-target='#modaladdcomment' data-toggle='modal'>LEAVE REVIEW</h1>
            <?php 
             }else if($userratingpersonal[0]->active == 0){
              ?>
              <h1 data-target='#modaladdcomment' data-toggle='modal'>LEAVE REVIEW</h1>
            <?php 
            }
          }?>
          
      </div>
       <div class="col-sm-2" >
      
      </div>
  </div>
</div>


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
    var response = confirm("Do you want to remove comment:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removecommentcontent/<?= $user_id?>/" + contentId
    }
}


//watchlist change type ex.want to watch
$('#list').on('change', function() {

    window.location="<?= base_url() ?>index.php/addwatchlist/<?= $user_id?>/" + <?= $contents[0]->contentId ?> +"/" + this.value
});

//change number of episodes
$('#ep_list').on('change', function() {

  window.location="<?= base_url() ?>index.php/addwatchedepisodes/<?= $user_id?>/" + <?= $contents[0]->contentId ?> +"/" + this.value
});






function search(inputId, resultsId, containerId, resultsLabelId) {
  const input = document.getElementById(inputId).value.toLowerCase();
  const filteredItems = currentArray.filter(item => item.name.toLowerCase().includes(input));
  displayResults(inputId, resultsId, containerId, filteredItems);

  const searchResults = document.getElementById(resultsId);
  if (inputId === 'search-bar-1' && input === '') {
    searchResults.style.display = 'none';
    return;
  }
  if (inputId === 'search-bar-2' && input === '') {
    searchResults.style.display = 'none';
    return;
  }
  searchResults.style.display = 'block';
}

//make if statement so it know what content_type Im currently in
<?php if($content->content_type == "show"){ ?>
  currentArray = show;
<?php }else if($content->content_type == "movie"){?>
  currentArray = movie;

<?php }else if($content->content_type == "game"){?>
  currentArray = game;

<?php }else if($content->content_type == "book"){?>
  currentArray = book;

<?php }?>

function displayResults(inputId, resultsId, containerId, filteredItems, resultsLabelId) {
  const searchResults = document.getElementById(resultsId);
  const resultsContainer = searchResults.querySelector("#" + containerId);
  resultsContainer.innerHTML = "";
  if (filteredItems.length > 0) {
    filteredItems.forEach(item => {
      const div = document.createElement("div");
      div.innerText = item.name;
      div.addEventListener("click", function() {
        document.getElementById(inputId).value = item.name;
        searchResults.style.display = "none";
        
        // Update corresponding input field with the search bar ID
        if (inputId === "search-bar-1") {
          document.getElementById("search-bar-2").style.display = "none"; // add this line
          document.getElementById("input-1").value = item.id;
          document.getElementById("search-bar-2").style.display = "block";
          
        } else if (inputId === "search-bar-2") {
          document.getElementById("input-2").value = item.id;
        }
      });
      div.addEventListener("mouseenter", function() {
        div.classList.add("result-highlight");
      });
      div.addEventListener("mouseleave", function() {
        div.classList.remove("result-highlight");
      });
      resultsContainer.appendChild(div);
    });
    searchResults.style.display = "block";
  } else {
    searchResults.style.display = "none";
  }
}

function hideSearchBar2() {
  document.getElementById("search-bar-2").style.display = "none";
  document.getElementById("search-bar-2").value="";
}

document.getElementById("search-bar-1").addEventListener("input", function() {
  search("search-bar-1", "search-results-1", "search-results-container-1");
  hideSearchBar2(); // add this line
});

document.getElementById("search-bar-2").addEventListener("input", function() {
  search("search-bar-2", "search-results-2", "search-results-container-2");
});


document.addEventListener('DOMContentLoaded', () => {
  const contid = document.getElementById('input-1').value ;
  document.getElementById('search-bar-1').value = currentArray.find(item => item.id == contid).name;
});

function handleSelectChange() {
  if (document.getElementById("search-bar-1-top").value === "") {
    const selectedValue = this.value;
    if (selectedValue === "movie") {
      currentArray = movie;
    } else if (selectedValue === "show") {
      currentArray = show;
    }else if (selectedValue === "game") {
      currentArray = game;
    }else if (selectedValue === "book") {
      currentArray = book;
    }
	
  } else {
    // Reset select value to current array
    const selectElement = document.getElementById("select-array");
    const currentArrayName = currentArray === movie ? "movie" :
             currentArray === show ? "show" :
             currentArray === game ? "game" :
             "book" 
    selectElement.value = currentArrayName;
  }
}

document.getElementById("select-array").addEventListener("change", function() {
  if (document.getElementById("search-bar-1").value === "") {
    handleSelectChange.call(this);
  } else {
    this.value = currentArray === movie ? "movie" :
             currentArray === show ? "show" :
             currentArray === game ? "game" :
             "book" 
			      
  }
});








document.addEventListener("click", function(event) {
  if (!event.target.closest(".search-container")) {
    const searchResults = document.querySelectorAll(".search-results");
    searchResults.forEach(result => {
      result.style.display = "none";
    });
  }
});





const submitBtn = document.getElementById('submit-btn');
const errorMsg = document.getElementById('error-msg');

submitBtn.addEventListener('click', (event) => {
  const search1Input = document.getElementById('search-bar-1');
  const search2Input = document.getElementById('search-bar-2');
  const descriptionInput = document.getElementById('description');

  if (search1Input.value === '' || search2Input.value === '' || descriptionInput.value === '') {
    event.preventDefault(); // prevent form submission
    if(search1Input.value === '' && search2Input.value === '' && descriptionInput.value === ''){
      errorMsg.style.display = 'block';

    }else if(search1Input.value === ''){
      errorMsg.style.display = 'block';
      errorMsg.innerHTML = "First content Empty";

    }else if(search2Input.value === ''){
      errorMsg.style.display = 'block';
      errorMsg.innerHTML = "Second content Empty";

    }else if(descriptionInput.value === ''){
      errorMsg.style.display = 'block';
      errorMsg.innerHTML = "Description Empty";
    
    }else{
      errorMsg.style.display = 'block';
      
    }
  } else {
    errorMsg.style.display = 'none';
    // continue with form submission or other actions
  }
});


</script>

<?php
$this->load->view('header/bottom');
?>