<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Home page</h1> <br>
    <form action="./home.php">
        <input type="submit" name="logout" value="Logout">
    </form>
    <br>
</body>

</html>
<?php
echo $_SESSION['username'] . "<br>";
echo $_SESSION['password'] . "<br>";

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../index.php");
    exit();
}
