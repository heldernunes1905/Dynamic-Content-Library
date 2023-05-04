<?php
$this->load->view('header/top');
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script>
  document.getElementById("full").className = "active";
</script>

<?php

$uri = $_SERVER['REQUEST_URI']; 
$studio = str_replace("/CodeIgniter-3.1.10/index.php/studio/","",$uri);
$studiourl = "/CodeIgniter-3.1.10/index.php/studio/";

$genre = str_replace("/CodeIgniter-3.1.10/index.php/genre/","",$uri);
$genreurl = "/CodeIgniter-3.1.10/index.php/genre/";?>


<br><br>

  <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >

      <?php if(strpos($uri, 'studio')){
        echo '<p>'.$studiostuff[0]->first_name. ' '.$studiostuff[0]->first_name.'</p><br>';
        echo '<p>'.$studiostuff[0]->date_created.'</p><br>';
        echo '<p>'.$studiostuff[0]->description.'</p><br>';?>

        <?php   		
          if (isset($this->session->userdata['logged_in'])) {

            if(is_null($checkpreferencesdislike) && is_null($checkpreferenceslike)){
              ?>
              <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedstudio/<?= $studiostuff[0]->studio_id ?>"'></i>
              <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedstudio/<?= $studiostuff[0]->studio_id ?>"' ></i>
              <?php
            }else if(!is_null($checkpreferencesdislike) && !is_null($checkpreferenceslike)){
              if (($key = array_search($studiostuff[0]->studio_id , $checkpreferenceslike)) !== false){ ?>
                <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedstudio/<?= $studiostuff[0]->studio_id  ?>"'></i>
              <?php }else if (($key = array_search($studiostuff[0]->studio_id , $checkpreferencesdislike)) !== false){ ?>
                  <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedstudio/<?= $studiostuff[0]->studio_id  ?>"' ></i>
                <?php }else{
                ?>
                <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedstudio/<?= $studiostuff[0]->studio_id  ?>"'></i>
                <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedstudio/<?= $studiostuff[0]->studio_id  ?>"' ></i>
                <?php
              }
              }else{
              if(!is_null($checkpreferenceslike) ){
                if (($key = array_search($studiostuff[0]->studio_id , $checkpreferenceslike)) !== false){ ?>
                  <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedstudio/<?= $studiostuff[0]->studio_id  ?>"'></i>
                <?php }else{
                  ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedstudio/<?= $studiostuff[0]->studio_id  ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedstudio/<?= $studiostuff[0]->studio_id  ?>"' ></i>
                  <?php
                }
              }else if(!is_null($checkpreferencesdislike)){
                if (($key = array_search($studiostuff[0]->studio_id , $checkpreferencesdislike)) !== false){ ?>
                  <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedstudio/<?= $studiostuff[0]->studio_id  ?>"' ></i>
                <?php }else{
                  ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedstudio/<?= $studiostuff[0]->studio_id  ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedstudio/<?= $studiostuff[0]->studio_id  ?>"' ></i>
                  <?php
                }
              }
              
            }
          }
                ?>

        <a href="<?= base_url() ?>index.php/studio">See studio list</a>


      <?php }else if(strpos($uri, 'genre')){
        echo '<p>'.$genrestuff[0]->name.'</p><br>';
        echo '<p>'.$genrestuff[0]->description.'</p>';?>
        <?php   		
          if (isset($this->session->userdata['logged_in'])) {

            if(is_null($checkpreferencesdislike) && is_null($checkpreferenceslike)){
              ?>
              <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedgenre/<?= $genrestuff[0]->genre_id ?>"'></i>
              <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedgenre/<?= $genrestuff[0]->genre_id  ?>"' ></i>
              <?php
            }else if(!is_null($checkpreferencesdislike) && !is_null($checkpreferenceslike)){
              if (($key = array_search($genrestuff[0]->genre_id , $checkpreferenceslike)) !== false){ ?>
                <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedgenre/<?= $genrestuff[0]->genre_id  ?>"'></i>
              <?php }else if (($key = array_search($genrestuff[0]->genre_id , $checkpreferencesdislike)) !== false){ ?>
                  <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedgenre/<?= $genrestuff[0]->genre_id  ?>"' ></i>
                <?php }else{
                ?>
                <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedgenre/<?= $genrestuff[0]->genre_id  ?>"'></i>
                <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedgenre/<?= $genrestuff[0]->genre_id  ?>"' ></i>
                <?php
              }
              }else{
              if(!is_null($checkpreferenceslike) ){
                if (($key = array_search($genrestuff[0]->genre_id , $checkpreferenceslike)) !== false){ ?>
                  <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedgenre/<?= $genrestuff[0]->genre_id  ?>"'></i>
                <?php }else{
                  ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedgenre/<?= $genrestuff[0]->genre_id  ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedgenre/<?= $genrestuff[0]->genre_id  ?>"' ></i>
                  <?php
                }
              }else if(!is_null($checkpreferencesdislike)){
                if (($key = array_search($genrestuff[0]->genre_id , $checkpreferencesdislike)) !== false){ ?>
                  <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedgenre/<?= $genrestuff[0]->genre_id  ?>"' ></i>
                <?php }else{
                  ?>
                  <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedgenre/<?= $genrestuff[0]->genre_id  ?>"'></i>
                  <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedgenre/<?= $genrestuff[0]->genre_id  ?>"' ></i>
                  <?php
                }
              }
              
            }
                   
                }
                ?>
        <a href="<?= base_url() ?>index.php/genre">See genre list</a>


      <?php }
        ?>
  
      <br><br><br><br>
    </div>
    <div class="col-sm-1" >
      
      </div>
  </div>
