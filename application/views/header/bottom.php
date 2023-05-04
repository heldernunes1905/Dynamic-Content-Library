</div>
<a href='<?=base_url()?>index.php/supportformuser'>Support Form</a>

</body>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}


const myDivs = document.querySelectorAll(".my-div");

myDivs.forEach(function(myDiv) {
  const imgContainer = myDiv.previousElementSibling;
  const img = imgContainer.querySelector("img");
  const caption = img.alt;
  const divContent = myDiv.querySelector(".div-content");
  let firstPosition = true;
  let savedPosition = { top: "", left: "", right: "" };

  imgContainer.addEventListener("mouseenter", function() {
    myDiv.style.display = "block";
    myDiv.style.top = `${imgContainer.offsetTop}px`;

    if (firstPosition) {
      const myDivRect = myDiv.getBoundingClientRect();
      const myDivWidth = myDivRect.width;
      const myDivRight = myDivRect.right;

      if (myDivRight > window.innerWidth) {
        savedPosition = {
          top: `${imgContainer.offsetTop}px`,
          left: `${imgContainer.offsetLeft - myDivWidth}px`,
          right: ""
        };
      } else {
        savedPosition = {
          top: `${imgContainer.offsetTop}px`,
          left: `${imgContainer.offsetLeft + imgContainer.offsetWidth}px`,
          right: ""
        };
      }

      firstPosition = false;
    }

    myDiv.style.top = savedPosition.top;
    myDiv.style.left = savedPosition.left;
    myDiv.style.right = savedPosition.right;
    
    divContent.textContent = caption;
  });

  myDiv.addEventListener("mouseenter", function() {
    myDiv.style.display = "block";
  });

  myDiv.addEventListener("mouseleave", function() {
    myDiv.style.display = "none";
  });

  imgContainer.addEventListener("mouseleave", function() {
    myDiv.style.display = "none";
  });
});



function toggleGenderOther() {
  var genderSelect = document.getElementById("gender");
  var genderOtherInput = document.getElementById("genderother");

  if (genderSelect.value == "other") {
    genderOtherInput.style.display = "block";
  } else {
    genderOtherInput.style.display = "none";
  }
}

function togglePasswordVisibility() {
  var passwordInput = document.getElementById("passworduser");
  var showPasswordCheckbox = document.getElementById("showPassword");

  if (showPasswordCheckbox.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
</script>
</html>