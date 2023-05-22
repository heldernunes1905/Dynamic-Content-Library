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
<table class="table">
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
            <th scope="col">Genre</th>
            <th scope="col">Staff</th>
            <th scope="col">Characters</th>
            <th scope="col">Link</th>
            <th scope="col">Duration</th>
            <th scope="col">N. Ep</th>

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
                <?php foreach($studios as $stu){
                    if($stu->studio_id == 0 || empty($name)){
                        $name = "No studio assigned";
                        ?><td><?php echo $name; ?></td><?php
                    }else{
                        if($stick->studio_id == $stu->studio_id){ 
                            $name = $stu->first_name.' '.$stu->last_name;?>
                            <td><?php echo $name; ?></td>
                    <?php 
                        }
                    }
                    
                   
                }
                 
                if(empty($stick->genre)){ ?>
                  <td><?php echo "No genre"; ?></td>
                <?php }else{ ?>
                  <td><?php echo $stick->genre; ?></td>
                <?php } ?>

                <?php if(empty($stick->staff)){ ?>
                  <td><?php echo "No Staff"; ?></td>
                <?php }else{ ?>
                  <td><?php echo $stick->staff; ?></td>
                <?php } ?>

                <?php if(empty($stick->character)){ ?>
                  <td><?php echo "No Characters"; ?></td>
                <?php }else{ ?>
                  <td><?php echo $stick->character; ?></td>
                <?php } ?>
                
                <td><?php echo $stick->links; ?></td>
                <td><?php echo $stick->duration; ?></td>
                <td><?php echo $stick->ep_number; ?></td>



                <td><i class="edit fas fa-user-edit" data-toggle="modal" data-target="#exampleModal" 
                data-id="<?php echo $stick->contentId; ?>"
                data-title="<?php echo $stick->title; ?>"
                data-images="<?php echo $stick->images; ?>"
                data-content_type="<?php echo $stick->content_type; ?>"
                data-description="<?php echo $stick->description; ?>"
                data-rating="<?php echo $stick->rating; ?>"
                data-release_date="<?php echo $stick->release_date; ?>"
                data-ranking="<?php echo $stick->ranking; ?>"
                data-studio_id="<?php echo $name; ?>"
                data-links="<?php echo $stick->links; ?>"
                data-duration="<?php echo $stick->duration; ?>"
                data-ep_number="<?php echo $stick->ep_number; ?>"
                data-studio="<?php echo $stick->studio_id; ?>"

                ></i> <i class="remove fas fa-user-times" data-toggle="modal" data-target="#deleteModal" 
                data-id="<?php echo $stick->contentId; ?>" 
                data-title="<?php echo $stick->title; ?>" 
                data-images="<?php echo "../uploads/".$stick->images; ?>"></i></td>
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

                ?>
                <form action="mod_img" method="post" id="form_add_img">

                <div class="form-group">
                    <label for="message-text" class="col-form-label">Title:</label>

                    <?php echo form_input('title', "$stick->title", 'id="title" class="form-control"'); ?>
                </div>
                
                <div class="form-group">
                    <select name="content_type" id="content_type">
                        <option value="movie">Movie</option>
                        <option value="show">TV Show</option> 
                        <option value="book">Book</option>
                        <option value="game">Game</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <?php echo form_input('description', '', 'id="description" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Image:</label>
                   <img src='../uploads/' id="imgPath" name="image" width=400px>
                   <input type="file" name="contentimage" size="20" />
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
                    <input list="studio_id" name="studio_id" />
                    <datalist id="studio_id">
                        <?php 
                            foreach($studios as $stu){?>
                                <option name="" value="<?php echo $stu->first_name.' '; echo $stu->last_name; ?>"></option>
                            <?php }
                        ?>
                    </datalist>                </div>
                
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Link:</label>
                    <?php echo form_input('links', '', 'id="links" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Duration:</label>
                    <?php echo form_input('duration', '', 'id="duration" class="form-control"'); ?>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Episode Number:</label>
                    <?php echo form_input('ep_number', '', 'id="ep_number" class="form-control"'); ?>
                </div>
                
                <div class="form-group">
                                   
                    <div class="search-container">
                    <input id="search-bar" type="text" placeholder="Search...">
                    <div id="search-results" class="search-results">
                        <div id="results-container"></div>
                    </div>
                    </div>
                    <div id="selected-items"></div>

                    <input type="text" name="genres" id="genres" style="display:none"/>
                </div>

                <div class="form-group">
                <div class="search-container">
                    <input id="search-bar-staff" type="text" placeholder="Search...">
                    <div id="search-results-staff" class="search-results-staff">
                        <div id="results-container-staff"></div>
                    </div>
                    <input id="search-bar-char" type="text" placeholder="Search...">
                    <div id="search-results-char" class="search-results-staff">
                        <div id="results-container-character"></div>
                    </div>
                    </div>

                    <div id="selected-items-staff"></div>

                    <input type="text" name="staff" id="staff" style="display:none"/>
                    <input type="text" name="characters" id="characters" style="display:none"/>

                    <button id="selected-items-button" class="btn-primary" value="show-item">Show Selected Items</button>
                </div>







            </div>
            <div class="modal-footer">
            <?php echo form_input('contentId', "$stick->contentId", 'id="contentId" class="form-control" style="visibility: hidden"'); ?>

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <?php
                

                ?>
                <input type="submit" value="upload" class="btn btn-primary" style="background-color:#1584ab"/>
                </form>
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
                <img src='../uploads/' id="imgPathDelete" name="image" width=400px>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <?php
                echo form_submit('submit', 'Delete Content', 'class="btn btn-primary" style="background-color:#1584ab"');

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
        user_id.innerHTML = my_user_id
        top_user_id.innerHTML  = "Content Id: " + my_user_id

        document.getElementById("imgPath").src="../uploads/"+$(this).data('images')

        $('input[name=contentId]').val(my_user_id);

        $('input[name=title]').val($(this).data('title'));
        $('input[name=content_type]').val($(this).data('content_type'));
        $('input[name=description]').val($(this).data('description'));
        $('input[name=rating]').val($(this).data('rating'));
        $('input[name=release_date]').val($(this).data('release_date'));
        $('input[name=ranking]').val($(this).data('ranking'));
        $('input[name=studio_id]').val($(this).data('studio_id'));
        $('input[name=links]').val($(this).data('links'));
        $('input[name=duration]').val($(this).data('duration'));
        $('input[name=ep_number]').val($(this).data('ep_number'));

        
    });

    $(document).on("click", ".remove", function () {
        var my_user_id = $(this).data('id');
        var top_user_id =document.getElementById('user_id_top_delete')
        var top_user_name =document.getElementById('user_name_top_delete')
        var user_id =document.getElementById('userid_delete')
        document.getElementById("imgPathDelete").src=$(this).data('images')

        //alert('<?php //echo array_search('6', $users)?>')
        user_id.value = my_user_id
        top_user_id.innerHTML  = "Content Id: " + my_user_id
        top_user_name.innerHTML  = "Title: " + $(this).data('title')
    });
    

    const searchInput = document.getElementById("search-bar");
