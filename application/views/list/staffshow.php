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
	<br />
	<?php
		foreach($contents as $content){
			echo "<img src='../../uploads/$content->pictures'class='myImages'id='myImg' alt='$content->first_name' width='10%' >".'<br/>';
			echo "Staff Id: $content->staff_id".'<br />';
			echo "First Name: $content->first_name".'<br />';
            echo "Last Name: $content->last_name".'<br />';

			echo "Links: $content->links".'<br />';
			echo "Birthday: ", date("d-m-Y", strtotime($content->birthday)).'<br />' ;

      foreach($chars as $characters){
        echo "Plays: ";
        ?>
        <a href="<?= base_url() ?>index.php/characters/<?= $characters[0]->character_id ?>"><?php echo $characters[0]->first_name ." ". $characters[0]->last_name.'<br />'?></a>
      <?php }
		} ?>
    <?php
    if(isset($this->session->userdata['logged_in'])){

    
    if(empty($personalcomment)){
    ?>
    <form id="fromcomment" action="<?= base_url() ?>index.php/addstaffcontent/<?= $contents[0]->staff_id?>/userid/<?= $user_id ?>" method="get">
      <textarea id="comment" name="comment" rows="4" cols="50">Put your comment here</textarea>
      <br>
      <input type="submit" value="Submit">
    </form>
    <?php 
    }else{ ?>
    <form id="fromcomment" action="<?= base_url() ?>index.php/addstaffcontent/<?= $contents[0]->staff_id?>/userid/<?= $user_id ?>" method="get" style="display:none">
      <textarea id="comment" name="comment" rows="4" cols="50">Put your comment here</textarea>
      <br>
      <input type="button" value="Cancel" onclick="canceledit()">
      <input type="submit" value="Submit">
    </form>

    <?php
    }
  }
    
    foreach($personalcomment as $com){
      ?> <a href="<?= base_url() ?>index.php/profile/<?= $com->user_id ?>"> <?php
        echo "<br/>User Avatar: " . $com->avatar . '<br>';
        echo "Username: " . $com->username;  ?>
    </a> <?php
      echo "<br />Title: $com->comment_title".'<br />';
      echo "Date: ".date("d-m-Y H:i:s", strtotime($com->date)).'<br />';
      ?>
        <p id = "<?php echo $com->comment_id; ?>"><?php echo "User Comment: " . $com->comment;?></p>
      <?php
      if(!empty($com)){
        if($com->user_id == $user_id){?>
          <button type="button" class="btn btn-success" onclick='editComment(<?php echo $com->comment_id;?>)'>Edit Comment</button>
          <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $contents[0]->staff_id?>,"<?php echo $user_id?>")'>Remove Comment</button>
        <?php }
      }
    } 

    foreach($comments as $com){
      ?> <a href="<?= base_url() ?>index.php/profile/<?= $com->user_id ?>"> <?php
        echo "<br/>User Avatar: " . $com->avatar . '<br>';
        echo "Username: " . $com->username;  ?>
    </a> <?php
      echo "<br />Title: $com->comment_title".'<br />';
      echo "Date: ".date("d-m-Y H:i:s", strtotime($com->date)).'<br />';
      ?>
        <p id = "<?php echo $com->comment_id; ?>"><?php echo "User Comment: " . $com->comment;?></p>
      <?php
    } 
	?>

<script>
var rateid = 0
var originalParagraph = 0
var textare  = document.getElementById("fromcomment");

function editComment(rating_id) {
  // Get a reference to the form and input elements
  var p = document.getElementById(rating_id);
  rateid=rating_id;
  
  // Save a copy of the p element
  originalParagraph = p.cloneNode(true);
  
  // Set the value of the textarea to the text content of the p element
  textare.value = p.textContent;
  
  // Replace the p element with the textarea element
  p.parentNode.replaceChild(textare, p);
  
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
  textare.parentNode.replaceChild(originalParagraph, textare);
  
  // Show the original p element
  originalParagraph.style.display = "block";
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