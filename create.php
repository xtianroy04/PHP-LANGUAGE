<?php
// ________----------------------------------CREATE DATA____________---------------------------------//
                                        // Create Data (1)
                                        
// Importing the configuration file by putting require or include
require('configuration.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $date_registered = date("Y-m-d H:i:s");
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
    // Route kung aha dapit siya mo balik human ma create and data
      header("location: /php/index.php");
    } else {
      echo "Error adding record: " . mysqli_error($connect);
    }
  }
?>