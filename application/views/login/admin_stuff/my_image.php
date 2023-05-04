<?php
$this->load->view('login/insideheader/header');
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script>
	document.getElementById("home").className = "active";
</script>

<head>
	<title>Admin Page</title>
	
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>

<br />
<?php


foreach ($sticks as $stick) {

	echo "<img src='../uploads/$stick[imgPath]' width=10% id = '$stick[id_stick]'>";
	/*echo $stick["altImg"] . '<br />';
	echo $stick["imgPath"] . '<br />';
	echo $stick["imgTitle"] . '<br />';
	echo $stick["imgdescricao"] . '<br />';
	echo $stick["idUser"] . '<br />';*/
}
?>

<?php
$this->load->view('header/bottom');
?>