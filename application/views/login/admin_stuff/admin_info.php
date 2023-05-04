<?php

if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $password = ($this->session->userdata['logged_in']['password']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
    $idadmin = ($this->session->userdata['logged_in']['user_id']);
    $permission = ($this->session->userdata['logged_in']['permission']);
    $this->load->view('login/insideheader/header');

} else {
    header("location: login");
}
?>


<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <div class="modal-body">
      <div class="row">
      <div class="col-sm-3"  >
      <div class="row">
      <div class="col-sm-4"  >

    <?php
    echo "<div class='error_msg'>";
    echo validation_errors();
    echo "</div>";

    echo form_open('update_user');
    ?>
    <label for="message-text" class="col-form-label">User Name:</label>

    </div>
    <div class="col-sm-8"  >
    <?php echo form_input('username', $this->session->userdata['logged_in']['username'], 'id="username" class="form-control input-style"'); 
        if (isset($message_display)) {
            echo 'Username is already taken.';
        }
        ?>
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
    <div class="row">
      <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Password:</label>
        </div>

        <div class="col-sm-8"  >

        <?php echo form_input('password', $this->session->userdata['logged_in']['password'], 'id="password" class="form-control input-style"'); ?>
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
    <div class="row">
      <div class="col-sm-4"  >
      <label for="message-text" class="col-form-label">Email:</label>
        </div>
        <div class="col-sm-8"  >
        

        
    <?php $data = array(
        'type' => 'email',
        'name' => 'user_email',
        'value' => $this->session->userdata['logged_in']['email'],
        'class' => 'form-control input-style',
        'id' => 'user_email'
    );
    echo form_input($data);
    if (isset($message_display)) {
        echo 'Email is already on our system.';
    }
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
        <?php echo form_input('birthday', $this->session->userdata['logged_in']['birthday'], 'id="birthday" class="form-control input-style"'); ?>
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
            <?php echo form_input('first_name', $this->session->userdata['logged_in']['first_name'], 'id="first_name" class="form-control input-style"'); ?>
       
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Last Name:</label>
        </div>
        <div class="col-sm-8"  >
            <?php echo form_input('last_name', $this->session->userdata['logged_in']['last_name'], 'id="last_name" class="form-control input-style"'); ?>
    </div>
    </div>
    </div>

    <div class="col-sm-3"  >
    <div class="row">
        <div class="col-sm-4"  >
            <label for="message-text" class="col-form-label">Gender:</label>
        </div>
        <div class="col-sm-8"  >
            <?php echo form_input('gender', $this->session->userdata['logged_in']['gender'], 'id="gender" class="form-control input-style"'); ?>
        </div>
    </div>
    </div>


    <div class="col-sm-3"  >
    <div class="row">
        
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Bio:</label>
        </div>
        <div class="col-sm-8"  >
        <?php echo form_input('bio', $this->session->userdata['logged_in']['bio'], 'id="bio" class="form-control input-style"'); ?>
        </div>
    </div>
    </div>
    </div>

    </div>

    <?php echo form_input('user_id', "$idadmin", 'id="user_id" class="form-control input-style" style="visibility: hidden"'); ?>
    <?php echo form_input('permission', "$permission", 'id="permission" class="form-control input-style" style="visibility: hidden"'); ?>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php
        echo form_submit('submit', 'Edit info', 'class="btn btn-primary" id="submitbtn"');
        echo form_close();
        ?>
    </div>
    </div>
    <div class="col-sm-1" >

      </div>
  </div>
  </div>

  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type='text/javascript'>
        $(document).ready(function() {
            var idadmin = "<?php echo $idadmin; ?>";
            $.ajax({
                url: '<?= base_url() ?>index.php/userinfo',
                method: 'post',
                data: {
                    id: idadmin
                },
                dataType: 'json',
                success: function(response) {
                    var len = response.length;
                    if (len > 0) {
                        // Read values
                        var uname = response[0].id;
                        var first_name = response[0].first_name;
                        var last_name = response[0].last_name;
                        var user_name = response[0].user_name;
                        var user_email = response[0].user_email;
                        var user_password = response[0].user_password;
                        var permission = response[0].permission;


                        $('#id').text(uname);
                        $('#id1').val(uname);
                        $('#first_name').val(first_name);
                        $('#last_name').val(last_name);
                        $('#user_name').val(user_name);
                        $('#user_email').val(user_email);
                        $('#user_password').val(user_password);
                        $('#permission').val(permission);
                    }
                }

            });
        });
    </script>
    <?php
    $this->load->view('login/insideheader/bottom');
    ?>