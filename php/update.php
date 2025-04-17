<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "dictionary");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if (isset($_POST['Submit'])) {
    $searchTerm = $_POST['searchTerm'];
    $newTerm = $_POST['Text1'];
    $newTranslation = $_POST['translation']; // Added translation
    $newDefinition = $_POST['Text2'];

    // Use prepared statements to prevent SQL injection
    $stmt = mysqli_prepare($conn, "UPDATE dictionary_terms SET term = ?, translation = ?, definition = ? WHERE term = ?"); // Added translation
    mysqli_stmt_bind_param($stmt, "ssss", $newTerm, $newTranslation, $newDefinition, $searchTerm); // Added "s" for translation
    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        $rowsAffected = mysqli_stmt_affected_rows($stmt);
        if ($rowsAffected > 0) {
            echo "Term updated successfully!";
            header("Location: update.php?status=success");
            exit();
        } else {
            echo "Term not found or no changes were made.";
        }
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
    <section class="container py-5">
        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
            <h2 class="mb-3">Update Term</h2>
            <form method="POST" action="update.php" class="row g-3">
                <div class="col-12">
                    <input type="text" name="searchTerm" class="form-control mb-3" placeholder="Enter Term name to update" required>
                </div>
                <div class="col-12">
                    <input type="text" name="Text1" class="form-control mb-3" placeholder="Enter new term" required>
                </div>
                <div class="col-12">
                    <input type="text" name="translation" class="form-control mb-3" placeholder="Enter new translation" required>
                </div>
                <div class="col-12">
                    <input type="text" name="Text2" class="form-control mb-3" placeholder="Enter new definition" required>
                </div>
                <div class="col-12">
                    <button type="submit" name="Submit" class="btn btn-primary w-100">Update Term</button>
                </div>
            </form>
            <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                    <strong>Term updated successfully!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>