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
    <h1>Login</h1> <br>
    <form action="index.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" name="login" value="Login">
    </form>
    <br>
</body>

</html>
<?php
if (isset($_POST['login'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        echo '<msg class="success">Loged successful!</msg> <br>';
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header("Location: ./php/home.php");
        exit();
    } else if (empty($_POST['username'])) {
        echo '<msg class="fail">Please fill in username field.</msg> <br>';
    } else {
        echo '<msg class="fail">Please fill in password field.</msg> <br>';
    }
}
