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

<head>
    <title>Admin Page</title>
    
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="profile">
        <?php
        echo "Hello <b id='welcome'><i>" . $first,$last . "</i> !</b>";
        echo "<br/>";
        echo "<br/>";
        echo "Welcome to Admin Page";
        echo "<br/>";
        echo "<br/>";
        echo "Your Username is " . $username;
        echo "<br/>";
        echo "Your Email is " . $email;
        echo "<br/>";
        ?>
        <b id="logout"><a href="<?= base_url() ?>index.php/logout">Logout</a></b>
    </div>
    <br />
</body>

</html>