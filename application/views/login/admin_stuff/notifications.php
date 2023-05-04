<?php
$user_id = ($this->session->userdata['logged_in']['user_id']);
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
$first = ($this->session->userdata['logged_in']['first_name']);
$last = ($this->session->userdata['logged_in']['last_name']);
$iduser = ($this->session->userdata['logged_in']['user_id']);
$permission = ($this->session->userdata['logged_in']['permission']);
$this->load->view('header/top');

?>
<br>
<br>

<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
  <table>
  <div class="row">
      <tr>
          <th class="col-sm-1">ID</th>
          <th class="col-sm-2">Title</th>
          <th class="col-sm-2">Image</th>
          <th class="col-sm-2">Text</th>
          <th class="col-sm-2">Date</th>
          <th class="col-sm-2">Username</th>
          <th class="col-sm-1">Options</th>
      </tr>
  
              <?php
            foreach($notification as $notif){
                ?>
                <tr>
                    <td class="col-sm-1"><?php echo $notif->notification_id; ?></td>
                    <td class="col-sm-2"><?php echo $notif->title;?></td>
                    <td class="col-sm-2"><?php echo $notif->image;?></td>
                    <td class="col-sm-2"><?php echo $notif->text;?></td>
                    <td class="col-sm-2"><?php echo $notif->date;?></td>
                    <td class="col-sm-2"><?php echo base64_decode($notif->username);?></td>
                    <td><i class="edit fas fa-user-edit" data-toggle="modal" data-target="#editModal"
                    data-notification_id="<?php echo $notif->notification_id; ?>" 
                    data-title="<?php echo $notif->title; ?>"
                    data-text="<?php echo $notif->text; ?>"


                
                ></i> <i class="remove fas fa-user-times" onclick='confirmRemoveNot(<?php echo $notif->notification_id?>)'></i></td>
                </tr>

            <?php
            }
            ?>
            </div>
</table>



    </div>
    <div class="col-sm-1" >

      </div>
  </div>
  </div>

  </div>


  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="not_id_top">Notification id:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open('mod_not');
                ?>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Title:</label>
                    
                    <?php echo form_input('title', "", 'id="title" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Text:</label>
                    <?php echo form_input('text', "", 'id="text" class="form-control"'); ?>
                </div>
                
                    <?php echo form_input('notification_id', "", 'id="notification_id" class="form-control" style="display:none"'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php
                echo form_submit('submit', 'Edit info', 'class="btn btn-primary" style="background-color:#1584ab"');

                echo form_close();
                ?>
            </div>

        </div>
    </div>
</div>
        </div>

<script>
function confirmRemoveNot(not_id) {
    var response = confirm("Do you want to remove Notification:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removenotif/" + not_id;
    }
}

$(document).on("click", ".edit", function () {
        var notification_id = $(this).data('notification_id');
        var top_user_id =document.getElementById('not_id_top')
        var user_id =document.getElementById('notification_id')
        user_id.value = notification_id
        top_user_id.innerHTML  = "Notification Id: " + notification_id

        $('input[name=title]').val($(this).data('title'));
        $('input[name=text]').val($(this).data('text'));
       
    });

</script>
<?php
$this->load->view('login/insideheader/bottom');
?>
