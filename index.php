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
  
    // Insert data into the 'students' table
    $insert_query = "INSERT INTO students (first_name, last_name, date_registered) VALUES ('$first_name', '$last_name', '$date_registered')";
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
$query = "SELECT id, first_name, last_name, date_registered FROM students";
$result = mysqli_query($connect, $query);

// (2)
// Logic for displaying data
if (mysqli_num_rows($result) > 0) {
  while($data = mysqli_fetch_assoc($result)) {
    echo "id: " . $data["id"]. " - Name: " . $data["first_name"]. " " . $data["last_name"]. " " . $data["date_registered"]. "<br>";
  }
} else {
  echo "0 results";
}


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

  <input type="submit" value="Submit">
</form>

</body>
</html>