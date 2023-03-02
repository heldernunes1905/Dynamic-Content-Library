<?php
$user_id = ($this->session->userdata['logged_in']['user_id']);
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
$first = ($this->session->userdata['logged_in']['first_name']);
$last = ($this->session->userdata['logged_in']['last_name']);
$iduser = ($this->session->userdata['logged_in']['user_id']);
$permission = ($this->session->userdata['logged_in']['permission']);
$this->load->view('login/insideheader/header');

?>
 <table>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Image</th>
      <th>Text</th>
      <th>Date</th>
      <th>Username</th>
      <th>Options</th>
    </tr>
    <?php
    foreach($notification as $notif){
        ?>
        <tr>
            <td><?php echo "ID: ".$notif->notification_id; ?></td>
            <td><?php echo "Title: ".$notif->title;?></td>
            <td><?php echo "Image: ".$notif->image;?></td>
            <td><?php echo "Text: ".$notif->text;?></td>
            <td><?php echo "Date: ".$notif->date;?></td>
            <td><?php echo "Username: ".$notif->username;?></td>
            <td><button type="button" class="btn btn-success" onclick='confirmRemoveNot(<?php echo $notif->notification_id?>)'>Remove</button></td>
        </tr>

    <?php
    }
    ?>
</table>
<script>
function confirmRemoveNot(not_id) {
    var response = confirm("Do you want to remove Notification:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removenotif/" + not_id;
    }
}
</script>
<?php
$this->load->view('login/insideheader/bottom');
?>
