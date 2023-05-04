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
<br><br>    


<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
        
      <div id="main">
        <div id="login">
            <h2 style="color:white;">Registration Form</h2>
            <p id="error-msg" style="display: none; color: red;">Please fill in all fields.</p>

            <?php echo "<div class='error_msg'>";
    echo validation_errors();
    echo "</div>";?>
            <hr />
      <div class="modal-body">
      <div class="row">
      <div class="col-sm-3"  >
      <div class="row">
      <div class="col-sm-4"  >

    <?php
    

    echo form_open('add_user_db');
    ?>
    <label for="message-text" class="col-form-label">User Name:</label>

    </div>
    <div class="col-sm-8"  >
    <?php  echo '<input type="text" name="username" id="username"/>'; ?>
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
    <div class="row">
      <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label" id="passwordtyped">Password:</label>
        </div>

        <div class="col-sm-8"  >

        <?php  echo '<input type="password" name="password" id="passworduser"/>';
            echo '<input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
            <label for="showPassword" style="color:white">Show Password</label>'; ?>
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
    <div class="row">
      <div class="col-sm-4"  >
      <label for="message-text" class="col-form-label">Email:</label>
        </div>
        <div class="col-sm-8"  >
        

        
    <?php             echo '<input type="email" name="email_value" id="email" />';

   ?>
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
    <div class="row">
        
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Birthday:</label>
        </div>
        <div class="col-sm-8"  >
        <?php             echo "<input type='date' name='birthday' id='bday' />";
 ?>
        </div>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">First Name:</label>
        </div>
        <div class="col-sm-8"  >
            <?php             echo '<input  type="text" name="firstname" id="fname" />';
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
            <?php             echo '<input type="text" name="lastname" id="lname"/>';
 ?>
    </div>
    </div>
    </div>

    <div class="col-sm-3"  >
    <div class="row">
        <div class="col-sm-4"  >
            <label for="message-text" class="col-form-label">Gender:</label>
        </div>
        <div class="col-sm-8"  >
        <select name="gender" id="gender" onchange="toggleGenderOther()">
              <option value="male" selected>Male</option>
              <option value="female" >Female</option>
              <option value="other" >Other</option>
            </select>
            <input type="text" name="genderother" id="genderother" style="display:none"/>        </div>
    </div>
    </div>


    <div class="col-sm-3"  >
    <div class="row">
        
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Bio:</label>
        </div>
        <div class="col-sm-8"  >
        <?php             echo "<input type='text' name='bio' id='bio'/>";?>
        </div>
    </div>
    </div>

    <div class="col-sm-3"  >
    <div class="row">
      <div class="col-sm-4"  >
      <label for="permissions" style="color:white">Permission:</label>
        </div>

        <div class="col-sm-8"  >

        <select name="permissions" id="permissions">
            <option value="0">Admin</option>
            <option value="1">Normal User</option>
      
        </select>
    </div>
    </div>
    </div>

    </div>

    </div>
    </div>
    </div>
        <?php
        echo form_submit('submit', 'Register User', 'class="btn btn-primary" id="submitbtn"');
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
  const pass = document.getElementById('passwordtyped');
  const username = document.getElementById('username');
  const email = document.getElementById('email');
  const bday = document.getElementById('bday');
  const bio = document.getElementById('bio');




  if (first_name.value === ''  || last_name.value === '' || pass.value === '' || username.value === '' || email.value === '' || bday.value === '' || bio.value === '') {
    event.preventDefault(); // prevent form submission
    if(first_name.value === ''  || last_name.value === '' || pass.value === '' || username.value === '' || email.value === '' || bday.value === '' || bio.value === ''){
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