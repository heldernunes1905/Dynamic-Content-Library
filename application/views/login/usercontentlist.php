<?php
$uri = $_SERVER['REQUEST_URI']; 
$profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
$profileId = strtok($profileId, '/');
$type = str_replace("/CodeIgniter-3.1.10/index.php/profile/$profileId/","",$uri);
$type = strtok($type, '/');

if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
    $this->load->view('login/insideheader/header');
    $user_not_log = $user_id;
  } else {
      $user_id = $profileId;

      $this->load->view('login/insideheader/headernotlog');
      $user_not_log = 0;

  }

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


.contentImage{
    width : 180px;
    height : 200px;
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



 .my-div {
  position: absolute;
  display: none;
  background-color: white;
  border: 1px solid black;
  padding: 10px;
  width: 500px;
  height: auto;
  z-index: 1;
  overflow: hidden;
}


  .image-container {
    position: relative; /* Set the parent container to be a positioned element */

    display: inline-block;
  }

  .image-container:hover .my-div {
    display: block;
  }

  @media only screen and (max-width: 700px) {
    .modal-content {
      width: 100%;
    }
  }
  select{
    color:black;
  }
</style>
<script>
document.getElementById("full").className = "active";
</script>
	<br />
  <?php if(!empty($checkuserblocked) || !isset($this->session->userdata['logged_in'])){
    $checkuserblocked = array();?>
  <?php if(($key = array_search($user_id, $checkuserblocked)) !== false && empty($checkuserblocked)){
      }else{ ?>

  <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-7"  >
      <nav class="navbar navbar-expand-lg navbar-light" >
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="row">
      <div class="collapse navbar-collapse" id="navbarNav" ><!-- style="background-color: yellow;"-->
        <ul class="navbar-nav">
        <?php 
        if($state[0]->profile_state == 1){
        switch($type){
          case "movielist":?>
          
          <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist">All</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist/1">Watched</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist/2">Want to watch</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist/3">Stalled</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist/4">Dropped</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php break;
          case "showlist":?>
          <li class="nav-item" >
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist">All</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist/1">Watched</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist/2">Want to watch</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist/3">Stalled</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist/4">Dropped</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php break;
          case "booklist":?>
           <li class="nav-item">
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist">All</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist/1">Read</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist/2">Want to read</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist/3">Stalled</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist/4">Dropped</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php break;
          case "gamelist":?>
          <li class="nav-item">
                <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist">All</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist/1">Finished</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist/2">Want to play</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist/3">Stalled</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist/4">Dropped</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php break;
        }
        ?>
        </ul>
      </div>
      </nav>
    </div>
    <div class="col-sm-3"  >
      <i class="fa fa-th fa-2x" aria-hidden="true" id="btn1"></i>
      <i class="fa fa-list fa-2x" aria-hidden="true" id="btn2"></i>
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

  
     <br>
    </div>
    <div class="col-sm-1" >
      
      </div>
  </div>
  </div>

  <div id="div1" style="display:none;">

  <?php 
    if(!empty($contentslist)){

      $listId = str_replace("/CodeIgniter-3.1.10/index.php/profile/$profileId/list/","",$uri);
        ?>

      <div class="container-fluid no-padding">
      <div id="my-row" class="row">
      <div class="col-sm-1" ></div>
      <div class="col-sm-10" >
      <div class="row">

    <?php

      foreach ($contentslist as $content) {
        ?> 
        
        <div class="col-sm-2"  ><?php
        if(!empty($content[0]->name)){
          $genre_total = $content[0]->name;
        }else{
          $genre_total = 'No genres';
        }

        $myArray = explode(',', $genre_total);
        ?>
        <div class="image-container">
          <a href="<?= base_url() ?>index.php/display/<?= $content[0]->contentId ?>">
            <?php
            $images = $content[0]->images;
            $title = $content[0]->title;

              if(substr($uri, -1) == 1 || substr($uri, -1) == 2 || substr($uri, -1) == 3 || substr($uri, -1) == 4 ){
                echo "<img src='../../../../uploads/$images' class='contentImage' id='myImg' alt='$title' width='10%' >"; 

              }else{
                echo "<img src='../../../uploads/$images' class='contentImage' id='myImg' alt='$title' width='10%' >"; 

              }


              foreach($useraddlist as $addlist){
                if($content[0]->contentId == $addlist[0]){
                  switch($addlist[1]){
                    case 0: ?>
                      No List <?php echo $content[0]->personalrating ?>
                     <?php break;
                    case 1: ?>
                      Watched <?php echo $content[0]->personalrating ?>
                      <?php break;
                    case 2: ?>
                      Want to Watch <?php echo $content[0]->personalrating ?>
                      <?php break;
                    case 3: ?>
                       Stalled <?php echo $content[0]->personalrating ?>
                      <?php break;
                    case 4: ?>
                       Dropped <?php echo $content[0]->personalrating ?>
                      <?php break;
                  }
                }
              }
              echo "<p>$title</p>"; 

            ?>
          </a>
          <div class="my-div" style="background-color:grey; color:white;">
            <?php echo $content[0]->title.'<br>' ?>
            <div class="container-fluid no-padding">
            <div id="my-row" class="row">

              <div class="col-sm-12"  >
              <div class="row">
              <div class="col-sm-3"  style="border-right:1px solid black;">
              <p><?php echo $content[0]->ep_number.' x '. $content[0]->duration.' min';?></p>
              </div>
              <div class="col-sm-3"  style="border-right:1px solid black;">
              <p><?php if(!empty($content[0]->studio_id)){
                 ?>
                <a href="<?= base_url() ?>index.php/studio/<?= $content[0]->studio_id ?>"><?php echo $content[0]->first_name . " " . $content[0]->last_name?></a>
                <?php }else{
                  echo "No studio assigned<br>";
                }
                ?>
              </p>              </div>
              <div class="col-sm-3"  style="border-right:1px solid black;">
                <?php echo date("d-m-Y", strtotime($content[0]->release_date)).'<br>' ?>
              </div>
              <div class="col-sm-3" style="border-right:1px solid black;" >
                <?php echo $content[0]->rating.'<br>' ?>
              </div>
              </div>
            </div>

          </div>
          </div>

          <?php echo $content[0]->description.'<br>' ?>

            <?php foreach ($myArray as $genreshow) { 
                if($genreshow == "No genres"){
                  echo $genreshow;
                }else{
              ?>
              <a style="background-color:#6C6A61; color:white;  border-radius: 1px" href="<?= base_url() ?>index.php/genre/<?= $genreshow ?>"><?php echo $genreshow ?></a>
            <?php 
                }
              } ?></br>
            <?php if(isset($this->session->userdata['logged_in'])){?>


            <?php if($profileId == $user_not_log){?>
              <?php 
              foreach($useraddlist as $addlist){
                if($content[0]->contentId == $addlist[0]){
                  switch($addlist[1]){
                    case 0: ?>
                     <select name="list" id="list" class="select">
                      <option value="0<?php echo $content[0]->contentId?>" selected>No list</option>
                      <option value="1<?php echo $content[0]->contentId?>" >watched</option>
                      <option value="2<?php echo $content[0]->contentId?>">want to watch</option>
                      <option value="3<?php echo $content[0]->contentId?>">stalled</option>
                      <option value="4<?php echo $content[0]->contentId?>">dropped</option>
                    </select>
                     <?php break;
                    case 1: ?>
                      <select name="list" id="list" class="select">
                       <option value="0<?php echo $content[0]->contentId?>" >No list</option>
                       <option value="1<?php echo $content[0]->contentId?>" selected>watched</option>
                       <option value="2<?php echo $content[0]->contentId?>">want to watch</option>
                       <option value="3<?php echo $content[0]->contentId?>">stalled</option>
                       <option value="4<?php echo $content[0]->contentId?>">dropped</option>
                     </select>
                      <?php break;
                    case 2: ?>
                      <select name="list" id="list" class="select">
                      <option value="0<?php echo $content[0]->contentId?>" >No list</option>
                       <option value="1<?php echo $content[0]->contentId?>" >watched</option>
                       <option value="2<?php echo $content[0]->contentId?>"selected>want to watch</option>
                       <option value="3<?php echo $content[0]->contentId?>">stalled</option>
                       <option value="4<?php echo $content[0]->contentId?>">dropped</option>
                     </select>
                      <?php break;
                    case 3: ?>
                       <select name="list" id="list" class="select">
                      <option value="0<?php echo $content[0]->contentId?>" >No list</option>
                       <option value="1<?php echo $content[0]->contentId?>" >watched</option>
                       <option value="2<?php echo $content[0]->contentId?>">want to watch</option>
                       <option value="3<?php echo $content[0]->contentId?>" selected>stalled</option>
                       <option value="4<?php echo $content[0]->contentId?>">dropped</option>
                     </select>
                      <?php break;
                    case 4: ?>
                       <select name="list" id="list" class="select">
                      <option value="0<?php echo $content[0]->contentId?>" >No list</option>
                       <option value="1<?php echo $content[0]->contentId?>" >watched</option>
                       <option value="2<?php echo $content[0]->contentId?>">want to watch</option>
                       <option value="3<?php echo $content[0]->contentId?>">stalled</option>
                       <option value="4<?php echo $content[0]->contentId?>" selected>dropped</option>
                     </select>
                      <?php break;
                  }
                }
              }
            ?>      
              <?php
                    if($addlist[1] != 0){?>
                    <select name="ep_list" id="ep_list" class="ep_list">
                    <?php 
                    $ep_number = $content[0]->ep_number;
                    for ($i = 0; $i <= $ep_number; $i++) {?>
                    <?php if($content[0]->amount_watched == $i){?>
                      <option value="<?= $i.'/'.$content[0]->contentId ?>"  selected><?= $i ?></option>
                    <?php }else{?>
                      <option value="<?= $i.'/'.$content[0]->contentId?>"  ><?= $i ?></option>
                                                            
                    <?php ?>
                    <?php }?>
                    <?php } ?>
                    </select>
                    <?php }

                   if(is_null($checkpreferencesdislike) && is_null($checkpreferenceslike)){
                    ?>
                    <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $content[0]->contentId ?>"'></i>
                    <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $content[0]->contentId ?>"' ></i>
                    <?php
                  }else if(!is_null($checkpreferencesdislike) && !is_null($checkpreferenceslike)){
                    if (($key = array_search($content[0]->contentId, $checkpreferenceslike)) !== false){ ?>
                      <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcontent/<?= $content[0]->contentId ?>"'></i>
                    <?php }else if (($key = array_search($content[0]->contentId, $checkpreferencesdislike)) !== false){ ?>
                        <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcontent/<?= $content[0]->contentId ?>"' ></i>
                      <?php }else{
                      ?>
                      <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $content[0]->contentId ?>"'></i>
                      <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $content[0]->contentId ?>"' ></i>
                      <?php
                    }
                    }else{
                    if(!is_null($checkpreferenceslike) ){
                      if (($key = array_search($content[0]->contentId, $checkpreferenceslike)) !== false){ ?>
                        <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcontent/<?= $content[0]->contentId ?>"'></i>
                      <?php }else{
                        ?>
                        <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $content[0]->contentId ?>"'></i>
                        <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $content[0]->contentId ?>"' ></i>
                        <?php
                      }
                    }else if(!is_null($checkpreferencesdislike)){
                      if (($key = array_search($content[0]->contentId, $checkpreferencesdislike)) !== false){ ?>
                        <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcontent/<?= $content[0]->contentId ?>"' ></i>
                      <?php }else{
                        ?>
                        <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $content[0]->contentId ?>"'></i>
                        <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $content[0]->contentId ?>"' ></i>
                        <?php
                      }
                    }
                    
                  }  
                }
                   
              }
              ?>
          </div>
        </div>
        </div>
        <div class="col-sm-1" ></div>
      <?php } ?>
            </div>
            </div>
      <div class="col-sm-1" ></div>

  </div>
</div>


<?php
    

    }
  

    if(!empty($contentslist)){

    ?> 
  </div>

  <div id="div2" style="display:none;">
  
  <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
        
        <table>
        <div class="row">

        <tr>
          <th class="col-sm-2">Image</th>
          <th class="col-sm-2">Title</th>
          <th class="col-sm-2">Genre</th>
          <th class="col-sm-2">State</th>
          <th class="col-sm-2">User Rating</th>
          <?php 
          if($profileId == $user_not_log){?>
          <th class="col-sm-2">Options</th>
          <?php }?>
        </tr>
      <?php 


      foreach ($contentslist as $content) { 
        $genre_total = $content[0]->name;
        $myArray = explode(',', $genre_total);
        $images = $content[0]->images;
                $title = $content[0]->title;
        ?>
        <tr>
          
          <td class="col-sm-2">
            <a href="<?= base_url() ?>index.php/display/<?= $content[0]->contentId ?>">
            
            <?php 
            if(substr($uri, -1) == 1 || substr($uri, -1) == 2 || substr($uri, -1) == 3 || substr($uri, -1) == 4 ){
              echo "<img src='../../../../uploads/$images' class='contentImage' id='myImg' alt='$title' width='10%' >"; 

            }else{
              echo "<img src='../../../uploads/$images' class='contentImage' id='myImg' alt='$title' width='10%' >"; 

            }?></a>
          </td>
          
          
            <td class="col-sm-2"><?php echo $content[0]->title?></td>
          <?php if($genre_total != "0"){?>
          <td class="col-sm-2"><?php foreach ($myArray as $genreshow) {?>
                  <a href="<?= base_url() ?>index.php/genre/<?= $genreshow ?>" style="border: 1px solid gray;"  ><?php echo $genreshow?></a>
            <?php }
            }else{ 
              echo "<td>No genre assigned to content</td>";
            }?>
            
          


          <td class="col-sm-2">
          <?php 
              foreach($useraddlist as $addlist){
                if($content[0]->contentId == $addlist[0]){
                  switch($addlist[1]){
                    case 0:
                      echo "No list".'<br>';
                      break;
                    case 1:
                      echo "watched".'<br>';
                      break;
                    case 2:
                      echo "want to watch".'<br>';
                      break;
                    case 3:
                      echo "stalled".'<br>';
                      break;
                    case 4:
                      echo "dropped".'<br>';
                      break;
                  }
                }
              }
            ?>
          </td>

          <td class="col-sm-2"><?php echo $content[0]->personalrating?></td>
          <?php if($profileId == $user_not_log){?>
            <td class="col-sm-2">
              
            <?php 
              foreach($useraddlist as $addlist){
                if($content[0]->contentId == $addlist[0]){

                  switch($addlist[1]){

                    case 0: ?>
                     <select name="list" id="list" class="select">
                      <option value="0<?php echo $content[0]->contentId?>" selected>No list</option>
                      <option value="1<?php echo $content[0]->contentId?>" >watched</option>
                      <option value="2<?php echo $content[0]->contentId?>">want to watch</option>
                      <option value="3<?php echo $content[0]->contentId?>">stalled</option>
                      <option value="4<?php echo $content[0]->contentId?>">dropped</option>
                    </select>
                     <?php break;
                    case 1: ?>
                      <select name="list" id="list" class="select">
                       <option value="0<?php echo $content[0]->contentId?>" >No list</option>
                       <option value="1<?php echo $content[0]->contentId?>" selected>watched</option>
                       <option value="2<?php echo $content[0]->contentId?>">want to watch</option>
                       <option value="3<?php echo $content[0]->contentId?>">stalled</option>
                       <option value="4<?php echo $content[0]->contentId?>">dropped</option>
                     </select>
                      <?php break;
                    case 2: ?>
                      <select name="list" id="list" class="select">
                      <option value="0<?php echo $content[0]->contentId?>" >No list</option>
                       <option value="1<?php echo $content[0]->contentId?>" >watched</option>
                       <option value="2<?php echo $content[0]->contentId?>"selected>want to watch</option>
                       <option value="3<?php echo $content[0]->contentId?>">stalled</option>
                       <option value="4<?php echo $content[0]->contentId?>">dropped</option>
                     </select>
                      <?php break;
                    case 3: ?>
                       <select name="list" id="list" class="select">
                      <option value="0<?php echo $content[0]->contentId?>" >No list</option>
                       <option value="1<?php echo $content[0]->contentId?>" >watched</option>
                       <option value="2<?php echo $content[0]->contentId?>">want to watch</option>
                       <option value="3<?php echo $content[0]->contentId?>" selected>stalled</option>
                       <option value="4<?php echo $content[0]->contentId?>">dropped</option>
                     </select>
                      <?php break;
                    case 4: ?>
                       <select name="list" id="list" class="select">
                      <option value="0<?php echo $content[0]->contentId?>" >No list</option>
                       <option value="1<?php echo $content[0]->contentId?>" >watched</option>
                       <option value="2<?php echo $content[0]->contentId?>">want to watch</option>
                       <option value="3<?php echo $content[0]->contentId?>">stalled</option>
                       <option value="4<?php echo $content[0]->contentId?>" selected>dropped</option>
                     </select>
                      <?php break;
                  }
                }
              }
            ?>
            <?php
                    
                    if($addlist[1] != 0){?>
                    <select name="ep_list" id="ep_list"  class="ep_list">
                    <?php 
                    $ep_number = $content[0]->ep_number;
                    for ($i = 0; $i <= $ep_number; $i++) {?>
                    <?php if($content[0]->amount_watched == $i){?>
                      <option value="<?= $i.'/'.$content[0]->contentId ?>"  selected><?= $i ?></option>
                    <?php }else{?>
                      <option value="<?= $i.'/'.$content[0]->contentId ?>"  ><?= $i ?></option>
                                                            
                    <?php ?>
                    <?php }?>
                    <?php } ?>
                    </select>
                    <?php }
               
               if(is_null($checkpreferencesdislike) && is_null($checkpreferenceslike)){
                ?>
                <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $content[0]->contentId ?>"'></i>
                <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $content[0]->contentId ?>"' ></i>
                <?php
              }else if(!is_null($checkpreferencesdislike) && !is_null($checkpreferenceslike)){
                if (($key = array_search($content[0]->contentId, $checkpreferenceslike)) !== false){ ?>
                  <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcontent/<?= $content[0]->contentId ?>"'></i>
                <?php }else if (($key = array_search($content[0]->contentId, $checkpreferencesdislike)) !== false){ ?>
                    <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcontent/<?= $content[0]->contentId ?>"' ></i>
                  <?php }else{
                  ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $content[0]->contentId ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $content[0]->contentId ?>"' ></i>
                  <?php
                }
                }else{
                if(!is_null($checkpreferenceslike) ){
                  if (($key = array_search($content[0]->contentId, $checkpreferenceslike)) !== false){ ?>
                    <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcontent/<?= $content[0]->contentId ?>"'></i>
                  <?php }else{
                    ?>
                    <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $content[0]->contentId ?>"'></i>
                    <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $content[0]->contentId ?>"' ></i>
                    <?php
                  }
                }else if(!is_null($checkpreferencesdislike)){
                  if (($key = array_search($content[0]->contentId, $checkpreferencesdislike)) !== false){ ?>
                    <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcontent/<?= $content[0]->contentId ?>"' ></i>
                  <?php }else{
                    ?>
                    <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcontent/<?= $content[0]->contentId ?>"'></i>
                    <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcontent/<?= $content[0]->contentId ?>"' ></i>
                    <?php
                  }
                }
                
              }
                } ?>
            </td>
           
        </tr>
              
      <?php } 
      }
      }?> 
        
      </table>
    </div>
    </div>
    <div class="col-sm-1" >

      </div>
  </div>
  </div>
  

  
</div>
<script>

 var selectElements = document.getElementsByClassName("select");
  for (var i = 0; i < selectElements.length; i++) {
    selectElements[i].addEventListener("change", function() {
      var selectedValue = this.value;
      var state = selectedValue.charAt(0);
      var selectedValue = selectedValue.substr(1);
      window.location="<?= base_url() ?>index.php/addwatchlist/<?= $user_id?>/" + selectedValue +"/" + state;
      
    });
  }

  var selectEpisodes = document.getElementsByClassName("ep_list");
  for (var i = 0; i < selectEpisodes.length; i++) {
    selectEpisodes[i].addEventListener("change", function() {
      var selectedValueEp = this.value;
      var parts = selectedValueEp.split("/");
      var stateEp = parts[0];
      var selectedValueEp = parts[1];

      window.location="<?= base_url() ?>index.php/addwatchedepisodes/<?= $user_id?>/" + selectedValueEp +"/" + stateEp
});
  }

  
const btn1 = document.getElementById("btn1");
const btn2 = document.getElementById("btn2");
const div1 = document.getElementById("div1");
const div2 = document.getElementById("div2");

//Get the saved button state from local storage
const savedButton = localStorage.getItem('clickedButton');


//Show the saved div if the saved button is btn1
if (savedButton === 'btn1') {
  document.getElementById('div1').style.display = 'block';
  document.getElementById('div2').style.display = 'none';
}else if (savedButton === 'btn2') {
  document.getElementById('div1').style.display = 'none';
  document.getElementById('div2').style.display = 'block';
}else { // Show the first div by default if nothing is saved
  document.getElementById('div1').style.display = 'block';
  document.getElementById('div2').style.display = 'none';
}



//Add click event listeners to each button
document.getElementById('btn1').addEventListener('click', function() {
  localStorage.setItem('clickedButton', 'btn1');
  document.getElementById('div1').style.display = 'block';
  document.getElementById('div2').style.display = 'none';
});

document.getElementById('btn2').addEventListener('click', function() {
  localStorage.setItem('clickedButton', 'btn2');
  document.getElementById('div1').style.display = 'none';
  document.getElementById('div2').style.display = 'block';
});




</script>  
<?php
      }
    }
$this->load->view('header/bottom');
?>