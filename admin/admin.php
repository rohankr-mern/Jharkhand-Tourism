<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Jharkhand Tourism</title>
  <link rel="stylesheet" href="./admin.css">
</head>
<body>
<h1>Admin Panel</h1>

<div class="tabs">
  <button onclick="showSection('destinations')">Destinations</button>
  <button onclick="showSection('shops')">Shops</button>
  <button onclick="showSection('packages')">Packages</button>
  <button onclick="showSection('images')">Images</button>
</div>

<!-- DESTINATIONS -->
<div id="destinations" class="section">
  <h2>Destinations</h2>
  <form action="save_destination.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="destId">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="location" placeholder="Location" required>
    <textarea name="description" placeholder="Description"></textarea>
    <input type="file" name="image">
    <button onclick="openPopup" type="submit" value="submit" name="send">Save</button>

<div id="popup" class="popup">
  <div class="popup-content">
    <h2>Saved Successfully!</h2>
    <p>Your data has been saved.</p>
    <button onclick="closePopup()">OK</button>
  </div>
</div>
    
  </form>
  <table><tbody id="destList"></tbody></table>
</div>

<!-- SHOPS -->
<div id="shops" class="section">
  <h2>Shops</h2>
  <form id="shopForm" action="save_shop.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="shopId">
    <input type="text" name="name" placeholder="Shop Name" required>
    <input type="text" name="category" placeholder="category">
    <textarea name="description" placeholder="Description"></textarea>
    <input type="number" name="price" placeholder="Price" required>
    <input type="file" name="image">
    <button onclick="openPopup()" type="submit" value="submit" name="send">Save</button>
  </form>
  <table><tbody id="shopList"></tbody></table>
</div>

<!-- PACKAGES -->
<div id="packages" class="section">
    <h2>Packages</h2>
  <!-- Package Title -->
   <form id="packagesForm" action="save_package.php" method="POST" enctype="multipart/form-data">
  <input type="text" name="title" placeholder="Enter package title" required><br><br>

  <!-- Duration -->
  <input type="text" name="duration" placeholder="Enter Duration e.g. 3 Days / 2 Nights"><br><br>

  <!-- Number of Destinations -->
  <input type="number" name="destinations_count" min="1" placeholder="Number of destination"><br><br>

  <!-- Destinations -->
  <div id="destinations-wrapper">
    <input type="text" name="destinations[]" placeholder="Destination name">
  </div>
  <button type="button" onclick="addDestination()">+ Add Destination</button><br><br>

  <!-- Highlights -->
  <div id="highlights-wrapper">
    <input type="text" name="highlights[]" placeholder="Highlight point">
  </div>
  <button type="button" onclick="addHighlight()">+ Add Highlight</button><br><br>

  <!-- Price -->
  <input type="number" name="price" placeholder="Enter price"><br><br>
   <!-- Image Upload -->
  <input type="file" name="image" accept="image/*"><br><br>
  <button type="submit" value="submit" name="send">Save</button>

</form>
</div>
  <table><tbody id="packList"></tbody></table>
</div>

<!-- SHOPS -->
<div id="images" class="section">
  <h2>Shops</h2>
  <form id="imgForm" action="save_image.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="image">
  <button type="submit" value="submit" name="send">Save</button>
  </form>
  <table><tbody id="imageList"></tbody></table>
</div>

<script src="admin.js"></script>
</body>
</html>