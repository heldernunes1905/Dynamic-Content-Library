<?php

$uri = $_SERVER['REQUEST_URI']; 
$profile_id = str_replace("/CodeIgniter-3.1.10/index.php/profile/","",$uri);
$profile_id = strtok($profile_id, '/');
if (isset($this->session->userdata['logged_in'])) {
    $user_id = ($this->session->userdata['logged_in']['user_id']);
    $username = ($this->session->userdata['logged_in']['username']);
    $email = ($this->session->userdata['logged_in']['email']);
    $first = ($this->session->userdata['logged_in']['first_name']);
    $last = ($this->session->userdata['logged_in']['last_name']);
    $this->load->view('login/insideheader/header');

} else {
    $this->load->view('login/insideheader/headernotlog');
    $user_id = 0;
}
 if(!empty($checkuserblocked)|| !isset($this->session->userdata['logged_in'])){
  $checkuserblocked = array();

if(($key = array_search($user_id, $checkuserblocked)) !== false){
}else{
?>

<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-8"  >
      
      </div>
      <?php if(isset($this->session->userdata['logged_in'])){?>
        <div class="col-sm-2" data-toggle="modal" data-target="#LeaveRecommendation" style="color:white">Leave Recommendation</div>
      <?php }else{?>
        <div class="col-sm-2"></div>
      <?php }?>

    <div class="col-sm-1" ></div>
</div>
</div>
   
<div class="container-fluid no-padding">
    <div id="my-row" class="row">
      <div class="col-sm-1" >
      </div>
      <div class="col-sm-10"  >
      <div class="row">

      <?php foreach($userrecommendation as $ur){
        ?> 
        <div class="col-sm-2"  >
        <a href="<?= base_url() ?>index.php/display/<?= $ur->oldid ?>">
        <?php
            $oldimage = $ur->oldimage;
            $title = "Chosen";
            echo "<img src='../../../uploads/$oldimage' class='contentImage' id='myImg' alt='$title' width='10%' ><br>"; 
            echo $ur->oldtitle;

        ?>
        </a>
        </div>
        <div class="col-sm-2"  >
        <a href="<?= base_url() ?>index.php/display/<?= $ur->newid ?>">

        <?php
            $newimage = $ur->newimage;
            $title = "Recommended";
            echo "<img src='../../../uploads/$newimage' class='contentImage' id='myImg' alt='$title' width='10%' ><br>"; 
            echo $ur->newtitle;

            ?>
                </a>
    
        </div>
        

        
        <?php

        if(isset($this->session->userdata['logged_in']) && $user_id==$profile_id){?>
        <div class="col-sm-4"  ><?php
            echo "<p>".$ur->description."</p>";
        ?></div>
        <div class="col-sm-2"  ><?php
            echo "<p>".date("d-m-Y H:i:s", strtotime($ur->date))."</p>";
        ?></div>
        <div class="col-sm-2"  >
        <button type="button" class="btn btn-success" onclick='confirmRemoveComment(<?php echo $ur->recommend_id?>)'>Remove Recommendation</button>
        </div>
     <?php }else{?>
        <div class="col-sm-6"  ><?php
            echo "<p>".$ur->description."</p>";
        ?></div>
        <div class="col-sm-2"  ><?php
            echo "<p>".$ur->date."</p>";
        ?></div>
     <?php }
      }?>

    </div>
    </div>

    <div class="col-sm-1" ></div>
</div>
</div>


<div class="modal fade" id="LeaveRecommendation" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		    <h4 class="modal-title">LEAVE Recommendation</h4>

          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        
        
        

          <?php echo form_open_multipart('addrecom');?>
          <div>
          <select id="select-array" name="select-array">
              <option value="movie">Movie</option>
              <option value="show">Show</option>
              <option value="game">Game</option>
              <option value="book">Book</option>
            </select>
            <input type="text" id="search-bar-1" name="search-bar-1" placeholder="Search...">
            <div class="search-results" id="search-results-1">
              <div class="search-results-container" id="search-results-container-1"></div>
            </div>

            <input type="text" id="search-bar-2"  name="search-bar-2" placeholder="Search..." style="display:none">
            <div class="search-results" id="search-results-2">
              <div class="search-results-container" id="search-results-container-2"></div>
            </div>
          </div>

          <input type="text" id="input-1" name="input-1" placeholder="ID of first search"  style="display:none">
        <input type="text" id="input-2" name="input-2" placeholder="ID of second search" style="display:none">

        <textarea id="description" name="description" rows="4" cols="50" placeholder="Description..." ></textarea>

        <p id="error-msg" style="display: none; color: red;">Please fill in all fields.</p>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="submit-btn" class="btn btn-primary">Submit</button>

          <?php 
          echo form_close(); ?>
              </div>
      </div>
      
    </div>
  </div>

<script>
function confirmRemoveComment(recommend_id) {
    var response = confirm("Do you want to remove recommendation:");
    if (response) {
      window.location="<?= base_url() ?>index.php/removeuserrecommendation/" + recommend_id
    }
}




function search(inputId, resultsId, containerId, resultsLabelId) {
  const input = document.getElementById(inputId).value.toLowerCase();
  const filteredItems = currentArray.filter(item => item.name.toLowerCase().includes(input));
  displayResults(inputId, resultsId, containerId, filteredItems);

  const searchResults = document.getElementById(resultsId);
  if (inputId === 'search-bar-1' && input === '') {
    searchResults.style.display = 'none';
    return;
  }
  if (inputId === 'search-bar-2' && input === '') {
    searchResults.style.display = 'none';
    return;
  }
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
          document.getElementById("search-bar-2").style.display = "none"; 
          document.getElementById("input-1").value = item.id;
          document.getElementById("search-bar-2").style.display = "block";
          
        } else if (inputId === "search-bar-2") {
          document.getElementById("input-2").value = item.id;
        }
      });
      div.addEventListener("mouseenter", function() {
        div.classList.add("result-highlight");
      });
      div.addEventListener("mouseleave", function() {
        div.classList.remove("result-highlight");
      });
      resultsContainer.appendChild(div);
    });
    searchResults.style.display = "block";
  } else {
    searchResults.style.display = "none";
  }
}

