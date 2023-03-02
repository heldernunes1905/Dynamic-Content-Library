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
  } else {
      $user_id = $profileId;
      $this->load->view('login/insideheader/headernotlog');
  }


?>

<head>
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>others/css/menu.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>

<body>
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
  if($state[0]->profile_state == 1){
  switch($type){
    case "movielist":?>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist/1">Watched</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist/2">Want to watch</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist/3">Stalled</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/movielist/4">Dropped</a><br>
    <?php break;
    case "showlist":?>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist/1">Watched</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist/2">Want to watch</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist/3">Stalled</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/showlist/4">Dropped</a><br>
    <?php break;
    case "booklist":?>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist/1">Read</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist/2">Want to read</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist/3">Stalled</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/booklist/4">Dropped</a><br>
    <?php break;
    case "gamelist":?>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist/1">Finished</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist/2">Want to play</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist/3">Stalled</a><br>
      <a href="<?= base_url() ?>index.php/profile/<?= $profileId ?>/gamelist/4">Dropped</a><br>
    <?php break;
  }
  ?>
    

  <?php 
    if(!empty($contentslist)){

    if($profileId == $user_id){
      $listId = str_replace("/CodeIgniter-3.1.10/index.php/profile/$profileId/list/","",$uri);
  ?>
      <?php
    } 
    foreach ($contentslist as $content) { 
      $genre_total = $content[0]->name;
      $myArray = explode(',', $genre_total);
      ?>
        <div class="image-container">
        <a href="<?= base_url() ?>index.php/display/<?= $content[0]->contentId ?>">
          <?php 
          $images = $content[0]->images;
          $title = $content[0]->title;
          echo "<img src='../uploads/$images'class='myImages'id='myImg' alt='$title' width='10%' >"; ?>
        </a>
        <div class="my-div">
          <?php foreach ($myArray as $genreshow) {?>
                <a href="<?= base_url() ?>index.php/display/genre/<?= $genreshow ?>"  ><?php echo $genreshow?></a>
          <?php } ?></br>
          <?php echo $content[1]?>
          <?php echo $content[0]->title?>
          <?php echo $content[0]->title?>
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
              <button type="button" class="btn btn-success" onclick='confirmAction(<?php echo $content[0]->contentId?>,"<?php echo $content[0]->title?>")'>Remove from List</button><br>
              
      </div>
    </div>
    <?php } 
    }
    if(!empty($contentslist)){

    ?> 
  <br><br><br>
  <h1>SHOW IN GRID</h1>
  <table>
    <tr>
      <th>Image</th>
      <th>Title</th>
      <th>Genre</th>
      <th>State</th>
      <th>User Rating</th>
      <?php if($profileId == $user_id){?>
      <th>Options</th>
      <?php }?>
    </tr>
  <?php 
  foreach ($contentslist as $content) { 
     $genre_total = $content[0]->name;
     $myArray = explode(',', $genre_total);
    ?>
    <tr>
      <td><a href="<?= base_url() ?>index.php/display/<?= $content[0]->contentId ?>"><?php echo $content[0]->images?></td>
      <td><?php echo $content[0]->title?></td>
      <td><?php foreach ($myArray as $genreshow) {?>
              <a href="<?= base_url() ?>index.php/display/genre/<?= $genreshow ?>"  ><?php echo $genreshow?></a>
        <?php } ?>
      </td>
      <td>
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

      <td><?php echo $content[1]?></td>
      <?php if($profileId == $user_id){?>
        <td><button type="button" class="btn btn-success" onclick='confirmAction(<?php echo $content[0]->contentId?>,"<?php echo $content[0]->title?>")'>Remove from List</button><br></td>
      <?php }?>
    </tr>
          
  <?php } 
  }
  }?> 
    
  </table>
</body>

</html>