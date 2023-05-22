<?php
  $this->load->view('header/top');
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style>
.my-div {
  position: absolute;
  display: none;
  width: max-content;
  max-width: 300px;
  background-color: white;
  padding: 10px;
  border: 1px solid black;
  z-index: 1;
  top: 0;
  left: 0;
  transform: translate(-100%, 0);
}



  .image-container {
    position: relative; /* Set the parent container to be a positioned element */

    display: inline-block;
  }

  .image-container:hover .my-div {
    display: block;
    transform: translate(0, 0);
    left: 100%;
  }

  @media only screen and (max-width: 700px) {
    .modal-content {
      width: 100%;
    }
  }

</style>
<script>
document.getElementById("home").className = "active";


</script>

<br><br>
<div class="container-fluid no-padding" >
  <div class="row" >
  <div class="col-sm-1" >
      </div>
    <div class="col-sm-10" >
    <h1 style="text-align: center;">New movies this week</h1>
    <div class="container">
  <div class="row">
    <div class="col-1">
      <a class="carousel-control-next" href="#carouselNewMovies" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <div class="col-10">
      <div id="carouselNewMovies" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
            <?php if(!empty($newmoviecontent[0])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newmoviecontent[0]->contentId ?>">

                <img class="d-block w-100" src="uploads/<?php echo $newmoviecontent[0]->images?>" alt="Sixth slide">
                <p><?php echo $newmoviecontent[0]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newmoviecontent[1])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newmoviecontent[1]->contentId ?>">

                <img class="d-block w-100" src="uploads/<?php echo $newmoviecontent[1]->images?>" alt="Sixth slide">
                <p><?php echo $newmoviecontent[1]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newmoviecontent[2])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newmoviecontent[2]->contentId ?>">

                <img class="d-block w-100" src="uploads/<?php echo $newmoviecontent[2]->images?>" alt="Sixth slide">
                <p><?php echo $newmoviecontent[2]->title?></p>
              </a>
              </div>
              <?php }?>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
            <?php if(!empty($newmoviecontent[3])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newmoviecontent[3]->contentId ?>">

                <img class="d-block w-100" src="uploads/<?php echo $newmoviecontent[3]->images?>" alt="Sixth slide">
                <p><?php echo $newmoviecontent[3]->title?></p>
            </a>
              </div>
              <?php }?>
              <?php if(!empty($newmoviecontent[4])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newmoviecontent[4]->contentId ?>">

               <img class="d-block w-100" src="uploads/<?php echo $newmoviecontent[4]->images?>" alt="Sixth slide">
                <p><?php echo $newmoviecontent[4]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newmoviecontent[5])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newmoviecontent[0]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newmoviecontent[5]->images?>" alt="Sixth slide">
                <p><?php echo $newmoviecontent[5]->title?></p>
              </a>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-1">
    <a class="carousel-control-prev" href="#carouselNewMovies" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
  </div>
</div>
    </div>
    
    <div class="col-sm-1" >
      </div>
  </div>
</div>
</div>

<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-3" >
      </div>
    <div class="col-sm-6" >
    <div class="text-center">
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/new_movie'">See all new movies</button></h1>
        <hr>
    </div>
    </div>
    <div class="col-sm-3" >
      </div>
  </div>
</div>
</div>



