<?php

// Importing the configuration file by putting require or include
require('configuration.php');
include('create.php');

 
  // ________----------------------------------READ DATA____________---------------------------------//
                                        // get Data from database (2)
// Query sa daan ang data kung unsay kwaon
// 1. Query first
// 2. before getting the data
// (1)


// (2)
// Logic for displaying data
echo "<h1>DISPLAY DATA</h1>";
echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
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
          echo "<td>" . $data["id"] . "</td>";
          echo "<td>" . $data["first_name"] . " " . $data["last_name"] . "</td>";
          echo "<td>" . $data["date_registered"] . "</td>";
          echo "<td>" . $data["address"] . "</td>";
          echo "<td>" . $data["phone"] . "</td>";
          echo "<td>" . $data["email"] . "</td>";
          echo "<td>
                  <form action='delete.php' method='post'>
                      <input type='hidden' name='delete_id' value='". $data["id"]."'>
                      <button type='submit' value='Delete'>Delete</button>
                  </form>
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

