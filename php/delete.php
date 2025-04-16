<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "dictionary");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$msg = "";
if (isset($_POST['Submit'])) {
    $term = $_POST['term'];

    // Use a prepared statement to prevent SQL injection
    $sql = "DELETE FROM dictionary_terms WHERE term = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $term); // 'i' indicates the parameter is an integer

        if (mysqli_stmt_execute($stmt)) {
            // echo "Data deleted successfully!";
            //  header("Location: your_page.php"); //removed header
        } else {
            echo "Error deleting data: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}
if (isset($_GET['term'])) {
    $term = $_GET['term'];
    // Use a prepared statement to prevent SQL injection
    $sql = "DELETE FROM dictionary_terms WHERE term = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $term); // 's' indicates the parameter is a string

        if (mysqli_stmt_execute($stmt)) {
            header("Location: search.php?status=success&action=delete");
        } else {
            header("Location: search.php?status=error&error=" . urlencode(mysqli_error($conn)));
        }

        mysqli_stmt_close($stmt);
    } else {
        header("Location: search.php?status=error&error=" . urlencode(mysqli_error($conn)));
    }
}

// mysqli_close($conn); // removed mysqli_close
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Term</title>
    <link rel="shortcut icon" href="../imgs/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <?php
    include './includes/bootstrap.php';
    include './includes/header.php';
    include './includes/nav.php';
    ?>
    <section class="container py-5">
        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-3">Delete Term</h2>
            <form method="POST" action="">
                <div class="col-12">
                    <input type="text" name="term" class="form-control mb-3" placeholder="Enter the term to delete" required>
                </div>
                <div class="col-12">
                    <button type="submit" name="Submit" class="btn btn-danger w-100">Delete Term</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>