<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-1" >
      </div>
    <div class="col-sm-10" >
    <h1 style="text-align: center;">New shows this week</h1>
    <div class="container">
  <div class="row">
    <div class="col-1">
      <a class="carousel-control-next" href="#carouselNewShows" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <div class="col-10">
      <div id="carouselNewShows" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
            <?php if(!empty($newshowcontent[0])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newshowcontent[0]->contentId ?>">
                <img class="d-block w-100" src="uploads/<?php echo $newshowcontent[0]->images?>" alt="Sixth slide">
                <p><?php echo $newshowcontent[0]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newshowcontent[1])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newshowcontent[1]->contentId ?>">

                <img class="d-block w-100" src="uploads/<?php echo $newshowcontent[1]->images?>" alt="Sixth slide">
                <p><?php echo $newshowcontent[1]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newshowcontent[2])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newshowcontent[2]->contentId ?>">

                <img class="d-block w-100" src="uploads/<?php echo $newshowcontent[2]->images?>" alt="Sixth slide">
                <p><?php echo $newshowcontent[2]->title?></p>
              </a>
              </div>
              <?php }?>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
            <?php if(!empty($newshowcontent[3])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newshowcontent[3]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newshowcontent[3]->images?>" alt="Sixth slide">
                <p><?php echo $newshowcontent[3]->title?></p>
            </a>
              </div>
              <?php }?>
              <?php if(!empty($newshowcontent[4])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newshowcontent[4]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newshowcontent[4]->images?>" alt="Sixth slide">
                <p><?php echo $newshowcontent[4]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newshowcontent[5])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newshowcontent[5]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newshowcontent[5]->images?>" alt="Sixth slide">
                <p><?php echo $newshowcontent[5]->title?></p>
              </a>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-1">
    <a class="carousel-control-prev" href="#carouselNewShows" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
  </div>
</div>
    </div>
    
    <div class="col-sm-1" >
      </div>
  </div>
</div>
</div>

<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-3" >
      </div>
    <div class="col-sm-6" >
    <div class="text-center">
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/new_show'">See all new show</button></h1>
        <hr>
    </div>
      </div>
    
    <div class="col-sm-3" >
      </div>
  </div>
</div>
</div>



<h3 style="color:white; text-align:center">User recommendations</h3>
<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-3" >
      </div>
    <div class="col-sm-2"  style="background-color: #292929; border-right: 1px solid grey;">
      <div class="row">
      <div class="col-sm-12">
        <a href="<?= base_url() ?>index.php/profile/<?= $userrecommendation[0]->user_id ?>">
        <img src='uploads/<?php echo $userrecommendation[0]->avatar ?>' class='contentImageProfile' alt='Profilepic' width='160' height='345'>
        
          <?php
            echo "User: ".base64_decode($userrecommendation[0]->username);
          ?>
          </a>
        </div>
        <div class="col-sm-5">
          
        <a href="<?= base_url() ?>index.php/display/<?= $userrecommendation[0]->oldid ?>">
        <?php
            $oldimage = $userrecommendation[0]->oldimage;
            $title = "Chosen";
            echo "<img src='uploads/$oldimage' class='contentImagerecommend'  alt='$title' width='50px' height='10px' ><br>"; 
            echo $userrecommendation[0]->oldtitle;

        ?>
        </a>
        </div>
        <div class="col-sm-2" >
        </div>
        <div class="col-sm-5">
        <a href="<?= base_url() ?>index.php/display/<?= $userrecommendation[0]->newid ?>">
        <?php
            $newimage = $userrecommendation[0]->newimage;
            $title = "Chosen";
            echo "<img src='uploads/$newimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
            echo $userrecommendation[0]->newtitle;
    
        ?>
        </a>
        </div>
        <div class="col-sm-12" style="color:white; text-align:center">
        <div class="image-container">
          Read reason
          <div class="my-div" style="background-color:grey; color:white;">
              <?php echo $userrecommendation[0]->description.'<br>' ?>
        </div>
        </div>
        <?php
             //echo $userrecommendation[0]->description.'<br>';
        ?>
        </div>
      </div>
    </div>
    <div class="col-sm-2"  style="background-color: #292929; border-right: 1px solid grey;">
    <div class="row">
    <div class="col-sm-12">
    <a href="<?= base_url() ?>index.php/profile/<?= $userrecommendation[1]->user_id ?>">

        <img src='uploads/<?php echo $userrecommendation[1]->avatar ?>' class='contentImageProfile' alt='Profilepic' width='160' height='345'>
          <?php
            echo "User: ".base64_decode($userrecommendation[2]->username);
            ?>
          </a>
        </div>
        <div class="col-sm-5">
        <a href="<?= base_url() ?>index.php/display/<?= $userrecommendation[1]->oldid ?>">
        <?php
            $oldimage = $userrecommendation[1]->oldimage;
            $title = "Chosen";
            echo "<img src='uploads/$oldimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
            echo $userrecommendation[1]->oldtitle;

        ?>
        </a>
        </div>
        <div class="col-sm-2" >
        </div>
        <div class="col-sm-5">
        <a href="<?= base_url() ?>index.php/display/<?= $userrecommendation[1]->newid ?>">
        <?php
            $newimage = $userrecommendation[1]->newimage;
            $title = "Chosen";
            echo "<img src='uploads/$newimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
            echo $userrecommendation[1]->newtitle;

        ?>
        </a>
        </div>
        <div class="col-sm-12" style="color:white; text-align:center">
        <div class="image-container">
          Read reason
          <div class="my-div" style="background-color:grey; color:white;">
              <?php echo $userrecommendation[1]->description.'<br>' ?>
          </div>        
        </div>
        <?php
             //echo $userrecommendation[1]->description.'<br>';
        ?>

        </div>
      </div>
    </div>

    <div class="col-sm-2"  style="background-color: #292929;">
    <div class="row">
    <div class="col-sm-12">
    <a href="<?= base_url() ?>index.php/profile/<?= $userrecommendation[2]->user_id ?>">

        <img src='uploads/<?php echo $userrecommendation[2]->avatar ?>' class='contentImageProfile' alt='Profilepic' >
          <?php
            echo "User: ".base64_decode($userrecommendation[2]->username);
            ?>
          </a>
        </div>
        <div class="col-sm-5" >
        <a href="<?= base_url() ?>index.php/display/<?= $userrecommendation[2]->oldid ?>">
        <?php
            $oldimage = $userrecommendation[2]->oldimage;
            $title = "Chosen";
            echo "<img src='uploads/$oldimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
            echo $userrecommendation[2]->oldtitle;

        ?>
        </a>
        </div>
        <div class="col-sm-2" >
        </div>
        <div class="col-sm-5" >
        <a href="<?= base_url() ?>index.php/display/<?= $userrecommendation[2]->newid ?>">
        <?php
            $newimage = $userrecommendation[2]->newimage;
            $title = "Chosen";
            echo "<img src='uploads/$newimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
            echo $userrecommendation[2]->newtitle;

        ?>
        </a>
        </div>
        <div class="col-sm-12" style="color:white; text-align:center">
        <div class="image-container">
          Read reason
          <div class="my-div" style="background-color:grey; color:white;">
              <?php echo $userrecommendation[2]->description.'<br>' ?>
          </div>        
        </div>       
         <?php
             //echo $userrecommendation[2]->description.'<br>';
        ?>
        </div>
      </div>
    </div>

    <div class="col-sm-1" >
      </div>
  </div>
