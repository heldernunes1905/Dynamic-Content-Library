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
      #search-bar-1 {
        position: relative;
      }

      #search-results-1 {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        border: 1px solid #ccc;
        background-color: #fff;
      }

      #search-results-1 .result {
        padding: 10px;
        cursor: pointer;
      }

      #search-results-1 .result:hover,
      #search-results-1 .result.highlight {
        background-color: #f2f2f2;
      }
    </style>

<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
        
      <div id="main">
        <div id="login">
            <h2 style="color:white;">Create Notification Form</h2>
            <p id="error-msg" style="display: none; color: red;">Please fill in all fields.</p>
            <?php echo "<div class='error_msg'>";
    echo validation_errors();
    echo "</div>";?>
     <?php
    

    echo form_open('add_not_db');
    ?>
            <hr />
      
    <div class="row">
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
         <?php echo form_label('Username: ');?>
         </div>
        <div class="col-sm-8"  >
        <div class="search-container">
        <input type="text" id="search-bar-1" name="search-bar-1" placeholder="Type here to search">
        <div id="search-bar-1">
            <div id="search-results-1" class="search-results">
            <div id="search-results-container-1"></div>
            </div>
        </div>
        </div>
        <input type="text" id="user_id" name="user_id" placeholder="ID of first search" value="0" style="display:none">
       
    </div>
    </div>
    </div>
    <div class="col-sm-3"  >
        <div class="row">
        <div class="col-sm-4"  >
        <label for="message-text" class="col-form-label">Title:</label>
        </div>
        <div class="col-sm-8"  >
            <?php             echo '<input type="text" name="title" id="title" />';
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
        <?php             echo "<input type='text' name='text' id='text' />";
 ?>
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

currentArray = users; // Default array


function search(inputId, resultsId, containerId, resultsLabelId) {
  const input = document.getElementById(inputId).value.toLowerCase();
  const filteredItems = currentArray.filter(item => item.name.toLowerCase().includes(input));
  displayResults(inputId, resultsId, containerId, filteredItems);

  const searchResults = document.getElementById(resultsId);
  
  
  searchResults.style.display = 'block';
}



function displayResults(inputId, resultsId, containerId, filteredItems, resultsLabelId) {
  const searchResults = document.getElementById(resultsId);
  const resultsContainer = searchResults.querySelector("#" + containerId);
  resultsContainer.innerHTML = "";
  if (filteredItems.length > 0) {
    filteredItems.forEach(item => {
      const div = document.createElement("div");
      div.innerText = item.name;
      div.addEventListener("click", function() {
        document.getElementById(inputId).value = item.name;
        searchResults.style.display = "none";
        
        // Update corresponding input field with the search bar ID
        if (inputId === "search-bar-1") {
          document.getElementById("user_id").value = item.id;
          
        } 
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
}


document.getElementById("search-bar-1").addEventListener("input", function() {
  search("search-bar-1", "search-results-1", "search-results-container-1");
});












document.addEventListener("click", function(event) {
  if (!event.target.closest(".search-container")) {
    const searchResults = document.querySelectorAll(".search-results");
    searchResults.forEach(result => {
      result.style.display = "none";
    });
  }
});





const submitBtn = document.getElementById('submitbtn');
const errorMsg = document.getElementById('error-msg');

submitBtn.addEventListener('click', (event) => {
  const search1Input = document.getElementById('user_id');
  const descriptionInput = document.getElementById('title');
  const textInput = document.getElementById('text');

  if (search1Input.value === '' || descriptionInput.value === '' || textInput.value === '') {
    event.preventDefault(); // prevent form submission
    errorMsg.style.display = 'block';
    
  } else {
    errorMsg.style.display = 'none';
    // continue with form submission or other actions
  }
});

    </script>
<?php
$this->load->view('login/insideheader/bottom');
?>