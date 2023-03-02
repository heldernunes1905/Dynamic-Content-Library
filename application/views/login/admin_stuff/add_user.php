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
<div id="main">
    <div id="login">
        <h2>Registration Form</h2>
        <hr />
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('add_user_db');

        echo form_label('Create Username : ');
        echo "<br/>";
        echo form_input('user_name');
        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo 'Username is already taken.';
        }
        echo "</div>";
        echo "<br/>";
        echo form_label('First Name : ');
        echo "<br/>";
        echo form_input('first_name');
        echo "<br/>";
        echo "<br/>";
        echo form_label('Last Name : ');
        echo "<br/>";
        echo form_input('last_name');
        echo "<br/>";
        echo "<br/>";
        echo form_label('Email : ');
        echo "<br/>";
        $data = array(
            'type' => 'email',
            'name' => 'user_email'
        );
        echo form_input($data);
        echo "<br/>";
        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo 'Email is already on our system.';
        }
        echo "</div>";
        echo "<br/>";
        echo form_label('Password : ');
        echo "<br/>";
        echo form_password('user_password');
        echo "<br/>";
        echo "<br/>";
        echo form_label('Permissions(0-Admin | 1-Normal User) : ');
        $data1 = array(
            'type' => 'number',
            'name' => 'permissions'
        );
        echo "<br/>";
        echo form_input($data1);
        echo "<div class='error_msg'>";
        echo "</div>";
        echo "<br/>";
        echo form_submit('submit', 'Sign Up');

        echo form_close();
        ?>
    </div>
</div>
<?php
$this->load->view('login/insideheader/bottom');
?>