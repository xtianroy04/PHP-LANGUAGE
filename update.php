<?php
require('configuration.php');

// Make varibles and put it to blank
$id = "";
$first_name = "";
$last_name = "";
$date_registered = "";
$address = "";
$phone = "";
$email = "";
// COde for update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';
    $first_name = $_POST['edit_first_name'] ?? '';
    $last_name = $_POST['edit_last_name'] ?? '';
    $date_registered = $_POST['edit_date_registered'] ?? '';
    $address = $_POST['edit_address'] ?? '';
    $phone = $_POST['edit_phone'] ?? '';
    $email = $_POST['edit_email'] ?? '';

    $update_query = mysqli_prepare($connect, "UPDATE students SET
        first_name = ?,
        last_name = ?,
        date_registered = ?,
        address = ?,
        phone = ?,
        email = ?
    WHERE id = ?");

    mysqli_stmt_bind_param($update_query, 'ssssssi', $first_name, $last_name, $date_registered, $address, $phone, $email, $id);

    if (mysqli_stmt_execute($update_query)) {
        header("location: /php/index.php");
        exit; 
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }

    mysqli_stmt_close($update_query);
}
// COde for showing the data to edit it
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $select_query = mysqli_prepare($connect, "SELECT * FROM students WHERE id = ?");
    mysqli_stmt_bind_param($select_query, 'i', $id);
    mysqli_stmt_execute($select_query);
    $result = mysqli_stmt_get_result($select_query);

    if ($row = mysqli_fetch_assoc($result)) {
        extract($row); 
    }

    mysqli_stmt_close($select_query);
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Update language</title>
</head>
<body>

<h2>Update Data</h2>
<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?= $id ?>">
    First Name: <input type="text" name="edit_first_name" value="<?= $first_name ?>" required><br>
    Last Name: <input type="text" name="edit_last_name" value="<?= $last_name ?>" required><br>
    Date Registered: <input type="date" name="edit_date_registered" value="<?= $date_registered ?>" required><br>
    Address: <input type="text" name="edit_address" value="<?= $address ?>" required><br>
    Phone: <input type="text" name="edit_phone" value="<?= $phone ?>" required><br>
    Email: <input type="email" name="edit_email" value="<?= $email ?>" required><br>

    <input type="submit" value="Update">
</form>

</body>
</html>