</div>
 
<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-3" >
      </div>
    <div class="col-sm-6" >
    <div class="text-center">

      <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/recommendations'">See all recommendations</button></h1>
      <?php if(isset($this->session->userdata['logged_in'])){ ?>
        <p data-target='#LeaveRecommendation' data-toggle='modal' alt='banner' width='10%' >Recommend</p>
      <?php }else{?>
        <p data-target='#myModal' data-toggle='modal' alt='banner' width='10%' >Recommend</p>
      <?php }?>
      <hr>
    </div>
    </div>
    <div class="col-sm-3" >
      </div>
  </div>
</div>
</div>


<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-1" >
      </div>
    <div class="col-sm-10" >
    <h1 style="text-align: center;">New Games this week</h1>
    <div class="container">
  <div class="row">
    <div class="col-1">
      <a class="carousel-control-next" href="#carouselNewGames" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <div class="col-10">
      <div id="carouselNewGames" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
            <?php if(!empty($newgamecontent[0])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newgamecontent[0]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newgamecontent[0]->images?>" alt="Sixth slide">
                <p><?php echo $newgamecontent[0]->title?></p>
            </a>
              </div>
              <?php }?>
              <?php if(!empty($newgamecontent[1])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newgamecontent[1]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newgamecontent[1]->images?>" alt="Sixth slide">
                <p><?php echo $newgamecontent[1]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newgamecontent[2])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newgamecontent[2]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newgamecontent[2]->images?>" alt="Sixth slide">
                <p><?php echo $newbookcontent[2]->title?></p>
              </a>
              </div>
              <?php }?>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
            <?php if(!empty($newgamecontent[3])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newgamecontent[3]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newgamecontent[3]->images?>" alt="Sixth slide">
                <p><?php echo $newgamecontent[3]->title?></p>
            </a>
              </div>
              <?php }?>
              <?php if(!empty($newgamecontent[4])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newgamecontent[4]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newgamecontent[4]->images?>" alt="Sixth slide">
                <p><?php echo $newgamecontent[4]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newgamecontent[5])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newgamecontent[5]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newgamecontent[5]->images?>" alt="Sixth slide">
                <p><?php echo $newgamecontent[5]->title?></p>
              </a>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-1">
    <a class="carousel-control-prev" href="#carouselNewGames" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
  </div>
