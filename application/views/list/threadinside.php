<?php
  $this->load->view('header/top');
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata['logged_in'])) {
  $user_id = ($this->session->userdata['logged_in']['user_id']);
  $permissions = ($this->session->userdata['logged_in']['permission']);

}else{
  $user_id= 0;
  $permissions=2;
}




$uri = $_SERVER['REQUEST_URI']; 
$thread_id = str_replace("/CodeIgniter-3.1.10/index.php/forum/thread/","",$uri);
$thread_id = strtok($thread_id, '/');
?>

<br>

      <?php
        if($user_id != 0){
          if(empty($personalcomment[0]->comment_id)){
          ?>
          <form id="fromcomment" action="<?= base_url() ?>index.php/addthreadcomment/<?= $thread_id?>" method="get">
            <textarea id="comment" name="comment" rows="4" cols="50">comment</textarea>
            
            <br>
            <input type="submit" value="Submit">
          </form>
          <?php 
          }else{ ?>
            <form id="fromcomment" action="<?= base_url() ?>index.php/addthreadcomment/<?= $thread_id?>" method="get" style="display:none">
            <textarea id="comment" name="comment" rows="4" cols="50">comment</textarea>
              <br>
            <input type="button" value="Cancel" onclick="canceledit()">
            <input type="submit" value="Submit">
          </form>
           <?php 
          }
        }?>

<br>


<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" ></div>
      <div class="col-sm-10" >
      <?php echo "<h1>".$threadinsidename[0]->title."</h1>";?>
      <?php echo "<h4>".$threadinsidename[0]->description."</h4>";?>
      <?php if(!isset($this->session->userdata['logged_in'])){?>
        <p data-target='#myModal' style="float:right" data-toggle='modal' alt='banner' width='10%' >Leave comment</p>
      <?php }?>
      </div>
    <div class="col-sm-1" ></div>
</div>
</div>


<?php 
if(!empty($personalcomment)){
foreach($personalcomment as $pc){?>
  <div id="testing">
  </div>
  
  <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" ></div>
      <div class="col-sm-2" >
      <?php echo "<img src='../../../uploads/$pc->avatar'class='myImages'id='myImg' alt='ProfilePic' width=100% height=auto>";?>

      </div>
      <div class="col-sm-6"  style="background-color: #292929;">
        <p id="<?php echo $pc->comment_id; ?>"> <?php echo "Comment:".$pc->comment.'<br>';?></p>

        <?php echo "<p>Date:".$pc->date.'</p>';?>
        <?php echo "<p>Username:".base64_decode($pc->username).'</p>';?>

        <?php if($pc->user_id == $user_id){?>
        <button type="button" class="btn btn-success" onclick='editComment("<?php echo $pc->comment_id;?>","<?php echo $pc->comment;?>")'>Edit Comment</button>
        <button type="button" class="btn btn-success" onclick='confirmRemoveComment("<?php echo $pc->comment_id?>","<?php echo $user_id?>")'>Remove Comment</button><br>
  <?php } ?>
      </div>
    <div class="col-sm-3" ></div>
</div>
</div>
  
<?php }
}?>

<br><br>
<?php foreach($threadinside as $ti){?>
  <?php if($permissions == 0 && $ti->user_id != $user_id){?>
    <div id="testing">
  </div>
  
  <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" ></div>
      <div class="col-sm-2" >
      <?php echo "<img src='../../../uploads/$ti->avatar'class='myImages'id='myImg' alt='ProfilePic' width=100% height=auto>";?>

      </div>
      <div class="col-sm-6"  style="background-color: #292929;">
        <p id="<?php echo $ti->comment_id; ?>"> <?php echo "Comment:".$ti->comment.'<br>';?></p>

        <?php echo "<p>Date:".$ti->date.'</p>';?>
        <?php echo "<p>Username:".base64_decode($ti->username).'</p>';?>
        <button type="button" class="btn btn-success" onclick='confirmRemoveComment("<?php echo $ti->comment_id?>","<?php echo $ti->user_id?>")'>Remove Comment</button><br>

      </div>
    <div class="col-sm-3" ></div>
</div>
</div>

<br><br>
  
  <?php }else if($ti->user_id != $user_id){?>
    <div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" ></div>
      <div class="col-sm-2" >
      <?php echo "<img src='../../../uploads/$ti->avatar'class='myImages'id='myImg' alt='ProfilePic' width=100% height=auto>";?>

      </div>
      <div class="col-sm-6"  style="background-color: #292929;">
        <p id="<?php echo $ti->comment_id; ?>"> <?php echo "Comment:".$ti->comment.'<br>';?></p>

        <?php echo "<p>Date:".$ti->date.'</p>';?>
        <?php echo "<p>Username:".base64_decode($ti->username).'</p>';?>

      </div>
    <div class="col-sm-3" ></div>
</div>
</div>

<br><br>

  <?php }?>

<?php }?>




<script>


var rateid = 0
var originalParagraph = 0

var textare  = document.getElementById("fromcomment");
var comment  = document.getElementById("comment");
var div = document.getElementById("testing");


  function editComment(thread_id,description) {
    // Get a reference to the form and input elements
    var p = document.getElementById(thread_id);
    rateid=thread_id;

  $('#comment').val(description);
  
  // Save a copy of the p element
  originalParagraph = p.cloneNode(true);

  
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

  $('#comment').val(originalParagraph.textContent);

  // Replace the textarea element with the original p element
  
  textare.parentNode.replaceChild(div, textare);

  
  // Show the original p element
  originalParagraph.style.display = "block";

}


function confirmRemoveComment(comment_id,user_id) {
    var response = confirm("Do you want to remove comment:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removecommentforum/<?= $user_id?>/" + comment_id
    }
}

</script>

<?php
  $this->load->view('header/bottom');
?>