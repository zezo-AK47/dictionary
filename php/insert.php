<?php
// Enable detailed error reporting (for debugging)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "dictionary");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if (isset($_POST['Submit'])) {
    $term = $_POST['term'];
    $translation = $_POST['translation'];
    $definition = $_POST['definition'];

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "INSERT INTO dictionary_terms (term, translation, definition) VALUES (?, ?, ?)");
    if ($stmt) { // Check if prepare was successful
        mysqli_stmt_bind_param($stmt, "sss", $term, $translation, $definition);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            echo "Data added successfully!";
            // Redirect to a success page or back to the form
            header("Location: insert.php?status=success"); // added a redirect
            exit();
        } else {
            echo "Error adding data: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Term</title>
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
            <h2 class="mb-3">Add New Term</h2>
            <form method="POST" action="./insert.php" class="row g-3">
                <div class="col-12">
                    <input type="text" name="term" class="form-control mb-3" placeholder="Term" required>
                </div>
                <div class="col-12">
                    <input type="text" name="translation" class="form-control mb-3" placeholder="Translation" required>
                </div>
                <div class="col-12">
                    <input type="text" name="definition" class="form-control mb-3" placeholder="Definition" required>
                </div>
                <div class="col-12">
                    <button type="submit" name="Submit" class="btn btn-success w-100">Add</button>
                </div>
            </form>
            <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                    <strong>added successfully!</strong>
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>