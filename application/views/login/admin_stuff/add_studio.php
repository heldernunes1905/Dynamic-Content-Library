<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
} else {
    header("location: login");
}

$this->load->view('header/top');
?>
<br>
<br>
<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
        
      <div id="main">
        <div id="login">
            <h2 style="color:white;">Create Studio Form</h2>
            <p id="error-msg" style="display: none; color: red;">Please fill in all fields.</p>

            <?php echo "<div class='error_msg'>";
    echo validation_errors();
    echo "</div>";?>
     <?php
    

    echo form_open('add_studio_db');
    ?>
            <hr />
      
    <div class="row">
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">First Name:</label>
        </div>
        <div class="col-sm-8"  >
            <?php             echo '<input  type="text" name="first_name" id="fname" />';
 ?>
       
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Last Name:</label>
        </div>
        <div class="col-sm-8"  >
            <?php             echo '<input type="text" name="last_name" id="lname" />';
 ?>
    </div>
    </div>
    </div>

    <div class="col-sm-3"  >
    <div class="row">
        
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Date:</label>
        </div>
        <div class="col-sm-8"  >
        <?php             echo "<input type='date' name='date_created' id='bday'/>";
 ?>
        </div>
    </div>
    </div>
    

    
    <div class="col-sm-3"  >
    <div class="row">
        <div class="col-sm-4"  >
            <label for="message-text" class="col-form-label">Description:</label>
        </div>
        <div class="col-sm-8"  >
        <input type="text" name="description" size="20" id="desc"/>
           </div>
    </div>
    </div>

    



    </div>
    <hr>
        <?php
        echo form_submit('submit', 'Create', 'class="btn btn-primary" id="submitbtn"');
        echo form_close();
        ?>
    </div>
    <div class="col-sm-1" >

      </div>
  </div>
  </div>

  </div>



<script>



const submitBtn = document.getElementById('submitbtn');
const errorMsg = document.getElementById('error-msg');

submitBtn.addEventListener('click', (event) => {
  const first_name = document.getElementById('fname');
  const last_name = document.getElementById('lname');
  const bday = document.getElementById('bday');
  const desc = document.getElementById('desc');



  if (first_name.value === ''  || last_name.value === '' || bday.value === '' || desc.value === '') {
    event.preventDefault(); // prevent form submission
    if(first_name.value === ''  || last_name.value === '' || bday.value === '' || desc.value === ''){
      errorMsg.style.display = 'block';
    }
  } else {
    errorMsg.style.display = 'none';
    // continue with form submission or other actions
  }
});

</script>


<?php
$this->load->view('login/insideheader/bottom');
?>