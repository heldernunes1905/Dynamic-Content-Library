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
<style>
      .search-container {
  position: relative;
}

.search-results {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1;
  background-color: #fff;
  border: 1px solid #ddd;
  border-top: none;
  max-height: 200px;
  overflow-y: auto;
  width: 100%;
}

.result-highlight {
  background-color: #ddd;
}

#selected-items {
  margin-top: 10px;
  font-size: 16px;
}



    </style>



<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
        
<?php 
$idpage = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if($idpage != "add_image" && $idpage != "do_upload"){
    echo $error;    
}

?>

      <div id="main">
        <div id="login">
            <h2 style="color:white;">Create Content Form</h2>
            <p id="error-msg" style="display: none; color: red;">Please fill in all fields.</p>
            <?php echo "<div class='error_msg'>";
    echo validation_errors();
    echo "</div>";?>
     <form action="do_upload" method="post" id="form_add_img">

            <hr />
      
    <div class="row">
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Title:</label>
        </div>
        <div class="col-sm-8"  >
        <input type="text" name="title" id="title" />

    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Content_type:</label>
        </div>
        <div class="col-sm-8"  >
        <select name="content_type" id="content_type">
          <option value="movie">Movie</option>
          <option value="show">TV Show</option> 
          <option value="book">Book</option>
          <option value="game">Game</option>
      </select>
    </div>
    </div>
    </div>

    <div class="col-sm-3"  >
    <div class="row">
        
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Description:</label>
        </div>
        <div class="col-sm-8"  >
          <input type="text" name="description" id="description"/>

        </div>
    </div>
    </div>
    

    
    <div class="col-sm-3"  >
    <div class="row">
        <div class="col-sm-4"  >
            <label for="message-text" class="col-form-label">Image:</label>
        </div>
        <div class="col-sm-8"  >
        <input type="file" name="userfile" size="20" />
           </div>
    </div>
    </div>

    <div class="col-sm-3"  >
    <div class="row">
        <div class="col-sm-4"  >
            <label for="message-text" class="col-form-label">Rating:</label>
        </div>
        <div class="col-sm-8"  >
        <input type="number" name="rating" id="rating"/>
        
           </div>
    </div>
    </div>

    <div class="col-sm-3"  >
      <div class="row">
        <div class="col-sm-4"  >
          <label for="message-text" class="col-form-label">Release Date:</label>
        </div>
        <div class="col-sm-8"  >
          <input type="date" name="release_date" />
        </div>
      </div>
    </div>

    <div class="col-sm-3"  >
      <div class="row">
        <div class="col-sm-4"  >
          <label for="message-text" class="col-form-label">Ranking:</label>
        </div>
        <div class="col-sm-8"  >
        <input type="number" name="ranking" id="raking"/>
        </div>
      </div>
    </div>


    <div class="col-sm-3"  >
      <div class="row">
        <div class="col-sm-4"  >
          <label for="message-text" class="col-form-label">Studio:</label>
        </div>
        <div class="col-sm-8"  >
          <div>
              <input list="studio_id" name="studio_id" id="studio"/>
              <datalist id="studio_id">
                  <?php 
                      foreach($studios as $stu){?>
                          <option name="" value="<?php echo $stu->first_name.' '; echo $stu->last_name; ?>"></option>
                      <?php }
                  ?>
              </datalist>
          </div>
        </div>
      </div>
    </div>


    

    <div class="col-sm-3"  >
      <div class="row">
        <div class="col-sm-4"  >
          <label for="message-text" class="col-form-label">Link:</label>
        </div>
        <div class="col-sm-8"  >
          <input type="text" name="links" id="link"/>
        </div>
      </div>
    </div>

    <div class="col-sm-3"  >
      <div class="row">
        <div class="col-sm-4"  >
          <label for="message-text" class="col-form-label">Duration:</label>
        </div>
        <div class="col-sm-8"  >
          <input type="number" name="duration" id="duration"/>

        </div>
      </div>
    </div>

    <div class="col-sm-6"  >
      <div class="row">
        <div class="col-sm-2"  >
          <label for="message-text" class="col-form-label">Ep number:</label>
        </div>
        <div class="col-sm-10"  >
          <input type="number" name="ep_number" id="epnumber"/>

        </div>
      </div>
    </div>




    <div class="col-sm-3"  >
      <div class="row">
        <div class="col-sm-4"  >
          <label for="message-text" class="col-form-label">Genre:</label>
        </div>
        <div class="col-sm-8"  >
        <div class="search-container">
          <input id="search-bar" type="text" placeholder="Search...">
          <div id="search-results" class="search-results" style="display:none">
            <div id="results-container"></div>
          </div>
        </div>
        <div id="selected-items"></div>

        <input type="text" name="genres" id="genres" style="display:none"/>
        </div>
      </div>
    </div>


    <div class="col-sm-3"  >
      <div class="row">
        <div class="col-sm-4"  >
          <label for="message-text" class="col-form-label">Members:</label>
        </div>
        <div class="col-sm-8"  >
          
        <div class="search-container">
          <input id="search-bar-staff" type="text" placeholder="Search...">
          <div id="search-results-staff" class="search-results-staff">
            <div id="results-container-staff" style="color:white"></div>
          </div>
          <input id="search-bar-char" type="text" placeholder="Search...">
          <div id="search-results-char" class="search-results-staff">
            <div id="results-container-character" style="color:white"></div>
          </div>
        </div>

        <div id="selected-items-staff"></div>

        <input type="text" name="staff" id="staff" style="display:none"/>
        <input type="text" name="characters" id="characters" style="display:none"/>

        <button id="selected-items-button" value="show-item">Show Selected Items</button>
        </div>
      </div>
    </div>

    </div>
    <hr>
    <input type="submit" class="btn btn-primary" id="submit-btn" value="Create content" />
    </form>
    </div>
    <div class="col-sm-1" >

      </div>
  </div>
  </div>

  </div>