const searchResults = document.getElementById("search-results");
const resultsContainer = document.getElementById("results-container");
const selectedItems = document.getElementById("selected-items");
const genresInput = document.getElementById("genres");

let items = [
  <?php foreach($genre as $gen){ ?>
    {id: <?php echo $gen->genre_id; ?>, name: <?php echo "\"$gen->name\""; ?>},
  <?php }?>
];

let selectedItemsArray = [];

searchInput.addEventListener("input", function() {
  let filteredItems = items.filter(function(item) {
    return item.name.toLowerCase().includes(searchInput.value.toLowerCase());
  });
  
  if (filteredItems.length > 0) {
    resultsContainer.innerHTML = "";
    filteredItems.forEach(function(item) {
      let div = document.createElement("div");
      div.innerText = item.name;
      div.addEventListener("click", function() {
        searchInput.value = "";
        searchResults.style.display = "none";
        selectedItemsArray.push(item.id);
        renderSelectedItems();
        renderGenresInput();
      });
      div.addEventListener("mouseenter", function() {
		div.classList.add("result-highlight");

		div.style.background = "#ddd";
		div.style.color = "black";

      });
      div.addEventListener("mouseleave", function() {
        div.classList.remove("result-highlight");
		div.style.background = "";
		div.style.color = "";

      });
      resultsContainer.appendChild(div);
    });
    searchResults.style.display = "block";
  } else {
    searchResults.style.display = "none";
  }
});

function renderSelectedItems() {
  selectedItems.innerHTML = "";
  selectedItemsArray.forEach(function(id) {
    let div = document.createElement("p");
    div.style.border = "1px solid red";
    div.style.width = "300px";
    div.innerText = items.find(item => item.id === id).name;
    let x = document.createElement("span");
    x.innerHTML = "&times;";
    x.classList.add("remove-item");
    x.addEventListener("click", function() {
      selectedItemsArray.splice(selectedItemsArray.indexOf(id), 1);
      renderSelectedItems();
      renderGenresInput();
    });
    div.appendChild(x);
    selectedItems.appendChild(div);
  });
}

function renderGenresInput() {
  genresInput.value = selectedItemsArray.join(",");
}


//staff and characters search


// Define the data for staff and characters


const characters = [
  <?php foreach($character as $gen){ ?>
    {id: <?php echo $gen->character_id; ?>, name: <?php echo "\"$gen->first_name $gen->last_name\""; ?>},
  <?php }?>
];


const staffInput = document.querySelector('#staff');
const charInput = document.querySelector('#characters');
let staffSelectedItems = [];
let charSelectedItems = [];
let selectedStaffIds = [];
let selectedCharIds = [];

const staffSearchBar = document.querySelector('#search-bar-staff');
const staffResultsContainer = document.querySelector('#results-container-staff');
const staffSelectedItemsContainer = document.querySelector('#selected-items-staff');


const charSearchBar = document.querySelector('#search-bar-char');
const charResultsContainer = document.querySelector('#results-container-character');

