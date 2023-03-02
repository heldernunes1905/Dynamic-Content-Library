<?php

if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
} else {
    header("location: login");
}

$this->load->view('login/insideheader/header');
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>others/css/menu.css">

<?php 
$idpage = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if($idpage != "add_image" && $idpage != "do_upload"){
    echo $error;    
}

?>

<?php echo form_open_multipart('do_upload');?>


<p>title</p>
<input type="text" name="title" />

<p>Content Type</p>
<input type="number" name="content_type" />

<p>Description</p>
<input type="text" name="description" />

<p>Image</p>
<input type="file" name="userfile" size="20" />

<p>Rating</p>
<input type="number" name="rating" />

<p>Releaste Date</p>
<input type="date" name="release_date" />

<p>Ranking</p>
<input type="number" name="ranking" />

<p>Studio</p>
<input type="number" name="studio_id" />

<p>Link</p>
<input type="text" name="links" />
<br /><br />

<input type="submit" value="upload" />

</form>

<?php

//test to see if user selected image
/*$test = $_FILES['userfile']['name'];
$expected_result = 0;
$test_name = 'see if user selected an image';
echo $this->unit->run($test, $expected_result, $test_name);*/
?>

<?php
$this->load->view('login/insideheader/bottom');
?>