<?php
//test to see if user selected image
/*$test = $_FILES['userfile']['name'];
$expected_result = 0;
$test_name = 'see if user selected an image';
echo $this->unit->run($test, $expected_result, $test_name);*/
?>
<script>
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

  const filteredCharacters = character.filter(item => item.name.toLowerCase().includes(inputValue));

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
  const charSelectedItemId = character.find(item => item.name === charSelectedValue)?.id;

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
    const charName = character.find(item => item.id === charId)?.name;

    const staffDisplayValue = staffName ? staffName : 'No character Selected';
    const charDisplayValue = charName ? charName : 'No character Selected';

    const itemDiv = document.createElement('div');
    itemDiv.innerHTML = `<span style="color:white">${staffDisplayValue} / ${charDisplayValue}</span> <span style="color:white" class="remove-item" onclick="removeSelectedItem(this)">x</span>`;
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







const submitBtn = document.getElementById('submit-btn');
const errorMsg = document.getElementById('error-msg');

submitBtn.addEventListener('click', (event) => {
  const title = document.getElementById('title');
  const description = document.getElementById('description');
  const rating = document.getElementById('rating');
  const ranking = document.getElementById('ranking');
  const studio = document.getElementById('studio');
  const link = document.getElementById('link');
  const duration = document.getElementById('duration');
  const epnumber = document.getElementById('epnumber');


  if (title.value === ''  || description.value === '' || rating.value === '' || ranking.value === '' || studio.value === '' || link.value === '' || duration.value === '' || epnumber.value === '') {
    event.preventDefault(); // prevent form submission
    if(title.value === ''  || description.value === '' || rating.value === '' || ranking.value === '' || studio.value === '' || link.value === '' || duration.value === '' || epnumber.value === ''){
      errorMsg.style.display = 'block';
    }
  } else {
    errorMsg.style.display = 'none';
    // continue with form submission or other actions
  }
});
</script>
<?php
$this->load->view('login/insideheader/bottom');
?>
