<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (isset($this->session->userdata['logged_in'])) {

    header("location: http://localhost/CodeIgniter-3.1.10/index.php/login");
}

  $this->load->view('header/top');
?>
<script>
document.getElementById("login").className = "active";
</script>
    <?php
    if (isset($logout_message)) {
        echo "<div class='message'>";
        echo $logout_message;
        echo "</div>";
    }
    ?>
    <?php
    if (isset($message_display)) {
        echo "<div class='message'>";
        echo $message_display;
        echo "</div>";
    }
    ?>
    <div id="main">
        <div id="login">

            <?php echo form_open('login_enter'); ?>
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
                echo $error_message;
            }
            echo validation_errors();
            echo "</div>";
            ?>
            <label>UserName :</label>
            <input type="text" name="username" id="name" placeholder="username" /><br /><br />
            <label>Password :</label>
            <input type="password" name="password" id="password" placeholder="**********" /><br /><br />
            <input type="submit" value=" Login " name="submit" /><br />
            <a href="<?php echo base_url() ?>index.php/register">To SignUp Click Here</a>
            
            <?php echo form_close(); ?>
            <br />
            <script>
                function myFunction() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                }
            </script>
        </div>
    </div>
<?php
  $this->load->view('header/bottom');
?>