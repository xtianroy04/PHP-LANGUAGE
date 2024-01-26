<?php
// Importing the all file by putting require or include
require('configuration.php');
include('create.php');
include('search.php');


$result = mysqli_query($connect, $query);

// Logic for displaying data
echo "<h1>DISPLAY DATA</h1>";

// Search form
echo "<form method='get' action='' class='search-form'>

        <label for='search' class='search-label'></label>

        <div class='search-container'>
          <input type='text' name='search' id='search' value='$search' class='search-input'>
          <button type='submit' class='search-button'>
            <img src='path/to/search-icon.png' alt='Search'>
          </button>
        </div>
      </form>";

// sa search button center japun hahaha

echo "
<style>

  .search-container {
    display: flex;
    align-items: center;
  }

  .search-input {
    padding: 10px;
    border: 2px solid #3498db;
  }

  .search-button {
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    border: none;
    cursor: pointer;
    margin-bottom: 9px;
    border-bottom-right-radius: 15px;
  }

  .search-button img {
    width: 80px; 
    height: 20px; 

  }
</style>
";



echo "<table border='1'>";
echo "<tr>
        <th hidden>ID</th>
        <th>Name</th>
        <th>Date Registered</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Action</th>
     </tr>";

if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td hidden>" . $data["id"] . "</td>";
        echo "<td>" . $data["first_name"] . " " . $data["last_name"] . "</td>";
        echo "<td>" . $data["date_registered"] . "</td>";
        echo "<td>" . $data["address"] . "</td>";
        echo "<td>" . $data["phone"] . "</td>";
        echo "<td>" . $data["email"] . "</td>";
        echo "<td>
                <form action='delete.php' method='post'>
                    <input type='hidden' name='delete_id' value='". $data["id"]."'>
                    <button type='submit' style='margin-top: 15px; background-color: red;' value='Delete'>Delete</button>
                </form> 
                <button style='margin-top: 15px; background-color: blue;' onclick=\"window.location.href='/php/update.php?id=" . $data['id'] . "'\">Update</button>
              </td>";   
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>0 results</td></tr>";
}

echo "</table>";

// Importanti para ma close
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Language</title>
  <link rel="stylesheet" href="style.css">
  <style>
    h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}
  </style>
</head>
<body>

  <main class="table">
    <section class="table_header">
  <h1>Insert Data</h1>
  </section>
  <button onclick="window.location.href='/php/index.php'">Reload</button>
  <section class="table_body">
    <table>
      <thead>
      <tr>
    <th>First Name:</th>
    <th>Last Name:</th>
    <th>Address:</th>
    <th>Phone:</th>
    <th>Email:</th>
  </tr>
  <tr>
    <form method="post" action="create.php">
      <td><input type="text" name="first_name" required></td>
      <td><input type="text" name="last_name" required></td>
      <td><input type="text" name="address" required></td>
      <td><input type="text" name="phone" required></td>
      <td><input type="email" name="email" required></td>
      <td><input type="submit" value="Submit"></td>
    </form>
  </tr>
        <!-- <tr>

  <form method="post" action="create.php">
    First Name: <input type="text" name="first_name" required><br>
    Last Name: <input type="text" name="last_name" required><br>
    Address: <input type="text" name="address" required><br>
    Phone: <input type="text" name="phone" required><br>
    Email: <input type="email" name="email" required><br>
    <button onclick="window.location.href='/php/index.php'">Reload</button>

    <input type="submit" value="Submit">
    </tr> -->
    </thead>
    </table>
  </form>


  </section>
</main> 
</body>
</html>


