<?php
if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
    $permissions = ($this->session->userdata['logged_in']['permission']);
    $this->load->view('login/insideheader/header');
  } ?>


<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
  <table>
  <div class="row">
      <tr>
        <th class="col-sm-1">Type</th>
        <th class="col-sm-1">Reason</th>
        <th class="col-sm-1">Title</th>
        <th class="col-sm-2">Text</th>
        <th class="col-sm-2">Link</th>
        <th class="col-sm-2">Date</th>
        <th class="col-sm-1">Status</th><?php
          if($permissions == 0  && $_SERVER['REQUEST_URI'] == "/CodeIgniter-3.1.10/index.php/profile/$user_id/forms"){?>
          <th class="col-sm-2">Option</th>
          <?php }
        ?>
      </tr>
      <?php
    foreach($supporttickets as $st){

        switch($st->status){
          case 0:
            $st->status = "Closed";
            break;
          case 1:
            $st->status = "Delivered";
            break;
        }

        switch($st->type){
          case 1:
            $st->type = "Feedback";
            break;
          case 2:
            $st->type = "Content Request";
            break;
          case 3:
            $st->type = "Profile report";
            break;
        }


        ?>
        <tr>
            <td class="col-sm-1"><?php echo $st->type;?></td>
            <td class="col-sm-1"><?php echo $st->content_type;?></td>
            <td class="col-sm-1"><?php echo $st->title;?></td>
            <td class="col-sm-2"><?php echo $st->text;?></td>
            <td class="col-sm-2"><a href="<?php echo $st->link;?>"><?php echo $st->link;?></a></td>
            <td class="col-sm-2"><?php echo $st->date;?></td>
            <td class="col-sm-1"><?php echo $st->status;?></td><?php
              if($permissions == 0){ 
                if($st->status == "Delivered" && $_SERVER['REQUEST_URI'] == "/CodeIgniter-3.1.10/index.php/profile/$user_id/forms"){?>
              <td class="col-sm-2"><button type="button" class="btn btn-success" onclick='confirmRemoveRating(<?php echo $st->support_id?>)'>Close ticket</button></td>
              <?php 
                }else if($st->status == "Closed" && $_SERVER['REQUEST_URI'] == "/CodeIgniter-3.1.10/index.php/profile/$user_id/forms"){ ?>
              <td class="col-sm-2"><button type="button" class="btn btn-success" onclick='confirmDeleteRating(<?php echo $st->support_id?>)'>Delete ticket</button></td>

                <?php }
              }
              ?>
        </tr>

    <?php
    }
    ?>
</table>
</div>
    <div class="col-sm-1" >

      </div>
  </div>
  </div>

  </div>
<script>
function confirmRemoveRating(st) {
    var response = confirm("Do you want to remove Ticket:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removeTicket/" + st
    }
}

function confirmDeleteRating(st) {
    var response = confirm("Do you want to remove Ticket:");
    if (response) {
      window.location="<?= base_url() ?>index.php/deleteTicket/" + st
    }
}
</script>
<?php
$this->load->view('header/bottom');
?>