staffSearchBar.addEventListener('input', handleStaffSearchInput);
charSearchBar.addEventListener('input', handleCharSearchInput);

function handleStaffSearchInput() {
  const inputValue = this.value.toLowerCase();

  const filteredStaff = staff.filter(item => item.name.toLowerCase().includes(inputValue));

  if (filteredStaff.length > 0) {
    staffResultsContainer.innerHTML = '';
    filteredStaff.forEach(item => {
      const resultDiv = document.createElement('div');
      resultDiv.classList.add('result');
      resultDiv.innerText = item.name;
      resultDiv.addEventListener('click', () => handleStaffResultClick(item));
      staffResultsContainer.appendChild(resultDiv);
    });
    staffResultsContainer.classList.remove('hidden');
  } else {
    staffResultsContainer.classList.add('hidden');
  }
}

function handleCharSearchInput() {
  const inputValue = this.value.toLowerCase();

  const filteredCharacters = characters.filter(item => item.name.toLowerCase().includes(inputValue));

  if (filteredCharacters.length > 0) {
    charResultsContainer.innerHTML = '';
    filteredCharacters.forEach(item => {
      const resultDiv = document.createElement('div');
      resultDiv.classList.add('result');
      resultDiv.innerText = item.name;
      resultDiv.addEventListener('click', () => handleCharResultClick(item));
      charResultsContainer.appendChild(resultDiv);
    });
    charResultsContainer.classList.remove('hidden');
  } else {
    charResultsContainer.classList.add('hidden');
  }
}

function handleStaffResultClick(item) {
  staffSearchBar.value = item.name;
  staffSearchBar.dataset.selectedValue = item.name;
  staffResultsContainer.classList.add('hidden');
}

function handleCharResultClick(item) {
  charSearchBar.value = item.name;
  charSearchBar.dataset.selectedValue = item.name;
  charResultsContainer.classList.add('hidden');
}



function handleSelectedItemsButtonClick() {
  const staffSelectedValue = staffSearchBar.dataset.selectedValue;
  const staffSelectedItemId = staff.find(item => item.name === staffSelectedValue)?.id;

  const charSelectedValue = charSearchBar.dataset.selectedValue;
  const charSelectedItemId = characters.find(item => item.name === charSelectedValue)?.id;

  let staffSelectedItem = '';
  if (staffSelectedItemId === undefined) {
    staffSelectedItems.push(0);
    staffSelectedItem = '0';
  } else {
    staffSelectedItems.push(staffSelectedItemId);
    staffSelectedItem = staffSelectedValue;
  }

  let charSelectedItem = '';
  if (charSelectedItemId === undefined) {
    charSelectedItems.push(0);
    charSelectedItem = '0';
  } else {
    charSelectedItems.push(charSelectedItemId);
    charSelectedItem = charSelectedValue;
  }

  const staffInput = document.getElementById('staff');
  const charInput = document.getElementById('characters');

  staffInput.value = staffSelectedItems.join(',');
  charInput.value = charSelectedItems.join(',');

  staffSearchBar.value = '';
  staffSearchBar.dataset.selectedValue = '';
  charSearchBar.value = '';
  charSearchBar.dataset.selectedValue = '';

  const selectedItemsContainer = document.getElementById('selected-items-staff');
  selectedItemsContainer.innerHTML = '';

  for (let i = 0; i < staffSelectedItems.length; i++) {
    const staffId = staffSelectedItems[i];
    const charId = charSelectedItems[i];
    const staffName = staff.find(item => item.id === staffId)?.name;
    const charName = characters.find(item => item.id === charId)?.name;

    const staffDisplayValue = staffName ? staffName : 'No character Selected';
    const charDisplayValue = charName ? charName : 'No character Selected';

    const itemDiv = document.createElement('div');
    itemDiv.innerHTML = `${staffDisplayValue} / ${charDisplayValue} <span class="remove-item" onclick="removeSelectedItem(this)">x</span>`;
    selectedItemsContainer.appendChild(itemDiv);
  }
}


function removeSelectedItem(item) {
  const selectedItemsContainer = document.getElementById('selected-items-staff');
  const itemDiv = item.parentElement;
  const index = Array.prototype.indexOf.call(selectedItemsContainer.children, itemDiv);

  if (index !== -1) {
    staffSelectedItems.splice(index, 1);
    charSelectedItems.splice(index, 1);
    selectedItemsContainer.removeChild(itemDiv);

    const staffInput = document.getElementById('staff');
    const charInput = document.getElementById('characters');

    staffInput.value = staffSelectedItems.join(',');
    charInput.value = charSelectedItems.join(',');

  }
}








const selectedItemsButton = document.querySelector('#selected-items-button');
selectedItemsButton.addEventListener('click', handleSelectedItemsButtonClick);




//prevent form from submitting

const form = document.getElementById('form_add_img');
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // prevent form submission
    const submitButton = event.submitter;
    if (submitButton.value === 'show-item') {
      // do not submit the form if the delete button was clicked
      return false;
    }
    // otherwise, allow the form submission
    this.submit();
  });

</script>
<?php
$this->load->view('login/insideheader/bottom');
?>