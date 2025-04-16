<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "dictionary"); // Added the database name here

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if (isset($_POST['Submit'])) {
    $id = $_POST['Text3'];
    $data1 = $_POST['Text1'];
    $data2 = $_POST['Text2'];

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "UPDATE t1 SET n1 = ?, c1 = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $data1, $data2, $id); // "ssi" means two strings and one integer

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Term</title>
    <link rel="shortcut icon" href="../imgs/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?php
    include './includes/bootstrap.php';
    include './includes/header.php';
    include './includes/nav.php';
    ?>
</body>

</html>