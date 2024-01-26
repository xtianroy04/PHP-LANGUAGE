<?php
// Importing the all file by putting require or include
require('configuration.php');
include('create.php');
include('search.php');


$result = mysqli_query($connect, $query);

// Logic for displaying data
echo "<h1>DISPLAY DATA</h1>";

// Search form
echo "<form method='get' action=''>
        <label for='search'>Search:</label>
        <input type='text' name='search' id='search' value='$search'>
        <input type='submit' value='Search'>
      </form>";


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
  <title>Php language</title>
</head>
<body>
<button style='margin-top: 15px;' onclick="window.location.href='/php/index.php'">Reload</button>
<h2>Insert Data</h2>
<form method="post" action="create.php">
  First Name: <input type="text" name="first_name" required><br>
  Last Name: <input type="text" name="last_name" required><br>
  Date Registered: <input type="date" name="date_registered" required><br>
  address: <input type="text" name="address" required><br>
  phone: <input type="text" name="phone" required><br>
  email: <input type="email" name="email" required><br>

  <input type="submit" value="Submit">
</form>

</body>
</html>

