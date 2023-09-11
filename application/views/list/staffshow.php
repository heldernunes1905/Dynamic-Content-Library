<?php
  $this->load->view('header/top');
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata['logged_in'])) {
  $user_id = ($this->session->userdata['logged_in']['user_id']);
}else{
  $user_id= 0;
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

</style>
<script>
document.getElementById("full").className = "active";
</script>
	<br><br>

  <?php
    $uri = $_SERVER['REQUEST_URI']; 
    $staffId = str_replace("/Dynamic-Content-Library-main/index.php/staff/","",$uri);
    $staffId = strtok($staffId, '/');

    $staffurl = "/Dynamic-Content-Library-main/index.php/staff/$staffId";
    $reviewurl = $staffurl."/review";
  ?>

<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <?php
        foreach($contents as $content){
          echo "<h1>$content->first_name ".$content->last_name.'</h1><br />';
        } ?>
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

  
  <nav class="navbar navbar-expand-lg navbar-light" >
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" style=" border: 1px solid grey;" ><!-- style="background-color: yellow;"-->
    <ul class="navbar-nav">
    <li class="nav-item">
      <a href="<?= $staffurl?>" class="nav-link"  style="color:white;">Staff</a>
    </li>
    <li class="nav-item">
      <a href="<?= $reviewurl?>" class="nav-link"  style="color:white;">Comments</a>
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
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"   style="color:white;">
      <div class="row">
      <div class="col-sm-2"  >
      <?php
        foreach($contents as $content){
          echo "<img src='../../uploads/$content->pictures'class='myImages'id='myImg' alt='$content->first_name' width='100%' >".'<br/></div>';
          ?>
          <div class="col-sm-10"  ><?php
            echo $content->description.'<br />';
            echo "Links: $content->links".'<br />';
            echo "Birthday: ", date("d-m-Y", strtotime($content->birthday)).'<br />' ;
          ?>
              <?php if(isset($this->session->userdata['logged_in'])){?>

        <?php 
                  
                  $checkpreferenceslikeS = null;
                  $checkpreferencesdislikeS = null;
                  if($content->staff_type == 1){
                    if(!is_null($checkpreferenceslike)){
                      $checkpreferenceslikeS = $checkpreferenceslike[1];
                    }

                    if(!is_null($checkpreferencesdislike)){
                      $checkpreferencesdislikeS = $checkpreferencesdislike[1];
                    }

                  }else if($content->staff_type == 2){
                    if(!is_null($checkpreferenceslike)){
                      $checkpreferenceslikeS = $checkpreferenceslike[0];
                    }

                    if(!is_null($checkpreferencesdislike)){
                      $checkpreferencesdislikeS = $checkpreferencesdislike[0];
                    }

                  }else if($content->staff_type == 3){
                    if(!is_null($checkpreferenceslike)){
                      $checkpreferenceslikeS = $checkpreferenceslike[2];
                    }

                    if(!is_null($checkpreferencesdislike)){
                      $checkpreferencesdislikeS = $checkpreferencesdislike[2];

                    }

                  }
                  ?>
                  <?php if(isset($this->session->userdata['logged_in'])){?>
                    
                  <?php
                        if(is_null($checkpreferencesdislikeS) && is_null($checkpreferenceslikeS)){
                          ?>
                          <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedstaff/<?= $content->staff_id ?>"'></i>
                          <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedstaff/<?= $content->staff_id ?>"' ></i>
                          <?php
                        }else if(!is_null($checkpreferencesdislikeS) && !is_null($checkpreferenceslikeS)){
                          if (($key = array_search($content->staff_id, $checkpreferenceslikeS)) !== false){ ?>
                            <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedstaff/<?= $content->staff_id ?>"'></i>
                          <?php }else if (($key = array_search($content->staff_id, $checkpreferencesdislikeS)) !== false){ ?>
                              <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedstaff/<?= $content->staff_id ?>"' ></i>
                            <?php }else{
                            ?>
                            <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedstaff/<?= $content->staff_id ?>"'></i>
                            <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedstaff/<?= $content->staff_id ?>"' ></i>
                            <?php
                          }
                          }else{
                          if(!is_null($checkpreferenceslikeS) ){
                            if (($key = array_search($content->staff_id, $checkpreferenceslikeS)) !== false){ ?>
                              <i title="Remove Like" class="fa fa-thumbs-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removelikedstaff/<?= $content->staff_id ?>"'></i>
                            <?php }else{
                              ?>
                              <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedstaff/<?= $content->staff_id ?>"'></i>
                              <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedstaff/<?= $content->staff_id ?>"' ></i>
                              <?php
                            }
                          }else if(!is_null($checkpreferencesdislikeS)){
                            if (($key = array_search($content->staff_id, $checkpreferencesdislikeS)) !== false){ ?>
                              <i title="Remove Dislike" class="fa fa-thumbs-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/removedilikedstaff/<?= $content->staff_id ?>"' ></i>
                            <?php }else{
                              ?>
                              <i title="Add Like" class="fa fa-thumbs-o-up fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/addlikedstaff/<?= $content->staff_id ?>"'></i>
                              <i title="Add Dislike" class="fa fa-thumbs-o-down fa-2x" aria-hidden="true" onclick='window.location="<?= base_url() ?>index.php/adddislikedstaff/<?= $content->staff_id ?>"' ></i>
                              <?php
                            }
                          }
                          
                        }
                        
                    ?>
                  
                  <?php }?>
        </div>
          <?php
              }
        } ?>
        </div>
    </div>
    <div class="col-sm-1" >
      
      </div>
  </div>
      </div>

        <br><br><br><br>
      <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  style="color:white;">
      Plays
     
      <div class="row">

      <?php 
        foreach($chars as $characters){
          ?> 
          <div class="col-sm-2"  >

            <a href="<?= base_url() ?>index.php/characters/<?= $characters[0]->character_id ?>">
            <img src='../../uploads/<?php echo $characters[0]->pictures; ?>' class='myImages' id='myImg' alt='Image' width='10%' ><br/>
            </a>
          </div>
          <div class="col-sm-10"  >
            <?php echo $characters[0]->first_name ." ". $characters[0]->last_name.'<br /><br>'?>
          </div>
          
        <?php } ?>
    
        </div>
    </div>
    <div class="col-sm-1" >
    
      </div>
  </div>
</div>




<div class="container-fluid no-padding">
  <div id="my-row" class="row">
  <div class="col-sm-1" ></div>
  <div class="col-sm-10" >

  <?php if(!empty($personalcomment) && isset($this->session->userdata['logged_in'])){?>
    <h1>YOUR COMMENT</h1>
  <?php }?>
   <?php foreach($personalcomment as $com){
      ?> <a href="<?= base_url() ?>index.php/profile/<?= $com->user_id ?>"> <?php
        //echo "<br/>User Avatar: " . $com->avatar . '<br>';
        echo "Username: " . base64_decode($com->username);  ?>
    </a> 
    <?php
      ?>
        <div id="testing">
        <p id = "<?php echo $com->comment_id.'title'; ?>"><?php echo "User Title: " . $com->comment_title;?></p>

        <p id = "<?php echo $com->comment_id; ?>"><?php echo "User Comment: " . $com->comment;?></p>
        </div>

      <?php
            echo "<p>".date("d-m-Y H:i:s", strtotime($com->date)).'</p><br />';

      if(!empty($com)){
        if($com->user_id == $user_id){?>
          <button type="button" class="btn btn-success" onclick='editComment(<?php echo $com->comment_id;?>,"<?php echo $com->comment_title;?>","<?php echo $com->comment;?>")'>Edit Comment</button>
          <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $contents[0]->staff_id?>,"<?php echo $user_id?>")'>Remove Comment</button>
        <?php }
      }
    }?>