</div>

  <div class="container-fluid no-padding">
  <div id="my-row" class="row">
  <div class="col-sm-1" ></div>

  <div class="col-sm-10"  >
  <div class="row">

  <?php
    
      foreach ($contents as $content) {

        ?><div class="col-sm-2"  ><?php

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
            if($uri == $studiourl.$studio || $uri == $genreurl.$genre){
              echo "<img src='../../uploads/$images'class='contentImage' id='myImg' alt='$title' width='10%' >";
              echo "<p>$title</p>"; 
            }else{
              echo "<img src='../uploads/$images' class='contentImage' id='myImg' alt='$title' width='10%' >"; 
              echo "<p>$title</p>"; 

            } ?>
          </a>
          <div class="my-div" style="background-color:grey; color:white;">
            <?php echo $content[0]->title.'<br>' ?>
            <div class="container-fluid no-padding">
            <div id="my-row" class="row" >
              <div class="col-sm-12"  >
              <div class="row">
              <div class="col-sm-3"  style="border-right:1px solid black;">
                <p><?php echo $content[0]->ep_number.' x '. $content[0]->duration.' min';?></p>
              </div>
              <div class="col-sm-3" style="border-right:1px solid black;" >
              <p><?php if(!empty($content[0]->studio_id)){
                 ?>
                <a href="<?= base_url() ?>index.php/studio/<?= $content[0]->studio_id ?>"><?php echo $content[0]->first_name . " " . $content[0]->last_name?></a>
                <?php }else{
                  echo "No studio assigned<br>";
                }
                ?>
              </p>
              </div>
              <div class="col-sm-3"  style="border-right:1px solid black;">
                <?php echo $content[0]->release_date.'<br>' ?>
              </div>
              <div class="col-sm-2"  style="border-right:1px solid black;">
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
           
            <?php
            if (!empty($useraddlist)) {
              foreach ($useraddlist as $addlist) {
                if ($content[0]->contentId == $addlist[0]) {
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
            ?>
            <?php if(isset($this->session->userdata['logged_in'])){?>

              <?php
                  
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
                ?>
          </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>

        </div>
        
        <div class="col-sm-1" ></div>
   
      <?php } ?>
      </div>

</div>
    <div class="col-sm-1" >
      
    </div>

  </div>
</div>


<?php
$this->load->view('header/bottom');
?>