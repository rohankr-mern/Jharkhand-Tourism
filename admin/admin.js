// 🔁 Section Switch (Tabs)
function showSection(id) {
  document.querySelectorAll('.section').forEach(sec => {
    sec.style.display = 'none';
  });
  document.getElementById(id).style.display = 'block';
}

// Default open
showSection('destinations');


// ================= DESTINATIONS =================
document.getElementById("destForm").addEventListener("submit", function(e){
  e.preventDefault();

  const formData = new FormData(this);

  fetch("save_destination.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    alert("Destination Saved!");
    this.reset();
  })
  .catch(err => console.log(err));
});


// ================= SHOPS =================
document.getElementById("shopForm").addEventListener("submit", function(e){
  e.preventDefault();

  const formData = new FormData(this);

  fetch("save_shop.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    alert("Shop Saved!");
    this.reset();
  })
  .catch(err => console.log(err));
});


// ================= IMAGESS =================
document.getElementById("imgForm").addEventListener("submit", function(e){
  e.preventDefault();

  const formData = new FormData(this);

  fetch("save_image.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    alert("Image Saved!");
    this.reset();
  })
  .catch(err => console.log(err));
});



// ================= PACKAGES =================
document.getElementById("packagesForm").addEventListener("submit", function(e){
  e.preventDefault();

  const formData = new FormData(this);

  fetch("save_package.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.json())
  .then(data => {
    alert("Package Saved!");
    this.reset();
  })
  .catch(err => console.log(err));
});


// ================= ADD DYNAMIC FIELDS =================

// Add Destination Field
function addDestination() {
  const wrapper = document.getElementById("destinations-wrapper");
  const input = document.createElement("input");
  input.type = "text";
  input.name = "destinations[]";
  input.placeholder = "Destination name";
  wrapper.appendChild(input);
}

// Add Highlight Field
function addHighlight() {
  const wrapper = document.getElementById("highlights-wrapper");
  const input = document.createElement("input");
  input.type = "text";
  input.name = "highlights[]";
  input.placeholder = "Highlight point";
  wrapper.appendChild(input);
}


// admin.html js
  function addDestination() {
    let div = document.createElement("div");
    div.innerHTML = `<input type="text" name="destinations[]" placeholder="Destination name">`;
    document.getElementById("destinations-wrapper").appendChild(div);
  }

  function addHighlight() {
    let div = document.createElement("div");
    div.innerHTML = `<input type="text" name="highlights[]" placeholder="Highlight point">`;
    document.getElementById("highlights-wrapper").appendChild(div);
  }

//SAVED POPUP
function openPopup() {
  document.getElementById("popup").style.display = "block";
}

function closePopup() {
  document.getElementById("popup").style.display = "none";
}
window.onload = function(){
  var success = JSON.parse("<?php echo json_encode($success); ?>");
  if(success === true){
    openPopup();
  }
}