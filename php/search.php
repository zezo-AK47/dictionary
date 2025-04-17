<?php
$conn = mysqli_connect("localhost", "root", "", "dictionary");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$results = [];
$searchQuery = "";

if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM dictionary_terms WHERE term LIKE ? OR `definition` LIKE ?");
    $searchParam = "%" . $searchQuery . "%";
    mysqli_stmt_bind_param($stmt, "ss", $searchParam, $searchParam);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Term</title>
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

        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
            <h3>Search Dictionary</h3>
            <form method="GET" action="" class="d-flex">
                <input type="text" name="search" class="form-control mr-2 mb-2 me-2" placeholder="Search term or definition" value="<?= htmlspecialchars($searchQuery) ?>">
                <button class="btn mb-2 btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <div id="dictionary-table" data-aos="fade-up" data-aos-delay="300">
            <h3 class="mb-3">All Terms</h3>
            <?php if (!isset($_GET['status']) && !isset($_POST)): ?>
                <div class="alert alert-info" role="alert">
                    Start searching for terms or definitions in the dictionary.
                </div>
            <?php elseif (empty($results) && isset($_POST)): ?>
                <div class="alert alert-info" role="alert">
                    No results found for "<strong><?= htmlspecialchars($searchQuery) ?></strong>".
                </div>
            <?php elseif (isset($_GET['search'])): ?>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Term</th>
                            <th>Translation</th>
                            <th>Definition</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['term']) ?></td>
                                <td><?= htmlspecialchars($row['translation']) ?></td>
                                <td><?= htmlspecialchars($row['definition']) ?></td>
                                <td>
                                    <form method="POST" action="./delete.php?term=<?= $row['term'] ?>" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn mb-3 btn-sm btn-danger">Delete</button>
                                    </form>
                                    <form method="POST" action="./update.php" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn mb-3 btn-sm btn-primary">Update</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <?php if (isset($_GET['status']) && $_GET['status'] == 'success' && $_GET['action'] == 'delete'): ?>
                <div class="alert alert-warning mt-3 alert-dismissible fade show" role="alert">
                    <strong>Term deleted!</strong>
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif (isset($_GET['status']) && $_GET['status'] == 'error' && $_GET['action'] == 'delete'): ?>
                <?php if (isset($_GET['status']) && $_GET['status'] == 'success'): ?>
                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                        <strong>An error occured: <? $_GET['error'] ?></strong>
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>