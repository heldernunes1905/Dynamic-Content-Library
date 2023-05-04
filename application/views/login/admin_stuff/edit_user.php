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
                <td><?php echo base64_decode($user->username); ?></td>
                <td><?php echo base64_decode($user->password); ?></td>
                <td><?php echo $user->email; ?></td>
                <?php if($user->permission == 0){?>
                    <td>Admin</td>
                <?php }else{?>
                    <td>Normal User</td>
                <?php }?>
                <td><i class="edit fas fa-user-edit" data-toggle="modal" data-target="#exampleModal"
                 data-id="<?php echo $user->user_id; ?>" 
                 data-first_name="<?php echo $user->first_name; ?>"
                 data-last_name="<?php echo $user->last_name; ?>"
                 data-username="<?php echo base64_decode( $user->username); ?>"
                 data-password="<?php echo base64_decode( $user->password); ?>"
                 data-email="<?php echo $user->email; ?>"
                 data-permission="<?php echo $user->permission; ?>"

                
                ></i> <i class="remove fas fa-user-times" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $user->user_id; ?>" data-username="<?php echo base64_decode($user->username); ?>"></i></td>
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
                    
                    <?php echo form_input('first_name', "2", 'id="first_name" class="form-control"'); ?>
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
                    <select name="permission" id="permission">
                        <option value="0">Admin</option>
                        <option value="1">Normal User</option>
                    </select> 
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
        var selectElement = document.querySelector('#permission');


        $('input[name=first_name]').val($(this).data('first_name'));
        $('input[name=last_name]').val($(this).data('last_name'));
        $('input[name=username]').val($(this).data('username'));
        $('input[name=password]').val($(this).data('password'));
        $('input[name=user_email]').val($(this).data('email'));
        selectElement.value = $(this).data('permission');

    });
//                var_dump($users[1]);

    $(document).on("click", ".remove", function () {
        var my_user_id = $(this).data('id');
        var top_user_id =document.getElementById('user_id_top_delete')
        var top_user_name =document.getElementById('user_name_top_delete')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "User Id: " + my_user_id
        top_user_name.innerHTML  = "User Name: " + $(this).data('username')
    });
</script>
<?php
$this->load->view('login/insideheader/bottom');
?>