<?php  if(!isset($this->session->userdata['logged_in'])){?>
    <p data-target='#myModal' data-toggle='modal' alt='banner' width='10%' >Leave Review</p>
  <?php }
?>
    
      </div>
       <div class="col-sm-1" >
      
      </div>
  </div>
</div>






<div class="container-fluid no-padding">
  <div id="my-row" class="row">
  <div class="col-sm-1" ></div>
  <div class="col-sm-9" >
  <h1>USER COMMENTS</h1>

    <div  class="row">
          <?php foreach($comments as $com){
          ?> 
          <div class="col-sm-4"  >

          <a href="<?= base_url() ?>index.php/profile/<?= $com->user_id ?>"> <?php
            //echo "<br/>User Avatar: " . $com->avatar . '<br>';
            echo "Username: " . base64_decode($com->username);  ?>
          </a> <?php
          echo "<br /><p>Title: $com->comment_title".'</p>';
          echo "<p>".date("d-m-Y H:i:s", strtotime($com->date)).'</p><br />';
          ?>
            <p id = "<?php echo $com->comment_id; ?>"><?php echo "User Comment: " . $com->comment;?></p>
           </div>

          <?php
        } 
        ?>
        </div>
        <h1><a href="<?= base_url() ?>index.php/staff/<?= $contents[0]->staff_id; ?>/review">SEE ALL COMMENTS</a></h1>
        <?php if(empty($personalcomment) && isset($this->session->userdata['logged_in'])){?>
          <h1 data-target='#modaladdcomment' data-toggle='modal'>LEAVE COMMENT</h1>
        
      <?php }?>
      </div>
       <div class="col-sm-2" >
      
      </div>
  </div>
