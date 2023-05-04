<?php
if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
    $this->load->view('header/top');

}

?>
<style>

</style>   
<br>

&nbsp;


<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
        
      <div id="main">
        <div id="login">
            <h2 style="color:white;">Support Form</h2>
            <?php echo "<div class='error_msg'>";
    echo validation_errors();
    echo "</div>";?>
     <?php
    

    echo form_open('addSupportTicket');
    ?>
            <hr />
      
    <div class="row">
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Type:</label>
        </div>
        <div class="col-sm-8"  >
        <select name='type' id="type">
            <option value="" disabled selected>Select</option>
            <option value='1'>Feedback</option>
            <option value='2'>Suggest Content</option>
            <option value='3'>Report User</option>
        </select><br>

        <select name="content_type" id="content_type">
        <option value="" disabled selected>Select</option>
        </select>
       
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Title:</label>
        </div>
        <div class="col-sm-8"  >
            <?php             echo '<input type="text" name="title" />';
 ?>
    </div>
    </div>
    </div>

    <div class="col-sm-3"  >
    <div class="row">
        
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Text:</label>
        </div>
        <div class="col-sm-8"  >
        <?php             echo "<input type='text' name='text' />";
 ?>
        </div>
    </div>
    </div>
    


    <div class="col-sm-3"  >
    <div class="row">
        <div class="col-sm-4"  >
            <label for="message-text" class="col-form-label">Link:</label>
        </div>
        <div class="col-sm-8"  >
        <input type="text" name="link" size="20" />
           </div>
    </div>
    </div>





    </div>
    <hr>
        <?php
        echo form_submit('submit', 'Create', 'class="btn btn-primary" id="submitbtn"');
        echo form_close();
        ?>
    </div>
    <div class="col-sm-1" >

      </div>
  </div>
  </div>

  </div>



  

<script>
var mealsByCategory = {
  1: ["Report Bug", "New feature", "Normal feedback", "Others"],
  2: ["Movie", "Show", "Book", "Game"],
  3: ["Offensive", "Trolling", "Spam", "Bot", "Others"]
}

const selectEl1 = document.querySelector('#type');
const selectEl2 = document.querySelector('#content_type')

selectEl1.addEventListener('change', event => {
  const meals = mealsByCategory[selectEl1.value]

  // clear the content of the second select and populate it with new options
  selectEl2.innerHTML = '';
  meals.forEach(item => {
    

    const option = document.createElement('option');
    option.setAttribute("id", item);

    selectEl2.appendChild(option);
    option.textContent = item;
  });
});
</script>
<?php
$this->load->view('header/bottom');
?>