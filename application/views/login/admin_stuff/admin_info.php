<?php

if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
    $idadmin = ($this->session->userdata['logged_in']['user_id']);
    $permission = ($this->session->userdata['logged_in']['permission']);
} else {
    header("location: login");
}
$this->load->view('login/insideheader/header');
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>others/css/menu.css">

<div class="modal-body">
    <?php
    echo "<div class='error_msg'>";
    echo validation_errors();
    echo "</div>";

    echo form_open('update_user');
    ?>
    <label for="message-text" class="col-form-label">Email:</label>
    <?php $data = array(
        'type' => 'email',
        'name' => 'user_email',
        'value' => $this->session->userdata['logged_in']['email'],
        'class' => 'form-control',
        'id' => 'user_email'
    );
    echo form_input($data);
    echo "<div class='error_msg'>";
    if (isset($message_display)) {
        echo 'Email is already on our system.';
    }
    echo "</div>"; ?>
    <label for="message-text" class="col-form-label">Password:</label>
    <?php echo form_input('password', '', 'id="password" class="form-control"'); ?>
    <label for="message-text" class="col-form-label">User Name:</label>
    <?php echo form_input('username', $this->session->userdata['logged_in']['username'], 'id="username" class="form-control"'); 
    echo "<div class='error_msg'>";
    if (isset($message_display)) {
        echo 'Username is already taken.';
    }
    echo "</div>";
    ?>
    <label for="message-text" class="col-form-label">First Name:</label>
    <?php echo form_input('first_name', $this->session->userdata['logged_in']['first_name'], 'id="first_name" class="form-control"'); ?>
    <label for="message-text" class="col-form-label">Last Name:</label>
    <?php echo form_input('last_name', $this->session->userdata['logged_in']['last_name'], 'id="last_name" class="form-control"'); ?>
    <label for="message-text" class="col-form-label">Birthday:</label>
    <?php echo form_input('birthday', $this->session->userdata['logged_in']['birthday'], 'id="birthday" class="form-control"'); ?>
    <label for="message-text" class="col-form-label">Gender:</label>
    <?php echo form_input('gender', $this->session->userdata['logged_in']['gender'], 'id="gender" class="form-control"'); ?>
    <label for="message-text" class="col-form-label">Bio:</label>
    <?php echo form_input('bio', $this->session->userdata['logged_in']['bio'], 'id="bio" class="form-control"'); ?>
    <label for="message-text" class="col-form-label">Avatar:</label>
    <?php echo form_input('avatar', $this->session->userdata['logged_in']['avatar'], 'id="avatar" class="form-control"');?>
    <label for="message-text" class="col-form-label">Profile Banner:</label>
    <?php echo form_input('profile_banner', $this->session->userdata['logged_in']['profile_banner'], 'id="profile_banner" class="form-control"');?>
    <label for="message-text" class="col-form-label">Profile State:</label>
    <?php echo form_input('profile_state', $this->session->userdata['logged_in']['profile_state'], 'id="profile_state" class="form-control"'); ?>
    
    <?php echo form_input('user_id', "$idadmin", 'id="user_id" class="form-control" style="visibility: hidden"'); ?>
    <?php echo form_input('permission', "$permission", 'id="permission" class="form-control" style="visibility: hidden"'); ?>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php
        echo form_submit('submit', 'Edit info', 'class="btn btn-primary" style="background-color:#1584ab" id="submitbtn"');
        echo form_close();
        ?>
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