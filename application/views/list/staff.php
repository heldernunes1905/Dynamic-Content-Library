<?php
$this->load->view('header/top');
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
<br />
<?php
if ($contents != 0) {
  foreach ($contents as $content) {
    ?>
    <div class="image-container">
      <a href="<?= base_url() ?>index.php/staff/<?= $content[0]->staff_id ?>">
        <?php
        $images = $content[0]->pictures;
        $title = $content[0]->first_name . " " . $content[0]->last_name;
        echo "<img src='../uploads/$images'class='myImages'id='myImg' alt='$title' width='10%' >"; ?>
      </a>
      <div class="my-div">
        <?php foreach ($myArray as $genreshow) { ?>
          <a href="<?= base_url() ?>index.php/display/genre/<?= $genreshow ?>"><?php echo $genreshow ?></a>
        <?php } ?></br>
        <?php echo $content[0]->title ?>
        <?php echo $content[0]->title ?>
        <?php echo $content[0]->title ?>
      </div>
    </div>
  <?php }
}
?>

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