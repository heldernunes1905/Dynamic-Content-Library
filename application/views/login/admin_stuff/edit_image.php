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
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Content Type</th>
            <th scope="col">Description</th>
            <th scope="col">Rating</th>
            <th scope="col">Release Date</th>
            <th scope="col">Ranking</th>
            <th scope="col">Studio</th>
            <th scope="col">Link</th>



        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($sticks as $stick) { ?>
            <tr>
                <th scope="row"><?php echo $stick->contentId; ?></th>
                <td><?php echo $stick->title; ?></td>
                <td><?php echo "<img src='../uploads/$stick->images' width=50px>" ?></td>
                <td><?php echo $stick->content_type; ?></td>
                <td><?php echo $stick->description; ?></td>
                <td><?php echo $stick->rating; ?></td>
                <td><?php echo $stick->release_date; ?></td>
                <td><?php echo $stick->ranking; ?></td>
                <td><?php echo $stick->studio_id; ?></td>
                <td><?php echo $stick->links; ?></td>
                
                <td><i class="edit fas fa-user-edit" data-toggle="modal" data-target="#exampleModal" data-id="<?php echo $stick->contentId; ?>"></i> <i class="remove fas fa-user-times" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $stick->contentId; ?>"></i></td>
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
                <h5 class="modal-title" id="user_id_top">User id: </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo "<div class='error_msg'>";
                echo validation_errors();
                echo "</div>";

                echo form_open('mod_img');
                ?>

                <div class="form-group">
                    <label for="message-text" class="col-form-label">Title:</label>

                    <?php echo form_input('title', "$stick->title", 'id="title" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Content Type:</label>
                    <?php echo form_input('content_type', '', 'id="content_type" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <?php echo form_input('description', '', 'id="description" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Image:</label>
                   <img src='C:\xampp\htdocs\CodeIgniter-3.1.10\uploads\' id="imgPath" width=400px>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Rating:</label>
                    <?php echo form_input('rating', '', 'id="rating" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Release Date:</label>
                    <?php echo form_input('release_date', '', 'id="release_date" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Ranking:</label>
                    <?php echo form_input('ranking', '', 'id="ranking" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Studio:</label>
                    <?php echo form_input('studio_id', '', 'id="studio_id" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Link:</label>
                    <?php echo form_input('links', '', 'id="links" class="form-control"'); ?>
                </div>
                
                <div class="form-group">
                    <label for="message-text" class="col-form-label" id ="contentId"></label>
                </div>
                

            </div>
            <div class="modal-footer">
            <?php echo form_input('contentId', "$stick->contentId", 'id="contentId" class="form-control" style="visibility: hidden"'); ?>

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

                echo form_open('remove_img');
                ?>
                <?php echo form_input('contentId', "$stick->contentId", 'id="userid_delete" class="form-control" style="visibility: hidden"'); ?>

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
<script src='<?php echo base_url(); ?>others/js/ajax_img.js' type='text/javascript'></script>
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
        var user_id =document.getElementById('contentId')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "User Id: " + my_user_id
    });

    $(document).on("click", ".remove", function () {
        var my_user_id = $(this).data('id');
        var top_user_id =document.getElementById('user_id_top_delete')
        var top_user_name =document.getElementById('user_name_top_delete')
        var user_id =document.getElementById('userid_delete')
        //alert('<?php //echo array_search('6', $users)?>')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "User Id: " + my_user_id
        top_user_name.innerHTML  = "User Name: " + top_user_name
    });
    

</script>
<?php
$this->load->view('login/insideheader/bottom');
?>