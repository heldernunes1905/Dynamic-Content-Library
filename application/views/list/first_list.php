<?php
  $this->load->view('header/top');
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<script>
document.getElementById("home").className = "active";
</script>
<title>Welcome to CodeIgniter</title>




	<br />
	<div class="container">
  <br>

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->

    <div class="carousel-inner" role="listbox">

      
    <?php 
    $activeImage = 0;
	  foreach($contents as $content){
      if($activeImage == 0){
        echo'<div class="item active">';
        echo "<img src='uploads/$content->images' alt='$content->altImg' width='160' height='345'>";
        echo '</div>';
      }else{
        echo "<div class='item'>
        <img src='uploads/$content->altImg' alt='$content->altImg' width='160' height='345'>
        <div class='carousel-caption'>
        <h3>$content->title</h3>
        <p>$content->description</p>
        </div>
      </div>";
      }
      $activeImage++;
		}
	  ?>
    </div>
		
	
    

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<?php
  
  $this->load->view('header/bottom');
?>