</div>




<div class="modal" id="modaladdcomment" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" data-target='#modalcreatelist' data-toggle='modal' alt='banner' width='10%' >Create List<br></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
    if(isset($this->session->userdata['logged_in'])){

    if(empty($personalcomment)){
    ?>
    <form id="fromcomment" action="<?= base_url() ?>index.php/addstaffcontent/<?= $contents[0]->staff_id?>/userid/<?= $user_id ?>" method="get">
      <textarea id="title" name="title" rows="4" cols="50">title</textarea>

      <textarea id="comment" name="comment" rows="4" cols="50">Put your comment here</textarea>
      
      <br>
      <input type="submit" value="Submit">
    </form>
    <?php 
    }else{ ?>
    <form id="fromcomment" action="<?= base_url() ?>index.php/addstaffcontent/<?= $contents[0]->staff_id?>/userid/<?= $user_id ?>" method="get" style="display:none">
        <textarea id="title" name="title" rows="4" cols="50">title</textarea>

        <textarea id="comment" name="comment" rows="4" cols="50">Put your comment here</textarea>
      <br>
      <input type="button" value="Cancel" onclick="canceledit()">
      <input type="submit" value="Submit">
    </form>

    <?php
    }
  }?>
      </div>
    </div>
</div>
</div>


<script>
var rateid = 0
var originalParagraph = 0
var originalTitle = 0

var textare  = document.getElementById("fromcomment");
var comment  = document.getElementById("comment");
var titleform  = document.getElementById("title");
var div = document.getElementById("testing");

function editComment(rating_id,title,description) {
    // Get a reference to the form and input elements
    var p = document.getElementById(rating_id);
    var titledon = document.getElementById(rating_id+'title');
    rateid=rating_id;

  $('#title').val(title);
  $('#comment').val(description);
  
  // Save a copy of the p element
  originalParagraph = p.cloneNode(true);
  originalTitle = titledon.cloneNode(true);

  
  // Replace the p element with the textarea element
  div.parentNode.replaceChild(textare, div);
  
  // Show the textarea element
  textare.style.display = "block";
  
  // Store a reference to the original p element for later use
  textare.originalParagraph = originalParagraph;

 
}

function canceledit(){
// Get a reference to the form and input elements
  var p = document.getElementById(rateid);
  var title = document.getElementById(rateid+'title');

  $('#comment').val(originalParagraph.textContent);
  $('#title').val(originalTitle.textContent);

  // Replace the textarea element with the original p element
  
  textare.parentNode.replaceChild(div, textare);

  
  // Show the original p element
  originalParagraph.style.display = "block";
  originalTitle.style.display = "block";

}

function confirmRemoveComment(staff_id,user_id) {
    var response = confirm("Do you want to remove comment:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removestaffcontent/<?= $user_id?>/" + staff_id
    }
}
</script>
<?php
  $this->load->view('header/bottom');
?>