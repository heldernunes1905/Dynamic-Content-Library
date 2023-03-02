<?php
if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
} else {
    header("location: login");
}

$uri = $_SERVER['REQUEST_URI']; 
$profileId = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
$profileId = strtok($profileId, '/');

$this->load->view('login/insideheader/header');
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
    if($profileId == $user_id){
      $listId = str_replace("/CodeIgniter-3.1.10/index.php/profile/$profileId/list/","",$uri);
  ?>
      <button type="button" class="btn btn-success"onclick='confirmActionDeleteList()'>Delete list</button><br>
      <?php
      if($liststate[0]->list_public == 0){?>
        <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $liststate[0]->list_public?>)'>Make Public</button><br>
      <?php }else{?>
      <button type="button" class="btn btn-success" onclick='confirmActionListpublic(<?php echo $liststate[0]->list_public?>)'>Make Private</button><br>
      <?php } 
    } 
  
    echo "SHOW IN LIST<br>";
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
            <?php if($profileId == $user_id){?>
              <button type="button" class="btn btn-success" onclick='confirmAction(<?php echo $content[0]->contentId?>,"<?php echo $content[0]->title?>")'>Remove from List</button><br>
            <?php }?>

    </div>
  </div>
  <?php } ?> 
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
  <?php foreach ($contentslist as $content) { 
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
          
  <?php } ?> 
    
  </table>

<script>
  function confirmAction(contentId,title) {
    var response = confirm("Do you want to remove: " + title);
    if (response) {
      window.location="<?= base_url() ?>index.php/removefromlist/<?= $listId?>/" + contentId
    }
  }

  function confirmActionDeleteList() {
    var response = confirm("Do you want to remove List: " );
    if (response) {
      window.location="<?= base_url() ?>index.php/deletelist/<?= $listId?>"
    }
  }

  function confirmActionListpublic(public) {
    var response = confirm("Are you sure?");
    if (response) {
      if(public == 0){
        window.location="<?= base_url() ?>index.php/publiclist/<?= $listId?>"
      }else{
        window.location="<?= base_url() ?>index.php/privatelist/<?= $listId?>"

      }
    }
  }
</script>
</body>
</html>