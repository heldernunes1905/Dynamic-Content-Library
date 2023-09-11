<?php
  $this->load->view('header/top');
  defined('BASEPATH') OR exit('No direct script access allowed');
  if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
    $permissions = ($this->session->userdata['logged_in']['permission']);
  
  }else{
    $user_id= 0;
    $permissions = 2;
  }
  $uri = $_SERVER['REQUEST_URI']; 
  $forum = str_replace("/Dynamic-Content-Library-main/index.php/forum/","",$uri);
  $forum = strtok($forum, '/');
  ?>



<br><br>


<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" ></div>
      <div class="col-sm-8">
      <?php if($user_id != 0 && $permissions == 0){?>
        <nav class="navbar navbar-expand-lg navbar-light" >
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="row">
      <div class="collapse navbar-collapse" id="navbarNav" ><!-- style="background-color: yellow;"-->
        <ul class="navbar-nav">
          
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/forum">All</a>
              </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/forum/public">Public</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <a href="<?= base_url() ?>index.php/forum/private">Private</a><br>
            </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </ul>
      </div>
      </nav>
      

      </div>
      <div class="col-sm-2" >
      <p data-target='#modaladdthread' data-toggle='modal' alt='banner' width='10%' >Add Forum</p>
      <?php } ?>
      </div>
      
      
    <div class="col-sm-1" ></div>
</div>
</div>






<?php foreach($forum_title as $ft){?>

<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" ></div>
      <div class="col-sm-9" style="background-color: #292929;">
      <a href="<?= base_url() ?>index.php/forum/<?= $ft->forum_id ?>">
      <?php echo '<p>'.$ft->title.'</p>';?>
      <?php echo '<p>'.$ft->description.'</p>';?>
      <?php echo '<p>'.$ft->date.'</p>';?>

      </a>
      

      </div>
      <div class="col-sm-1 "  style="background-color: #292929;">

      <?php if($permissions == 0){?>
        <i class="edit fas fa-user-edit fa-2x" data-toggle="modal" data-target="#editModal"
                 data-forum_id="<?php echo $ft->forum_id; ?>" 
                 data-title="<?php echo $ft->title; ?>"
                 data-description="<?php echo $ft->description; ?>"
                 data-public="<?php echo $ft->public; ?>">
    </i> <i class="remove fas fa-user-times fa-2x" data-toggle="modal" data-target="#deleteModal" 
                data-forum_id="<?php echo $ft->forum_id; ?>" 
                data-title="<?php echo $ft->title; ?>"
                data-description="<?php echo $ft->description; ?>"></i>
      <?php }?>
      </div>
      
      
    <div class="col-sm-1" ></div>
</div>
</div>
<br>
<br>
<br>
<?php }?>




<div class="modal" id="modaladdthread" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" data-target='#modalcreatelist' data-toggle='modal' alt='banner' width='10%' >Create Forum<br></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="fromcomment" action="<?= base_url() ?>index.php/addforum" method="get">
          <input type="text" id="title" name="title" placeholder="Title...">
          <textarea id="description" name="description" rows="4" cols="50" placeholder="Description..." ></textarea><br>
          <label for="public">Permission:</label>
          <select name="public" id="public">
            <option value="0">Private</option>
            <option value="1">Public</option>
          </select>
        <div class="modal-footer">
        <button id="submit-btn" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thread_id_top">Forum id:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open('modforum');
                ?>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Forum Title:</label>
                    <?php echo form_input('title_mod_thread', "", 'id="title_mod_thread" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <?php echo form_input('description_mod_thread', "", 'id="description_mod_thread" class="form-control"'); ?>
                </div>

                <div class="form-group">
                  <label for="public_edit">Permission:</label>
                  <select name="public_edit" id="public_edit">
                    <option value="0">Private</option>
                    <option value="1">Public</option>
                  </select>      
                </div>
                
                    <?php echo form_input('thread_id_mod', "", 'id="thread_id_mod" class="form-control" style="display:none"'); ?>                
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

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thread_id_top_delete">Forum id:</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5 class="modal-title" id="thread_title_delete">Forum Title:</h5>
            <h5 class="modal-title" id="thread_desc_delete">Forum Desc:</h5>

                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open("deleteforum");
                ?>
                <?php echo form_input('thread_id', "", 'id="thread_id_delete" class="form-control" style="visibility: hidden"'); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php
                echo form_submit('submit', 'Delete Thread', 'class="btn btn-primary" style="background-color:#1584ab"');

                echo form_close();
                ?>
            </div>

        </div>
    </div>
</div>


<script>

$(document).on("click", ".edit", function () {
        var thread_id = $(this).data('forum_id');
        var thread_id_top =document.getElementById('thread_id_top')
        var thread_id_mod =document.getElementById('thread_id_mod')
        thread_id_mod.value = thread_id
        thread_id_top.innerHTML  = "Forum Id: " + thread_id
        var selectElement = document.querySelector('#public_edit');

        $('input[name=title_mod_thread]').val($(this).data('title'));
        $('input[name=description_mod_thread]').val($(this).data('description'));
        selectElement.value = $(this).data('public');
    });



$(document).on("click", ".remove", function () {
        var thread_id = $(this).data('forum_id');
        var thread_id_top_delete =document.getElementById('thread_id_top_delete')
        var thread_title_delete =document.getElementById('thread_title_delete')
        var thread_desc_delete =document.getElementById('thread_desc_delete')

        var thread_id_delete =document.getElementById('thread_id_delete')
        thread_id_delete.value = thread_id
        thread_id_top_delete.innerHTML  = "Forum Id: " + thread_id
        thread_title_delete.innerHTML  = "Title: " + $(this).data('title')
        thread_desc_delete.innerHTML  = "Description: " + $(this).data('description')

    });
</script>


<?php
  $this->load->view('header/bottom');
?>