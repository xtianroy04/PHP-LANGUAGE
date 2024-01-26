<?php

require('configuration.php');

// ________----------------------------------DELETE DATA____________---------------------------------//
// Handle delete form
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $delete_id = $_POST["delete_id"];
  
    $delete_query = "DELETE FROM students WHERE id = $delete_id";
  
    if (mysqli_query($connect, $delete_query)) {
      // message kung nahuman na og create ang data
        echo "Record deleted successfully";
      // Route kung aha dapit siya mo balik human ma create and data
        header("location: /php/index.php");
      } else {
        echo "Error deleting record: " . mysqli_error($connect);
      }
    }
?>