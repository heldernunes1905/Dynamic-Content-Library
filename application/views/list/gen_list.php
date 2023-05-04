<?php
  $this->load->view('header/top');

if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
    $permissions = ($this->session->userdata['logged_in']['permission']);

} else {
    $permissions = 2;
}

?>
<br>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
<style>
    th,
    td {
        text-align: center
    }
</style>
<input id="myInput" type="text" placeholder="Search..">
<table class="table ">
    <thead>
        <tr>
            <th scope="col">Genre Name</th>
            <th scope="col">Description</th>
            <?php if($permissions == 0){ ?>
                <th scope="col">Actions</th>
            <?php }?>

        </tr>
    </thead>
    <tbody id="myTable">
        <?php 
        foreach ($genre as $gen) { ?>
            <tr>
                <td><a href='<?=base_url()?>index.php/genre/<?= $gen->name?>'><?php echo $gen->name; ?></a></td>
                <td><a href='<?=base_url()?>index.php/genre/<?= $gen->name?>'><?php echo $gen->description; ?></a></td>
                <?php if($permissions == 0){ ?>

                <td><i class="edit fas fa-user-edit" data-toggle="modal" data-target="#exampleModal"
                 data-genre_id="<?php echo $gen->genre_id; ?>" 
                 data-name="<?php echo $gen->name; ?>"
                 data-description="<?php echo $gen->description; ?>"
                ></i> <i class="remove fas fa-user-times" data-toggle="modal" data-target="#deleteModal" 
                data-genre_id="<?php echo $gen->genre_id; ?>" 
                data-name="<?php echo $gen->name; ?>"></i></td>
                <?php }?>
            </tr>
        <?php
        }
        ?>
    </tbody>

</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="user_id_top">Genre id:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open('mod_genre');
                ?>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Genre Name:</label>
                    <?php echo form_input('name', "", 'id="name" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <?php echo form_input('description', "", 'id="description" class="form-control"'); ?>
                </div>
                    <?php echo form_input('genre_id', "", 'id="genre_id" class="form-control" style="display:none"'); ?>                
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
                <h5 class="modal-title" id="user_id_top_delete">Genre id:</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5 class="modal-title" id="user_name_top_delete">Genre Name:</h5>
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open('remove_genre');
                ?>
                <?php echo form_input('genre_id', "", 'id="userid_delete" class="form-control" style="visibility: hidden"'); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php
                echo form_submit('submit', 'Delete Genre', 'class="btn btn-primary" style="background-color:#1584ab"');

                echo form_close();
                ?>
            </div>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='<?php echo base_url(); ?>others/js/ajax_user.js' type='text/javascript'></script>
<script type='text/javascript'>
    var baseURL = "<?php echo base_url(); ?>";
</script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    $(document).on("click", ".edit", function () {
        var my_user_id = $(this).data('genre_id');
        var top_user_id =document.getElementById('user_id_top')
        var user_id =document.getElementById('genre_id')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "Genre Id: " + my_user_id

        $('input[name=name]').val($(this).data('name'));
        $('input[name=description]').val($(this).data('description'));
       

    });
//                var_dump($users[1]);

$(document).on("click", ".remove", function () {
        var my_user_id = $(this).data('genre_id');
        var top_user_id =document.getElementById('user_id_top_delete')
        var top_user_name =document.getElementById('user_name_top_delete')
        var user_id =document.getElementById('userid_delete')
        //alert('<?php //echo array_search('6', $users)?>')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "Genre Id: " + my_user_id
        top_user_name.innerHTML  = "Name: " + $(this).data('name') 
    });

</script>
<?php
$this->load->view('login/insideheader/bottom');
?>