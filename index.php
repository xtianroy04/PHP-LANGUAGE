<?php
                                           // Configuration //
$servername = "localhost";
$username = "root";
$password = "";
$database = "php";

// Sa pag connect
$connect = new mysqli($servername, $username, $password, $database);
if (!$connect) {
  die("Connection failed: " . mysqli_connect_error());
}

//practice

// ________----------------------------------CREATE DATA____________---------------------------------//
                                        // Create Data (1)

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_registered = $_POST["date_registered"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
  
    // Insert data into the 'students' table
    $insert_query = "INSERT INTO students 
    (
        first_name, 
        last_name, 
        date_registered, 
        address,
        phone,
        email
    ) VALUES 
    (
        '$first_name', 
        '$last_name', 
        '$date_registered', 
        '$address', 
        '$phone',
        '$email'
    )";

    if (mysqli_query($connect, $insert_query)) {
    // message kung nahuman na og create ang data
      echo "Record added successfully";
    //   Route kung aha dapit siya mo balik human ma create and data
      header("location: /exam-Mabilin-Christian_Roy/index.php");
    } else {
      echo "Error adding record: " . mysqli_error($connect);
    }
  }

  // ________----------------------------------READ DATA____________---------------------------------//
                                        // get Data from database (2)
// Query sa daan ang data kung unsay kwaon
// 1. Query first
// 2. before getting the data
// (1)
$query = "SELECT id, first_name, last_name, date_registered, address, phone, email FROM students";
$result = mysqli_query($connect, $query);

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
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  First Name: <input type="text" name="first_name" required><br>
  Last Name: <input type="text" name="last_name" required><br>
  Date Registered: <input type="date" name="date_registered" required><br>
  address: <input type="text" name="address" required><br>
  phone: <input type="text" name="phone" required><br>
  email: <input type="text" name="email" required><br>

  <input type="submit" value="Submit">
</form>

</body>
</html>