function hideSearchBar2() {
  document.getElementById("search-bar-2").style.display = "none";
  document.getElementById("search-bar-2").value="";
}

document.getElementById("search-bar-1").addEventListener("input", function() {
  search("search-bar-1", "search-results-1", "search-results-container-1");
  hideSearchBar2(); 
});

document.getElementById("search-bar-2").addEventListener("input", function() {
  search("search-bar-2", "search-results-2", "search-results-container-2");
});




function handleSelectChange() {
  if (document.getElementById("search-bar-1-top").value === "") {
    const selectedValue = this.value;
    if (selectedValue === "movie") {
      currentArray = movie;
    } else if (selectedValue === "show") {
      currentArray = show;
    }else if (selectedValue === "game") {
      currentArray = game;
    }else if (selectedValue === "book") {
      currentArray = book;
    }else if (selectedValue === "staff") {
      currentArray = staff;
    }else if (selectedValue === "character") {
      currentArray = character;
    }
	
  } else {
    // Reset select value to current array
    const selectElement = document.getElementById("select-array");
    const currentArrayName = currentArray === movie ? "movie" : "show";
    selectElement.value = currentArrayName;
  }
}

document.getElementById("select-array").addEventListener("change", function() {
  if (document.getElementById("search-bar-1").value === "") {
    handleSelectChange.call(this);
  } else {
    this.value = currentArray === movie ? "movie" :
             currentArray === show ? "show" :
             currentArray === game ? "game" :
             currentArray === book ? "book" :
			      currentArray === staff ? "staff" :
             "character";
  }
});








document.addEventListener("click", function(event) {
  if (!event.target.closest(".search-container")) {
    const searchResults = document.querySelectorAll(".search-results");
    searchResults.forEach(result => {
      result.style.display = "none";
    });
  }
});





const submitBtn = document.getElementById('submit-btn');
const errorMsg = document.getElementById('error-msg');

submitBtn.addEventListener('click', (event) => {
  const search1Input = document.getElementById('search-bar-1');
  const search2Input = document.getElementById('search-bar-2');
  const descriptionInput = document.getElementById('description');

  if (search1Input.value === '' || search2Input.value === '' || descriptionInput.value === '') {
    event.preventDefault(); // prevent form submission
    if(search1Input.value === '' && search2Input.value === '' && descriptionInput.value === ''){
      errorMsg.style.display = 'block';

    }else if(search1Input.value === ''){
      errorMsg.style.display = 'block';
      errorMsg.innerHTML = "First content Empty";

    }else if(search2Input.value === ''){
      errorMsg.style.display = 'block';
      errorMsg.innerHTML = "Second content Empty";

    }else if(descriptionInput.value === ''){
      errorMsg.style.display = 'block';
      errorMsg.innerHTML = "Description Empty";
    
    }else{
      errorMsg.style.display = 'block';
      
    }
  } else {
    errorMsg.style.display = 'none';
    // continue with form submission or other actions
  }
});





</script>

  <?php
}
}
$this->load->view('header/bottom');
?>