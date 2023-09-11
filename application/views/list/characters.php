<?php
$this->load->view('header/top');
defined('BASEPATH') or exit('No direct script access allowed');
?>
<style>
  #myImg {
    border-radius: 5px;
    width:100%;
    height:400px;
  }

  .characterImages{
    width : 100px;
    height : 100px;
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

  .my-div {
    display: none;
    float: right;
    border: 1px solid red;
    z-index: 10;
  }

  .image-container {
    display: inline-block;
  }

  .image-container:hover .my-div {
    display: block;
  }
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
      <?php   echo "<h1>$content->title</h1>"?>

  
  <nav class="navbar navbar-expand-lg navbar-light" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" style=" border: 1px solid grey;"><!-- style="background-color: yellow;"-->
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
  <div class="row">
    <div class="col-sm-1" ></div>
    <div class="col-sm-2" >
      <?php echo "<img src='../../../uploads/$content->images'class='myImages' width='100%' alt='$content->title' >" . '<br/>';?>
    </div>
    <div class="col-sm-1" ></div>
    <div class="col-sm-7" >
      <div class="row">

      <?php
      if ($contents != 0) {
        foreach ($contents as $content) {
          ?>
          <div class="col-sm-5" style=" border: 1px solid grey;">
            <a href="<?= base_url() ?>index.php/characters/<?= $content[0]->character_id ?>">
              <?php
              $images = $content[0]->pictures;
              $title = $content[0]->first_name . " " . $content[0]->last_name;?>
              
              <div class="row">
                <div class="col-sm-5" >
                  <?php echo "<img src='../../../uploads/$images' class='characterImages' alt='$title'  >";?>
                  </a>

                </div>
                <div class="col-sm-5" style="color:white">
                  <?php echo "$title<br>";?>

                  <?php if(isset($this->session->userdata['logged_in'])){?>

                    <?php
                          if(is_null($checkpreferencesdislike) && is_null($checkpreferenceslike)){
                            ?>
                            <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcharacter/<?= $content[0]->character_id ?>"'></i>
                            <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcharacter/<?= $content[0]->character_id ?>"' ></i>
                            <?php
                          }else if(!is_null($checkpreferencesdislike) && !is_null($checkpreferenceslike)){
                            if (($key = array_search($content[0]->character_id, $checkpreferenceslike)) !== false){ ?>
                              <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcharacter/<?= $content[0]->character_id ?>"'></i>
                            <?php }else if (($key = array_search($content[0]->character_id, $checkpreferencesdislike)) !== false){ ?>
                                <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcharacter/<?= $content[0]->character_id ?>"' ></i>
                              <?php }else{
                              ?>
                              <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcharacter/<?= $content[0]->character_id ?>"'></i>
                              <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcharacter/<?= $content[0]->character_id ?>"' ></i>
                              <?php
                            }
                            }else{
                            if(!is_null($checkpreferenceslike) ){
                              if (($key = array_search($content[0]->character_id, $checkpreferenceslike)) !== false){ ?>
                                <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedcharacter/<?= $content[0]->character_id ?>"'></i>
                              <?php }else{
                                ?>
                                <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcharacter/<?= $content[0]->character_id ?>"'></i>
                                <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcharacter/<?= $content[0]->character_id ?>"' ></i>
                                <?php
                              }
                            }else if(!is_null($checkpreferencesdislike)){
                              if (($key = array_search($content[0]->character_id, $checkpreferencesdislike)) !== false){ ?>
                                <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedcharacter/<?= $content[0]->character_id ?>"' ></i>
                              <?php }else{
                                ?>
                                <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedcharacter/<?= $content[0]->character_id ?>"'></i>
                                <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedcharacter/<?= $content[0]->character_id ?>"' ></i>
                                <?php
                              }
                            }
                            
                          }
                          
                      ?>
                     
                  <?php }?>
                  </div>
              </div>
          </div>
          <div class="col-sm-1" ></div>
          
        <?php }
      } ?>

      </div>

    </div>

    <div class="col-sm-1" ></div>
  </div>
</div>
<?php
}
?>


<!--<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>-->
<script>

  $(".myImages").hover(function () {
    $(this).next(".my-div").show();
  }, function () {
    $(this).next(".my-div").hide();
  });
</script>
<?php
$this->load->view('header/bottom');
?>