<?php

$this->load->view('header/top');
if (isset($this->session->userdata['logged_in'])) {
  $user_id = ($this->session->userdata['logged_in']['user_id']);
}else{
  $user_id= 0;
}
defined('BASEPATH') or exit('No direct script access allowed');

?>

<br><br>

<div class="container-fluid no-padding" >
  <div class="row">
  <div class="col-sm-1" >
      </div>
    <div class="col-sm-10">
    <h1 style="text-align: center;">New Releases</h1>
    <div class="container">
  <div class="row">
    <div class="col-1">
      <a class="carousel-control-next" href="#carouselNewRelease" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <div class="col-10">
      <div id="carouselNewRelease" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
            <?php if(!empty($newReleases[0])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newReleases[0]->contentId ?>">

              <img class="d-block w-100" src="../uploads/<?php echo $newReleases[0]->images?>" alt="Sixth slide">
                <p><?php echo $newReleases[0]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($newReleases[1])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newReleases[1]->contentId ?>">
                <img class="d-block w-100" src="../uploads/<?php echo $newReleases[1]->images?>" alt="Sixth slide">
                <p><?php echo $newReleases[1]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($newReleases[2])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newReleases[2]->contentId ?>">
                <img class="d-block w-100" src="../uploads/<?php echo $newReleases[2]->images?>" alt="Sixth slide">
                <p><?php echo $newReleases[2]->title?></p>
              </a>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
            <?php if(!empty($newReleases[3])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newReleases[3]->contentId ?>">
                <img class="d-block w-100" src="../uploads/<?php echo $newReleases[3]->images?>" alt="Sixth slide">
                <p><?php echo $newReleases[3]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($newReleases[4])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newReleases[4]->contentId ?>">

                <img class="d-block w-100" src="../uploads/<?php echo $newReleases[4]->images?>" alt="Sixth slide">
                <p><?php echo $newReleases[4]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($newReleases[5])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $newReleases[5]->contentId ?>">
                <img class="d-block w-100" src="../uploads/<?php echo $newReleases[5]->images?>" alt="Sixth slide">
                <p><?php echo $newReleases[5]->title?></p>
              </a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-1">
    <a class="carousel-control-prev" href="#carouselNewRelease" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
  </div>
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
      <?php if($type == "movie"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/new_movie'">See all new movie</button></h1>
      <?php }else if($type == "show"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/new_show'">See all new show</button></h1>
      <?php }else if($type == "book"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/new_book'">See all new book</button></h1>
      <?php }else if($type == "game"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/new_game'">See all new game</button></h1>
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
    <div class="col-sm-10"  >
    <h1 style=" text-align: center;">Upcoming</h1>
    <div class="container">
  <div class="row">
    <div class="col-1">
      <a class="carousel-control-next" href="#carouselUpcoming" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <div class="col-10" >
      
      <div id="carouselUpcoming" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
            <?php if(!empty($upcoming[0])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $upcoming[0]->contentId ?>">
                <img class="d-block w-100" src="../uploads/<?php echo $upcoming[0]->images?>" alt="Sixth slide">
                <p><?php echo $upcoming[0]->title?></p>
            </a>
              </div>
              
              <?php } ?>
              <?php if(!empty($upcoming[1])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $upcoming[1]->contentId ?>">
                <img class="d-block w-100" src="../uploads/<?php echo $upcoming[1]->images?>" alt="Sixth slide">
                <p><?php echo $upcoming[1]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($upcoming[2])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $upcoming[2]->contentId ?>">
                <img class="d-block w-100" src="../uploads/<?php echo $upcoming[2]->images?>" alt="Sixth slide">
                <p><?php echo $upcoming[2]->title?></p>
              </a>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
            <?php if(!empty($upcoming[3])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $upcoming[3]->contentId ?>">

              <img class="d-block w-100" src="../uploads/<?php echo $upcoming[3]->images?>" alt="Sixth slide">
                <p><?php echo $upcoming[3]->title?></p>
            </a>
              </div>
              <?php } ?>
              <?php if(!empty($upcoming[4])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $upcoming[4]->contentId ?>">

              <img class="d-block w-100" src="../uploads/<?php echo $upcoming[4]->images?>" alt="Sixth slide">
                <p><?php echo $upcoming[4]->title?></p>
                </a>
              </div>
              
              <?php } ?>
              <?php if(!empty($upcoming[5])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $upcoming[5]->contentId ?>">

              <img class="d-block w-100" src="../uploads/<?php echo $upcoming[5]->images?>" alt="Sixth slide">
                <p><?php echo $upcoming[5]->title?></p>
                </a>
              </div>
              
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-1">
    <a class="carousel-control-prev" href="#carouselUpcoming" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
  </div>
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

      <?php if($type == "movie"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/upcoming_movie'">See all upcoming movie</button></h1>
      <?php }else if($type == "show"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/upcoming_show'">See all upcoming show</button></h1>
      <?php }else if($type == "book"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/upcoming_book'">See all upcoming book</button></h1>
      <?php }else if($type == "game"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/upcoming_game'">See all upcoming game</button></h1>
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
    <h1 style=" text-align: center;">Highest Rated</h1>
    <div class="container">
  <div class="row">
    <div class="col-1">
      <a class="carousel-control-next" href="#carouselHighestRated" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <div class="col-10">
      
      <div id="carouselHighestRated" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
            <?php if(!empty($highest[0])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $highest[0]->contentId ?>">
                <img class="d-block w-100" src="../uploads/<?php echo $highest[0]->images?>" alt="Sixth slide">
                <p><?php echo $highest[0]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($highest[1])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $highest[1]->contentId ?>">

                <img class="d-block w-100" src="../uploads/<?php echo $highest[1]->images?>" alt="Sixth slide">
                <p><?php echo $highest[1]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($highest[2])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $highest[2]->contentId ?>">

              <img class="d-block w-100" src="../uploads/<?php echo $highest[2]->images?>" alt="Sixth slide">
                <p><?php echo $highest[2]->title?></p>
              </a>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
            <?php if(!empty($highest[3])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $highest[3]->contentId ?>">

                <img class="d-block w-100" src="../uploads/<?php echo $highest[3]->images?>" alt="Sixth slide">
                <p><?php echo $highest[3]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($highest[4])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $highest[4]->contentId ?>">

                <img class="d-block w-100" src="../uploads/<?php echo $highest[4]->images?>" alt="Sixth slide">
                <p><?php echo $highest[4]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($highest[5])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $highest[5]->contentId ?>">

                <img class="d-block w-100" src="../uploads/<?php echo $highest[5]->images?>" alt="Sixth slide">
                <p><?php echo $highest[5]->title?></p>
              </a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-1">
    <a class="carousel-control-prev" href="#carouselHighestRated" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
  </div>
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

      <?php if($type == "movie"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/higher_movie'">See all movie ratings</button></h1>
      <?php }else if($type == "show"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/higher_show'">See all show ratings</button></h1>
      <?php }else if($type == "book"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/higher_book'">See all book ratings</button></h1>
      <?php }else if($type == "game"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/higher_game'">See all game ratings</button></h1>
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
  <div class="col-sm-3" ></div>
    <div class="col-sm-6" >
    <h1 style=" text-align: center;">User recommendations</h1>
    </div>
    <div class="col-3"></div>
  
</div>
</div>


<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-3" ></div>
    <div class="col-sm-2"  style="background-color: #292929; border-right: 1px solid grey;">
      <?php if(!empty($userrecommendation[0]->oldimage)){ ?>
      <div class="row" >
        <div class="col-sm-12" >
        <a href="<?= base_url() ?>index.php/profile/<?= $userrecommendation[0]->user_id ?>">

          <img src='../uploads/<?php echo $userrecommendation[0]->avatar ?>' class='contentImageProfile' alt='Profilepic' width='10' height='345'>
            <?php
              echo "User: ".base64_decode($userrecommendation[0]->username);
            ?>
            </a>
          </div>
          <div class="col-sm-5" >
            
          <a href="<?= base_url() ?>index.php/display/<?= $userrecommendation[0]->oldid ?>">
          <?php
              $oldimage = $userrecommendation[0]->oldimage;
              $title = "Chosen";
              echo "<img src='../uploads/$oldimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
              echo $userrecommendation[0]->oldtitle;

          ?>
          </a>
          </div>
          <div class="col-sm-2" >
          </div>
          <div class="col-sm-5" >
          <a href="<?= base_url() ?>index.php/display/<?= $userrecommendation[0]->newid ?>">
          <?php
              $newimage = $userrecommendation[0]->newimage;
              $title = "Chosen";
              echo "<img src='../uploads/$newimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
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
      <?php }?>

    </div>
    <div class="col-sm-2"  style="background-color: #292929; border-right: 1px solid grey;">
    <?php if(!empty($userrecommendation[1]->oldimage)){ ?>

    <div class="row">
    <div class="col-sm-12">
    <a href="<?= base_url() ?>index.php/profile/<?= $userrecommendation[1]->user_id ?>">

        <img src='../uploads/<?php echo $userrecommendation[1]->avatar ?>' class='contentImageProfile' alt='Profilepic' width='160' height='345'>
          <?php
            echo "User: ".base64_decode($userrecommendation[1]->username);
          ?>
          </a>
        </div>
        <div class="col-sm-5">
        <a href="<?= base_url() ?>index.php/display/<?= $userrecommendation[1]->oldid ?>">
        <?php
            $oldimage = $userrecommendation[1]->oldimage;
            $title = "Chosen";
            echo "<img src='../uploads/$oldimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
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
            echo "<img src='../uploads/$newimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
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
      <?php }?>

    </div>

    <div class="col-sm-2"  style="background-color: #292929; ">
    <?php if(!empty($userrecommendation[2]->oldimage)){ ?>

    <div class="row">
    <div class="col-sm-12">
    <a href="<?= base_url() ?>index.php/profile/<?= $userrecommendation[2]->user_id ?>">

        <img src='../uploads/<?php echo $userrecommendation[2]->avatar ?>' class='contentImageProfile' alt='Profilepic' width='160' height='345'>
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
            echo "<img src='../uploads/$oldimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
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
            echo "<img src='../uploads/$newimage' class='contentImagerecommend' id='myImg' alt='$title' width='10%' ><br>"; 
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
      <?php }?>

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

      <?php if($type == "movie"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/recommended_movie'">See all Movie recommendations</button></h1>
      <?php }else if($type == "show"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/recommended_show'">See all Show recommendations</button></h1>
      <?php }else if($type == "book"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/recommended_book'">See all Book recommendations</button></h1>
      <?php }else if($type == "game"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/recommended_game'">See all Game recommendations</button></h1>
      <?php }?>
      <?php if(isset($this->session->userdata['logged_in'])){ ?>
        <p data-target='#LeaveRecommendation' data-toggle='modal' alt='banner' width='10%' >Recommend</p>
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
    <h1 style=" text-align: center;">Roulette</h1>
    <div class="container">
  <div class="row">
    <div class="col-1">
      <a class="carousel-control-next" href="#carouselAllList" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
    <div class="col-10">
      
      <div id="carouselAllList" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
            <?php if(!empty($roulette[0])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $roulette[0]->contentId ?>">

                <img class="d-block w-100" src="../uploads/<?php echo $roulette[0]->images?>" alt="Sixth slide">
                <p><?php echo $roulette[0]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($roulette[1])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $roulette[1]->contentId ?>">
                <img class="d-block w-100" src="../uploads/<?php echo $roulette[1]->images?>" alt="Sixth slide">
                <p><?php echo $roulette[1]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($roulette[2])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $roulette[2]->contentId ?>">

                <img class="d-block w-100" src="../uploads/<?php echo $roulette[2]->images?>" alt="Sixth slide">
                <p><?php echo $roulette[2]->title?></p>
              </a>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
            <?php if(!empty($roulette[3])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $roulette[3]->contentId ?>">

                <img class="d-block w-100" src="../uploads/<?php echo $roulette[3]->images?>" alt="Sixth slide">
                <p><?php echo $roulette[3]->title?></p>
            </a>
              </div>
              <?php } ?>
              <?php if(!empty($roulette[4])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $roulette[4]->contentId ?>">

               <img class="d-block w-100" src="../uploads/<?php echo $roulette[4]->images?>" alt="Sixth slide">
                <p><?php echo $roulette[4]->title?></p>
              </a>
              </div>
              <?php } ?>
              <?php if(!empty($roulette[5])){?>
              <div class="col-4">
              <a href="<?= base_url() ?>index.php/display/<?= $roulette[5]->contentId ?>">

              <img class="d-block w-100" src="../uploads/<?php echo $roulette[5]->images?>" alt="Sixth slide">
                <p><?php echo $roulette[5]->title?></p>
              </a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-1">
    <a class="carousel-control-prev" href="#carouselAllList" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
    </div>
  </div>
</div>
</div>
</div>
</div>



<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-1" >
      </div>
    <div class="col-sm-10" >
    <div class="text-center">

      <?php if($type == "movie"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/browse_all_movie'">See all Movie List</button></h1>
      <?php }else if($type == "show"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/browse_all_show'">See all Show List</button></h1>
      <?php }else if($type == "book"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/browse_all_book'">See all Book List</button></h1>
      <?php }else if($type == "game"){ ?>
        <h1><button class="listbtn" onclick="location.href = '<?= base_url() ?>index.php/browse_all_game'">See all Game List</button></h1>
      <?php }?>
    </div>
    </div>
    <div class="col-sm-1" >
      </div>
  </div>
</div>
</div>


<?php
$this->load->view('header/bottom');
?>