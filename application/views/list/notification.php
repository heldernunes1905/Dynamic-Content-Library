<?php
  $this->load->view('header/top');
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<style>

</style>
<script>

</script>
<br>

<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-1" >
      </div>
    <div class="col-sm-10" >
      <div class="row">
  
      <div class="col-sm-10" >
      <h1>MY NOTIFICATIONS</h1>
      </div>

      <div class="col-sm-2" >
      <?php if(!empty($notification)){?>
        <h4 onclick="deleteallnot(<?php echo $notification[0]->user_id;?>)"> Delete all</h4><br>
      <?php }?>
      </div>
    
      </div>

    </div>

    <div class="col-sm-1" >
      </div>
  </div>
</div>
</div>

<div class="container-fluid no-padding">
  <div class="row">
  <div class="col-sm-1" >
      </div>
    <div class="col-sm-10" >
      <div class="row">

      <?php foreach($notification as $not){?>


        <div class="col-sm-10" >

        <?php echo "<p>".$not->title.': ';?>

        <?php  echo $not->text.'</p>'?>
        <?php echo "<p>".date("d-m-Y H:i:s", strtotime($not->date))."</p>" ?>

       </div>


        <div class="col-sm-2" >

          <i class="remove fas fa-user-times" style="color:white" onclick="deletenot(<?php echo $not->notification_id;?>)">REMOVE</i><br>
          </div>

        <?php } ?>
      
    
    
      </div>

    </div>

    <div class="col-sm-1" >
      </div>
  </div>
</div>
</div>


<?php
  
  $this->load->view('header/bottom');
?>