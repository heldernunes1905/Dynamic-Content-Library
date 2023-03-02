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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>others/css/menu.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
<style>
    th,
    td {
        text-align: center
    }
</style>
<input id="myInput" type="text" placeholder="Search..">
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Email</th>
            <th scope="col">UserType</th>
            <th scope="col">Actions</th>


        </tr>
    </thead>
    <tbody id="myTable">
        <?php 
        foreach ($users as $user) { ?>
            <tr>
                <th scope="row"><?php echo $user->user_id; ?></th>
                <td><?php echo $user->first_name; ?></td>
                <td><?php echo $user->last_name; ?></td>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->password; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->permission; ?></td>
                <td><i class="edit fas fa-user-edit" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $user->user_id; ?>"></i> <i class="remove fas fa-user-times" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $user->user_id; ?>"></i></td>
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
                <h5 class="modal-title" id="user_id_top">User id:</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open('mod_user');
                ?>

                <div class="form-group">
                    <label for="message-text" class="col-form-label">First Name:</label>
                    
                    <?php echo form_input('first_name', "$user->first_name", 'id="first_name" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Last Name:</label>
                    <?php echo form_input('last_name', "$user->last_name", 'id="last_name" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Username:</label>
                    <?php echo form_input('username', "$user->username", 'id="username" class="form-control"');
                    echo "<div class='error_msg'>";
                    if (isset($message_display)) {
                        echo 'Username is already taken.';
                    }
                    echo "</div>";
                    ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Password:</label>
                    <?php echo form_input('password', "$user->password", 'id="password" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Email:</label>
                    <?php $data = array(
                        'type' => 'email',
                        'name' => 'user_email',
                        'class' => 'form-control',
                        'value' => "$email",
                        'id' => 'email'
                    );
                    echo form_input($data);
                    echo "<div class='error_msg'>";
                    if (isset($message_display)) {
                        echo 'Email is already on our system.';
                    }
                    echo "</div>"; ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">User Type:</label>
                    <?php $data1 = array(
                        'type' => 'number',
                        'name' => 'permissions',
                        'class' => 'form-control',
                        'value' => "$user->permission",
                        'id' => 'permissions'
                    );
                    echo "<br/>";
                    echo form_input($data1); ?>
                    <?php echo form_input('user_id', "$user->user_id", 'id="user_id" class="form-control" style="visibility: hidden"'); ?>
                </div>

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
                <h5 class="modal-title" id="user_id_top_delete">User id:</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5 class="modal-title" id="user_name_top_delete">User Name:</h5>
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open('remove_user');
                ?>
                <?php echo form_input('userid', "$user->user_id", 'id="userid_delete" class="form-control" style="visibility: hidden"'); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php
                echo form_submit('submit', 'Delete User', 'class="btn btn-primary" style="background-color:#1584ab"');

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
        var my_user_id = $(this).data('id');
        var top_user_id =document.getElementById('user_id_top')
        var user_id =document.getElementById('user_id')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "User Id: " + my_user_id
    });

    $(document).on("click", ".remove", function () {
        var my_user_id = $(this).data('id');
        var top_user_id =document.getElementById('user_id_top_delete')
        var top_user_name =document.getElementById('user_name_top_delete')
        var user_id =document.getElementById('userid_delete')
        //alert('<?php echo array_search('6', $users)?>')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "User Id: " + my_user_id
        top_user_name.innerHTML  = "User Name: " + top_user_name
    });
</script>
<?php
$this->load->view('login/insideheader/bottom');
?>