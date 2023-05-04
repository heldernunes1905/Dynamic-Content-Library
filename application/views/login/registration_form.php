<?php
  $this->load->view('header/top');
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
if (isset($this->session->userdata['logged_in'])) {
    header("location: http://localhost/CodeIgniter-3.1.10/index.php/user_login_process");
}
?>
<style>

</style>
<br>
<br>


<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
        
      <div id="main">
        <div id="login">
            <h2 style="color:white;">Registration Form</h2>
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
    

    echo form_open('new_user_registration');
    ?>
    <label for="message-text" class="col-form-label">User Name:</label>

    </div>
    <div class="col-sm-8"  >
    <?php  echo '<input type="text" name="username" />'; ?>
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
    <div class="row">
      <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Password:</label>
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
        

        
    <?php             echo '<input type="email" name="email_value" />';

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
        <?php             echo "<input type='date' name='birthday' />";
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
            <?php             echo '<input  type="text" name="firstname" />';
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
            <?php             echo '<input type="text" name="lastname" />';
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
        <?php             echo "<input type='text' name='bio' />";?>
        </div>
    </div>
    </div>

    <div class="col-sm-3"  >
    <div class="row">
      <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Public/Private Profile:</label>
        </div>

        <div class="col-sm-8"  >

        <select name="profile_state" id="profile_state">
              <option value="0" >Private</option>
              <option value="1" selected>Public</option>
            </select>
    </div>
    </div>
    </div>

    </div>

    </div>
    </div>
    </div>
        <?php
        echo form_submit('submit', 'Register', 'class="btn btn-primary" id="submitbtn"');
        echo form_close();
        ?>
    </div>
    <div class="col-sm-1" >

      </div>
  </div>
  </div>

  </div>

  
<script>

</script>

<?php
  $this->load->view('header/bottom');
?>