</div>
    </div>
    
    <div class="col-sm-1" >
      </div>
  </div>
</div>
</div>


<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-3" >
      </div>
    <div class="col-sm-6" >
    <div class="text-center">
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/new_game'">See all new game</button></h1>
        <hr>
    </div>
      </div>
    
    <div class="col-sm-3" >
      </div>
  </div>
</div>
</div>



<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-1" >
      </div>
    <div class="col-sm-10" >
    <h1 style="text-align: center;">New Books this week</h1>
    <div class="container">
  <div class="row">
    <div class="col-1">
      <a class="carousel-control-next" href="#carouselNewBooks" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <div class="col-10">
      <div id="carouselNewBooks" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
            <?php if(!empty($newbookcontent[0])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newbookcontent[0]->contentId ?>">
               <img class="d-block w-100" src="uploads/<?php echo $newbookcontent[0]->images?>" alt="Sixth slide">
                <p><?php echo $newbookcontent[0]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($newbookcontent[1])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newbookcontent[1]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newbookcontent[1]->images?>" alt="Sixth slide">
                <p><?php echo $newbookcontent[1]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newbookcontent[2])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newbookcontent[2]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newbookcontent[2]->images?>" alt="Sixth slide">
                <p><?php echo $newbookcontent[2]->title?></p>
              </a>
              </div>
              <?php }?>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
            <?php if(!empty($newbookcontent[3])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newbookcontent[3]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newbookcontent[3]->images?>" alt="Sixth slide">
                <p><?php echo $newbookcontent[3]->title?></p>
            </a>
              </div>
              <?php }?>
              <?php if(!empty($newbookcontent[4])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newbookcontent[4]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newbookcontent[4]->images?>" alt="Sixth slide">
                <p><?php echo $newbookcontent[4]->title?></p>
              </a>
              </div>
              <?php }?>
              <?php if(!empty($newbookcontent[5])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newbookcontent[5]->contentId ?>">

              <img class="d-block w-100" src="uploads/<?php echo $newbookcontent[5]->images?>" alt="Sixth slide">
                <p><?php echo $newbookcontent[5]->title?></p>
              </a>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-1">
    <a class="carousel-control-prev" href="#carouselNewBooks" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
  </div>
</div>
    </div>
    
    <div class="col-sm-1" >
      </div>
  </div>
</div>
</div>

<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-3" >
      </div>
    <div class="col-sm-6" >
    <div class="text-center">
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/new_book'">See all new book</button></h1>
        
    </div>
      </div>
    
    <div class="col-sm-3" >
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

            <input type="text" id="search-bar-2"  name="search-bar-2" placeholder="Search..." style="display:none">
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="submit-btn" class="btn btn-primary">Submit</button>

          <?php 
          echo form_close(); ?>
              </div>
      </div>
      
    </div>
  </div>

<script>







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

      div.style.background = "#ddd";
      div.style.color = "black";

        });
        div.addEventListener("mouseleave", function() {
          div.classList.remove("result-highlight");
      div.style.background = "";
      div.style.color = "";

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
    }else if (selectedValue === "staff") {
      currentArray = staff;
    }else if (selectedValue === "character") {
      currentArray = character;
    }
	
  } else {
    // Reset select value to current array
    const selectElement = document.getElementById("select-array");
    const currentArrayName = currentArray === movie ? "movie" : "show";
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
             currentArray === book ? "book" :
			      currentArray === staff ? "staff" :
             "character";
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