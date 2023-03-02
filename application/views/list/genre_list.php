<?php
  $this->load->view('header/top');
defined('BASEPATH') OR exit('No direct script access allowed');
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

.modal {
  display: none;
  /* Hidden by default */
  position: fixed;
  /* Stay in place */
  z-index: 1;
  /* Sit on top */
  padding-top: 100px;
  /* Location of the box */
  left: 0;
  top: 0;
  width: 100%;
  /* Full width */
  height: 100%;
  /* Full height */
  overflow: auto;
  /* Enable scroll if needed */
  background-color: rgb(0, 0, 0);
  /* Fallback color */
  background-color: rgba(0, 0, 0, 0.9);
  /* Black w/ opacity */
}

.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
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

.modal-content,
#caption {
  animation-name: zoom;
  animation-duration: 0.6s;
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
      z-index:10; 
    }

    .image-container{
      display: inline-block;
    }

    .image-container:hover .my-div {
      display: block;
    }
</style>
<script>
document.getElementById("full").className = "active";
</script>
	<br />
	<?php
  foreach ($contents as $content) {     ?>
      <div class="image-container">
      <a href="<?= base_url() ?>index.php/display/<?= $content[0]->contentId ?>" target="_blank">
        <?php 
        $images = $content[0]->images;
        $title = $content[0]->title;
        echo "<img src='../uploads/$images'class='myImages'id='myImg' alt='$title' width='10%' >"; ?>
      </a>
      <div class="my-div">
        <?php echo $content[0]->name.'<br>'?>
        <?php echo $content[0]->title?>
        <?php echo $content[0]->title?>
        <?php echo $content[0]->title?>
    </div>
  </div>
  <?php } ?> 


  <!--<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>-->
<script>
// create references to the modal...
var modal = document.getElementById('myModal');
// to all images -- note I'm using a class!
var images = document.getElementsByClassName('myImages');
// the image in the modal
var modalImg = document.getElementById("img01");
// and the caption in the modal
var captionText = document.getElementById("caption");

// Go through all of the images with our custom class
for (var i = 0; i < images.length; i++) {
  var img = images[i];
  // and attach our click listener for this image.
  img.onclick = function(evt) {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }
}

var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
  modal.style.display = "none";
}

$(".myImages").hover(function(){
      $(this).next(".my-div").show();
    }, function(){
      $(this).next(".my-div").hide();
    });
</script>
<?php
  $this->load->view('header/bottom');
?>