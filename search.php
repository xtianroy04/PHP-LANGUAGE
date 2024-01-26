<?php
    // Search functionality
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // QUERY TO DISPLAY THE DATA
    $query = "SELECT id, first_name, last_name, date_registered, address, phone, email FROM students";

    // Modify the query if a search term is provided
    if ($search) {
        $query .= " WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR email LIKE '%$search%'";
    }else{
    
    }
?>