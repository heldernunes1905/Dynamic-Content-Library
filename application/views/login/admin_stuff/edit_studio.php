<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
} else {
    header("location: login");
}

$this->load->view('header/top');
?>
<br>
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
            <th scope="col">Studio Id</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date Created</th>
            <th scope="col">description</th>
            <th scope="col">Actions</th>


        </tr>
    </thead>
    <tbody id="myTable">
        <?php 
        foreach ($studio as $stu) { ?>
            <tr>
                <th scope="row"><?php echo $stu->studio_id; ?></th>
                <td><?php echo $stu->first_name; ?></td>
                <td><?php echo $stu->last_name; ?></td>
                <td><?php echo $stu->date_created; ?></td>
                <td><?php echo $stu->description; ?></td>
                <td><i class="edit fas fa-user-edit" data-toggle="modal" data-target="#exampleModal"
                 data-studio_id="<?php echo $stu->studio_id; ?>" 
                 data-first_name="<?php echo $stu->first_name; ?>"
                 data-last_name="<?php echo $stu->last_name; ?>"
                 data-date_created="<?php echo $stu->date_created; ?>"
                 data-description="<?php echo $stu->description; ?>"

                
                ></i> <i class="remove fas fa-user-times" data-toggle="modal" data-target="#deleteModal" 
                data-studio_id="<?php echo $stu->studio_id; ?>" 
                data-first_name="<?php echo $stu->first_name; ?>"
                data-last_name="<?php echo $stu->last_name; ?>"></i></td>
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
                <h5 class="modal-title" id="user_id_top">Studio id:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open('mod_studio');
                ?>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">First Name:</label>
                    
                    <?php echo form_input('first_name', "", 'id="first_name" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Last Name:</label>
                    <?php echo form_input('last_name', "", 'id="last_name" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Date Created:</label>
                    <input type="date" name="date_created" />
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">description:</label>
                    <?php echo form_input('description', "", 'id="description" class="form-control"'); ?>
                </div>
                
                    <?php echo form_input('studio_id', "", 'id="studio_id" class="form-control" style="display:none"'); ?>

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
                <h5 class="modal-title" id="user_id_top_delete">Studio id:</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5 class="modal-title" id="user_name_top_delete">Studio Name:</h5>
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open('remove_studio');
                ?>
                <?php echo form_input('studio_id', "", 'id="userid_delete" class="form-control" style="visibility: hidden"'); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php
                echo form_submit('submit', 'Delete Studio', 'class="btn btn-primary" style="background-color:#1584ab"');

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
        var my_user_id = $(this).data('studio_id');
        var top_user_id =document.getElementById('user_id_top')
        var user_id =document.getElementById('studio_id')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "Studio Id: " + my_user_id

        $('input[name=first_name]').val($(this).data('first_name'));
        $('input[name=last_name]').val($(this).data('last_name'));
        $('input[name=date_created]').val($(this).data('date_created'));
        $('input[name=description]').val($(this).data('description'));
    });
//                var_dump($users[1]);

$(document).on("click", ".remove", function () {
        var my_user_id = $(this).data('studio_id');
        var top_user_id =document.getElementById('user_id_top_delete')
        var top_user_name =document.getElementById('user_name_top_delete')
        var user_id =document.getElementById('userid_delete')
        //alert('<?php //echo array_search('6', $users)?>')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "Studio Id: " + my_user_id
        top_user_name.innerHTML  = "Name: " + $(this).data('first_name') +' '+ $(this).data('last_name')
    });

</script>
<?php
$this->load->view('login/insideheader/bottom');
?>